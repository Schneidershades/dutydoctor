<?php

namespace App\Http\Controllers\Api\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Invoice;

class InvoiceController extends Controller

{
     /**
    * @OA\Post(
    *      path="/api/v1/customer/customer-invoices",
    *      operationId="allInvoices",
    *      tags={"customer"},
    *      summary="Show all invoices ",
    *      description="Show all invoices ",
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
    	$invoices = Invoice::where('customer_id', auth()->user()->userable->id)->get();
    	return $invoices;
    }

     /**
    * @OA\Post(
    *      path="/api/v1/customer/customer-invoices/{id}",
    *      operationId="showInvoiceDetails",
    *      tags={"customer"},
    *      summary="Show invoice details ",
    *      description="Show invoice details ",
    *       @OA\Parameter(
     *          name="id",
     *          description="Invoice ID",
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
        $professional = Invoice::find($id);
        return $professional;
    }
}
