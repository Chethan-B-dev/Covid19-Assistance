<?php

use function PHPSTORM_META\type;

$db = mysqli_connect("localhost", "root", "", "covid") or die(mysqli_connect_error());
$error = "";
$done = "";
$failed = "";
$showed = false;
session_start();
if (array_key_exists("logout", $_GET)) {
    session_unset();
    session_destroy();
    header("Location: index.php");
}
if (array_key_exists("email", $_SESSION) || array_key_exists("userper", $_SESSION) || array_key_exists("userdoc", $_SESSION)) {
    session_unset();
    session_destroy();
    header("Location: index.php");
}
if (isset($_GET["error"])) {
    $error = "check email/password";
} else {
    $error = "";
}

if (isset($_GET["done"])) {
    $done = "Your SOS Message has been sent.";
} else {
    $done = "";
}

if (isset($_GET["fail"])) {
    $fail = "sorry coudn't send sos message";
} else {
    $fail = "";
}

//web scraping
$cured = "";
$dead = "";
$confirmed = "";
try {
    $scraped = file_get_contents("https://www.grainmart.in/news/coronavirus-covd-19-live-cases-tracker-john-hopkins/");
} catch (Exception $ex) {
    $scraped = "";
}
if ($scraped) {
    $scraps3 = explode(', Deaths ', $scraped);
    $lastdead = array_pop($scraps3);
    $parts3 = array(implode(', Deaths ', $scraps3), $lastdead);
    $dead = substr($parts3[1], 0, 5);


    $scraps5 = explode('COVID-19 Live Tracker Johns Hopkins India Coronavirus. Total Cases ', $scraped);
    $lastconfirmed = array_pop($scraps5);
    $parts3 = array(implode('COVID-19 Live Tracker Johns Hopkins India Coronavirus. Total Cases ', $scraps5), $lastconfirmed);
    $confirmed = substr($parts3[1], 0, 6);


    $scraps6 = explode(' and Cured ', $scraped);
    $lastcured = array_pop($scraps6);
    $parts6 = array(implode(' and Cured ', $scraps6), $lastcured);
    $cured = substr($parts6[1], 0, 6);
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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../css/addons/datatables.min.css" rel="stylesheet">
    <link href="../css/addons/datatables-select.min.css" rel="stylesheet">
    <link rel="stylesheet" href="mdb.min.css">


    <style>
        ::-webkit-scrollbar {
            width: 9px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);

        }

        /* Handle */
        ::-webkit-scrollbar-thumb {

            background: #263238;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
            box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
        }

        ::-webkit-scrollbar-thumb:window-inactive {
            background: #263238;
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

        #dark-color {
            background: #263238 !important;
        }

        #contact-btn:hover {
            background: #E91E63 !important;
        }

        #sizeinc {
            font-size: 1.5em;

        }

        .blue {
            transition: all 0.4s ease !important;
        }

        .pink {
            transition: all 0.4s ease !important;
        }

        .cuscolor {
            background: #263238 !important;
            transition: all 0.4s ease !important;

        }

        html,
        body,
        header,
        .view {
            height: 100vh;
        }

        /* Your custom styles */
        .header {
            position: fixed;
            top: 0;
            z-index: 1;
            width: 100%;
        }

        /* The progress container (grey background) */
        .progress-container {
            width: 100%;
            height: 10px;

        }

        /* The progress bar (scroll indicator) */
        .progress-bar {
            height: 10px;
            background: #880E4F;
            width: 0%;
        }


        #myBtn {

            /* Hidden by default */
            position: fixed;
            /* Fixed/sticky position */
            bottom: 20px;
            /* Place the button at the bottom of the page */
            right: 30px;
            /* Place the button 30px from the right */
            z-index: 99;
            /* Make sure it does not overlap */
            border: none;
        }

        #blue {
            color: #1976D2;
        }

        #modhead {
            background-color: #880E4F;
        }

        #modhead2 {
            background-color: #FFBB33;
        }

        #head {
            color: #880E4F;
        }

        .mcolor {
            color: #880E4F;
        }

        .somecolor {
            background: #880E4F !important;
        }

        .btn-outline-somecolor {
            border: 3px solid #880E4F;
            background: transparent;
        }
    </style>

