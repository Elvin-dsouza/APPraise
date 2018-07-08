<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/modernflex.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body >
	<svg style="position: absolute; width: 0; height: 0;" width="0" height="0" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
			<defs>
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
						<use xlink:href="#icon-menu"></use>
					</svg>
					<h1 class="inline-head">AppRaise - Form Creation</h1>
				</div>
				<div class="container center-vert" style="justify-content: flex-end;">
					<span class="profile-name">Dr. Karunakar Kotegar</span>
					<svg class="icon">
						<use xlink:href="#icon-exit_to_app"></use>
					</svg>
					<svg class="icon">
						<use xlink:href="#icon-settings"></use>
					</svg>
				</div>
			</div>
		</header>
	</div>
	<div class="main_container">
		<div class="appraiser_container">
			<h3 class="appraiserhead" id="appraiserhead">Proposed plan for <?php echo date("Y"); ?></h3>
			<textarea name="appraisertext"  id="appraisertext" style="font-size: 2em;font-family:arial;"></textarea>
		</div>
		<div class="appraisee_container">
			<h3 class="appraiseehead" id="appraiseehead">Current status for <?php echo date("Y"); ?></h3>
			<textarea name="appraiseetext" id="appraiseetext" style="font-size: 2em;font-family:arial;"></textarea>
		</div><br><br>
		<div class="nextyear_container" style="align-content: center;width: auto;height: auto;">
			<h3 id="nextyear_head" style="font-size:2em">Proposed plan for <?php $y=date("Y"); $y+=1; echo $y; ?></h3>
			<textarea name="nextyear_obj" id="nextyear_obj" style="font-size: 2em;font-family:arial;width: 100%;"></textarea>
		</div><br><br>
		<center><input type="submit" onclick="fnsubmit()" name="save" id="save" value="SAVE"></center>
	</div>

	
		<script type="text/javascript">
			function fnsubmit()
			{
				var obj={"car"}{"bus"};
				let cplan_text=document.getElementById("appraisertext").value;
				let splan_text=document.getElementById("appraiseetext").value;
				let nplan_text=document.getElementById("nextyear_obj").value;
		

				if(cplan_text==null||cplan_text==undefined||cplan_text==" "||cplan_text==""||splan_text==null||splan_text==undefined||splan_text==" "||splan_text==" "||nplan_text==null||nplan_text==undefined||nplan_text==" "||nplan_text=="")
				{
					alert("Please fill all the fields");
					return;
				}
				// obj.cobj=cplan_text;
				// obj.sobj=splan_text;
				// obj.nobj=nplan_text;
				document.write(obj);
				sendObjective(obj);

			}

			function sendObjective(obj){
				let xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function(){
					if(this.readyState == 4 && this.status == 200){
						let output = JSON.parse(this.responseText);
						if(1){
							alert("Objectives added successfully");
						}
						else {
							alert("An Unexpected Error Occoured,please try again");
						}
					}
				}
				xhttp.open("POST","handler/add_objectives.php",true);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send("json="+JSON.stringify(obj));
				window.open("handler/add_objectives.php",'_blank');
			}



		</script>
	

</body>
</html>