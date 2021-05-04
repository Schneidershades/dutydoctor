<?php

namespace App\Model;

use Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\Loan;
use App\Http\Resources\PayAttempt\PayAttemptResource;
use App\Http\Resources\PayAttempt\PayAttemptCollection;


class PayAttempt extends Model
{
    use HasFactory;

    public $oneItem = PayAttemptResource::class;
    public $allItems = PayAttemptCollection::class;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pay_attempts';
    
    public function getPaymentDateStringAttribute(){
        return Carbon\Carbon::parse($this->created_at)->format("M d, Y");
    }

}
