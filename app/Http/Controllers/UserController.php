<?php

namespace App\Http\Controllers;

use App\Http\Resources\User as UserResource;

class UserController extends Controller
{
    /**
     * @OA\Get(
     *   path="/api/user",
     *   summary="Get auth user info",
     *   description="Returns authenticated user's information",
     *   operationId="showUser",
     *   tags={"users"},
     *   security={ {"sanctum": {} }},
     *   @OA\Response(
     *     response=200,
     *     description="Successful operation",
     *     @OA\JsonContent(
     *       @OA\Property(type="object", title="data", property="data",
     *         @OA\Property(type="string",title="type",property="type",example="user"),
     *         @OA\Property(type="integer",title="id",property="id",example="1"),
     *         @OA\Property(type="object",title="attributes",property="attributes",
     *           @OA\Property(type="string",title="name",property="name",example="John Doe"),
     *           @OA\Property(type="string",title="email",property="email",example="john@email.com"),
     *           @OA\Property(type="boolean",title="verified",property="verified",example=true)
     *         ),
     *         @OA\Property(type="object",title="links",property="links",
     *           @OA\Property(type="string",title="self",property="self",example="/users/1")
     *         )
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response="401",
     *     description="Unauthorized access",
     *     @OA\JsonContent(
     *       @OA\Property(type="string",title="message",property="message",example="Unauthenticated.")
     *     )
     *   )
     * )
     */
    public function show()
    {
        return new UserResource(request()->user());
    }
}
