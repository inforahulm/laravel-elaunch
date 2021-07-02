@extends('layouts.app')
@section('content')
    <a href="{{route('blogs.create')}}" class="btn btn-outline-primary float-right">create</a>
</br>
</br>
    <div class="container">
        <x-alert/>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Lists</div>
                    <div class="card-body">
                        <table class="table table-bordered dataTable">
                            <tr>
                                <th>Sr No.</th>
                                <th>Title</th>
                                <th colspan="2" class="text-center">Action</th>
                            </tr>
                            @php $i = 1; @endphp
                            @foreach($blogs as $blog)
                                <tr id="blog{{$blog->id}}" >
                                    <td>{{$i++}}</td>
                                    <td>{{$blog->title}}</td>
                                    <td>
                                        <a href="{{route('blogs.show',$blog->id)}}" class="btn btn-success">show</a>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-danger blog_delete" data-id="{{$blog->id}}">delete</button>
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








