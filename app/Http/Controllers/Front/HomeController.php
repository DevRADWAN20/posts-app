<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\SendMessageEmail;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {

        $posts = Post::with('user')->orderBy('id','DESC')->paginate(12);
        return view('front.layout.index',['posts'=>$posts ]);
    }
    public function about()
    {
        return view('front.layout.about');
    }
    public function contact()
    {
        return view('front.layout.contact');
    }

    public function sendMessage(Request $request)
    {
       $data = $request->validate([
            "name"=>['required','string','min:3','max:50'],
            "email"=>['required','email','max:50'],
            "phone"=>['required','numeric'],
            "message"=>['required','string','min:10','max:500'],
        ]);

       try
       {
           Mail::to("mohamed@lol.com")->send(new SendMessageEmail($data));

       }catch (\Exception $e)
       {
           return back()->withErrors("email failed to sent");
       }
        return back()->with('success','email has been sent successfully');


    }





}
