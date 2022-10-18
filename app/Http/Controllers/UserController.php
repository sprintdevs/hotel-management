<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    /**
     * @OA\Get(
     *   path="/api/user",
     *   summary="User info",
     *   description="Show authenticated user information",
     *   operationId="showUser",
     *   tags={"users"},
     *   security={ {"sanctum": {} }},
     *   @OA\Response(
     *     response=200,
     *     description="Successful operation",
     *     @OA\JsonContent(
     *       @OA\Property(
     *       title="data",
     *       property="data",
     *       type="object",
     *       ref="#/components/schemas/User"
     *     ),
     *    ),
     *   ),
     *   @OA\Response(
     *     response="401",
     *     description="Unauthorized access",
     *     @OA\JsonContent(
     *       @OA\Property(type="string",title="message",property="message",example="Unauthenticated."),
     *    ),
     *   ),
     *   @OA\Response(
     *     response="404",
     *     description="User not found",
     *     @OA\JsonContent(
     *       @OA\Property(type="string",title="message",property="message",example="User not found."),
     *    ),
     *   ),
     * )
     *
     * @return JsonResponse
     */
    public function show()
    {
        return response()->json([
            'data' => request()->user()
        ]);
    }
}
