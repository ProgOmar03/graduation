<?php
session_start();

include("../includes/config.php");


$A_ID = $_SESSION['A_Log'];

if (!$_SESSION['A_Log'])
    echo '<script language="JavaScript">
 document.location="../Admin_Login.php";
</script>';



?>
<!DOCTYPE html>
<html>

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>JU Events Management System | Administration Area</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/plugins/bootstrap/bootstrap.min.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">


    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/icon.png" />

    <style>
        @font-face {
            font-family: myFirstFont;
            src: url(fonts/NotoKufiArabic-Regular.ttf);
            font-size: 8px;
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
                        <div class="dropdown profile-element"> <span>
                                <img alt="image" class="img-circle" src="img/malek.svg" width="100%" />
                            </span>



                        </div>
                        <div class="logo-element">
                            JU Events Management System
                        </div>


                    </li>
                    <li class="">
                        <a href="index.php"><i class="fa fa-th-large"></i> <span class="nav-label">Home</span></a>

                    </li>





                    <li>
                        <a href="#"><i class="fa fa-list"></i> <span class="nav-label">Categories</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="Add_New_Category.php">Add New Category</a></li>

                            <li><a href="View_Categories_List.php">View Categories List</a></li>

                        </ul>
                    </li>









                    <li class="active">
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
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Welcome To JU Events Management System - Administration Portal </span>
                        </li>
                        <li class="dropdown">

                            <ul class="dropdown-menu dropdown-messages">


                                <li class="divider"></li>


                            </ul>
                        </li>



                        <li>
                            <a href="#" onclick="confirmLogout()" class="logout-button" style="margin-top:10px; margin-bottom:10px">
                                <i class="fa fa-sign-out"></i> Logout
                            </a>
                        </li>

                    </ul>

                </nav>
            </div>

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Events</h2>

                </div>
                <div class="col-lg-2">

                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>View Events List Information | <a href="Events_Charts.php" class="btn btn-primary">Events Charts</a>






                                </h5>
                                <div class="ibox-tools">



                                </div>
                            </div>





                            <div class="ibox-content">


                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example">
                                        <thead>
                                            <tr>


                                                <th>Category Name</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Student Name</th>
                                                <th>Contact Phone</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Location</th>
                                                <th>Status</th>
                                                <th>Add Date / Time</th>

                                                <th>Actions</th>



                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql1 = mysqli_query($dbConn, "select * from events order by ID DESC");
                                            while ($row1 = mysqli_fetch_array($sql1)) {

                                                $Event_ID = $row1['ID'];
                                                $Title = $row1['Title'];
                                                $Description = $row1['Description'];
                                                $Student_Name = $row1['Student_Name'];
                                                $Contact_Phone = $row1['Contact_Phone'];
                                                $Category_ID = $row1['Category_ID'];
                                                $Date = $row1['Date'];
                                                $Time = $row1['Time'];
                                                $Location = $row1['Location'];
                                                $Status = $row1['Status'];
                                                $Add_Date_Time = $row1['Add_Date_Time'];

                                                $sql2 = mysqli_query($dbConn, "select * from categories where ID='$Category_ID'");
                                                $row2 = mysqli_fetch_array($sql2);
                                                $Category_Name = $row2['Name'];





                                            ?>
                                                <tr class="grade">


                                                    <td><?php echo $Category_Name; ?></td>
                                                    <td><?php echo $Title; ?></td>
                                                    <td><?php echo $Description; ?></td>
                                                    <td><?php echo $Student_Name; ?></td>
                                                    <td><?php echo $Contact_Phone; ?></td>
                                                    <td><?php echo $Date; ?></td>
                                                    <td><?php echo $Time; ?></td>
                                                    <td><?php echo $Location; ?></td>
                                                    <td><?php echo $Status; ?></td>
                                                    <td><?php echo $Add_Date_Time; ?></td>


                                                    <td>
                                                        <center>

                                                            <a href="JavaScript:if(confirm('Are You Sure To Accept This Event ?')==true)
{location.replace('Accept_Event.php?Event_ID=<?php echo $Event_ID; ?>')}" class="btn btn-primary btn-sm" role="button">Accept</a>

                                                            <br><br>
                                                            <a href="JavaScript:if(confirm('Are You Sure To Reject This Event ?')==true)
{location.replace('Reject_Event.php?Event_ID=<?php echo $Event_ID; ?>')}" class="btn btn-primary btn-sm" role="button">Reject</a>


                                                            <br><br>
                                                            <a href="JavaScript:if(confirm('Are You Sure To Delete This Event ?')==true)
{location.replace('Delete_Event.php?Event_ID=<?php echo $Event_ID; ?>')}" class="btn btn-danger btn-sm" role="button">Delete</a>








                                                    </td>


                                                </tr>

                                            <?php
                                            }
                                            ?>

                                        </tbody>

                                    </table>
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




    </div>
    </div>

    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>

    <!-- Peity -->
    <script src="js/plugins/peity/jquery.peity.min.js"></script>
    <script src="js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Sparkline -->
    <script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="js/plugins/chartJs/Chart.min.js"></script>

    <!-- Toastr -->
    <script src="js/plugins/toastr/toastr.min.js"></script>



    <script src="js/plugins/jeditable/jquery.jeditable.js"></script>

    <script src="js/plugins/dataTables/datatables.min.js"></script>
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
    <script>
        $(document).ready(function() {
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [


                    {
                        extend: 'excel',
                        title: 'ExampleFile'
                    },
                    {
                        extend: 'pdf',
                        title: 'ExampleFile'
                    },

                    {
                        extend: 'print',
                        customize: function(win) {
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }

                ]

            });

            /* Init DataTables */
            var oTable = $('#editable').DataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable('example_ajax.php', {
                "callback": function(sValue, y) {
                    var aPos = oTable.fnGetPosition(this);
                    oTable.fnUpdate(sValue, aPos[0], aPos[1]);
                },
                "submitdata": function(value, settings) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition(this)[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            });


        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData([
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row"
            ]);

        }
    </script>
</body>

</html>