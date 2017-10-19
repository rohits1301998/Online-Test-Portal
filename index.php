<!DOCTYPE html>
<html>
<head>
    <title>Online Examination Portal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/give-test.css">
</head>
<body>
<?php
include('conn.php');
session_start();
include('login.php');
include('signup.php');
include('header.php');

?>
  
  
  <div id="welcome-box">
    <h1 id="welcome">Welcome!</h1>
    <br/>
    <div id="welcome-box-inner">
 <?php if(empty($_SESSION['user'])): ?>
    <button type="button" class="btn btns" onclick="window.location.href='select-test.php'">Give Test</button>
    <?php endif;  ?>
    <br/>
    <?php if(!empty($_SESSION['user'])): ?>
    <button type="button" class="btn btns" onclick="window.location.href='create-test.php'">Create test</button>
<?php endif; ?>
    </div>
  </div>

</body>
</html>