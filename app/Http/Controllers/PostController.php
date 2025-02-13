<?php

namespace App\Http\Controllers;
use App\Exports\PostExport;
use Barryvdh\Debugbar\Facades\Debugbar;
use File;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user','tags')->orderBy('id','DESC')->paginate();
        return view('posts.index',['posts'=>$posts ]);
    }

    public function export()
    {
        $posts = Post::with('user','tags')->orderBy('id','DESC')->paginate();
        return Excel::download(new PostExport(), 'posts.xlsx');
    }

    public function create()
    {
        Gate::authorize('create-post');
        $users = User::select('id','name')->get();
        $tags =Tag::select('id','name')->get();
        return view('posts.add',compact('users','tags'));
    }

    public function store( Request $request)
    {
        Gate::authorize('create-post');
        $request->validate([
            'title' =>['required','string','min:3'],
            'description' => ['required','string','max:1500'],
            'user_id' =>['required','exists:users,id'],
            'image'=>['required','image','mimes:png,jpg,jpeg,gif']
        ]);
        $image = $request->file('image')->store('public');
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $request->user_id;
        $post->image = $image;
        $post->save();
        $post->tags()->sync($request->tags);
        return back()->with('success','Post Added Successfully');
    }
    public function show($id)
    {
        $post =Post::findOrFail($id);
        return view('posts.show',['post' =>$post]);
    }

    public function edit($id)
    {
        $post =Post::findOrFail($id);
        $users =User::select('id','name')->get();
        $tags =Tag::select('id','name')->get();

        return view('posts.edit',['post' =>$post,'users' =>$users,'tags' =>$tags]);
    }

    public function update($id,Request $request)
    {
        $post =Post::findOrFail($id);
        $old_image =$post->image;
        $post->title = $request->title ;
        $post->description = $request->description;
        $post->user_id = $request->user_id;
        if ($request->hasFile('image'))
        {
            $new_image= $request->file('image')->store('public');
            File::delete($old_image);
            $post->image =$new_image;
        }
        $post->save();
        $post->tags()->detach();
        $post->tags()->sync($request->tags);
        return redirect('posts')->with('success','Post Updated Successfully');

        // return view('posts.edit',['post' =>$post]);
    }
    public function destroy($id)
    {
        $post =Post::findOrFail($id);
        $post->delete();
        return back()->with('success','Post Deleted Successfully');

    }

}
