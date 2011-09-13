/**
*	Universal Scripts for geeQuest
* 	
*/

/**
*	Document loaded initializer
*/
$(document).ready(function() { 

	// start the google maps
	initialize();

	//set the user id
	geeQuest.userId = $("#hidden_id").val();

	//call the function to create the user points
	// this prevents the call from being made by the google api
	// which possibly adds all the returned results to the map
	// but not the to db
	geeQuest.update(geeQuest.userId);

	//listen for the events associated with the input field for locations
	$("#add_button").click(function(e) {
			
		e.preventdefault;	

		if ($("#add_location") != "") {
			
			geeQuest.request($("#add_location").val());

		}
	
	});	

	//bind event to return key on input field
	$("#add_location").keyup(function(e) {
  
  		if (e.keyCode == '13') {
     	
     		e.preventDefault();

     		if ($("#add_location") != "") {
			
			geeQuest.request($("#add_location").val());

			}

   		}

	});


});

/**
* Creates the geeQuest namespace
* @name geeQuest
* @namespace geeQuest
*/
var geeQuest = {};

/**
* namespace the map
*/
geeQuest.map = "";

/**
* property to store all a user's id
*/
geeQuest.userId = "";

/**
* property to store all a user's geolocations
*/
geeQuest.userLocs = false;

/**
* property to store a user's new geolocation
*/
geeQuest.userNew = {};

/**
* Update the locations for a given user from the database
* @param {int} id
*/
geeQuest.update = function (id) {
	
	//get all the current user's geolocations
	geeQuest.locations(id); 
	
	//deferred object promise
	$.when(geeQuest.userLocs).then(function() {
			
		for(var i in geeQuest.userLocs) {
			
			geeQuest.marker(geeQuest.userLocs[i]);
		
		}

	});

}

/**
* method to accept an address and hit the google maps api
* @param {string}
* @returns {object}
*/
geeQuest.request = function (address) {
	
	//create a new geocoder object
	if(!geocoder) {

		var geocoder = new google.maps.Geocoder();
	}

	//create an object to send along to google
	var geocoderRequest ={
		
		address: address

	};

	//make the call!
	geocoder.geocode(geocoderRequest, function(results, status) {
		
		//check ok
		if (status == google.maps.GeocoderStatus.OK) {
			
			//center map
			geeQuest.map.setCenter(results[0].geometry.location);

			//make a marker

			//make an infowindow
console.log(results);
			//store each pertinant piece of a new location for db
			geeQuest.userNew.add = results[0].formatted_address;

			geeQuest.userNew.lat = results[0].geometry.location.Ka;
			geeQuest.userNew.lon = results[0].geometry.location.La;

			console.log(results[0].geometry.location[1]);

			//Write the new location to the db
			geeQuest.writeDb(geeQuest.userNew);

			//add a new marker to the map
			geeQuest.update(geeQuest.userId);

		};

		


	});




}

/**
* method to create a new database entry for a location
* @param {object} address, id, lat, lon
* 
*/
geeQuest.writeDb = function (object) {

	//write to the database
	$.ajax({
  		url: 'ajax_controller.php?method=writeGeo',
  		
  		data: {
  			
  			user_id: geeQuest.userId,
  			address_entered: object.add,
  			lat: object.lat,
  			lon: object.lon

  		},

  		success: function(data) {
    
    		
    		
  		}
	});



}

/**
* method to create a new map marker and infowindow from a database object or google maps object
* @param {object}
* 
*/
geeQuest.marker = function (object) {
	
	var marker = new google.maps.Marker({
		
		map: geeQuest.map,

		position: new google.maps.LatLng(object.lat, object.lon),

		icon: 'assets/icon.png'

	});


}

/**
* build an object containing all of a user's geolocation notes from db
* @param {int}
* @returns {object}
*/
geeQuest.locations = function (id) {

	$.ajax({
  		url: 'ajax_controller.php?method=getGeos',

  		dataType: 'json',

  		async: false,
  		
  		data: {
  			
  			user_id: id

  		},

  		success: function(data) {
    		
   			geeQuest.userLocs =  data;

  		}
	
	});

}

/**
*	Google maps initialization function. Create the map and binds it to the map div
*/
function initialize() {
    var latlng = new google.maps.LatLng(39.3958369, -98.0523773);
    var myOptions = {
      zoom: 4,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    
    geeQuest.map = new google.maps.Map(document.getElementById("map"),
        myOptions);
  }