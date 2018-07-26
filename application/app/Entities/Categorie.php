<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Categorie.
 *
 * @package namespace App\Entities;
 */
class Categorie extends Model implements Transformable {

    use SoftDeletes;
    use TransformableTrait;
    use LogsActivity;

    protected static $logName = 'categorie';
    protected $fillable = ['code', 'name', 'description'];
    protected $hidden = ['created_by', 'status'];
    protected $dates = ['created_at', 'updated_at','delete_at'];
    protected static $logAttributes = ['code', 'name', 'description','status','created_by'];
    protected static $logOnlyDirty = true;

}
