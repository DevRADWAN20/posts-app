<table>
    <thead>
    <tr>
        <th> Title </th>
        <th> Body </th>
        <th> User_id </th>
        <th> Created At </th>
    </tr>
    </thead>
    <tbody>
@foreach($posts as $post)
    <tr>
    <td>{{$post->Title}}</td>
    <td>{{$post->Description}}</td>
    <td>{{$post->user_id}}</td>
    <td>{{$post->created_at}}</td>
    </tr>
@endforeach
    </tbody>
</table>
