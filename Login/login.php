<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="loginStyle.css">
</head>
<body>
	<div id = "frm">
		<form action = "loginProcess.php" method = "POST">
			<h2>LOGIN</h2>
			<p>
				<label>Username:</label>
				<input type ="text" id = "user" name = "user" />
			</p>
			<p>
				<label>Password:</label>
				<input type ="password" id = "pass" name = "pass" />
			</p>
			<p>
				<input type ="Submit" id = "login_btn" value = "Login" /> 
			</p>
			<p>
				<input type ="Submit" id = "reg_btn" value = "Register" />
			</p>
		
			
	</div>

</body>
</html>