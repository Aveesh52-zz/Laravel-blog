@extends('layouts.app')

@section('content')

            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


<div class="container">    
  <div class="row">
   
   @foreach($posts as $post)
    <div class="col-sm-2">
      <div class="panel panel-primary">
        <div class="panel-heading">{{$post->title}}</div>
        <div class="panel-body"><img src="{{$post->featured}}" class="img-responsive"  height="40px" width="200px" alt="Image"></div>
        <div class="panel-footer" text-center>&#x20b9; {{$post->price}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button class="btn btn-primary">Buy</button> </div>
      </div>
    </div>
  @endforeach


    </div>
    </div>


                    
                </div>
            </div>
            
@endsection
