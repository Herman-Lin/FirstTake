<!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>First Take Film Festival</title>
<link href="firstTake.css" rel="Stylesheet" type="text/css" />
</head>

<?php
if ($_POST['formName'] == "judgeName") {
  $usr = $_POST['judgeName'];

  if (strpos($usr, '@ucla') !== false) {
    header("Location: /entry_0.php?usr=$usr"); /* Redirect browser */
  }
}

?>

<body>

  <div id="container">
    <div id="header">
      <div id="firstTake">
          <a href="/"><img alt="First Take Film Festival" width = 320 src="img/logo.png" /></a>
      </div>
    </div>
  </div>

  <div id="centered_div">
    <form method="post" action="">
      <h2>UCLA 4th First Take Festival</h2>
    <input type="hidden" name="formName" value="judgeName"/>
      <input type="text" name="judgeName" placeholder="Judge Access Code" />
      <br><br><input type="submit" name="action" value="Enter"></form>

      <?php
      if ($_POST['formName'] == "judgeName") {
        $usr = $_POST['judgeName'];

        if (!(strpos($usr, '@ucla') !== false)) {
          echo "<br><br><br><h3 style=\"color:red\">Invalid access code</h3>";
        }
      }
      ?>

  <div>
</body>
