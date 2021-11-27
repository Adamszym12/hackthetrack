<?php

namespace Database\Seeders;

use App\Models\LocalizationPoint;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LocalizationPointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = Storage::get('locations.json');
        $data = json_decode($file, true);

        foreach ($data as $row) {
            LocalizationPoint::create([
                'user_id' => 1,
                'street_number' => $row['StreetNumber'],
                'street' => $row['Street'],
                'postal_code' => $row['PostalCode'],
                'city' => $row['City'],
                'is_normalized' => $row['IsNormalized'],
                'open_time' => $row['OpenTime'],
                'close_time' => $row['CloseTime'],
            ]);
        }

        $file = Storage::get('startPoint.json');
        $data = json_decode($file, true);

        LocalizationPoint::create([
            'user_id' => 1,
            'street_number' => $data['StreetNumber'],
            'street' => $data['Street'],
            'postal_code' => $data['PostalCode'],
            'city' => $data['City'],
            'is_normalized' => $data['IsNormalized'],
            'is_start_point' => 1,
        ]);
    }
}
