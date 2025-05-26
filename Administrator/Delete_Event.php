<?php
session_start();

$Event_ID=$_GET['Event_ID'];

require_once('../includes/config.php');


mysqli_query($dbConn,"delete from events where ID='$Event_ID'");

	  
echo "<script language='JavaScript'>
			  alert ('This Event Has Been Deleted Successfully !');
      </script>";
	  

	echo "<script language='JavaScript'>
document.location='View_Events_List.php';
        </script>";

?>