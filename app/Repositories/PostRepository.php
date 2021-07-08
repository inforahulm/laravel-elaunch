<?php
namespace App\Repositories;
use App\Models\Post;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;


class PostRepository implements PostRepositoryInterface
{ 
    public function all()
    {
       return Post::with(['user','employee'])->where('user_id',Auth::id())->get();
    
    }

    public function create()
    {
       return Employee::where('user_id',Auth::id())->get();
    }

    public function store(array $data)
    {
        $data['user_id'] = Auth::id();
        return Post::create($data);
    }

    public function delete($id)
    {
        return post::destroy($id);
    }

 

} 