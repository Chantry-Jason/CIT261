//This js file has all of the national parks for each state
var States = new Array("AK", "CA", "UT", "WY");
var NationalParks = {
    
    AK:  ['Denali', 'Kenai_Fjords', 'Wrangell - St. Elias'],
    UT: ['Canyonlands', 'Moab - Arches'],
    WY: ['Yellowstone'],
    CA: ['Yosemite', 'Sequoia']
};
console.log(NationalParks);
function startup() {
    loadStates();
    loadParks();
    refreshData();
}
function loadStates() {
    //Load States
    var stateList = document.getElementById('state');
    
    var setOption = document.createElement('option');
    //create options for each state in the States array and load them into the state drop down list
    for (var i = 0; i < States.length; i++) {
        setOption = document.createElement('option');
        setOption.innerHTML = States[i];
        setOption.value = States[i];
        stateList.appendChild(setOption);
    }
}
//Fucntion to load parks. called by onchange for state dropdown
function loadParks() {
    var setOption = document.createElement('option');   
    var parkList = document.getElementById('park');
    var currState = document.getElementById('state').value;
    //Find number of objects in NationalPark array
    //var nPLength = 0;
    //for (var l in NationalParks) {
    //    if (NationalParks.hasOwnProperty(l)) nPLength++;
    //}
    //create options for each park in the NationalParks array under the state selected in 'state' drop down
    //load these parks into the 'park' drop down list.
    
    var parksInState = NationalParks[currState];
    parkList.innerHTML = "";
    for (var parkIndex = 0; parkIndex < parksInState.length; parkIndex++) {
                setOption = document.createElement('option'); 
                setOption.innerHTML = parksInState[parkIndex];
                setOption.value = parksInState[parkIndex];
                parkList.appendChild(setOption);
    }
    refreshData();
}
        
        
    
