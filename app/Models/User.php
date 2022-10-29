<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @OA\Schema(
 *   description="User model",
 *   title="User",
 *   required={},
 *   @OA\Property(type="integer",title="id",property="id",example="1"),
 *   @OA\Property(type="string",title="name",property="name",example="John Doe"),
 *   @OA\Property(type="string",title="email",property="email",example="john@email.com"),
 *   @OA\Property(type="dateTime",title="email_verified_at",property="email_verified_at",example="2022-07-04T02:41:42.336Z"),
 *   @OA\Property(type="dateTime",title="created_at",property="created_at",example="2022-07-04T02:41:42.336Z"),
 *   @OA\Property(type="dateTime",title="updated_at",property="updated_at",example="2022-07-04T02:41:42.336Z"),
 * )
 * 
 * @OA\Schema(
 *   schema="Users",
 *   title="Users",
 *   @OA\Property(title="data",property="data",type="array",
 *     @OA\Items(type="object",ref="#/components/schemas/User"),
 *   )
 * )
 * 
 * @OA\Parameter(
 *      parameter="User--id",
 *      in="path",
 *      name="User_id",
 *      required=true,
 *      description="Id of User",
 *      @OA\Schema(
 *          type="integer",
 *          example="1",
 *      )
 * ),
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function facility()
    {
        return $this->hasOne(Facility::class);
    }
}
