<?php

namespace App\Http\Controllers\Api\Facility;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FacilityLocationController extends Controller

{
     /**
    * @OA\Post(
    *      path="/api/v1/facility/facility-location",
    *      operationId="createFacilityLocation",
    *      tags={"facility"},
    *      summary="create a facility's location ",
    *      description="create a facility's location ",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/FacilityLocationCreateFormRequest")
    *      ),
    *      @OA\Response(
    *          response=200,
    *          description="Successful signin",
    *          @OA\MediaType(
    *             mediaType="application/json",
    *         ),
    *       ),
    *      @OA\Response(
    *          response=400,
    *          description="Bad Request"
    *      ),
    *      @OA\Response(
    *          response=401,
    *          description="Unauthenticated",
    *      ),
    *      @OA\Response(
    *          response=403,
    *          description="Forbidden"
    *      ),
    *      security={ {"bearerAuth": {}} },
    * )
    */
   
    public function store(FacilityLocationCreateRequest $request)
    {
        $model = new FacilityLocation;

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showMessage('location created');
    }

     /**
    * @OA\Get(
    *      path="/api/v1/facility/facility-location/{id}",
    *      operationId="showFacilityLocation",
    *      tags={"facility"},
    *      summary="show a facility's location ",
    *      description="show a facility's location ",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Dependant ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
    *      @OA\Response(
    *          response=200,
    *          description="Successful signin",
    *          @OA\MediaType(
    *             mediaType="application/json",
    *         ),
    *       ),
    *      @OA\Response(
    *          response=400,
    *          description="Bad Request"
    *      ),
    *      @OA\Response(
    *          response=401,
    *          description="Unauthenticated",
    *      ),
    *      @OA\Response(
    *          response=403,
    *          description="Forbidden"
    *      ),
    *      security={ {"bearerAuth": {}} },
    * )
    */

    public function show($id)
    {
        $model = FacilityLocation::find($id);
        return $model;
    }

     /**
    * @OA\Put(
    *      path="/api/v1/facility/facility-location/{id}",
    *      operationId="updateFacilityLocation",
    *      tags={"facility"},
    *      summary="update a facility's location ",
    *      description="update a facility's location ",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Dependant ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
    *      @OA\Response(
    *          response=200,
    *          description="Successful signin",
    *          @OA\MediaType(
    *             mediaType="application/json",
    *         ),
    *       ),
    *      @OA\Response(
    *          response=400,
    *          description="Bad Request"
    *      ),
    *      @OA\Response(
    *          response=401,
    *          description="Unauthenticated",
    *      ),
    *      @OA\Response(
    *          response=403,
    *          description="Forbidden"
    *      ),
    *      security={ {"bearerAuth": {}} },
    * )
    */
   
    public function update(Request $request, $id)
    {
        $model = FacilityLocation::find($id);

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showMessage('facility updated');
    }
}
