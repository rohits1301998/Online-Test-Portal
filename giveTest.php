<?php
session_start();
    include("conn.php");
    session_unset();
    $query = "select fnumber,question,options,qno from forms where fnumber=".$_GET['test']."";
    $questions = mysqli_query($con,$query);
    $question = array();
    while($row = mysqli_fetch_assoc($questions))
    {
      $question[] = $row;
    }
    echo json_encode($question);
?>