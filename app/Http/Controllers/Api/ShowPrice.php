<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;

class ShowPrice extends Controller
{
    public function mostraPrezzo($slug) {
        $apartment = Apartment::where('slug', $slug)->firstOrFail();

        $data = [
            'apartment' => $apartment
        ];

        return response()->json($data);
    }
}
