<?php

session_start();
if($_GET['show']=='?'){
  //print_r($_SESSION);
  echo json_encode($_SESSION['selected-ans']);
}
else if ($_GET['show']=='??') {
  session_destroy();
}
else {
  $_SESSION['selected-ans']["q".$_GET['question_id']] = $_GET['select'];
  // echo json_encode($_SESSION);

}

?>
