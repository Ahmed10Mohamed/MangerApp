<?php

namespace App\Validators;

use App\Interfaces\Validators\IValidateModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class imageValidator implements IValidateModel
{
    public function validate(Request $request){
        $validator = Validator::make( $request->all() , [
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]  , [
           'image.required' =>__('please Select image'),
            'image.mimes' =>__('this image type not support'),
    ] );
        if($validator->fails())
        {
            return response()->json([
                'status'=>false ,
                'message'=>$validator->errors()->first(),
                'code'=>400 ,
            ],400);
        }
    }

}
