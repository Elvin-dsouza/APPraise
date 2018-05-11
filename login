<!DOCTYPE html>
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
			<input type="email" name="email" placeholder="example@example.com" id="email" required>
			<input type="password" name="password" placeholder="password" id="pass" required>
			<input type="submit" value="Next &#x21DD;" style="margin-left:10px;" onclick="login_user()">
		</div>

	</div>
	<script src="https://www.gstatic.com/firebasejs/5.0.1/firebase.js"></script>
	<script>
		  // Initialize Firebase
		  var config = {
		    apiKey: "AIzaSyBIuGZSdjW-jRuotqsjOrb5CTcJV8W5_Mo",
		    authDomain: "appraisal-8ca4d.firebaseapp.com",
		    databaseURL: "https://appraisal-8ca4d.firebaseio.com",
		    projectId: "appraisal-8ca4d",
		    storageBucket: "appraisal-8ca4d.appspot.com",
		    messagingSenderId: "502189285093"
		  };
		  firebase.initializeApp(config);

		  function login_user(){
		  	 var e = document.getElementById("email").value;
		 	 var pass = document.getElementById("pass").value;
		  	 firebase.auth().signInWithEmailAndPassword(e, pass).catch(function(error) {
		  		  // Handle Errors here.
				  var errorCode = error.code;
				  var errorMessage = error.message;
				  if (errorCode == 'auth/wrong-password') {
				    alert('Incorrect password entered');
				  } 
				  else  if (errorCode == 'auth/invalid-email') {
				    alert('Invalid email address');
				  } 
				  else {
				    alert(errorMessage);
				  }
				  console.log(error);
			});
		  	return false;
		  }

		  firebase.auth().onAuthStateChanged(function(firebaseUser){
		  	if(firebaseUser){
		  		alert("Logged in");
		  	}
		  	else
		  	{
		  		alert("Not logged in");
		  	}
		  });
	</script>
</body>
</html>