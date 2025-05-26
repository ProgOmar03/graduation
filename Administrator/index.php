<?php
session_start();
include("../includes/config.php");

$A_ID = $_SESSION['A_Log'];
if (!$_SESSION['A_Log']) {
    echo '<script>document.location="../Admin_Login.php";</script>';
}

$sql3 = mysqli_query($dbConn, "SELECT * FROM events WHERE Status='Pending'");
$row3 = mysqli_num_rows($sql3);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JU Events Management System | Administration Area</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/icon.png" />

    <style>
        @font-face {
            font-family: myFirstFont;
            src: url(fonts/NotoKufiArabic-Regular.ttf);
        }

        body {
            font-family: myFirstFont;
        }

        .logout-button {
            display: inline-block;
            background: linear-gradient(135deg, #e66a15, #e66a15);
            color: #fff !important;
            padding: 15px 25px !important;
            border-radius: 50px;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            transition: 0.3s ease,
                transform 0.2s ease;
            box-shadow: 0 5px 15px rgba(192, 57, 43, 0.4);
        }

        .logout-button i {
            margin-right: 8px;
        }

        .logout-button:hover {
            background: linear-gradient(135deg, #e74c3c, rgb(231, 178, 6));
            box-shadow: 0 8px 20px rgba(231, 76, 60, 0.6);
            transform: translateY(-2px) scale(1.03);
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <span><img alt="image" class="img-circle" src="img/malek.svg" width="100%" /></span>
                        </div>
                        <div class="logo-element">JU Events</div>
                    </li>
                    <li class="active">
                        <a href="index.php"><i class="fa fa-th-large"></i> <span class="nav-label">Home</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-list"></i> <span class="nav-label">Categories</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="Add_New_Category.php">Add New Category</a></li>
                            <li><a href="View_Categories_List.php">View Categories List</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-list"></i> <span class="nav-label">Events</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="View_Events_List.php">View Events List</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary" href="#"><i class="fa fa-bars"></i></a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Welcome To JU Events Management System - Administration Portal</span>
                        </li>
                        <li>
                            <a href="#" onclick="confirmLogout()" class="logout-button" style="margin-top:10px; margin-bottom:10px">
                                <i class="fa fa-sign-out"></i> Logout
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="row">
                <div class="col-lg-12" style="background-color:#fff">
                    <div class="wrapper wrapper-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>JU Events Management System - Administration Portal</h5>
                                    </div>
                                    <div class="ibox-content">
                                        <div>
                                            <div class="feed-activity-list">
                                                <div class="feed-element">
                                                    <div class="media-body ">
                                                        <strong>
                                                            <center>
                                                                <h1><strong>Administrator Portal</strong></h1>
                                                                <br>
                                                                <img src="img/logo.png" width="20%" />
                                                            </center>
                                                        </strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="widget style1 lazur-bg" style="background-color:#e66a15">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <i class="fa fa-list fa-5x"></i>
                                            </div>
                                            <div class="col-xs-8 text-right">
                                                <a style="color:#000" href="View_Events_List.php">
                                                    <h3>Total (Pending) Events</h3>
                                                    <h2 class="font-bold"><?php echo $row3; ?></h2>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer">
                    <div>
                        <center>JU Events Management System © 2025. All Rights Reserved.</center>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ✅ SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- ✅ Confirm Logout Script -->
    <script>
        function confirmLogout() {
            Swal.fire({
                title: 'Are you sure you want to logout?',
                text: "You will be redirected to the login page.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e74c3c',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, logout',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'Logout.php';
                }
            });
        }
    </script>

    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="js/plugins/peity/jquery.peity.min.js"></script>
    <script src="js/demo/peity-demo.js"></script>
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="js/plugins/gritter/jquery.gritter.min.js"></script>
    <script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/demo/sparkline-demo.js"></script>
    <script src="js/plugins/chartJs/Chart.min.js"></script>
    <script src="js/plugins/toastr/toastr.min.js"></script>
</body>

</html>