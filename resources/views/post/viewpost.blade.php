@extends('welcome')
@section('content')
<div class="container">
<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

        <a href="{{route('write.post')}}" class="btn btn-success">Write Post</a>
        <hr>

        <div>
            
            <p>Category Name: {{$post->name}}</p>
            <h3>{{$post->title}}</h3>
            <img src="{{URL::to($post->image)}}"height="340px;">
            <p>{{$post->details}}</p>  

        </div>



       
      </div>
    </div>
</div>
@endsection