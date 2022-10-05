<?php

namespace App\Validators;

use App\Interfaces\Validators\IValidateModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginValidator implements IValidateModel
{
    public function validate(Request $request)
    {
        // dd(Request()->all());


        $validator = Validator::make( $request->all() , [
            'phone'       => 'required',
            'password'     => 'required',


        ]  , [
            'phone.required' =>'please enter your phone',
            'password.required' =>'Please Enter Your password',
            ] );
        // check type equal rent should to add rent type


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
