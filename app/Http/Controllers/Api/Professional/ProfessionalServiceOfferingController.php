<?php

namespace App\Http\Controllers\Api\Professional;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProfessionalServiceOfferingController extends Controller

{
     /**
    * @OA\Get(
    *      path="/api/v1/professional/professional-service-offerings",
    *      operationId="allFacilities",
    *      tags={"professional"},
    *      summary="Show all service offerings of a professional",
    *      description="Show all service offerings of a professional",
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
        $model = ProfessionalServiceOffering::where('id', auth()->user()->id)->get();
        return $model;
    }

     /**
    * @OA\Post(
    *      path="/api/v1/professional/professional-service-offerings",
    *      operationId="createProfessionalServiceOffering",
    *      tags={"professional"},
    *      summary="create a service offerings ",
    *      description="create a service offerings ",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ProfessionalServiceOfferingCreateFormRequest")
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
   
    public function store(ProfessionalServiceOfferingCreateFormRequest $request)
    {
        $model = new ProfessionalServiceOffering;

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showMessage('service offerings created');
    }

     /**
    * @OA\Get(
    *      path="/api/v1/professional/professional-service-offerings/{id}",
    *      operationId="showProfessionalServiceOffering",
    *      tags={"professional"},
    *      summary="show a professional's service offerings ",
    *      description="show a professional's service offerings ",
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
        $model = ProfessionalServiceOffering::find($id);
        return $model;
    }

     /**
    * @OA\Put(
    *      path="/api/v1/professional/professional-service-offerings/{id}",
    *      operationId="updateProfessionalServiceOffering",
    *      tags={"professional"},
    *      summary="update a professional's offering ",
    *      description="update a professional's offering ",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ProfessionalServiceOfferingCreateFormRequest")
    *      ),
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
        $model = ProfessionalServiceOffering::find($id);

        $tableColumns = $this->getColumns($model->getTable());

        $fields = array_intersect($requestColumns, $tableColumns);

        foreach($fields as $field){
            $model->setAttribute($field, $request[$field]);
        }

        $model->save();

        return $this->showMessage('service offerings  updated');
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/professional/professional-service-offerings/{id}",
    *      operationId="deleteProfessionalServiceOffering",
    *      tags={"professional"},
    *      summary="delete a professional's offering ",
    *      description="delete a professional's offering ",
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
