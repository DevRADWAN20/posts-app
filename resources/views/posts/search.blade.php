@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="p-3 border text-center my-3 ">ALL POSTS</h1>
        </div>
        @foreach($posts as $post)
            <div class="col-8 mx-auto">
                <div class="card my-3">
                    <div class="card-header">
                        {{$post->user->name}} - {{$post->created_at->format('Y-m-d')}}
                    </div>
                    <div class="card-body">

                        <div class="cont-image">
                            <img src="{{$post->image()}}" height="350" width="100%" alt="">
                        </div>
                        <h5 class="card-title">{{$post->Title}}</h5>
                        <p class="card-text">{{\Str::limit($post->Description,200)}}</p>
                        <a href="{{url('posts/' . $post->id)}}" class="btn btn-primary">Show Posts</a>
                    </div>
                </div>
            </div>
    </div>
    @endforeach
@endsection
