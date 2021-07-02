@extends('layouts.app')
@section('content')
    <a href="{{route('posts.create')}}" class="btn btn-outline-primary float-right">create</a>
</br>
</br>
    <div class="container pt-3">
        <x-alert/>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Lists</div>
                    <div class="card-body">
                        <table class="table table-bordered dataTable">
                            <tr>
                                <th>Sr No.</th>
                                <th>Name</th>
                                <th>Comment</th>
                                <th>employee name</th>
                                <th>created by</th>
                                <th>Action</th>
                            </tr>
                            @php $i = 1; @endphp
                            @foreach($posts as $post)
                                <tr id="post{{$post->id}}">
                                    <td>{{$i++}}</td>
                                    <td>{{$post->name}}</td>
                                    <td>{{$post->comment}}</td>
                                    <td>{{$post->employee->name}}</td>
                                    <td>{{$post->user->name}}</td>
                                    <td>
                                        <button type="submit" class="btn btn-danger post_delete"
                                                data-id="{{$post->id}}">delete
                                        </button>
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







