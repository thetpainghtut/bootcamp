@extends('frontpage')

@section('content')

  @include('banner')
  
	<!-- Content Row -->
    <div class="row">
      @foreach($mentors as $mentor)
      <div class="col-6 col-sm-4 col-md-3 my-3">
        <div class="card">
          <img class="card-img-top w-25 mx-auto mt-3 hoverable_img" src="{{asset('img/profile.png')}}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title text-center">{{$mentor->name}}</h5>
            <p class="card-text text-center">
              <a href="http://heinminhtet.me/" class="profile" target="_blank">http://heinminhtet.me/</a>
            </p>
            <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
          </div>
        </div>
      </div>
      @endforeach
      <!-- /.col-md-4 -->
    </div>
@endsection

@section('style')
  <style type="text/css">
    .hoverable_img{
      transition: 0.9s;
    }

    .hoverable_img:hover{
      cursor: pointer;
      transition: 1s;
      transform: scale(1.2);
    }

    .profile{
      color: black;
    }

    .profile:hover{
      color: red;
      text-decoration: none;
    }


  </style>
@endsection