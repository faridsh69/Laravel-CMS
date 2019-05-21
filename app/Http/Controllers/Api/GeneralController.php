<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PragmaRX\Countries\Package\Countries;

class GeneralController extends Controller
{
    public function getCountries()
    {
    	$countries = Countries::pluck('name')->all();

    	return response()->json([
		    'data' => $countries,
		]);
    }
}
