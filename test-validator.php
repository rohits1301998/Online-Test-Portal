

<?php
session_start();
include("conn.php");
$query = 'select qno,coption from forms where username="'.$_GET["prof"].'" AND fnumber='.$_GET['test'];
$test_title = 'select title from gen_forms where username="'.$_GET["prof"].'" AND fnumber='.$_GET["test"];
$correct_options = mysqli_query($con,$query);
$test = mysqli_query($con,$test_title);
$uid1= $_SESSION['uid1'];
$correct=array();
$marks = array();
$professor=$_GET["prof"];
$data="";
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
      {
        $score++;
        $marks[$x] = 1;
        $data = $data.str_replace('q','',$x).";";
      }
    else
      $marks[$x]=0;
  }
  else
    $marks[$x] = 0;

}


$into_database = 'insert into marks (uid,professor,fnumber,details,score,number_of_question) values("'.$uid1.'","'.$_GET['prof'].'",'.$_GET['test'].',"'.$data.'",'.$score.','.sizeof($marks).')';
mysqli_query($con,$into_database);


unset($_SESSION['selected-ans']);
$_SESSION['exam_over']=1;

header('location:report.php?uid='.$uid1.'&prof='.$_GET['prof'].'&test='.$_GET['test']);
?>
