<?php

namespace App\Http\Controllers\Api\Facility;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FacilityProfessionalController extends Controller

{
     /**
    * @OA\Post(
    *      path="/api/v1/facility/facility-professionals",
    *      operationId="createFacilityProfessional",
    *      tags={"facility"},
    *      summary="create a facility professional ",
    *      description="create a facility professional ",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/FacilityProfessionalCreateFormRequest")
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
   
    public function store(FacilityProfessionalCreateFormRequest $request)
    {
        $model = new FacilityProfessional;

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showMessage('dependant created');
    }

     /**
    * @OA\Get(
    *      path="/api/v1/facility/facility-professionals/{id}",
    *      operationId="showFacilityProfessional",
    *      tags={"facility"},
    *      summary="show a facility's dependant ",
    *      description="show a facility's dependant ",
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
        $model = FacilityProfessional::find($id);
        return $model;
    }

     /**
    * @OA\Put(
    *      path="/api/v1/facility/facility-professionals/{id}",
    *      operationId="updateFacilityProfessional",
    *      tags={"facility"},
    *      summary="update a facility's dependant ",
    *      description="update a facility's dependant ",
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
        $model = FacilityProfessional::find($id);

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showMessage('facility updated');
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/facility/facility-professionals/{id}",
    *      operationId="deleteFacilityProfessional",
    *      tags={"facility"},
    *      summary="delete a facility's dependant ",
    *      description="delete a facility's dependant ",
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
