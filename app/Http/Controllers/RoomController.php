<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function validatedData()
    {
        return request()->validate([
            'name' => 'required',
            'type' => 'required',
            'price' => 'required',
            'bed_type' => 'required',
            'bed_count' => 'required',
            'furniture' => 'required',
            'balcony' => 'required',
            'services' => 'required',
            'complimentaries' => 'required',
            'floor_id' => 'required'
        ]);
    }
}
