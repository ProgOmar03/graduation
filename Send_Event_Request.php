<?php
session_start();

include("includes/config.php"); 

if(isset($_POST['Submit']))
{
$Category_ID = mysqli_real_escape_string($dbConn,$_POST['Category_ID']);
$Title = mysqli_real_escape_string($dbConn,$_POST['Title']);
$Description = mysqli_real_escape_string($dbConn,$_POST['Description']);
$Student_Name = mysqli_real_escape_string($dbConn,$_POST['Student_Name']);
$Contact_Phone = mysqli_real_escape_string($dbConn,$_POST['Contact_Phone']);
$Date = mysqli_real_escape_string($dbConn,$_POST['Date']);
$Time = mysqli_real_escape_string($dbConn,$_POST['Time']);
$Location = mysqli_real_escape_string($dbConn,$_POST['Location']);


$insert = mysqli_query($dbConn,"insert into events (Category_ID,Title,Description,Student_Name,Contact_Phone,Date,Time,Location,Status) 
values ('$Category_ID','$Title','$Description','$Student_Name','$Contact_Phone','$Date','$Time','$Location','Pending')");

echo "<script language='JavaScript'>
			  alert ('New Event Request Has Been Sent Successfully !');
      </script>";

	echo "<script language='JavaScript'>
document.location='Students.php';
        </script>";


}
?>
<!DOCTYPE html>
<html>

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>JU Events Management System | Administration Area</title>

   <link href="Administrator/css/bootstrap.min.css" rel="stylesheet">
	    <link href="Administrator/css/plugins/bootstrap/bootstrap.min.css" rel="stylesheet">

    <link href="Administrator/font-awesome/css/font-awesome.css" rel="stylesheet">
	    <link href="Administrator/css/plugins/dataTables/datatables.min.css" rel="stylesheet">


    <!-- Toastr style -->
    <link href="Administrator/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="Administrator/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="Administrator/css/animate.css" rel="stylesheet">
    <link href="Administrator/css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="Administrator/img/icon.png"/>
	
	<style>
@font-face {
   font-family: myFirstFont;
   src: url(fonts/NotoKufiArabic-Regular.ttf);
   font-size:8px;
}
body {
   font-family: myFirstFont;
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
                            <img alt="image" class="img-circle" src="Administrator/img/malek.svg" width="100%"/>
                             </span>
                        </div>
                        <div class="logo-element">
                         JU Events Management System
                        </div>
						
							
                    </li>
                    <li >
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
                    <span class="m-r-sm text-muted welcome-message">Welcome To JU Events Management System - Students Area</span>
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
                        <h5>Send Event Request </h5>
                        <div class="ibox-tools">
                        </div>
                    </div>
                          <div class="ibox-content">
                     <form method="post" action="Send_Event_Request.php" class="form-horizontal" enctype="multipart/form-data">
                                
								
								
	<div class="form-group"><label class="col-sm-2 control-label">Category *</label>

                                    <div class="col-sm-10">
									
									
		<select style="width:40%" name="Category_ID" id="Category_ID" class="form-control required" title="Category Name" required>
    <option disabled  selected value>Select Category Name</option>
    <?php
    $query22 = mysqli_query($dbConn, "SELECT * FROM categories");
    while ($row22 = mysqli_fetch_array($query22)) {
        echo '<option value="'.$row22['ID'].'">'.$row22['Name'].'</option>';
    }
    ?>
</select>								
									</div>
                                </div>
                                <div class="hr-line-dashed"></div>


								
								<div class="form-group"><label class="col-sm-2 control-label">Title *</label>

                                    <div class="col-sm-10"><input value=""  style="width:40%" type="text" name="Title" class="form-control" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>
								
								
								<div class="form-group"><label class="col-sm-2 control-label">Description *</label>

                                    <div class="col-sm-10"><input value=""  style="width:40%" type="text" name="Description" class="form-control" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>
								
								
									<div class="form-group"><label class="col-sm-2 control-label">Student Name *</label>

                                    <div class="col-sm-10"><input value=""  style="width:40%" type="text" name="Student_Name" class="form-control" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>
								
									<div class="form-group"><label class="col-sm-2 control-label">Contact Phone *</label>

                                    <div class="col-sm-10"><input value=""  style="width:40%" type="text" name="Contact_Phone" class="form-control" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>
								
							
							
										<div class="form-group"><label class="col-sm-2 control-label">Date *</label>

                                    <div class="col-sm-10"><input value=""  style="width:40%" type="date" min="<?php echo date("Y-m-d"); ?>" name="Date" class="form-control" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>
							
							
							
							
							
										
										<div class="form-group"><label class="col-sm-2 control-label">Time *</label>

                                    <div class="col-sm-10"><input value=""  style="width:40%" type="time" name="Time" class="form-control" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>
							
							
								<div class="form-group"><label class="col-sm-2 control-label">Location *</label>

                                    <div class="col-sm-10"><input value=""  style="width:40%" type="text" name="Location" class="form-control" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
								<button class="btn btn-primary" type="submit" name="Submit">Send</button>

									<button class="btn btn-danger" type="reset" name="Reset">Clear</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
             </div></div>
                
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
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                   
 
 /*                   {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }    */
                   
                ]

            });

            /* Init DataTables */
            var oTable = $('#editable').DataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable( 'example_ajax.php', {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            } );


        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData( [
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row" ] );

        }
    </script>
</body>
</html>
