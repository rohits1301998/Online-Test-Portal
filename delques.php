<?php
include('conn.php');
session_start();
if(!empty($_POST['index'])){
	$user=$_SESSION['user'];
	$fnumber=intval($_SESSION['fno']);
	$qno=intval($_POST['index']);
	$result=mysqli_query($con,"delete from forms where username='$user' and fnumber='$fnumber' and qno='$qno' ");
	
}
else 
header("location:index.php");
    
?>