<?php

namespace App\Http\Controllers\Api\Professional;

use App\Http\Controllers\Controller;

use App\Models\Professional;
use App\Http\Requests\Professional\ProfessionalUpdateFormRequest;

class ProfessionalController extends Controller

{
     /**
    * @OA\Post(
    *      path="/api/v1/professional/professional-profile",
    *      operationId="updateProfessionalProfile",
    *      tags={"professional"},
    *      summary="Profile of a professional",
    *      description="Profile of a professional",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ProfessionalUpdateFormRequest")
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
    public function update(Request $request, $id)
    {
        $model = Professional::find($id);

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showMessage('professional updated');
    }
}
