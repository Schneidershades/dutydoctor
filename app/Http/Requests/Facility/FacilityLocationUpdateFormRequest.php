<?php

namespace App\Http\Requests\Facility;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Facility Location update Form Request Fields",
 *      description="Facility Location update request body data",
 *      type="object",
 *      required={"email"}
 * )
 */

class FacilityLocationUpdateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="Facility Id",
     *      description="Facility Id",
     *      example="1"
     * )
     *
     * @var int
     */
    private $facility_id;
    
    /**
     * @OA\Property(
     *      title="Facility First Name",
     *      description="First name of the facility",
     *      example="Schneider"
     * )
     *
     * @var string
     */
    public $location_name;


    /**
     * @OA\Property(
     *      title="Facility Location Address",
     *      description="Location Address of the facility",
     *      example="No 2 Jesus Street near schneider's office"
     * )
     *
     * @var string
     */
    public $location_address_house_number;


    /**
     * @OA\Property(
     *      title="Facility Location Street Address",
     *      description="Location Street Address of the facility",
     *      example="No 2 Jesus Street near schneider's office"
     * )
     *
     * @var string
     */
    public $location_address_street_name;


    /**
     * @OA\Property(
     *      title="Facility Location Address Surburb",
     *      description="Location Address Surburb of the facility",
     *      example="No 2 Jesus Street near schneider's office"
     * )
     *
     * @var string
     */
    public $location_address_suburb;


    /**
     * @OA\Property(
     *      title="Facility Location City",
     *      description="Location City of the facility",
     *      example="Abuja"
     * )
     *
     * @var string
     */
    public $location_address_city;

    /**
     * @OA\Property(
     *      title="Facility Location State",
     *      description="Location State of the facility",
     *      example="Abuja"
     * )
     *
     * @var string
     */
    public $location_address_state;

    /**
     * @OA\Property(
     *      title="Facility Location Name",
     *      description="Location Name of the facility",
     *      example="Abuja"
     * )
     *
     * @var string
     */
    public $gps_location_name;

    /**
     * @OA\Property(
     *      title="Facility GPS Long",
     *      description="GPS Long of the facility",
     *      example="6.444"
     * )
     *
     * @var string
     */
    public $gps_long;



    /**
     * @OA\Property(
     *      title="Facility GPS Lat",
     *      description="GPS Lat of the facility",
     *      example="9.0333"
     * )
     *
     * @var string
     */
    public $gps_lat;

    /**
     * @OA\Property(
     *      title="Facility GPS City",
     *      description="GPS City of the facility",
     *      example="Abuja"
     * )
     *
     * @var string
     */
    public $gps_city;



    /**
     * @OA\Property(
     *      title="Facility GPS State",
     *      description="GPS State of the facility",
     *      example="FCT"
     * )
     *
     * @var string
     */
    public $gps_state;

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
            'location_name' => 'required|string|max:255',
            'facility_id' => 'required|int',
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
        ];
    }
}
