<!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>First Take Film Festival</title>
<link href="firstTake.css" rel="Stylesheet" type="text/css" />
</head>




<body>

  <div id="container">
    <div id="header">
      <div id="firstTake">
          <a href="/"><img alt="First Take Film Festival" width = 320 src="img/logo.png" /></a>
      </div>
    </div>
  </div>
  <div style="display:block; float:left; width: 30vw;">
    <br><h3>0 - Aman Adlakha - "The Spaceman"</h3>
    <h3>1 - Waner Zhang - "Salvation"</h3>
    <h3>2 - Sabrina Ashleigh Tan - "LEGOS"</h3>
    <h3>3 - Amanda Araque - "Break-Up Breakdown"</h3>
    <h3>4 - Melissa Oskouie - "Nice Girl"</h3>
    <h3>5 - Erik Steinman - "Eating Banjana"</h3>
    <h3>6 - Bryan Firks - "Ovation"</h3>
    <h3>7 - Anouk Phéline - "The Bystander Effect"</h3>
    <h3>8 - Priscila Alegria Nunez - "Heart Her"</h3>
    <h3>9 - Colin Tandy - "It Pours"</h3>
    <h3>10 - Tyler Yin - "Rhythm of the Halves"</h3>
    <h3>11 - Ariella Blum-Lemberg - "Heroes Wanted"</h3>
    <h3>12 - Alexander Knox - "Follow Your True North"</h3>
    <h3>13 - Nima Niv - "Mythologies"</h3>
    <h3>14 - Jay Shipman - "One Final Encore"</h3>
    <h3>15 - Dustin Rios - "Work Flow"</h3>
  </div>
  <div style="display:inline-block;float:right; width:60vw; overflow:auto;">
    <?php
    define("DB_SERVER", "mysql.hostinger.co.uk");
    define("DB_USER", "u622238746_judge");
    define("DB_PASS", "herman");
    define("DB_NAME", "u622238746_score");

    // 1. Create a database connection
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $q_picture = "SELECT `Video`, SUM(`BP`) AS `G` FROM (SELECT `Video`, `bp1` + `bp2` + `bp3` AS `BP` FROM score GROUP BY `Video`, `judge` ORDER BY `bp1` + `bp2` + `bp3` DESC) AS table1 GROUP BY `Video` ORDER BY `G` DESC;";
    $q_screen  = "SELECT `Video`, SUM(`BP`) AS `G`  FROM (SELECT `Video`, `sw1` + `sw2` AS `BP` FROM score GROUP BY `Video`, `judge` ORDER BY `sw1` + `sw2` DESC) AS table1 GROUP BY `Video` ORDER BY `G` DESC;";
    $q_editing = "SELECT `Video`, SUM(`BP`) AS `G`  FROM (SELECT `Video`, `e1` + `e2` + `e3` + `e4` AS `BP` FROM score GROUP BY `Video`, `judge` ORDER BY `e1` + `e2` + `e3` + `e4` DESC) AS table1 GROUP BY `Video` ORDER BY `G` DESC;";
    $q_cinema  = "SELECT `Video`, SUM(`BP`) AS `G`  FROM (SELECT `Video`, `c1` + `c2` + `c3` AS `BP` FROM score GROUP BY `Video`, `judge` ORDER BY `c1` + `c2` + `c3` DESC) AS table1 GROUP BY `Video` ORDER BY `G` DESC;";
    $q_sound   = "SELECT `Video`, SUM(`BP`) AS `G`  FROM (SELECT `Video`, `s1` + `s2` + `s3` AS `BP` FROM score GROUP BY `Video`, `judge` ORDER BY `s1` + `s2` + `s3` DESC) AS table1 GROUP BY `Video` ORDER BY `G` DESC;";
    $q_acting  = "SELECT `Video`, SUM(`BP`) AS `G`  FROM (SELECT `Video`, `a1` + `a2` + `a3` AS `BP` FROM score GROUP BY `Video`, `judge` ORDER BY `a1` + `a2` + `a3` DESC) AS table1 GROUP BY `Video` ORDER BY `G` DESC;";
    $q_direct  = "SELECT `Video`, SUM(`BP`) AS `G`  FROM (SELECT `Video`, `bd1` + `bd2` + `bd3` AS `BP` FROM score GROUP BY `Video`, `judge` ORDER BY `bd1` + `bd2` + `bd3` DESC) AS table1 GROUP BY `Video` ORDER BY `G` DESC;";
    $q_effect  = "SELECT `Video`, SUM(`BP`) AS `G`  FROM (SELECT `Video`, `se1` + `se2` AS `BP` FROM score GROUP BY `Video`, `judge` ORDER BY `se1` + `se2` DESC) AS table1 GROUP BY `Video` ORDER BY `G` DESC;";

    $r_picture = mysqli_query($connection , $q_picture);
    $r_screen = mysqli_query($connection , $q_screen);
    $r_editing = mysqli_query($connection , $q_editing);
    $r_cinema = mysqli_query($connection , $q_cinema);
    $r_sound = mysqli_query($connection , $q_sound);
    $r_acting = mysqli_query($connection , $q_acting);
    $r_direct = mysqli_query($connection , $q_direct);
    $r_effect = mysqli_query($connection , $q_effect);

    echo "<table align=center> <tr><th>Best Picture</th><tr> <tr> <th> Video </th> <th> Total </th> <tr>";
    while ( $list = mysqli_fetch_array($r_picture) ) {
      echo "<tr><td> " . $list[0] . "</td>";
      echo "<td> " . $list[1] . "</td><tr>";
    }
    echo "</table>";

    echo "<table align=center> <tr><th>Best Screen Writing</th><tr> <tr> <th> Video </th> <th> Total </th> <tr>";
    while ( $list = mysqli_fetch_array($r_screen) ) {
       echo "<tr><td> " . $list[0] . "</td>";
       echo "<td> " . $list[1] . "</td><tr>";
    }
    echo "</table>";

    echo "<table align=center> <tr><th>Best Editing</th><tr> <tr> <th> Video </th> <th> Total </th> <tr>";
    while ( $list = mysqli_fetch_array($r_editing) ) {
       echo "<tr><td> " . $list[0] . "</td>";
       echo "<td> " . $list[1] . "</td><tr>";
    }
    echo "</table>";

    echo "<table align=center> <tr><th>Best Cinematography</th><tr> <tr> <th> Video </th> <th> Total </th> <tr>";
    while ( $list = mysqli_fetch_array($r_cinema) ) {
       echo "<tr><td> " . $list[0] . "</td>";
       echo "<td> " . $list[1] . "</td><tr>";
    }
    echo "</table>";

    echo "<table align=center> <tr><th>Best Sound Design</th><tr> <tr> <th> Video </th> <th> Total </th> <tr>";
    while ( $list = mysqli_fetch_array($r_sound) ) {
       echo "<tr><td> " . $list[0] . "</td>";
       echo "<td> " . $list[1] . "</td><tr>";
    }
    echo "</table>";

    echo "<table align=center> <tr><th>Best Acting</th><tr> <tr> <th> Video </th> <th> Total </th> <tr>";
      while ( $list = mysqli_fetch_array($r_acting) ) {
         echo "<tr><td> " . $list[0] . "</td>";
         echo "<td> " . $list[1] . "</td><tr>";
      }
    echo "</table>";

    echo "<table align=center> <tr><th>Best Director</th><tr> <tr> <th> Video </th> <th> Total </th> <tr>";
      while ( $list = mysqli_fetch_array($r_direct) ) {
         echo "<tr><td> " . $list[0] . "</td>";
         echo "<td> " . $list[1] . "</td><tr>";
      }
      echo "</table>";

    echo "<table align=center> <tr><th>Best Special Effect</th><tr> <tr> <th> Video </th> <th> Total </th> <tr>";
      while ( $list = mysqli_fetch_array($r_effect) ) {
         echo "<tr><td> " . $list[0] . "</td>";
         echo "<td> " . $list[1] . "</td><tr>";
      }
    echo "</table>";
    ?>

  <div>
</body>
