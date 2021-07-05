<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;


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

        public function register(Request $request){ 

            $validator = Validator::make($request->all(),[
                'name'=>'required',
                'email'=>'required|email',
                'password'=>'required',
                'c_password'=>'required|same:password'
            ]);
    
            if($validator->fails()){
                return response()->json($validator->errors(),202);
            }
            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
    
            $user = User::create($input);
    
            $responseArray = [];
            $responseArray['token'] = $user->createToken('MyApp')->accessToken;
            $responseArray['name'] = $user->name;
            
            return response()->json($responseArray,200);  
        }
    
        /// login //////
    
        public function login(Request $request){ 
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                $user = Auth::user();
                $responseArray = [];
                $responseArray['token'] = $user->createToken('MyApp')->accessToken;
                $responseArray['name'] = $user->name;
                
                return response()->json($responseArray,201);
    
            }else{
                return response()->json(['error'=>'Unauthenticated'],203);
            }
        }
}
