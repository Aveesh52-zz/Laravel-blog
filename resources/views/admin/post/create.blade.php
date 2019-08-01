@extends('layouts.app')



@section('content')


<div class="panel-default">
    <div class="panel-heading">

FORM


    </div>
    <div class="panel-body">



            
  @include('includes.messages')

    

        </div>
        <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
        
        
            {{csrf_field()}}
        
        
            <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="form-group">
            <label for="featured">Featured</label>
            <input type="file" class="form-control" name="featured">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" name="price">
        </div>
        <div class="form-group">
        <label for="category">Category</label>
        <select name="category_id" id="category" class="form-control">
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
        </select>
        </div>
        @foreach($tags as $tag)
        <div class="checkbox">
        <label for="tags">
  <input type="checkbox" name="tags[]" value="{{$tag->id}}">{{$tag->tag}}</label>
</div>
@endforeach


        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" cols="5" rows="5" class="form-control"></textarea>
        </div>
        <button class="btn btn-primary">
            Submit
        </button>
        
        
        </form>
        
        

    </div>
</div>
@endsection
