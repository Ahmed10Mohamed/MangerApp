<?php

namespace App\Interfaces\Repositories;

use App\Models\Ads;
use Illuminate\Http\Request;

class ImageVideoUpload
{
    public function StoreImage($upload,$model){

        $image = $upload;
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/uploads/image/'.$model);
        $image->move($destinationPath, $imageName);
        $name = '/uploads/image/'.$model.'/'.$imageName;
        return $name;
    }


  

}
