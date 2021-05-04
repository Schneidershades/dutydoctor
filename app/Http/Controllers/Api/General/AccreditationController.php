<?php

namespace App\Http\Controllers\Api\General;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Accreditation;

class AccreditationController extends Controller

{
     /**
    * @OA\Get(
    *      path="/api/v1/general/general-accreditations",
    *      operationId="allAccreditations",
    *      tags={"general"},
    *      summary="Show all accreditations ",
    *      description="Show all accreditations ",
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
        $model = Accreditation::all();
        return $model;
    }

     /**
    * @OA\Get(
    *      path="/api/v1/general/general-accreditations/{id}",
    *      operationId="showAccreditationsDetails",
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
        $model = Accreditation::find($id);
        return $model;
    }
}
