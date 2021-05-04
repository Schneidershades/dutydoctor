<?php

namespace App\Http\Controllers\Api\Facility;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Facility;

class FacilityController extends Controller

{
    public function show($id)
    {
        $facility = Facility::find($id);
        $facility->with('user')->get();
        return $this->showOne('No valid Details Available', 201);
    }

     /**
    * @OA\Post(
    *      path="/api/v1/facility/facility-profile",
    *      operationId="updateFacilityProfile",
    *      tags={"facility"},
    *      summary="Profile of a facility",
    *      description="Profile of a facility",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/FacilityProfileUpdateFormRequest")
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

    public function update(FacilityProfileUpdateFormRequest $request)
    {
        $model = Facility::find($id);

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showMessage('facility updated');

        return $this->showMessage($facility, 201);
    }
}
