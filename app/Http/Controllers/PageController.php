<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Mail;
use Session;

class PageController extends Controller
{
    public function index() {
      $posts = Post::orderBy('id', 'desc')->take(5)->get();
      return view('pages.welcome')->withPosts($posts);
    }

    public function getContact() {
      return view('pages.contact');
    }

    public function postContact(Request $request) {
      $this->validate($request, [
        'email' => 'required|email',
        'subject' => 'required|min:3',
        'body' => 'required|min:10'
      ]);

      $data = [
        'email' => $request->email,
        'subject' => $request->subject,
        'body' => $request->body
      ];

      Mail::send('emails.contact', $data, function($message) use ($data){
        $message->from($data['email']);
        $message->to('test@gmail.com');
        $message->subject($data['subject']);
      });

      Session::flash('success', 'Mail was sent successfully!');
      return view('pages.contact');
    }

    public function about() {
      return view('pages.about');
    }
}
