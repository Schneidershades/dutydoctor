<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Offering\OfferingCategoryResource;
use App\Http\Resources\Offering\OfferingCategoryCollection;

class OfferingCategory extends Model
{
    use HasFactory;

    use \Illuminate\Database\Eloquent\SoftDeletes, \Kalnoy\Nestedset\NodeTrait;

    public $oneItem = OfferingCategoryResource::class;
    public $allItems = OfferingCategoryCollection::class;
    protected $fillable = array('category_name', 'parent_id');

    public $timestamps = false;

    public static function resetActionsPerformed()
    {
        static::$actionsPerformed = 0;
    }

}
