<?php
$db=mysqli_connect("localhost","root","","covid") or die(mysqli_connect_error());
session_start();
$done="";

if($_SESSION['email']=="" || $_SESSION['userper']==""){
    header("Location:../index.php");
}

if(isset($_GET["done"])){
    $done="Your SOS Message has been sent.";
 
 }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Covid19 Assistance</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/mdb.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="mdb.min.css">
    
<body class="medical-lp grey lighten-3">
  <style>
*{
    box-sizing: border-box;
}
html,body{
    margin:0;
    padding:0;
}
html,body,header,#size{
    height: 100vh;
}
@media (max-width: 991px) {
    html,body,header,#size{
    height: 170vh;
    }
}


.top-nav-collapse {
    background-color: #263238 !important;
}

.navbar:not(.top-nav-collapse) {
    background: transparent !important;
}

@media (max-width: 991px) {
    .navbar:not(.top-nav-collapse) {
        background: #263238 !important;
    }
}
#gradient{
    background: linear-gradient(to left,#a8b5bd,#a8b5bd) !important;
}
.colornav{
    background: #263238;
    color:white;
}

#dark-color{
    background: #263238 !important;
}


/* Let's get this party started */
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


#text-font{
    font-family: "Comic Sans MS", cursive, sans-serif;
    color:#E91E63;
}
.ml2 {
  font-weight: 900;
  font-size: 2em;
}

.ml2 .letter {
  display: inline-block;
  line-height: 1em;
}
#size{
    margin-top: 100px;
}
.ml6 {
  position: relative;
  font-weight: 900;
  font-size: 2em;
}

.ml6 .text-wrapper {
  position: relative;
  display: inline-block;
  padding-top: 0.2em;
  padding-right: 0.05em;
  padding-bottom: 0.1em;
  overflow: hidden;
}   

.ml6 .letter {
  display: inline-block;
  line-height: 1em;
}
#subbut{
    position: absolute;
    left:646px;
    top:+68px;
}

@media (max-width: 753px) {
    #subbut{
   display:none;
}

}@media (max-height: 991px) {
    html,body,header,#size{
    height: 120vh;
}
}

@media screen and (min-width:991px) and (max-width:1199px){
    #subbut{
    position: absolute;
    left:520px;
    top:+68px;
}

}

#image{
    height: 640px;
}
.cuscolor{
    background: #263238 !important;
    transition: all 0.4s ease  !important;
    
}
#brandanime{
    font-size: 1.3em;
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

  </style>
    
</head>
<body class="grey lighten-3">
<header class="mb-5">

<nav class="navbar navbar-dark navbar-expand-md fixed-top scrolling-navbar">
            <div class="container d-flex justify-content-between">
               
        <a href="welcomepersonnel.php" class="navbar-brand font-weight-bold lead" href="#"><strong  class="text-white btn-change"><i class="fas fa-angle-left text-dark brandas"></i></strong></a>
        <a id="brandanime" class="animated tada ml-md-0 ml-4" class="navbar-brand font-weight-bold lead " href="#"><strong   class="text-dark btn-change brandas">Assistance</strong></a>
        <button class="navbar-toggler first-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent20" aria-expanded="false" aria-label="Toggle navigation">
            <div class="animated-icon1"><span></span><span></span><span></span></div>
        </button>

             
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!--Links-->
                   

                     <ul class="navbar-nav ml-auto smooth-scroll flex-center">
                        <li class="nav-item">
                            <span class="nav-link" data-offset="80"><span class="lead font-weight-bold text-capitalize text-dark btn-change brandas">Welcome <?php echo $_SESSION['userper'];?></span></span>
                        </li>
                        <li class="nav-item ml-2">
                            <a id="logout-btn" href="../index.php?logout=1" class="btn btn-rounded btn-sm btn-yellow text-dark font-weight-bold">Logout</a>
                        </li>

                    </ul>


                </div>
            </div>
    </nav>
    <!-- Button trigger modal -->

    
    <!--Section: Contact v.2-->
