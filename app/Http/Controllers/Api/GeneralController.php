<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use PragmaRX\Countries\Package\Countries;

// use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function getCountries()
    {
    	$countries = Countries::pluck('name')->all();

    	$output = [
    	    'data' => $countries,
    	];

    	return response()->json($output);
    }
}
