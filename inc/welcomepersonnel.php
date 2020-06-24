<?php
$db=mysqli_connect("localhost","root","","covid") or die(mysqli_connect_error());
session_start();
if(count($_POST)!=0){
    $emailuser=$_POST['emailuser'];
    $pass=$_POST['pass'];
    $emailuser=mysqli_real_escape_string($db,$emailuser);
    $pass=mysqli_real_escape_string($db,$pass);
    $query="SELECT * FROM `perlogin` WHERE `email`='$emailuser' OR `username`='$emailuser' AND `pass`='$pass';";
    $result=mysqli_query($db,$query);
    $row=mysqli_fetch_array($result);
    $count=mysqli_num_rows($result);
    if($count==0){
        echo "not logged in";
        header("Location:../index.php?error=true");
        return false;
    }
    $_SESSION['email']=$row['email'];
    $_SESSION['userper']=$row['username'];
    
}
if($_SESSION['email']=="" || $_SESSION['userper']=="" ){
    header("Location:../index.php");
    session_unset();
    session_destroy();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Covid19 Assistance</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../css/mdb.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="mdb.min.css">

  <style>
      ::-webkit-scrollbar {
    width: 9px;
}
 
/* Track */
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
  
}
 
/* Handle */
::-webkit-scrollbar-thumb {
    
    background: #263238; 
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
    box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
}
::-webkit-scrollbar-thumb:window-inactive {
	background: #263238; 
}


         html,
        body,
        header,
        .view {
            height: 100vh;
        }

@media (max-width: 991px) {
    html,
    body,
    header,
    .view {
        height: 120vh;
    }
}

.top-nav-collapse {
    background-color: #263238 !important;
}

.navbar:not(.top-nav-collapse) {
    background: transparent !important;
}
#brandanime{
    font-size: 1.3em;
}

@media (max-width: 991px) {
    .navbar:not(.top-nav-collapse) {
        background: #263238 !important;
    }
}

h1 {
    letter-spacing: 8px;
}

h5 {
    letter-spacing: 3px;
}

.hr-light {
    border-top: 3px solid #fff;
    width: 80px;
}
.hov{
    transition: all 2s ease;
}

.animated-icon1, .animated-icon2, .animated-icon3 {
width: 30px;
height: 20px;
position: relative;
margin: 0px;
-webkit-transform: rotate(0deg);
-moz-transform: rotate(0deg);
-o-transform: rotate(0deg);
transform: rotate(0deg);
-webkit-transition: .5s ease-in-out;
-moz-transition: .5s ease-in-out;
-o-transition: .5s ease-in-out;
transition: .5s ease-in-out;
cursor: pointer;
}

.animated-icon1 span, .animated-icon2 span, .animated-icon3 span {
display: block;
position: absolute;
height: 3px;
width: 100%;
border-radius: 9px;
opacity: 1;
left: 0;
-webkit-transform: rotate(0deg);
-moz-transform: rotate(0deg);
-o-transform: rotate(0deg);
transform: rotate(0deg);
-webkit-transition: .25s ease-in-out;
-moz-transition: .25s ease-in-out;
-o-transition: .25s ease-in-out;
transition: .25s ease-in-out;
}

.animated-icon1 span {
background: white;
}

.animated-icon2 span {
background: #e3f2fd;
}

.animated-icon3 span {
background: #f3e5f5;
}

.animated-icon1 span:nth-child(1) {
top: 0px;
}

.animated-icon1 span:nth-child(2) {
top: 10px;
}

.animated-icon1 span:nth-child(3) {
top: 20px;
}

.animated-icon1.open span:nth-child(1) {
top: 11px;
-webkit-transform: rotate(135deg);
-moz-transform: rotate(135deg);
-o-transform: rotate(135deg);
transform: rotate(135deg);
}

.animated-icon1.open span:nth-child(2) {
opacity: 0;
left: -60px;
}

.animated-icon1.open span:nth-child(3) {
top: 11px;
-webkit-transform: rotate(-135deg);
-moz-transform: rotate(-135deg);
-o-transform: rotate(-135deg);
transform: rotate(-135deg);
}

/* Icon 3*/

.animated-icon2 span:nth-child(1) {
top: 0px;
}

.animated-icon2 span:nth-child(2), .animated-icon2 span:nth-child(3) {
top: 10px;
}

.animated-icon2 span:nth-child(4) {
top: 20px;
}

.animated-icon2.open span:nth-child(1) {
top: 11px;
width: 0%;
left: 50%;
}

