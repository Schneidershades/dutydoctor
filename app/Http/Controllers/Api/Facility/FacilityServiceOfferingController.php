<?php

namespace App\Http\Controllers\Api\Facility;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FacilityServiceOfferingController extends Controller

{
     /**
    * @OA\Post(
    *      path="/api/v1/facility/facility-service-offerings",
    *      operationId="createFacilityServiceOffering",
    *      tags={"facility"},
    *      summary="create a facility service offering ",
    *      description="create a facility service offering ",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/FacilityServiceOfferingCreateFormRequest")
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
   
    public function store(FacilityServiceOfferingCreateFormRequest $request)
    {
        $model = new FacilityServiceOffering;

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showMessage('service offering created');
    }

     /**
    * @OA\Get(
    *      path="/api/v1/facility/facility-service-offerings/{id}",
    *      operationId="showFacilityServiceOffering",
    *      tags={"facility"},
    *      summary="show a facility's service offering ",
    *      description="show a facility's service offering ",
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
        $model = FacilityServiceOffering::find($id);
        return $model;
    }

     /**
    * @OA\Put(
    *      path="/api/v1/facility/facility-service-offerings/{id}",
    *      operationId="updateFacilityServiceOffering",
    *      tags={"facility"},
    *      summary="update a facility's service offering ",
    *      description="update a facility's service offering ",
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
        $model = FacilityServiceOffering::find($id);

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showMessage('facility updated');
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/facility/facility-service-offerings/{id}",
    *      operationId="deleteFacilityServiceOffering",
    *      tags={"facility"},
    *      summary="delete a facility's service offering ",
    *      description="delete a facility's service offering ",
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
     *      
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

    public function destroy($id)
    {
        $model = Dependant::find($id);
        $model->delete();
    }
}
