<?php
$db=mysqli_connect("localhost","root","","covid") or die(mysqli_connect_error());
if(array_key_exists("input",$_POST) && array_key_exists("name",$_POST)){
    $input=$_POST['input'];
    $input=mysqli_real_escape_string($db,$input);
    $name=$_POST['name'];
    $name=mysqli_real_escape_string($db,$name);
    $age=$_POST['age'];
    $age=mysqli_real_escape_string($db,$age);
    
    $query="INSERT INTO `treatment` (`id`, `input`, `name`,`age`) VALUES (NULL, '$input', '$name','$age');";
    $result=mysqli_query($db,$query);
    if($result){
        echo "1";
    }
    else{
        echo "0";
    }
}
else{
    echo "0";   
}


?>