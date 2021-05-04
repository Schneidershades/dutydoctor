<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
/**
/**
 * @OA\Schema(
 *      title="User Update Form Request Fields",
 *      description="User Update request body data",
 *      type="object",
 *      required={"first_name"}
 * )
 */

class UserUpdateFormRequest extends FormRequest
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
     *      title="User Middle Name",
     *      description="Middle name of the user",
     *      example="Busayo"
     * )
     *
     * @var string
     */
    public $middle_name;

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
    public $type;

    /**
     * @OA\Property(
     *      title="User Gender",
     *      description="Gender of the user Male,Female",
     *      example="Male/Female"
     * )
     *
     * @var string
     */
    public $gender;

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
     *      title="User Location Address",
     *      description="Location Address of the user",
     *      example="No 2 Jesus Street near schneider's office"
     * )
     *
     * @var string
     */
    public $location_address_house_number;


    /**
     * @OA\Property(
     *      title="User Location Street Address",
     *      description="Location Street Address of the user",
     *      example="No 2 Jesus Street near schneider's office"
     * )
     *
     * @var string
     */
    public $location_address_street_name;


    /**
     * @OA\Property(
     *      title="User Location Address Surburb",
     *      description="Location Address Surburb of the user",
     *      example="No 2 Jesus Street near schneider's office"
     * )
     *
     * @var string
     */
    public $location_address_suburb;


    /**
     * @OA\Property(
     *      title="User Location City",
     *      description="Location City of the user",
     *      example="Abuja"
     * )
     *
     * @var string
     */
    public $location_address_city;

    /**
     * @OA\Property(
     *      title="User Location State",
     *      description="Location State of the user",
     *      example="Abuja"
     * )
     *
     * @var string
     */
    public $location_address_state;

    /**
     * @OA\Property(
     *      title="User Location Name",
     *      description="Location Name of the user",
     *      example="Abuja"
     * )
     *
     * @var string
     */
    public $gps_location_name;

    /**
     * @OA\Property(
     *      title="User GPS Long",
     *      description="GPS Long of the user",
     *      example="6.444"
     * )
     *
     * @var string
     */
    public $gps_long;



    /**
     * @OA\Property(
     *      title="User GPS Lat",
     *      description="GPS Lat of the user",
     *      example="9.0333"
     * )
     *
     * @var string
     */
    public $gps_lat;

    /**
     * @OA\Property(
     *      title="User GPS City",
     *      description="GPS City of the user",
     *      example="Abuja"
     * )
     *
     * @var string
     */
    public $gps_city;



    /**
     * @OA\Property(
     *      title="User GPS State",
     *      description="GPS State of the user",
     *      example="FCT"
     * )
     *
     * @var string
     */
    public $gps_state;



    /**
     * @OA\Property(
     *      title="User Bank Name",
     *      description="Bank Name of the user",
     *      example="First Bank"
     * )
     *
     * @var string
     */
    public $bank_name;


    /**
     * @OA\Property(
     *      title="User Bank Account Name",
     *      description="Bank Account Name of the user",
     *      example="Schneider Komolafe"
     * )
     *
     * @var string
     */
    public $bank_account_name;


    /**
     * @OA\Property(
     *      title="User Bank Account Number",
     *      description="Bank Account Number of the user",
     *      example="002342222211"
     * )
     *
     * @var string
     */
    public $bank_account_number;


    /**
     * @OA\Property(
     *      title="User Paystack Bank code Number",
     *      description="Paystack Bank code Number of the user",
     *      example="230333"
     * )
     *
     * @var string
     */
    public $paystack_bank_code;


    /**
     * @OA\Property(
     *      title="User Paystack Bank Verification Details",
     *      description="Paystack Bank Verification Details of the user",
     *      example="Details"
     * )
     *
     * @var string
     */
    public $paystack_bank_account_verification_details;


    /**
     * @OA\Property(
     *      title="User Paystack Reciepent Code",
     *      description="Paystack Reciepent Code of the user",
     *      example="Details"
     * )
     *
     * @var string
     */
    public $paystack_recipient_code;


    /**
     * @OA\Property(
     *      title="User Paystack Reciepent Details",
     *      description="Paystack Reciepent Details of the user",
     *      example="Details"
     * )
     *
     * @var string
     */
    public $paystack_recipient_details;


    /**
     * @OA\Property(
     *      title="User Profile Image",
     *      description="Profile Image of the user",
     *      example="Image"
     * )
     *
     * @var string
     */
    public $profile_image;



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
            'middle_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'telephone' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'type' => 'required|string|max:255|in:Customer,Facility,Professional',
            'location_address_house_number' => 'required|string|max:255',
            'location_address_street_name' => 'required|string|max:255',
            'location_address_suburb' => 'required|string|max:255',
            'location_address_city' => 'required|string|max:255',
            'location_address_state' => 'required|string|max:255',
            'gps_location_name' => 'required|string|max:255',
            'gps_long' => 'required|string|max:255',
            'gps_lat' => 'required|string|max:255',
            'gps_city' => 'required|string|max:255',
            'gps_state' => 'required|string|max:255',
            'bank_name' => 'required|string|max:255',
            'bank_account_name' => 'required|string|max:255',
            'bank_account_number' => 'required|string|max:255',
            'paystack_bank_code' => 'required|string|max:255',
            'paystack_bank_account_verification_details' => 'required|string|max:255',
            'paystack_recipient_code' => 'required|string|max:255',
            'paystack_recipient_details' => 'required|string|max:255',
            'profile_image' => 'file|required'
        ];
    }
}
