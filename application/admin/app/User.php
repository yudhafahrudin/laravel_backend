<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable {

    use Notifiable;
    use SoftDeletes;
    use LogsActivity;

    // Log Activity
    protected static $logName = 'User';
    protected static $logAttributes = ['name','username','email','description'];
    protected static $ignoreChangedAttributes = ['remember_token'];
    protected static $logOnlyDirty = true;
    
    //Model scope
    protected $fillable = ['name', 'email', 'password', 'username', 'description', 'created_by','path_thumb','path_original'];
    protected $hidden = ['password', 'remember_token'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    

}
