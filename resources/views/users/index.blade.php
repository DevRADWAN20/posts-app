@extends('layout.app')
@section('content')
    <div class="col-12">
        <a href="{{(route('users.create'))}}" class="btn btn-primary my-3"> Add New User</a>
        <h1 class="p-3 border text-center my-3 ">ALL Users</h1>
    </div>
    <div class="col-12">
        @include('inc.message')
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Type</th>
                <th>Edit</th>
                <th>Posts</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$loop->iteration  }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{!! $user->type()!!}</td>
                    <td>
                        <a href="{{route('users.edit',$user->id )}}" class="btn btn-info"> Edit</a>
                    </td>
                    <td>
                        <a href="{{route('user.posts',$user->id )}}" class="btn btn-primary"> Show</a>
                    </td>
                    <td>
                        <form action="{{route('users.destroy' , $user->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
            {{$users->links() }}
        </div>
    </div>
@endsection
