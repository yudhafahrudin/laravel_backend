<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait UploadImage {

    protected $pathImage;
    protected $pathImageTemp;
    protected $pathQuality = [];

    public function saveImage($request) {
        $photo = $request->file('photo');

        // File named
        $imagename = time() . '.' . $photo->getClientOriginalExtension();

        // Initialize variable in upload images
        $rand = \Carbon\Carbon::parse()->format('Y-m-d') . '/' . rand();
        $this->pathImageTemp = 'user/images/profile/';
        $this->pathImage = $request->username . '/' . $rand . '/';
        $image_quality = ['original', 'thumb'];
    
        foreach ($image_quality as $value) {
            $fullPath = $this->pathImageTemp . $this->pathImage . $value . '/';
            // Generating save temp image
            $thumbImg = \Image::make($photo->getRealPath());
            ( $value == 'thumb' ? $thumbImg = $thumbImg->resize(200, 200) : '');
            
            // Make directory
            $this->makeDirectory($fullPath);
            $fileImage = $thumbImg->save($fullPath . $imagename);
//            // Save to storage disk
            \Storage::disk('public')->put($fullPath . $imagename, $fileImage->__toString());
//            // Path quality
            $this->pathQuality[$value] = $this->pathImage . $value . '/' . $imagename;
        }
    }
    
    protected function resize(){
            
    }

    protected function makeDirectory($pathImage) {
       
        File::exists($pathImage, 0777) or
                File::makeDirectory($pathImage, 0777, true);
    }

}
