<?php

namespace App\Http\Controllers\Api\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\CustomerDependant;
use App\Models\User;
use App\Http\Requests\Customer\CustomerDependantUpdateFormRequest;
use App\Http\Requests\Customer\CustomerDependantCreateFormRequest;

class DependantController extends Controller

{
     /**
    * @OA\Get(
    *      path="/api/v1/customer/customer-depandants",
    *      operationId="allFacilities",
    *      tags={"customer"},
    *      summary="Show all facilities ",
    *      description="Show all facilities ",
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
        $model = CustomerDependant::where('id', auth()->user()->id)->get();
        return $model;
    }

     /**
    * @OA\Post(
    *      path="/api/v1/customer/customer-depandants",
    *      operationId="createCustomerDependant",
    *      tags={"customer"},
    *      summary="create a customer's dependant ",
    *      description="create a customer's dependant ",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/CustomerDependantCreateFormRequest")
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
   
    public function store(CustomerDependantCreateFormRequest $request)
    {
        $model = new CustomerDependant;

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showMessage('dependant created');
    }

     /**
    * @OA\Get(
    *      path="/api/v1/customer/customer-depandants/{id}",
    *      operationId="showCustomerDependant",
    *      tags={"customer"},
    *      summary="show a customer's dependant ",
    *      description="show a customer's dependant ",
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
        $model = CustomerDependant::find($id);
        return $model;
    }

     /**
    * @OA\Put(
    *      path="/api/v1/customer/customer-depandants/{id}",
    *      operationId="updateCustomerDependant",
    *      tags={"customer"},
    *      summary="update a customer's dependant ",
    *      description="update a customer's dependant ",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/CustomerDependantUpdateFormRequest")
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
    public function update(CustomerDependantUpdateFormRequest $request, $id)
    {
        $model = CustomerDependant::find($id);

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showMessage('customer updated');
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/customer/customer-depandants/{id}",
    *      operationId="deleteCustomerDependant",
    *      tags={"customer"},
    *      summary="delete a customer's dependant ",
    *      description="delete a customer's dependant ",
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
