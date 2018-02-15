<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Categorie.
 *
 * @package namespace App\Entities;
 */
class Categorie extends Model implements Transformable {

    use TransformableTrait;
   
    protected $fillable = ['code', 'name', 'description'];
    protected $hidden = ['created_by','status'];
    protected $dates = ['created_at','updated_at'];
    
}
