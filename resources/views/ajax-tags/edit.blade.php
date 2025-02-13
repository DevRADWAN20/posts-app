@extends('layout.app')
@section('content')
    <div class="col-12">
        <h1 class="my-3 text-center">Update Tag Info </h1>
    </div>
    <div class="col-6 mx-auto">
        <form action="{{route('ajax-tags.update',$tag->id)}}"  id="send-data" class="form border p-3" method="POST">
            @csrf
            @method('PUT')
            <div class="alert alert-danger d-none"id="show-message"></div>


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
@section('script')
    <script>
        let formElement = document.getElementById("send-data");
        let messageElement = document.getElementById("show-message");

        formElement.addEventListener("submit", function (e){
            e.preventDefault();
            let input = document.querySelector("input[name='name']");
            let token = document.querySelector("input[name='_token']");
            fetch(formElement.action,{
                method:"PUT",
                headers:{
                    'X-CSRF-TOKEN':token.value,
                    'Accept':"application/json",
                    'Content-Type':"application/json",
                },
                body:JSON.stringify({name:input.value})
            }).then(function (res){
                return  res.json();
            }).then(data=>{
                messageElement.classList.remove('d-none');
                if (data['status'])
                {
                    messageElement.classList.remove("alert-danger");
                    messageElement.classList.add("alert-success");
                }
                else
                {
                    messageElement.classList.remove("alert-success");
                    messageElement.classList.add("alert-danger");
                }
                messageElement.textContent = data.message;
            })


        })

    </script>
@endsection
