<?php

namespace App\Http\Controllers\Api\Professional;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Appointment;

class AppointmentController extends Controller
{
     /**
    * @OA\Get(
    *      path="/api/v1/professional/{id}/appointment/",
    *      operationId="showProfessionalAppointments",
    *      tags={"professional"},
    *      summary="show a professional's appointment details ",
    *      description="show a professional's appointment details ",
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
        $model = Appointment::where('professional_id', $id)->get();
        return $model;
    }
}
