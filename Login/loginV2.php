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
                        
            	<h1 class ="logo">Resort<span>Booking</span></h1>
           
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
      
                    <h1>Login</h1>
                </div>
                <form id='login' action = "loginProcess.php" method = "POST" class='input-group-login'>
                    <input type ="text" class ='input-field' placeholder = 'Enter Username' required id = "user" name = "user" />
						<input type ="password" class ='input-field' placeholder = 'Enter Password' required id = "pass" name = "pass" />
						
							<button type ='submit' class = 'submit-btn' >Log In</button>
						
							  <span class="lbl">New user? <a class="link-bttn" href="Register.php"><i>Register now</i></a></span>


		 </form>
            </div>
        </div>
    </div>


</body>
</html>

