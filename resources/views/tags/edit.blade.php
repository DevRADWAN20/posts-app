@extends('layout.app')
@section('content')
    <div class="col-12">
        <h1 class="my-3 text-center">Update Tag Info </h1>
    </div>
    <div class="col-6 mx-auto">
        <form action="{{route('tags.update',$tag->id)}}" class="form border p-3" method="POST">
            @csrf
            @method('PUT')
            @include('inc.message')

            <div class="mb-3">
                <label for="">Name</label>
                <input type="text" name="name" value="{{$tag->name}}" id="" class="form-control">
            </div>


            <div class="mb-3">
                <input type="submit" value="save" id="" class="form-control bg-success text-white">
            </div>


        </form>
    </div>
@endsection
