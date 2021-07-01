@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{route('employees.index')}}" class="btn btn-outline-dark">back</a>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">View</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <td>Name</td>
                                <td>{{$employee->name}}</td>
                            </tr>
                            <tr>
                                <td>author</td>
                                <td>{{$employee->author}}</td>
                            </tr>
                            <tr>
                                <td>posts name</td>
                                <td>
                                    @foreach($employee->posts as $post)
                                        <li>{{$post->name}}</li>
                                        <li>{{$post->comment}}</li>
                                    @endforeach
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


