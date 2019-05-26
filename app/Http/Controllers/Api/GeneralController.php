<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;

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

    public function getUser(Request $request)
    {
    	return $request->user();
    }
}
