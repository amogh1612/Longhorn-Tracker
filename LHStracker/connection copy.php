<?php


$link=mysqli_connect("localhost","root","","dbstudent" );

// Check connection

if (mysqli_connect_errno())

  {

  echo "Failed to connect to MySQL: " . mysqli_connect_error();

  }




mysqli_select_db($link,"dbstudent");
?>