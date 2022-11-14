<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Resources\UserCollection;

class ManagerController extends Controller
{
    /**
     * @OA\Get(
     *   path="/api/managers",
     *   operationId="indexManager",
     *   tags={"managers"},
     *   summary="Get list of managers",
     *   description="Returns a list of managers",
     *   security={{ "sanctum": {} }},
     *   @OA\Parameter(
     *     name="page",
     *     required=false,
     *     in="query",
     *     description="Enter page number",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response="200",
     *     description="Successful operation",
     *     @OA\JsonContent(
     *       @OA\Property(type="array", title="data", property="data",
     *         @OA\Items(
     *           @OA\Property(type="string", title="type", property="type", example="user"),
     *           @OA\Property(type="integer", title="id", property="id", example="1"),
     *           @OA\Property(type="object", title="attributes", property="attributes",
     *             @OA\Property(type="string", title="name", property="name", example="John Doe"),
     *             @OA\Property(type="string", title="email", property="email", example="john@email.com"),
     *             @OA\Property(type="boolean", title="active", property="active", example=true)
     *           ),
     *           @OA\Property(type="object", title="links", property="links",
     *             @OA\Property(type="string", title="self", property="self", example="/users/1")
     *           )
     *         )
     *       ),
     *       @OA\Property(type="object", title="links", property="links",
     *         @OA\Property(type="string", title="self", property="self", example="/users"),
     *         @OA\Property(type="string", title="first", property="first", example="http://hotel.test/api/users?page=1"),
     *         @OA\Property(type="string", title="last", property="last", example="http://hotel.test/api/users?page=10"),
     *         @OA\Property(type="string", title="prev", property="prev",example=null),
     *         @OA\Property(type="string", title="next", property="next", example="http://hotel.test/api/users?page=2")
     *       ),
     *       @OA\Property(type="object", title="meta", property="meta",
     *         @OA\Property(type="integer", title="current_page", property="current_page", example="1"),
     *         @OA\Property(type="integer", title="from", property="from", example="1"),
     *         @OA\Property(type="string", title="path", property="path", example="http://hotel.test/api/users"),
     *         @OA\Property(type="integer", title="per_page", property="per_page", example="10"),
     *         @OA\Property(type="integer", title="to", property="to", example="2")
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response="401",
     *     description="Unauthorized access",
     *     @OA\JsonContent(
     *       @OA\Property(type="string", title="message", property="message", example="Unauthenticated.")
     *     )
     *   )
     * )
     */
    public function index()
    {
        return new UserCollection(User::simplePaginate(10));
    }
}
