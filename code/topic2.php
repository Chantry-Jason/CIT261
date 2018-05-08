<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
     	<meta charset="utf-8"> 
	    <meta name="author" content="Jason Chantry">
	    <meta name="description" content="Code for Topic 1 in CIT261">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> CIT261:02 - Topic 1, Javascript </title>
        <link rel="stylesheet" href="css/subpagesmain.css">  
        <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>-->
    
    </head>
    <header class="header">
        
        <h1 >CIT261:02 - Topic 2 </h1>
        <h2>Javascript - Object Creation Functions, Properties, Methods, Instantiation</h2>
        <h2>Jason Chantry - Group 6</h2>
        
    </header>
    <nav>
        <ul class="topnav">
            <li><a  href="index.php">Home</a></li>

        </ul>
    </nav>
    <main>
 
        <h3>Pseudo Classical Instantination</h3>
        <!-- Buttons to display member data -->
        <button onclick="jason.printRecord();">Display Jason</button>
        <button onclick="ken.printRecord();">Display Ken</button>
        <!--Paragraph to display response data on screen-->
        <p id="response"></p>
        
        <script>
            //example of pseudo classical instantination.
            //Define member as function
            var member = function(name, age, address, phone, email){
                
                this.name = name;
                this.age = age;
                this.address = address;
                this.phone = phone;
                this.email = email;
            };
            //create new printRecord member of 'member' function which will display data in the 'response' paragraph above
            member.prototype.printRecord = function(){
                //display data onto screen in the 'response' paragraph
                document.getElementById("response").innerHTML = "Member Name: " + this.name + "<br>" + "Age: " + this.age + "<br>" + "Address: " + this.address + "<br>" + "Phone Number: " + this.phone + "<br>" + "E-Mail: " + this.email;
            };

            //create new objects
            var jason = new member("Jason Chantry", 41, "1232 5th St. Ogden, UT 84404", "8011234567", "jason.chantry@gmail.com");
            var ken = new member("Ken Futch", 37, "45 Meadowbrook Dr. Ontario, CA 91764", "9099845339", "ken.futch@gmail.com");
            


            
        </script>
        <h3>Prototypal Instantination</h3>
        <!-- Buttons to display member data -->
        <button onclick="jon.printRecord2();">Display Jon</button>
        <button onclick="james.printRecord2();">Display James</button>
        <!--Paragraph to display response data on screen-->
        <p id="response2"></p>
        <script>
            //example of prototypal instantination
            //define member2 as function and create objects
            var member2 = function(name, age, address, phone, email){
                var object = Object.create(methods);
                object.name = name;
                object.age = age;
                object.address = address;
                object.phone = phone;
                object.email = email;
                return object;
            }
            
            var methods = {
                printRecord2: function() {
                    //display data onto screen in the 'response' paragraph
                    document.getElementById("response2").innerHTML = "Member Name: " + this.name + "<br>" + "Age: " + this.age + "<br>" + "Address: " + this.address + "<br>" + "Phone Number: " + this.phone + "<br>" + "E-Mail: " + this.email;   
                },
                printName2: function() {
                   //display name only on screen
                    document.getElementById("response2").innerHTML = "Member Name: " + object.name;
                }
                
            }
            //create new objects
            var jon = new member2("Jon Johnson", 41, "508 12th st. Ogden, UT 84404", "8011234567", "jonj@gmail.com");
            var james = new member2("James Hogan", 37, "2543 Rockcliff Dr. Upland, CA 91782", "9099876543", "Jhohan@gmail.com");
            
                
        </script>
    </main>
    <footer>
    	<p class="obj_Ctr"> CIT 261:02 I <a href=http://jasonchantry.pw/cit261>jasonchantry.pw/cit261</a> I &copy; 2018 Jason Chantry. All Rights Reserved. </p>
    </footer>
</html>
