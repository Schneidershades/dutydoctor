<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class PlatformUser extends Model
{

    use HasFactory;

    public function getJobTitleWithDept(){
        $actual_dept = "";
        if ($this->department!="unknown"){
          $actual_dept = strtoupper($this->department);
        }
        return "{$this->job_title} {$actual_dept}";
    }

    public static function getDepartments(){
        return [
          "csd"=>"Customer Support",
          "acc"=>"Accreditation",
          "onb"=>"Onboarding",
          "sal"=>"Sales",
          "mar"=>"Marketing",
          "unknown"=>"N/A",
        ];
    }


    public function user(){
        return $this->morphMany(User::class, 'userable');
    }  
}
