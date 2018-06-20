const fieldSaveHandlerScript = "";


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
function inflateCriteria(parent, heading, description, max_points) {
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

function saveField(){
	let xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			// TODO: handle response
		}
	}

	xmlhttp.open("POST","",true);
	// TODO:send form details and the value of the field
	xmlhttp.send();

	// TODO: save the field value
}












