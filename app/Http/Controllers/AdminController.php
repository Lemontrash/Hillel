<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class AdminController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if (Auth::check()){
            if (Auth::user()->role == 'admin'){
                $posts = Post::all();
                $comments = Comment::all();
                return view('admin', ['posts' => $posts, 'comments' => $comments]);
            }
            return back();
        }
        return back();
    }
    public function showChangePost()
    {
        if (Auth::check()){
            if (Auth::user()->role == 'admin'){
                $posts = Post::all();
                $comments = Comment::all();
                return view('changePost', ['posts' => $posts, 'comments' => $comments]);
            }
            return back();
        }
        return back();
    }
    public function showDeletePost()
    {
        if (Auth::check()){
            if (Auth::user()->role == 'admin'){
                $posts = Post::all();
                $comments = Comment::all();
                return view('deletePost', ['posts' => $posts, 'comments' => $comments]);
            }
            return back();
        }
        return back();
    }
    public function showChangeComment()
    {
        if (Auth::check()){
            if (Auth::user()->role == 'admin'){
                $posts = Post::all();
                $comments = Comment::all();
                return view('changeComment', ['posts' => $posts, 'comments' => $comments]);
            }
            return back();
        }
        return back();
    }
    public function showDeleteComment()
    {
        if(Auth::check()){
            if (Auth::user()->role == 'admin'){
                $posts = Post::all();
                $comments = Comment::all();
                return view('deleteComment', ['posts' => $posts, 'comments' => $comments]);
            }
            return back();
        }
        return back();
    }

    public function changePost(Request $request){
        $pic = $request->pic;
        $title = $request->title;
        $content = $request->get('content');
        if ($request->pic == null){
            $pic = Post::find($request->id)->pic;
        }
        if ($request->title == null){
            $title = Post::find($request->id)->title;
        }
        if($request->get('content') == null){
            $content = Post::find($request->id)->content;
        }
        $data = [
            'pic' => $pic,
            'title' => $title,
            'content' => $content
        ];
        Post::where('id', $request->id)->update($data);
        return redirect(route('admin'));
    }

    public function deletePost(Request $request){
        $post = Post::find($request->id);
        $post->delete();
        return redirect(route('home'));
    }

    public function changeComment(Request $request){
        $content = $request->get('content');
        if($request->get('content') == null){
            $content = Comment::find($request->id)->body;
        }
        $data = [
            'body' => $content
        ];
        Comment::where('id', $request->id)->update($data);
        return redirect(route('admin'));
    }

    public function deleteComment(Request $request){
        Comment::find($request->id)->delete();

        return redirect(route('admin'));
    }
}
