<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommnentsResquest;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Employee;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $comments=Comment::with('user')->where('user_id',Auth::id())->get();
        return view('comments.index',compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CommnentsResquest $request)
    {
        $comment = new Comment;
        $comment->comment = $request->comment;

        $comment->user()->associate(Auth::id());

        $post = Blog::find($request->get('blog_id'));
        $post->comments()->save($comment);
        return back();
    }
    public function replyStore(CommnentsResquest $request)
    {
        $reply = new Comment();
        $reply->comment = $request->comment;
        $reply->user()->associate(Auth::user());
        $reply->parent_id = $request->parent_id;

        $post = Blog::find($request->get('blog_id'));
        $post->comments()->save($reply);
        return back();
    }

        /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Comment $comment)
    {
      $comment->delete();
        return redirect()->route('comments.index')->with('message', 'File delete Successfully ');
    }
}
