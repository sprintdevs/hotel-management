<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * @OA\Schema(
 *   description="Facility model",
 *   title="Facility",
 *   required={},
 *   @OA\Property(type="integer",title="id",property="id",example="1"),
 *   @OA\Property(type="string",title="name",property="name",example="Radisson Blu"),
 *   @OA\Property(type="string",title="street",property="street",example="House#14, Road#03, Block - B, Banasree"),
 *   @OA\Property(type="string",title="city",property="city",example="Dhaka"),
 *   @OA\Property(type="string",title="state",property="state",example="Dhaka"),
 *   @OA\Property(type="integer",title="zip",property="zip",example="1219"),
 *   @OA\Property(type="string",title="phone",property="phone",example="+8801701010101"),
 *   @OA\Property(type="string",title="email",property="email",example="radisson@gmail.com"),
 *   @OA\Property(type="integer",title="manager_id",property="manager_id",example="1"),
 *   @OA\Property(type="timestamp",title="created_at",property="created_at",example="2022-07-04T02:41:42.336Z"),
 *   @OA\Property(type="timestamp",title="updated_at",property="updated_at",example="2022-07-04T02:41:42.336Z"),
 * )
 */
class Facility extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    protected function address(): Attribute
{
    return Attribute::make(
        get: fn ($value, $attributes) => $attributes['street'] . ', ' . $attributes['city'] . ', ' . $attributes['state'] . ' - ' . $attributes['zip']
    );
}

protected function path(): Attribute
{
    return Attribute::make(
        get: fn ($value, $attributes) => '/facilities/' . $attributes['id']
    );
}
}
