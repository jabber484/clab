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
					<form action="/auth" method="post">
						{{ csrf_field() }}
						@if(isset($error) && $error == 0) {{-- From auth --}}
						<div>Incorrect SID or Password</div>
						@elseif(session("status") == 1) {{-- From middleware --}}
						<div>You must login to create booking or project.</div>
						@endif
						<div class="form-group">
							<input type="text" class="form-control" name="sid" placeholder="SID">
							<input type="password" class="form-control" name="password" placeholder="Password">	
							<br>
							<button class="btn btn-success" type="submit" style="width: 100%;"">Login</button>
						</div>
					</form>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="subtitle">Problem?</div>
				<div class="field">
					<a href="/register"><button class="btn btn-primary" style="width: 100%;margin-top: 1px;">New User</button></a>
					{{-- <button class="btn btn-primary" style="width: 100%;margin-top: 1px;">Forget Password</button> --}}
				</div>
				<br>
				<div>
					If problem persist, please contact Florence Tsui (florencetsui@cuhk.edu.hk).
				</div>
			</div>
		</div>
		
		
	</div>
</section>

<script>

</script>

@endsection