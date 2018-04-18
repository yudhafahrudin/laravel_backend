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
    protected $widthSize = 200;
    protected $heightSize = 200;
    protected $backgroundCanvas;

    public function saveImage($request) {
        $photo = $request->file('photo');

        $this->backgroundCanvas = \Image::canvas($this->widthSize, $this->heightSize);

        // File named
        $imagename = time() . '.' . $photo->getClientOriginalExtension();

        // Initialize variable in upload images
        $rand = \Carbon\Carbon::parse()->format('Y-m-d') . '/' . rand();
        $this->pathImageTemp = 'admin/user/images/profile/';
        $this->pathImage = $request->username . '/' . $rand . '/';
        $image_quality = ['original', 'thumb'];

        foreach ($image_quality as $value) {
            $fullPath = $this->pathImageTemp . $this->pathImage . $value . '/';
            // Generating save temp image
            $thumbImg = \Image::make($photo->getRealPath());
            ( $value == 'thumb' ? $thumbImg = $this->resize($thumbImg) : '');
            // Make directory
//            $this->makeDirectory($fullPath);
//            $fileImage = $thumbImg->save($fullPath . $imagename);
            $thumbImg->stream(); 
//            // Save to storage disk
            \Storage::disk('public')->put($fullPath . $imagename, $thumbImg);
//            // Path quality
            $this->pathQuality[$value] = $this->pathImage . $value . '/' . $imagename;
        }
    }

    protected function resize($image) {
        $image->resize($this->widthSize, $this->heightSize, function ($contraint) {
            $contraint->aspectRatio();
            $contraint->upsize();
        });
        return $this->backgroundCanvas->insert($image, 'center');
    }

    protected function makeDirectory($pathImage) {

        File::exists($pathImage, 0777) or
                File::makeDirectory($pathImage, 0777, true);
    }

}
