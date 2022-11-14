<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function validatedData()
    {
        return request()->validate([
            'floor_id' => 'required|integer',
            'name' => 'required|alpha|max:255',
            'type' => 'required|string',
            'price' => 'required|numeric',
            'bed_type' => 'required|string',
            'bed_count' => 'required|integer',
            'furniture' => 'required|array',
            'balcony' => 'required|boolean',
            'services' => 'required|array',
            'complimentaries' => 'required|array'
        ]);
    }
}
