<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use Illuminate\Http\Request;

class FloorController extends Controller
{
    public function validatedData()
    {
        return request()->validate([
            'name' => 'required',
            'active' => 'required',
            'facility_id' => 'required',
        ]);
    }
}
