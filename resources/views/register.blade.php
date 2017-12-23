@extends('master')

@section('style')
<link href="{{asset("css/form.css")}}" rel="stylesheet">
@endsection	

@section('content')
<section class="project">
	<div class="container">
		<div class="content-title">
			Login
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="subtitle">Login</div>
				<div class="field">
					<form id="register" action="/register/new">
						{{ csrf_field() }}

						@if(isset($error) && $error == 0) 
						<div>Apperenaly you are not member of Wu Yee Sun College!</div>
						@elseif(isset($error) && $error == 1) 
						<div>You have already registered.</div>
						@elseif(isset($error) && $error == 2) 
						<div>Your password does not match.</div>
						@endif

						<div class="form-group">
							<input type="text" class="form-control" name="sid" placeholder="Enter Your SID">
							<input type="password" class="form-control" name="pw" placeholder="Enter Your Password">	
							<input type="password" class="form-control" name="pw2" placeholder="Enter Your Password Again">	
							<br>
							<button class="btn btn-success" type="submit" style="width: 100%;"">Register</button>
						</div>
					</form>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="subtitle">Notes</div>
				<div class="field">
					<ul>
						<li>Only members of Wu Yee Sun College can register.</li>
						<li>If problem persist, please contact Florence Tsui (florencetsui@cuhk.edu.hk)</li>
					</ul>
				</div>
			</div>
		</div>
		
		
	</div>
</section>

<script>

</script>

@endsection