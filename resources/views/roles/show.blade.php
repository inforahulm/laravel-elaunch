@extends('layouts.app')

@section('content')
<a href="{{route('roles.index')}}" class="btn btn-outline-dark">back</a>
    <div class="card">
        <div class="card-header">{{ __('View Role') }}</div>

        <div class="card-body">

                <table class="table table-borderless">

                    <tr>
                        <th width="25%">ID</th>
                        <td>{{ $role->id }}</td>
                    </tr>
                    <tr>
                        <th width="25%">Title</th>  
                        <td>{{ $role->title }}</td>
                    </tr>
            
                    <tr>
                        <th width="25%">Permissions</th>
                        <td>
                            @forelse ($role->permissions as $permission)
                                <div class="badge badge-success">{{ $permission->name }}</div>
                                @empty
                                No Permissions
                            @endforelse
                       </td>
                    </tr>
                </table>
        </div>
    </div>

@endsection
