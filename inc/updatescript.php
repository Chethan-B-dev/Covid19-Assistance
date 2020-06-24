<?php
$db=mysqli_connect("localhost","root","","covid") or die(mysqli_connect_error());
if(array_key_exists("ca",$_POST) && array_key_exists("cm",$_POST) && array_key_exists("cc",$_POST) && array_key_exists("cmh",$_POST) && array_key_exists("name",$_POST)&& array_key_exists("age",$_POST)){      
$ca=$_POST['ca'];
$cm=$_POST['cm'];
$cc=$_POST['cc'];
$cmh=$_POST['cmh'];
$name=$_POST['name'];
$age=$_POST['age'];
$ca=mysqli_real_escape_string($db,$ca);
$cm=mysqli_real_escape_string($db,$cm);
$cc=mysqli_real_escape_string($db,$cc);
$cmh=mysqli_real_escape_string($db,$cmh);
$query="UPDATE `patientadd` SET `cond` = '$cc',`medicine`='$cm',`allergy`='$ca',`mh`='$cmh' WHERE `patientadd`.`name` = '$name' AND `patientadd`.`age` = '$age' ;";
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