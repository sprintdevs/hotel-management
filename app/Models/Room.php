<?php

namespace App\Models;

use App\Enums\RoomType;
use App\Enums\RoomBedType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $casts = [
        'furniture' => 'array',
        'services' => 'array',
        'complimentaries' => 'array',
        'type' => RoomType::class,
        'bed_type' => RoomBedType::class
    ];

    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }
}
