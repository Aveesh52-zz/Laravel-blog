@extends('layouts.app')


@section('content')


<table class="table table-hover">
    <thead>
        
        <th>Title
            </th>
            <th>Category
            </th>
            <th>Price
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
<td> <img src="{{$post->featured}}" height="50px" width="90px" alt="{{$post->title}}">
    </td>    
    
    <td>{{$post->title}}</td>

    <td>{{$post->price}}</td>

    <td>{{$post->categories}}</td>
    
   
    <td>
        <a href="{{route('posts.edit',['id' => $post->id])}}" class="btn bg-info">Edit</a>
    </td>
    <td>
        <a href="{{route('posts.destroy',['id' => $post->id])}}" class="btn bg-info">Trash</a>
    </td>
</tr>
@endforeach
    </tbody>
</table>


@endsection