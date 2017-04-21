// Define the AngularJS Application
var tdApp = angular.module('tdApp', []);

// Define constants, the teamdirt token only allows for read access to public pages
var facebookParams = {
    graphAPIVersion:'v2.9',
    pageID:'teamdirtimba',
    teamDirtToken:'117286765480931|yifHszimouD4XXdfR9H0ydB4Rg0'
}

// Image Gallery, modal dialog
function modalImgView(element) {
    
    document.getElementById("modalImg01").src = element.src;
        
    // Div ID is located in the footer.htm
    document.getElementById("modal01").style.display = "block";
}