<?php
namespace App\Repositories;
use App\Models\Employee;
Use Illuminate\Support\Facades\Auth;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    
    public function all()
    {
        return Employee::with('user')->where('user_id',Auth::id())->get();      
    }

    public function get($id)
    {
      return Employee::find($id);
    }

    public function read($id)
    {
        return Employee::with('posts')->where('user_id',Auth::id())->find($id);
    }

    public function store(array $data)
    {
        $data['user_id'] = Auth::id();
        return Employee::create($data);
    }

    public function delete($id)
    {
        return Employee::destroy($id);  
    }

    public function update($id,array $data)
    {
        return Employee::find($id)->update($data);
    }
}

