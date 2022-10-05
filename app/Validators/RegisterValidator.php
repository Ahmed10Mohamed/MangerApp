<?php

namespace App\Validators;

use App\Interfaces\Validators\IValidateModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterValidator implements IValidateModel
{
    public function validate(Request $request)
    {
        // dd(Request()->all());


        $validator = Validator::make( $request->all() , [
            'full_name'=>'required',
            'phone' => 'required|numeric|digits:11|unique:clients,phone,NULL,id,deleted_at,NULL' ,
            'password'   => 'required|min:6|confirmed',

        ]  , [
            'full_name.required'=>'Please Enter Full Name',
            'phone.required'=>'Please Enter phone',
            'phone.unique'=>'This phone Already Used Before',
            'phone.digits'=>'This phone should to be 11 Number',
            'phone.numeric' =>'phone should to be number',
            'password.required' =>'Please Enter Your password',
            'password.min' =>'Password Must Be At Least 6 Characters',
            'password.confirmed' =>'Password & Its Confirmation Not Matching',
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
