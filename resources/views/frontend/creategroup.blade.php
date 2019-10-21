@extends('frontpage')

@section('content')
	<div class="row my-5">
		<div class="col-md-12">
			<form method="post" action="{{route('group.store')}}">
				@csrf
				<div class="form-group">
					<label>Group Name</label>
					<input type="text" name="name" class="form-control" placeholder="Name...">
				</div>

				<div class="form-group">
					<label>Choose Leader</label>
					<select name="leader" class="form-control" id="leader">
						@foreach($students as $student)
							<option value="{{$student->id}}">{{$student->namee}}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label>Choose Co Leader</label>
					<select name="coleader" class="form-control" id="coleader">
						@foreach($students as $student)
							<option value="{{$student->id}}">{{$student->namee}}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label>Choose Member</label>
					<select class="js-example-basic-multiple form-control" name="members[]" multiple="multiple" id="members">
					  	@foreach($students as $student)
							<option value="{{$student->id}}">{{$student->namee}}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group text-center">
					<button type="submit" class="btn btn-primary btn-lg">Create Group</button>
				</div>
			</form>
		</div>
	</div>
@endsection

@section('script')
	<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
	<script type="text/javascript">
		$.ajaxSetup({
      		headers: {
          		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      		}
    	});

		$(document).ready(function() {
			// alert('ok');
		  	$('.js-example-basic-multiple').select2({
		  		placeholder: "Choose members",
		  	});
		  	$('#coleader').prop('disabled',true);
		  	$('#members').prop('disabled',true);

		  	$('#leader').change(function () {
		  		$('#coleader').prop('disabled',false);
		  		var lid = $(this).val();
		  		$.post('{{route("getstudentforcoleader")}}',{id:lid},function (response) {
		  			console.log(response);
		  			var html='<select name="coleader" class="form-control" id="coleader">';
		  			$.each(response,function (i,v) {
		  				html += '<option value="'+v.id+'">'+v.namee+'</option>';
		  			})
		  			html += '</select>';
		  			$('#coleader').html(html);
		  		});
		  	});

		  	$('#coleader').change(function () {
		  		$('#members').prop('disabled',false);
		  		$(".js-example-basic-multiple").html('').select2({
		  			placeholder: "Choose members",
		  		});
		  		var cid = $(this).val();
		  		var lid = $('#leader').val();
		  		$.post('{{route("getstudentformembers")}}',{cid:cid,lid:lid},function (response) {
		  			console.log(response);
		  			var html='<select class="js-example-basic-multiple form-control" name="members[]" multiple="multiple" id="members">';
		  			$.each(response,function (i,v) {
		  				html += '<option value="'+v.id+'">'+v.namee+'</option>';
		  			})
		  			html += '</select>';
		  			$('#members').html(html);
		  		});
		  	});
		});
	</script>
@endsection
