<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
    <!---we had linked our css file----->
</head>
<body>
    <div class="FULL-PAGE">
        <div class="navbar">
            <div>
                <a href='website.html'>Resort</a>
            </div>
            <nav>
                <ul id='MenuItems'>
                    <li><a href='#'>Home</a></li>
                    <li><a href='#'>About Us</a></li>
            
                    <li><button class='loginbtn' >Login</button></li>
                </ul>
            </nav>
        </div>
        <div id='login-form'class='login-page'>
            <div class="form-box">
                <div class='button-box'>
                    <div id='btn'></div>
               
                    <h1>Register</h1>
                </div>
               <form id='register' class='input-group-register' action = "registerProcess.php" method = "POST">
		    <input type ='text' class = 'input-field' placeholder='Username' required id = "user" name = "user">
							<input type ='text' class = 'input-field' placeholder='Name' required id = "name" name = "name">
							<input type ='text' class = 'input-field' placeholder='Phone Number' required id = "phone" name = "phone">
							<input type ='text' class = 'input-field' placeholder='Email' required id = "email" name = "email">
							<input type ='text' class = 'input-field' placeholder='Password' required id = "pass" name = "pass" minlength="8">
							<input type ='text' class = 'input-field' placeholder='Confirm Password' required id = "cofirmPass" name = "confirmPass" minlength="8">
						
							<label class ="role-label">Select Role to Register</label>
					
							<select class = "form-select mb-3" aria-label="Default select example" id = "role" name ="role">
								<option selected>Role</option>
								<option value = "admin">Admin</option>
								<option value = "owner">Owner</option>
								<option value = "customers">Customer</option>
							</select>
				
							
							<button type ='submit' class = 'submit-btn'>Register</button>
						
	         </form>
            </div>
        </div>
    </div>

</body>
</html>