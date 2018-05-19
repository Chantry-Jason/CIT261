<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
     	<meta charset="utf-8"> 
	    <meta name="author" content="Jason Chantry">
	    <meta name="description" content="Code for Topic 4 in CIT261">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> CIT261:02 - Topic 3, Javascript </title>
        <link rel="stylesheet" href="css/subpagesmain.css">  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    
    </head>
    <header class="header">
        
        <h1 >CIT261:02 - Topic 4 </h1>
        <h2>Using AJAX to Consume a JSON Web Service</h2>
        <h2>Jason Chantry - Group 6</h2>
        
    </header>
    <nav>
        <ul class="topnav">
            <li><a  href="index.php">Home</a></li>

        </ul>
    </nav>
    <main>
        <a href = "https://github.com/Chantry-Jason/CIT261/blob/master/code/topic4.php" id="gitHubLink">View topic4.php Code on GitHub</a>
        <a href = "https://github.com/Chantry-Jason/CIT261/blob/master/code/scripts/weatherinfo.js" id="gitHubLink">View weatherinfo.js Code on GitHub</a>
        
        <section class="weather-container">
				<!--Display Loading text while data is being retrieved-->
                <div id="cover">
					<div id="status">Loading...</div>
				</div>
				<!--Setup containers for data -->
                <h1 id="cityDisplay"></h1>
				<h2>Current Conditions</h2>
				<ul id="current_conditions">
					<li id="currentTemp"></li>
					<li id="summary"></li>
					<li id="add1"></li>
					<li id="add2"></li>
					<li id="add3"></li>
				</ul>
        </section>
        <!--import code to get info from weatherunderground servers-->
        <script src="/cit261/scripts/weatherinfo.js"></script>
        
    </main>
    <footer>
    	<p class="obj_Ctr"> CIT 261:02 I <a href=http://jasonchantry.pw/cit261>jasonchantry.pw/cit261</a> I &copy; 2018 Jason Chantry. All Rights Reserved. </p>
    </footer>
</html>
