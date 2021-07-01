@extends('layouts.app')

@section('content')
<a href="{{route('users.index')}}" class="btn btn-outline-dark">back</a>
    <div class="card">
        <div class="card-header">{{ __('View User') }}</div>

        <div class="card-body">
                <table class="table table-borderless">

                    <tr>
                        <th>ID</th>
                        <td>{{ $user->id }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>Role</th>
                        <td>{{ $user->role->title ?? '--' }}</td>
                    </tr>

                </table>




        </div>
    </div>

@endsection
