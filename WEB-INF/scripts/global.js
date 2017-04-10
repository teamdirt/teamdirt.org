// Define the Application
var tdApp = angular.module('tdApp', []);

function HeroBanner() {
    var slideIndex = 0;
    
	// We want the Hero to be 1600x!
	//convert -resize 1600x bareTrail2.jpg bareTrail2.jpg
    this.images = [
		{name:"", src:"/imgs/raw_imgs/equipment/eqp_1.JPG"},
        {name:"", src:"/imgs/raw_imgs/equipment/eqp_2.JPG"},
        {name:"A Cool Img", src:"/imgs/raw_imgs/bare_trail/bareTrail1.jpg"},
		{name:"A Cool Img Too", src:"/imgs/raw_imgs/bare_trail/bareTrail2.jpg"},
        {name:"Building", src:"/imgs/raw_imgs/building/building_1.jpg"},
        {name:"An Event", src:"/imgs/raw_imgs/events/events_1.jpg"}
    ];
    
    this.getCurrentImg = function () {
        return this.images[slideIndex].src;
    }
	
	this.getCurrentImgName = function () {
		return this.images[slideIndex].name;
	}
	
	this.getBackgroundImg = function () {
		return {'background-image':'url(' + this.getCurrentImg() +')' };
	}
	
    this.shift = function(n) {
        if (n + slideIndex > this.images.length - 1) {
            slideIndex = 0;
        } else if (n + slideIndex < 0) {
            slideIndex = this.images.length - 1;       
        } else {
            slideIndex += n;
        }
    }

    this.set = function(n) {
        slideIndex = n;
    }
    
    this.getColorCode = function(n) {
        if (n == slideIndex) {
            return "w3-green";
        }
        return "";
    }
      
}

// Add the Hero Banner Controller
tdApp.controller('HeroBanner', HeroBanner);