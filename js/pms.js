const fieldSaveHandlerScript = "";
// TODO: Replace generic id with actual id from the form


/**
 * Inflate Criteria.
 * Function to inflate each criteria of the appraisal Form.
 * @param {Object} parent the DOM element to inflate in
 * @param {String} heading the heading to inflate 
 * @param {String} description the criteria Description
 * @param {Number} max_points the max number to allow in the input element
 * 
 * @author Elvin Shawn Dsouza
 */

function inflateStaffDetails(parent, staffDetails){


}




function inflateCriteria(parent, heading, description, max_points, formValue = "") {
	   let container = document.createElement("div"); // create a container div element
	   container.className = "appraisal-criteria"; // give the container a classname
	   let criteriaHeader = document.createElement("header"); // container for the heading
	   let criteriaHeading = document.createElement("h2"); // the actual heading for the criteria
	   let criteriaDescription = document.createElement("p"); // the description for the criteria
	   let criteriaInput = document.createElement("input");
	   criteriaInput.setAttribute('type', 'number');
	   criteriaInput.setAttribute('max',max_points);
	   criteriaInput.setAttribute('min',0);
	   criteriaInput.setAttribute('placeholder',"[0 - "+ max_points+"]");
	   criteriaInput.setAttribute('value',formValue);
	   criteriaHeading.innerHTML = heading;
		if (description !== undefined)
			criteriaDescription.innerHTML = description;
		// append all the elements into the container div
		container.append(criteriaHeader);
		criteriaHeader.append(criteriaHeading);
		criteriaHeader.append(criteriaDescription);
		container.append(criteriaInput);
		// append the container div to the parent element
		parent.append(container);
		let inputField = container.getElementsByTagName("input");
		inputField[0].addEventListener("blur",saveField());
}


function inflateCriteriaFromObject(parent, criteriaObject) {
	
	let container = document.createElement("div"); // create a container div element
	let childContainer = document.createElement("div");

	container.className = "appraisal-criteria"; // give the container a classname
	childContainer.className = "app-child-container"; // give the container a classname

	let criteriaHeader = document.createElement("header"); // container for the heading
	let criteriaHeading = document.createElement("h2"); // the actual heading for the criteria
	let criteriaDescription = document.createElement("p"); // the description for the criteria

	criteriaHeading.innerHTML = criteriaObject.heading;
	if (criteriaObject.description !== undefined)
		criteriaDescription.innerHTML = criteriaObject.description;
	// append all the elements into the container div
	container.append(criteriaHeader);
	criteriaHeader.append(criteriaHeading);
	criteriaHeader.append(criteriaDescription);
	if (criteriaObject.numChildren > 0){
		
		for (let i = 0; i < criteriaObject.children.length; i++) {
			const child = criteriaObject.children[i];
			inflateCriteriaFromObject(childContainer, child);
		}
	}
	else{
		let criteriaInput = document.createElement("input");
		criteriaInput.setAttribute('type', 'number');
		criteriaInput.setAttribute('max', criteriaObject.max_points);
		criteriaInput.setAttribute('min', 0);
		criteriaInput.setAttribute('placeholder', "[0 - " + criteriaObject.max_points + "]");
		criteriaInput.setAttribute('value', criteriaObject.value);
		container.append(criteriaInput);
		let inputField = container.getElementsByTagName("input");
		inputField[0].addEventListener("blur", saveField());
	}
	// append the container div to the parent element
	container.append(childContainer);
	parent.append(container);
	
}

function saveField(){
	let xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			// TODO: handle response
		}
		// TODO: handle errors
	}
	xmlhttp.open("POST","",true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	// TODO:send form details and the value of the field
	xmlhttp.send();
}


function loadForm(e_id, formPart){
	let formContainer = document.getElementById("appraisal-elements");
	let xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200)
		{
			let form = JSON.parse(this.responseText);
			for (let i = 0; i < form.length; i++) {
				const item = form[i];
				inflateCriteriaFromObject(formContainer,item);
			}
		}
		//TODO: handle errors
	}
	xhttp.open("POST","handler/load_form.php",true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("e_id="+e_id+"&formPart="+formPart);

}










