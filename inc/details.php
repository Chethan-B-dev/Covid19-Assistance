<?php
$db=mysqli_connect("localhost","root","","covid") or die(mysqli_connect_error());
$name=$_POST['name'];
$age=$_POST['age'];
$query="SELECT * FROM `patientadd` WHERE `name`='$name' AND `age`='$age' LIMIT 1;";
$result=mysqli_query($db,$query);
$count=mysqli_num_rows($result);
$row=mysqli_fetch_array($result);
if($result){
    echo $name;
}
else{
    echo "0";
}

?>