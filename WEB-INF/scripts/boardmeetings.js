function BoardMeetingController() {
    
    // In the future, this will be a REST call to teamdirt.org
	var meetings = [
        
        {id:48, date:"2017.05.17", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AABhSpEH5VlnoyzKrrtKRcV3a/TeamDirt_BoardMeetingMinutes_May2017.docx?dl=0", 
         resolutions:["Reviewed the proposed language about handing the pump track funds over to the Friends of Corvallis Parks","website, Discussed needing some content massaging","McDonald, Request for a power carrier/motorized wheelbarrow to help with rock work","Dan going on Starker tour (today) to share Team Dirt perspective","Alsea, REI trailwork 95% done (lower bailout)","Planning"]},
        
        {id:47, date:"2017.04.12", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AAAybskX-p-Qo2M6ItkRWT9Ja/TeamDirt_BoardMeetingMinutes_April2017.docx?dl=0", 
         resolutions:["proposed a new website","working on a recreation trails grant, gathering sponsors","No Secret, Placing features, crossings and turns","New trail leaders, weeknight builds, and Peak sports involvement","Meet with OSU in May about future projects, discuss types of projects TD is interested in","Consider a bike patrol program at Alsea","Alsea, Rough cut of Misery Whip June 2017 w/out rock/technical features"]},
        
        {id:46, date:"2017.03.08", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AAA9ORHOmFiKU-pNshWP984Va/TeamDirt_BoardMeetingMinutes_March2017.docx?dl=0", 
         resolutions:["working on a recreation trails grant, gathering sponsors","looking into insurance issues surrounding group ride","No Secret, Look to open the trail up for feedback in April time range","IMBA 2.0"]},
        
        {id:45, date:"2017.02.26", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AADTzZMxHW8SHhjcMxVipIKza/TD%20Fund%20Rasing%20Committee%20Minutes%20February%2026%2C%202017.docx?dl=0", 
         resolutions:["Grant Proposals and Funds", "Skate park, try to form a fundraising alliance with them","Family Man Skills Area above parking lot at Alsea"]},
        
        {id:44, date:"2017.02.03", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AADS976iph8dV3BasU7LI03fa/TeamDirt_BoardMeetingMinutes_February2017.docx?dl=0", 
         resolutions:["Request for remaining of capital campaign for Mac Forest, less the trailer, less the t-shirt purchase","Pump Track, Applied for Pape grant","Pump track, City of Corvallis to begin to work with ODOT to figure out permits/locations under the bridge","IMBA 2.0"]},
        
        {id:43, date:"2017.01.11", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AAAUDA5T8unTiwcBi9MmeNwva/TeamDirt_BoardMeetingMinutes_January2017.docx?dl=0", 
         resolutions:["Capital campaign signs are complete and to be put up this weekend.","Money for mini-track-loader is available, possibly through an assistance agreement ","Film at @Whiteside on February 19"]},
        
        {id:42, date:"2016.12.07", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AAANxsXn1Kz-6miSCJkFZe4Ya/TeamDirt_BoardMeetingMinutes_December2016.docx?dl=0", 
         resolutions:["Working with OSU to figure out Team Dirt 2018 project in the Mac","Alsea Falls project has been approved for Phase 2 development"]},
        
        {id:41, date:"2016.10.05", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AAA1QlcJ1XK9FzD_zw1jukrha/TeamDirt_BoardMeetingMinutes_October2016.docx?dl=0", 
         resolutions:["Team Dirt willing to pay contract work at Alsea","Authorize purchase of giveaway t-shirts for builders","Capital Campaign Perk Sign is at printer","Vote on purchasing or constructing team dirt bike rack for Team Dirt van/trailer","McDonald, Trail walk with Matt 10/7, possibly flag exit down to the contour road ","Spring Roll – fiscal sponsor in 2017 ","Working with a college videographer to put out a short 30-60 second video campaign to inspire folks to build"]},
        
        {id:40, date:"2016.09.07", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AABf6bpTOtzDzv5uJmWyJiBSa/TeamDirt_BoardMeetingMinutes_September2016.docx?dl=0", 
         resolutions:["setting strategic planning retreat","Pedal-palooza","Re-engage with regards to Chip Ross trails","The survey results were sent to Starker","Wrote a BLM-specific grant from RAC","Emergency protocol for Alsea/OSU"]},
        
        {id:39, date:"2016.08.04", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AADHLT6AuIh35xfOh4w4N5fua/TeamDirt_BoardMeetingMinutes_August2016.docx?dl=0", 
         resolutions:["Michelle & Jason voted onto the board","Alsea Falls FUNdraiser","Wayne to act as interim President for 3 months","Would like to order new Team Dirt Volunteer shirts","Alsea, trail build plan"]},
        
        {id:38, date:"2016.06.01", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AABojJRnHBzW0BWpj8J6c6RXa/TeamDirt_BoardMeetingMinutes_June2016.docx?dl=0", 
         resolutions:["Team President position, Mike stepping down","putting together VolunteerSpot page to manage Take a Kid MTB, Beer Garden, Movie Night, Shuttle Day, Alsea Falls Switchback race"]},
        
        {id:37, date:"2016.05.11", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AACnpn5P-aubatVVKlIundela/TeamDirt_BoardMeetingMinutes_May2016.docx?dl=0", 
         resolutions:["Not Two Bad Movie Night","Take a Kid MTB day","July 8,9,10 Beer Garden for Cycle Oregon","OSU Antenna/Tower trail to open officially 5/15 - goes from tower to saddle","TD sent Starker a map of all trails and they’re looking at re-opening trails."]},
        
        {id:36, date:"2016.04.06", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AAB_9RZTwx_zDI0G4EvuVWxqa/TeamDirt_BoardMeetingMinutes_April2016.docx?dl=0", 
         resolutions:["Request to pay accountant for taxes","proposed funding to support Team Dirt General Fund","not convinced we need D&O insurance","Illegal Trails Stance","discussion of strategic planning or financial planning for Team Dirt","Discussion of man-made technical trail features and insurance coverage"]},
        
        {id:35, date:"2016.03.09", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AAAQjZf_9abjPr1v5Y4CvY0La/TeamDirt_BoardMeetingMinutes_March2016.docx?dl=0", 
         resolutions:["list of businesses to connect with – a beginning of an outreach protocol.","Quote for insurance to replace the current policy"]},
        
        {id:34, date:"2016.02.03", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AACRrPZ2PsHFXawULYszyDLEa/TeamDirt_BoardMeetingMinutes_February2016%20%28rheannon%27s%20changes%202016-02-04%29.docx?dl=0", 
         resolutions:["Alsea, Approached by REI to submit grant", "Alsea, Flagging and approval for chutes and ladders coming in a few weeks","Pump Track, Teaser movie is done and out","Trevor looked into director and officer insurance"]},
        
        {id:33, date:"2015.12.09", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AABifR57ZndjEU4znjY8NTxNa/TeamDirt_BoardMeetingMinutes_December_2015.docx?dl=0", 
         resolutions:["Matt Weintraub came and introduced himself.","Mac, New tools are in","Tracking hours – totals right now, possibly look at personal hours to help identify future leaders","Alsea, Maintenance phase.  Tim Maddux leading the advocacy","Alsea, Writing up Quality of Trail Initiative document","Pump Track, Sent out script for funding video ","Sponsorship signage at Alsea Falls on website from Indigogo fundraising campaign","Fundraising opportunities for 2015-17 in each category, general, alsea, osu, corvallis, "]},
        
        {id:32, date:"2015.11.04", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AAAZ7Xo-FHUIiLbI4hUXRuzka/TeamDirt_BoardMeetingMinutes_November2015.docx?dl=0", 
         resolutions:["OSU, Alsea, Corvallis, Social, events: create a 2015/16 planning summary of items to be done","Van Insurance quote and online vote for Team dirt van purchase","Leadership documents and uniformity between projects","Dan and Eric plan attendance to Oregon IMBA regional summit Nov 13-15","Merchandise","OSU-Agreement signed ","Michael Jacobs is putting together the map to give to OSU","Alsea, Chutes & Ladders project going forward","Alsea, Applying for RTP grant with BLM"]},
        
        {id:31, date:"2015.09.02", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AACCMiYix5G6i_6sNiadQImPa/TeamDirt_BoardMeetingMinutes_September2015.docx?dl=0", 
         resolutions:["Sponsorship signage at Alsea Falls on website from Indigogo fundraising campaign","OSU Trail Contract","Met with Spring Roll, possible fiscal sponsorship for 2016","Rheannon/Raj working on group rides (Halloween, Shred & Shroom), possible coed group rides, possible REI sponsored women’s ride"]},
        
        {id:30, date:"2015.08.05", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AADCZ8U5XiT9-UoXFDHk91bja/TeamDirt_BoardMeetingMinutes_August2015.docx?dl=0", 
         resolutions:["Sponsorship signage at Alsea Falls on website from Indigogo fundraising campaign","OSU Trail Contract, equitable restitution was added","Discuss future and ongoing revenue streams and how to sustain them"]},
        
        {id:29, date:"2015.07.01", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AAC94BKANaXR0IgG-wMGEOlta/TeamDirt_BoardMeetingMinutes_July2015.docx?dl=0", 
         resolutions:["board voted in Jenny Wu as Treasurer","Sponsorship signage at Alsea Falls on website from Indigogo fundraising campaign","Dan Coyle as board member","Discussion regarding proposed operating contract as proposed by OSU","No Secret, Trail building tool purchase.","Alsea Falls, The BLM estimates over 6,000 users"]},
        
        {id:28, date:"2015.05.01", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AAB4ot6Zu8zEd_dayVq_4wV9a/TeamDirt_BoardMeetingMinutes_May2015.docx?dl=0", 
         resolutions:["Rheannon Arvidson voted onto the board","All deposits go through Treasurer","all purchases over $200 need majority approval by the executive board ","Alsea, Kat sweet, Shuttle Day, Factory Demos, Youth Crew coming out","Pump Track, After town hall feedback, again pushing for location under bridge","Approval for Bobcat MT52, Canycom, EU200i, canopy w/TD logo "]},
        
        {id:27, date:"2015.04.01", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AABPxD6Nsb7Cp8WAAWB67Vx0a/TeamDirt_BoardMeetingMinutes_April2015.docx?dl=0", 
         resolutions:["Movie Night Details","Capital Campaign","IMBA TCC day","Alsea, May 4, IMBA coming with contractor","Possible groundwork for Mary’s Peak trail system"]},
        
        {id:26, date:"2015.03.01", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AAA3-yY2w63mhXVpThOF9mvya/TeamDirt_BoardMeetingMinutes_March2015.docx?dl=0", 
         resolutions:["OSU-Still working on the agreement, doing flagging at OSU","Motion approved to pay someone to do taxes within budget ","Alsea Falls, Chainsaw CERT & First Aid for 6 people","Marys Peak, Afrana & TD meeting regarding illegal trail building"]},
        
        {id:25, date:"2015.02.04", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AAC-2Gzo-sw6eCTbUO2fMV4Ya/TeamDirt_BoardMeetingMinutes_February2015.docx?dl=0", 
         resolutions:["Did walkabout on McCulloch","OSU-Agreement still in progress","Spring roll sponsors, with pump track as focus for raising money","Alsea Falls, Kat Sweet – last weekend in May","Need first aid certification, safety stuff, etc. for insurance"]},
        
        {id:24, date:"2015.01.09", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AADymVsF29B8osmko9PVKYbaa/TeamDirt_BoardMeetingMinutes_January2015.docx?dl=0", 
         resolutions:["Treasurer’s Report","Apply for RTP grant."]},
        
        {id:23, date:"2014.11.05", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AAB5xAncyLcKIw7pD_FlblDxa/2014_November_Team_Dirt_Board_Minutes.docx?dl=0", 
         resolutions:["Working on proposal for city in December, leaning toward pre-built track","OSU, request Vineyard Mountain being purpose built","Builder the movie @ Whiteside, April 25th, logistics coming together, general fund"]},
        
        {id:22, date:"2014.10.01", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AABq3qYRMgVn398_Nys1rkFQa/2014_October_Team_Dirt_Board_Minutes.docx?dl=0", 
         resolutions:["OSU Forests – logging continuing","Board roles"]},
        
        {id:21, date:"2014.06.04", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AADYUj3cpASUm_F7j2r0GnJpa/2014_June_TeamDirt_Board_Minutes.docx?dl=0", 
         resolutions:["City is on board for trail reworking at Chip Ross and MLK", "Alsea Falls Shuttle Rental", "Osprey/IMBA grant submitted", "Farmer’s Market Tables"]},
        
        {id:20, date:"2014.05.07", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AADpBs8Kkp9mFU6kgWQECUTda/2014_May_TeamDirt_Board_Minutes.docx?dl=0", 
         resolutions:["Pump Track: Steps identified for 4 sites: MLK, Village Green, BMX Park, Chip Ross", "Tools for team dirt ownership and purchase have been identified to budget committee and grants director", "Website update", "Alsea Official Opening","Farmer’s Market Tables","Travel Oregon Grant"]},
        
        {id:19, date:"2014.04.09", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AABlZk-EqFXOLD-iinaYrex1a/2014_April_TeamDirt_Board_Minutes.docx?dl=0", 
         resolutions:["Vote in New Members (Trevor, Wayne, Lauren) ", "Alsea Falls – Shuttle day and build days on calendar", "OSU Forests – Ryan Brown following up in forums", "Mary’s Peak – Work party to fix trails on Mary’s Peak in April","Risk Management","examples of other club’s committees, code of conduct"]},
        
        {id:18, date:"2014.03.05", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AACrLw1ozoH4mxUxS9I7eqCta/teamdirt_march_2014_minutes.docx?dl=0", 
         resolutions:["Barker Uerlings insurance Directors and Officers Insurance", "presented a quote from a company for a general liability quote for review and vote", "Helmet Purchase - $500 raised last week to purchase 50 helmets for events and another application for $1500 in process for another 150", "Peak Sports night and BLM Alsea Falls Presentation "]},
        
        {id:17, date:"2014.01.08", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AABUvRj__hsh0FArvuMIA_89a/teamdirt_january_2014_minutes.docx?dl=0", 
         resolutions:["Vote on revised mission statement", "Projected 2014 Budget to review", "Website update ", "2014 Budget Review ","Strategic Planning (Anna Laxague from IMBA) "]},
        
        {id:16, date:"2013.12.04", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AABNaai5Vjmm_phFLfk1iYDBa/teamdirt_dec_2013_agenda_rev_minutes.doc?dl=0", 
         resolutions:["Fundraisers for 2014", "Calendar of Events for 2014", "amend the Mission statement", "2014 Budget Review ","Strategic Planning (Anna Laxague from IMBA) "]},
        
        {id:15, date:"2013.11.06", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AAAVCe85HQN6sH8YEWhoYhCqa/teamdirt_nov_2013_minutes_rev.doc?dl=0", 
         resolutions:["Fundraising opportunities", "Gear Update", "Community outreach, Kids skill clinics and dates for 2014", "Oakridge Summit report "]},
        
        {id:14, date:"2013.10.02", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AACdf2Ge9guZxf8lQnp9JVQXa/teamdirt_oct_2013_minutes.doc?dl=0", 
         resolutions:["BLM Update", "Nominate Eric Emerson and Amanda Nahlik to Team Dirt Board ", "Review Take a Kids MTB Day", "October 11-12, Pacific Northwest Summit, Oakridge, OR","Communication to members"]},
        
        {id:13, date:"2013.09.04", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AACeB-83zLE7HBNBmyZY6b0Fa/teamdirt_sept_2013.doc?dl=0", 
         resolutions:["Membership Expiration dates "]},
        
        {id:12, date:"2013.05.08", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AAByXZKtWYxmh5sJmf0vbflQa/teamdirt_may2013.doc?dl=0", 
         resolutions:["Review Subaru Trail Care Crew Week", "Subaru TCC Accommodations by Mark Miller", "BMX Park discussion in April with Chad and Jude at Corvallis Parks and Rec"]},
        
        {id:11, date:"2013.04.03", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AAC4ETIG2SyQduXPsbh_t8pDa/teamdirt_april2013.doc?dl=0", 
         resolutions:["Jason Stowers Update on trail work hours", "Papas Pizza on 5/13 ", "Volunteers for Willamette Gran Fondo"]},
        
        {id:10, date:"2013.03.06", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AABSGlXrr6AKnOmCyZiEHT59a/teamdirt_march2013.doc?dl=0", 
         resolutions:["OSU Update including OSU Trail work date", "Website Update", "Trail work update BLM and other ", "Insurance update for rides", "Fundraising events"]},
        {id:9, date:"2013.02.13", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AAAacBj3sc4U74Td2077TEl1a/teamdirt_meetfeb13rev.doc?dl=0", 
         resolutions:["Work log (Google Doc)", "BLM Update at Alsea falls", "Trey Jackson to be OSU liaison", "Tool Purchase","Spring Roll for the local Montessori school"]},
        {id:8, date:"2013.01.05", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AAB6MHEZQMSj5DnBt26tF64Ca/teamdirt_meetjan13.doc?dl=0", 
         resolutions:["Bylaws Complete", "Jersey Order Complete", "Mudslinger Movie Fundraiser", "Subaru Trail Care Crew Visit","Website Update","BMX park adoption request from Chad Demars","1st quarter expenditures"]},
        {id:7, date:"2012.12.01", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AABMTDvKXl0_Z35GnInGrJB_a/teamdirt_meetdec12.doc?dl=0", 
         resolutions:["Bylaws and Updates", "Adopt Waiver", "Team Dirt Spring Fling", "Tool contact with National Firefighter and Terra Tech of Eugene"]},
        {id:6, date:"2012.11.01", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AAAcr0KgU_Wk6K6aGLb2cnIGa/teamdirt_meetNov12.pdf?dl=0", 
         resolutions:["Bylaws and Updates", "Membership Update", "Jersey Discussion", "Papas Fundraiser Update", "IMBA Trail Care Crew Visit 2013"]},
        {id:5, date:"2012.10.03", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AACmAf2Mgy5HPq8eb3dKYxKwa/teamdirt_meetOct12.docx?dl=0", 
         resolutions:["Clothing for 2014", "Team Membership Benefits", "Trail Work 2013", "Legal Issues", "Fall Fling 2012", "Bylaws and Updates", "DC Bike Summit", "2013 General Team Meeting"]},
        {id:4, date:"2012.05.15", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AAAKPILNkEDnobnfTMVEaMOza/teamdirt_meetMay12.docx?dl=0", 
         resolutions:["IMBA Chapter Information", "Alsea Falls: Committee for Planning", "Fundraising (Cycle Oregon)", "Poster Design"]},
        {id:3, date:"2012.04.18", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AABR9RR11fkvnu1DbxVsBkgQa/TeamDirt_MeetApril12.docx?dl=0", 
         resolutions:["IMBA Chapter Information", "electing officers", "re-branding Team Dirt", "Peak Sports sponsorship requirements for team members"]},
        {id:2, date:"2012.02.21", 
         url:"https://www.dropbox.com/sh/z6pp2nwg8bvrl7i/AAAEgMDPplfyWEzpubbM2oH2a/teamdirt_meetfeb12_2.docx?dl=0", 
         resolutions:["Meeting Reviews", "Role of current prospective board members"]},
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
