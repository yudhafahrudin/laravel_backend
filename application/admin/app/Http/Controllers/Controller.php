<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

class Controller extends BaseController {

    // Definitly expired day for cache
    protected $expiredChaceByDay = 15;

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    public function __construct() {
        $this->middleware('auth');
    }

    // Chache Stored Function
    protected function chaceCheckAndStore($key, $value = null) {
        if (!Cache::has($key)) {
            $this->chaceStore($key, $value);
        } else {
            return Cache::get($key);
        }
    }

    protected function chaceStore($key, $value) {
        $expired = now()->addDay($this->expiredChaceByDay);
        Cache::put($key, $value, $expired);
    }

    //End of stored chace
    
    // Loggin info function
    protected function loggingInfo($information, array $value) {
        Log::info($information, $value);
    }
    //End of logging
    
    // Make directory
    protected function makeDirectory($pathImage) {
        File::exists($pathImage, 0777) or
                File::makeDirectory($pathImage, 0777, true);
        
    }
    // Make directory
   
    // Cacth file function
    protected function cacthFile($pathImage) {
        return new \Illuminate\Http\File($pathImage);
    }
    // end
    
    public function objectToArray($d) {
        if (is_object($d)) {
           
            // Gets the properties of the given object
            // with get_object_vars function
            $d = get_object_vars($d);
             
        }
		
        if (is_array($d)) {
            /*
            * Return array converted to object
            */
            return $d;
        }
        else {
            // Return array
            return $d;
        }
    }
}
