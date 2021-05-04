<?php


namespace App\Observers;

use App\Models\User;
use App\Models\Professional;
use App\Models\Facility;
use App\Models\Customer;

class UserObserver
{
    public function creating(User $user)
    {
        $user->password = bcrypt($user->password);
        $user->remember_token = dechex(time()).bin2hex(random_bytes(10));
    }

    public function created(User $user)
    {

        if($user->userable_type == 'Professional'){
        	$type = new Professional;
        	$type->save();

            $user->userable_id = $type->id;
            $user->save();
        }

        if($user->userable_type == 'Facility'){
        	$type = new Facility;
        	$type->save();

            $user->userable_id = $type->id;
            $user->save();
        }

        if($user->userable_type == 'Customer'){
        	$type = new Customer;
        	$type->save();
            
            $user->userable_id = $type->id;
            $user->save();
        }

    }

}
