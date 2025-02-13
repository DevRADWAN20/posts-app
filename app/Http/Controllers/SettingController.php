<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit()
    {
        return view('settings.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_name'=>['required','string'],
            'facebook'=>['required','string'],
            'linkedin'=>['required','string'],
            'Github'=>['required','string'],
            'about_us_content'=>['required','string','max:1000'],
        ]);

        $data =Setting::first();
        $data->site_name =$request->site_name;
        $data->facebook =$request->facebook;
        $data->linkedin =$request->linkedin;
        $data->Github =$request->Github;
        $data->about_us_content =nl2br($request->about_us_content);
        $data->save();
        return back()->with('success','Post Updated Successfully');
    }
}
