<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
     	<meta charset="utf-8"> 
	    <meta name="author" content="Jason Chantry">
	    <meta name="description" content="Code for Topic 6 in CIT261">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> CIT261:02 - Topic 7, Javascript </title>
        <link rel="stylesheet" href="css/subpagesmain.css">  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    
    </head>
    <header class="header">
        
        <h1 >CIT261:02 - Topic 7 </h1>
        <h2>Manipulating CSS Class Properties Using JavaScript</h2>
        <h2>Jason Chantry - Group 6</h2>
        
    </header>
    <nav>
        <ul class="topnav">
            <li><a  href="index.php">Home</a></li>

        </ul>
    </nav>
    <main>
        <style>
            .contentContainer {border-style: double; border-color: black; min-height: 300px;margin-top: 5px; background-color: darkseagreen;}
            #selButtons {margin-left: 10px; margin-top: 10px; float: left; max-width: 140px; border-right: solid black; position: relative;}
            ul.selections {height: 100%; list-style-type: none; margin: 0; padding: 0; overflow: hidden; background-color: lightgrey;}
            ul.selections li a {display:block; color: white; text-align: left; padding: 10px 20px; text-decoration: none; border-bottom: solid black;}
            
            
            .content {margin-left: 160px; padding-top: 10px; }
            .picture {width: 93%; height: 93%; border-style: groove; border-color: forestgreen; border-width: 10px; margin-right: 10px;}
            .paragraph {color: green; font-family: "verdana"}
            #color1 {background-color: lightslategrey;}
            #font2 {background-color: lightslategrey;}
            
            
            
        </style>
        <a href = "https://github.com/Chantry-Jason/CIT261/blob/master/code/topic7.php" id="gitHubLink">View topic7.php Code on GitHub</a><br>
        <article class="contentContainer">
            <aside id="selButtons">
                <ul class="selections">
                    <li><a id="color1" href="#">Color Scheme 1</a></li>
                    <li><a id="color2" href="#">Color Scheme 2</a></li>
                    <li><a id="color3" href="#">Color Scheme 3</a></li>
                    <li><a id="font1" href="#">Font Scheme 1</a></li>
                    <li><a id="font2" href="#">Font Scheme 2</a></li>
                
                </ul>    
            </aside>
            <div class="content">
                <img class="picture" src="images/byui2.jpg" alt="byui image">
                <p class="paragraph">This is a picture of BYU-Idaho. Isn't it lovely? Click the color and font schemes to the left to change the colors of borders, text, and fonts! <br>
                We accomplish this by changing the CSS class properties using Javascript.
                </p>
            </div>
                
            <script>
                var a = document.getElementById("color1");
                var b = document.getElementById("color2");
                var c = document.getElementById("color3");
                var d = document.getElementById("font1");
                var e = document.getElementById("font2");
                a.onclick = function() {
                    resetMenuColors();
                    //instead of getElementsById, use getElementsByClassName to get an array object of all elements with the class name specified. 
                    var classToMod = document.getElementsByClassName("picture");
                    //in order to set the style, we need to loop through the array object and set all to new borderColor
                    for(i=0; i<classToMod.length; i++) {classToMod[i].style.borderColor = "forestgreen";}
                    var classToMod = document.getElementsByClassName("paragraph");
                    for(i=0; i<classToMod.length; i++) {classToMod[i].style.color = "green";}
                    var classToMod = document.getElementsByClassName("contentContainer");
                    for(i=0; i<classToMod.length; i++) {classToMod[i].style.backgroundColor = "darkseagreen";}
                    document.getElementById("color1").style.backgroundColor = "lightslategrey";
                    
                    return false;
                };
                b.onclick = function() {
                    resetMenuColors();
                    var classToMod = document.getElementsByClassName("picture");
                    for(i=0; i<classToMod.length; i++) {classToMod[i].style.borderColor = "blue";}
                    var classToMod = document.getElementsByClassName("paragraph");
                    for(i=0; i<classToMod.length; i++) {classToMod[i].style.color = "blue";}
                    var classToMod = document.getElementsByClassName("contentContainer");
                    for(i=0; i<classToMod.length; i++) {classToMod[i].style.backgroundColor = "lightskyblue";}
                    document.getElementById("color2").style.backgroundColor = "lightslategrey";
                    return false;
                };
                c.onclick = function() {
                    resetMenuColors();
                    var classToMod = document.getElementsByClassName("picture");
                    for(i=0; i<classToMod.length; i++) {classToMod[i].style.borderColor = "red";}
                    var classToMod = document.getElementsByClassName("paragraph");
                    for(i=0; i<classToMod.length; i++) {classToMod[i].style.color = "maroon";}
                    var classToMod = document.getElementsByClassName("contentContainer");
                    for(i=0; i<classToMod.length; i++) {classToMod[i].style.backgroundColor = "indianred";}
                    document.getElementById("color3").style.backgroundColor = "lightslategrey";
                    return false;
                };
                d.onclick = function(){
                    resetMenuColors2();
                    var classToMod = document.getElementsByClassName("paragraph");
                    for(i=0; i<classToMod.length; i++) {classToMod[i].style.fontFamily = "comic sans MS";} 
                    document.getElementById("font1").style.backgroundColor = "lightslategrey";
                }
                e.onclick = function(){
                    resetMenuColors2();
                    var classToMod = document.getElementsByClassName("paragraph");
                    for(i=0; i<classToMod.length; i++) {classToMod[i].style.fontFamily = "verdana";} 
                    document.getElementById("font2").style.backgroundColor = "lightslategrey";                    
                }
                function resetMenuColors() {
                    document.getElementById("color1").style.backgroundColor = "lightgrey";
                    document.getElementById("color2").style.backgroundColor = "lightgrey";
                    document.getElementById("color3").style.backgroundColor = "lightgrey";
                }
                function resetMenuColors2() {
                    document.getElementById("font1").style.backgroundColor = "lightgrey";
                    document.getElementById("font2").style.backgroundColor = "lightgrey";
                    
                }
            </script>
        </article>
    </main>
    <footer>
    	<p class="obj_Ctr"> CIT 261:02 I <a href=http://jasonchantry.pw/cit261>jasonchantry.pw/cit261</a> I &copy; 2018 Jason Chantry. All Rights Reserved. </p>
    </footer>
</html>
