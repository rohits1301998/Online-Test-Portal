

<?php
session_start();
include("conn.php");
$query = "select qno,coption from forms where fnumber=".$_GET['test'];
$correct_options = mysqli_query($con,$query);
$correct=array();
$score=0;
while($row = mysqli_fetch_assoc($correct_options))
    {
      $correct['q'.$row['qno']] = $row['coption'];
    }
foreach($correct as $x =>$x_value)
{
  if(array_key_exists($x,$_SESSION))
  {
    if($correct[$x] == $_SESSION[$x])
      $score++;
  }
  
}
echo "your score is : ".$score;
session_destroy();

?>