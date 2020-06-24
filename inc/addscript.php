<?php
$db=mysqli_connect("localhost","root","","covid") or die(mysqli_connect_error());
if(array_key_exists("check",$_POST)){   
$name=$_POST['name'];
$age=$_POST['age'];
$phone=$_POST['phone'];
$loc=$_POST['loc'];
$med=$_POST['medicine'];
$con=$_POST['condition'];
$ale=$_POST['allergies'];
$em=$_POST['emergency'];
$mh=$_POST['history'];
$dob=$_POST['dob'];
$blood=$_POST['blood'];
$name=mysqli_real_escape_string($db,$name);
$age=mysqli_real_escape_string($db,$age);
$phone=mysqli_real_escape_string($db,$phone);
$loc=mysqli_real_escape_string($db,$loc);
$med=mysqli_real_escape_string($db,$med);
$con=mysqli_real_escape_string($db,$con);
$ale=mysqli_real_escape_string($db,$ale);
$em=mysqli_real_escape_string($db,$em);
$mh=mysqli_real_escape_string($db,$mh);
$dob=mysqli_real_escape_string($db,$dob);
$blood=mysqli_real_escape_string($db,$blood);
if($_POST["condition"]!=""){
    $query="INSERT INTO `patientadd` (`id`, `name`, `age`, `phone`, `loc`, `medicine`, `cond`, `allergy`, `emergency`, `mh`,`blood`,`dob`) VALUES (NULL, '$name', '$age', '$phone', '$loc', '$med', '$con', '$ale', '$em', '$mh','$blood','$dob');";

}
else{
    $query="INSERT INTO `patientadd` (`id`, `name`, `age`, `phone`, `loc`, `medicine`, `cond`, `allergy`, `emergency`, `mh`) VALUES (NULL, '$name', '$age', '$phone', '$loc', '$med', NULL, '$ale', '$em', '$mh','$blood','$dob');";
}
$result=mysqli_query($db,$query);
if($result){
     header("Location:add.php?done=true");
    
}
else{
    header("Location:add.php?fail=true");
}
}


?>