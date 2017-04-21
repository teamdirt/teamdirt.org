//var style = "/styles/trailareas.css";
var script = document.createElement("script"); 
script.setAttribute("src", "https://es.pinkbike.org/ttl-86400/sprt/j/trailforks/widget.js"); 
document.getElementsByTagName("head")[0].appendChild(script); 
var widgetCheck = false;

// Static Values for the Trail Areas
tdApp.value("areaInfo",
			{alseafalls:{name:"Alsea Falls Area",rid:3941,isWarning:true},
			 macdunn:{name:"McDonald Forest", rid:6121,isWarning:false}
			});

// Ride Area Def
function RideArea(areaInfo, $location) {
    
	// Parse the Ride Area, and lookup the parameters from the JSON object
	var url = $location.url();
	var area;
	
	switch(url) {
		case "/alseafalls":
			area = areaInfo.alseafalls;
			break;
		case "/macdunn":
			area = areaInfo.macdunn;
			break;
    }
	
	this.partners = [
        {name:"BLM", url:"https://www.blm.gov/or/programs/recreation/", src:"/imgs/partners/US-DOI-BLM-logo.png"},
        {name:"OSU", url:"http://cf.forestry.oregonstate.edu/", src:"/imgs/partners/cof_v_spot1.png"},
        {name:"Starker", url:"http://www.starkerforests.com/", src:"/imgs/partners/Starker-Forests.jpeg"},
        {name:"Corvallis", url:"http://www.corvallisoregon.gov/index.aspx?page=56", src:"/imgs/partners/corvallispr.jpg"}
    ];
	
	this.areaName = "Alsea Falls Area";
	this.isWarning = true;
	this.rid = 3941;
	this.warningtext ="Due to heavy equipment and logging operations, the main paved road (Fall Creek Access Rd), Whistlepunk Tie Rd (BLM 14-7-27), Whistlepunk and Sexy Tree trails will be closed 24hr/day from M-Th and Friday from midnight until 5pm.  All roads and trails will be open Friday after 5pm through midnight Sunday.  You can use the following alternate route to climb to the top of HighBaller.";
	this.description ="The Declaration of Independence is the statement adopted by the Second Continental Congress meeting at the Pennsylvania State House (Independence Hall) in Philadelphia on July 4, 1776, which announced that the thirteen American colonies,[2] then at war with the Kingdom of Great Britain, regarded themselves as thirteen newly independent sovereign states, and no longer under British rule. Instead they formed a new nation—the United States of America. John Adams was a leader in pushing for independence, which was passed on July 2 with no opposing vote cast. A committee of five had already drafted the formal declaration, to be ready when Congress voted on independence.";
}

// Add the warning Controller
tdApp.controller('RideArea', RideArea);
