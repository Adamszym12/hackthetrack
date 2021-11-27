<?php

namespace App\Http\Controllers\Api;

use App\Http\Kruksal\Kruskal;
use App\Models\User;
use Illuminate\Http\Request;

class UserController
{
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     */
    public function update(Request $request, User $user)
    {
        $user->last_known_position = $request->json();
        $user->save();
    }

    /**
     * Get co-ordinates of user track localizations
     *
     * @param User $user
     */
    public function show(User $user)
    {
//        foreach ($user->localizationPoints as $location) {
//            $locations[] =
//                [
//
//                    'coordination' => $location->google_response["results"][0]["geometry"]["location"],
//                    'name' =>"{$location->street_number} {$location->street} {$location->city} ",
//                ];
//        }
//        return response()->json($locations);


        $kruskal = new Kruskal();


        $count = $user->localizationPoints->count();
        $edges = $kruskal->Factorial($count) / ($kruskal->Factorial(2) * $kruskal->Factorial($count - 2));
        $graph = $kruskal->CreateGraph($count, $edges);
        $counter = 0;

        foreach ($user->localizationPoints as $key => $location) {

            $coordination = $location->google_response["results"][0]["geometry"]["location"];
            $otherLocations = $user->localizationPoints->diff([$location]);

            foreach ($otherLocations as $otherLocation) {
                if ($counter == $edges){
                    break;
                }
                $otherLocationCoordination = $otherLocation->google_response["results"][0]["geometry"]["location"];
                $distance = sqrt(pow(($otherLocationCoordination['lat'] - $coordination['lat']), 2)+pow(($otherLocationCoordination['lng'] - $coordination['lng']), 2));
                $graph->_edge[$counter]->Source = $location->id-1;
                $graph->_edge[$counter]->Destination = $otherLocation->id-1;
                $graph->_edge[$counter]->Weight = $distance;
                $counter++;
            }

        }

        $result = $kruskal->Kruskal($graph);

        dd($result);
        return response()->json("asd");
    }
}
