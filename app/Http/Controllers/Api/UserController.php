<?php

namespace App\Http\Controllers\Api;

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
        foreach ($user->localizationPoints as $location) {
            $locations[] =
                [

                    'coordination' => $location->google_response["results"][0]["geometry"]["location"],
                    'name' =>"{$location->street_number} {$location->street} {$location->city} ",
                ];
        }

        return response()->json($locations);
    }
}
