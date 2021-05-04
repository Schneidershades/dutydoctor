<?php

namespace App\Http\Requests\Facility;

use Illuminate\Foundation\Http\FormRequest;
/**
/**
 * @OA\Schema(
 *      title="Facility Professional Create Form Request Fields",
 *      description="Facility Professional Create request body data",
 *      type="object",
 *      required={"email"}
 * )
 */
class FacilityProfessionalCreateFormRequest extends FormRequest
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
     *      title="is facility accepted by professional",
     *      description="is facility accepted by professional",
     *      example="1"
     * )
     *
     * @var int
     */
    private $is_accepted_facility;

    /**
     * @OA\Property(
     *      title="is professional accepted to facility",
     *      description="is professional accepted to facility",
     *      example="1"
     * )
     *
     * @var int
     */
    private $is_accepted_professional;

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
            'professional_id' => 'required|int',
            'facility_id' => 'required|int',
            'is_accepted_facility' => 'boolean',
            'is_accepted_professional' => 'boolean',
        ];
    }
}
