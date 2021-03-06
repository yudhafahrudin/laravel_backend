<?php

namespace App\Http\Controllers\AdvancedCoding;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;

class colectionController extends Controller {

    public function __construct() {
        
    }

    public function inviteLoop() {
        $interval = 60; //minutes
        set_time_limit(0);
        $sleep = $interval * 60 - (time());

        while (1) {
            if (time() != $sleep) {
                // the looping will pause on the specific time it was set to sleep
                // it will loop again once it finish sleeping.
                time_sleep_until($sleep);
            }
            #do the routine job, trigger a php function and what not.
        }
    }
    
    protected function mkdir() {
        $pathImage = 'user/images/profile/adasdasd/2018-04-16/1114961204/original/';
        File::exists($pathImage, 0777) or
                File::makeDirectory($pathImage, 0777, true);
    }

}
