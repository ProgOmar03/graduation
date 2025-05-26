<?php
session_start();
include("includes/config.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>JU Events Management System | Students Area</title>

    <link href="Administrator/css/bootstrap.min.css" rel="stylesheet">
    <link href="Administrator/css/plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="Administrator/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="Administrator/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="Administrator/css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="Administrator/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    <link href="Administrator/css/animate.css" rel="stylesheet">
    <link href="Administrator/css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="Administrator/img/icon.png" />

    <style>
        @font-face {
            font-family: myFirstFont;
            src: url(Administrator/fonts/NotoKufiArabic-Regular.ttf);
            font-size: 8px;
        }

        body {
            font-family: myFirstFont;
        }
    </style>

    <script></script>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <span>
                                <img alt="image" class="img-circle" src="Administrator/img/malek.svg" width="100%" />
                            </span>
                        </div>
                        <div class="logo-element">
                            JU Events Management System
                        </div>
                    </li>
                    <li>
                        <a href="index.php"><i class="fa fa-th-large"></i> <span class="nav-label">Home</span></a>
                    </li>
                    <li class="active">
                        <a href="Students.php"><i class="fa fa-th-large"></i> <span class="nav-label">Students</span></a>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <ul class="nav navbar-top-links navbar-right">
                        <br>
                        <li>
                            <span class="m-r-sm text-muted welcome-message">
                                Welcome To JU Events Management System - Student Area
                            </span>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Events</h2>
                </div>
                <div class="col-lg-2"></div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>
                                    View Events List Information |
                                    <a href="Send_Event_Request.php" class="btn btn-primary">Send Event Request</a>
                                </h5>
                                <div class="ibox-tools"></div>
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql1 = mysqli_query($dbConn, "select * from events where Status='Accepted' order by ID DESC");
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
    <script src="Administrator/js/jquery-2.1.1.js"></script>
    <script src="Administrator/js/bootstrap.min.js"></script>
    <script src="Administrator/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="Administrator/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="Administrator/js/plugins/flot/jquery.flot.js"></script>
    <script src="Administrator/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="Administrator/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="Administrator/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="Administrator/js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="Administrator/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="Administrator/js/demo/peity-demo.js"></script>
    <script src="Administrator/js/inspinia.js"></script>
    <script src="Administrator/js/plugins/pace/pace.min.js"></script>
    <script src="Administrator/js/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="Administrator/js/plugins/gritter/jquery.gritter.min.js"></script>
    <script src="Administrator/js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="Administrator/js/demo/sparkline-demo.js"></script>
    <script src="Administrator/js/plugins/chartJs/Chart.min.js"></script>
    <script src="Administrator/js/plugins/toastr/toastr.min.js"></script>
    <script src="Administrator/js/plugins/jeditable/jquery.jeditable.js"></script>
    <script src="Administrator/js/plugins/dataTables/datatables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [{
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

            var oTable = $('#editable').DataTable();

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