@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">{{ __('Users List') }}</div>

        <div class="card-body">
            @if(in_array('user_create',getUserPermissions()))
            <a href="{{route('users.create')}}" class="btn btn-primary">Add New User</a>
            @endif

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
                                @if(in_array('user_show',getUserPermissions()))
                                <a href="{{route('users.show',$user->id)}}" class="btn btn-sm btn-success">Show</a>
                                @endif
                                @if(in_array('user_edit',getUserPermissions()))
                                <a href="{{route('users.edit',$user->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                @endif 
                                @if(in_array('user_delete',getUserPermissions()))
                                <form action="{{ route('roles.destroy', $user->id) }}" class="d-inline-block" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
        </div>
    </div>

@endsection
