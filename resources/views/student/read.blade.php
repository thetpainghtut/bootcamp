@extends('template')

@section('content')
	<!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Student List</h1>
    <a href="{{route('student.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Add Student </a>
  </div>

  <!-- Table -->
  <div class="row">
  	<div class="col-md-12">
  		
  	</div>
  </div>

  <div class="card shadow mb-4">
    <div class="card-body">
      <table class="table table-hover">
        <thead class="thead-dark">
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone No</th>
            <th colspan="3">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($students as $student)
          <tr>
            <td>1</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->phoneno }}</td>
            <td>
              <a href="{{route('student.show',$student->id)}}" class="btn btn-info">Detail</a>
            </td>
            <td>
              <a href="{{route('student.edit',$student->id)}}" class="btn btn-warning">Edit</a>
            </td>
            <td>
              <form method="post" action="{{route('student.destroy',$student->id)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure')">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection