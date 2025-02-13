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
@if(session()->get('success') != null)
    <h3 class="text-success my-2">{{session()->get('success')}}</h3>
@endif
