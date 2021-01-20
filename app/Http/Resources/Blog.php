<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

class Blog extends JsonResource
{
    public function toArray(Request $request) : array
    {
        return parent::toArray($request);
    }
}
