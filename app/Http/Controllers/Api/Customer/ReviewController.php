<?php

namespace App\Http\Controllers\API\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
     /**
    * @OA\Get(
    *      path="/api/v1/customer/{id}/review/",
    *      operationId="showCustomerReview",
    *      tags={"customer"},
    *      summary="show a customer's review details ",
    *      description="show a customer's review details ",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Review ID",
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
        $model = Review::where('customer_id', $id)->get();
        return $model;
    }
}
