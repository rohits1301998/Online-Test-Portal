

<?php
session_start();
include("conn.php");
$query = "select username,qno,coption from forms where fnumber=".$_GET['test'];
$correct_options = mysqli_query($con,$query);
$correct=array();
$score=0;
while($row = mysqli_fetch_assoc($correct_options))
    {
      $correct['q'.$row['qno']] = $row['coption'];
    }
foreach($correct as $x =>$x_value)
{
  if(array_key_exists($x,$_SESSION['selected-ans']))
  {
    if($correct[$x] == $_SESSION['selected-ans'][$x])
      $score++;
  }

}
echo "your score is : ".$score;
unset($_SESSION['selected-ans']);
$_SESSION['exam_over']=1;

?>
<html>
<body>
  <table border="1" cellspacing="0" width="100%;">
    <tr>
      <td colspan="2"><p>Profesor Name: </p></td>
    </tr>
    <tr>
      <td>
        jdsfs
      </td>
    </tr>
  </table>
</body>
</html>
