<?php

namespace App\Http\Controllers\Api\Content;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\News;

class NewsController extends Controller

{
     /**
    * @OA\Get(
    *      path="/api/v1/news",
    *      operationId="allNews",
    *      tags={"customer"},
    *      summary="Show all news ",
    *      description="Show all news ",
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
        $model = News::all();
        return $model;
    }

     /**
    * @OA\Get(
    *      path="/api/v1/news/{id}",
    *      operationId="showNews",
    *      tags={"customer"},
    *      summary="show a news ",
    *      description="show a news ",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="News ID",
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
        $model = News::find($id);
        return $model;
    }
}
