@extends('frontpage')

@section('content')

  @include('banner')
  
	<!-- Content Row -->
    <div class="row">

      @foreach($courses as $course)
      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <div class="card-body">
            <h2 class="card-title">1. {{$course->name}}</h2>
            <p class="card-text">{{$course->during}}</p>
            <p class="card-text">{{$course->duration}}</p>
          </div>
          <div class="card-footer text-center">
            <a class="btn btn-primary" href="#">Show Details!</a>
          </div>
        </div>
      </div>
      @endforeach
      <!-- /.col-md-4 -->
    </div>
@endsection