<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * @OA\Post(
     *  operationId="loginUser",
     *  summary="User login",
     *  description="Login user to authenticate",
     *  tags={"authenticate"},
     *  path="/login",
     *  @OA\RequestBody(
     *    description="User credentials",
     *    required=true,
     *    @OA\JsonContent(
     *      @OA\Property(type="string",title="email",property="email",example="john@email.com"),
     *      @OA\Property(type="password",title="password",property="password",example="password"),
     *    )
     *  ),
     *   @OA\Response(
     *     response="200",
     *     description="Successful operation",
     *     @OA\JsonContent(
     *       @OA\Property(type="string",title="message",property="message",example="Logged in successfully."),
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
     *             example="These credentials do not match our records."
     *           ),
     *         ),
     *       ),
     *     ),
     *   ),
     * )
     * 
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return response()->json(['message' => 'Logged in successfully.']);
    }

    /**
     * @OA\Post(
     *  operationId="logoutUser",
     *  summary="User logout",
     *  description="Logout authenticated user",
     *  tags={"authenticate"},
     *  path="/logout",
     *   @OA\Response(
     *     response="200",
     *     description="Successful operation",
     *     @OA\JsonContent(
     *       @OA\Property(type="string",title="message",property="message",example="Logged out successfully."),
     *    ),
     *   ),
     * )
     *
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->json(['message' => 'Logged out successfully.']);
    }
}
