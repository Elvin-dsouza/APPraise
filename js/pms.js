<<<<<<< HEAD

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
	   criteriaHeading.innerHTML = heading;
		if (description !== undefined)
			criteriaDescription.innerHTML = description;
		// append all the elements into the container div
		container.append(criteriaHeader);
		criteriaHeader.append(criteriaHeading);
		criteriaHeader.append(criteriaDescription);
		// append the container div to the parent element
		parent.append(container);

}













=======
var db = firebase.firestore(); // initialise firestore object
var formA = db.collection("form").doc("A");// get the form a document
var formAFields = formA.collection("fields");// get the sub collection fields that contains the doc fields
var heading;

formA.get().then(function (doc) {
    if (doc.exists) {
        console.log("Document data:", doc.data());
        var header = document.getElementById("form-header");
        var max_points = document.getElementById("form-max-points");
        heading = doc.data().desc;
        header.innerHTML = "Part A:"+heading;
        max_points.innerHTML = "Max Points: " + doc.data().maxPoints;
        formAFields.get().then((querySnapshot) => {
            querySnapshot.forEach((doc) => {
                var container = document.createElement("div");
                container.className = "appraisal-criteria";
                var criteriaHeader = document.createElement("header");
                var criteriaHeading = document.createElement("h2");
                criteriaHeading.innerHTML = doc.data().heading;
                criteriaHeader.append(criteriaHeading);
                var criteriaDescription = document.createElement("p");
                var inputField = document.createElement("input");
                inputField.setAttribute('type','number');
                inputField.setAttribute('placeholder', 'points');
                if (doc.data().desc !== undefined)
                    criteriaDescription.innerHTML = doc.data().desc;
                criteriaHeader.append(criteriaDescription);
                container.append(criteriaHeader);
                container.append(inputField);
                console.log(inputField);
                document.getElementById("appraisal-elements").append(container);
            });
        }).catch((error) => {
            console.log(error);
        });
    } 
});
>>>>>>> cb949dfba0704fd62563426bbe007a9c579dab9e
