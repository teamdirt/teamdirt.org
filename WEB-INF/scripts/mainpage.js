// Define the Application
var tdApp = angular.module('tdApp', []);

function HeroBanner() {
    var slideIndex = 0;
    
	// In the near future, this will be done with a Rest call to teamdirt.org
	// We want the Hero to be 2000x!
	//convert -resize 2000x bareTrail2.jpg bareTrail2.jpg
    this.images = [
		{name:"", src:"/imgs/raw_imgs/equipment/eqp_1.png"},
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

function EventController($scope, $http) {
	
	var isEventDataPulled = false;
	
	// Facebook Config
	var pageID = 'gregsnonformal';
	var numEventsToPull = '20';
	var teamDirtToken = '117286765480931|yifHszimouD4XXdfR9H0ydB4Rg0';
	
	$scope.tdEvents = [];
	$scope.isFaceBookError = false;
	
	var pullEventData = function() {
		
		// We first query facebook for all events on page /teamdirtIMBA
		$http({
  			method: 'GET',
  			url: 'https://graph.facebook.com/v2.8/'+ pageID +'?access_token=' + teamDirtToken + '&fields=events.include_canceled(true).limit(' + numEventsToPull + '){name,start_time,end_time,description,place,is_canceled,cover,updated_time,attending_count,maybe_count,interested_count}&format=json&method=get'
		}).then(function successCallback(response) {
			// this callback will be called asynchronously, when the response is available
			//console.log(JSON.stringify(response));
			
			// parse the events
			var listEvents = response.data.events.data;
			
			// Find all events that had a start date before now
			var now = Date.now();
			var removeIndex = [];
			for (var i = 0; i < listEvents.length; i++) {
				
				var miliSecTime = Date.parse(listEvents[i].start_time);
				
				if (miliSecTime < now) {
					removeIndex.push(i);
				}
			}
			
			// Remove all events that had a start date before now
			for (var i = removeIndex.length - 1; i >= 0; i--) {
				listEvents.splice(removeIndex[i],1);
			}
			
			// Sort the events in order of start time
			listEvents.sort(function(a,b){return Date.parse(a.start_time) - Date.parse(b.start_time)});
			
			// Save the events
			for (var i = 0; i < listEvents.length; i++) {
				$scope.tdEvents.push(listEvents[i]);
			}
			
			// Make sure, that we only query upon page refresh
			isEventDataPulled = true;
			
		  }, function errorCallback(response) {
			// called asynchronously if an error occurs or server returns response with an error status.
			
			// Error flag set, and clear events.
			$scope.isFaceBookError = true;
			$scope.tdEvents = [];
		  });
		
	}
	
	
	this.testRequest = function() {
		pullEventData();
		console.log(JSON.stringify($scope.tdEvents));
	}
	
	this.isNotEmptyEventList = function() {
		
		/*
		if (isEventDataPulled != true) {
			pullEventData();
		}
		*/
		
		if ($scope.tdEvents.length != 0) {
			return true;
		}
		
		return false;
	}
	
}

// Add the Controllers
tdApp.controller('HeroBanner', HeroBanner);
tdApp.controller('EventController', EventController);