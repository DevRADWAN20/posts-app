<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TagController extends Controller
{
   /* public function __construct()
    {
        Gate::authorize("admin-control");
    }
   */
    public function index()
    {
        $tags = Tag::paginate();
        return view('tags.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data =$request->validate([

           'name'=>'required|string|min:3'

        ]);
        Tag::create($data);
        return back()->with('success','Tag Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $tag = Tag::findOrFail($id);
        Gate::authorize('view',$tag);
        return view('tags.edit',compact('tag'));
    }


    public function update(Request $request,Tag $tag)
    {
        Gate::authorize('view',$tag);
        $request->validate([

            'name'=>'required|string|min:3'

        ]);
        $tag->update(['name'=>$request->name]);
        $tag->save();
        return redirect()->route('tags.index')->with('success','Tag Updated Successfully');
    }


    public function destroy(Tag $tag)
    {
        $tag->delete();
        return back()->with('success','Data Deleted Successfully');
    }
}
