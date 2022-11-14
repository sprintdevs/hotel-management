<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $casts = [
        'furniture' => 'array',
        'services' => 'array',
        'complimentaries' => 'array'
    ];

    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }
}
