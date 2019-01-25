<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function  findPostByTitle(Request $request){
        $title = $request->search;
        $searchResults = [];
        $posts = Post::all();
        foreach ($posts as $post) {
            if ($post->title == $title) {
                $searchResults[] = $post;
            }
        }

        $counter = 0;
        return view('searchResults', ['posts' => $searchResults, 'counter' => $counter]);
    }
}
