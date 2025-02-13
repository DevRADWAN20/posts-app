@extends('layout.app')
@section('content')
    <div class="col-12">
        <h1 class="my-3 text-center">Create New User </h1>
    </div>
    <div class="col-6 mx-auto">
        <form action="{{route('users.store')}}" class="form border p-3" method="POST">
            @csrf
            @include('inc.message')

            <div class="mb-3">
                <label for="">Name</label>
                <input type="text" name="name" id="" class="form-control">
            </div>

            <div class="mb-3">
                <label for="">Email</label>
                <input type="email" name="email" id="" class="form-control">
            </div>

            <div class="mb-3">
                <label for="">Password</label>
                <input type="password" name="password" id="" class="form-control">
            </div>

            <div class="mb-3">
                <label for="">Confirm Password</label>
                <input type="password" name="confirm_password" id="" class="form-control">
            </div>

            <div class="mb-3">
                <label for="">Type</label>
                <select name="type" id="" class="form-control">

                    <option value="Admin">Admin</option>
                    <option value="Writer">Writer</option>
                </select>
            </div>

            <div class="mb-3">
                <input type="submit" value="save" id="" class="form-control bg-success text-white">
            </div>


        </form>
    </div>
@endsection
