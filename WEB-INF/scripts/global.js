// Define the AngularJS Application
var tdApp = angular.module('tdApp', []);

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
			var desiredWidth = currentWindowWidth - 50;
			
			for (var i=0; i < iFrameElements.length; i++) {
				
				// Account for PinkBike-Trailforks objects
				if (iFrameElements[i].hasAttribute("data-w")) {
					iFrameElements[i].setAttribute("data-w",desiredWidth);
					
					var pbClassList = iFrameElements[i].classList;
					if (pbClassList.contains("TrailforksRegionInfo")) {
                        
                        if (currentWindowWidth < 400) {
                            iFrameElements[i].setAttribute("data-h",parseInt(iFrameElements[i].getAttribute("data-h")) + 80);
                        } else if (currentWindowWidth >= 400 && currentWindowWidth < 800) {
                            iFrameElements[i].setAttribute("data-h",parseInt(iFrameElements[i].getAttribute("data-h")) + 40);     
                        }
						
					} else if (pbClassList.contains("TrailforksTrailStatus")) {
 
                        if (currentWindowWidth < 400) {
                            // Don't show the comments for really small screens
                            iFrameElements[i].setAttribute("data-displaytype","list");
                        } else {
                            // Expand the length of the table
                            iFrameElements[i].setAttribute("data-h",parseInt(iFrameElements[i].getAttribute("data-h")) + 300);
                        }
                        
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