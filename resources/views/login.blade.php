@extends('_layout')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('body')
<div class="row justify-content-center align-items-center">
	<div class="col-12 col-sm-8 col-md-6 col-lg-4 col-xxl-3">
		<div class="card">
			<div class="card-body text-center">
				<h1>TO DO LIST</h1>
				<p class="lead">Log in to see your tasks</p>
				<form action="{{ url('login') }}" method="POST">
					@csrf
					<div class="form-floating mb-3">
						<input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
						<label for="username">Username</label>
					</div>
					<div class="form-floating mb-3">
						<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
						<label for="password">Password</label>
					</div>
					<div class="d-grid">
						<button type="submit" class="btn btn-primary">LOG IN</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script id="login" src="{{ asset('js/login.js') }}" data-url="{{ url('') }}"></script>
@endsection