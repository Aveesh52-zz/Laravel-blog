

@extends('layouts.app')



@section('content')


<div class="panel-default">
    <div class="panel-heading">

FORM


    </div>
    <div class="panel-body">

  @include('includes.messages')

           
        </div>
        <form action="{{route('tags.store')}}" method="POST">
        
        
            {{csrf_field()}}
        
        
            <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="tag">
        </div>
        <div class="text-center">
            
        <button class="btn btn-primary">
                Create Tag
           </button>
            
        </div>
        
        </form>
        
        

    </div>
</div>
@endsection
