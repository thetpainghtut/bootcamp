@extends('template')

@section('content')
	<!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Student Create Form</h1>
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
      <form method="post" action="{{route('students.store')}}" enctype="multipart/form-data">
        @csrf
        <h5 class="my-3"><u>Student Informations:</u></h5>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputNameEnglish">Student's Name: (English)</label>
            <input type="text" class="form-control" id="inputNameEnglish" placeholder="Mg Mg" name="namee">
          </div>
          <div class="form-group col-md-6">
            <label for="inputNameMyanmar">Student's Name: (Myanmar)</label>
            <input type="text" class="form-control" id="inputNameMyanmar" placeholder="မောင်မောင်" name="namem">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">Education:</label>
            <input type="text" class="form-control" id="inputCity" name="education">
          </div>
          <div class="form-group col-md-4">
            <label for="inputCity">City:</label>
            <input type="text" class="form-control" id="inputCity" placeholder="Yangon" name="city">
          </div>
          <div class="form-group col-md-2">
            <label for="inputAcceptedYear">Accepted Year:</label>
            <input type="text" class="form-control" id="inputAcceptedYear" placeholder="2015" name="accepted_year">
          </div>
        </div>
        <div class="form-group">
          <label for="inputAddress">Address:</label>
          <textarea class="form-control" id="inputAddress" placeholder="1234 Main St" name="address"></textarea>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Email:</label>
            <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Phone:</label>
            <input type="text" class="form-control" id="inputPassword4" placeholder="Phone" name="phone">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputDOB">Date of Birth:</label>
            <input type="date" class="form-control" id="inputDOB" name="dob">
          </div>
          <div class="form-group col-md-6">
            <label for="inputGender" class="d-block">Gender:</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" id="inlineRadio1" value="male" checked="checked" name="gender">
              <label class="form-check-label" for="inlineRadio1">Male</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" id="inlineRadio2" value="female" name="gender">
              <label class="form-check-label" for="inlineRadio2">Female</label>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label class="font-weight-bold col-md-12">Which Programming Language did you know? ( လက်ရှိကျွမ်းကျင်တဲ့ programming language )</label>
          @foreach($subjects as $subject)
          <div class="form-group col-md-6">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="gridCheck{{$subject->id}}" value="{{$subject->id}}" name="subjects[]">
              <label class="form-check-label" for="gridCheck{{$subject->id}}">
                {{$subject->name}}
              </label>
            </div>
          </div>
          @endforeach
        </div>

        <hr class="bg-dark">

        <h5 class="my-3"><u>Household Parent / Guardian Information:</u></h5>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputParent1">Parent/Guardian #1:</label>
            <input type="text" class="form-control" id="inputParent1" name="p1">
          </div>
          <div class="form-group col-md-4">
            <label for="inputParent1Rs">Relationship of Student</label>
            <input type="text" class="form-control" id="inputParent1Rs" placeholder="Yangon" name="p1_rs">
          </div>
          <div class="form-group col-md-4">
            <label for="inputParent1Phone">Phone:</label>
            <input type="text" class="form-control" id="inputParent1Phone" placeholder="2015" name="p1_phone">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputParent2">Parent/Guardian #2:</label>
            <input type="text" class="form-control" id="inputParent2" name="p2">
          </div>
          <div class="form-group col-md-4">
            <label for="inputParent2Rs">Relationship of Student</label>
            <input type="text" class="form-control" id="inputParent2Rs" placeholder="" name="p2_rs">
          </div>
          <div class="form-group col-md-4">
            <label for="inputParent2Phone">Phone:</label>
            <input type="text" class="form-control" id="inputParent2Phone" placeholder="" name="p2_phone">
          </div>
        </div>

        <hr class="bg-dark">

        <div class="form-group">
          <label for="inputInformation" class="font-weight-bold">သင်တန်းတွေအများကြီးထဲက Myanmar IT Consulting သင်တန်းကို ရွေးချယ်ရတဲ့ အကြောင်းအရင်းကို သိပါရစေ။</label>
          <textarea class="form-control" id="inputInformation" placeholder="Please ...." name="because"></textarea>
        </div>

        <input type="hidden" name="bid" value="9">

        <button type="submit" class="btn btn-primary btn-block">Save Register</button>
      </form>
    </div>
  </div>

@endsection