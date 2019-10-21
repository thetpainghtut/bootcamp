@extends('template')

@section('content')
	<!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Student Edit From</h1>
  </div>

  <div class="card shadow mb-4">
    <div class="card-body">
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
      <form method="post" action="{{route('student.update',$student->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 form-control-label">Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEmail3" placeholder="Name" name="name" value="{{$student->name}}">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 form-control-label">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="inputPassword3" placeholder="Email" name="email" value="{{$student->email}}">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword4" class="col-sm-2 form-control-label">Phone No</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputPassword4" placeholder="Phone No" name="phoneno" value="{{$student->phoneno}}">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword5" class="col-sm-2 form-control-label">Profile</label>
          <div class="col-sm-10">
            <input type="file" class="form-control-file" id="inputPassword5" placeholder="Email" name="profile">
            <input type="hidden" name="oldprofile" value="{{$student->profile}}">
            <img src="{{$student->profile}}" class="img-fluid">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-secondary">Save</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection