<?php

namespace App\Http\Controllers\Api;

class GoogleLocalizationPoint
{
    public function index(){

    }

    public function show($id){
        $startingPoint = \App\Models\LocalizationPoint::user($id)->startingPoint()->first();
        $localizationPoints = \App\Models\LocalizationPoint::user($id)->regularPoints()->get();
        $locations = [];
        foreach ($localizationPoints as $point){
            $locations[] =  "{$point->street_number}+{$point->street}+{$point->city}+Poland";
        }
        $response = [
            "starting_point" => "{$startingPoint->street_number}+{$startingPoint->street}+{$startingPoint->city}+Poland",
            "localization_points" => $locations,
        ];
        return response()->json($response);
    }
}
