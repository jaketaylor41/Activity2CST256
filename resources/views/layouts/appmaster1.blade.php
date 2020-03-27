<html lang = "en">
	<head>
		<title>@yield('title')</title>
		
	<link rel="stylesheet" href="resources/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="resources/assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="resources/assets/css/styles.css">
	</head>
	
	<body>
		@include('layouts.header1')
		<div align = "center">
			@yield('content')
		</div>
		@include('layouts.footer')
	</body>
	
</html>