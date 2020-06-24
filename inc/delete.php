<?php
$db=mysqli_connect("localhost","root","","covid") or die(mysqli_connect_error());
if(array_key_exists("name",$_POST)&&array_key_exists("email",$_POST)){
$name=$_POST['name'];
$email=$_POST['email'];
$query="DELETE FROM `query1` WHERE `name`='$name' AND `email`='$email'; ";
$result=mysqli_query($db,$query);
  if($result){
      echo "1";
  }
  else{
      echo "0";
  }
}

else{
  header("Location:../index.php");
}


?>