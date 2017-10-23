
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/give-test.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/give-test.js"></script>
    <style type="text/css">
      
      .navbar-right{
        display:none;
      }
    </style>
  </head>
  
  <body onload="give_test('<?php echo $_GET['professor']?>','<?php echo $_GET['test']?>')">
<?php
  include("conn.php");
  session_start();
  if(!empty($_SESSION['exam_over'])){
    header('location:select-test.php');
  }
  else{
    $_SESSION['exam_over']=0;
  }
  
     
    include('header.php');

    ?>
    <div id="test-page-main">
      <div id="question-container">
        <div id="give-test-question" >
          <div id="give-test-question-1">
            <p id="question-paragraph"></p>
            <div id="options">

            </div>
          </div>

          <div id="paging">
            <div id="paging-1">
              <div>
                <a href="#" onclick="option_checked(); save(); previous()" class="previous">&laquo; Previous</a>
              </div>
              <div>
                <a href="#" class="btn btn-success" role="button" onclick="option_checked(); save();" data-toggle="modal" data-target="#myModal">Submit</a>
              </div>
              <div>
                <a href="#" onclick="option_checked(); save(); next();" class="next">Next &raquo;</a>
              </div>


            </div>

          </div>

        </div>

      </div>
      <div id="question-list">
        <div class="list-group" id="questions">

        </div>
      </div>
    </div>

    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Submit Test</h4>
        </div>
        <div class="modal-body">
          <p>Do you want to submit your test?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <a href="test-validator.php?test=<?php echo $_GET['test']?>" class="btn btn-success" role="button">Submit</a>
        </div>
      </div>

    </div>
  </div>

  </body>
</html>
