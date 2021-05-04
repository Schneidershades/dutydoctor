<?php

namespace App\Http\Requests\Facility;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Facility profile Update Form Request Fields",
 *      description="Facility profile Update request body data",
 *      type="object",
 *      required={"email"}
 * )
 */
class FacilityProfileUpdateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="Facility Short Name",
     *      description="Short name of the facility",
     *      example="HDP"
     * )
     *
     * @var string
     */
    public $short_name;

    /**
     * @OA\Property(
     *      title="Facility full Name",
     *      description="full name of the facility",
     *      example="HDP"
     * )
     *
     * @var string
     */
    public $full_name;

    /**
     * @OA\Property(
     *      title="Facility Professional Description",
     *      description="Professional Description of the facility",
     *      example="A Facility"
     * )
     *
     * @var string
     */
    public $profile_description;

    /**
     * @OA\Property(
     *      title="Facility Professional Public code",
     *      description="Professional Public code of the facility",
     *      example="A Facility"
     * )
     *
     * @var string
     */
    public $public_code;

    /**
     * @OA\Property(
     *      title="Facility Professional Telephone",
     *      description="Professional Telephone of the facility",
     *      example="A Facility"
     * )
     *
     * @var string
     */
    public $telephone;

    /**
     * @OA\Property(
     *      title="Facility Establishment",
     *      description="Establishment of the facility",
     *      example="A Facility"
     * )
     *
     * @var int
     */
    public $year_established;

    /**
     * @OA\Property(
     *      title="Facility Primary Email",
     *      description="Primary Email of the facility",
     *      example="hdp@email.com"
     * )
     *
     * @var int
     */
    public $primary_email;

    /**
     * @OA\Property(
     *      title="Facility Primary Phone",
     *      description="Primary Phone of the facility",
     *      example="hdp@email.com"
     * )
     *
     * @var int
     */
    public $primary_telephone;

    /**
     * @OA\Property(
     *      title="Facility Website",
     *      description="Website of the facility",
     *      example="Website of the facility"
     * )
     *
     * @var string
     */
    public $website;


    /**
     * @OA\Property(
     *      title="Facility Bank Name",
     *      description="Bank Name of the facility",
     *      example="First Bank"
     * )
     *
     * @var string
     */
    public $bank_name;


    /**
     * @OA\Property(
     *      title="Facility Bank Account Name",
     *      description="Bank Account Name of the facility",
     *      example="Schneider Komolafe"
     * )
     *
     * @var string
     */
    public $bank_account_name;


    /**
     * @OA\Property(
     *      title="Facility Bank Account Number",
     *      description="Bank Account Number of the facility",
     *      example="002342222211"
     * )
     *
     * @var string
     */
    public $bank_account_number;


    /**
     * @OA\Property(
     *      title="Facility Paystack Bank code Number",
     *      description="Paystack Bank code Number of the facility",
     *      example="230333"
     * )
     *
     * @var string
     */
    public $paystack_bank_code;


    /**
     * @OA\Property(
     *      title="Facility Paystack Bank Verification Details",
     *      description="Paystack Bank Verification Details of the facility",
     *      example="Details"
     * )
     *
     * @var string
     */
    public $paystack_bank_account_verification_details;


    /**
     * @OA\Property(
     *      title="Facility Paystack Reciepent Code",
     *      description="Paystack Reciepent Code of the facility",
     *      example="Details"
     * )
     *
     * @var string
     */
    public $paystack_recipient_code;


    /**
     * @OA\Property(
     *      title="Facility Paystack Reciepent Details",
     *      description="Paystack Reciepent Details of the facility",
     *      example="Details"
     * )
     *
     * @var string
     */
    public $paystack_recipient_details;


    /**
     * @OA\Property(
     *      title="Facility Profile Image",
     *      description="Profile Image of the facility",
     *      example="Image"
     * )
     *
     * @var string
     */
    public $profile_image;



    /**
     * Determine if the facility is authorized to make this request.
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
            'public_code' => 'required|string|max:255|unique:facilities,public_code',
            'telephone' => 'required|string|max:255|unique:facilities,telephone',
            'full_name' => 'required|string|max:255',
            'short_name' => 'required|string|max:255',
            'profile_description' => 'required',
            'year_established' => 'required|int',
            'primary_email' => 'required|string|min:8|unique:facilities,primary_email',
            'primary_telephone' => 'required|string|min:8|unique:facilities,primary_telephone',
            'website' => 'required|string',
            'bank_name' => 'required|string|max:255',
            'bank_account_name' => 'required|string|max:255',
            'bank_account_number' => 'required|string|max:255',
            'paystack_bank_code' => 'required|string|max:255',
            'paystack_bank_account_verification_details' => 'required|string|max:255',
            'paystack_recipient_code' => 'required|string|max:255',
            'paystack_recipient_details' => 'required|string|max:255',
            'is_disabled' => 'required|boolean',
            'disable_reason' => 'required|string',
            'profile_image' => 'file|required',
            'profile_image2' => 'file|required',
            'profile_image3' => 'file|required',
            'profile_image4' => 'file|required',
            'profile_image5' => 'file|required',
            'default_price_markup_pct' => 'decimal|required',
        ];
    }
}
