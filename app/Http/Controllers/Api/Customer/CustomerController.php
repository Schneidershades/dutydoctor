<?php

namespace App\Http\Controllers\Api\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Customer;
use App\Http\Requests\Customer\CustomerUpdateFormRequest;

class CustomerController extends Controller

{
     /**
    * @OA\Post(
    *      path="/api/v1/customer/customer-profile",
    *      operationId="updateCustomerProfile",
    *      tags={"customer"},
    *      summary="Profile of a customer",
    *      description="Profile of a customer",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/CustomerUpdateFormRequest")
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

    public function update(CustomerUpdateFormRequest $request)
    {
        $model = Customer::find(auth()->user()->id);

        $model = $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showMessage('customer updated');
    }
}
