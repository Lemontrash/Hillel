<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\User;
use function Couchbase\basicDecoderV1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserConrtoller extends Controller
{

    public function show($id)
    {
        if(Auth::id() != $id){
            return back();
        }
        $user = User::find(Auth::id());

        $totalRep = $this->getTotalRep();
        return view('user', ['user' => $user, 'reputation' => $totalRep]);
    }

    public static function getTotalRep(){
        $postsByUser = Post::where('user_id', Auth::id())->get();
//        dd($postsByUser);

        $commentsByUser = Comment::where('user_id', Auth::id())->get();

        $postLikes = 0;
        $commentLikes = 0;
        foreach ($postsByUser as $post) {
            if(DB::select('select * from likables where likables_id = ? and likables_type = ?', array($post->id, 'App\Post'))){
                $postLikes++;
            }
        }
        foreach ($commentsByUser as $comment) {
            if(DB::select('select * from likables where likables_id = ? and likables_type = ?', array($comment->id, 'App\Comment'))){
                $commentLikes++;
            }
        }
        $commentLikes = $commentLikes/2;
        $totalRep = $postLikes + $commentLikes;

        return $totalRep;
    }

    public function editPersonalInfo(Request $request)
    {
        $login = $request->get('login');
        $name = $request->get('name');
        $email = $request->get('email');
        if ($request->get('login') == null){
            $login = User::find(Auth::id())->login;
        }
        if ($request->get('name') == null){
            $name = User::find(Auth::id())->username;
        }
        if($request->get('email') == null){
            $email = User::find(Auth::id())->email;
        }

        $data = [
            'login' => $login,
            'username' => $name,
            'email' => $email
        ];

        User::find(Auth::id())->update($data);
        return redirect(route('showUser', ['id' => Auth::id()]));
    }

    public function showDeletePost()
    {
        if(Auth::check()){
            $posts = Post::where('user_id', Auth::id())->get();
            return view('deletePostUser', ['posts' => $posts,]);
        }
        return back();
    }

    public function showDeleteComment()
    {
        if (Auth::check()){
            $comments = Comment::where('user_id', Auth::id())->get();
            return view('deleteCommentUser', ['comments' => $comments,]);
        }
        return back();
    }

    public function showAllPosts()
    {
        if(Auth::check()){
            $posts = Post::where('user_id', Auth::id())->get();
            return view('postsByUser', ['posts' => $posts]);
        }
        return back();
    }

    public function showChangeComment()
    {
        if (Auth::check()){
            $comments = Comment::where('user_id', Auth::id())->get();
            return view('changeCommentUser', ['comments' => $comments]);
        }
        return back();
    }

    public function showPersonalInfoPage(){
        if(Auth::check()){
            return view('changePersonalInfo');
        }
        return back();
    }

    public function deletePost(Request $request){
        $post = Post::find($request->id);
        $post->delete();
        return redirect(route('home'));
    }
    public function deleteComment(Request $request){
        $comment = Comment::find($request->id);
        $comment->delete();
        return redirect(route('home'));
    }

    public function showChangePost(){
        if (Auth::check()){
            $posts = Post::where('user_id', Auth::id())->get();
            return view('changePostUser', ['posts' => $posts]);
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


}
