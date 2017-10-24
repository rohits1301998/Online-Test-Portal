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
<div  class="container">
   <h1 id="welcome">Welcome!<?php if(!empty($_SESSION['user'])){echo $_SESSION['user'];}else{echo "guest";}   ?></h1>
    <?php
    if(!empty($_SESSION['user'])):
    $result=mysqli_query($con,"select fnumber,title from gen_forms where username='".$_SESSION['user']."' order by fnumber");
     
    ?>
    <table class="table  table-hover">
        <thead><th>Test No.</th>
        <th>Test Title</th>
        <th>Best Performer(UID)</th>
        </thead>
        <?php while($row=mysqli_fetch_array($result)){
            echo "<tr><td>".$row['fnumber']."</td><td>".$row['title']."</td><td>random</td></tr>";           
            }    
            ?>
    </table>
<?php endif;  ?>
  
  <div id="welcome-box">
   
    

   
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
<input type="hidden" id="navno" value="0" />
</div>
</body>
</html>