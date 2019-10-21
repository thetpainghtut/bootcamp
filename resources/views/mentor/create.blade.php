@extends('template')

@section('content')
	<!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Mentor Create Form</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>

  <div class="row">
  	<div class="col-md-12">
  		<form method="post" action="{{route('mentors.store')}}" enctype="multipart/form-data">
  			@csrf
  			<div class="form-group row">
					<label for="inputName3" class="col-sm-2 form-control-label">Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputName3" placeholder="Name" name="name">
					</div>
				</div>
				<div class="form-group row">
					<label for="inputEmail3" class="col-sm-2 form-control-label">Email</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
					</div>
				</div>
				<div class="form-group row">
					<label for="inputPhone" class="col-sm-2 form-control-label">Phone</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputPhone" placeholder="Phone" name="phone">
					</div>
				</div>
				<div class="form-group row">
					<label for="inputProfile" class="col-sm-2 form-control-label">Profile</label>
					<div class="col-sm-10">
						<input type="file" class="form-control-file" id="inputProfile" name="profile">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-secondary">Create</button>
					</div>
				</div>
			</form>
  	</div>
  </div>
			
@endsection