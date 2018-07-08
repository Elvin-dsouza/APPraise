
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
				input.invalid {
        border-color: #DD2C00;
}
    </style>
</head>
<body>
    <div style="position:relative; width:100vw; height:100vh; overflow:hidden;">
        <div class="slider" >
            <div style="width:100vw; height:100vh; flex:none;" class="container row center-both" >
                <div class="login-form container padding-20 row" style="max-height:300px;">
                    <h1> <span class="tab" >1</span> Login Information</h1>
                    <input type="email" name="email" placeholder="example@example.com" id="formEmail" required>
                    <input type="password" name="password" placeholder="password" id="formPass" required>
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
                            <input type="text" name="name" placeholder="Title.Firstname Lastname" id="formName" required>
                        </span>
                         <span class="container row " style="margin-top:10px;">
                                <label>Department</label>
                                <select name="department" id="formDepartment">
                                    <option value="-1">Select Department</option>
                                    <option value="1">Computer Applications</option>
                                </select>
                        </span>
                        <span class="container col" style="margin-top:10px; justify-content:space-between;">
                            <span class="container row c1">
                                <label>Employee ID</label>
                                <input type="text" name="employeeid" placeholder="MAHEXXXX" id="formEid"  required>
                            </span>

                        </span>
                        <span class="container col" style="margin-top:10px; justify-content:space-between;">
                            <span class="container row">
                                <label>Date Of Birth</label>
                                <input type="date" name="dob" id="formDOB" required>
                            </span>
                            <span class="container row c1" style="margin-left:10px;">
                                <label>Date Of Joining</label>
                                <input type="date" name="doj" id="formDOJ"  required>
                            </span>
                            <span class="container row c1" style="margin-left:10px;">
                                <label>In Position Since</label>
                                <input type="date" name="pos" id="formPOS" required>
                            </span>
                        </span>
                        <span class="container row c9" style="margin-top:10px;">
                            <label>Designation</label>
                            <input type="text" name="eid" placeholder="Designation" id="formDesignation" required>
                        </span>
                       <span class="container col" style="margin-top:10px;">
                            <span class="container row c5">
                                <label>Qualification</label>
                                <input type="text" name="qualification" placeholder="qualification" id="formQualification" style="width:50%;" required>
                            </span>
                            <span class="container row c5" style="margin-left:10px;">
                                <label>Age</label>
                                <input type="number" name="age" placeholder="Age" style="width:50%;" id="formAge" required>
                            </span>

                        </span>
                        <span class="container col" style="margin-top:10px; justify-content:space-between;">

                        </span>
                        <span class="container login-form col center-both">
                        <button class="button" id="sendRegistration" onclick="return validate()">Register</button>
                        <button onclick="window.location='signup'" class="button-inverse">Already Registered? Login in</button>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-container">
        <div class="modal-display">
            <div class="profile-confirm">
                <h2></h2>
                <p> We found Some of your details, please confirm this is you </p>
                <img src="" alt="">

                <span class="container col" style="justify-content:space-between">

                    <button class="button" style="color:red" onclick="stepTwoWithOutInfo()">No, This is not me</button>
                    <button class="button" onclick="stepTwoWithInfo()">Yes, This is me</button>
                </span>
            </div>
        </div>
    </div>
	<script>
        let sendObject = {};
        let retImage = "";
        let retName = "";
        let registrationForm = document.getElementById("sendRegistration");
        registrationForm.onclick = function(){
					let name=document.getElementById("formName").value;
					let eid = document.getElementById("formEid").value;
					let dob = document.getElementById("formDOB").value;
					let doj = document.getElementById("formDOJ").value;
					let pos = document.getElementById("formPOS").value;
					let today = new Date();
					let dobResult = new Date(dob);
					let dojResult = new Date(doj);
					let posResult = new Date(pos);
					let designation = document.getElementById('formDesignation').value;
					let qualification = document.getElementById("formQualification").value;
					let age = document.getElementById("formAge").value;
					let nameRGEX = /^[A-Za-z\s]{1,}[\.\']{0,1}[A-Za-z\s]{0,}$/;// /^[a-zA-Z ./']*$/;
					let formEidRGEX = /^MAHE.[0-9]{4}$/;
					let designationRGEX = /^[a-zA-Z ]*$/;
					let qualificationRGEX = /^[a-zA-Z ]*$/;
					let nameResult = nameRGEX.test(name);
					let formEidResult = formEidRGEX.test(formEid);
					let designationResult = designationRGEX.test(designation);
					let qualificationResult = qualificationRGEX.test(qualification);
					let ageResult = today.getFullYear()-dobResult.getFullYear();
					if(nameResult == false)
					{
						alert("Please enter name that can contain only alphabets . and '");
						//document.form.name.focus();
						return false;
					}
					// else if (formEidResult == false) {
					// 	alert("Please enter valid employee id e.g MAHEXXXX");
					// 	return false;
					// }
					else if (dobResult > today) {
						alert("Date of birth entered is not valid!!");
						return false;
					}
					else if(dobResult > dojResult){
						alert("Date of joining entered is not valid!!");
						return false;
					}
					else if(dojResult > posResult){
						alert("Date of position entered is not valid!!");
						return false;
					}
					else if(designationResult == false){
						alert("Designation entered can only be alphabets");
						return false;
					}
					else if(qualificationResult == false){
						alert("qualification entered can only be alphabets");
						return false;
					}
					else if (age!=ageResult) {
						alert("Age entered is invalid!!");
						return false;
					}
            sendObject.e_id = document.getElementById("formEid").value;
            sendObject.password = document.getElementById("formPass").value;
            sendObject.email = document.getElementById("formEmail").value;
            let staff = {};
            staff.e_id = document.getElementById("formEid").value;
            staff.name = document.getElementById("formName").value;
            staff.dept_id = document.getElementById("formDepartment").value;
            staff.doj = document.getElementById("formDOJ").value;
            staff.dob = document.getElementById("formDOB").value;
            staff.pos = document.getElementById("formPOS").value;
            staff.designation = document.getElementById("formDesignation").value;
            staff.qualification = document.getElementById("formQualification").value;
            staff.age = document.getElementById("formAge").value;
            staff.image = retImage;
            sendObject.staff = staff;

            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    let promise = JSON.parse(this.responseText);
                    if(promise.status == 1){
                        alert("Succesfully Registered User, Please Login to Continue");
                    }
                    else{
                        alert("An Unexpected Error Occoured, please Try again Later");
                    }
                }
            }
            console.log(JSON.stringify(sendObject));
            xhttp.open("POST","handler/registration_handler.php",true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("json="+ JSON.stringify(sendObject)+"&e_id="+ sendObject.e_id+"&password="+ sendObject.password+ "&email="+sendObject.email+"&image="+retImage);
        }

		function nextStep(){
           let slider =  document.getElementsByClassName("slider")[0];
           let xhttp = new XMLHttpRequest();
           let found = false;
           xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    let json = JSON.parse(this.responseText);
                    for (let i = 0; i < json.length; i++) {
                        const profile = json[i];
                        if(profile.email ==  document.getElementById("formEmail").value)
                        {
                            retImage = profile.image;
                            retName = profile.name;
                            showDisplayModal(retImage, retName);
                            found = true;
                        }
                    }
                    if(!found){
                        stepTwoWithOutInfo();
                    }
                }
            }

           xhttp.open("GET", "includes/mit_staff.json", true);
           xhttp.send();
        }
        function stepTwoWithOutInfo(){
            document.getElementsByClassName("modal-container")[0].style.display = "none";
            // document.getElementById("formName").value=retName;
            let slider = document.getElementsByClassName("slider")[0];
            slider.className="slider step-two";
        }

        function stepTwoWithInfo(){
            document.getElementsByClassName("modal-container")[0].style.display = "none";
            document.getElementById("formName").value=retName;
            let slider = document.getElementsByClassName("slider")[0];
            slider.className="slider step-two";
        }

        function showDisplayModal(imgSrc,heading){
            let modal = document.getElementsByClassName("modal-container")[0];
            modal.style.display = "flex";
            let displayModal = modal.getElementsByClassName("modal-display")[0];
            displayModal.style.display = "flex";
            let profileConfirm = displayModal.getElementsByClassName("profile-confirm")[0];
            let img = profileConfirm.getElementsByTagName("img")[0];
            img.src = imgSrc;
            let head = profileConfirm.getElementsByTagName("h2")[0];
            head.innerHTML = heading;
        }

	</script>
</body>
</html>
