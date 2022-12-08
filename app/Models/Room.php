<?php

namespace App\Models;

use App\Enums\Room\Type;
use App\Enums\Room\BedType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $casts = [
        'furniture' => 'array',
        'services' => 'array',
        'complimentaries' => 'array',
        'category' => Type::class,
        'bed_type' => BedType::class
    ];

    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }
}
