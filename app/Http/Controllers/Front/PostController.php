<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function search(Request $request)
    {
        $q =$request->q ;
        $posts = post::where('description','LIKE','%'.$q .'%')->paginate(12)->withQueryString();
        return view('front.layout.index',['posts'=>$posts ]);
    }
}
