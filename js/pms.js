var db = firebase.firestore(); // initialise firestore object
var formA = db.collection("form").doc("A");// get the form a document
var formAFields = formA.collection("fields");// get the sub collection fields that contains the doc fields

var heading;
formA.get().then(function (doc) {
    if (doc.exists) {
        console.log("Document data:", doc.data());
        // var header = document.getElementById("form-header");
        // var max_points = document.getElementById("form-max-points");
        // heading = doc.data().desc;
        // header.innerHTML = heading;
        // max_points.innerHTML = "Max Points: " + doc.data().maxPoints;
        formAFields.orderBy("order").get().then((querySnapshot) => {
            querySnapshot.forEach((doc) => {
                var container = document.createElement("div");
                container.className = "appraisal-criteria";
                var criteriaHeader = document.createElement("header");
                var criteriaHeading = document.createElement("h2");
                criteriaHeading.innerHTML = doc.data().heading;
                criteriaHeader.append(criteriaHeading);
                var criteriaDescription = document.createElement("p");
                
                if (doc.data().desc !== undefined)
                    criteriaDescription.innerHTML = doc.data().desc;
                criteriaHeader.append(criteriaDescription);
                container.append(criteriaHeader);
                
                document.getElementById("appraisal-elements").append(container);
            });
        }).catch((error) => {
            console.log(error);
        });
    } 
});