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
        <script                     src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    
    </head>
    <header class="header">
        
        <h1 >CIT261:02 - Topic 1 </h1>
        <h2>Javascript - Loops, Conditional Statements, Functions, Arrays</h2>
        <h2>Jason Chantry - Group 6</h2>
        
    </header>
    <nav>
        <ul class="topnav">
            <li><a  href="index.php">Home</a></li>

        </ul>
    </nav>
    <main>
 
        <h3>Calculate total square footage of your home</h3>
        <h4>Please enter the length and width of your 2 bedroom, 1 bathroom home to calculate the total square footage:</h4>
        <p>Living Room Length: <input type="number" id="len0"><br>
            Living Room Width: <input type="number" id="wid0"><br>
            Kitchen and Dining Room Length: <input type="number" id="len1"><br>
            Kitchen and Dining Room Width: <input type="number" id="wid1"><br>
            Bathroom Length: <input type="number" id="len2"><br>
            Bathroom Width: <input type="number" id="wid2"><br>
            Bedroom 1 Length: <input type="number" id="len3"><br>
            Bedroom 1 Width: <input type="number" id="wid3"><br>
            Bedroom 2 Length: <input type="number" id="len4"><br>
            Bedroom 2 Width: <input type="number" id="wid4"><br>
        </p>
        <button onclick="calcTotalSqFt();">Calculate</button>
        <p id="displayTotSqFt"></p>
        
        <script>
  
            function calcTotalSqFt() {
                // init array, check for null input,  and assign input values into the array
            
                var array = [];
                var i;
                var num1 = 0;
                var num2 = 0;
                for (i=0; i<5; i++) {           
                    num1 = document.getElementById('len'+i).value;
                    num2 = document.getElementById('wid'+i).value;
                    if (num1 == null) {
                        alert("Oops, you must fill in all values, defaulted to 0.");
                        num1 = 0;
                        
                    }
                    if (num2 == null) {
                        alert("Oops, you must fill in all values, defaulted to 0.");
                        num2 = 0;
                        
                    }
                    //call getArea and assign returned value to array
                    array[i] = getArea(num1, num2);
                    
                }
                //calculate total area by calling getArea function for each set of length's and width's. Add them together.
                var totalArea = 0;
                for (p=0; p<5; p++) {
                    totalArea += array[p];
                }
                
                document.getElementById("displayTotSqFt").innerHTML = "The total area of your home is " + totalArea + "sq/ft.";

            }
            
            function getArea(length, width) {
                return length * width
            }
            
        </script> 
                


    </main>
    <footer>
    	<p class="obj_Ctr"> CIT 261:02 I <a href=http://cit261.jasonchantry.pw>cit261.jasonchantry.pw</a> I &copy; 2018 Jason Chantry. All Rights Reserved. </p>
    </footer>
</html>
