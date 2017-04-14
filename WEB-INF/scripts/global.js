// Define the Application
var tdApp = angular.module('tdApp', []);

// Image Gallery, modal dialog
function onClick(element) {
    document.getElementById("img01").src = element.src;
    document.getElementById("modal01").style.display = "block";
}