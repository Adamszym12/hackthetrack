<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;

class UserController
{
    public function update(Request $request, User $user)
    {
        $user->last_known_position = $request->toArray();
        $user->save();
    }

    /**
     * Get co-ordinates of user track localizations
     *
     * @param User $user
     */
    public function show(User $user)
    {
        foreach ($user->localizationPoints()->regularPoints()->get() as $location) {
            $locations[] =
                [

                    'coordination' => $location->google_response["results"][0]["geometry"]["location"],
                    'name' => "{$location->street_number} {$location->street} {$location->city} ",
                ];
        }
        $data = [
            "locations" => $locations,
            "current_location" => $user->last_known_position,
        ];
        return response()->json($data);

    }
}
