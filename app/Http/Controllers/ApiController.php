<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserApiLoginRequest;
use App\Http\Requests\UserApiRequest;
use App\Http\Requests\UserUpdateApiRequest;
use App\Http\Resources\ApiResoure;
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

        public function register(Request $request){
            $data_array = array(
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'otp_code' => random_int(1000, 9999),
                'auth-type'=>$request['auth-type']
            );
    
  
        if ($request['auth-type'] == 'facebook') {
            $data_array['facebook_id'] = $request['facebook_id'];

        } elseif ($request['auth-type']=='google'){
            $data_array['google_id'] = $request['google_id'];      
        }
        $user= User::create($data_array);

         return response()->json([
                'message' => 'Successfully created user and Mail send!'
            ], 201);

        }
    
        /// login //////
    
        public function login(UserApiLoginRequest $request){ 
       
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                $user = Auth::user();
                $responseArray['token'] = $user->createToken('MyApp')->accessToken;

                return response()->json($responseArray,201);

            }
            elseif($user_google=User::where('google_id',$request->google_id)->whereNotNull('google_id')->first()){

                $responseArray['token'] = $user_google->createToken('MyApp')->accessToken;
                return response()->json($responseArray,201);

            }elseif($user_facebook=User::where('facebook_id',$request->facebook_id)->whereNotNull('facebook_id')->first()){

                $responseArray['token'] = $user_facebook->createToken('MyApp')->accessToken;
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

        public function index(){
            $users=User::all();
            return ApiResoure::collection($users);
        }

        public function show($id){
             $user=User::findOrFail($id);
             return new ApiResoure($user);
        }

        public function update(Request $request, $id){
            $user=User::findOrFail($id); 
            $request->validate([
                'email' => 'required|email|unique:users,email,'.$user->id,  
            ]);
        
            $input=$request->all();
         
            $password= Hash::make($request['password']);
            $input['password']=$password;
            $user->update($input);
            return new ApiResoure($user);
            // return response()->json($input,201);
            

        }

        public function destroy($id){
            $user=User::findOrFail($id);
            $user->delete();
            return new ApiResoure($user);
        }
        
}







