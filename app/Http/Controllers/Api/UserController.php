<?php

namespace App\Http\Controllers\Api;

use App\Http\Kruksal\Kruskal;
use App\Http\TravellingSalesman\TspBranchBound;
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

        $tsp = TspBranchBound::getInstance();
        foreach ($user->localizationPoints as $key => $location) {
            $coordination = $location->google_response["results"][0]["geometry"]["location"];
            $tsp->addLocation(array('id' => $location->id, 'latitude' => $coordination['lat'], 'longitude' => $coordination['lng']));
        }
        $ans = $tsp->solve();
        foreach ($ans['path'] as $path) {
            $locations[] =
                [
                    'coordination' => $user->localizationPoints[$path[0]]->google_response["results"][0]["geometry"]["location"],
                    'name' => "{$user->localizationPoints[$path[0]]->street_number} {$user->localizationPoints[$path[0]]->street} {$user->localizationPoints[$path[0]]->city} ",
                ];
        }
        return response()->json($locations);
    }
}
