<?php
session_start();
include("../includes/config.php");

$A_ID = $_SESSION['A_Log'];
if (!$A_ID) {
    echo '<script language="JavaScript">document.location="../Admin_Login.php";</script>';
    exit;
}

$Name = ''; // ✅ Initialize to avoid "Undefined variable" error

if (isset($_POST['Submit'])) {
    $Name = mysqli_real_escape_string($dbConn, $_POST['Name']);

    $sql1 = mysqli_query($dbConn, "SELECT * FROM categories WHERE Name='$Name'");
    if (mysqli_num_rows($sql1) > 0) {
        echo "<script>alert('Sorry! This Category Name already exists!');</script>";
    } else {
        $insert = mysqli_query($dbConn, "INSERT INTO categories (Name) VALUES ('$Name')");
        echo "<script>alert('New Category has been added successfully!');</script>";
        echo "<script>document.location='View_Categories_List.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>JU Events Management System | Administration Area</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
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
        <!-- Sidebar -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header text-center">
                        <img src="img/malek.svg" class="img-circle" width="100%" />
                        <div class="logo-element">JU Events Management System</div>
                    </li>
                    <li><a href="index.php"><i class="fa fa-th-large"></i> <span class="nav-label">Home</span></a></li>
                    <li class="active">
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

        <!-- Top Nav -->
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation">
                    <div class="navbar-header">
                        <a class="navbar-minimalize btn btn-primary" href="#"><i class="fa fa-bars"></i></a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li><span class="m-r-sm text-muted welcome-message">Welcome to JU EMS - Admin Portal</span></li>
                        <li>
                            <a href="#" onclick="confirmLogout()" class="logout-button" style="margin-top:10px; margin-bottom:10px">
                                <i class="fa fa-sign-out"></i> Logout
                            </a>


                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Page Header -->
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Categories</h2>
                </div>
            </div>

            <!-- Form Section -->
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Add New Category</h5>
                            </div>
                            <div class="ibox-content">
                                <form method="post" action="Add_New_Category.php" class="form-horizontal" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Name *</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="Name" class="form-control" style="width:40%" required value="<?php echo htmlspecialchars($Name); ?>">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <button class="btn btn-primary" type="submit" name="Submit">Add</button>
                                            <button class="btn btn-danger" type="reset" name="Reset">Clear</button>
                                        </div>
                                    </div>
                                </form>
                            </div> <!-- ibox-content -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer text-center">
                JU Events Management System © 2025. All Rights Reserved.
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    <script src="js/plugins/dataTables/datatables.min.js"></script>
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
</body>

</html>