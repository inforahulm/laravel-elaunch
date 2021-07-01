@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{route('blogs.index')}}" class="btn btn-outline-dark">back</a>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Create Post</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('blogs.store') }}">
                            <div class="form-group">
                                @csrf
                                <label class="label">Blog Title: </label>
                                <input type="text" name="title" class="form-control" />
                                @error('title')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="label">Blog Body: </label>
                                <textarea name="body" class="form-control" ></textarea>
                            </div>
                            @error('body')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                            <div class="form-group">
                                <input type="submit" class="btn btn-success " >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection