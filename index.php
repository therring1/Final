<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "royalty";

// Create connection
		/* new mysqli*/
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

else {
	echo "Test Database Connected";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
<meta charset="UTF-8">
<title> Who AM I? </title>
</head>
	<body>
	<div class="vc">
	<img src="vc.bmp" alt="Tia" height="300" width="350"></div>
	<h1> About Tia Herring! </h1>
		<p>Hi There! My name is Tia!  Welcome to My Page! <br/>
		
		I am the second child in a family of four! I can be shy, but yet friendly and outgoing! Extremely adventurous and I love to try new things (not including food). 
		One day I hope to travel the world, maybe sky dive and bungee jump!
		Many people rely on me as I am known to be the Nurturer AKA mother figure in all of my friendships.
		I am also great at fixing computers, but not so much programming one, but I love the challenge!</p>
		
	<div class="motto">
		My motto in life is sometimes you have to fall in order to fly, and to likewise not be reluctant to jump! 
		Regardless of the possibility that you will mess something up, because it is only another life lesson!</div>
<br />

<h2><span class="headers">A few of my hobies consist of:</span></h2>
	<ul>
		<li> <a href="http://www.apachecafe.info/"> Going to Spoken Word Venues</a></li>
		<li> <a href="http://www.idrivenascar.com/"> Riding Go karts and Four Wheelers</a> </li>
		<li> <a href="http://www.treetopquest.com/"> Zip Lining</a> </li> 
	</ul>

<h2><span class="headers">I also Enjoy Music! Check out a few of my favorite albums!</span></h2>
	<ul>
	<li> Rihanna - ANTI Album</li>
	<li> Beyonce - Lemonade Album</li>
	<li>Tamar Braxton - Calling All Lovers</li>
	<li> K-Michelle - Awbah Album</li>
	<li> Lauryn Hill - The Miseducation of Lauryn Hill</li>
	<li> J-Cole - Born Sinner Album </li>
	<li> Eminem - 8-Mile Album</li>
	<li> Newcleus - Jam on Revenge</li>
	<li> Prince - Purple Rain</li>
	<li> <a href="http://www.sade.com/gb/home/"> Sade Music </a></li>
	</ul>	
<br/>	

<h2><span class="headers">A Intersting Fact about Me!</span></h2> 
	<p>Even though I am not great at programming, 
	I am actually majoring in <span class="GSU">Computer Science</span> at <span class="GSU">Georgia State University!</span> 
	Check out there website! </p>
	<ul>
		<li> <a href="http://cs.gsu.edu/">Computer Science at Georgia State University!</a> </li>
	</ul>
	
<h3><span class="headers">Some of the Assignments and Projects that I have done thus far at </span><span class="GSU"> Georgia State University!</span></h3>

	<table>
	<tr>
		<th class="A1">Assignment 1 </th>
		<th class="A2">Assignment 2</th>
		<th class="A3"> Assignment 3</th>
	</tr>
<tr>
	<td class="A1"> <a href="sftp://therring5@codd.cs.gsu.edu/home/therring5/public_html/index.html/">My First Assignment!</a> </td>
	<td class="A2"> <a href="sftp://therring5@codd.cs.gsu.edu/home/therring5/public_html/assignment2/">My Second Assignment!</a> </td>
	<td class="A3"> <a href="sftp://therring5@codd.cs.gsu.edu/home/therring5/public_html/assignment3/">My Third Asssignment!</a></td>
</tr>
</table>

<h2><span class="headers">Education Histoy</span></h2>

<ul>
  <li><span class="GSU">Mount Herman Christian School</span></li>
  <li><span class="HS">Redan Middle School and Lithonia Middle School</span>
    <ul>
    <li><span class="Raiders">Redan High School</span> (2008-2012)</li>
    <li><span class="school">Benedict College</span> (2012-2014) </li>
    </ul>
  </li>
  <li> <span class="GSU">Georgia State University</span> (2014- Current)</li>
</ul>

<h2><span class="headers">Job History</span></h2>
<ul>
  <li>Atlanta Airport</li>
  <li>Lawrence Livermore National Labaratory 
    <ul>
    <li> <span class="school">Benedict College</span> (Student Success Trainer-SSA)</li>
    <li> <span class="school">Benedict College</span> (Transportation Engineering)</li>
    </ul>
  </li>
  <li>Hollowell Foster and Herring PC</li>
</ul>	

<a href="sftp://therring5@codd.cs.gsu.edu/home/therring5/public_html/index.html/stylesheet.css"> Side Note: This is a link for my external stylesheet</a>
<p>
		<a href="http://validator.w3.org/check/referer">
			<img src="http://www.w3.org/Icons/valid-xhtml11" alt="Valid XHTML" />
		</a>
    <a href="http://jigsaw.w3.org/css-validator/check/referer">
        <img style="border:0;width:88px;height:31px"
            src="http://jigsaw.w3.org/css-validator/images/vcss"
            alt="Valid CSS!" />
    </a>
</p>

</body>
</html>