<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Sign Up Form Request Fields",
 *      description="sign up request body data",
 *      type="object",
 *      required={"first_name"}
 * )
 */

class UserRegistrationFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="User First Name",
     *      description="First name of the user",
     *      example="Schneider"
     * )
     *
     * @var string
     */
    public $first_name;

    /**
     * @OA\Property(
     *      title="User Last Name",
     *      description="Last name of the user",
     *      example="Komolafe"
     * )
     *
     * @var string
     */
    public $last_name;

    /**
     * @OA\Property(
     *      title="User Type",
     *      description="Type of the user Customer,Facility,Professional",
     *      example="Customer/Facility/Professional"
     * )
     *
     * @var string
     */
    public $userable_type;

    /**
     * @OA\Property(
     *      title="User email",
     *      description="Email of the user",
     *      example="Email of the user"
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @var int
     * @OA\Property(
     *      title="User telephone",
     *      description="Telephone of the user",
     *      example="234748993333"
     * )
     *
     * @var string
     */
    public $telephone;

    /**
     * @OA\Property(
     *      title="User password",
     *      description="Password of the user",
     *      example="password"
     * )
     *
     * @var string
     */
    public $password;

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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'telephone' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'userable_type' => 'required|string|max:255|in:Customer,Facility,Professional',
        ];
    }
}
