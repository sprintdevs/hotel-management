<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *   description="Floor model",
 *   title="Floor",
 *   required={},
 *   @OA\Property(type="integer", title="id", property="id", example="1"),
 *   @OA\Property(type="integer", title="facility_id", property="facility_id", example="1"),
 *   @OA\Property(type="string", title="name", property="name", example="1st Floor"),
 *   @OA\Property(type="boolean", title="active", property="active", example=true),
 *   @OA\Property(type="timestamp", title="created_at", property="created_at", example="2022-07-04T02:41:42.336Z"),
 *   @OA\Property(type="timestamp", title="updated_at", property="updated_at", example="2022-07-04T02:41:42.336Z")
 * )
 */
class Floor extends Model
{
    use HasFactory;

    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }
}
