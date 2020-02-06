@extends('layouts.appmaster')
@section('title', 'Login Passed Page')

@section('content')
	@if($model->getUsername() == 'jake')
		<h3>Jake, you have logged in successfully</h3>
		
	@else
		<h3>Someone besides jake has logged in successfully</h3>
	@endif
		<br>
		<a href="login3">Login Again</a>
		
@endsection

// <?php echo "Login Successful"; ?>


<!-- <br> -->

<!-- <a href="login">Login Again</a> -->



