<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CLientRequest;
use App\Http\Resources\UserResource;
use App\Models\Client;
use App\Models\Repositories\ClientRepository;
use App\Validators\imageValidator;
use App\Validators\LoginValidator;
use App\Validators\RegisterValidator;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{

    private LoginValidator  $loginValidator;
    private RegisterValidator $registerValidator;
    private ClientRepository $clientRepository;
    public function __construct(LoginValidator $loginValidator , RegisterValidator $registerValidator ,ClientRepository $clientRepository)
    {
        $this->loginValidator = $loginValidator;
        $this->registerValidator = $registerValidator;
        $this->clientRepository = $clientRepository;
    }

    public function register(Request $request){
        $validator = $this->registerValidator->validate($request);
        if ($validator instanceof JsonResponse) {
            return $validator;
        }

       $client = $this->clientRepository->store($request);
       $access_token = $client->createToken('MangerApp')->accessToken;
       $client['access_token'] = $access_token;
       $data = new UserResource($client);
       return response()->json(['success' => true, 'data'=>$data, 'message'=>('register success'), 'code'=>200]);
   }

    public function login(Request $request)
    {
        $validator = $this->loginValidator->validate($request);
        if ($validator instanceof JsonResponse) {
            return $validator;
        }


            $client = Client::where('phone', $request->phone)->first();

            if($client === NULL)
            {
                return response()->json(['success' => false, 'message'=>('opps ! this user not found or this phone not correct'), 'code'=>401],401);
            }
            else if(Hash::check($request->password, $client->password))
            {

                $access_token = $client->createToken('MangerApp')->accessToken;
                $client['access_token'] = $access_token;
                $data = new UserResource($client);
                return response()->json(['success' => true, 'data'=>$data, 'message'=>('login success'), 'code'=>200]);
            }
            else
            {
                return response()->json(['success' => false, 'message'=>('opps ! this user not found or this password not correct'), 'code'=>401]);
            }


    }


}
