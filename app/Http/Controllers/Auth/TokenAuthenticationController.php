<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class TokenAuthenticationController extends Controller
{
    /**
     * @OA\Post(
     *   operationId="createToken",
     *   summary="Create new token",
     *   description="Issue new API token to user",
     *   tags={"authenticate"},
     *   path="/api/tokens/create",
     *   @OA\RequestBody(
     *     description="User credentials",
     *     required=true,
     *     @OA\JsonContent(
     *       @OA\Property(type="string",title="email",property="email",example="john@email.com"),
     *       @OA\Property(type="string",title="password",property="password",example="password"),
     *       @OA\Property(type="string",title="device_name",property="device_name",example="iPhone 14 Pro")
     *     )
     *   ),
     *   @OA\Response(
     *     response="200",
     *     description="Successful operation",
     *     @OA\JsonContent(
     *       @OA\Property(type="string",title="message",property="message",example="Authentication token created."),
     *       @OA\Property(type="string",title="api_token",property="api_token",example="<TOKEN>")
     *     )
     *   ),
     *   @OA\Response(
     *     response="422",
     *     description="Unprocessable content",
     *     @OA\JsonContent(
     *       @OA\Property(type="string",title="message",property="message",example="The provided credentials are incorrect."),
     *       @OA\Property(
     *         type="object",
     *         title="errors",
     *         property="errors", 
     *         @OA\Property(property="email", type="array",
     *           @OA\Items(example="The provided credentials are incorrect.")
     *         )
     *       )
     *     )
     *   )
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken($request->device_name)->plainTextToken;

        return response()->json([
            'message' => 'Authentication token created.',
            'api_token' => $token
        ]);
    }

    /**
     * @OA\Post(
     *   operationId="revokeToken",
     *   summary="Revoke current token",
     *   description="Revoke authenticated user's current token",
     *   tags={"authenticate"},
     *   security={{ "sanctum": {} }},
     *   path="/api/tokens/revoke",
     *   @OA\Response(
     *     response="200",
     *     description="Successful operation",
     *     @OA\JsonContent(
     *       @OA\Property(type="string",title="message",property="message",example="Authentication token revoked for current session.")
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
    public function destroy(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Authentication token revoked for current session.']);
    }

    /**
     * @OA\Post(
     *   operationId="revokeAllTokens",
     *   summary="Revoke all tokens",
     *   description="Revoke authenticated user's all tokens",
     *   tags={"authenticate"},
     *   security={{ "sanctum": {} }},
     *   path="/api/tokens/revoke-all",
     *   @OA\Response(
     *     response="200",
     *     description="Successful operation",
     *     @OA\JsonContent(
     *       @OA\Property(type="string",title="message",property="message",example="All authentication tokens revoked.")
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
    public function destroyAll(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'All authentication tokens revoked.']);
    }
}
