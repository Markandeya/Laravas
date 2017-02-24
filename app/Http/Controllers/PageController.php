<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PageController extends Controller
{
    public function index() {
      $posts = Post::orderBy('id', 'desc')->take(5)->get();
      return view('pages.welcome')->withPosts($posts);
    }

    public function contact() {
      return view('pages.contact');
    }

    public function about() {
      return view('pages.about');
    }
}
