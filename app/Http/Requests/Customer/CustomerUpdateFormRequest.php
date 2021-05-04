<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Customer Create Form Request Fields",
 *      description="Customer Create request body data",
 *      type="object",
 *      required={"email"}
 * )
 */

class CustomerUpdateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="Customer public code",
     *      description="public code of the customer",
     *      example="3333"
     * )
     *
     * @var string
     */
    private $email;

    /**
     * @OA\Property(
     *      title="DOB of customer",
     *      description="DOB  of the customer",
     *      example="2020-06-03"
     * )
     *
     * @var string
     */
    private $date_of_birth;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => 'required|string|max:255|unique:customers',
            'date_of_birth' => 'required|date|max:255',
        ];
    }
}
