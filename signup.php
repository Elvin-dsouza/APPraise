<!DOCTYPE html>
<html>
<head>
	<title>MIT Appraise</title>
	<link rel="stylesheet" type="text/css" href="css/profile-page.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        input[type="text"], input[type="number"]{
            padding:10px;
            font-size:1em;
        }
        select{
            padding:10px;
            font-size:1em;
        }
    </style>
</head>
<body>
    <div style="position:relative; width:100vw; height:100vh; overflow:hidden;">
        <div class="slider" >
            <div style="width:100vw; height:100vh; flex:none;" class="container row center-both" >
                <div class="login-form container padding-20 row" style="max-height:300px;">
                    <h1> <span class="tab" >1</span> Login Information</h1>
                    <input type="email" name="email" placeholder="example@example.com" id="email" required>
                    <input type="password" name="password" placeholder="password" id="pass" required>
                    <span class="container login-form col center-both">
                    <button class="button" onclick="nextStep()">Register</button>
                    <button onclick="window.location='login.php'" class="button-inverse">Already Registered? Login in</button>
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
                       <span class="container col" style="margin-top:10px;">
                            <span class="container row c5">
                                <label>Qualification</label>
                                <input type="text" name="qualification" placeholder="qualification" style="width:50%;" required>
                            </span>
                            <span class="container row c5" style="margin-left:10px;">
                                <label>Age</label>
                                <input type="number" name="age" placeholder="Age" style="width:50%;" required>
                            </span>
                            
                        </span>
                        <span class="container col" style="margin-top:10px; justify-content:space-between;">
                            
                        </span>
                        <span class="container login-form col center-both">
                        <button class="button">Register</button>
                        <button onclick="window.location='signup'" class="button-inverse">Already Registered? Login in</button>
                    </span>
                </div>
            </div>
        </div>
    </div>
	<script>
		function nextStep(){
           let slider =  document.getElementsByClassName("slider")[0];
           slider.className = "slider step-two";
        }
	</script>
</body>
</html>