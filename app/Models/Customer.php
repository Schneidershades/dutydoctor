<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon;
use DatePeriod;
use DateInterval;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Arcanedev\LaravelSettings\Facades\Settings;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\WorkItem;
use App\Models\User;
use App\Models\CustomerExpenditure;
use App\Http\Resources\Customer\CustomerResource;
use App\Http\Resources\Customer\CustomerCollection;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    public $oneItem = CustomerResource::class;
    public $allItems = CustomerCollection::class;
    
    /**
     * Return all work items related to this customer
     */
    public function workItems()
    {
        return $this->hasMany(WorkItem::class);
    }

    public function getKYCWorkItems(){
        return WorkItem::where('customer_id',$this->id)
                    ->where('work_item_type','kyc');
    }

    public static function newCustomerCode(){
        $current_time = time();
        return "C{$current_time}";
    }

    public function getLastActiveDateString(){
        if ($this->last_loggedin_at != null){
            return Carbon\Carbon::parse($this->last_loggedin_at)->format("M d, Y @ g:i:s a");
        }
        return "N/A";
    }

    public function getDateOfBirthString(){
        if ($this->birth_date!=null){
            return Carbon\Carbon::parse($this->birth_date)->format("M d, Y");
        }
        return "N/A";
    }

    public function getAge(){
        if ($this->birth_date!=null){
            return Carbon\Carbon::now()->diffInYears(Carbon\Carbon::parse($this->birth_date), true);
        }
        return 0;
    }


    public function save(array $options = [])
    {
        $isOldModel = $this->exists;
        if (parent::save($options)){

            if ($isOldModel){
                //Update Save

            }else{
                // if (settings()->get('task.require-customer-kyc',true)){
                //     //New Insert
                //     //Create Customer KYC Task
                //     $work_item_id = DB::table('work_items')->insertGetId([
                //         'customer_id' => auth()->user()->id,
                //         'work_item_type' => 'kyc',
                //         'status' => 'completed',
                //         'title' => 'Perform KYC on customer',
                //         'description' => 'Review customer details, check BVN details, check credit details, call frequently called numbers to establish identity, etc.',
                //         'created_at' => Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                //         'updated_at' => Carbon\Carbon::now()->format('Y-m-d H:i:s')
                //     ]);
                //     //Assignments
                //     $primaryAdminEmail = settings()->get('primary.admin-user-id',0);
                //     $assignedUserEmail = settings()->get('task.default-customer-kyc-assigned-id',0);

                //     $primaryUser = User::where('email',$primaryAdminEmail)->first();
                //     $assignedUser = User::where('email',$assignedUserEmail)->first();

                //     if ($primaryUser!=null && $assignedUser!=null){
                //         $work_item_assignment_id = DB::table('work_item_assignments')->insertGetId([
                //             'assigner_user_id' => $primaryUser->id,
                //             'assigned_user_id' => $assignedUser->id,
                //             'work_item_id' => $work_item_id,
                //             'status' => 'assigned',
                //             'is_accepted' => true,
                //             'is_current' => true,
                //             'created_at' => Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                //             'updated_at' => Carbon\Carbon::now()->format('Y-m-d H:i:s')
                //         ]);
                //     }
                // }

            }
            
        }
    }

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }  

    // just to improvise to locate to user
    public function actualCustomerInUserId()
    {
        return $this->belongsTo(User::class);
    }

    public function dependants()
    {
        return $this->hasMany(CustomerDependant::class);
    }

    public function expenditure()
    {
        return $this->hasMany(CustomerExpenditure::class);
    }

    public function productRequests()
    {
        return $this->hasMany(CustomerExpenditure::class);
    }

    public function serviceRequests()
    {
        return $this->hasMany(CustomerExpenditure::class);
    }

    public function customerExpenditures()
    {
        return $this->hasMany(CustomerExpenditure::class);
    }

}
