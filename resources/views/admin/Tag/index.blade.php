@extends('layouts.app')


@section('content')


<table class="table table-hover">
<caption>Tags</caption>
    <thead>
        <th>Title
        </th>
        <th>Edit
            </th>
            <th>
 Delete            </th>
    </thead>
    <tbody>
    @foreach($tags as $Tag)
<tr>
       
    <td>{{$Tag->tag}}</td>
    <td>
        <a href="{{route('tags.edit',['id' => $Tag->id])}}" class="btn bg-info">Edit</a>
    </td>
    <td>
            <a href="{{route('tags.delete',['id' => $Tag->id])}}" class="btn bg-danger">Delete</a>
        </td>
      
  
</tr>
@endforeach
    </tbody>
</table>


@endsection