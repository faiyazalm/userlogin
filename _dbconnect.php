<?php
  $servername="localhost";
  $username="root";
  $password="";
  $dbname="users123";

  $conn=mysqli_connect($servername,$username,$password,$dbname);
  if(!$conn){
    die("Not connected : ". mysqli_connect_error());
  }
?>
