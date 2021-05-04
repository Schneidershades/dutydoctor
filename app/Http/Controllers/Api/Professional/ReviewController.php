<?php

namespace App\Http\Controllers\API\Professional;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
     /**
    * @OA\Get(
    *      path="/api/v1/professional/{id}/review/",
    *      operationId="showProfessionalReview",
    *      tags={"professional"},
    *      summary="show a professional's review details ",
    *      description="show a professional's review details ",
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
        $model = Review::where('professional_id', $id)->get();
        return $model;
    }
}
