<?php

namespace App\Http\Requests\Facility;

use Illuminate\Foundation\Http\FormRequest;
/**
/**
 * @OA\Schema(
 *      title="Facility User Update Form Request Fields",
 *      description="Facility User Update request body data",
 *      type="object",
 *      required={"email"}
 * )
 */
class FacilityUserUpdateFormRequest extends FormRequest
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
     *      title=" Facility Public code",
     *      description=" Facility Public code",
     *      example="name"
     * )
     *
     * @var string
     */
    private $offer_name;

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
            'facility_id' => 'required|int',
            'public_code' => 'required|string',
        ];
    }
}
