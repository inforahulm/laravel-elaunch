<?php
namespace App\Repositories;
use App\Models\User;
use App\Models\Role;

class UserRepository implements UserRepositoryInterface
{
    public function all()
    {
        return User::with('role')->get();
    }

    public function create()
    {
        return Role::pluck('title','id');
    }

    public function get($id)
    {
      return Role::pluck('title','id');
    }

    public function store(array $data)
    {
    $data['otp_code']=random_int(1000, 9999);
    return User::create($data);
    }

    public function delete($id)
    {
        return User::destroy($id); 
    }

    public function update($id,array $data)
    {
    return User::find($id)->update($data);
    }
}