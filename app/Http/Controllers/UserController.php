<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return void
     * @throws \Exception
     */
    public function index(UsersDataTable $dataTable)
    {
        $users = User::with('role')->get();      
        return view('users.index', compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('title','id');
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
        $user= User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'otp_code' => random_int(1000, 9999),
            'role_id'=>$request['role_id'],
        ]);
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
    public function edit(User $user)
    {
        $roles = Role::pluck('title','id');
        return view('users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $input =$request->all();
        $user->update($input);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();
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
