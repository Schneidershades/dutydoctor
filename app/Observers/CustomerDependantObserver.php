<?php


namespace App\Observers;

use App\Models\CustomerDependant;

class CustomerDependantObserver
{
    public function creating(User $user)
    {
        $user->user_id = auth()->user()->id;
    }

}
