<?php

namespace App\Http\Requests\Professional;

use Illuminate\Foundation\Http\FormRequest;
/**
/**
 * @OA\Schema(
 *      title="Professional Service Offering Update Form Request Fields",
 *      description="Professional Service Offering Update request body data",
 *      type="object",
 *      required={"email"}
 * )
 */
class ProfessionalServiceOfferingUpdateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="Professional Id",
     *      description="Professional Id",
     *      example="1"
     * )
     *
     * @var int
     */
    private $professional_id;

    /**
     * @OA\Property(
     *      title="Service Offering Id",
     *      description="Service Offering Id",
     *      example="1"
     * )
     *
     * @var int
     */
    private $service_offering_id;

    /**
     * @OA\Property(
     *      title=" Offer Name",
     *      description=" Offer Name",
     *      example="name"
     * )
     *
     * @var string
     */
    private $offer_name;

    /**
     * @OA\Property(
     *      title="Description",
     *      description="Description",
     *      example="Description"
     * )
     *
     * @var string
     */
    private $description;

    /**
     * @OA\Property(
     *      title="Delivery mode",
     *      description="Delivery mode",
     *      example="Delivery mode"
     * )
     *
     * @var string
     */
    private $delivery_mode;

    /**
     * @OA\Property(
     *      title="Profile  image",
     *      description="Profile  image",
     *      example="Profile  image"
     * )
     *
     * @var float
     */
    private $profile_image;

    /**
     * @OA\Property(
     *      title="Offer Unit Price",
     *      description="Offer Unit Price",
     *      example="Offer Unit Price"
     * )
     *
     * @var float
     */
    private $offer_unit_price;

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
            'offer_name' => 'string',
            'description' => 'string',
            'unit_of_measure' => 'string',
            'delivery_mode' => 'string',
            'professional_id' => 'int',
            'service_offering_id' => 'int',
            'profile_image' => 'file',
            'offer_unit_price' => 'float',
            'default_price_markup_pct' => 'float',
        ];
    }
}
