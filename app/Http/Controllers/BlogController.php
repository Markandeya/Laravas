<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function single($slug) {
      $post = Post::where('slug', '=', $slug)->first();

      return view('blog.single')->withPost($post);
    }

    public function index() {
      $posts = Post::orderBy('id', 'desc')->paginate(10);
      return view('blog.index')->withPosts($posts);
    }
}
