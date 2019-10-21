@extends('template')
@section('content')
	<!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Assign Mentor</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          @if (session('status'))
            
            @php
              $groups = session('status');
            @endphp

            @foreach($groups as $group)
              <div class="alert alert-success d-inline-block">
                {{ $group }}
              </div>
            @endforeach
            
          @endif

          <form method="post" action="{{route('assignmentor.store')}}">
            @csrf
            <div class="form-group">
              <label>Batches:</label>
              <select class="form-control w-50" name="batch" id="batch">
                <option value="">Choose Batch</option>
                @foreach($batches as $batch)
                <option value="{{$batch->id}}">{{$batch->title}}</option>
                @endforeach
              </select>
            </div>

            <div class="row" id="groups">

            </div>

            <div class="form-group">
              <label>Mentors:</label>
              <select class="form-control w-50" name="mentor">
                <option value="" disabled>Choose Mentor</option>
                @foreach($mentors as $mentor)
                <option value="{{$mentor->id}}">{{$mentor->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>No of Group:<span id="noglabel"></span></label>
              <input type="number" name="nog" class="form-control w-50" id="nog">
            </div>

            <button type="submit" class="btn btn-primary">Assign Group</button>
          </form>
        </div>
      </div>
    </div> 
  </div>

@endsection

@section('script')
  <script type="text/javascript">
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $(document).ready(function () {
      // alert('ok');
      $('#groups').hide();
      $('#nog').prop('disabled',true);
      // $('#eximg').attr('src','a.jpg');
      $('#batch').change(function () {
        var bid = $(this).val();
        // alert(bid);
        $.post("{{route('getgroups')}}",{id:bid},function (response) {
          console.log(response);
          var html = "";
          $.each(response,function (i,v) {
            html += '<div class="col-md-3 my-3">'+
                      '<div class="card">'+
                        '<div class="card-body">'+
                          '<h5>'+v.name+'</h5>'+
                        '</div>'+
                      '</div>'+
                    '</div>';
          });

          $('#groups').html(html);

          if (response.length>1) {
            $('#nog').prop('disabled',false);
            $('#noglabel').html('<b class="text-danger"> [max number - '+response.length+']</b>');
            $('#nog').prop('max',response.length);
          }else{
            $('#nog').prop('disabled',true);
            $('#noglabel').html('');
          }
          
        })

        $('#groups').show();
      })
    })
  </script>
@endsection