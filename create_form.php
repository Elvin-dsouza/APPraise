<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/modernflex.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>

			.add-form-children{
				margin-left:30px;
			}

			.add-criteria-row{
				border-left:3px solid lightblue;
				padding:20px;

			}

			.buttonAddChild{
				justify-content: flex-start;
				align-items: flex-start;
				max-width:200px;
				margin:0;
			}

	</style>
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
		<div class="container col" style="width:100vw; justify-content: space-between; background:#ECEFF1;">
			<div class="save-indicator" style="margin-left:8%">
				<svg class="icon icon-download">
					<use xlink:href="#icon-download"></use>
				</svg>
				<p class="save-status"> Last Saved, 20/11/1996 3:45 PM</p>
			</div>
			<div class="tab-container" id="partSelector" style="margin-right:10%">
				<div class="tab active-tab" onclick="changeForm(this,1)">A</div>
				<div class="tab" data-part="2" onclick="changeForm(this,2)">B2</div>
				<div class="tab" data-part="3" onclick="changeForm(this,3)">B1</div>
				<div class="tab" data-part="4" onclick="changeForm(this,4)">B3</div>

			</div>
		</div>
	</div>

	<main id="main" class="container row center" style="max-width:85vw; margin:0 auto; margin-top:10px;" >
		<div class="appraisal-add-form" style="justify-content: space-between">
			<h1 id="form-header">PART A: Teaching Info</h1>
			<p id="form-max-points">MAX 50 Points</p>
		</div>
		<div id="appraisal-add-form">
		<!--	<div class="container add-criteria row">
				<input type="text" id="addHeading" placeholder = "Heading" class="c8">
				<input type="number" id="addMax"  placeholder="Max Points" class="c1" style="margin-left:10px;">
				<input type="text" id="addDescription" placeholder = "Criteria Description">
				<div class="container row add-form-children">-->
					<!-- <div class="buttonAddChild container row center-vert" onclick="createNewCriteria()">
						<p class="tab">	+ Add Criteria </p>
					</div> -->
				<!--</div>
			</div>
		</div>-->
	</div>

	<div class="buttonAddChild container row center-vert" onclick="sub()">
		<p class="tab" style="color:blue">	SUBMIT </p>
	</div>
	</main>
	<script>
		let Part = 1;

		// function changeForm($obj,$part){
		// 	Part=$part;
		// 	activeTab($obj);

		// 	let parent= document.getElementsByClassName("appraisal-add-form")[0];
		// 	parent.remove(parent);
		// 	let main=document.getElementById('main');
		// 	let parentContainer = document.createElement("div");
		// 	parentContainer.className="appraisal-add-form";
		// 	parentContainer.style="justify-content: space-between";
		// 	parentContainer.innerHTML="	<h1 id='form-header'>PART A: Teaching Info</h1>"+
		// 		"<p id='form-max-points'>MAX 50 Points</p>"+
		// 	"<div id='appraisal-add-form'><div id='appraisal-add-form'></div>"
		// 	main.append(parentContainer);
		// 	let parent1 = document.getElementsByClassName("appraisal-add-form")[0];
		// 	createCriteriaForm(parent1);
		// }

		let parentContainer = document.getElementsByClassName("appraisal-add-form")[0];
		createCriteriaForm(parentContainer);

		function createNewCriteria(c){
			createCriteriaForm(c);

		}

		  function changeForm($obj,$p){
            let FORM_PART_A_HEADING = "PART A: Teaching Support";
            let FORM_PART_B1_HEADING = "PART B1: Research Accomplishments";
            let FORM_PART_B2_HEADING = "PART B2: Professional Accomplishments";
            let FORM_PART_B3_HEADING = "PART B3: Administrative and Other Activities";
            let hding = document.getElementById("form-header");
            switch ($p) {
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
			activeTab($obj);
			Part = $p;
		}

		function activeTab($obj){
				let partSelector = document.getElementById("partSelector");
				let tabs = partSelector.getElementsByClassName("tab");
				for (let i = 0; i < tabs.length; i++) {
						const element = tabs[i];
						tabs[i].className="tab";
				}
				$obj.className = "tab active-tab";

		}

		function createCriteriaForm(parent){
			let container = document.createElement("div");
			container.className = "add-criteria-row";
			container.style.order=1;
			let iHeading = document.createElement("textarea");
			iHeading.className = "dHeading";
			iHeading.placeholder="Heading";
			let iMax = document.createElement("input");
			iMax.className="dMax";
			iMax.placeholder="Max Points";
			let iDesc = document.createElement("textarea");
			iDesc.className="dDesc";
			iDesc.placeholder="Criteria Description";
			let iEval = document.createElement("select");
			iEval.className="dEval";
			let eval_employee = document.createElement("option");
			eval_employee.innerHTML="Employee";
			eval_employee.value=1;
			let eval_hod = document.createElement("option");
			eval_hod.innerHTML="Head Of Department";
			eval_hod.value=2;
			let eval_Director = document.createElement("option");
			eval_Director.innerHTML = "Director"
			eval_Director.value=3;
			iDesc.placeholder="Criteria Description";
			iEval.append(eval_employee);
			iEval.append(eval_hod);
			iEval.append(eval_Director);
			container.append(iHeading);
			container.append(iMax);
			container.append(iDesc);
			container.append(iEval);
			let childContainer = document.createElement("div")
			childContainer.className ="add-form-children container row";
			let addButtonContainer = document.createElement("div");
			addButtonContainer.className = "buttonAddChild container row center-vert";
			addButtonContainer.style.order = 2;
			addButtonContainer.onclick = function(){
				createNewCriteria(childContainer);
			}
			addButtonContainer.innerHTML = "<p class='tab'> <span style='color:blue'>+</span> add Criteria </p>";
			childContainer.append(addButtonContainer);
			container.append(childContainer);
			parent.append(container);

		}


		function sub(){
			let parent = document.getElementsByClassName("appraisal-add-form")[0];
			let output_array = retrieve(parent);
			sendCriteria(output_array);
			// console.log(JSON.stringify(output_array));
		}
		//let count = 0;
			function retrieve(parent){
				let temp = {};
				//count++;
				temp.heading = parent.getElementsByClassName("dHeading")[0].value;
				temp.max = parent.getElementsByClassName("dMax")[0].value;
				temp.description = parent.getElementsByClassName("dDesc")[0].value;
				temp.eval_level = parent.getElementsByClassName("dEval")[0].value;
				temp.part = Part;
				temp.isSubCriteria = 0;
				let child = parent.getElementsByClassName("add-form-children")[0];
				console.log(parent);
				let clen= child.children.length-1;
				temp.numChildren = clen;
				if (clen==0)
				{
					temp.children = [];
					return temp;
				}
				let cArray = [];
				for(let i=1;i<clen+1;i++){
							let tempOutput = retrieve(child.children[i]);
							tempOutput.isSubCriteria = 1;
							cArray.push(tempOutput);
					}
				temp.children = cArray;
				return temp;
			}

			function sendCriteria(jobj){
				let xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function(){
					if(this.readyState == 4 && this.status == 200){
						let output = JSON.parse(this.responseText);
						if(output.status == 1){
							alert("Criteria Created");
						}
						else {
							alert("An Unexpected Error Occoured");
						}
					}
				}
				xhttp.open("POST","handler/add_criteria.php",true);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send("json="+JSON.stringify(jobj));
			}


	</script>
</body>
</html>
