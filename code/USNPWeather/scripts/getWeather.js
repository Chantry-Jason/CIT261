//use key to connect and get data from weatherunderground api for weather forcasting.
//use ajax to consume json api
$(function () {

    var status = $('#status');
    //get current location of user's computer
    /*
    (function getGeoLocation() {
        status.text('Getting Location...');
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                //var lat = position.coords.latitude;
                //var long = position.coords.longitude;

                // Call the getData function, send the lat and long
                //getData(lat, long);
                //GET USER CURRENT LOCATION
                var locCurrent = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

                //CHECK IF THE USERS GEOLOCATION IS IN AUSTRALIA
                var geocoder = new google.maps.Geocoder();
                    geocoder.geocode({ 'latLng': locCurrent }, function (results, status) {
                        var locItemCount = results.length;
                        var locCountryNameCount = locItemCount - 1;
                        var locCountryName = results[locCountryNameCount].formatted_address;

                        if (locCountryName == "Australia") {
                            //SET COOKIE FOR GIVING
                            jQuery.cookie('locCountry', locCountryName, { expires: 30, path: '/' }); 
                        }
                });
            });
        } else {
            status.text("We are having difficulty with getting your geolocation information. Your browser may not support geolocation.");
        }

    })(); */
    status.text('Loading Data...');
    window.getData = function(state, park){
        // Get the data from the wunderground API
        //state = "AK";
        //park = "Denali"
        jQuery(document).ready(function($) {
        $.ajax({
            //get weatherunderground info from api using my key
            //url : "https://api.wunderground.com/api/987360510eace1b9/geolookup/conditions/q/" + lat + "," + long + ".json",
            url : "https://api.wunderground.com/api/987360510eace1b9/geolookup/conditions/q/" + state + "/" + park + "_Natl_Park" + ".json",
            dataType : "jsonp",
            success : function(data) {
                //write data to console for debug purposes
                console.log(data);
                //read in info
                var location = data.location.city + ", " + data.location.state ;
                //var temp_f = parsed_json['current_observation']['temp_f'];
                var currTemp = parseInt(data.current_observation.temp_f);
                var summary = data.current_observation.weather;
                var feelsLike = parseInt(data.current_observation.feelslike_f);
                var humidity = data.current_observation.relative_humidity;
                var windMph = data.current_observation.wind_mph;
                var dewPoint = parseInt(data.current_observation.dewpoint_f);
                var windDir = data.current_observation.wind_dir;
                var precipToday = data.current_observation.precip_today_in;
                var iconUrl = data.current_observation.forecast_url;

                //update screen with data
                $("#locDisplay").text("Weather for: " + location);
                $("#currentTemp").html(currTemp  + "&#8457");
                $("#SummaryTextId").html(summary);
                $("#OtherDataField").html("<b>Feels Like: </b>" + feelsLike + "&#8457<br><b>Precipitation: </b>" + precipToday + " in. <br> <b>Wind: </b>" + windMph + " mph  " + windDir + "<br><b>Humidity: </b>" + humidity + "<br><b>Dew Point: </b>" + dewPoint + "&#8457");
                


                $( "title" ).prepend( location + " - " ); //Doesn't work for some reason.

            } 

        });
        //fadeout loading text   
        $("#cover").fadeOut(250);
        });
        /*Get hourly data from wunderground api*/
        jQuery(document).ready(function($) {
        $.ajax({
            //get weatherunderground info from api using my key
            url : "https://api.wunderground.com/api/987360510eace1b9/geolookup/hourly/q/" + state + "/" + park + "_Natl_Park" + ".json",
            dataType : "jsonp",
            success : function(data) {
                //write data to console for debug purposes
                console.log(data);
                //read in info
                var hourly = [];
                var hr = 0; var hrTemp = 0; var hrCondition = 0;
                var tempp = {};
                //add hour, condition, and temp data into an array for 24 hrs
                for (i=0; i<25; i++) {
                    hr = data.hourly_forecast[i].FCTTIME.hour;
                    hrTemp = parseInt(data.hourly_forecast[i].temp.english);
                    hrCondition = data.hourly_forecast[i].icon;
                    tempp = {hour: hr, temp: hrTemp, condition: hrCondition};
                    hourly.push(tempp);
                }

                //write new array to console for debug
                console.log(hourly);
                //Write array data to screen
                ////var htmlStyles = ////window.getComputedStyle(document.querySelector("html"));
                ////var screenSize = htmlStyles.getPropertyValue("--screenSize"); // returns the value set in main.css
                ////if (screenSize == "small") {
                    var text = ""
                    var hourTime = ""
                    text = "<table class='smTable'>"
                    for (i = 0; i < Hourly.length; i++) { 
                        //convert hour of 0-23 to 12am - 11pm
                        if (hourly[i].hour == 0) {
                            hourTime = "12am";
                            //Add a line with tomorrows date
                            var MonthNames = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
                            var today = new Date();

                            var date = MonthNames[today.getMonth()] + " " + (parseInt(today.getDate()) + 1);
                            today = today.getDay();
                            var tomorrow = parseInt(today) + 1;
                            if (tomorrow === 7) {tomorrow = 0};
                            var tomorrowDay = convDayOfWeek(tomorrow);

                            text += "<tr  class='smTableTr'><th colspan='3'>" + tomorrowDay + ", " + date + "</th></tr>";
                        }
                        else if (hourly[i].hour >= 1 && hourly[i].hour < 12) {hourTime = hourly[i].hour.toString() + "am";}
                        else if (hourly[i].hour == 12) {hourTime = "12pm";}
                        else {hourTime = (hourly[i].hour.toString() - 12) + "pm";}
                        //compile string
                        text += "<tr class='smTableTr'><td>" + hourTime + "</td>  <td>" + hourly[i].temp + "&#8457;</td><td>" + hourly[i].condition + "</td></tr>";
                    }
                document.getElementById("HourlyDataId").innerHTML = "<h3>Hourly Forecast</h3>" + text + "</table>";    

                displayIcon(document.getElementById('SummaryTextId').innerHTML, hourly);

            } 

        });
        //fadeout loading text   
        $("#cover").fadeOut(250);
        });
        
    }

    // A function for changing a string to TitleCase
    function toTitleCase(str){
        return str.replace(/\w+/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
    }
});
function convDayOfWeek(day) {
    var DayOfWeek;
    var stDate; 
    var now; 
    var dofw= new Array(7); 
    dofw[0]="Sunday"; 
    dofw[1]="Monday"; 
    dofw[2]="Tuesday"; 
    dofw[3]="Wednesday"; 
    dofw[4]="Thursday"; 
    dofw[5]="Friday"; 
    dofw[6]="Saturday"; 

    DayOfWeek = dofw[day];
    return DayOfWeek;
}
//figure out which transitionEnd listener to use by using all of them on a created element and see which one doesn't return undefined.
function transEventEnd(){
    var tr;
    var elem = document.createElement('tempElement');
    var transListener = {
        'transition':'transitionend',
        'OTransition':'oTransitionEnd',
        'MozTransition':'transitionend',
        'WebkitTransition':'webkitTransitionEnd'                   
    }
    for (tr in transListener){
        if (elem.style[tr] !== undefined){
            return transListener[tr];
        }
    }
}
function refreshData() {
    var transEnd = transEventEnd();
    var elementId = document.getElementById("mainDisp");
    elementId.addEventListener(transEnd, DoUpdate, false);
    elementId.style.cssText = "-webkit-transition: opacity 1s; transition: opacity 1s; opacity: 0; ";
    function DoUpdate() {
        
        var currState = document.getElementById('state').value;
        var currPark = document.getElementById('park').value;
        getData(currState, currPark);
        showDisp();
    }
    elementId.addEventListener(transEnd, showDisp, false);
    function showDisp() {
        elementId.style.cssText = "-webkit-transition: opacity 2s; transition: opacity 2s; opacity: 1;";
    }
    var currPark = document.getElementById('park').value;    
    var parkInfo;
    if (currPark.includes("Denali")) {
        parkInfo = "Denali is six million acres of wild land, bisected by one ribbon of road. Travelers along it see the relatively low-elevation taiga forest give way to high alpine tundra and snowy mountains, culminating in North America's tallest peak, 20,310' Denali. Wild animals large and small roam un-fenced lands, living as they have for ages. Solitude, tranquility and wilderness await.";
    } else if (currPark.includes("Kenai")) {
        parkInfo = "At the edge of the Kenai Peninsula lies a land where the ice age lingers. Nearly 40 glaciers flow from the Harding Icefield, Kenai Fjords' crowning feature. Wildlife thrives in icy waters and lush forests around this vast expanse of ice. Sugpiaq people relied on these resources to nurture a life entwined with the sea. Today, shrinking glaciers bear witness to the effects of our changing climate.";
    } else if (currPark.includes("Wrangell")) {
        parkInfo = "Wrangell St. Elias is a vast national park that rises from the ocean all the way up to 18,008 ft. At 13.2 million acres, the park is the same size as Yellowstone National Park, Yosemite National Park, and Switzerland combined! Within this wild landscape, people continue to live off the land as they have done for centuries. This rugged, beautiful land is filled with opportunities for adventure.";
    } else if (currPark.includes("Yosemite")) {
        parkInfo = "Not just a great valley, but a shrine to human foresight, the strength of granite, the power of glaciers, the persistence of life, and the tranquility of the High Sierra. First protected in 1864, Yosemite National Park is best known for its waterfalls, but within its nearly 1,200 square miles, you can find deep valleys, grand meadows, ancient giant sequoias, a vast wilderness area, and much more.";
    } else if (currPark.includes("Sequoia")) {
        parkInfo = "This dramatic landscape testifies to nature's size, beauty, and diversity--huge mountains, rugged foothills, deep canyons, vast caverns, and the world's largest trees. These two parks lie side by side in the southern Sierra Nevada east of the San Joaquin Valley. Weather varies a lot by season and elevation, which ranges from 1,370' to 14,494'.";
    } else if (currPark.includes("Canyonlands")) {
        parkInfo = "Canyonlands invites you to explore a wilderness of countless canyons and fantastically formed buttes carved by the Colorado River and its tributaries. Rivers divide the park into four districts: Island in the Sky, The Needles, The Maze, and the rivers themselves. These areas share a primitive desert atmosphere, but each offers different opportunities for sightseeing and adventure.";
    } else if (currPark.includes("Moab")) {
        parkInfo = "Visit Arches to discover a landscape of contrasting colors, land forms and textures unlike any other in the world. The park has over 2,000 natural stone arches, in addition to hundreds of soaring pinnacles, massive fins and giant balanced rocks. This red-rock wonderland will amaze you with its formations, refresh you with its trails, and inspire you with its sunsets.";
    } else if (currPark.includes("Yellowstone")) {
        parkInfo = "Visit Yellowstone and experience the world's first national park. Marvel at a volcano’s hidden power rising up in colorful hot springs, mudpots, and geysers. Explore mountains, forests, and lakes to watch wildlife and witness the drama of the natural world unfold. Discover the history that led to the conservation of our national treasures “for the benefit and enjoyment of the people.”";
    } else  {
        parkInfo = "No Info Available.";
    }
    document.getElementById('infoPopUp').innerHTML = "<p>" + parkInfo + "</p>";
}

function displayIcon(summary, hourly) {
    //Daytime or Nighttime
    var timeOfDay
    if (hourly[0].hour <= 21 && hourly[0].hour >= 7) {
        timeOfDay = 'day';
    } else {
        timeOfDay = 'night';
    };
    let imageTag = document.getElementById('SummaryImg');
    //set icons for summary
    // Clear, Mostly Cloudy, Cloudy, Rain, Snow, Sleet, Thunder Storms
    if (summary.includes("Clear")) {
        if (timeOfDay == 'day') {imageTag.src = "images/sunny.png";} 
        if (timeOfDay == 'night') {imageTag.src = "images/moon.png";}        
    } else if (summary.includes("Cloudy") || summary.includes("Overcast")) {
        if (timeOfDay == 'day') {imageTag.src = "images/cloudy.png";} 
        if (timeOfDay == 'night') {imageTag.src = "images/ncloudy.png";}        
    } else if (summary.includes("Rain")) {
        if (timeOfDay == 'day') {imageTag.src = "images/rain.png";} 
        if (timeOfDay == 'night') {imageTag.src = "images/nrain.png";}         
    } else if (summary.includes("Wind")) {
        if (timeOfDay == 'day') {imageTag.src = "images/wind.png";} 
        if (timeOfDay == 'night') {imageTag.src = "images/wind.png";}        
    } else if (summary.includes("Snow")) {
        if (timeOfDay == 'day') {imageTag.src = "images/snow.png";} 
        if (timeOfDay == 'night') {imageTag.src = "images/nsnow.png";}        
    } else if (summary.includes("Storm")) {
        if (timeOfDay == 'day') {imageTag.src = "images/tstorm.png";} 
        if (timeOfDay == 'night') {imageTag.src = "images/ntstorm.png";}        
    } else {
        if (timeOfDay == 'day') {imageTag.src = "images/sunny.png";} 
        if (timeOfDay == 'night') {imageTag.src = "images/moon.png";}       
    }
}
