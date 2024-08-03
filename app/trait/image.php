<?php

namespace App\trait;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
trait image
{
    // This Trait Aboute Image

    public function upload(Request $request,$fileName = 'image',$directory){
    if($request->has($fileName)){// if Request has a Image
        $uploadImage = new request();
        $imagePath = $request->file($fileName)->store($directory,'public'); // Take Image from Request And Save inStorage;
        return $imagePath;
    }
    return Null;
    }
}
