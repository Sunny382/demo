<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Simple Online Quiz">
    <meta name="author" content="Val Okafor">   
    <title>Simple Quiz</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <!-- Custom styles for this template -->
    <link href="css/theme.css" rel="stylesheet">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>

  <body role="document">
    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="www.technopoints.com">Quiz</a>
        </div>
        <div class="navbar-collapse collapse" class="toactive">
          <ul class="nav navbar-nav" class="list-inline">
            <li class="cli"><a href="index.php">Home</a></li>
            <li class="cli"><a href="add_quiz.php">Add Quiz</a></li>
            <li class="cli active"><a href="result.php">View Result</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>



<?php
include 'database/dbconfig.php';
$fetchqry = "SELECT * FROM `quiz`";
$result=mysqli_query($con,$fetchqry);
$num=mysqli_num_rows($result);
$i=1;
for($i;$i<=$num;$i++){
@$userselected = $_POST[$i];
$fetchqry2 = "UPDATE `quiz` SET `userans`='$userselected' WHERE `id`=$i"; 
mysqli_query($con,$fetchqry2);
} 
$qry3 = "SELECT `ans`, `userans` FROM `quiz`;";
$result3 = mysqli_query($con,$qry3);
while ($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
    if($row3['ans']==$row3['userans']){
	 @$_SESSION['score'] += 1 ;
 }
}
 
 ?> 
 <div class="col-md-offset-2 col-md-8">
<h2>Result:</h2><br><br>
 <span><b>No. of Correct Answer:</b>&nbsp;<?php  echo $no = @$_SESSION['score']; 
											//var_dump($_SESSION['ids']);
 //session_unset(); ?></span><br><br>
 <span><b>Your Score:</b>&nbsp<?php if(isset($no)) echo $no*2; ?></span>
</div>