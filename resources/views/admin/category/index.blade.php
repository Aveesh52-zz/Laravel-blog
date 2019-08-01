@extends('layouts.app')


@section('content')


<table class="table table-hover">
<caption>category</caption>
    <thead>
        <th>Title
        </th>
        <th>Edit
            </th>
            <th>
 Delete            </th>
    </thead>
    <tbody>
    @foreach($categories as $category)
<tr>
       
    <td>{{$category->name}}</td>
    <td>
        <a href="{{route('category.edit',['id' => $category->id])}}" class="btn bg-info">Edit</a>
    </td>
    <td>
            <a href="{{route('category.delete',['id' => $category->id])}}" class="btn bg-danger">Delete</a>
        </td>
      
  
</tr>
@endforeach
    </tbody>
</table>


@endsection