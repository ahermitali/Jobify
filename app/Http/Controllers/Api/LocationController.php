<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LocationController extends Controller
{
    public function getCities($country)
    {
        $response = Http::post("https://countriesnow.space/api/v0.1/countries/cities", [
            "country" => $country
        ]);

        if ($response->successful()) {
            return response()->json($response->json()['data']);
        }

        return response()->json(['error' => 'Unable to fetch cities'], 500);
    }

    // public function getCountries()
    // {
    //     $response = Http::get("https://countriesnow.space/api/v0.1/countries");

    //     if ($response->successful()) {
    //         return response()->json($response->json()['data']);
    //     }

    //     return response()->json(['error' => 'Unable to fetch countries'], 500);
    // }

    public function getCountries()
    {
        $response = Http::get("https://restcountries.com/v3.1/all");

        if ($response->successful()) {
            $countries = collect($response->json())->pluck('name.common'); // Extract country names
            return response()->json($countries);
        }

        return response()->json(['error' => 'Unable to fetch countries'], 500);
    }
}
