@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="p-3 border text-center my-3 ">{{$post->Title}}</h1>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{$post->user->name}} - {{$post->created_at->format('Y-m-d')}}
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$post->Title}}</h5>
                    <p class="card-text">{{$post->Description}}</p>
                </div>
            </div>
        </div>
    </div>

@endsection
