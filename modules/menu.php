
        <ul class="topnav" id="nav">
            <li><a class="active" href="http://jasonchantry.pw/cit261">Home</a></li>
            
            <li><a  href="topic1.php">Topic 1</a></li>
            <li><a  href="topic2.php">Topic 2</a></li>
        </ul>
     <!--script and JQuery for dropdown mobile menu -->
     <script type="text/javascript">
        $("#nav").addClass("js").before('<div id="menu">&#9776;</div>');
	    $("#menu").click(function(){
		   $("#nav").toggle();
	    });
	    $(window).resize(function(){
	       if(window.innerWidth > 500) {
	          $("#nav").removeAttr("style");
	       }
	    });      
    </script>
