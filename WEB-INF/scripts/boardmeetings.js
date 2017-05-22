function BoardMeetingController() {
    
    // In the future, this will be a REST call to teamdirt.org
	var meetings = [
        {id:2, date:"2012.12.01", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AADiy9B8qN25NX7Pu6Btyvk9a?dl=0&lst=&preview=teamdirt_meetdec12.doc", 
         resolutions:["applying to IMBA for chapter status being June 15, 2012", "electing officers", "discussion on re-branding Team Dirt"]},
        {id:2, date:"2012.04.12", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AADiy9B8qN25NX7Pu6Btyvk9a?dl=0&lst=&preview=TeamDirt_MeetApril12.docx", 
         resolutions:["applying to IMBA for chapter status being June 15, 2012", "electing officers", "discussion on re-branding Team Dirt"]},
        {id:1, date:"2012.02.10", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AADiy9B8qN25NX7Pu6Btyvk9a?dl=0&lst=&preview=teamdirtboard_feb12.docx", 
         resolutions:["Draft Mission Statement", "Going from IMBA Club status to Chapter"]}
    ];
    
    this.getMeetingList = function() {
		return meetings;
	}
    	
}

// Add the warning Controller
tdApp.controller('BoardMeetingController', BoardMeetingController);
