<?php

namespace App\Http\Controllers\Api\Professional;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Consultation;

class ConsultationController extends Controller
{
      /**
    *      operationId="allFacilities",
    * @OA\Get(
    *      path="/api/v1/professional/consultations",
    *      tags={"professional"},
    *      summary="Show all consultations of a professional",
    *      description="Show all consultations of a professional",
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
        $model = auth()->user()->professionalConsultations;
        return $model;
    }

     /**
    * @OA\Get(
    *      path="/api/v1/professional/consultation/{id}",
    *      operationId="showProfessionalconsultation",
    *      tags={"professional"},
    *      summary="show a professional's consultation details ",
    *      description="show a professional's consultation details ",
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
