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
Use App\Repositories\EmployeeRepositoryInterface;

class EmployeeController extends Controller
{

    protected $employeeRepo;

    public function __construct(EmployeeRepositoryInterface $employeeRepo)
    {
        $this->employeeRepo = $employeeRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $employees = $this->employeeRepo->all();     
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
 
        $image=$request->file('image');
        $filename = $image->getClientOriginalName();
        $path=Storage::putFileAs('images',$image,$filename);

        $data=$request->all();
        $data['image']=$filename;

        $this->employeeRepo->store($data);
        return redirect()->route('employees.index')->with('message', 'File Upload Successfully ');
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Employee $employee
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee=$this->employeeRepo->read($id);
        return view('employees.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Employee $employee
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee=$this->employeeRepo->get($id);
        return view('employees.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Employee $employee
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EmployeeRequest $request, $id)
    {
        $employee=Employee::findOrFail($id);
        $oldname=$employee->image;
        if(Storage::exists('storage/images/'.$oldname)) {
            unlink('storage/images/'.$oldname);
        }
        
        $image=$request->file('image');
        $filename = $image->getClientOriginalName();
        $path=Storage::putFileAs('images',$image,$filename);
        
        $data=$request->all();
        $data['image']=$filename;
       $employee=$this->employeeRepo->update($id,$data);
       return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Employee $employee
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $employee=$this->employeeRepo->delete($id);
        return response()->json([
            'success'=>'record deleted'
        ]);
    }
}
