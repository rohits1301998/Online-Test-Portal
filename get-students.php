<?php
include('conn.php');
session_start();
$result=mysqli_query($con,"select uid,score from marks where professor='".$_SESSION['user']."' and fnumber=".$_GET['fno']."");
if(mysqli_num_rows($result)>0){
echo "<tr><th>UID</th><th>Marks</th></tr>";
while($row=mysqli_fetch_array($result)){
	echo "<tr><td>".strtoupper($row['uid'])."</td><td>".$row['score']."</td></tr>";
}

}
mysqli_close($con);

?>