<div id="size" class="view">
    
            <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
            <h3 class="ml6">
                    <span class="text-wrapper">
                        <span class="letters">Add Patient</span>
                    </span>
                    </h3>

            </div>

    <section  class="my-5">

        <!-- Form with header -->   
        <div id="givesomejs" class="card hoverable rounded">

            <!-- Grid row -->
            <div class="row no-gutters">

                <!-- Grid column -->
                <div class="col-lg-8">

                    <div class="card-body form">

                        <!-- Header -->
                        
                        <h3 id="dark-color-text" class="mt-4 text-capitalize pink-text"><i class="fas fa-user-md mr-2"></i>Enter Patient Information</h3>

                        <!-- Grid row -->
                        <form method="POST" action="addscript.php">

                        <div class="row">
                                 
                        
                            <!-- Grid column -->
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="form-contact-name" class="form-control" name="name" required>
                                    <input type="hidden" id="form-contact-name" class="form-control" value="1" name="check">
                                    <label for="form-contact-name" >Name</label>
                                </div>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input min="0" max="150"  type="number" maxlength="3" id="form-contact-email" class="form-control" name="age" required>
                                    <label for="form-contact-email">Age</label>
                                </div>
                            </div>
                            <!-- Grid column -->

                        </div>
                        <!-- Grid row -->

                        <!-- Grid row -->
                        <div class="row">

                            <!-- Grid column -->
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="form-contact-phone" maxlength="10" class="form-control" name="phone" pattern="^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$"  required>
                                    <label for="form-contact-phone" >Phone Number(+91)</label>
                                </div>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="form-contact-company" class="form-control" name="loc" required>
                                    <label for="form-contact-company">Location/Address</label>
                                </div>
                            </div>
                            <!-- Grid column -->

                        </div>
                        <div class="row ">

                            <!-- Grid column -->
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="form-contact-Medicine"  class="form-control" name="medicine">
                                    <label for="form-contact-Medicine" >Medicine Given</label>
                                </div>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="form-contact-condition" class="form-control" name="condition" required>
                                    <label for="form-contact-condition" >Condition</label>
                                </div>
                            </div>
                            <!-- Grid column -->

                        </div> 
                        <div class="row">

                            <!-- Grid column -->
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="form-contact-Allergies" class="form-control" name="allergies" required>
                                    <label for="form-contact-Allergies" >Allergies</label>
                                </div>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="form-contact-Emergency" class="form-control" name="emergency" required>
                                    <label for="form-contact-Emergency">Emergency Contacts</label>
                                </div>
                            </div>
                            <!-- Grid column -->

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="md-form">
                                    <input  type="text" id="date-picker-example" class="form-control datepicker" name="dob" required>
                                    <label for="date-picker-example">Date of birth</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="md-form">


                                <datalist id="bloodgroups">
                                        <option value="O−">O−</option>
                                        <option value="O+">O+</option>
                                        <option value="A−">A−</option>
                                        <option value="A+">A+</option>
                                        <option value="B−">B−</option>
                                        <option value="B+">B+</option>
                                        <option value="AB−">AB−</option>
                                        <option value="AB+">AB+</option>
                                 </datalist>
                                    <input  type="text" id="blood" class="form-control" name="blood" required list="bloodgroups">
                                    <label for="blood">Blood Group</label>
                                </div>
                            </div>
                       
                        </div>
                        <!-- Grid row -->

                        <!-- Grid row -->
                        <div class="row">
                        <div class="col-md-12">
                            <div class="md-form mb-0">
                                <textarea name="history" type="text" id="form-contact-history" class="form-control md-textarea" rows="3" required></textarea>
                                <label for="form-contact-history">Medical History</label>
                                <button id="subbut" type="submit" class="btn btn-floating pink"><i class="fas fa-plus-square"></i></button>
                                <button id="subbut1" type="submit" class="mt-3 btn btn-rounded pink font-weight-bold text-white d-flex justify-content-center align-items-center d-lg-none d-block"><i class=" fas fa-plus-square fa-2x"></i></button>
                            </div>  
                            
                         </div>
                            <!-- Grid column -->
                            
                            <!-- Grid column -->

                        </div>
                            
                           
                    </form>

                    </div>

                </div>
                    
          
                <!-- Grid column -->

                <!-- Grid column -->
               <!-- Grid column -->
                    <div class="col-lg-4 hoverable rounded">
                            <a> 
                                <img id="image" src="../img/bg9.jpg" class="w-100" alt="doctor's picture">
                                <div class="mask flex-center pattern-2 rounded">
                                    
                                </div>
                            </a>
                    </div>

                </div>
            <!-- Grid row -->

        </div>
        <!-- Form with header -->

    </section>
    <!-- Section: Contact v.3 -->
