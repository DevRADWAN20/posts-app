@extends('layout.app')
@section('content')
    <div class="col-12">
        <a href="{{(route('ajax-tags.create'))}}" class="btn btn-primary my-3"> Add New Tag</a>

        <h1 class="p-3 border text-center my-3 ">ALL Tags</h1>
    </div>
    <div class="col-12">
        <div class="alert alert-danger d-none"id="show-message"></div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Posts</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tags as $tag)
                <tr>
                    <td>{{$loop->iteration  }}</td>
                    <td>{{ $tag->name }}</td>
                    <td>
                        @foreach($tag->posts as $post)
                            <span class="badge bg-success my-1"> {{$post->Title}}</span>
                            <br>
                        @endforeach
                    </td>
                    <td>

                        <a href="{{route('ajax-tags.edit',$tag->id )}}" class="btn btn-info"> Edit</a>

                    </td>
                    <td>
                        <form action="{{route('ajax-tags.destroy' , $tag->id)}}  " class="delete-item" method="POST">
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
            {{$tags->links() }}
        </div>
    </div>
@endsection
@section('script')
    <script>
        let items= document.querySelectorAll(".delete-item");
        let messageElement = document.getElementById("show-message");
        items.forEach(element => {
            element.addEventListener("submit", function (e) {
                e.preventDefault();
                let token = element.querySelector("input[name='_token']");
                fetch(element.action, {
                    method: "DELETE",
                    headers: {
                        'X-CSRF-TOKEN': token.value,
                        'Accept': "application/json",
                        'Content-Type': "application/json",
                    }
                }).then(function (res) {
                    return res.json();
                }).then(data => {
                    messageElement.classList.remove('d-none');
                    if (data['status']) {
                        messageElement.classList.remove("alert-danger");
                        messageElement.classList.add("alert-success");
                        element.closest("tr").remove();

                    } else {
                        messageElement.classList.remove("alert-success");
                        messageElement.classList.add("alert-danger");
                    }
                    messageElement.textContent = data.message;
                })
            })
        });
    </script>
@endsection
