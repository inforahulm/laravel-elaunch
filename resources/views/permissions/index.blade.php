@extends('layouts.app')

@section('content')

    <div class="card">
        <x-alert/>

        <div class="card-header">{{ __('Permissions List') }}</div>
        <div class="card-body">

            @if(in_array('permission_create',getUserPermissions())) 
            <a href="{{ route('permissions.create') }}" class="btn btn-primary">Add New Permission</a>
            @endif
            
                <table class="table table-borderless table-hover">
                            <tr class="bg-info text-light">
                                <th class="text-center">ID</th>
                                <th>Name</th>
                                <th colspan="2">Action</th>
                            </tr>
                            {{-- @php $i = 1; @endphp --}}
                    @forelse ($permissions as $permission)
                        <tr>
                            <td class="text-center">{{$permission->id}}</td>
                            <td>{{$permission->name}}</td>
                            <td>
                                @if(in_array('permission_edit',getUserPermissions())) 
                                <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                @endif
                                @if(in_array('permission_delete',getUserPermissions()))
                                <form action="{{ route('permissions.destroy', $permission->id) }}" class="d-inline-block" method="post">
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
