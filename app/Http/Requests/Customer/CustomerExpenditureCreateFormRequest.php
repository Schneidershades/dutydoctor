<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Customer Expenditure Create Form Request Fields",
 *      description="Customer Expenditure Create request body data",
 *      type="object",
 *      required={"email"}
 * )
 */

class CustomerExpenditureCreateFormRequest extends FormRequest
{

     /**
     * @OA\Property(
     *      title="Invoice Id",
     *      description="Invoice Id",
     *      example="1"
     * )
     *
     * @var int
     */
    private $invoice_id;

    /**
     * @OA\Property(
     *      title="Service Offering Id",
     *      description="Service Offering Id",
     *      example="1"
     * )
     *
     * @var int
     */
    private $customer_id;

    /**
     * @OA\Property(
     *      title="Description",
     *      description="Description",
     *      example="Description"
     * )
     *
     * @var int
     */
    private $description;

    /**
     * @OA\Property(
     *      title="Expense Amount",
     *      description="Expense Amount",
     *      example="1000"
     * )
     *
     * @var int
     */
    private $expense_amount;

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
            'invoice_id' => 'required|int',
            'customer_id' => 'required|int',
            'description' => 'required|string',
            'expense_amount' => 'required|float',
        ];
    }
}
