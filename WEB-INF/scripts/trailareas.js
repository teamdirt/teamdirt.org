//var style = "/styles/trailareas.css";
var script = document.createElement("script"); 
script.setAttribute("src", "https://es.pinkbike.org/ttl-86400/sprt/j/trailforks/widget.js"); 
document.getElementsByTagName("head")[0].appendChild(script); 
var widgetCheck = false;

// Define the Application
// NOTE:  We have to clear the location prefix for 1.6+
var tdApp = angular.module('tdApp', []);

// Static Values for the Trail Areas
tdApp.value("trailForksInfo",
			{alseafalls:{rid:3941,isWarning:true},
			 macdunn:{rid:6121,isWarning:false}
			});

// Ride Area Def
function RideArea(trailForksInfo) {
    this.isWarning = true;
	this.rid = 3941;
}

// Add the warning Controller
tdApp.controller('RideArea', RideArea);
