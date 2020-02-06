<html lang = "en">
	<head>
		<title>Who Am I</title>
	</head>
	<body>
	<form action="whoami" method = "POST">
		<input type = "hidden" name = "_token"
			value = "<?php echo csrf_token()?>"/>
		<h2>Whats your name?</h2>
		<table>
			<tr>
				<td>First Name: </td>
				<td><input type = "text" name = "firstname"/></td>
			</tr>
			<tr>
				<td>Last Name: </td>
				<td><input type = "text" name = "lastname"/></td>
			</tr>
			<tr>
				<td colspan = "2" align = "center">
					<input type = "submit" value = "Ask Now"/>
				</td>
			</tr>
		</table>
	</form>
	</body>
</html>