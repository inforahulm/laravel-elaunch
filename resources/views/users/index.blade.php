@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">{{ __('Users List') }}</div>

        <div class="card-body">
            @can('user_create')
            <a href="{{route('users.create')}}" class="btn btn-primary">Add New User</a>
            @endcan

                <table class="table table-borderless table-hover">
                            <tr class="bg-info text-light">
                                <th class="text-center">ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                            
                    @foreach ($users as $user)
                        <tr>
                            <td class="text-center">{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role->title ?? "--"}}</td>
                            <td>
                             
                                        <a href="{{route('users.show',$user->id)}}" class="btn btn-sm btn-success">Show</a>
                                        <a href="{{route('users.edit',$user->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                
                                <form action="{{ route('roles.destroy', $user->id) }}" class="d-inline-block" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
        </div>
    </div>

@endsection
