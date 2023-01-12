<!DOCTYPE html>
<html lang="en">
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Search Page</title>
	<link rel="stylesheet" type="text/css" href="searchResortStyl.css">
	<link rel="stylesheet" type="text/css" href="buttons.css">
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
		<form action = "displayKeywordSearch.php" method = "POST">
			<h2>KEYWORDS</h2>
			<p>
				<label>Search by:</label>
			 <input type ="text" class ='input-field' placeholder = 'Enter Resort Name' required id = "resortName" name = "resortName" />
			</p>
			<p>
				<input type ="Submit" id = "search_btn" value = "Search" /> 
			</p>	
			</form>
	</div>

</div>

</body>
</html>