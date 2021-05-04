<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Professional;
use App\Models\User;

class Review extends Model
{
    use HasFactory;

    public function professional()
    {
    	$this->belongsTo(Professional::class);
    }

    public function customer()
    {
    	$this->belongsTo(User::class);
    }
}
