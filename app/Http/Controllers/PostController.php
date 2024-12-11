<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class PostController extends Controller
{
    public function ViewPosts(){

        try{

            $userId = Auth::user()->userId;

            // $user = User::find($userId);
            // $posts = $user->posts; 


            $posts = Post::where('userId',$userId)
                ->get();

        return view('post.viewPost',compact('posts'));

        }catch (Exception $e) {

            return redirect()->back()->with('error', 'Something went wrong. Please try again');
        }

    }

    public function CreateView(){

        try{

            return view('post.viewCreate');

        }catch (Exception $e) {

            return redirect()->back()->with('error', 'Something went wrong. Please try again');
        }

        

    }

    public function CreatePost(Request $request){

        try{

            $validated = $request->validate([
                'title' => 'required',
                'content' => 'required',
            ],[
                'content.required' => 'Please enter content',
                'title.required' => 'Pleace enter title',
            ]);

            if (!empty($request->image)) {
                $imageName = uniqid() . '-'  . $request->image->getClientOriginalName();
                $imagePath = $request->image->move(public_path('images/postImages/'), $imageName);
            } else {

                $imageName = 'default.png';
            }

            $userId = Auth::user()->userId;

            $post = new Post();

            $post->userId = $userId;
            $post->title = $request->title;
            $post->content = $request->content;
            $post->image = $imageName;
            
            $post->save();

            return redirect()->back()->with('message','Post Added successfully.');



        }catch (Exception $e) {

            return redirect()->back()->with('error', 'Something went wrong. Please try again');
        }
    }

    public function EditView($id){

        try{

            $posts = Post::where('id',$id)->
                first();

            return view('post.viewEdit',compact('posts'));

        }catch (Exception $e) {

            return redirect()->back()->with('error', 'Something went wrong. Please try again');
        }
    }

    public function EditPost(Request $request){

        try{

            Post::where(['id' => $request->id])->update([
                'title' => $request->title,
                'content' => $request->content,
            ]);;
            

            return redirect('/viewPosts')->with('message', 'edited successfully');

        }catch (Exception $e) {

            return redirect()->back()->with('error', 'Something went wrong. Please try again');
        }
    }

    public function DeletePost(Request $request){

        try{

            Post::where(['id' => $request->id])->delete();
            

            return redirect('/viewPosts')->with('message', 'deleted successfully');

        }catch (Exception $e) {

            return redirect()->back()->with('error', 'Something went wrong. Please try again');
        }
    }

    public function Search(Request $request){
        try{

            $userId = Auth::user()->userId;
            $search =  $request->search;

            $posts = Post::where('userId',$userId)->where('title', 'like', '%' . $search . '%')
                ->get();

            return view('post.viewPost',compact('posts'));
            

        }catch (Exception $e) {

            return redirect()->back()->with('error', 'Something went wrong. Please try again');
        }
    }

    //Api functions

    public function ViewAllPosts(){
        try{

            $userId = Auth::user()->userId;


            $posts = Post::where('userId',$userId)
                ->get();

            $data = [
                'posts' => $posts,
            ];

            return response()->json($data, 200);

        }catch (Exception $e) {

            return response()->json(['error' => 'An error occurred'], 500);
        }
    }

    public function CreateNewPost(Request $request){

        try{

            $userId = Auth::user()->userId;

            $post = new Post();

            $post->userId = $userId;
            $post->title = $request->title;
            $post->content = $request->content;
            $post->image = $request->image;

            $post->save();

            return response()->json(['message' => 'Post added successfully'], 200);

        }catch (Exception $e) {

            return response()->json(['error' => 'An error occurred'], 500);
        }

        

    }
}
