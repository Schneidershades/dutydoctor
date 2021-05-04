<?php

namespace App\Http\Controllers\Api\Professional;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProfessionalServiceAvailabilityController extends Controller

{
     /**
    * @OA\Get(
    *      path="/api/v1/professional/professional-service-availability",
    *      operationId="allFacilities",
    *      tags={"professional"},
    *      summary="Show all service availabilities of a professional",
    *      description="Show all service availabilities of a professional",
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
   
    public function index()
    {
        $model = ProfessionalServiceAvailability::where('id', auth()->user()->id)->get();
        return $model;
    }

     /**
    * @OA\Post(
    *      path="/api/v1/professional/professional-service-availability",
    *      operationId="createProfessionalServiceAvailability",
    *      tags={"professional"},
    *      summary="create a professional's dependant ",
    *      description="create a professional's dependant ",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ProfessionalServiceAvailabilityCreateFormRequest")
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
   
    public function store(ProfessionalServiceAvailabilityRequest $request)
    {
        $model = new ProfessionalServiceAvailability;

        $this->requestAndDbIntersection($request, $model, []);

        return $this->showMessage('service availability created');
    }

     /**
    * @OA\Get(
    *      path="/api/v1/professional/professional-service-availability/{id}",
    *      operationId="showProfessionalServiceAvailability",
    *      tags={"professional"},
    *      summary="show a professional's service availability ",
    *      description="show a professional's service availability ",
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
        $model = ProfessionalServiceAvailability::find($id);
        return $model;
    }

     /**
    * @OA\Put(
    *      path="/api/v1/professional/professional-service-availability/{id}",
    *      operationId="updateProfessionalServiceAvailability",
    *      tags={"professional"},
    *      summary="update a professional's dependant ",
    *      description="update a professional's dependant ",
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
        $model = ProfessionalServiceAvailability::find($id);

        $tableColumns = $this->getColumns($model->getTable());

        $fields = array_intersect($requestColumns, $tableColumns);

        foreach($fields as $field){
            $model->setAttribute($field, $request[$field]);
        }

        $model->save();

        return $this->showMessage('service availability  updated');
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/professional/professional-service-availability/{id}",
    *      operationId="deleteProfessionalServiceAvailability",
    *      tags={"professional"},
    *      summary="delete a professional's dependant ",
    *      description="delete a professional's dependant ",
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
