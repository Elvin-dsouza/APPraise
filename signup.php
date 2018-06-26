<!DOCTYPE html>
<html>
<head>
	<title>MIT Appraise</title>
	<link rel="stylesheet" type="text/css" href="css/profile-page.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div style="position:relative; width:100vw; height:100vh; overflow:hidden;">
        <div class="slider">
            <div style="width:100vw; height:100vh; flex:none;" class="container row center-both" >
                <div class="login-form container padding-20 row" style="max-height:300px;">
                    <h1> <span class="tab" >1</span> Login Information</h1>
                    <input type="email" name="email" placeholder="example@example.com" id="email" required>
                    <input type="password" name="password" placeholder="password" id="pass" required>
                    <span class="container login-form col center-both">
                    <button class="button">Register</button>
                    <button onclick="window.location='signup'" class="button-inverse">Already Registered? Login in</button>
                    </span>
                </div>
            </div>
            <div style="width:100vw; height:100vh; flex:none;" class="container col center-both">
                <div class="login-form container padding-20 row" style="max-width:50vw;">
                    <h1> <span class="tab" > 2</span> Employee Information</h1>
                        <span class="container row c9" style="margin-top:10px;">
                            <label>Employee Name</label>
                            <input type="text" name="name" placeholder="Title.Firstname Lastname" id="name" required>
                        </span>
                         <span class="container row " style="margin-top:10px;">
                                <label>Department</label>
                                <select name="department" id="selectDepartment">
                                    <option value="-1">Select Department</option>
                                </select>
                        </span>
                        <span class="container col" style="margin-top:10px; justify-content:space-between;">
                            <span class="container row c1">
                                <label>Employee ID</label>
                                <input type="text" name="employeeid" placeholder="MAHEXXXX" id="formEmployeeId"  required>
                            </span>
                           
                        </span>
                        <span class="container col" style="margin-top:10px; justify-content:space-between;">
                            <span class="container row">
                                <label>Date Of Birth</label>
                                <input type="date" name="dob" required>
                            </span>
                            <span class="container row c1" style="margin-left:10px;">
                                <label>Date Of Joining</label>
                                <input type="date" name="doj"  required>
                            </span>
                            <span class="container row c1" style="margin-left:10px;">
                                <label>In Position Since</label>
                                <input type="date" name="pos" required>
                            </span>
                        </span>
                        <span class="container row c9" style="margin-top:10px;">
                            <label>Designation</label>
                            <input type="text" name="eid" placeholder="Designation" id="eid" required>
                        </span>
                       <span class="container col" style="margin-top:10px; justify-content:space-between;">
                            <span class="container row c9">
                                <label>Qualification</label>
                                <input type="text" name="qualification" placeholder="qualification" required>
                            </span>
                            <span class="container row c1" style="margin-left:10px;">
                                <label>Age</label>
                                <input type="Text" name="age" placeholder="Age"  required>
                            </span>
                            
                        </span>
                        
                        <span class="container login-form col center-both">
                        <button class="button">Register</button>
                        <button onclick="window.location='signup'" class="button-inverse">Already Registered? Login in</button>
                    </span>
                </div>
            </div>
        </div>
    </div>
	<script src="https://www.gstatic.com/firebasejs/5.0.1/firebase.js"></script>
	<script src="https://www.gstatic.com/firebasejs/4.13.0/firebase.js"></script>
	<script src="https://www.gstatic.com/firebasejs/4.13.0/firebase-firestore.js"></script>
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
		  var db = firebase.firestore();
		  function  register(){
		  		var name = document.getElementById("name").value;
		  		var eid = document.getElementById("eid").value;
		  		var dept = document.getElementById("dept").value;
		  		var designation = document.getElementById("designation").value;
			  db.collection("staff").add({
			  	"Name":name,
			  	"Designation":designation,
			  	"Department":dept,
			  	"id":eid
			  }).then(function(docRef){
			  	if(docRef){
			  		alert("successfully registered");
			  	}
			  	console.log(docRef);
			  }).catch(function(error){
			  	console.log(error);
			  });
		  }
	</script>
</body>
</html>