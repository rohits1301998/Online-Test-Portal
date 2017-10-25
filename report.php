<html>
<head>
  <title>Result</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">

  <table class="table table-bordered">
    <tr>
      <td colspan="2"><p>Professor Name: <?php echo $professor; ?></p></td>
    </tr>
    <tr>
      <td colspan="2"><p>Test Name: <?php $t=mysqli_fetch_assoc($test); echo $t['title']."<br />";?></p></td>
    </tr>
  </table>
  <br /><br />
  <table class="table table-bordered">

    <?php
    $i=1;
    foreach ($marks as $key => $value) {
      if ($value == 1) {
        echo "<tr><td>Question ".$i++."</td><td><span class='glyphicon glyphicon-ok'></span></td></tr>";
      }
      else {
        echo "<tr><td>Question ".$i++."</td><td><span class='glyphicon glyphicon-remove'></span></td></tr>";
      }
    }
    ?>
  </table>

  <table class="table table-bordered">
    <tr>
      <td>
        Correct Answer's : <?php echo $score; ?>
      </td>
    </tr>
    <tr>
      <td>
        Wrong Answer's : <?php echo sizeof($marks)-$score; ?>
      </td>
    </tr>
    <tr>
      <td>
        Total marks : <?php echo $score; ?>
      </td>
    </tr>
  </table>
</div>
</body>
</html>
