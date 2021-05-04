<?php

namespace App\Http\Controllers\Api\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\ServiceOffering;

class ServiceRequestController extends Controller

{
     /**
    * @OA\Post(
    *      path="/api/v1/customer/customer-service-requests",
    *      operationId="allServiceRequests",
    *      tags={"customer"},
    *      summary="Show all Service Requests ",
    *      description="Show all Service Requests ",
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
		$service = CustomerServiceRequest::where('customer_id', auth()->user()->id)->get();
		return $service;
	}

     /**
    * @OA\Get(
    *      path="/api/v1/customer/customer-service-requests/{id}",
    *      operationId="showCustomerDependant",
    *      tags={"customer"},
    *      summary="show a Service requests to customer ",
    *      description="show a Service requests to customer ",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Service Request ID",
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
		$service = CustomerServiceRequest::find($id);
		return $service;
	}

    public function store()
    {
        $model = new CustomerDependant;

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showMessage('dependant created');
    }
}
