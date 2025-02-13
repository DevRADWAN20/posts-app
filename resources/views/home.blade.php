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

                        <div class="card-image">

                            <img src="{{$post->image()}}" width="100%" height="400">
                        </div>
                        <h5 class="card-title">{{$post->Title}}</h5>
                        <p class="card-text">{{\Str::limit($post->Description,200)}}</p>
                        <a href="{{url('posts/' . $post->id)}}" class="btn btn-primary">Show Posts</a>
                    </div>
                </div>
            </div>
    </div>
    @endforeach
    {{$posts->links() }}
@endsection
