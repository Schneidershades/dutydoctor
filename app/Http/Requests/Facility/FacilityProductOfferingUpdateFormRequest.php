<?php

namespace App\Http\Requests\Facility;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Facility Product Offering Update Form Request Fields",
 *      description="Facility Product Offering Update request body data",
 *      type="object",
 *      required={"email"}
 * )
 */
class FacilityProductOfferingUpdateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="Product Name",
     *      description="Product Name",
     *      example="Product Name"
     * )
     *
     * @var string
     */
    public $product_name;

    /**
     * @OA\Property(
     *      title="Brand Name",
     *      description="Brand Name",
     *      example="Brand Name"
     * )
     *
     * @var string
     */
    public $brand_name;

    /**
     * @OA\Property(
     *      title="Manufacturer",
     *      description="Manufacturer",
     *      example="Manufacturer"
     * )
     *
     * @var string
     */
    public $manufacturer;

    /**
     * @OA\Property(
     *      title="UPC Code",
     *      description="UPC Code",
     *      example="UPC Code"
     * )
     *
     * @var string
     */
    public $upc_code;

    /**
     * @OA\Property(
     *      title="Quantity of product available",
     *      description="Quantity of product available",
     *      example="Quantity of product available"
     * )
     *
     * @var int
     */
    public $qty_available;

    /**
     * @OA\Property(
     *      title="Product Availability date",
     *      description="Product Availability date",
     *      example="Product Availability date"
     * )
     *
     * @var string
     */
    public $product_availability_date;

    /**
     * @OA\Property(
     *      title="Description",
     *      description="Description",
     *      example="Description"
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *      title="Unit of measure",
     *      description="Unit of measure",
     *      example="Unit of measure"
     * )
     *
     * @var string
     */
    public $unit_of_measure;

    /**
     * @OA\Property(
     *      title="Is the product a drug",
     *      description="Is the product a drug",
     *      example="true/false"
     * )
     *
     * @var string
     */
    public $is_drug;

    /**
     * @OA\Property(
     *      title="Does product have a sale restriction",
     *      description="Does product have a sale restriction",
     *      example="true/false"
     * )
     *
     * @var boolean
     */
    public $has_sale_restrictions;

    /**
     * @OA\Property(
     *      title="Profile Image",
     *      description="Profile Image",
     *      example="image"
     * )
     *
     * @var boolean
     */
    public $profile_image;

    /**
     * @OA\Property(
     *      title="Offer Unit Price",
     *      description="Offer Unit Price",
     *      example="1000"
     * )
     *
     * @var float
     */
    public $offer_unit_price;

    /**
     * @OA\Property(
     *      title="Default Unit Price",
     *      description="Default Unit Price",
     *      example="1000"
     * )
     *
     * @var float
     */
    public $default_price_markup_pct;


    /**
     * @OA\Property(
     *      title="Product Offering Id",
     *      description="Product Offering Id",
     *      example="1"
     * )
     *
     * @var int
     */
    private $product_offering_id;

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
            'product_name' => 'required|string|max:255',
            'brand_name' => 'required|string|max:255',
            'manufacturer' => 'required|string|max:255',
            'upc_code' => 'required|string|max:255',
            'qty_available' => 'required|int',
            'product_availability_date' => 'required|date',
            'description' => 'required|string',
            'unit_of_measure' => 'required|string',
            'is_drug' => 'required|boolean',
            'offer_unit_price' => 'required|decimal',
            'default_price_markup_pct' => 'required|decimal',
            'product_offering_id' => 'required|int',
            'facility_id' => 'required|int',
            'profile_image' => 'required|file',
        ];
    }
}
