@extends('layouts.app')


@section('content')


<table class="table table-hover">
    <thead>
        
        <th>Title
            </th>
        <th>Images
            </th>
            <th>Edit
            </th>
            <th>
 Delete            </th>
    </thead>
    <tbody>
    @foreach($posts as $post)
<tr>
       
    <td>{{$post->title}}</td>
    <td> <img src="{{$post->featured}}" height="50px" width="90px" alt="{{$post->title}}">
    </td>
    <td>
        <a href="{{route('posts.restore',['id' => $post->id])}}" class="btn bg-info">Restore</a>
    </td>
    <td>
        <a href="{{route('posts.kill',['id' => $post->id])}}" class="btn bg-info">Kill</a>
    </td>
</tr>
@endforeach
    </tbody>
</table>


@endsection