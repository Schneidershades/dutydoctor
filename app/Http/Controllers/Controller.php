<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Traits\Api\ApiResponder;

class Controller extends BaseController
{
    use ApiResponser, AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function requestAndDbIntersection($request, $model, array $excludeFieldsForLogic = []){
		$requestColumns = array_keys($request->all());

		$model = $model;

		$tableColumns = $this->getColumns($model->getTable());

		$fields = array_intersect($requestColumns, $tableColumns);

		foreach($fields as $field){
			$model->setAttribute($field, $request[$field]);
		}

		return $model;
	}

	public function getColumns($model)
	{
		$columns = Schema::getColumnListing($model);
		return $columns;
	}

	/**
     * @OA\Info(
     *      version="1.0.0",
     *      title="HDP App OpenApi API Documentation",
     *      description="HDP App Using L5 Swagger OpenApi description",
     *      @OA\Contact(
     *          email="hdp@gmail.com"
     *      ),
     *      @OA\License(
     *          name="Apache 2.0",
     *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
     *      )
     * )
     *
     *
     * @OA\Tag(
     *     name="HDP Application",
     *     description="API Endpoints of Projects"
     * )
     *
     *  @OA\SecurityScheme(
     *     securityScheme="bearerAuth",
     *     type="http",
     *     scheme="bearer"
     * )
     *
     */
}
