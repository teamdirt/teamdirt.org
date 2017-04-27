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

// A general Screen resolution controller, meant to control iFrames
function ScreenResolution() {
	
	this.calculateIFrameWidth = function() {
		
		var currentWindowWidth = window.innerWidth;
		
		var iFrameElements = document.getElementsByClassName("iFrameElement");
		
		if (currentWindowWidth <= 1080) {
			// All of the elements should be less then 1000
			var desiredWidth = currentWindowWidth - 100;
			
			for (var i=0; i < iFrameElements.length; i++) {
				
				// Account for PinkBike-Trailforks objects
				if (iFrameElements[i].hasAttribute("data-w")) {
					iFrameElements[i].setAttribute("data-w",desiredWidth);
					
					var pbClassList = iFrameElements[i].classList;
					if (pbClassList.contains("TrailforksRegionInfo")) {
						iFrameElements[i].setAttribute("data-h",parseInt(iFrameElements[i].getAttribute("data-h")) + 50);
					} else if (pbClassList.contains("TrailforksTrailStatus")) {
						iFrameElements[i].setAttribute("data-h",parseInt(iFrameElements[i].getAttribute("data-h")) + 300);	   
					}
				} else {
					iFrameElements[i].setAttribute("width",desiredWidth);
				}

			}
		
		}
		
	}
		
}

// Add the Screen Resolution Controller
tdApp.controller('ScreenResolution', ScreenResolution);