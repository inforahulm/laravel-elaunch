<?php

namespace App\Http\Controllers;

use App\Models\Post;
use http\Env\Response;
use Illuminate\Pagination\Paginator;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with('user')->where('user_id',Auth::id())->get();      
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(EmployeeRequest $request)
    {
    //    $images=$request->file('image');
    //    foreach ($images as $image){
    //    $filename = $image->getClientOriginalName();
    //    $path=Storage::putFileAs('images',$image,$filename);

    //    }
        $image=$request->file('image');
        $filename = $image->getClientOriginalName();
        $path=Storage::putFileAs('images',$image,$filename);

        $employees = Employee::create([
            'name' => $request->name,
            'author' => $request->author,
            'image'=>$filename,
            'user_id'=>Auth::id(),
        ]);
        return redirect()->route('employees.index')->with('message', 'File Upload Successfully ');
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Employee $employee
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $employee=Employee::with('posts')->where('user_id',Auth::id())->find($employee->id);
        return view('employees.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Employee $employee
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Employee $employee
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
       $input=$request->all();

        $oldname=$employee->image;
        if(Storage::exists('storage/images/'.$oldname)) {
        unlink('storage/images/'.$oldname);
        }

        $image=$request->file('image');
        $filename = $image->getClientOriginalName();
        $path=Storage::putFileAs('images',$image,$filename);
        
        $input['image']=$filename;
       $employee->update($input);
       return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Employee $employee
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json([
            'success'=>'record deleted'
        ]);
    }
}
