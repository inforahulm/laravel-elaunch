@extends('layouts.app')

@section('content')
    <a href="{{route('employees.create')}}" class="btn btn-outline-primary float-right">create</a>
</br>
</br>
    <div class="container">
        <x-alert/>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">  
                    <div class="card-header">List</div>
                    <div class="card-body">
                        <table class="table table-bordered dataTable">
                            <tr>
                                <th>Sr No.</th>
                                <th>Name</th>
                                <th>Author</th>
                                <th>created by</th>
                                <th>photos</th>
                                <th colspan="2" class="text-center">Action</th>
                            </tr>
                            @php $i = 1; @endphp
                            @foreach($employees as $employee)
                                <tr id="employee{{$employee->id}}">
                                    <td>{{$i++}}</td>
                                    <td>{{$employee->name}}</td>
                                    <td>{{$employee->author}}</td>
                                    <td>{{$employee->user->name}}</td>
                                        <td><img height="100px" src="{{asset($employee->image)}}"></td>
                                    <td>
                                        <a href="{{route('employees.show',$employee->id)}}"
                                           class="btn btn-success">show</a>
                                    </td>
                                    <td>
                                        <a href="{{route('employees.edit',$employee->id)}}"
                                           class="btn btn-success">edit</a>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-danger delete" data-id="{{$employee->id}}">delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
