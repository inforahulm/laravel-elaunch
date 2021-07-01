@extends('layouts.app')
<style>
    .display-comment .display-comment {
        margin-left: 40px
    }
</style>
@section('content')
    <div class="container">
        <a href="{{route('blogs.index')}}" class="btn btn-outline-dark">back</a>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <p><strong>{{ $blog->title }}</strong></p>
                        <p>
                            {{ $blog->body }}
                        </p>
                        <hr />
                        @include('blogs.comment_reply', ['comments' => $blog->comments, 'blog_id' => $blog->id])

                        <h4>Add comment</h4>
                        <form method="post" action="{{ route('comment.add') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="comment" class="form-control" />
                                @error('comment')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror

                                <input type="hidden" name="blog_id" value="{{ $blog->id }}" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-warning" value="Add Comment" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
