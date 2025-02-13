<?php

namespace App\Exports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PostExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():view
    {
        return view('exports.posts', [
            'posts' => Post::with('user')->get()
        ]);
    }
}
