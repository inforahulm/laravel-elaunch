@extends('layouts.app')
@section('content')

<div class="card">
    <x-alert/>
    <div class="card-header">{{ __('Role List') }}</div>
    <div class="card-body">

        @if(in_array('role_create',getUserPermissions())) 
        <a href="{{ route('roles.create') }}" class="btn btn-primary">Add New Role</a>
        @endif
            <table class="table table-borderless table-hover">
                        <tr class="bg-info text-light">
                            <th class="text-center">ID</th>
                            <th>Title</th>
                            <th colspan="3">Action</th>
                        </tr>
                @forelse ($roles as $role)
                    <tr>
                        <td class="text-center">{{$role->id}}</td>
                        <td>{{$role->title}}</td>
                        <td>
                            @if(in_array('role_show',getUserPermissions())) 
                            <a href="{{ route('roles.show', $role->id) }}" class="btn btn-sm btn-success">View</a>
                            @endif
                            @if(in_array('role_edit',getUserPermissions())) 
                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            @endif
                            @if(in_array('role_delete',getUserPermissions())) 
                            <form action="{{ route('roles.destroy', $role->id) }}" class="d-inline-block" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                            @endif
                         </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="100%" class="text-center text-muted py-3">No Permissions Found</td>
                        </tr>
                @endforelse
            </table>
    </div>
</div>
@endsection
