<?php
$db = mysqli_connect("localhost", "root", "", "covid") or die(mysqli_connect_error());
session_start();
if (count($_POST) != 0) {
    $emailuser = $_POST['emailuser'];
    $pass = $_POST['pass'];
    $emailuser = mysqli_real_escape_string($db, $emailuser);
    $pass = mysqli_real_escape_string($db, $pass);
    $query = "SELECT * FROM `logindoctor` WHERE `email`='$emailuser' OR `username`='$emailuser' AND `pass`='$pass';";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);
    if ($count == 0) {
        echo "not logged in";
        header("Location:../index.php?error=true");
        return false;
    }
    $_SESSION['email'] = $row['email'];
    $_SESSION['userdoc'] = $row['username'];
}
if ($_SESSION['email'] == "" || $_SESSION['userdoc'] == "") {
    header("Location:../index.php");
    session_unset();
    session_destroy();
}
$query = "SELECT * FROM `patientadd` ORDER BY `id` desc;";
$result = mysqli_query($db, $query);
$count = mysqli_num_rows($result);
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
    <link href="../css/addons/datatables.min.css" rel="stylesheet">
    <link href="../css/addons/datatables-select.min.css" rel="stylesheet">
    <link rel="stylesheet" href="mdb.min.css">
    <link rel="stylesheet" href="db1.css">
    <link rel="stylesheet" href="db2.css">


    <style>
        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;

        }

        #brandanime {
            font-size: 1.3em;
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

        .colornav {
            background: #263238;
            color: white;
        }

        .ml1 {
            font-weight: 900;
            font-size: 3.5em;
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

        .ml1 .line1 {
            top: 0;
        }

        .ml1 .line2 {
            bottom: 0;
        }



        #size {
            margin-top: 70px;
            overflow: auto;
        }


        /* Let's get this party started */
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

        html,
        body,
        header,
        .view {
            min-height: 90vh;
        }

        @media (max-width: 991px) {

            html,
            body,
            header,
            .view {
                min-height: 100vh;
            }
        }

        #cus-padding {
            padding-top: 160px;
            margin-bottom: 0;
        }

        html,
        body,
        header,
        .view1 {
            min-height: 90vh;
        }

        .animated-icon1,
        .animated-icon2,
        .animated-icon3 {
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

        .animated-icon1 span,
        .animated-icon2 span,
        .animated-icon3 span {
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

        .animated-icon2 span:nth-child(2),
        .animated-icon2 span:nth-child(3) {
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
$db = mysqli_connect("localhost", "root", "", "covid") or die(mysqli_connect_error());
$count = mysqli_num_rows($result);
if ($count > 0) {
?>

    <body class="heavy-rain-gradient medical-lp">
    <?php
} else {
    ?>

        <body class="cloudy-knoxville-gradient medical-lp">
        <?php
    }
        ?>
        <main>

            <nav class="navbar navbar-expand-md navbar-dark fixed-top scrolling-navbar">
                <div class="container d-flex justify-content-between">

                    <a id="brandanime" class="animated tada ml-md-0 ml-4" class="navbar-brand font-weight-bold lead ml-md-0 ml-5" href="#"><strong class="text-dark btn-change brandas">Assistance</strong></a>
                    <button class="navbar-toggler first-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent20" aria-expanded="false" aria-label="Toggle navigation">
                        <div class="animated-icon1"><span></span><span></span><span></span></div>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!--Links-->


                        <ul class="navbar-nav ml-auto smooth-scroll flex-center">
                            <li class="nav-item">
                                <span class="nav-link" data-offset="80"><span class="lead font-weight-bold text-capitalize text-dark btn-change brandas">Welcome <?php echo $_SESSION['userdoc']; ?></span></span>
                            </li>
                            <li class="nav-item ml-2">
                                <a id="logout-btn" href="../index.php?logout=1" class="btn btn-rounded btn-sm btn-yellow text-dark font-weight-bold">Logout</a>
                            </li>

                        </ul>


                    </div>
                </div>
            </nav>
            <?php
            $db = mysqli_connect("localhost", "root", "", "covid") or die(mysqli_connect_error());
            $count = mysqli_num_rows($result);
            if ($count > 0) {
            ?>

                <div id="size" class="view flex-center mb-5">

                    <div class="container overflow-auto">


                        <div class="row flex-center mb-5">
                            <h1 class="ml1">
                                <span class="text-wrapper">
                                    <span class="line line1"></span>
                                    <span class="letters">Patients</span>
                                    <span class="line line2"></span>
                                </span>
                            </h1>
                        </div>

                    <?php
                }

                $db = mysqli_connect("localhost", "root", "", "covid") or die(mysqli_connect_error());
                $count = mysqli_num_rows($result);
                if ($count > 0) {
                    ?>
                        <div class="font-weight-bold my-3 text-capitalize pink-text">
                            click on the patient to view information or suggest treatment to the personnel team.
                        </div>
                        <table id="table" class="table table-striped table-borderless table-hover table-responsive-xs table-active z-depth-1" cellspacing="0" width="100%">
                            <thead class="colornav">
                                <tr>
                                    <th colspan="2" class="th-sm">Name
                                    </th>
                                    <th colspan="2" class="th-sm">Age
                                    </th>
                                    <th colspan="2" class="th-sm">Location
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="font-weight-bold grey lighten-5">

                                <?php


                                while ($row = mysqli_fetch_array($result)) {

                                ?>


                                    <tr id="tr" class="font-weight-bold">
                                        <td colspan="2" class="font-weight-bold name"> <?php echo $row["name"]; ?> </td>
                                        <td colspan="2" class="font-weight-bold age"> <?php echo $row["age"]; ?> </td>
                                        <td colspan="2" class="font-weight-bold loc" style="word-break:break-word;"><?php echo $row["loc"]; ?> </td>
                                        <td colspan="2" class="font-weight-bold phone d-none"> <?php echo $row["phone"]; ?> </td>
                                        <td colspan="2" class="font-weight-bold m d-none"> <?php echo $row["medicine"]; ?> </td>
                                        <td colspan="2" class="font-weight-bold c d-none"> <?php echo $row["cond"]; ?> </td>
                                        <td colspan="2" class="font-weight-bold a d-none"> <?php echo $row["allergy"]; ?> </td>
                                        <td colspan="2" class="font-weight-bold e d-none"> <?php echo $row["emergency"]; ?> </td>
                                        <td colspan="2" class="font-weight-bold mh d-none"> <?php echo $row["mh"]; ?> </td>
                                        <td colspan="2" class="font-weight-bold dob d-none"> <?php echo $row["dob"]; ?> </td>
                                        <td colspan="2" class="font-weight-bold blood d-none"> <?php echo $row["blood"]; ?> </td>
                                    </tr>


                                <?php
                                }
                                ?>

                            </tbody>
                            <tfoot class="colornav">
                                <tr>
                                    <th colspan="2" class="th-sm">Name
                                    </th>
                                    <th colspan="2" class="th-sm">Age
                                    </th>
                                    <th colspan="2" class="th-sm">Location
                                    </th>


                                </tr>
                            </tfoot>

                        </table>
                    </div>

                </div>
            <?php
                } else {
            ?>

                <div id="cus-padding" class="container view1">


                    <div class="jumbotron card brown lighten-2 rounded hoverable">
                        <div class="text-black text-center py-5 px-4">

                            <div>

                                <h2 id="text-head" class=" h1 pt-1 mb-5 font-bold text-capitalize"><strong>There are no Patients to display right now.</strong></h2>

                                <a href="../index.php" logout=1" class="btn btn-yellow btn-rounded btn-md font-weight-bold text-dark animated bounce"><i class="fas fa-undo mr-2"></i>Back to Home page</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                }


            ?>






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
            <!-- Central Modal Small -->
            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                <!-- Change class .modal-sm to change the size of the modal -->
                <div class="modal-dialog modal-lg modal-notify modal-success" role="document">


                    <div class="modal-content">
                        <div class="modal-header d-flex align-items-center">
                            <div class="text-center mt-2 py-2 ml-lg-0 pl-lg-0 ml-md-5 pl-md-5 ml-sm-5 pl-sm-3 ml-5 pl-3 font-weight-bold">
                                <h1 class="lead font-weight-bold text-white" id="text"></h1>
                            </div>

                            <button type="button" class="close text-white waves-effect px-4 mr-2" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body ">
                            <div class="font-weight-bold mb-3">
                                <span class="dark-grey-text">Name:</span><span class="green-text" id="name"></span>

                            </div>

                            <div class="font-weight-bold mb-3">
                                <span class="dark-grey-text">Age:</span><span class="green-text" id="age"></span>

                            </div>
                            <div class="font-weight-bold mb-3">
                                <span class="dark-grey-text">Date of birth:</span><span class="green-text" id="dob"></span>

                            </div>
                            <div class="font-weight-bold mb-3">
                                <span class="dark-grey-text">Blood Group:</span><span class="green-text" id="blood"></span>

                            </div>
                            <div class="font-weight-bold mb-3">
                                <span class="dark-grey-text">Location:</span><span class="green-text" id="loc"></span>

                            </div>
                            <div class="font-weight-bold mb-3">
                                <span class="dark-grey-text">Phone:</span><span class="green-text" id="phone"></span>

                            </div>
                            <div class="font-weight-bold mb-3">
                                <span class="dark-grey-text">Condition:</span><span class="green-text" id="c"></span>

                            </div>
                            <div class="font-weight-bold mb-3">
                                <span class="dark-grey-text">Medicine Given:</span><span class="green-text" id="m"></span>

                            </div>
                            <div class="font-weight-bold mb-3">
                                <span class="dark-grey-text">Allergies:</span><span class="green-text" id="a"></span>

                            </div>
                            <div class="font-weight-bold mb-3">
                                <span class="dark-grey-text">Emergency Contact(s):</span><span class="green-text" id="e"></span>

                            </div>
                            <div class="font-weight-bold mb-3">
                                <span class="dark-grey-text">Medical History:</span><span class="green-text" id="mh"></span>

                            </div>
                            <div class="mt-5">
                                <div class="md-form mt-2">
                                    <i class="fas fa-pencil-alt prefix"></i>
                                    <textarea id="form10" class="md-textarea form-control textarea" rows="3" style="resize: none"></textarea>
                                    <label for="form10">Suggest Medication/Treatment for patient</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex d-md-block align-items-center justify-content-center text-right">
                            <button id="close" type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                            <button id="save" type="button" class="btn btn-success btn-sm 5">Send</button>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Central Modal Small -->


            <!--Modal: modalConfirmDelete-->
            <div class="modal fade" id="successmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm modal-notify modal-success" role="document">
                    <!--Content-->
                    <div class="modal-content text-center">
                        <!--Header-->
                        <div class="modal-header d-flex justify-content-center font-weight-bold">
                            <p class="heading text-capitalize">Instructions have been sent to personnel team</p>
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
            <div class="modal fade" id="failmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                            <a type="button" class="btn btn-rounded  btn-danger waves-effect" data-dismiss="modal">OK</a>
                        </div>
                    </div>
                    <!--/.Content-->
                </div>
            </div>
            <!-- Button trigger modal-->


            <!-- Modal: modalAbandonedCart-->
            <!-- Button trigger modal -->



            <!-- Modal: modalAbandonedCart-->


            <!--Modal: modalConfirmDelete-->
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
        <script src="../js/addons/datatables-select.min.js" type="text/javascript"></script>
        <script src="../js/addons/datatables.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="../js/core.js"></script>
        <script type="text/javascript" src="../js/react.js"></script>

        <script src="../app.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
        <script src="mdb.min.js"></script>
        <!-- <script src="db1.js"></script>
    <script src="db2.js"></script> -->


        <script>
            $(document).ready(function() {
                $('.first-button').on('click', function() {

                    $('.animated-icon1').toggleClass('open');
                });
                $('.second-button').on('click', function() {

                    $('.animated-icon2').toggleClass('open');
                });
                $('.third-button').on('click', function() {

                    $('.animated-icon3').toggleClass('open');
                });
            });


            $(document).ready(function() {
                $('#table').DataTable();
                $('.dataTables_length').addClass('bs-select');
            });


            $("#table #tr").click(function() {
                var name = $(this).find(".name").text()
                let age = $(this).find(".age").text()
                let loc = $(this).find(".loc").text()
                let phone = $(this).find(".phone").text()
                let a = $(this).find(".a").html()

                let e = $(this).find(".e").text()
                let m = $(this).find(".m").text()
                m = $.trim(m)

                if (m.length == 0) {
                    m = " None";
                }
                let c = $(this).find(".c").text()
                let mh = $(this).find(".mh").text()
                let dob = $(this).find(".dob").text()
                let blood = $(this).find(".blood").text()

                $("#modal").modal('show')
                $("#modal").find("#text").html("Showing details for " + name)
                $("#modal").find("#name").text(name)
                $("#modal").find("#age").text(age)
                $("#modal").find("#loc").text(loc)
                $("#modal").find("#phone").text(phone)
                $("#modal").find("#e").text(e)
                $("#modal").find("#m").text(" " + m)
                $("#modal").find("#c").text(c)
                $("#modal").find("#mh").text(mh)
                $("#modal").find("#a").text(a)
                $("#modal").find("#dob").text(dob)
                $("#modal").find("#blood").text(blood)

            })



            $("#save").click(function() {
                let input = $("#modal").find(".textarea").val()
                let name = $("#modal").find("#name").text()
                let age = $("#modal").find("#age").text()

                if (input) {


                    $.ajax({
                        type: "POST",
                        url: "treatment.php",
                        data: {
                            "input": input,
                            "name": name,
                            "age": age
                        },
                        cache: false,
                        success: function(data) {
                            if (data === "1") {
                                $("#modal").modal("hide");
                                $('#form10').val('');
                                $("#successmodal").modal("show");
                                setTimeout(function() {
                                    $("#successmodal").modal("hide");
                                }, 2000)


                            } else {
                                $("#modal").modal("hide");
                                $("#failmodal").modal("show");
                                setTimeout(function() {
                                    $("#failmodal").modal("hide");
                                }, 2000)


                            }
                        },
                        failure: function() {
                            $("#modal").modal("hide");
                            $("#failmodal").modal("show");
                            setTimeout(function() {
                                $("#failmodal").modal("hide");
                            }, 2000)
                        }
                    });
                } else {
                    toastr["error"]("Please Enter the instructions to Send or Close the window")
                }

            })

            $("#close").click(function() {
                $('#form10').val('');
            })



            $(".hov").hover(function() {
                $(this).removeClass("grey");
                $(this).addClass("pink");
            }, function() {
                $(this).removeClass("pink");
                $(this).addClass("grey");
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


            $(document).scroll(function() {
                if ($(window).outerWidth() > 1000) {
                    if (document.body.scrollTop > 40 || document.documentElement.scrollTop > 40) {

                        $(".brandas").removeClass("text-dark");
                        $(".brandas").addClass("text-white");

                    } else {
                        $(".brandas").removeClass("text-white");
                        $(".brandas").addClass("text-dark");

                    }
                }
            })
            $(document).ready(function() {
                if ($(window).outerWidth() < 1000) {

                    $(".brandas").removeClass("text-dark");
                    $(".brandas").addClass("text-white");

                } else {
                    $(".brandas").removeClass("text-white");
                    $(".brandas").addClass("text-dark");

                }
            })

            $(window).resize(function() {
                if ($(window).outerWidth() < 1000) {

                    $(".brandas").removeClass("text-dark");
                    $(".brandas").addClass("text-white");

                } else {
                    $(".brandas").removeClass("text-white");
                    $(".brandas").addClass("text-dark");

                }
            })

            // Wrap every letter in a span
            // Wrap every letter in a span
            var textWrapper = document.querySelector('.ml1 .letters');
            textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

            anime.timeline({
                    loop: true
                })
                .add({
                    targets: '.ml1 .letter',
                    scale: [0.3, 1],
                    opacity: [0, 1],
                    translateZ: 0,
                    easing: "easeOutExpo",
                    duration: 600,
                    delay: (el, i) => 70 * (i + 1)
                }).add({
                    targets: '.ml1 .line',
                    scaleX: [0, 1],
                    opacity: [0.5, 1],
                    easing: "easeOutExpo",
                    duration: 700,
                    offset: '-=875',
                    delay: (el, i, l) => 80 * (l - i)
                }).add({
                    targets: '.ml1',
                    opacity: 0,
                    duration: 1000,
                    easing: "easeOutExpo",
                    delay: 1000
                });
            $("#brandanime").hover(function() {
                $(this).addClass("infinite");
            }, function() {
                $(this).removeClass("infinite");
            })
        </script>



        </body>

</html>