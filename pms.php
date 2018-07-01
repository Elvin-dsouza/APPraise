<?php
    session_start();
	require_once 'includes/classes/form.php';
	$e_id= 0;
    if($_SESSION['loggedIn'] == 1){
        if(!isset($_GET['f_id']) || $_GET['f_id'] < 0){
            die("Error: Possible Attempt to Gain Unauthorised access, your IP has been logged and the administration has been notified.");
        }
        else{
            $e_id = Form::validForm($_GET['f_id']);
            if(!$e_id)
                die("Error: Possible Attempt to Gain Unauthorised access, your IP has been logged and the administration has been notified.");
            else {
                
            }
        }

    }
    else {
        header('location:login.php');
    }


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/modernflex.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body data-eid=<?php echo "'".$e_id->e_id."'";?>>
	<svg style="position: absolute; width: 0; height: 0;" width="0" height="0" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
			<defs>
				<symbol id="icon-arrow_back" viewBox="0 0 24 24">
					<title>arrow_back</title>
					<path d="M20.016 11.016v1.969h-12.188l5.578 5.625-1.406 1.406-8.016-8.016 8.016-8.016 1.406 1.406-5.578 5.625h12.188z"></path>
				</symbol>
				<symbol id="icon-exit_to_app" viewBox="0 0 24 24">
					<title>exit_to_app</title>
					<path d="M18.984 21c1.078 0 2.016-0.938 2.016-2.016v-13.969c0-1.078-0.938-2.016-2.016-2.016h-13.969c-1.125 0-2.016 0.938-2.016 2.016v3.984h2.016v-3.984h13.969v13.969h-13.969v-3.984h-2.016v3.984c0 1.078 0.891 2.016 2.016 2.016h13.969zM10.078 8.391l2.578 2.625h-9.656v1.969h9.656l-2.578 2.625 1.406 1.406 5.016-5.016-5.016-5.016z"></path>
				</symbol>
				<symbol id="icon-menu" viewBox="0 0 24 24">
					<title>menu</title>
					<path d="M3 6h18v2.016h-18v-2.016zM3 12.984v-1.969h18v1.969h-18zM3 18v-2.016h18v2.016h-18z"></path>
				</symbol>
				<symbol id="icon-settings" viewBox="0 0 24 24">
					<title>settings</title>
					<path d="M12 15.516c1.922 0 3.516-1.594 3.516-3.516s-1.594-3.516-3.516-3.516-3.516 1.594-3.516 3.516 1.594 3.516 3.516 3.516zM19.453 12.984l2.109 1.641c0.188 0.141 0.234 0.422 0.094 0.656l-2.016 3.469c-0.141 0.234-0.375 0.281-0.609 0.188l-2.484-0.984c-0.516 0.375-1.078 0.75-1.688 0.984l-0.375 2.625c-0.047 0.234-0.234 0.422-0.469 0.422h-4.031c-0.234 0-0.422-0.188-0.469-0.422l-0.375-2.625c-0.609-0.234-1.172-0.563-1.688-0.984l-2.484 0.984c-0.234 0.094-0.469 0.047-0.609-0.188l-2.016-3.469c-0.141-0.234-0.094-0.516 0.094-0.656l2.109-1.641c-0.047-0.328-0.047-0.656-0.047-0.984s0-0.656 0.047-0.984l-2.109-1.641c-0.188-0.141-0.234-0.422-0.094-0.656l2.016-3.469c0.141-0.234 0.375-0.281 0.609-0.188l2.484 0.984c0.516-0.375 1.078-0.75 1.688-0.984l0.375-2.625c0.047-0.234 0.234-0.422 0.469-0.422h4.031c0.234 0 0.422 0.188 0.469 0.422l0.375 2.625c0.609 0.234 1.172 0.563 1.688 0.984l2.484-0.984c0.234-0.094 0.469-0.047 0.609 0.188l2.016 3.469c0.141 0.234 0.094 0.516-0.094 0.656l-2.109 1.641c0.047 0.328 0.047 0.656 0.047 0.984s0 0.656-0.047 0.984z"></path>
				</symbol>
				<symbol id="icon-download" viewBox="0 0 32 32">
					<title>download</title>
					<path d="M16 18l8-8h-6v-8h-4v8h-6zM23.273 14.727l-2.242 2.242 8.128 3.031-13.158 4.907-13.158-4.907 8.127-3.031-2.242-2.242-8.727 3.273v8l16 6 16-6v-8z"></path>
				</symbol>
			</defs>

	</svg>
	<div style="position:sticky; top:0">
		<header class="title-bar container row" style="background: #3F51B5; justify-content: flex-start;">
			<div class="container col" style="justify-content: space-between;">
				<div class="container center-vert">
					<svg class="icon">
						<use xlink:href="#icon-arrow_back"></use>
					</svg>
					<h1 class="inline-head">AppRaise</h1>
				</div>
				<div class="container center-vert" style="justify-content: flex-end;">
					<span class="profile-name"><?php echo $_SESSION['name'];?></span>
					<svg class="icon">
						<use xlink:href="#icon-exit_to_app"></use>
					</svg>
					<svg class="icon">
						<use xlink:href="#icon-settings"></use>
					</svg>
				</div>
			</div>
		</header>
		<div class="container col" style="width:100vw; justify-content: space-between; background:#ECEFF1;">
			<div class="save-indicator" id="saveIndicator" style="margin-left:8%">
				<svg class="icon icon-download" id="saveButton">
					<use xlink:href="#icon-download"></use>
				</svg>
				<p class="save-status" id="saveIndicatorStatus"> Last Saved, 20/11/1996 3:45 PM</p>
			</div>
			<div class="tab-container" id="partSelector" style="margin-right:10%">
				<!-- <div class="tab active-tab">Personal Info</div> -->
				<div class="tab active-tab" onclick="changeForm(this,1)">A</div>
				<div class="tab" onclick="changeForm(this,2)">B2</div>
				<div class="tab" onclick="changeForm(this,3)">B1</div>
				<div class="tab" onclick="changeForm(this,4)">B3</div>	
			</div>
		</div>
	</div>
	
	<main class="container row center" style="max-width:85vw; margin:0 auto; margin-top:10px;" >
		<div class="appraisal-heading" style="justify-content: space-between">
			<h1 id="form-header">PART A: Teaching Info</h1>
			<!-- <p id="form-max-points">MAX 50 Points</p> -->
		</div>
		<div id="appraisal-elements">
		</div>
	</main>
	<script src="js/save_indicator.js"></script>
	<script src = "js/pms.js"></script>
	<script>
		let b = document.getElementsByTagName("body")[0];
		let employee_id = b.dataset.eid;
		// inflateCriteria(document.getElementById("appraisal-elements"),"Test", "Description",10);
		// inflateCriteria(document.getElementById("appraisal-elements"),"Test", "Description",10);
		// inflateCriteria(document.getElementById("appraisal-elements"),"Test", "Description",10);
        loadForm(employee_id,1);
        
        function activeTab($obj){
            let partSelector = document.getElementById("partSelector");
            let tabs = partSelector.getElementsByClassName("tab");
            for (let i = 0; i < tabs.length; i++) {
                const element = tabs[i];
                tabs[i].className="tab"; 
            }
            $obj.className = "tab active-tab";

        }

        function changeForm($obj,$part){
            let FORM_PART_A_HEADING = "PART A: Teaching Support";
            let FORM_PART_B1_HEADING = "PART B1: Research Accomplishments";
            let FORM_PART_B2_HEADING = "PART B2: Professional Accomplishments";
            let FORM_PART_B3_HEADING = "PART B3: Administrative and Other Activities";
            let hding = document.getElementById("form-header");
            switch ($part) {
                case 1:
                    hding.innerHTML = FORM_PART_A_HEADING;
                    break;
                case 2:
                    hding.innerHTML = FORM_PART_B1_HEADING;
                    break;
                case 3:
                    hding.innerHTML = FORM_PART_B2_HEADING;
                    break;
                case 4:
                    hding.innerHTML = FORM_PART_B3_HEADING;
                    break;
            }
            document.getElementById("appraisal-elements").innerHTML="";
            loadForm(employee_id,$part);
			activeTab($obj);
			saveIndicatorActivate();
			saveAllFields();
        }
		 var saveButton = document.getElementById("saveButton"); 

		 saveButton.onclick=function(){
			saveIndicatorActivate();
			saveAllFields();
		 } 
	</script>
</body>
</html>
