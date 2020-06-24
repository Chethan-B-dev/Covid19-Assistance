<?php
$db=mysqli_connect("localhost","root","","covid") or die(mysqli_connect_error());
if(array_key_exists("check",$_POST)){   
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$loc=$_POST['loc'];
$message=$_POST['message'];
$name=mysqli_real_escape_string($db,$name);
$email=mysqli_real_escape_string($db,$email);
$phone=mysqli_real_escape_string($db,$phone);
$loc=mysqli_real_escape_string($db,$loc);
$message=mysqli_real_escape_string($db,$message);
$query="INSERT INTO `query1` (`id`, `name`, `email`, `phone`, `location`, `message`) VALUES (NULL, '$name', '$email', '$phone', '$loc', '$message');";
$result=mysqli_query($db,$query);
if($result){
     header("Location:../index.php?done=true");
    
}
else{
    header("Location:../index.php?fail=true");
}
}
else{
    header("Location:../index.php");
}

?>