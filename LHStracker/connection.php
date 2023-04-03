<?php

// this is the connection string, this is passing the parameters (for other domains you replace localhost)
// root is the default user id and the "" is the default password to log on to the database dbstudent
$link=mysqli_connect("localhost","root","","dbstudent" );

// Checks connection
if (mysqli_connect_errno())

  {

  echo "Failed to connect to MySQL: " . mysqli_connect_error();

  }



// the $link is the connection string and we are selecting dbstudent database for the session (where $link is referred it refers to dbstudent)
mysqli_select_db($link,"dbstudent");
?>