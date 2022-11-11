<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserCollection;

class ManagerController extends Controller
{
    /**
     * @OA\Get(
     *  path="/api/managers",
     *  operationId="indexManager",
     *  tags={"managers"},
     *  summary="Get list of managers",
     *  description="Returns a list of managers",
     *  security={ {"sanctum": {} }},
     *  @OA\Response(
     *    response="401",
     *    description="Unauthorized access",
     *    @OA\JsonContent(
     *      @OA\Property(type="string",title="message",property="message",example="Unauthenticated."),
     *    ),
     *  ),
     *   @OA\Response(
     *     response="200",
     *     description="Successful operation",
     *     @OA\JsonContent(
     *       @OA\Property(
     *         type="array",title="data",property="data",
     *         @OA\Items(
     *             @OA\Property(type="string",title="type",property="type",example="user"),
     *             @OA\Property(type="integer",title="id",property="id",example="1"),
     *             @OA\Property(type="object",title="attributes",property="attributes",
     *               @OA\Property(type="string",title="name",property="name",example="Jone Doe"),
     *               @OA\Property(type="string",title="email",property="email",example="jone@test.com"),
     *               @OA\Property(type="boolean",title="verified",property="verified",example=true),
     *             ),
     *             @OA\Property(type="object",title="links",property="links",
     *               @OA\Property(type="string",title="self",property="self",example="/managers/1"),
     *             ),
     *           ),
     *       ),
     *       @OA\Property(type="object",title="links",property="links",
     *         @OA\Property(type="string",title="self",property="self",example="/managers"),
     *         @OA\Property(type="string",title="first",property="first",example="http://hotel.test/api/managers?page=1"),
     *         @OA\Property(type="string",title="last",property="last",example="http://hotel.test/api/managers?page=10"),
     *         @OA\Property(type="string",title="prev",property="prev",example=null),
     *         @OA\Property(type="string",title="next",property="next",example="http://hotel.test/api/managers?page=2"),
     *       ),
     *       @OA\Property(type="object",title="meta",property="meta",
     *         @OA\Property(type="integer",title="current_page",property="current_page",example="1"),
     *         @OA\Property(type="integer",title="from",property="from",example="1"),
     *         @OA\Property(type="string",title="path",property="path",example="http://hotel.test/api/managers"),
     *         @OA\Property(type="integer",title="per_page",property="per_page",example="10"),
     *         @OA\Property(type="integer",title="to",property="to",example="2"),
     *       ),
     *       
     *     ),
     *   ),
     * )
     *
     * Display a listing of facility.
     * @return JsonResponse
     */

    public function index()
    {
        return new UserCollection(User::simplePaginate(10));
    }
}
