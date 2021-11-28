<?php

namespace App\Http\Controllers\Api;

use App\Http\TravellingSalesman\TspBranchBound;
use App\Models\User;
use Illuminate\Http\Request;

class GoogleLocalizationPoint
{
    public function index()
    {

    }

    public function show($id)
    {
        $startingPoint = \App\Models\LocalizationPoint::user($id)->startingPoint()->first();
        $localizationPoints = \App\Models\LocalizationPoint::user($id)->regularPoints()->get();
        $userLocation =  User::findOrFail($id)->last_known_position;
        $tsp = TspBranchBound::getInstance();
        $startingCoordination = $startingPoint->google_response["results"][0]["geometry"]["location"];
        $tsp->addLocation(array('id' => $startingPoint->id, 'latitude' => $userLocation['lat'], 'longitude' => $userLocation['lng']));
        foreach ($localizationPoints as $location) {
            $coordination = $location->google_response["results"][0]["geometry"]["location"];
            $tsp->addLocation(array('id' => $location->id, 'latitude' => $coordination['lat'], 'longitude' => $coordination['lng']));
        }
        $ans = $tsp->solve();
        unset($ans['path'][0]);
        $ans['path'] = array_values($ans['path']);
        foreach ($ans['path'] as $path) {
            $locations[] = "{$localizationPoints[$path[0]-1]->street_number}+{$localizationPoints[$path[0]-1]->street}+{$localizationPoints[$path[0]-1]->city}+Poland";
        }

        $response = [
            "starting_point" => "{$startingPoint->street_number}+{$startingPoint->street}+{$startingPoint->city}+Poland",
            "localization_points" => $locations,
        ];
        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd("dupa");
    }
}
