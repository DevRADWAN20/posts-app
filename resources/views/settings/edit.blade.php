@extends('layout.app')
@section('content')
    <div class="col-12">
        <h1 class="my-3 text-center">Edit Settings Info </h1>
    </div>
    <div class="col-12 mx-auto">
        <form action="{{route('settings.update')}}" class="form border p-3" method="POST">
            @csrf
            @include('inc.message')
            @method('PUT')
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="">Site Name</label>
                        <input type="text" value="{{$setting->site_name}}" name="site_name" id="" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="">facebook</label>
                        <input type="text" value="{{$setting->facebook}}" name="facebook" id="" class="form-control">
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="">linkedin</label>
                        <input type="text" value="{{$setting->linkedin}}" name="linkedin" id="" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="">Github</label>
                        <input type="text" value="{{$setting->Github}}" name="Github" id="" class="form-control">
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="">About Us Content</label>
                        <textarea name="about_us_content" id="" class="form-control" rows="10">{{strip_tags($setting->about_us_content)}}</textarea>
                    </div>
                </div>

            </div>



            <div class="mb-3">
                <input type="submit" value="save" id="" class="form-control bg-success text-white">
            </div>


        </form>
    </div>
@endsection
