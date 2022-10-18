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
     *  operationId="createToken",
     *  summary="Create token",
     *  description="Issue API token to authenticate",
     *  tags={"authenticate"},
     *  path="/api/token",
     *  @OA\RequestBody(
     *    description="User credentials",
     *    required=true,
     *    @OA\JsonContent(
     *      @OA\Property(type="string",title="email",property="email",example="john@email.com"),
     *      @OA\Property(type="string",title="password",property="password",example="password"),
     *      @OA\Property(type="string",title="device_name",property="device_name",example="iPhone 14 Pro"),
     *    )
     *  ),
     *   @OA\Response(
     *     response="200",
     *     description="Successful operation",
     *     @OA\JsonContent(
     *       @OA\Property(type="string",title="email",property="email",example="john@email.com"),
     *       @OA\Property(type="string",title="api_token",property="api_token",example="<TOKEN>"),
     *    ),
     *   ),
     *   @OA\Response(
     *     response="422",
     *     description="Unprocessable Content",
     *     @OA\JsonContent(
     *       @OA\Property(type="string",title="message",property="message",example="These credentials do not match our records."),
     *       @OA\Property(
     *         type="object",title="errors",property="errors", 
     *         @OA\Property(property="email", type="array",
     *           @OA\Items(
     *             example="The provided credentials are incorrect."
     *           ),
     *         ),
     *       ),
     *     ),
     *   ),
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

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken($request->device_name)->plainTextToken;

        return response()->json([
            'email' => $user->email,
            'api_token' => $token
        ]);
    }
}
