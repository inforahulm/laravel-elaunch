<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use App\Repositories\UserRepositoryInterface;

class UserController extends Controller
{
    protected $userRepo;
    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo=$userRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return void
     * @throws \Exception
     */
    public function index()
    {
        $users =$this->userRepo->all();
        return view('users.index', compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->userRepo->create();
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
       
        $data=$request->all();
        $password= Hash::make($request['password']);
        $data['password']=$password;
        $this->userRepo->store($data);
        return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::findOrFail($id);
        $roles = $this->userRepo->get($id);
        return view('users.edit',compact('roles','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $user=User::findOrFail($id);
        $request->validate([
            'name' => 'required|string|min:2|max:200',
            'email' => 'required|email|unique:users,email,'.$user->id,
            
        ]);
        $user=$this->userRepo->update($id,$request->all());
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $user=$this->userRepo->delete($id);
        return redirect()->route('users.index');
    }
    

    public function register(UserRequest $request)
    {
        $user= User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'otp_code' => random_int(1000, 9999),
        ]);
      
        Mail::to($request['email'])->send(new WelcomeMail($user));

        return redirect()->route('verifyotp',['email'=>$request->email]);
       
    }
    public function resend(Request $request)
    {
        $user=User::where('email',$request->email)->first();
        $user->otp_code= random_int(1000, 9999);
        $user->save();
    
        Mail::to($request['email'])->send(new WelcomeMail($user));

        return redirect()->route('verifyotp',['email'=>$request->email]);      
    }


    public function verify(Request $request)
    {
       $email=$request->email;
       $error=$request->error;
       return view('verification',compact('email','error'));
    }
    
    public function confirm(Request $request)
    {
        $user=User::where('email',$request->email)
            ->where('otp_code',$request->otp_code)->first();
        if(empty($user)){
            return redirect()->route('verifyotp',['email'=>$request->email,'error'=>'This is invalid otp']);
        }
        Auth::login($user);
        return redirect()->route('home');
    }
}
