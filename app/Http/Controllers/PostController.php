<?php
namespace App\Http\Controllers;
use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function showFormForNewPost(){
        if(Auth::check()){
            return view('newPost');
        }
        return back();
    }

    public function userCreatePost(Request $request)
    {
        //https://goo.gl/images/4V6g8q
        $user = User::find(Auth::id());
        $request->validate([
            'pic' => 'required|url|',
            'title' => 'required|string|max:200',
            'content' => 'required|string|max:50000'
        ]);
        $data = [
            'user_id' => $user->id,
            'pic' => $request->pic,
            'title' => $request->title,
            'content' => $request->get('content'), //если обращаться через $request->content, то запрос пойдет к встроенному закрытому полю реквеста
        ];
        $post = Post::query()->create($data);
        return redirect(route('home'));
    }

    public function show()
    {
        $posts = Post::all();

        $counter = [];
        $titlefounder = [];
        if (Auth::check()) {
            $totalRep = UserConrtoller::getTotalRep();
        }else{
            $totalRep = null;
        }
        $role = null;
        if (Auth::check()){
            $user = User::find(Auth::id());
            $role = $user->role;
        }

        return view('home', [
            'posts' => $posts,
            'counter' => $counter,
            'titlefounder' => $titlefounder,
            'user' => Auth::id(),
            'userRole' => $role,
            'reputation' => $totalRep,
        ]);
    }
    public function showOne($id){
        $post = Post::find($id);
        $comments = Comment::where('post_id', $id)->get();
        return view('SinglePost', ['post' => $post, 'comments' => $comments]);
    }

}
