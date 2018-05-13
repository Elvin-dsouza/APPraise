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
			<input type="email" name="email" placeholder="example@example.com" id="email" required>
			<input type="password" name="password" placeholder="password" id="pass" required>
			<!-- container for the error message -->
			<span id="error"></span>
			<!-- container to store the buttons for actions on this form -->
			<span class="container login-form col center-both">
				<input type="submit" value="Login" style="margin-left:10px;" onclick="login_user()">
				<button onclick="window.location='signup'" class="button-inverse">Sign Up</button>
			</span>
		</div>
	</div>
	<!-- include the firebase cdn from the server -->
	<script src="https://www.gstatic.com/firebasejs/5.0.1/firebase.js"></script>
		<!--
		include a local copy of my firebase configuration stored here in the js/firebase-config.js script
		this script is used to initialise the firebase api with the necessary keys to authenticate the app to the firebase server
		This script has to be included in every page that uses firebase modules, ONLY once
		 -->
	<script type="text/javascript" src="js/firebase-config.js"></script>
	<script>
		 
		  function login_user(){ // this function is called when the submit button is clicked
		  	 //get the values of the email and the password field respectively
		  	 var e = document.getElementById("email").value;
		 	 var pass = document.getElementById("pass").value;

		 	 //this is a firebase Authentication method we pass the email and password as parameters to it
		  	 firebase.auth().signInWithEmailAndPassword(e, pass).catch(function(error) {
		  		  // Handle Errors here.
				  var box = document.getElementById("error"); // get a reference to the span in the form that we use to display errors
				  //the following members of the object error give the error code and the message that we can use to distinguish exactly
				  //what error occoured
				  var errorCode = error.code;
				  var errorMessage = error.message;

				  if (errorCode == 'auth/wrong-password') { // if the error is wrong password 
				   box.innerHTML = "/ Invalid password Entered /";
				  } 
				  else  if (errorCode == 'auth/invalid-email') { // if username doesnt exist
				    box.innerHTML = "/ No User Exists with this email /";
				  } 
				  else { // any other error
				     box.innerHTML = "/ An Unidentified Error Occoured, if this persists contact the administrator /";
				  }
				  console.log(error);//we log the error in the console just for debug purposes
			});
		  	return false;
		  }

		  //this is a event callback function that is called whenever the authentication state changes for the page
		  //ie, the user logs in or registered
		  //this is also called on page load, therefore if the user has already logged in we send them to the next page 
		  //automatically

		  firebase.auth().onAuthStateChanged(function(firebaseUser){ 
		  	if(firebaseUser){
		  		window.location="test";
		  	}
		  	// else
		  	// {
		  	// 	user is not logged in 
		  	// }
		  });
	</script>
</body>
</html>
