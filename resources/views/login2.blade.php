@extends('layouts.appmaster') 
@section('title', 'Login Page')

@section('content')
<form action="doLoginBlade" method="POST">
	<input type="hidden" name="_token" value="<?php echo csrf_token()?>" />
	<h2>Please Login</h2>
	<table>
		<tr>
			<td>User Name:</td>
			<td><input type="text" name="username" /></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input type="password" name="password" /></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" value="Login" />
			</td>
		</tr>
	</table>
</form>
@endsection
