@extends('template')

@section('content')
	<!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Student List</h1>
    <a href="{{route('students.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Add Student </a>
  </div>

  <!-- Table -->

  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <form>
            <div class="form-row">
              <div class="form-group col-md-4">
                <select id="inputCourse" class="form-control">
                  <option selected>Choose Course:</option>
                  <option>...</option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <select id="inputBatch" class="form-control">
                  <option selected>Choose Batch:</option>
                  <option>...</option>
                </select>
              </div>
              <div class="form-group col-md-2">
                <button type="button" name="btnSelect" class="btn btn-success">Select</button>
              </div>
              <div class="form-group col-md-2 text-right">
                <button type="button" name="btnSelect" class="btn btn-info"><i class="fas fa-upload fa-sm"></i> Generate Excel</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <table class="table table-hover my-3">
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
          @foreach($groups as $group)
          <tr>
            <td class="table-secondary" colspan="7">
              {{$group->name}}
            </td>
          </tr>

          @php $i=1; @endphp
          @foreach($group->students as $student)
          <tr>
            <td>{{$i++}}</td>
            <td>{{ $student->namee }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->phone }}</td>
            <td>
              <a href="{{route('students.show',$student->id)}}" class="btn btn-info">Detail</a>
            </td>
            <td>
              <a href="{{route('students.edit',$student->id)}}" class="btn btn-warning">Edit</a>
            </td>
            <td>
              <form method="post" action="{{route('students.destroy',$student->id)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure')">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach

          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection