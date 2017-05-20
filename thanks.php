<!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>First Take Film Festival</title>
<link href="firstTake.css" rel="Stylesheet" type="text/css" />
</head>

<body style="background-color:#232f64;">

  <div id="container">
    <div id="header">
      <div id="firstTake">
          <a href="/"><img alt="First Take Film Festival" width = 320 src="img/logo.png?1186088387" /></a>
      </div>
    </div>
  </div>

  <div id="centered_div">
    <?php
      $usrname = str_replace("@ucla", "", $_GET['usr']);
      echo "<h2> Thanks ". $usrname .",</h2><h1>That'd be the last of the submissions.</h1> <br><br> <h3> We greatly appreciate your time participating as a distinguished judge<br>in the 4th Annual UCLA First Take Festival. </h3>"
    ?>
  <div>
</body>
