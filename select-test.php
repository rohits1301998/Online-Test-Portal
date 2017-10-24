<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/select-test.css">
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/getTests.js"></script>
  </head>
  <body onpageshow="reset();">
    <?php
    include('conn.php');
    session_start();
    
    if(!empty($_SESSION['exam_over'])){
    unset($_SESSION['exam_over']);
  }
    include('login.php');
    include('signup.php');
    include('header.php');
    
    
    ?>
    <?php
    $tests=mysqli_query($con,"select username from utcet");
    
    ?>
    
    <div id="pick-test">
      <form method="get" action="give-test.php">
      <div class="form-group">
      <label>Select professor:</label>
      <select class="form-control" name='professor' onchange="getTests(this.value)" id="select-professor">
      <option disabled selected>Select a Professor</option>
      <?php
      while($row = mysqli_fetch_assoc($tests))
      echo "<option  value=".$row['username'].">".$row['username']."</option>"
      ?>

      </select>
      
      <label>Select test:</label>
      <select class="form-control" name='test' id="list-test"><!--test is form no. of that professor -->
     
      </select>
      </div>
      <button type="submit" class="btn btns">Give Test</button>
      </form>
      

    </div>
    <input type="hidden" id="navno" value="1" />
  </body>
</html>