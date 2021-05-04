<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Accreditation\AccreditationResource;
use App\Http\Resources\Accreditation\AccreditationCollection;

class Accreditation extends Model
{
    use HasFactory;

    public $oneItem = AccreditationResource::class;
    public $allItems = AccreditationCollection::class;

    public function facility()
    {
    	return $this->belongsTo(Facility::class);
    }

    public function professional()
    {
    	return $this->belongsTo(Professional::class);
    }

    public function specialty()
    {
    	return $this->belongsTo(Specialty::class);
    }

    public function verifyingUser()
    {
    	return $this->belongsTo(User::class, "verifying_user_id");
    }
}
