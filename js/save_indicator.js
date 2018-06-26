
let si = document.getElementById("saveIndicator");

function saveIndicatorActivate(){
    console.log("test");
    let status = document.getElementById("saveIndicatorStatus");
    let icon = document.getElementById("saveButton");
    status.innerHTML = "Saving...";
    status.style.color = "#3F51B5";
    icon.style.fill = "#3F51B5";
    si.className="save-indicator save-active";

}

function saveIndicatorComplete() {
    let status = document.getElementById("saveIndicatorStatus");
    let icon = document.getElementById("saveButton");
    let d = new Date();
    status.innerHTML = "Last Saved "+d.toLocaleTimeString();
    status.style.color = "gray";
    icon.style.fill = "gray";
    si.className = "save-indicator";
    
}