<?php

namespace App\Observers;

use App\Models\LocalizationPoint;
use Illuminate\Support\Facades\Http;

class LocalizationPointObserver
{
    /**
     * Handle the LocalizationPoint "created" event.
     *
     * @param \App\Models\LocalizationPoint $localizationPoint
     * @return void
     */
    public function created(LocalizationPoint $localizationPoint)
    {
        $key = env("GOOGLE_API_KEY");
        $address = "{$localizationPoint->street_number}+{$localizationPoint->street}+{$localizationPoint->city},+Poland";
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key={$key}";
        $response = Http::get($url);
        $data = $response->json();
        $localizationPoint->google_response = $data;

        if (!$localizationPoint->is_normalized) {
            $addressComponents = $data["results"][0]["address_components"];
            foreach ($addressComponents as $component) {
                switch ($component['types'][0]) {
                    case 'street_number':
                        $localizationPoint->street_number = $component["long_name"];
                        break;
                    case 'route':
                        $localizationPoint->street = $component["long_name"];
                        break;
                    case 'locality':
                        $localizationPoint->city = $component["long_name"];
                        break;
                    case 'postal_code':
                        $localizationPoint->postal_code = $component["long_name"];
                        break;
                }
            }
            $localizationPoint->is_normalized = true;
        }

        $localizationPoint->save();
    }
}
