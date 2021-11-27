<?php

namespace App\Http\Controllers\Api;

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
        $locations = [];
        foreach ($localizationPoints as $point) {
            $locations[] = "{$point->street_number}+{$point->street}+{$point->city}+Poland";
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
