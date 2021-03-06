<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
use App\Category;
use App\Tag;
use Purifier;
use Image;
use Storage;

class PostController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate data
        $this->validate($request, [
          'title' => 'required|max:255',
          'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
          'category' => 'integer',
          'body' => 'required',
          'image' => 'sometimes|image'
        ]);

        //store onto database::eloquent
        $post = new Post;
        $post->title = $request->title;
        $post->slug  = $request->slug;
        $post->category_id  = $request->category;
        $post->body = Purifier::clean($request->body);
        //dd($request);
        //check if image was uploaded
        if ($request->hasFile('image')) {
          $image = $request->file('image');
          $fileName = time().'.'.$image->getClientOriginalExtension();
          $location = public_path('images/'.$fileName);
          Image::make($image)->resize(800, 400)->save($location);
          $post->image = $fileName;
        }


        $post->save();

        //tag association
        $post->tags()->sync($request->tags, false);

        //success message
        Session::flash('success', 'New post created!');

        //redirect
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        $categories = Category::all();
        $cats = array();//form needs name value pairs
        foreach ($categories as $category) {
          $cats[$category->id] = $category->name;
        }

        $tags = Tag::all();
        $tags2 = array();//form needs name value pairs
        foreach ($tags as $tag) {
          $tags2[$tag->id] = $tag->name;
        }

        return view('posts.edit')->withPost($post)->withCats($cats)->withTags($tags2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $post = Post::find($id);

      $this->validate($request, [
        'title' => 'required|max:255',
        'slug' => "required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
        'category' => 'integer',
        'body' => 'required',
        'image' => 'sometimes|image'
      ]);


      //save to db

      $post->title = $request->input('title');
      $post->slug = $request->input('slug');
      $post->category_id  = $request->category;
      $post->body  = Purifier::clean($request->input('body'));

      if ($request->hasFile('image')) {
        $image = $request->file('image');
        $fileName = time().'.'.$image->getClientOriginalExtension();
        $location = public_path('images/'.$fileName);
        Image::make($image)->resize(800, 400)->save($location);
        $oldImage = $post->image;
        Storage::delete($oldImage);
        $post->image = $fileName;
      }


      $post->save(['timestamps' => true]);

      //tag association with true to override relations
      if(isset($request->tags))
        $post->tags()->sync($request->tags, true);
      else {
        $post->tags()->sync([], true);
      }
      //Flash Message
      Session::flash('success', 'Updated the post successfully!');

      //Redirect with flash message and post id
      return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        //path = storage_path('app/public/images/');
        Storage::delete($post->image);
        $post->tags()->detach();
        $post->delete();

        Session::flash('success', 'The post was successfully deleted!');
        return redirect()->route('posts.index');
    }
}
