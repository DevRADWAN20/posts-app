@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="p-3  text-center my-3 ">Edit Post info</h1>
        </div>
        <div class="col-8 mx-auto">
            <form action="{{url('posts/' . $post->id)}}" method="POST" class="form border p-3"
                  enctype="multipart/form-data">
                @method('PUT')
                @csrf
                @if($errors ->any())
                    <div class="alert alert-danger p-1">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>
                                    {{$error}}
                                </li>
                            @endforeach
                        </ul>
                    </div>

                @endif
                <div class="mb-3">
                    <label for="">Post Title </label>
                    <input type="text" value="{{ $post->Title}}" class="form-control" name="title">
                </div>

                <div class="mb-3">
                    <label for="">Post Description </label>
                    <textarea class="form-control " name="description" rows="7"> {{$post->Description }} </textarea>
                </div>

                <div class="mb-3">
                    <label for=""> Tags </label>
                    <select name="tags[]" multiple class="form-control">
                        @foreach($tags as $tag)
                            <option @if($post->tags->contains($tag)) selected
                                    @endif value="{{$tag->id}}">{{$tag->name}} </option>

                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for=""> Writer </label>
                    <select name="user_id" class="form-control">
                        @foreach($users as $user)
                            <option
                                @selected($user->id == $post->user_id) value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Post Image </label>
                    <input type="file" class="form-control" name="image">
                </div>

                <div class="mb-3">
                    <input type="submit" class="form-control bg-success" value="save">
                </div>
            </form>
        </div>
    </div>

@endsection
