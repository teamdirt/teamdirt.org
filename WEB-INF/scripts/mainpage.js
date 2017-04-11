// Define the Application
var tdApp = angular.module('tdApp', []);

function HeroBanner() {
    var slideIndex = 0;
    
	// In the near future, this will be done with a Rest call to teamdirt.org
	// We want the Hero to be 2000x!
	//convert -resize 2000x bareTrail2.jpg bareTrail2.jpg
    this.images = [
		{name:"", src:"/imgs/raw_imgs/equipment/eqp_2.JPG"},
		{name:"", src:"/imgs/raw_imgs/equipment/eqp_1.png"},
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

function EventController($http) {
	
	var isEventDataPullInProcess = false;
	var isEventDataPulled = false;
	
	// Facebook Config
	var pageID = 'gregsnonformal';
	//var pageID = 'teamdirtIMBA';
	var removePastEvents = true;
	var numEventsToPull = '20';
	var teamDirtToken = '117286765480931|yifHszimouD4XXdfR9H0ydB4Rg0';
	
	var urlPage = 'https://graph.facebook.com/v2.8/'+ pageID +'?access_token=' + teamDirtToken + '&fields=events.include_canceled(true).limit(' + numEventsToPull + '){name,start_time,end_time,description,place,is_canceled,cover,updated_time,attending_count,maybe_count,interested_count}&format=json&method=get';
	
	var tdEvents = [];
	var isFaceBookError = false;
	
	var pullEventData = function() {
		
		console.log('Make call to: ' +  urlPage);
		
		// We first query facebook for all events on page /teamdirtIMBA
		$http({
  			method: 'GET',
  			url: urlPage
		}).then(function successCallback(response) {
			// this callback will be called asynchronously, when the response is available
			//console.log(JSON.stringify(response));
			
			isEventDataPullInProcess = true;
			
			// parse the events
			var listEvents = response.data.events.data;
			
			// Find all events that had a start date before now
			if (removePastEvents) {
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
			}

			// Sort the events in order of start time
			listEvents.sort(function(a,b){return Date.parse(a.start_time) - Date.parse(b.start_time)});
			
			
			// Format the dates and save
			var days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
			for (var i = 0; i < listEvents.length; i++) {
				// Add pretty formatted event times
				var startDate = new Date(listEvents[i].start_time);
				var endDate = new Date(listEvents[i].end_time);
				
				var startDateString = days[startDate.getDay()] + ', ' + startDate.toLocaleString();
				var endDateString = days[endDate.getDay()] + ', ' + endDate.toLocaleString();
				
				listEvents[i].startDateString = startDateString;
				listEvents[i].endDateString = endDateString;
				
				// Save the events
				tdEvents.push(listEvents[i]);
			}
			
			// Make sure, that we only query upon page refresh
			isEventDataPullInProcess = false;
			isEventDataPulled = true;
			
		  }, function errorCallback(response) {
			// called asynchronously if an error occurs or server returns response with an error status.
			
			// Error flag set, and clear events.
			isFaceBookError = true;
			tdEvents = [];
		  });
		
	}
	
	
	this.pullFacebookEventData = function() {
		pullEventData();
		console.log('Number of Events: ' + tdEvents.length);
	}
	
	this.isNotEmptyEventList = function() {
				
		if (tdEvents.length != 0) {
			return true;
		}
		
		return false;
	}
	
	this.getEventList = function() {
		return tdEvents;
	}
	
}

// Add the Controllers
tdApp.controller('HeroBanner', HeroBanner);
tdApp.controller('EventController', EventController);