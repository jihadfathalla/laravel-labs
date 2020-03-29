<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ Post; //to use it's model
use App\ User;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;



class PostController extends Controller
{
    public function index()
{
        $posts = Post::paginate(3);
      //  $posts = Post::simplePaginate(3); 
        //static fun
        //select * from posts
       // dd($posts);
            
        return view('posts.index',[
            'posts' => $posts
        ]);
    }
    
    
    public function show()
    {
         $request=request();
          //dd($request->post);
         $post_id=$request->post;
         $post= Post::find($post_id); //find for primarykey
          //dd($post);
         $user_id= ($post->user_id);
          //dd($user);
         $user = User::where('id', $user_id)->first();
         //dd($user);
         //$post = User::where('id', $postId)->get();

       return view('posts.show',[
        'post'=>$post,'user'=>$user,
      ]);
    }
    
    

    public function create()
    {
      $users = User::all();
      return view('posts.create',[
        'users'=>$users,
      ]);
    }
    

    public function store(StorePostRequest $request)
   { 
     //$request=request();
   // dd($request->user_id);

  /*  $validatedData = $request->validate([
    'title' => 'required|min:3',
    'descrabtion' => 'required|min:5',
   ],[
    'title.required' => 'Please enter the title field',
    'title.min' => 'Please the title has minimum of 3 character ',
    'descrabtion.required' => 'Please enter the descrabtion field',
    'descrabtion.min' => 'Please the descrabtion has minimum of 3 character ',



   ]); */

    Post::create([
      'title' => $request->title,
      'description' =>$request->descrabtion,
      'user_id' =>$request->user_id,

    ]);

   //  dd($request-> descrabtion, $request->title);
     // return view('store');
     return redirect('/posts');
    }


    public function edit()
   { 
     $request=request();
    $post_id=$request->post;
    $post= Post::find($post_id); 
    $users = User::all();

 return view('posts.edit',[
   
   'post'=>$post,'users'=>$users,
   ]);
    }

   


public function update(UpdatePostRequest $request)
{
 
  $post_id=$request->post;
  $post= Post::find($post_id); 

    $post->update($request->all());

    return redirect('/posts');
}







    public function destroy()
   { 
    $request=request();
    $post_id=$request->post;
    $post= Post::find($post_id); 
    $post->delete();

    return redirect('/posts');
   
    }

    

    }



