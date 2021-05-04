<?php

namespace App\Http\Requests\Api\Professional;

use Illuminate\Foundation\Http\FormRequest;
/**
/**
 * @OA\Schema(
 *      title="Professional Service Availability Update Form Request Fields",
 *      description="Professional Service Availability Update request body data",
 *      type="object",
 *      required={"email"}
 * )
 */
class ProfessionalServiceAvailabilityUpdateFormRequest extends FormRequest
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
     *      title="Is professional Available on Monday",
     *      description="Is professional Available on Monday",
     *      example="true/false"
     * )
     *
     * @var boolean
     */
    private $is_available_monday;

    /**
     * @OA\Property(
     *      title="Is professional Available on tuesday",
     *      description="Is professional Available on tuesday",
     *      example="true/false"
     * )
     *
     * @var boolean
     */
    private $is_available_tuesday;

    /**
     * @OA\Property(
     *      title="Is professional Available on wednesday",
     *      description="Is professional Available on wednesday",
     *      example="true/false"
     * )
     *
     * @var boolean
     */
    private $is_available_wednesday;

    /**
     * @OA\Property(
     *      title="Is professional Available on thursday",
     *      description="Is professional Available on thursday",
     *      example="true/false"
     * )
     *
     * @var boolean
     */
    private $is_available_thursday;

    /**
     * @OA\Property(
     *      title="Is professional Available on friday",
     *      description="Is professional Available on friday",
     *      example="true/false"
     * )
     *
     * @var boolean
     */
    private $is_available_friday;

    /**
     * @OA\Property(
     *      title="Is professional Available on saturday",
     *      description="Is professional Available on saturday",
     *      example="true/false"
     * )
     *
     * @var boolean
     */
    private $is_available_saturday;

    /**
     * @OA\Property(
     *      title="Is professional Available on sunday",
     *      description="Is professional Available on sunday",
     *      example="true/false"
     * )
     *
     * @var boolean
     */
    private $is_available_sunday;

    /**
     * @OA\Property(
     *      title="Is professional Open time",
     *      description="Is professional Open time",
     *      example="9:00"
     * )
     *
     * @var string
     */
    private $specific_time_open;

    /**
     * @OA\Property(
     *      title="Is professional Close time",
     *      description="Is professional Close time",
     *      example="22:00"
     * )
     *
     * @var string
     */
    private $specific_time_close;

    /**
     * @OA\Property(
     *      title="Is professional Currently Available",
     *      description="Is professional Currently Available",
     *      example="true/false"
     * )
     *
     * @var boolean
     */
    private $is_currently_unavailable;

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
            'professional_id' => 'int',
            'service_offering_id' => 'int',
            'is_available_monday' => 'boolean',
            'is_available_tuesday' => 'boolean',
            'is_available_wednesday' => 'boolean',
            'is_available_thursday' => 'boolean',
            'is_available_friday' => 'boolean',
            'is_available_saturday' => 'boolean',
            'is_available_sunday' => 'boolean',
            'specific_time_open' => 'time',
            'specific_time_close' => 'time',
            'is_currently_unavailable' => 'boolean',
        ];
    }
}
