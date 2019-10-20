function HeroBanner() {
    var slideIndex = 0;
    
	// In the near future, this will be done with a Rest call to teamdirt.org
	// We want the Hero to be 2000x402!
	//convert -resize 2000x bareTrail2.jpg bareTrail2.jpg
	//convert bareTrail2.jpg -gravity center -crop 2000x480+0+0 bareTrail2.jpg
    this.images = [
		{name:"", src:"/imgs/raw_imgs/banner/eqp_2.jpg"},
        {name:"", src:"/imgs/raw_imgs/banner/building_3.jpg"},
        {name:"", src:"/imgs/raw_imgs/banner/building_1.jpg"},
		{name:"", src:"/imgs/raw_imgs/banner/bareTrail1.jpg"},
        {name:"", src:"/imgs/raw_imgs/banner/eqp_1.jpg"}
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

/*
function EventController($http) {
	
	// Facebook Config
	var removePastEvents = true;
	var numEventsToPull = '20';
	
	var urlPage = 'https://graph.facebook.com/' + facebookParams.graphAPIVersion + '/'+ facebookParams.pageID +'?access_token=' + facebookParams.teamDirtToken + '&fields=events.include_canceled(true).limit(' + numEventsToPull + '){name,start_time,end_time,description,place,is_canceled,cover,updated_time,attending_count,maybe_count,interested_count}&format=json&method=get';
	
	var tdEvents = [];
	var isFaceBookError = false;
	
	var pullEventData = function() {
		
		//console.log('Make call to: ' +  urlPage);
		
		// We first query facebook for all events on page /teamdirtIMBA
		$http({
  			method: 'GET',
  			url: urlPage
		}).then(function successCallback(response) {
			// this callback will be called asynchronously, when the response is available
			//console.log(JSON.stringify(response));
				
			// parse the events
			var listEvents = response.data.events.data;
			
			// Find all events that had a end date before now
			if (removePastEvents) {
				var now = Date.now();
				var removeIndex = [];
				for (var i = 0; i < listEvents.length; i++) {

					//var miliSecTime = Date.parse(listEvents[i].end_time);
                    var miliSecTime = moment(listEvents[i].end_time, moment.ISO_8601).valueOf();

					if (miliSecTime < now) {
						removeIndex.push(i);
					}
				}

				// Remove all events that had a end date before now
				for (var i = removeIndex.length - 1; i >= 0; i--) {
					listEvents.splice(removeIndex[i],1);
				}
			}

			// Sort the events in order of start time
			//listEvents.sort(function(a,b){return Date.parse(a.start_time) - Date.parse(b.start_time)});
            listEvents.sort(function(a,b){return moment(a.start_time, moment.ISO_8601).valueOf() - moment(b.start_time, moment.ISO_8601).valueOf()});
			
			
			// Format the dates and save
			for (var i = 0; i < listEvents.length; i++) {
				// Add pretty formatted event times
   
                listEvents[i].startDateString = moment(listEvents[i].start_time, moment.ISO_8601).format("dddd, MM/DD/YYYY hh:mm A");
				listEvents[i].endDateString = moment(listEvents[i].end_time, moment.ISO_8601).format("dddd, MM/DD/YYYY hh:mm A");
				
				// Save the events
				tdEvents.push(listEvents[i]);
			}
		
			
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
	
	this.isFaceBookError = function() {
		return isFaceBookError;
	}
	
}

function LatestNewsController($http) {
	
	// Facebook Config
	var numEventsToPull = '1';
	var isFaceBookError = false;
    var isPostTypeSharedLink = false;
	
	var urlPage = 'https://graph.facebook.com/' + facebookParams.graphAPIVersion + '/' + facebookParams.pageID + '/feed?access_token=' + facebookParams.teamDirtToken + '&fields=created_time,message,full_picture,story,link,description,name&format=json&limit=' + numEventsToPull +  '&method=get&pretty=0&suppress_http_code=1';
	
	var feedItem = {};
	
	var pullFeedData = function() {
		
		//console.log('Make call to: ' +  urlPage);
		
		// We first query facebook for all events on page /teamdirtIMBA
		$http({
  			method: 'GET',
  			url: urlPage
		}).then(function successCallback(response) {
			// this callback will be called asynchronously, when the response is available
			//console.log(JSON.stringify(response));
			
			feedItem = response.data.data[0];
            
            // We need to shift the data items if this is a shared link or story
            if (feedItem.story === undefined) {
                feedItem.story = 'Shared Link';
                
                isPostTypeSharedLink = true;
            }
			
			// Format the response date
			//var createdDate = new Date(feedItem.created_time);
			//feedItem.created_time_string = createdDate.toLocaleString();
            feedItem.created_time_string = moment(feedItem.created_time, moment.ISO_8601).format("MM/DD/YYYY hh:mm:ss A");
				
		  }, function errorCallback(response) {
			// called asynchronously if an error occurs or server returns response with an error status.
			
			// Error flag set, and clear events.
			isFaceBookError = true;
		  });
		
	}
	
	this.pullFacebookFeedData = function() {
		pullFeedData();
	}
	
	this.getLatestFeedItem = function() {
		return feedItem;
	}
	
	this.isFaceBookError = function() {
		return isFaceBookError;
	}
    
    this.isSharedLink = function() {
        return isPostTypeSharedLink;
    }
	
}
*/

// Add the Controllers
tdApp.controller('HeroBanner', HeroBanner);
/*
tdApp.controller('EventController', EventController);
tdApp.controller('LatestNewsController', LatestNewsController);
*/