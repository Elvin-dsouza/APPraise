<!DOCTYPE html>
<!-- 
	Login Form
	Created By:
		Elvin Shawn D'souza
		sdsouza3011@gmail.com 
		9591349482
	On,
	Sun May 13th 5:14 PM
-->
<html>
<head>
	<title>MIT Appraise</title>
	<link rel="stylesheet" type="text/css" href="css/modernflex.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="container row center-both" style="width:100vw; height:100vh;">
	<div>
		<div class="login-form container padding-20 row">
			<img src="http://icons.iconarchive.com/icons/paomedia/small-n-flat/1024/key-icon.png">
			<!-- email and password -->
			<input type="text" name="e_id" placeholder="MAHE00000" id="eId" required>
			<input type="password" name="password" placeholder="password" id="pass" required>
			<!-- container for the error message -->
			<span id="error"></span>
			<!-- container to store the buttons for actions on this form -->
			<span class="container login-form col center-both">
				<button id="login" class="button" style="margin-left:10px;">Login</button>
				<button onclick="window.location='signup'" class="button-inverse">Sign Up</button>
			</span>
		</div>
	</div>
	<script>
		document.getElementById("login").onclick = authenticate;
		
		function authenticate(){
			let employee_id = document.getElementById("eId").value;
			let password = document.getElementById("pass").value;
			// console.log("called");
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechanged = function(){
				if(this.readyState == 4 && this.status == 200){
 					alert("Server Response Null");
					if(this.responseText != null){
						let promise = JSON.parse(this.responseText);
						switch (promise.status) {
							case 0:
								console.warn("Error: Password Doesnt Match");
								break;
							case -1:
								console.warn("Error: Employee Id Does not exist")
								break;
							case 1:
								console.log("Succesfully logged in")
								break;
						}
					}
					else{
						alert("Server Response Null");
					}
				}
				else{
					console.error("Couldnt connect to the server");
				}
			}
			xhttp.open("POST","handler/login_handler.php",true);
 			// xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send("e_id="+employee_id+"&password="+password);
		}
	</script>
</body>
</html>
