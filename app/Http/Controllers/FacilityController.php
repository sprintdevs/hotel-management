<?php

namespace App\Http\Controllers;

use App\Http\Resources\Facility as ResourcesFacility;
use App\Http\Resources\FacilityCollection;
use App\Models\Facility;
use Symfony\Component\HttpFoundation\Response;

class FacilityController extends Controller
{
    /**
     * @OA\Get(
     *  path="/api/facilities",
     *  operationId="indexFacility",
     *  tags={"facilities"},
     *  summary="Get list of facilities",
     *  description="Returns a list of facilities",
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
     *             @OA\Property(type="string",title="type",property="type",example="facility"),
     *             @OA\Property(type="integer",title="id",property="id",example="1"),
     *             @OA\Property(type="object",title="attributes",property="attributes",
     *               @OA\Property(type="string",title="name",property="name",example="Radisson Blu"),
     *               @OA\Property(type="string",title="address",property="address",example="House#14, Road#03, Block - B, Banasree, Dhaka, Dhaka - 1219"),
     *               @OA\Property(type="string",title="phone",property="phone",example="+8801701010101"),
     *               @OA\Property(type="string",title="email",property="email",example="radisson@gmail.com"),
     *               @OA\Property(type="string",title="manager",property="manager",example="John Doe"),
     *             ),
     *             @OA\Property(type="object",title="links",property="links",
     *               @OA\Property(type="string",title="self",property="self",example="/facilities/1"),
     *             ),
     *           ),
     *       ),
     *       @OA\Property(type="object",title="links",property="links",
     *         @OA\Property(type="string",title="self",property="self",example="/facilities"),
     *         @OA\Property(type="string",title="first",property="first",example="http://hotel.test/api/facilities?page=1"),
     *         @OA\Property(type="string",title="last",property="last",example="http://hotel.test/api/facilities?page=10"),
     *         @OA\Property(type="string",title="prev",property="prev",example=null),
     *         @OA\Property(type="string",title="next",property="next",example="http://hotel.test/api/facilities?page=2"),
     *       ),
     *       @OA\Property(type="object",title="meta",property="meta",
     *         @OA\Property(type="integer",title="current_page",property="current_page",example="1"),
     *         @OA\Property(type="integer",title="from",property="from",example="1"),
     *         @OA\Property(type="string",title="path",property="path",example="http://hotel.test/api/facilities"),
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
        return new FacilityCollection(Facility::simplePaginate(10));
    }

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

        return response()->json(["message" => "Facility created successfully."])
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * @OA\Get(
     *  path="/api/facilities/{facility_id}/edit",
     *  operationId="editFacility",
     *  tags={"facilities"},
     *  summary="Get a facility to edit",
     *  description="Returns a facility",
     *  security={ {"sanctum": {} }},
     * @OA\Parameter(
     *     name="facility_id",
     *     example=1,
     *     required=true,
     *     in="path",
     *     description="Enter a facility ID",
     *     @OA\Schema(
     *       type="integer"
     *     )
     * ),
     * @OA\Response(
     *   response="401",
     *   description="Unauthorized access",
     *   @OA\JsonContent(
     *     @OA\Property(type="string",title="message",property="message",example="Unauthenticated."),
     *   ),
     * ),
     * @OA\Response(response=404,description="Facility not found"),
     *  @OA\Response(
     *    response="200",
     *    description="Successful Operation",
     *    @OA\JsonContent(
     *      @OA\Property(type="integer",title="id",property="id",example="1"),
     *      @OA\Property(type="string",title="name",property="name",example="Radisson Blu"),
     *      @OA\Property(type="string",title="street",property="street",example="House#14, Road#03, Block - B, Banasree"),
     *      @OA\Property(type="string",title="city",property="city",example="Dhaka"),
     *      @OA\Property(type="string",title="state",property="state",example="Dhaka"),
     *      @OA\Property(type="integer",title="zip",property="zip",example="1219"),
     *      @OA\Property(type="string",title="phone",property="phone",example="+8801701010101"),
     *      @OA\Property(type="string",title="email",property="email",example="radisson@gmail.com"),
     *      @OA\Property(type="integer",title="manager_id",property="manager_id",example="1"),
     *      @OA\Property(type="string",title="created_at",property="created_at",example="2022-11-08T17:35:52.000000Z"),
     *      @OA\Property(type="string",title="updated_at",property="updated_at",example="2022-11-08T17:35:52.000000Z"),
     *    )
     *  ),
     * )
     *
     * Display a listing of facility.
     * @return JsonResponse
     */
    public function edit(Facility $facility)
    {
        return response()->json($facility)
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @OA\Patch(
     *  operationId="updateFacility",
     *  summary="Update a Facility",
     *  description="Update a Facility",
     *  tags={"facilities"},
     *  path="/api/facilities/{facility_id}",
     *  security={ {"sanctum": {} }},
     * @OA\Parameter(
     *     name="facility_id",
     *     example=1,
     *     required=true,
     *     in="path",
     *     description="Enter a facility ID",
     *     @OA\Schema(
     *       type="integer"
     *     )
     * ),
     *  @OA\RequestBody(
     *    description="Update facility",
     *    required=true,
     *    @OA\JsonContent(
     *      @OA\Property(type="string",title="name",property="name",example="Radisson YOLO"),
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
     *     response="200",
     *     description="Facility updated",
     *     @OA\JsonContent(
     *       @OA\Property(type="string",title="message",property="message",example="Facility updated successfully.")
     *    ),
     *   ),
     *  @OA\Response(response=404,description="Facility not found"),
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
    public function update(Facility $facility)
    {
        $facility->update($this->validatedData());

        return response()->json(["message" => "Facility updated successfully."])
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @OA\Delete(
     *  operationId="destroyFacility",
     *  summary="Delete a Facility",
     *  description="Delete a Facility",
     *  tags={"facilities"},
     *  path="/api/facilities/{facility_id}",
     *  security={ {"sanctum": {} }},
     *  @OA\Parameter(
     *      name="facility_id",
     *      example=1,
     *      required=true,
     *      in="path",
     *      description="Enter a facility ID",
     *      @OA\Schema(
     *        type="integer"
     *      )
     *  ),
     *  @OA\Response(response=204,description="No content"),
     *  @OA\Response(response=404,description="Facility not found"),
     *  @OA\Response(
     *    response="401",
     *    description="Unauthorized access",
     *    @OA\JsonContent(
     *      @OA\Property(type="string",title="message",property="message",example="Unauthenticated."),
     *   ),
     *  ),
     * )
     *
     * @param FacilityRequest $request
     * @return JsonResponse
     */
    public function destroy(Facility $facility)
    {
        $facility->delete();

        return response([], Response::HTTP_NO_CONTENT);
    }

    public function validatedData()
    {
        return request()->validate([
            "name" => 'required',
            "street" => 'required',
            "city" => 'required',
            "state" => 'required',
            "zip" => 'required',
            "phone" => 'required',
            "email" => 'required',
            "manager_id" => 'required'
        ]);
    }
}
