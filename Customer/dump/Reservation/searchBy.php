<!DOCTYPE html>
<html lang="en">
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Search Page</title>
	<link rel="stylesheet" type="text/css" href="searchByStyle.css">
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
                     <li><a href='#'>Logout</a></li>
          
             
                </ul>
            </nav>
        </div>
	<div id = "frm">
		<form action = "searchResortName.php" method = "POST">
			<h2>SEARCH</h2>
			<p>
				<label>Search By:</label>
			</p>
	
		<p>
		<input type ="Submit" id = "resort_btn" value = "Resort" onclick="this.form.target" />
			
		<input type ="Submit" id = "keywords_btn" value = "Keywords" onclick="form.action = 'searchResort.php';" />


		

		</p>
	</form>
</div>

			
	</div>


</body>
</html>