</div>
</div>



    
</header>
        


     <footer class="page-footer font-small special-color-dark pt-4">

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
                    <li id="click" class="list-inline-item">
                        <a  class="btn-floating btn-dribbble mx-1">
                            <i class="fab fa-dribbble"> </i>
                        </a>
                    </li>
                </ul>
                <!-- Social buttons -->

            </div>
            <!-- Footer Elements -->

            <!-- Copyright -->
            <div class="footer-copyright text-center py-4 text-capitalize text-justify">© 2020 Copyright:
                <a href="#">Chethan B</a>
            </div>
           

     </footer>
       
<!--Modal: modalConfirmDelete-->
    <div class="modal fade" id="successmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
        <div class="modal-dialog modal-sm modal-notify modal-success" role="document">
            <!--Content-->
            <div class="modal-content text-center">
            <!--Header-->
            <div class="modal-header d-flex justify-content-center">
                <p class="heading font-weight-bold text-capitalize">Patient has been added!</p>
            </div>

            <!--Body-->
            <div class="modal-body">
            <i class="fas fa-check fa-4x animated rotateIn"></i>
            </div>
                        

            <!--Footer-->
            <div class="modal-footer flex-center">
                <a type="button" class="btn btn-success waves-effect btn-rounded" data-dismiss="modal">OK</a>
            </div>

            </div>
            <!--/.Content-->
        </div>
    </div>


  





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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <script src="../app.js"></script>
    <script src="mdb.min.js"></script>
        <script>
          
            // Data Picker Initialization
$('.datepicker').pickadate();
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
             $("#brandanime").hover(function(){
                       $(this).addClass("infinite");
                   },function () {
                    $(this).removeClass("infinite");
                     })
            $("#subbut").hover(function(){
                $(this).removeClass("pink").addClass("btn-blue");
                $("#dark-color-text").removeClass("pink-text").addClass("blue-text");

            },function(){
                $(this).removeClass("btn-blue").addClass("pink");
                $("#dark-color-text").removeClass("blue-text").addClass("pink-text");

            })
            let width=$(window).width();
        
            if(width<771){
               
               $("html,body,header,#size").height("1700px")
           }
           else{
              $("html,body,header,#size").height()
           }


            $(window).resize(function () { 
                let width=$(window).width();
            if(width<771){
               
                 $("html,body,header,#size").height("1700px")
             }
             else{
                $("html,body,header,#size").height()
             }
                
            });
           




              <?php   
                                if($done!=""){
                                        ?>
                                    $("#successmodal").modal("show");
                                    setTimeout(function(){
                                        $("#successmodal").modal("hide");
                                    },2000);
                                    $("#successmodal").on('hide.bs.modal', function(){
                                window.location.href = "add.php";
              });
                                    <?php 
                                }



                            ?>

           
        $(document).ready(function () {
            $('#dtBasicExample').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });
            // Material Design example

        
        $(".hov").hover(function(){
            $(this).removeClass("grey");
            $(this).addClass("pink");
        },function(){
            $(this).removeClass("pink");
            $(this).addClass("grey");
        })
        
           
            $(document).scroll(function() {
                if($(window).outerWidth()>1000){
        if (document.body.scrollTop > 40 || document.documentElement.scrollTop > 40) {
        
            $(".brandas").removeClass("text-dark");
            $(".brandas").addClass("text-white");

        } else {
            $(".brandas").removeClass("text-white");
            $(".brandas").addClass("text-dark");

        }
    }
    })
            $(document).ready(function () {
                if($(window).outerWidth()<1000){

                        $(".brandas").removeClass("text-dark");
                        $(".brandas").addClass("text-white");

                        }
                        else{
                        $(".brandas").removeClass("text-white");
                        $(".brandas").addClass("text-dark");

                        }
            })
            
                        $(window).resize(function(){
                            if($(window).outerWidth()<1000){

                                $(".brandas").removeClass("text-dark");
                                $(".brandas").addClass("text-white");

                            }
                            else{
                                $(".brandas").removeClass("text-white");
                                $(".brandas").addClass("text-dark");

                            }
                        })
                        var textWrapper = document.querySelector('.ml6 .letters');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

        anime.timeline({loop: true})
        .add({
            targets: '.ml6 .letter',
            translateY: ["1.1em", 0],
            translateZ: 0,
            duration: 750,
            delay: (el, i) => 50 * i
        }).add({
            targets: '.ml6',
            opacity: 0,
            duration: 1000,
            easing: "easeOutExpo",
            delay: 2000
        });

    
    </script>
   
    

</body>

</html>