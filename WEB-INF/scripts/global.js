// Define the Application
var tdApp = angular.module('tdApp', []);

function HeroBanner() {
    var slideIndex = 0;
    
    this.images = [
        {name:"X", src:"/imgs/placeholder.png"},
        {name:"X", src:"/imgs/heroBanner/building_1.jpg"},
        {name:"X", src:"/imgs/heroBanner/eqp_2.jpg"},
        {name:"X", src:"/imgs/heroBanner/events_1.jpg"}
    ];
    
    this.getCurrentImg = function () {
        return this.images[slideIndex].src;
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
            return "w3-white";
        }
        return "";
    }
      
}


// Add the Hero Banner Controller
tdApp.controller('HeroBanner', HeroBanner);
