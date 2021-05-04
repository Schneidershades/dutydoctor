<?php

namespace App\Models;

use Carbon;
use Session;
use Validator;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Comment;
use App\Models\Customer;
use App\Models\WorkItemAssignment;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\User\UserCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, HasRoles, Notifiable, SoftDeletes;
    
    protected $guard_name = 'api';
    public $oneItem = UserResource::class;
    public $allItems = UserCollection::class;


    public function getJWTIdentifier() {
        return $this->getKey();
    }

    public function getJWTCustomClaims() {
        // return [];
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'telephone' => $this->telephone,
            'registered_at' => $this->created_at->toIso8601String(),
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'telephone', 'first_name', 'middle_name', 'job_title', 'title', 'last_name', 'last_loggedin_at', 'department'
    ];

    /**
     * The accessor to append to the model's array form.
     *
     * @var array
    */
    protected $appends = ['full_name'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['deleted_at'];


    /**
     * @return string
     */
    public function getFullNameAttribute(){
        return "{$this->title} {$this->last_name}, {$this->first_name} {$this->middle_name}";
    }


    public function getLastLoginDateStringAttribute(){
      if ($this->last_loggedin_at!=null){
        return Carbon\Carbon::parse($this->last_loggedin_at)->format("M d, Y");
      }
      return "N/A";
    }


    public function scopeUsersearch($query, $value)
    {
        return $query
            ->where('first_name','like','%'.$value.'%')
            ->orWhere('last_name','like','%'.$value.'%')
            ->orWhere('middle_name','like','%'.$value.'%')
            ->orWhere('email','like','%'.$value.'%');
    }


    public function delete(){
      $current_time = time();
      $this->is_disabled = true;
      $this->email = "deleted@{$current_time}.ng";
      $this->telephone = $current_time;
      $this->save();
    }


    public static function getAllUsers($pagination_count=20){
      return User::where('is_disabled',false)->paginate($pagination_count);
    }


    public function comments(){
        $items = Comment::where('user_id', $this->id)
                ->orderBy('id', 'desc')
                ->get();
        return $items;
    }

    public function getCurrentAssignments(){

        //Get all the assignments assigned to this user.
        $items = WorkItemAssignment::where('assigned_user_id', $this->id)
            ->where('is_completed', false)
            ->orderBy('id','desc')
            ->get();

        return $items;
    }

    
    public function userable()
    {
        return $this->morphTo();
    }

    public function dependants()
    {
      return $this->hasManyThrough(Customer::class, CustomerDependant::class);
    }

    public function professionalConsultations()
    {
      return $this->hasMany(Consultation::class, 'professional_id');
    }

    public function customerConsultations()
    {
      return $this->hasMany(Consultation::class, 'customer_id');
    }

}
