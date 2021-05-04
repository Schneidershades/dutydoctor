<?php

namespace App\Http\Controllers\API\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Consultation;

class ConsultationController extends Controller
{
      /**
    * @OA\Get(
    *      path="/api/v1/customer/consultations",
    *      operationId="allFacilities",
    *      tags={"customer"},
    *      summary="Show all consultations of a customer",
    *      description="Show all consultations of a customer",
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
        $model = auth()->user()->customerConsultations;
        return $model;
    }



     /**
    * @OA\Get(
    *      path="/api/v1/customer/consultation/{id}",
    *      operationId="showCustomerconsultation",
    *      tags={"customer"},
    *      summary="show a customer's consultation details ",
    *      description="show a customer's consultation details ",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Consultation ID",
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
        $model = Consultation::find($id);
        return $model;
    }
}
