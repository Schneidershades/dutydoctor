<?php

namespace App\Http\Controllers\Api\General;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\ProductOffering;

class ProductOfferingController extends Controller

{
      /**
    * @OA\Get(
    *      path="/api/v1/general/general-product-offerings",
    *      operationId="allProductOfferings",
    *      tags={"general"},
    *      summary="Show all product-offerings ",
    *      description="Show all product-offerings ",
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
    	$model = ProductOffering::all();
    	return $model;
    }

     /**
    * @OA\Get(
    *      path="/api/v1/general/general-product-offerings/{id}",
    *      operationId="showProductOfferingsDetails",
    *      tags={"general"},
    *      summary="Show facility details ",
    *      description="Show facility details ",
    *       @OA\Parameter(
     *          name="id",
     *          description="Facility ID",
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
        $model = ProductOffering::find($id);
        return $model;
    }
}
