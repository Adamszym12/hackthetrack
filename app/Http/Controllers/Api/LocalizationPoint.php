<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Kruksal\Kruskal;

class LocalizationPoint extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $localizationPoints = \App\Models\LocalizationPoint::all();
        return response()->json($localizationPoints);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $startingPoint = \App\Models\LocalizationPoint::user($id)->startingPoint()->get();
        $localizationPoints = \App\Models\LocalizationPoint::user($id)->regularPoints()->get();
        $response = [
            "starting_point" => $startingPoint,
            "localization_points" => $localizationPoints,
        ];
        return response()->json($response);
    }
}
