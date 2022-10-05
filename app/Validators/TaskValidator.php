<?php

namespace App\Validators;

use App\Interfaces\Validators\IValidateModel;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskValidator implements IValidateModel
{
    public function validate(Request $request)
    {
        // dd(Request()->all());


        $validator = Validator::make( $request->all() , [
            'title' => 'required' ,
            'group' => 'required' ,

        ]  , [
            'title.required' =>'Please Enter title of task',
            'group.required' =>'Please Select group',

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
        $group = Group::find($request->group);
        if($group == Null){
            return response()->json([
                'status'=>false ,
                'message'=>'Opps ! This Group Not Found Or This ID Not Correct',
                'code'=>400 ,
            ],400);
        }


    }


}
