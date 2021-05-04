<?php

namespace App\Http\Controllers\Api\Content;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Faq;

class FaqController extends Controller

{
     /**
    * @OA\Get(
    *      path="/api/v1/faqs",
    *      operationId="allNews",
    *      tags={"customer"},
    *      summary="Show all faqs ",
    *      description="Show all faqs ",
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
        $model = Faq::all();
        return $model;
    }

     /**
    * @OA\Get(
    *      path="/api/v1/faqs/{id}",
    *      operationId="showNews",
    *      tags={"customer"},
    *      summary="show a faqs ",
    *      description="show a faqs ",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Faq ID",
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
        $model = Faq::find($id);
        return $model;
    }
}