.animated-icon2.open span:nth-child(2) {
-webkit-transform: rotate(45deg);
-moz-transform: rotate(45deg);
-o-transform: rotate(45deg);
transform: rotate(45deg);
}

.animated-icon2.open span:nth-child(3) {
-webkit-transform: rotate(-45deg);
-moz-transform: rotate(-45deg);
-o-transform: rotate(-45deg);
transform: rotate(-45deg);
}

.animated-icon2.open span:nth-child(4) {
top: 11px;
width: 0%;
left: 50%;
}

/* Icon 4 */

.animated-icon3 span:nth-child(1) {
top: 0px;
-webkit-transform-origin: left center;
-moz-transform-origin: left center;
-o-transform-origin: left center;
transform-origin: left center;
}

.animated-icon3 span:nth-child(2) {
top: 10px;
-webkit-transform-origin: left center;
-moz-transform-origin: left center;
-o-transform-origin: left center;
transform-origin: left center;
}

.animated-icon3 span:nth-child(3) {
top: 20px;
-webkit-transform-origin: left center;
-moz-transform-origin: left center;
-o-transform-origin: left center;
transform-origin: left center;
}

.animated-icon3.open span:nth-child(1) {
-webkit-transform: rotate(45deg);
-moz-transform: rotate(45deg);
-o-transform: rotate(45deg);
transform: rotate(45deg);
top: 0px;
left: 8px;
}

.animated-icon3.open span:nth-child(2) {
width: 0%;
opacity: 0;
}

.animated-icon3.open span:nth-child(3) {
-webkit-transform: rotate(-45deg);
-moz-transform: rotate(-45deg);
-o-transform: rotate(-45deg);
transform: rotate(-45deg);
top: 21px;
left: 8px;
}
#givesomemargin{
    padding-top:5px;
    padding-bottom:5px;
}
@media screen and (max-width:650px){
    html,body,header,.view{
        height:162vh;
        
    }
}


  </style>
  
    
</head>

