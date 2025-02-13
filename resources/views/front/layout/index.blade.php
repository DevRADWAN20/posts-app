@extends('front.layout.app')
@section('content')
<header class="masthead" style="background-image: url('{{('front')}}/assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Posts App</h1>
                    <span class="subheading">A practical laravel project  </span>
                    <form class="d-flex my-5" action="{{route('front.search')}}" method="Get" role="search">
                        <input class="form-control me-2" name="q" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            @foreach($posts as $post)
            <!-- Post preview-->
            <div class="post-preview">
                <a href="post.html">
                    <h2 class="post-title">{{$post->Title}}</h2>
                    <h3 class="post-subtitle">{{Str::limit( $post->Description,50)}}</h3>
                </a>
                <div class="cont-image">
                    <img src="{{$post->image()}}" height="350" width="100%">
                </div>

                <p class="post-meta">
                    Posted by
                    <a href="#!">{{config('app.name')}}</a>
                    on {{$post->created_at->format("Y-m-d")}}
                </p>
            </div>
            <!-- Divider-->
            <hr class="my-4" />
            @endforeach
            <hr class="my-4" />
            <!-- Pager-->
            <div class=" mb-4">
                {{$posts->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
