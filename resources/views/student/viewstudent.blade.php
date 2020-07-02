@extends('welcome')
@section('content')
<div class="container">
<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

        <a href="{{url('student')}}" class="btn btn-danger">All Student</a>
       
        <hr>

        <div>
            <ol>
              <li>Student Name: {{$student->name}}</li>
              <li>Phone Number: {{$student->phone}}</li>
              <li>Email Address: {{$student->email}}</li>
            </ol>

        </div>



       
      </div>
    </div>
</div>
@endsection