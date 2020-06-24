<?php
$db=mysqli_connect("localhost","root","","covid") or die(mysqli_connect_error());
session_start();
if($_SESSION['email']=="" || $_SESSION['userper']==""){
    header("Location:../index.php");
}
$query="SELECT * FROM `treatment` ORDER BY `id` desc;";
$result=mysqli_query($db,$query);
$count=mysqli_num_rows($result);

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
    <link href="../css/addons/datatables.min.css" rel="stylesheet">
    <link href="../css/addons/datatables-select.min.css" rel="stylesheet">
    <link rel="stylesheet" href="mdb.min.css"> 


  <style>
*{
    box-sizing: border-box;
}
html,body{
    margin:0;
    padding:0;
    
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

.colornav{
    background: #263238;
    color:white;
}
.ml1 {
  font-weight: 900;
  font-size: 2.4em;
}

.ml1 .letter {
  display: inline-block;
  line-height: 1em;
}

.ml1 .text-wrapper {
  position: relative;
  display: inline-block;
  padding-top: 0.1em;
  padding-right: 0.05em;
  padding-bottom: 0.15em;
}

.ml1 .line {
  opacity: 0;
  position: absolute;
  left: 0;
  height: 3px;
  width: 100%;
  background-color: black;
  transform-origin: 0 0;
}

.ml1 .line1 { top: 0; }
.ml1 .line2 { bottom: 0; }
#size{
    margin-top:120px; 
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
html,body,header,.view{
    min-height: 100vh;
}
@media (max-width: 991px) {
    html,body,header,.view{
    min-height: 100vh;
}


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

<?php
    $db=mysqli_connect("localhost","root","","covid") or die(mysqli_connect_error());
    $count=mysqli_num_rows($result);
        if($count>0){
            ?>

<body class="heavy-rain-gradient medical-lp">
    <?php
        }
        else{
            ?>
            <body class="cloudy-knoxville-gradient medical-lp">
            <?php  
        }
?>
<main>

<nav class="navbar navbar-expand-md navbar-dark fixed-top scrolling-navbar">
            <div class="container d-flex justify-content-between">
               
                <a href="welcomepersonnel.php" class="navbar-brand font-weight-bold lead" href="#"><strong  class="text-white btn-change"><i class="fas fa-angle-left text-dark brandas"></i></strong></a>
                <a id="brandanime" class="animated tada ml-md-0 ml-4" class="navbar-brand font-weight-bold lead ml-md-0 ml-5" href="#"><strong   class="text-dark btn-change brandas">Assistance</strong></a>
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
        

<div id="size" class="view flex-center">

    <div class="container overflow-auto">
    <?php
    $db=mysqli_connect("localhost","root","","covid") or die(mysqli_connect_error());
    $count=mysqli_num_rows($result);
        if($count>0){
            ?>

    <div class="row flex-center mb-5">
    <h6 class="ml1">
        <span class="text-wrapper">
            <span class="line line1"></span>
            <span class="letters">Doctor's Instructions</span>
            <span class="line line2"></span>
        </span>
    </h6>
    </div>

    <?php
        }
    ?>
    <?php
    $db=mysqli_connect("localhost","root","","covid") or die(mysqli_connect_error());
    $count=mysqli_num_rows($result);
        if($count>0){
            ?>

    <table id="dtBasicExample" class="table table-hover table-responsive-xs table-borderless text-left rounded table-striped" cellspacing="0" width="100%">
    <thead class="colornav">
    <tr>
      <th class="th-sm">Name
      </th>
      <th class="th-sm">Age
      </th>
      <th class="th-sm">Treatment suggested by Doctor
      </th>
      <th class="th-sm d-none">Location
      </th>
      <th class="th-sm d-none">Message
      </th>
      <th class="th-sm ">Done
      </th> 
     </tr>
  </thead>
  <tbody class="font-weight-bold grey lighten-5">
  
<?php


  while($row=mysqli_fetch_array($result)){

    ?>

 
    <tr id="tr" class="font-weight-bold">
      <td  class="font-weight-bold name"> <?php echo $row["name"]; ?> </td>
      <td  class="font-weight-bold age"> <?php echo $row["age"]; ?> </td>
      <td class="font-weight-bold input" style="word-break:break-word;"><?php echo $row["input"]; ?> </td>
      <td class="font-weight-bold d-none" style="word-break:break-word;"> <?php echo $row["location"]; ?> </td>
      <td class="font-weight-bold d-none" style="word-break:break-word;"> <?php echo $row["message"]; ?> </td> 
      <td class="font-weight-bold"> <a id="delete"><i class="fas fa-check ml-1 pl-2"></i></a> </td>
      
   </tr>    
       

    <?php   
  }
    ?>
    
</tbody>
<tfoot class="colornav">
    <tr>
      <th class="th-sm">Name
      </th>
      <th class="th-sm">Age
      </th>
      <th class="th-sm ">Treatment suggested by Doctor
      </th>
      <th class="th-sm d-none">Location
      </th>
      <th class="th-sm d-none">Message
    </th>
    <th class="th-sm">Done
      </th> 
      
     </tr>
  </tfoot>
  
</table>
<?php
}
else{
    ?>
    <div class="jumbotron card z-depth-1-half brown lighten-2 rounded hoverable">
            <div class="text-black text-center py-5 px-4">
                
                <div>
                
                <h1 id="text-head" class="h1 pt-1 mb-5 font-bold text-capitalize"><strong >There are no instructions from the doctor.</strong></h1>
                
                <a href="welcomepersonnel.php" class="btn btn-yellow btn-md btn-rounded font-weight-bold text-dark animated bounce"><i class="fas fa-undo mr-2"></i>Back to menu</a>
                </div>
            </div>
    </div>
<?php
}


?>

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
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
    <!--Content-->
    <div class="modal-content text-center">
      <!--Header-->
      <div class="modal-header d-flex justify-content-center font-weight-bold">
        <p class="heading">Do you really want to delete this Instruction</p>
      </div>

      <!--Body-->
      <div class="modal-body">
        <i class="fas fa-trash fa-4x animated rotateIn"></i>
        

      </div>

      <!--Footer-->
      <div class="modal-footer flex-center mt-2">
        
        <a id="deletequery" type="button" class="btn btn-md btn-rounded btn-danger waves-effect font-weight-bold">YES</a>
        <a  type="button" class="btn btn-md btn-rounded btn-outline-danger waves-effect font-weight-bold" data-dismiss="modal">No</a>
      </div>

    </div>
    <!--/.Content-->
  </div>
</div>


<div class="modal fade" id="successmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-sm modal-notify modal-success" role="document">
    <!--Content-->
    <div class="modal-content text-center">
      <!--Header-->
      <div class="modal-header d-flex justify-content-center font-weight-bold">
        <p class="heading text-capitalize">Instruction was successfully deleted</p>
      </div>

      <!--Body-->
      <div class="modal-body">
      <i class="fas fa-trash-alt fa-4x animated rotateIn"></i>
       
       

      </div>

      <!--Footer-->
      <div class="modal-footer flex-center">
        
        <a type="button" class="btn btn-success waves-effect btn-rounded" data-dismiss="modal">OK</a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>

<div class="modal fade" id="notdeletedmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
    <!--Content-->
    <div class="modal-content text-center">
      <!--Header-->
      <div class="modal-header d-flex justify-content-center font-weight-bold">
        <p class="heading">Requested operation could not be completed,Please try again later</p>
      </div>

      <!--Body-->
      <div class="modal-body">

        <i class="fas fa-times fa-4x animated rotateIn"></i>

      </div>

      <!--Footer-->
      <div class="modal-footer flex-center">
        
        <a type="button" class="btn btn-rounded btn-danger waves-effect" data-dismiss="modal">OK</a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>

</main>


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
    <script src="../js/addons/datatables-select.min.js" type="text/javascript"></script>
    <script src="../js/addons/datatables.min.js" type="text/javascript"></script>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <script src="mdb.min.js"></script>
        <!-- DataTables JS -->
        
        
    

    
        
        <script src="../app.js"></script>
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
             
             $("#dtBasicExample #tr").click(function(){
                $("#deletemodal").modal("show")
                            
                            window.age=$(this).find(".age").text()
                            window.input=$(this).find(".input").text()
                            window.name=$(this).find(".name").text()
                            age=$.trim(age)
                            input=$.trim(input)
                            name=$.trim(name)

                 }) 
                    
                    $("#deletequery").on("click",function(){
                    

                      
                                $.ajax({
                                    type: "POST",
                                    url: "deleteins.php",
                                    data: { "name":name,
                                            "age":age,   
                                            "input":input},   
                                    cache: false,
                                    success: function(data){
                                    
                                        if(data==="1"){
                                            
                                        $("#deletemodal").modal("hide")
                                        $("#successmodal").modal("show")
                                        setTimeout(function () {
                                            $("#successmodal").modal("hide")
                                        },1500)
                                    }
                                        else{
                                        $("#deletemodal").modal("hide")
                                        $("#notdeletedmodal").modal("show")
                                        setTimeout(function () {
                                            $("#notdeletedmodal").modal("hide")
                                        },1500)
                                        
                                        }
                                                                        
                                    },failure :function(data){
                                        $("#deletemodal").modal("hide").delay("slow")
                                        
                                        $("#notdeletedmodal").modal("show")
                                        setTimeout(function () {
                                            $("#notdeletedmodal").modal("hide")
                                        },1500)

                                    }
                                }); 
                })




                    $("#successmodal").on("hide.bs.modal",function(){
                        window.location.href="checkins.php";
                    })
        



        $("#brandanime").hover(function(){
                       $(this).addClass("infinite");
                   },function () {
                    $(this).removeClass("infinite");
                     })

            $(document).ready(function () {
                $('#dtBasicExample').DataTable();
                $('.dataTables_length').addClass('bs-select');
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
                
                    // Wrap every letter in a span
    // Wrap every letter in a span
    var textWrapper = document.querySelector('.ml1 .letters');
    textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

    anime.timeline({loop: true})
    .add({
        targets: '.ml1 .letter',
        scale: [0.3,1],
        opacity: [0,1],
        translateZ: 0,
        easing: "easeOutExpo",
        duration: 600,
        delay: (el, i) => 70 * (i+1)
    }).add({
        targets: '.ml1 .line',
        scaleX: [0,1],
        opacity: [0.5,1],
        easing: "easeOutExpo",
        duration: 700,
        offset: '-=875',
        delay: (el, i, l) => 80 * (l - i)
    }).add({
        targets: '.ml1',
        opacity: 0,
        duration: 1000,
        easing: "easeOutExpo",
        delay: 2000
    });
    $(document).ready(function(){
    if (document.body.scrollTop > 40 || document.documentElement.scrollTop > 40) {
        
        $(".brandas").removeClass("text-dark");
        $(".brandas").addClass("text-white");

    } else {
        $(".brandas").removeClass("text-white");
        $(".brandas").addClass("text-dark");

    }

})


    
    </script>
   
    

</body>

</html>