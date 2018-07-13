//use key to connect and get data from weatherunderground api for weather forcasting.
            //use ajax to consume json api
            $(function () {

                var status = $('#status');
                //get current location of user's computer
                (function getGeoLocation() {
                    status.text('Getting Location...');
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function (position) {
                            var lat = position.coords.latitude;
                            var long = position.coords.longitude;

                            // Call the getData function, send the lat and long
                            getData(lat, long);

                        });
                    } else {
                        status.text("We are having difficulty with getting your geolocation information. Your browser may not support geolocation.");
                    }

                })();

                function getData(state, park){
                    // Get the data from the wunderground API
                    state = "WY";
                    park = "Yellowstone"
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
                                        var tomorrowDay = convDayOfWeek(parseInt(today) + 1);
                                        
                                        text += "<tr  class='smTableTr'><b>" + tomorrowDay + ", " + date + "</b></tr>";
                                    }
                                    else if (hourly[i].hour >= 1 && hourly[i].hour < 12) {hourTime = hourly[i].hour.toString() + "am";}
                                    else if (hourly[i].hour == 12) {hourTime = "12pm";}
                                    else {hourTime = (hourly[i].hour.toString() - 12) + "pm";}
                                    //compile string
                                    text += "<tr class='smTableTr'><td>" + hourTime + "</td>  <td>" + hourly[i].temp + "&#8457;</td><td>" + hourly[i].condition + "</td></tr>";
                                }
                            document.getElementById("HourlyDataId").innerHTML = "<h3>Hourly Forecast</h3>" + text + "</table>";    
                            
                            

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
