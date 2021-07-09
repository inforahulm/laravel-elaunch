<?php
namespace App\Repositories;
use App\Models\User;
use App\Traits\ResponceAPI;
use Illuminate\Support\Facades\Hash;
use DB;

class UserApiRepository implements UserApiRepositoryInterface
{
use ResponceAPI;

    public function all()
    {
       
        DB::beginTransaction();
        try {
            $users = User::all();
            DB::commit();
            return $this->success("All Users", $users);
            
          } catch(\Exception $e) {
            DB::rollback();
            return $this->error($e->getMessage());
          }
    }

    public function get($id)
    {
        DB::beginTransaction();
        try {
            $user = User::findOrFail($id);
            // User::create(['name' =>'vikas','email' =>'vikaooeh@gmail.com','password' =>'vikas@gmail.com']);
            DB::commit();
            return $this->success("User Detail",$user);

        } catch(\Exception $e) {
            DB::rollback();
              return $this->error($e->getMessage());
        }
    }

    public function store(array $data)
    {

        DB::beginTransaction();
  try {
      $password= Hash::make($data['password']);
      $data['password']=$password;

      $user= User::create($data);
      DB::commit();
      return $this->success("User created", $user);

      } catch(\Exception $e) {
        DB::rollback();
           return $this->error($e->getMessage());
      }
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
        $user = User::findOrFail($id);

         $user= User::destroy($id); 
         DB::commit();
         return $this->success("User delete", $user);

        } catch(\Exception $e) {
            DB::rollback();
            return $this->error($e->getMessage());
        }
    
    }

    public function update($id,array $data)
    {
        DB::beginTransaction();
        try {
            $user = User::findOrFail($id);

            $user->update($data);
            DB::commit();
            return $this->success("User update", $user);

        } catch(\Exception $e) {
            DB::rollback();
            return $this->error($e->getMessage());
          }
    }
}