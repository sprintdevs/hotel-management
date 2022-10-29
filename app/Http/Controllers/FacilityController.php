<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Symfony\Component\HttpFoundation\Response;

class FacilityController extends Controller
{
    /**
     * @OA\Post(
     *  operationId="storeFacility",
     *  summary="Create new Facility",
     *  description="Create new Facility",
     *  tags={"facilities"},
     *  path="/api/facilities",
     *  security={ {"sanctum": {} }},
     *  @OA\RequestBody(
     *    description="Create facility",
     *    required=true,
     *    @OA\JsonContent(
     *      @OA\Property(type="string",title="name",property="name",example="Radisson Blu"),
     *      @OA\Property(type="string",title="street",property="street",example="House#14, Road#03, Block - B, Banasree"),
     *      @OA\Property(type="string",title="city",property="city",example="Dhaka"),
     *      @OA\Property(type="string",title="state",property="state",example="Dhaka"),
     *      @OA\Property(type="integer",title="zip",property="zip",example="1219"),
     *      @OA\Property(type="string",title="phone",property="phone",example="+8801701010101"),
     *      @OA\Property(type="string",title="email",property="email",example="radisson@gmail.com"),
     *      @OA\Property(type="integer",title="manager_id",property="manager_id",example="1"),
     *    )
     *  ),
     *   @OA\Response(
     *     response="201",
     *     description="Facility created",
     *     @OA\JsonContent(
     *       @OA\Property(type="string",title="message",property="message",example="Facility created successfully.")
     *    ),
     *   ),
     *  @OA\Response(response=422,description="Validation exception"),
     *   @OA\Response(
     *     response="401",
     *     description="Unauthorized access",
     *     @OA\JsonContent(
     *       @OA\Property(type="string",title="message",property="message",example="Unauthenticated."),
     *    ),
     *   ),
     * )
     *
     * @param FacilityRequest $request
     * @return JsonResponse
     */
    public function store()
    {
        Facility::create($this->validatedData());

        return response()->json(["message"=> "Facility created successfully."])
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function update(Facility $facility)
    {
        $facility->update($this->validatedData());
    }

    public function validatedData()
    {
        return request()->validate([
            "name"=> 'required',
            "street"=> 'required',
            "city"=> 'required',
            "state" => 'required',
            "zip" => 'required',
            "phone" => 'required',
            "email" => 'required',
            "manager_id" => 'required'
        ]);
    }
}
