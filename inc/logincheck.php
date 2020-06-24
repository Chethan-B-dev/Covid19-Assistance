<?php

$db=mysqli_connect("localhost","root","","covid") or die(mysqli_connect_error());
session_start();
$email=$_POST['email'];
$pass=$_POST['pass'];
$username=$_POST['user'];
$username=mysqli_real_escape_string($db,$username);
$email=mysqli_real_escape_string($db,$email);
$pass=mysqli_real_escape_string($db,$pass);
$query="SELECT * FROM `perlogin` WHERE `email`='$email' AND `pass`='$pass' AND `username`='$username';";
$result=mysqli_query($db,$query);
$count=mysqli_num_rows($result);
$row=mysqli_fetch_array($result);
if($count==1){
    echo "1";
   
}
else{
    echo "0";
}


?>