<?php

namespace App\Http\Requests\Professional;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Professional Update Form Request Fields",
 *      description="Professional Update request body data",
 *      type="object",
 *      required={"email"}
 * )
 */

class ProfessionalUpdateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="Public code",
     *      description="Public code",
     *      example="name"
     * )
     *
     * @var string
     */
    private $public_code;

    /**
     * @OA\Property(
     *      title="default price",
     *      description="default price",
     *      example="default price"
     * )
     *
     * @var float
     */
    private $default_price_markup_pct;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'public_code' => 'string',
            'default_price_markup_pct' => 'float',
        ];
    }
}
