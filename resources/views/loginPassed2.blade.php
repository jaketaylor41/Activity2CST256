@extends('layouts.appmaster') 
@section('title', 'Login Passed Page')

@section('content') 

	@if($model->getUsername() == 'jake')
		<h3>Jake you have logged in successfully.</h3>
	@else
		<h3>Someone besides Jake has logged in!</h3>
	@endif
	<br>
	<a href="login2">Login Again</a>
@endsection
