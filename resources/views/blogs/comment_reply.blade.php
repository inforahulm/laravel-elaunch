
@foreach($comments as $comment)
    <div class="display-comment" >
        <strong>{{ $comment->user->name }}</strong>
        <p>{{ $comment->comment }} <span style="float: right">{{$comment->created_at->diffForHumans()}}</span></p>

        <div style="display: flex">
            <form method="post" action="{{ route('reply.add') }}" >
                @csrf
                <div class="form-group">
                    <input type="text" name="comment" class="form-control" />
                    @error('comment')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <input type="hidden" name="blog_id" value="{{ $blog_id }}" />
                    <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-info"><i class="fa fa-reply">reply</i></button>
                </div>
            </form>
        </div>
        @include('blogs.comment_reply', ['comments' => $comment->reply])
    </div>
@endforeach



