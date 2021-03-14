<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;

//if you want to use sql queries directly
use DB;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       ;
       // return $posts;
       //$posts = Post::all(); //returns all the rows in table
       //$posts = DB::select('SELECT * FROM posts WHERE 1=1'); //normal sql that returns all the rows in the table
        //$posts = Post::orderBy('created_at','desc')->get(); //returns all the posts by descending order
        //$posts = Post::orderBy('created_at','desc')->take(1)->get(); //returns a certain number of posts 
        
        //returns the posts and paginates them
        $posts = Post::orderBy('created_at','desc')->paginate(12);
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'body'=>'required',
            'cover_image'=> 'image|nullable|max:1999'
        ]);
        
        //handle file upload
        if($request->hasFile('cover_image')){
            //Get file name with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            //Get just filename (note pathinfo is a normal php function to get info about file)
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //$extension = pathinfo($fileNameWithExt, PATHINFO_EXTENSION);

            //set unique name
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            //upload image
            $path = $request->file('cover_image')->storeas('public/coverimage', $fileNameToStore);
        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }

        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('/posts')->with('success','Post Created');

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
        return view('posts.show')->with('post', $post);
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
        //check for correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorised Page');
        };
        return view('posts.edit')->with('post', $post);

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
        $this->validate($request, [
            'title'=>'required',
            'body'=>'required',
            'cover_image'=> 'image|nullable|max:1999'
        ]);

        //handle file upload
        if($request->hasFile('cover_image')){
            //Get file name with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            //Get just filename (note pathinfo is a normal php function to get info about file)
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //$extension = pathinfo($fileNameWithExt, PATHINFO_EXTENSION);

            //set unique name
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            //upload image
            $path = $request->file('cover_image')->storeas('public/coverimage', $fileNameToStore);
        }

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');

        //if they actually uploaded an image, delete first image replace
        if($request->hasFile('cover_image')){
            if($post->cover_image !== 'noimage.jpg'){
                Storage::delete('public/coverimage/'.$post->cover_image);
            }
            $post->cover_image = $fileNameToStore;
        }

        $post->save();

        return redirect('/posts/'.$id)->with('success','Post Updated');
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
        //check for correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorised Page');
        };

        if($post->cover_image != 'noimage.jgp'){
            //delete image
            Storage::delete('public/coverimage/'.$post->cover_image);

        }
        $post->delete();

        return redirect('/posts')->with('success','Post Deleted');
    }
}
