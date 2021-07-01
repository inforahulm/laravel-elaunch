@extends('layouts.app')
@section('content')
    <div class="container">
        <x-alert/>
        <a href="{{route('employees.index')}}" class="btn btn-outline-dark">back</a>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Edit</div>
                    <div class="card-body">
                        <form action="{{route('employees.update',$employee->id)}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control " name="name" value="{{$employee->name}}"
                                       placeholder="Enter name" id="name">
                                @error('name')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="name">Author:</label>
                                <input type="text" class="form-control" name="author" value="{{$employee->author}}"
                                       placeholder="Enter author" id="author">
                                @error('author')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Upload Image:</label>
                                <input type="file" class="form-control" name="image" id="image">
                            </div>

                            <button type="submit" class="btn btn-primary ">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

