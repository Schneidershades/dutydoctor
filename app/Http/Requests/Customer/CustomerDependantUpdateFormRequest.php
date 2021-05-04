<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;
/**
/**
 * @OA\Schema(
 *      title="Customer Dependant Update Form Request Fields",
 *      description="Customer Dependant Update request body data",
 *      type="object",
 *      required={"email"}
 * )
 */
class CustomerDependantUpdateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title=" Offer Name",
     *      description=" Offer Name",
     *      example="name"
     * )
     *
     * @var string
     */
    private $dependant_name;

    /**
     * @OA\Property(
     *      title="Telephone",
     *      description="Telephone",
     *      example="070384444444"
     * )
     *
     * @var string
     */
    private $telephone;

    /**
     * @OA\Property(
     *      title="Birth Date",
     *      description="Birth Date",
     *      example="28-04-1991"
     * )
     *
     * @var string
     */
    private $birth_date;

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
            'dependant_name' => 'required|string',
            'telephone' => 'required|string|max:255|unique:customers',
            'birth_date' => 'required|string|max:255',
        ];
    }
}
