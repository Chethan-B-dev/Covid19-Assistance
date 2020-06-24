<?php
$db=mysqli_connect("localhost","root","","covid") or die(mysqli_connect_error());
if(array_key_exists("name",$_POST) && array_key_exists("age",$_POST) && array_key_exists("input",$_POST)){
$age=$_POST['age'];
$input=$_POST['input'];
$name=$_POST['name'];
$query="DELETE FROM `treatment` WHERE `treatment`.`input` = '$input' AND `treatment`.`age` = '$age';";
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