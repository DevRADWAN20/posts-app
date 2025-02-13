@extends('layout.app')
@section('content')
    <div class="col-12">
        <a href="{{url('posts/create')}}" class="btn btn-primary my-3"> Add New Post</a>
        <h1 class="p-3 border text-center my-3 ">ALL POSTS For {{$user->name}}</h1>
    </div>
    <div class="col-12">
        @if(session()->get('success') != null)
            <h3 class="text-success my-2">{{session()->get('success')}}</h3>
        @endif
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Writer</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($user->posts as $post)
                <tr>
                    <td>{{$loop->iteration  }}</td>
                    <td>{{ $post->Title }}</td>
                    <td>{{\Str::limit( $post->Description,50) }}</td>
                    <td>{{ $post->user->name }} </td>
                    <td>
                        <a href="{{url('posts/'. $post->id .  '/edit')}}" class="btn btn-info"> Edit</a>
                    </td>
                    <td>
                        <form action="{{url('posts/'. $post->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
