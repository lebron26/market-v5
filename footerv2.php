<!DOCTYPE html>
<html>
<head>
	<title></title>

	<script language="javascript" type="text/javascript">
	window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
} 
</script>
</head>

	<body>

		<div class="footer">
		<div class = "left">
			<div class="footerlinks">
			<a href="#">About Us</a> | <a href="#">Contact Us</a> | <a href="#">Site Map</a><br>
			<div class="tsagrp">
            TSA Group PH
        </div>
		</div>

		 <button onclick="topFunction()" id="myBtn" title="Go to top">Back to Top</button> 

	</div>
    </div>
</div>
	</body>

<style>

 /* unvisited link */
a:link {
    color: white;
}

/* visited link */
a:visited {
    color: white;
}

/* mouse over link */
a:hover {
    color: gray;
    text-decoration: underline;
}

/* selected link */
a:active {
    color: gray;
    text-decoration: underline;
} 

/* */

a:link {
    text-decoration: none;
}

a:visited {
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

a:active {
    text-decoration: underline;
}

/* 

a:link {
    background-color: white;
}

a:visited {
    background-color: none;
}

a:hover {
    background-color: black;
}

a:active {
    background-color: hotpink;
}  

*/

.footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: black;
    color: gray;
    text-align: center;
}

.left {
	text-align: left;
}

#myBtn {
    display: none; /* Hidden by default */
    position: fixed; /* Fixed/sticky position */
    bottom: 20px; /* Place the button at the bottom of the page */
    right: 30px; /* Place the button 30px from the right */
    z-index: 99; /* Make sure it does not overlap */
    border: none; /* Remove borders */
    outline: none; /* Remove outline */
    background-color: gray; /* Set a background color */
    color: white; /* Text color */
    cursor: pointer; /* Add a mouse pointer on hover */
    padding: 15px; /* Some padding */
    border-radius: 10px; /* Rounded corners */
    font-size: 18px; /* Increase font size */
}

#myBtn:hover {
    background-color: #555; /* Add a dark-grey background on hover */
}

.tsagrp {
    color: gray;
}

</style>

</html>


