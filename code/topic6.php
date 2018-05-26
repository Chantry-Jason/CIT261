<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
     	<meta charset="utf-8"> 
	    <meta name="author" content="Jason Chantry">
	    <meta name="description" content="Code for Topic 6 in CIT261">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> CIT261:02 - Topic 3, Javascript </title>
        <link rel="stylesheet" href="css/subpagesmain.css">  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    
    </head>
    <header class="header">
        
        <h1 >CIT261:02 - Topic 6 </h1>
        <h2>DOM Manipulation Using createElement, appendChild, insertBefore etc.</h2>
        <h2>Jason Chantry - Group 6</h2>
        
    </header>
    <nav>
        <ul class="topnav">
            <li><a  href="index.php">Home</a></li>

        </ul>
    </nav>
    <main>
        
        <a href = "https://github.com/Chantry-Jason/CIT261/blob/master/code/topic6.php" id="gitHubLink">View topic5.php Code on GitHub</a><br>
        <div id="startQuestion">

            <h3>Select your political offiliation</h3>
            <button id = "repBtn" onclick="createRep()">I am Republican</button>
            <button id = "demBtn" onclick="createDem()">I am Democrat</button>
            <br>
        </div>
        <div id="additionalElements"></div>
        <script>
            function createRep() {
                //disable the party buttons
                document.getElementById("demBtn").disabled = true; 
                document.getElementById("repBtn").disabled = true;
                // create a new paragraph element
                var para = document.createElement("P"); 
                //create text node assigned to txt variable
                var txt1 = document.createTextNode("You are a Republican. You must have voted for Donald Trump in the last election. Is that correct?");  
                //append text to the p element
                para.appendChild(txt1); 
                //create two new button elements
                var btn1 = document.createElement("BUTTON");
                var btn2 = document.createElement("BUTTON");
                //set onclick attribute to each button for FireFox browser
                btn1.setAttribute("onclick", "RepYes();");
                btn2.setAttribute("onclick", "RepNo();");
                //set onclick attribute for IE and Chrome browsers
                btn1.onclick = function() {RepYes();};
                btn2.onclick = function() {RepNo();};

                //create text to insert in buttons
                var txt2 = document.createTextNode("Yes I Did");
                var txt3 = document.createTextNode("No I Didn't");
                //append text into correct button elements
                btn1.appendChild(txt2);
                btn2.appendChild(txt3);
                //add new elements to <main>
                        
                document.getElementById("additionalElements").appendChild(para);
                document.getElementById("additionalElements").appendChild(btn1);
                document.getElementById("additionalElements").appendChild(btn2);
                
                
                
            }
            function createDem() {
                //disable the party buttons
                document.getElementById("demBtn").disabled = true; 
                document.getElementById("repBtn").disabled = true;
                // create a new paragraph element
                var para = document.createElement("P"); 
                //create text node assigned to txt variable
                var txt1 = document.createTextNode("You are a Democrat. You must have voted for Hilary Clinton in the last election. Is that correct?");  
                //append text to the p element
                para.appendChild(txt1); 
                //create two new button elements
                var btn1 = document.createElement("BUTTON");
                var btn2 = document.createElement("BUTTON");
                //set onclick attribute to each button for FireFox browser
                btn1.setAttribute("onclick", "DemYes();");
                btn2.setAttribute("onclick", "DemNo();");
                //set onclick attribute for IE and Chrome browsers
                btn1.onclick = function() {DemYes();};
                btn2.onclick = function() {DemNo();};

                //create text to insert in buttons
                var txt2 = document.createTextNode("Yes I Did");
                var txt3 = document.createTextNode("No I Didn't");
                //append text into correct button elements
                btn1.appendChild(txt2);
                btn2.appendChild(txt3);
                //add new elements to <main>
                        
                document.getElementById("additionalElements").appendChild(para);
                document.getElementById("additionalElements").appendChild(btn1);
                document.getElementById("additionalElements").appendChild(btn2);               
            }
            
            function RepYes() {
                var p = document.createElement("P");
                var t = document.createTextNode("Great, your candidate won!");
                p.appendChild(t);
                document.getElementById("additionalElements").appendChild(p);
            }
            function RepNo() {
                var p = document.createElement("P");
                var t = document.createTextNode("Sorry your candidate didn't win, but your party did!");
                p.appendChild(t);
                document.getElementById("additionalElements").appendChild(p);               
            }
            function DemYes() {
                var p = document.createElement("P");
                var t = document.createTextNode("Sorry, Your candidate didn't win.");
                p.appendChild(t);
                document.getElementById("additionalElements").appendChild(p);
            }
            function DemNo() {
                var p = document.createElement("P");
                var t = document.createTextNode("Sorry your candidate nor your party won this election, better luck next time.");
                p.appendChild(t);
                document.getElementById("additionalElements").appendChild(p);               
            }           
            
            
        </script>

        
    </main>
    <footer>
    	<p class="obj_Ctr"> CIT 261:02 I <a href=http://jasonchantry.pw/cit261>jasonchantry.pw/cit261</a> I &copy; 2018 Jason Chantry. All Rights Reserved. </p>
    </footer>
</html>
