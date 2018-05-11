<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
     	<meta charset="utf-8"> 
	    <meta name="author" content="Jason Chantry">
	    <meta name="description" content="Code for Topic 3 in CIT261">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> CIT261:02 - Topic 3, Javascript </title>
        <link rel="stylesheet" href="css/subpagesmain.css">  
        <
    
    </head>
    <header class="header">
        
        <h1 >CIT261:02 - Topic 3 </h1>
        <h2>JSON Parse, Stringify</h2>
        <h2>Jason Chantry - Group 6</h2>
        
    </header>
    <nav>
        <ul class="topnav">
            <li><a  href="index.php">Home</a></li>

        </ul>
    </nav>
    <main>
        <a href = "https://github.com/Chantry-Jason/CIT261/blob/master/code/topic2.php" id="gitHubLink">View Code on GitHub</a>
        <h3>JavaScript Object Notation (JSON) </h3>
        <p>Enter the information below. Then click the 'Stringify and Parse It' button to see the results of the two stringify and parse methods.</p>
        <p>
            What is your Name? <br>
            <input type="string" id="dname"> <br>
            What is your E-Mail? <br>
            <input type="string" id="demail"> <br>
            What is your Favorite food? <br>
            <input type="string" id="dfood"> <br>
            Do you have a degree from BYU-Idaho? <br>
            <input type="string" id="ddegree"> <br>
            If yes, what is you degree in? <br>
            <input type="string" id="ddegreeName"> <br>
            
        </p>
        <button onclick="stringifyIt();">Stringify and Parse It</button>
        <div id="responses">
        </div>
        
        <script>
            
                
                function stringifyIt() {
                    
                    document.getElementById('responses').innerHTML = "<h3>JSON.stringify Response:</h3><p id='stringifyResponse'></p> <h3>JSON.parse Response:</h3> <p id='parseResponse'></p>"
                    //get input values from the html and put into object called student
                    
                    var student = {"name": document.getElementById('dname').value, 
                                  "email": document.getElementById('demail').value,
                                  "food": document.getElementById('dfood').value,
                                  'degree': document.getElementById('ddegree').value,
                                  'degreeName': document.getElementById('ddegreeName').value};
                
                    //convert object into string using JSON stringify
                    var studentString = JSON.stringify(student);
                    //print the JSON string onto the screen in the 'stringifyResponse' paragraph.
                    document.getElementById('stringifyResponse').innerHTML = studentString;
                   // )
               
                    //parse studentString variable into new studentObj object
                    var studentObj = JSON.parse(studentString);
                    //output new object to the screen in the parseResponse paragraph
                    document.getElementById('parseResponse').innerHTML = "Student Information <br>" 
                        + "-----------------------------------------------------------------------<br>"
                        + "Name: " + studentObj.name + "<br>" 
                        + "E-Mail: " + studentObj.email + "<br>"
                        + "Favorite Food: " + studentObj.food + "<br>"
                        + "Degree from BYU-I? " + studentObj.degree + "<br>"
                        + "Degree is in: " + studentObj.degreeName + "<br>";
                
                    
                }
            
            
        </script>
        
    </main>
    <footer>
    	<p class="obj_Ctr"> CIT 261:02 I <a href=http://jasonchantry.pw/cit261>jasonchantry.pw/cit261</a> I &copy; 2018 Jason Chantry. All Rights Reserved. </p>
    </footer>
</html>