<body class="medical-lp">
<header>


        <nav class="navbar navbar-expand-md navbar-dark fixed-top scrolling-navbar">
            <div class="container d-flex justify-content-between">
                <a id="brandanime" class="animated tada ml-md-0 ml-4" class="navbar-brand font-weight-bold lead" href="#"><strong   class="text-dark btn-change brand">Assistance</strong></a>
                <button class="navbar-toggler first-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent20" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="animated-icon1"><span></span><span></span><span></span></div>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!--Links-->
                   

                     <ul class="navbar-nav ml-auto smooth-scroll flex-center">
                        <li class="nav-item">
                            <span class="nav-link" data-offset="80"><span class="lead font-weight-bold text-capitalize text-dark btn-change brand">Welcome <?php echo $_SESSION['userper'];?></span></span>
                        </li>
                        <li class="nav-item ml-2">
                            <a id="logout-btn" href="../index.php?logout=1" class="btn btn-rounded btn-sm btn-yellow text-dark font-weight-bold">Logout</a>
                        </li>

                    </ul>


                </div>
            </div>
        </nav>


        
        
            <div class="view intro" style="background-image: url('../img/bg1.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
                        <div class="mask rgba-black-slight">
                  
           <div class="row flex-center">
                    <div class="container-fluid">
                            <div class="col-md-12">
                              <div  class="row mb-5 ">
                                  <div class="col-lg-3  d-flex flex-column justify-content-center align-items-center">
                                      <div class="row py-3">
                                      <a href="add.php" class="btn btn-floating btn-lg grey p-5 d-flex justify-content-center align-items-center hov"><i class="fas fa-plus-circle"></i></a>  

                                      </div> 
                                       <div class="row">
                                           <a href="add.php" class="font-weight-bold text-capitalize h4 black-text-2">Add Patient</a>
                                     </div>
                                    
                                  </div>    
                                
                                  
                                  <div class="col-lg-3  d-flex flex-column justify-content-center align-items-center">
                                      <div class="row py-3">
                                      <a href="checkins.php"   class="btn btn-floating btn-lg grey p-5 d-flex justify-content-center align-items-center hov"><i class="fas fa-briefcase-medical"></i></a>  

                                      </div> 
                                      <div class="row">
                                      <a href="checkins.php"  class="font-weight-bold text-capitalize  h4 black-text-2">Check Instructions</a>
                                        </div>
                                            
                                  </div>

                                  <div class="col-lg-3  d-flex flex-column justify-content-center align-items-center">
                                      <div class="row py-3">
                                      <a href="checksos.php" class="btn btn-floating btn-lg grey p-5 d-flex justify-content-center align-items-center hov"><i class="fas fa-user-md"></i></a>  

                                      </div> 
                                       <div class="row">
                                       <a href="checksos.php" class="font-weight-bold text-capitalize  h4 black-text-2">Check SOS</a>
                                       
                                      </div>
                                     
                                  </div>
                                  <div  class="col-lg-3 d-flex flex-column justify-content-center align-items-center pb-sm-0 pb-5">
                                      <div class="row py-3">
                                      <a href="update.php" class="btn btn-floating btn-lg grey p-5 d-flex justify-content-center align-items-center hov"><i class="fas fa-stethoscope"></i></a>  

                                      </div> 
                                       <div class="row">
                                       <a href="update.php" class="font-weight-bold text-capitalize  h4 black-text-2">Update Patient Info</a>
                                       
                                      </div>
                                     
                                  </div>
                                  
                                
                              </div>
                           
                        </div>




                        </div>
            </div>
            </div> 
            </div>
  


     <footer class="page-footer font-small special-color-dark pt-4 w-100">

            <!-- Footer Elements -->
            <div class="container py-2 my-1">

                <!-- Social buttons -->
                <ul class="list-unstyled list-inline text-center">
                    <li class="list-inline-item">
                        <a class="btn-floating btn-fb mx-1">
                            <i class="fab fa-facebook-f"> </i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn-floating btn-tw mx-1">
                            <i class="fab fa-twitter"> </i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn-floating btn-gplus mx-1">
                            <i class="fab fa-google-plus-g"> </i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn-floating btn-li mx-1">
                            <i class="fab fa-linkedin-in"> </i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn-floating btn-dribbble mx-1">
                            <i class="fab fa-dribbble"> </i>
                        </a>
                    </li>
                </ul>
                <!-- Social buttons -->

            </div>
            <!-- Footer Elements -->

            <!-- Copyright -->
            <div class="footer-copyright text-center py-4 text-capitalize text-justify">© 2020 Copyright:
                <a href="#"> Chethan B</a>
            </div>
            <!-- Copyright -->

        </footer>
    
        </header>

    



    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../js/mdb.min.js"></script>
    <script type="text/javascript" src="../js/core.js"></script>
    <script type="text/javascript" src="../js/react.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>

    
    <script src="../app.js"></script>
    <script sec="mdb.min.js"></script>
    
    <script>

$(document).ready(function () {

$('.first-button').on('click', function () {

  $('.animated-icon1').toggleClass('open');
});
$('.second-button').on('click', function () {

  $('.animated-icon2').toggleClass('open');
});
$('.third-button').on('click', function () {

  $('.animated-icon3').toggleClass('open');
});
});
        
            
       $(".hov").hover(function(){
           $(this).removeClass("grey");
           $(this).addClass("pink");
       },function(){
        $(this).removeClass("pink");
           $(this).addClass("grey");
       })
       
   
$(document).scroll(function() {
    if($(window).outerWidth()>1000){
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        $(".brand").removeClass("text-dark");
        $(".brand").addClass("text-white");

    } else {
        $(".brand").removeClass("text-white");
        $(".brand").addClass("text-dark");

    }
}
})
$(document).ready(function () {
            if($(window).outerWidth()<1000){

                    $(".brand").removeClass("text-dark");
                    $(".brand").addClass("text-white");

                    }
                    else{
                    $(".brand").removeClass("text-white");
                    $(".brand").addClass("text-dark");

                    }
          })

            $(window).resize(function(){
                        if($(window).outerWidth()<1000){

                            $(".brand").removeClass("text-dark");
                            $(".brand").addClass("text-white");

                        }
                        else{
                            $(".brand").removeClass("text-white");
                             $(".brand").addClass("text-dark");

                        }
                    })
                    $(document).ready(function(){
    if (document.body.scrollTop > 40 || document.documentElement.scrollTop > 40) {
        
        $(".brandas").removeClass("text-dark");
        $(".brandas").addClass("text-white");

    } else {
        $(".brandas").removeClass("text-white");
        $(".brandas").addClass("text-dark");

    }

})
        $("#brandanime").hover(function(){
                       $(this).addClass("infinite");
                   },function () {
                    $(this).removeClass("infinite");
                     }) 


       
 
    </script>

    

</body>

</html>