</head>

<body class="medical-lp">

    <!--Navigation & Intro-->
    <main class="smooth-scroll" id="top">

        <!--Navbar-->
        <nav id="nav" class="navbar navbar-expand fixed-top scrolling-navbar navbar-dark">
            <div class="container">
                <span id="brandanime" class="animated tada"><a id="sizeinc" class="navbar-brand font-weight-bold" href="#"><strong id="brand" class="mcolor font-weight-bold">Assistance</strong></a></span>
                <button class="navbar-toggler" type="button" data-toggles="cosllapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!--Links-->
                    <ul class="navbar-nav ml-auto smooth-scroll">
                        <li class="nav-item font-weight-bold">
                            <a class="nav-link" href="#about">About <span class="hide">us</span></a>
                        </li>
                        <li class="nav-item font-weight-bold">
                            <a class="nav-link" href="#contact">Contact <span class="hide">us</span></a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <div class="header">
            <div class="progress-container mt-5 pt-1">
                <div class="progress-bar" id="myBar"></div>
            </div>
        </div>


        <!--Intro Section-->
        <section class="view" style="background-image: url('https://mdbootstrap.com/img/Photos/Others/images/37.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
            <div class="mask">
                <div class="container h-100 d-flex justify-content-center align-items-center">
                    <div class="row pt-5 mt-3">
                        <div class="col-12 col-md-6 text-center text-md-left">
                            <div class="white-text">
                                <h1 id="head" class="h1-responsive font-weight-bold mt-md-5 mt-0 wow fadeInLeft text-capitalize" data-wow-delay="0.3s"></h1>
                                <hr class="hr-light wow fadeInLeft" data-wow-delay="0.3s">
                                <p class="wow fadeInLeft mb-3 font-weight-bold text-capitalize" data-wow-delay="0.3s">Covid19 Remote assistance system is a customizable, comprehensive, and integrated Hospital Management System designed to manage all hospital operations.
                                </p>
                                <br>
                                <a data-called="Doctor" id="doc" onclick="changeme1()" data-toggle="modal" data-target="#modalSubscriptionForm" class="btn btn-unique btn-rounded font-weight-bold ml-lg-0 wow fadeInLeft" data-wow-delay="0.3s">Doctor Login</a>
                                <a data-called="Personnel" id="per" onclick="changeme()" data-toggle="modal" data-target="#modalSubscriptionForm" class="btn btn-outline-warning btn-rounded font-weight-bold wow fadeInLeft" data-wow-delay="0.3s">Personnel Login

                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div>
            <a href="#top" id="myBtn" class="btn btn-floating btn-pink"><i class="fas fa-arrow-up"></i></a>
        </div>


        <div class="modal fade" id="modalSubscriptionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center somecolor">
                        <h4 class="modal-title w-100 font-weight-bold text-white animated bounce">Login<</h4> <button type="button" class="close text-white font-weight-bold" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                    </div>
                    <form id="doctorform" method="POST" action="inc/welcomedoctor.php" data-form="doctor">
                        <div class="modal-body mx-3">

                            <div class="md-form mb-5">
                                <i class="fas fa-envelope prefix "></i>
                                <input type="text" id="defaultForm-email" class="form-control" name="emailuser" required autocomplete="off">
                                <label class="font-weight-bold" for="defaultForm-email">Your email/username</label>
                            </div>

                            <div class="md-form mb-4">
                                <i class="fas fa-lock prefix"></i>
                                <input type="password" id="defaultForm-pass" class="form-control" name="pass" required autocomplete="off">
                                <label class="font-weight-bold" for="defaultForm-pass">Your password</label>
                            </div>

                        </div>
                        <a class="btn btn-danger d-none" onclick="toastr.error('Hi! I am error message.');">Error message</a>

                        <div class="modal-footer d-flex justify-content-center">
                            <button id="docbut" type="submit" class="btn btn-lg btn-rounded waves-effect waves-light somecolor text-white font-weight-bold me"><i class="fas fa-sign-in-alt mr-2"></i>Login</button>
                            <button data-dismiss="modal" class="btn btn-lg btn-rounded waves-effect font-weight-bold btn-outline-somecolor">Close</button>
                        </div>
                    </form>
                    <form id="personnelform" method="POST" action="inc/welcomepersonnel.php" data-form="personnel">
                        <div class="modal-body mx-3">

                            <div class="md-form mb-5">
                                <i class="fas fa-envelope prefix "></i>
                                <input type="text" id="form-email" class="form-control" name="emailuser" required autocomplete="off">
                                <label class="font-weight-bold" for="form-email">Your email/username</label>
                            </div>

                            <div class="md-form mb-4">
                                <i class="fas fa-lock prefix"></i>
                                <input type="password" id="form-pass" class="form-control" name="pass" required autocomplete="off">
                                <label class="font-weight-bold" for="form-pass">Your password</label>
                            </div>


                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button id="perbut" type="submit" class="btn btn-lg btn-rounded waves-effect waves-light somecolor text-white font-weight-bold me"><i class="fas fa-sign-in-alt mr-2"></i>Login</button>
                            <button data-dismiss="modal" class="btn btn-lg btn-rounded waves-effect font-weight-bold btn-outline-warning">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Button trigger modal-->

        <!--Modal: modalConfirmDelete-->
        <div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
                <!--Content-->
                <div class="modal-content text-center">
                    <!--Header-->
                    <div class="modal-header d-flex justify-content-center">
                        <p class="heading lead font-weight-bold">Please Check Email/password</p>
                    </div>

                    <!--Body-->
                    <div class="modal-body">

                        <i class="fas fa-times fa-4x animated rotateIn"></i>

                    </div>

                    <!--Footer-->
                    <div class="modal-footer flex-center mt-2">

                        <a type="button" class="btn btn-danger waves-effect btn-rounded btn-md" data-dismiss="modal">Close</a>
                    </div>
                </div>
                <!--/.Content-->
            </div>
        </div>

        <div class="modal fade" id="failmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
                <!--Content-->
                <div class="modal-content text-center">
                    <!--Header-->
                    <div class="modal-header d-flex justify-content-center">
                        <p class="heading lead font-weight-bold">Failed To Send SOS Message.</p>
                    </div>

                    <!--Body-->
                    <div class="modal-body">

                        <i class="fas fa-times fa-4x animated rotateIn"></i>

                    </div>

                    <!--Footer-->
                    <div class="modal-footer flex-center">

                        <a type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</a>
                    </div>

                </div>
                <!--/.Content-->
            </div>
        </div>


        <!--Modal: modalConfirmDelete-->
        <div class="modal fade" id="successmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-notify modal-success" role="document">
                <!--Content-->
                <div class="modal-content text-center">
                    <!--Header-->
                    <div class="modal-header d-flex justify-content-center">
                        <p class="heading font-weight-bold text-capitalize ">Your SOS Message has been sent!</p>
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
        <!--Modal: modalConfirmDelete-->
        <!--Modal: modalConfirmDelete-->




    </main>


    <div class="container-fluid">

        <!--Grid row-->
        <div class="row my-5">

            <!--Grid column-->
            <div class="col-md-12">

                <!--Tiles blog-->
                <div>
                    <!--First row-->
                    <div class="row">
                        <!--First column-->
                        <div class="col-xl-3 col-sm-6 px-0">
                            <!--Single blog post-->
                            <div class="waves-effect waves-light">
                                <!--Blog post link-->
                                <a href="#!">
                                    <!--Image-->
                                    <div class="view overlay h-25">

                                        <img src="https://mdbootstrap.com/img/Photos/Others/images/40.jpg" class="img-fluid" alt="">
                                        <div class="mask flex-center rgba-blue-strong">
                                            <h4 class="white-text font-weight-bold">Compassion</h4>
                                        </div>
                                    </div>
                                    <!--/Image-->
                                </a>
                                <!--Blog post link-->

                            </div>
                            <!--/Single blog post-->
                        </div>
                        <!--/First column-->

                        <!--Second column-->
                        <div class="col-xl-3 col-sm-6 px-0">
                            <!--Single blog post-->
                            <div class="waves-effect waves-light">
                                <!--Blog post link-->
                                <a href="#!">
                                    <!--Image-->
                                    <div class="view overlay h-25">

                                        <img src="https://mdbootstrap.com/img/Photos/Others/images/39.jpg" class="img-fluid" alt="">

                                        <div class="mask flex-center rgba-blue-strong">
                                            <h4 class="white-text font-weight-bold">Competence</h4>
                                        </div>
                                    </div>
                                    <!--/Image-->
                                </a>
                                <!--Blog post link-->

                            </div>
                            <!--/Single blog post-->
                        </div>
                        <!--/Second column-->

                        <!--Third column-->
                        <div class="col-xl-3 col-sm-6 px-0">
                            <!--Single blog post-->
                            <div class="waves-effect waves-light">
                                <!--Blog post link-->
                                <a href="#!">
                                    <!--Image-->
                                    <div class="view overlay h-25">

                                        <img src="https://mdbootstrap.com/img/Photos/Others/images/38.jpg" class="img-fluid" alt="">

                                        <div class="mask flex-center rgba-blue-strong">
                                            <h4 class="white-text font-weight-bold">Commitment</h4>
                                        </div>
                                    </div>
                                    <!--/Image-->
                                </a>
                                <!--Blog post link-->

                            </div>
                            <!--/Single blog post-->
                        </div>
                        <!--/Third column-->

                        <!--Fourth column-->
                        <div class="col-xl-3 col-sm-6 px-0">
                            <!--Single blog post-->
                            <div class="waves-effect waves-light">
                                <!--Blog post link-->
                                <a href="#!">
                                    <!--Image-->
                                    <div class="view overlay h-25">

                                        <img src="https://mdbootstrap.com/img/Photos/Others/images/41.jpg" class="img-fluid" alt="">

                                        <div class="mask flex-center rgba-blue-strong">
                                            <h4 class="white-text font-weight-bold">Courage</h4>
                                        </div>
                                    </div>
                                    <!--/Image-->
                                </a>
                                <!--Blog post link-->
                            </div>
                            <!--/Single blog post-->
                        </div>
                        <!--/Fourth column-->
                    </div>
                    <!--/First row-->

                </div>

            </div>
            <!--/Grid column-->

        </div>
        <!--/Grid row-->

    </div>


    <div class="container-fluid grey lighten-3">
        <div class="container">


            <!--Section: About-->
            <section id="about" class="info-section position-relative smooth-scroll">

                <!--First row-->
                <div class="row">

                    <!--First column-->
                    <div class="col-md-7 smooth-scroll wow fadeIn pt-3 mt-4 take" data-wow-delay="0.2s">
                        <br><br><br>
                        <!--Heading-->
                        <h2 id="blue" class="mb-3 font-weight-bold text-md-left text-center"><i>Features</i></h2>
                        <!--Description-->
                        <h4 class="mb-5 dark-grey-text"></h4>
                        <!--Content-->
                        <p><i class="fas fa-caret-right fa-2x mr-2"></i><span class="black-text text-capitalize font-weight-bold h3">Identify and maintain a patient record.</span></p>

                        <p class="mt-4"><i class="fas fa-caret-right fa-2x mr-2"></i><span class="black-text text-capitalize font-weight-bold h3">Manage medication list.</span></p>

                        <p class="mt-4"><i class="fas fa-caret-right fa-2x mr-2"></i><span class="black-text text-capitalize font-weight-bold h3">Manage patient history.</span></p>

                        <p class="mt-4"><i class="fas fa-caret-right fa-2x mr-2"></i><span class="black-text text-capitalize font-weight-bold h3">immediate response.</span></p>

                        <p class="mt-4"><i class="fas fa-caret-right fa-2x mr-2"></i><span class="black-text text-capitalize font-weight-bold h3">Timely Patient Care.</span></p>

                        <p class="mt-4"><i class="fas fa-caret-right fa-2x mr-2"></i><span class="black-text text-capitalize font-weight-bold h3">Secured information.</span></p>




                        <br>
                        <!--Button-->
                        <div class="text-md-left text-center ">
                            <a id="contact-btn" href="#contact" class="btn btn-rounded btn-blue mb-4 waves-effect font-weight-bold">Contact Us Now</a>
                        </div>




                    </div>
                    <!--/First column-->

                    <!--Second column-->
                    <div class="give col-lg-4 flex-center ml-lg-auto col-md-5 wow fadeIn view zoom overlay mt-md-0 mt-5 mb-md-0 mb-5" data-wow-delay="0.3s">

                        <img src="img/covid_medium.jpg" class="img-fluid z-depth-1-half ">

                    </div>
                    <!--/Second column-->

                </div>
                <!--/First row-->

            </section>
        </div>
        <!--Section: About-->
    </div>


    <!--Streak-->
    <div class="streak streak-photo streak-lg" style="background-image: url('https://mdbootstrap.com/img/Others/doctor.jpg');">
        <div class="flex-center mask rgba-black-slight">
            <div class="container text-center white-text">
                <h3 class="text-center text-white text-uppercase font-weight-bold mt-5 mb-5 wow fadeIn" data-wow-delay="0.2s">Access and Maintain information from anywhere</h3>

                <!--First row-->
                <div class="row text-white text-center wow fadeIn mt-2 pt-2 flex-center" data-wow-delay="0.2s">

                    <!--First column-->
                    <?php
                    if ($confirmed != "") {
                    ?>

                        <div class="col-md-3 mt-2">
                            <h1 class="white-text font-weight-bold">
                                <?php echo $confirmed; ?>
                            </h1>
                            <p class="font-weight-bold">Confirmed
                            </p>
                        </div>
                    <?php
                    }
                    ?>
                    <!--/First column-->

                    <!--Second column-->
                    <?php
                    if ($cured != "") {
                    ?>
                        <div class="col-md-3 mt-2">
                            <h1 class="white-text font-weight-bold">
                                <?php echo $cured; ?></h1>
                            <p class="font-weight-bold">Recovered</p>
                        </div>
                    <?php
                    }
                    ?>
                    <!--/Second column-->

                    <!--Third column-->
                    <?php
                    if ($dead != "") {
                    ?>

                        <div class="col-md-3 mt-2">
                            <h1 class="white-text font-weight-bold"><?php echo $dead; ?></h1>
                            <p class="font-weight-bold">Deaths
                            </p>
                        </div>
                    <?php
                    }
                    ?>
                    <!--/Third column-->


                </div>
                <!--/First row-->

            </div>
        </div>
    </div>
    <!--/Streak-->

    <div class="container-fluid grey lighten-3">
        <div class="container">


            <!--Section: About-->
            <section class="info-section position-relative">

                <!--First row-->
                <div class="row">

                    <!--First column-->
                    <div class="col-md-7 smooth-scroll wow fadeIn pt-5 mt-5 take" data-wow-delay="0.2s">
                        <br>
                        <br>
                        <!--Heading-->
                        <h2 id="prec" class="mb-3 font-weight-bold text-md-left text-center blue-text"><i>Precautions</i></h2>
                        <!--Description-->
                        <h4 class="mb-5 dark-grey-text"></h4>
                        <!--Content-->
                        <p><i class="fas fa-caret-right fa-2x mr-2"></i><span class="black-text text-capitalize font-weight-bold h3">STAY home.</span></p>

                        <p class="mt-4"><i class="fas fa-caret-right fa-2x mr-2"></i><span class="black-text text-capitalize font-weight-bold h3">KEEP a safe distance.</span></p>

                        <p class="mt-4"><i class="fas fa-caret-right fa-2x mr-2"></i><span class="black-text text-capitalize font-weight-bold h3">WASH hands often.</span></p>

                        <p class="mt-4"><i class="fas fa-caret-right fa-2x mr-2"></i><span class="black-text text-capitalize font-weight-bold h3">COVER your cough.</span></p>

                        <p class="mt-4"><i class="fas fa-caret-right fa-2x mr-2"></i><span class="black-text text-capitalize font-weight-bold h3">SICK? Write to us or Call the helpline.</span></p>




                        <br>
                        <!--Button-->
                        <div class="text-md-left text-center mt-2">
                            <a id="clickme" href="#contact" class="btn btn-rounded btn-blue mb-4 waves-effect font-weight-bold">Contact Us Now</a>
                        </div>




                    </div>
                    <!--/First column-->

                    <!--Second column-->
                    <div class="give col-lg-4 flex-center ml-lg-auto col-md-5 wow fadeIn view zoom overlay mt-md-0 mt-5 mb-md-0 mb-5" data-wow-delay="0.3s">

                        <img src="img/bg10.jpg" class="img-fluid z-depth-1-half ">

                    </div>
                    <!--/Second column-->

                </div>
                <!--/First row-->

            </section>
        </div>
        <!--Section: About-->
    </div>
    <hr class="hr-dark grey lighten-3 m-0 p-0">

    <div id="contact" class="container-fluid grey lighten-3 py-5 smooth-scroll">

        <div class="container">


            <section class="contact-section my-5 ">

                <!-- Form with header -->
                <div class="card hoverable">

                    <!-- Grid row -->
                    <div class="row">

                        <!-- Grid column -->
                        <div class="col-lg-8">

                            <div class="card-body form">

                                <!-- Header -->
                                <h4 id="dark-color-text" class="mt-4 text-capitalize pink-text font-weight-bold"><i class="fas fa-envelope pr-2"></i>Write to us for immediate assistance:</h4>

                                <!-- Grid row -->
                                <form method="POST" action="inc/query.php" name="form">

                                    <div class="row">


                                        <!-- Grid column -->
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <input type="text" id="form-contact-name" class="form-control" name="name" required>
                                                <input type="hidden" id="form-contact-name" class="form-control" value="1" name="check">
                                                <label for="form-contact-name" class="">Your name</label>
                                            </div>
                                        </div>
                                        <!-- Grid column -->

                                        <!-- Grid column -->
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <input type="email" id="form-contact-email" class="form-control" name="email" required>
                                                <label for="form-contact-email" class="">Your email</label>
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
                                                <input type="text" id="form-contact-phone" maxlength="10" class="form-control" name="phone" pattern="^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$" required>
                                                <label for="form-contact-phone" class="">Your phone (+91)</label>
                                            </div>
                                        </div>
                                        <!-- Grid column -->

                                        <!-- Grid column -->
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <input type="text" id="form-contact-company" class="form-control" name="loc" required>
                                                <label for="form-contact-company" class="">Your Location</label>
                                            </div>
                                        </div>
                                        <!-- Grid column -->

                                    </div>
                                    <!-- Grid row -->

                                    <!-- Grid row -->
                                    <div class="row">

                                        <!-- Grid column -->
                                        <div class="col-md-12">
                                            <div class="md-form mb-0">
                                                <textarea name="message" type="text" id="form-contact-message" class="form-control md-textarea" rows="3" required></textarea>
                                                <label for="form-contact-message">Your message</label>
                                                <button id="subbut" type="submit" class="btn btn-floating pink d-flex align-items-center justify-content-center "><i id="querybut" class="far fa-paper-plane"></i></button>
                                            </div>
                                        </div>
                                        <!-- Grid column -->

                                    </div>
                                    <!-- Grid row -->
                                </form>

                            </div>

                        </div>


                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-lg-4">

                            <div id="dark-color" class="card-body contact text-center h-100 white-text">
                                <div class="text-center">
                                    <h3 class="my-4 pb-2">Contact information</h3>
                                </div>

                                <ul class="text-lg-center text-center list-unstyled ml-lg-0 ml-0">
                                    <li class="ml-lg-0 ml-1">
                                        <p><i class="fas fa-map-marker-alt pr-2 white-text"></i>Karnataka Helpline</p>
                                    </li>
                                    <li class="mr-lg-3 mr-3">
                                        <p><i class="fas fa-phone pr-2 white-text"></i>080-46848600
                                        </p>
                                    </li>
                                    <li>
                                        <p><i class="fas fa-envelope pr-2 white-text"></i>ncov2019@gov.in</p>
                                    </li>
                                </ul>
                                <hr class="hr-light my-4">
                                <ul class="list-inline text-center list-unstyled">
                                    <li class="list-inline-item">
                                        <a class="p2 fa-lg tw-ic">
                                            <i class="fab fa-twitter white-text"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="p2 fa-lg li-ic">
                                            <i class="fab fa-linkedin-in white-text"> </i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="p2 fa-lg ins-ic">
                                            <i class="fab fa-instagram white-text"> </i>
                                        </a>
                                    </li>
                                </ul>

                            </div>

                        </div>
                        <!-- Grid column -->

                    </div>
                    <!-- Grid row -->

                </div>
                <!-- Form with header -->

            </section>
            <!-- Section: Contact v.3 -->
        </div>
    </div>



    <!-- Footer -->
    <div class="w-100">


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
                        <a class="btn-floating btn-li mx-1">
                            <i class="fab fa-linkedin-in"> </i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn-floating btn-dribbble mx-1">
                            <i class="fab fa-dribbble"> </i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn-floating mx-1 btn-ins">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn-floating mx-1 btn-git">
                            <i class="fab fa-github"></i>
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
    </div>
    <!-- Footer -->

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script type="text/javascript" src="js/core.js"></script>
    <script type="text/javascript" src="js/react.js"></script>
    <script src="mdb.min.js"></script>

    <script>
        let width = $(window).width();
        let height = $(window).height();

        if (width < 400) {

            $(".hide").hide();
        } else {
            $(".hide").show();
        }

        if (height < 700) {

            $(".give").addClass("pt-5 mt-5");
            $(".take").addClass("pb-5 mb-5 pt-0 mt-0");
        } else {
            $(".give").removeClass("pt-5 mt-5");
            $(".take").removeClass("pb-5 mb-5 pt-0 mt-0");
        }


        $("#myBtn").hide()

        $(document).scroll(function() {
            if ($(window).scrollTop() > 100) {
                $("#myBtn").fadeIn()
            } else {
                $("#myBtn").fadeOut('slow')
            }
        })




        <?php
        if ($error != "") {
        ?>

            $("#modalConfirmDelete").modal("show");
            setTimeout(function() {
                $("#modalConfirmDelete").modal("hide");
            }, 2000);

            $("#modalConfirmDelete").on('hide.bs.modal', function() {
                window.location.href = "index.php";

            });

        <?php

        }

        ?>



        <?php
        if ($done != "") {
        ?>
            $("#successmodal").modal("show");
            setTimeout(function() {
                $("#successmodal").modal("hide");
            }, 2000);
            $("#successmodal").on('hide.bs.modal', function() {
                window.location.href = "index.php";
            });
        <?php
        }



        ?>


        <?php
        if ($fail != "") {
        ?>
            $("#failmodal").modal("show");
            setTimeout(function() {
                $("#failmodal").modal("hide");
            }, 2000);
            $("#failmodal").on('hide.bs.modal', function() {
                window.location.href = "index.php";
            });
        <?php
        }



        ?>


        $("#contact-btn").hover(function() {

            $("#blue").addClass("pink-text");

        }, function() {
            $("#blue").removeClass("pink-text");

        })



        $("#subbut").hover(function() {
            $(this).removeClass("pink");
            $(this).addClass("blue darken-3");
        }, function() {
            $(this).removeClass("blue darken-3");
            $(this).addClass("pink");
        })

        $("#clickme").hover(function() {
            $("#prec").removeClass("blue-text").addClass("pink-text")
            $(this).removeClass("btn-blue").addClass("btn-pink")
        }, function() {

            $("#prec").removeClass("pink-text").addClass("blue-text")
            $(this).removeClass("btn-pink").addClass("btn-blue")
        })



        $("#brandanime").hover(function() {
            $(this).addClass("infinite");
        }, function() {
            $(this).removeClass("infinite");
        })

        $("#myBtn").hover(function() {
            $(this).removeClass("pink");
            $(this).addClass("btn-blue");

        }, function() {
            $(this).removeClass("btn-blue");
            $(this).addClass("pink");
        })


        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            $("#brand").removeClass("mcolor").addClass("text-white")

        } else {
            $("#brand").removeClass("text-white").addClass("mcolor")

        }



        $('#modalSubscriptionForm').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var recipient = button.data('called')
            var recipient2 = button.data('dismiss')

            var modal = $(this)
            modal.find('.modal-title').html("<i class='fas fa-user-alt mr-2'></i>" + recipient + " Login")
            if (recipient == "Personnel") {
                modal.find("#doctorform").hide();
                modal.find("#personnelform").show();

                modal.find(".modal-header").removeClass("somecolor").addClass("yellow darken-3");
                modal.find(".modal-title").removeClass("text-white").addClass("text-dark");
                modal.find(".me").removeClass("somecolor").addClass("btn-yellow").removeClass("text-white").addClass("text-dark");

            } else {
                modal.find("#personnelform").hide();
                modal.find("#doctorform").show();
                modal.find(".modal-header").removeClass("yellow darken-3").addClass("somecolor");
                modal.find(".modal-title").removeClass("text-dark").addClass("text-white");
                modal.find(".me").removeClass("btn-yellow").addClass("somecolor").removeClass("text-dark").addClass("text-white");
            }



        });

        new WOW().init();
        var app = document.getElementById('head');
        const typewriter = new Typewriter(app, {
            loop: true
        });


        typewriter.pauseFor(700).typeString('Covid19 Assistance.')

            .deleteAll()
            .typeString('Write To Us for Immediate Assitance.')
            .start();

        $(document).scroll(function() {
            if ($(window).width() > 991) {

                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    $("#brand").removeClass("mcolor").addClass("text-white")

                } else {
                    $("#brand").removeClass("text-white").addClass("mcolor")
                }
            }


        })

        if ($(window).width() < 991) {
            $("#brand").removeClass("mcolor").addClass("text-white")
        } else {
            $("#brand").removeClass("text-white").addClass("mcolor")
        }


        $(window).resize(function() {
            if ($(window).width() < 991) {
                $("#brand").removeClass("mcolor").addClass("text-white")
            } else {
                $("#brand").removeClass("text-white").addClass("mcolor")
            }
        })
        $(document).ready(function() {
            if (document.body.scrollTop > 40 || document.documentElement.scrollTop > 40) {

                $(".brandas").removeClass("text-dark");
                $(".brandas").addClass("text-white");

            } else {
                $(".brandas").removeClass("text-white");
                $(".brandas").addClass("text-dark");

            }

        })
        window.onscroll = function() {
            myFunction()
        };

        function myFunction() {
            var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            var scrolled = (winScroll / height) * 100;
            document.getElementById("myBar").style.width = scrolled + "%";
        }
    </script>

</body>

</html>