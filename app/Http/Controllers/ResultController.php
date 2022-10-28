<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultController extends Controller
{ 
    public function currentLocation(Request $request)
    {
        $lat = $request->lat;
        $lng = $request->lng;
        
        return view('currentLocation', [
            'lat' => $lat,
            'lng' => $lng,
        ]);
    }
}
