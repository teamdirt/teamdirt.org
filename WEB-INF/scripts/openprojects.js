// Define the Application
//var tdApp = angular.module('tdApp', []);

// Used to dereference the album id
var albumIDReference = {
    'Test Album':'1962865460611514',
    'No Secret Build':'1455495437804995',
    'Misery Whip Build':'1468914423129763',
    'Pump Track Build':'1468935883127617',
    'Mobile Uploads':'856189104402301',
    'Timeline Photos':'784211154933430'
}

function PictureController($http) {
	
	// Facebook Config
	var numPicturesToPull = '20';
    	
    var totalNumOfPics = 0;
	var picGroups = [];
    var numberOfPicsPerRow = 0;
	var isFaceBookError = false;
	
	var pullPictureData = function(albumName, groupSize, desiredPicWidth) {
		
        // Build URL, depending upon albumName
        var urlPage = 'https://graph.facebook.com/' + facebookParams.graphAPIVersion + '/' + albumIDReference[albumName] + '?access_token=' + facebookParams.teamDirtToken + '&fields=name%2Ccount%2Cphotos.limit(' + numPicturesToPull + ')%7Bimages%7D&format=json&method=get';
        
		//console.log('Make call to: ' +  urlPage);
		
		// Query Pictures from a set album
		$http({
  			method: 'GET',
  			url: urlPage
		}).then(function successCallback(response) {
			// this callback will be called asynchronously, when the response is available
			//console.log(JSON.stringify(response));
				
			// parse the album
			var listImgObjects = response.data.photos.data;
            totalNumOfPics = response.data.count;
            
            // Build up the list of img objects
            var rowIndex = -1;
            var columnIndex = 0;
            for (var i = 0; i < listImgObjects.length; i++) {
                
                // Create a obj
                var imgObj = {};
                
                // Get the set of images (fb, creates several pre-processed sized images)
                var eachImgSet = listImgObjects[i].images;
                
                // Find the biggest image and image, just slightly bigger then the desired pic
                var minIndex = 0; var maxIndex = 0;
                var desiredMaxWidth = Number.MAX_SAFE_INTEGER; var maxWidth = -1;
                for (var j = 0; j < eachImgSet.length; j++) {

                    var width = eachImgSet[j].width;

                    // Find the smallest pic, just bigger then the desired width
                    if (width > desiredPicWidth && width < desiredMaxWidth) {
                        minIndex = j;
                        desiredMaxWidth = width;
                    }
                    // Find biggest pic, overall
                    if (width > maxWidth) {
                        maxIndex = j;
                        maxWidth = width;
                    }

                }
                
                // Marshall the object and store to the list
                imgObj.srcSmallPic = eachImgSet[minIndex].source;
                imgObj.srcBigPic = eachImgSet[maxIndex].source;
                
                // Push a structure to the picture groups
                // Populate the Matrix
                if (columnIndex === 0) {
                    var groupObject = {};
                    //var groupArray = [];
                    groupObject.groupArray = [];
                    //picGroups.push(groupArray);
                    picGroups.push(groupObject);
                    rowIndex += 1;
                } 
                
                picGroups[rowIndex].groupArray.push(imgObj);
                
                if (picGroups[rowIndex].groupArray.length >= groupSize) {
                    columnIndex = 0;
                } else {
                    columnIndex += 1;
                }
                           
            }

		  }, function errorCallback(response) {
			// called asynchronously if an error occurs or server returns response with an error status.
			
			// Error flag set, and clear events.
			isFaceBookError = true;
			picGroups = [];
		  });
		
	}
	
    /**
    * Pulls the Facebook Picture Data.
    * albumName = The name of the album as configured on Facebook
    * groupSize = How many pics to put into a row
    * desiredPicWidth = The width of a 
    */
	this.pullFacebookPictureData = function(albumName, groupSize, desiredPicWidth) {
        numberOfPicsPerRow = groupSize;
		pullPictureData(albumName, groupSize, desiredPicWidth);
	}
	
	this.isNotEmptyPictureList = function() {
				
		if (picGroups.length != 0) {
			return true;
		}
		
		return false;
	}
	
	this.getPictureGroupList = function() {
		return picGroups;
	}
    
    // Get the number of columns for the responsive div
    this.getw3Class = function() {
        switch(numberOfPicsPerRow) {
            case 2:
                return "w3-half";
            case 3:
                return "w3-third";
            case 4:
                return "w3-quarter";
            default:
                return "w3-half";
        }
    }
    
    // Set a modal image
    this.setModalView = function(parentIndex, index) {
        
        // Clear the img, to load the spinner, then load with the big pic
        document.getElementById("modalImg01").src = "";
        document.getElementById("modalImg01").src = picGroups[parentIndex].groupArray[index].srcBigPic;
        
        // Div ID is located in the footer.htm
        document.getElementById("modal01").style.display = "block";
        
    }
	
	this.isFaceBookError = function() {
		return isFaceBookError;
	}
	
}

// Add the Controllers
tdApp.controller('PictureController', PictureController);