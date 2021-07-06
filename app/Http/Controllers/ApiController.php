<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserApiRequest;
use Illuminate\Http\Request;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\WelcomeMail;


class ApiController extends Controller
{
    public function FirstApi(Request $request)
    {
        $responneapi=[
         'status'=>'ok',
         'data'=>'22',
         'pera'=>$request->get('name')
        ];
       return response()->json($responneapi,200);
    }
    public function SecondApi($id)
    {
        $responneapi=[
         'status'=>'ok',
         'data'=>$id
        ];
       return response()->json($responneapi,200);
    }

    public function PostApi(Request $request)
    {
        $responneapi=[
         'status'=>'ok',
         'data'=>'22',
         'para'=>$request->post('name')
        ];
       return response()->json($responneapi,200);
    }

    public function list(Request $request)
    {
        $data=Permission::all();
        $responneapi=[
         'status'=>'ok',
         'data'=>$data
        ];
       return response()->json($responneapi,200);
    }
    

        ////// PASSPORT LOGIN & REGISTER /////////////

        public function register(UserApiRequest $request){ 

            $user= User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'otp_code' => random_int(1000, 9999),
                
            ]);
            Mail::to($request['email'])->send(new WelcomeMail($user));

            return response()->json([
                'message' => 'Successfully created user and Mail send!'
            ], 201);
            
        }
    
        /// login //////
    
        public function login(Request $request){ 
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                $user = Auth::user();
                $responseArray['token'] = $user->createToken('MyApp')->accessToken;
                
                return response()->json($responseArray,201);
    
            }else{
                return response()->json(['error'=>'Unauthenticated'],203);
            }
        }

          /// logout //////

        public function logout(Request $request){
            $request->user()->token()->revoke();
            return response()->json([
                'message' => 'Successfully logged out'
            ]);
        }

        public function user(Request $request){
            return response()->json($request->user());
        }
        
}











    // $validator = Validator::make($request->all(),[
            //     'name'=>'required',
            //     'email'=>'required|email',
            //     'password'=>'required',
            //     'c_password'=>'required|same:password'
            // ]);
    
            // if($validator->fails()){
            //     return response()->json($validator->errors(),202);
            // }