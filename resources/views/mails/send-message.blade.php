<x-mail::message>
<h1>{{$data['name']}}</h1>
<hr>
    <h2>Email : {{$data['email']}}</h2>
    <h2>Phone : {{$data['phone']}}</h2>
    <p>{{$data['message']}}</p>


    Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
