<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>First Take Film Festival</title>
<link href="firstTake.css" rel="Stylesheet" type="text/css" />
</head>

<?php

      if (!(strpos($_GET['usr'], '@ucla') !== false)) {
        header("Location: /index.php");
      }

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

      function setNote( $Note ) {
        global $connection;
        $query = "INSERT INTO notes (Judge, Video, Note) VALUES (\"{$_GET['usr']}\",5,\"{$Note}\")";
        $result = mysqli_query($connection , $query);
      }

      function getAllNotes() {
        global $connection;
        $query = "SELECT Note FROM notes WHERE Video = 5 && Judge = \"{$_GET['usr']}\"";
        $result = mysqli_query($connection, $query);
        while ( $list = mysqli_fetch_array($result) ) {
          echo "<li> " . $list[0] . "</li>";
        }
      }

      if ($_POST['formName'] != "score") {
      	if (isset( $_POST['judgeNote'] ) && $_POST['judgeNote'] !== "" ) {
      		$judgeNote = $_POST['judgeNote'];
      		setNote( $judgeNote );
      	}
      }

      else {
        header("Location: /entry_6.php?usr={$_GET['usr']}");
        $judgeScore = array($_POST['bp1'], $_POST['bp2'], $_POST['bp3'], $_POST['sw1'], $_POST['sw2'], $_POST['e1'], $_POST['e2'], $_POST['e3'], $_POST['e4'], $_POST['c1'], $_POST['c2'], $_POST['c3'], $_POST['s1'], $_POST['s2'], $_POST['s3'], $_POST['a1'], $_POST['a2'], $_POST['a3'], $_POST['bd1'], $_POST['bd2'], $_POST['bd3'], $_POST['se1'], $_POST['se2']);
        $query = "INSERT INTO score (Judge, Video, bp1,bp2,bp3,sw1,sw2,e1,e2,e3,e4,c1,c2,c3,s1,s2,s3,a1,a2,a3,bd1,bd2,bd3,se1,se2) VALUES (\"{$_GET['usr']}\", 5, $judgeScore[0], $judgeScore[1],$judgeScore[2],$judgeScore[3],$judgeScore[4],$judgeScore[5],$judgeScore[6],$judgeScore[7],$judgeScore[8],$judgeScore[9],$judgeScore[10],$judgeScore[11],$judgeScore[12],$judgeScore[13],$judgeScore[14],$judgeScore[15],$judgeScore[16],$judgeScore[17],$judgeScore[18],$judgeScore[19],$judgeScore[20],$judgeScore[21],$judgeScore[22]) ON DUPLICATE KEY UPDATE bp1 = $judgeScore[0], bp2 = $judgeScore[1], bp3 = $judgeScore[2], sw1 = $judgeScore[3], sw2 = $judgeScore[4], e1 = $judgeScore[5], e2 = $judgeScore[6], e3 = $judgeScore[7], e4 = $judgeScore[8], c1 = $judgeScore[9], c2 = $judgeScore[10], c3 = $judgeScore[11], s1 = $judgeScore[12], s2 = $judgeScore[13], s3 = $judgeScore[14], a1 = $judgeScore[15], a2 = $judgeScore[16], a3 = $judgeScore[17], bd1 = $judgeScore[18], bd2 = $judgeScore[19], bd3 = $judgeScore[20], se1 = $judgeScore[21], se2 = $judgeScore[22]";
        $result = mysqli_query($connection , $query);
        exit;
      }

      echo '
      <div id="container">
        <div id="header">
          <div id="firstTake">
              <a href="/"><img alt="First Take Film Festival" src="img/logo.png?1186088387" /></a>
          </div>
          <h1 align=right><br><br>Erik Steinman - "Eating Banjana"</h1>
        </div>
      </div>

      <body style="background-color:#232f64;">
        <div>
          <div style="float: left; width: 50%">
            <br>
            <video width=65% height=auto controls muted>
            <source src="vid/5.mp4" type="video/mp4">
            </video>
            <br>
            <br>
      ';

      echo "<div id = \"formWrapper\">";
      echo "<form name=\"notes\" method=\"post\" action=\"\">";
      echo "<input type=\"text\" name=\"judgeNote\" placeholder=\"Enter notes here..\" />";
      echo "<input type=\"submit\" name=\"action\" value=\"Add\"></form>";
      echo "<div id=\"listHolder\"><ul><br>";
      echo getAllNotes();
      echo "</ul></div></div>";
      ?>
          </div>

    </div>
    <div id="form" style="float: right; width: 50%">
      <form method="post" action="">
        <form method="post" action="">

          <h2> Best Picture </h2>

          <h3> The film idea is original. </h3>
          <div class="radio-toolbar">
          <input type="hidden" name="formName" value="score"/>
          <input type="radio" id="bp11" name="bp1" value=1 required>  <label for="bp11">1</label>
          <input type="radio" id="bp12" name="bp1" value=2>  <label for="bp12">2</label>
          <input type="radio" id="bp13" name="bp1" value=3>  <label for="bp13">3</label>
          <input type="radio" id="bp14" name="bp1" value=4>  <label for="bp14">4</label>
          <input type="radio" id="bp15" name="bp1" value=5>  <label for="bp15">5</label>
          <input type="radio" id="bp1n" name="bp1" value=0>  <label for="bp1n">N/A</label> <br> <br>

          <h3> The story clearly matches the identified genre. </h3>
          <input type="radio" id="bp21" name="bp2" value=1 required>  <label for="bp21">1</label>
          <input type="radio" id="bp22" name="bp2" value=2>  <label for="bp22">2</label>
          <input type="radio" id="bp23" name="bp2" value=3>  <label for="bp23">3</label>
          <input type="radio" id="bp24" name="bp2" value=4>  <label for="bp24">4</label>
          <input type="radio" id="bp25" name="bp2" value=5>  <label for="bp25">5</label>
          <input type="radio" id="bp2n" name="bp2" value=0>  <label for="bp2n">N/A</label> <br> <br>

          <h3> The film is entertaining and easy to follow for the intended theme. </h3>
          <input type="radio" id="bp31" name="bp3" value=1 required>  <label for="bp31">1</label>
          <input type="radio" id="bp32" name="bp3" value=2>  <label for="bp32">2</label>
          <input type="radio" id="bp33" name="bp3" value=3>  <label for="bp33">3</label>
          <input type="radio" id="bp34" name="bp3" value=4>  <label for="bp34">4</label>
          <input type="radio" id="bp35" name="bp3" value=5>  <label for="bp35">5</label>
          <input type="radio" id="bp3n" name="bp3" value=0>  <label for="bp3n">N/A</label> <br> <br>

          <h2> Screen Writing </h2>
          <h3> Interesting plot? </h3>
          <input type="radio" id="sw11" name="sw1" value=1 required>  <label for="sw11">1</label>
          <input type="radio" id="sw12" name="sw1" value=2>  <label for="sw12">2</label>
          <input type="radio" id="sw13" name="sw1" value=3>  <label for="sw13">3</label>
          <input type="radio" id="sw14" name="sw1" value=4>  <label for="sw14">4</label>
          <input type="radio" id="sw15" name="sw1" value=5>  <label for="sw15">5</label>
          <input type="radio" id="sw1n" name="sw1" value=0>  <label for="sw1n">N/A</label> <br> <br>
          <h3> Effectively communicates what the movie is trying to say? </h3>
          <input type="radio" id="sw21" name="sw2" value=1 required>  <label for="sw21">1</label>
          <input type="radio" id="sw22" name="sw2" value=2>  <label for="sw22">2</label>
          <input type="radio" id="sw23" name="sw2" value=3>  <label for="sw23">3</label>
          <input type="radio" id="sw24" name="sw2" value=4>  <label for="sw24">4</label>
          <input type="radio" id="sw25" name="sw2" value=5>  <label for="sw25">5</label>
          <input type="radio" id="sw2n" name="sw2" value=0>  <label for="sw2n">N/A</label> <br> <br>

          <h2> Editing </h2>
          <h3> Transitions effectively smooth changes from scene to scene. </h3>
          <input type="radio" id="e11" name="e1" value=1 required>  <label for="e11">1</label>
          <input type="radio" id="e12" name="e1" value=2>  <label for="e12">2</label>
          <input type="radio" id="e13" name="e1" value=3>  <label for="e13">3</label>
          <input type="radio" id="e14" name="e1" value=4>  <label for="e14">4</label>
          <input type="radio" id="e15" name="e1" value=5>  <label for="e15">5</label>
          <input type="radio" id="e1n" name="e1" value=0>  <label for="e1n">N/A</label> <br> <br>
          <h3> Title and end slides effectively introduce and close the movie. </h3>
          <input type="radio" id="e21" name="e2" value=1 required>  <label for="e21">1</label>
          <input type="radio" id="e22" name="e2" value=2>  <label for="e22">2</label>
          <input type="radio" id="e23" name="e2" value=3>  <label for="e23">3</label>
          <input type="radio" id="e24" name="e2" value=4>  <label for="e24">4</label>
          <input type="radio" id="e25" name="e2" value=5>  <label for="e25">5</label>
          <input type="radio" id="e2n" name="e2" value=0>  <label for="e2n">N/A</label> <br> <br>
          <h3> This is not a first draft; the film was clearly edited and revised. </h3>
          <input type="radio" id="e31" name="e3" value=1 required>  <label for="e31">1</label>
          <input type="radio" id="e32" name="e3" value=2>  <label for="e32">2</label>
          <input type="radio" id="e33" name="e3" value=3>  <label for="e33">3</label>
          <input type="radio" id="e34" name="e3" value=4>  <label for="e34">4</label>
          <input type="radio" id="e35" name="e3" value=5>  <label for="e35">5</label>
          <input type="radio" id="e3n" name="e3" value=0>  <label for="e3n">N/A</label> <br> <br>
          <h3> The content/plot are easy to understand and appropriate with a clear story arc and structure. </h3>
          <input type="radio" id="e41" name="e4" value=1 required>  <label for="e41">1</label>
          <input type="radio" id="e42" name="e4" value=2>  <label for="e42">2</label>
          <input type="radio" id="e43" name="e4" value=3>  <label for="e43">3</label>
          <input type="radio" id="e44" name="e4" value=4>  <label for="e44">4</label>
          <input type="radio" id="e45" name="e4" value=5>  <label for="e45">5</label>
          <input type="radio" id="e4n" name="e4" value=0>  <label for="e4n">N/A</label> <br> <br>

          <h2> Cinematography </h2>
          <h3> Lighting is appropriate, effective, and supports the story. </h3>
          <input type="radio" id="c11" name="c1" value=1 required>  <label for="c11">1</label>
          <input type="radio" id="c12" name="c1" value=2>  <label for="c12">2</label>
          <input type="radio" id="c13" name="c1" value=3>  <label for="c13">3</label>
          <input type="radio" id="c14" name="c1" value=4>  <label for="c14">4</label>
          <input type="radio" id="c15" name="c1" value=5>  <label for="c15">5</label>
          <input type="radio" id="c1n" name="c1" value=0>  <label for="c1n">N/A</label> <br> <br>
          <h3> Visual effects are effectively used to further the story. </h3>
          <input type="radio" id="c21" name="c2" value=1 required>  <label for="c21">1</label>
          <input type="radio" id="c22" name="c2" value=2>  <label for="c22">2</label>
          <input type="radio" id="c23" name="c2" value=3>  <label for="c23">3</label>
          <input type="radio" id="c24" name="c2" value=4>  <label for="c24">4</label>
          <input type="radio" id="c25" name="c2" value=5>  <label for="c25">5</label>
          <input type="radio" id="c2n" name="c2" value=0>  <label for="c2n">N/A</label> <br> <br>
          <h3> Shots, angles, and camera movement are used in creative ways that strongly support the story. </h3>
          <input type="radio" id="c31" name="c3" value=1 required>  <label for="c31">1</label>
          <input type="radio" id="c32" name="c3" value=2>  <label for="c32">2</label>
          <input type="radio" id="c33" name="c3" value=3>  <label for="c33">3</label>
          <input type="radio" id="c34" name="c3" value=4>  <label for="c34">4</label>
          <input type="radio" id="c35" name="c3" value=5>  <label for="c35">5</label>
          <input type="radio" id="c3n" name="c3" value=0>  <label for="c3n">N/A</label> <br> <br>

          <h2> Sound Design </h2>
          <h3> Sound effects are effectively used to further the story. </h3>
          <input type="radio" id="s11" name="s1" value=1 required>  <label for="s11">1</label>
          <input type="radio" id="s12" name="s1" value=2>  <label for="s12">2</label>
          <input type="radio" id="s13" name="s1" value=3>  <label for="s13">3</label>
          <input type="radio" id="s14" name="s1" value=4>  <label for="s14">4</label>
          <input type="radio" id="s15" name="s1" value=5>  <label for="s15">5</label>
          <input type="radio" id="s1n" name="s1" value=0>  <label for="s1n">N/A</label> <br> <br>
          <h3> Captions and voiceovers are effectively used to support the story. </h3>
          <input type="radio" id="s21" name="s2" value=1 required>  <label for="s21">1</label>
          <input type="radio" id="s22" name="s2" value=2>  <label for="s22">2</label>
          <input type="radio" id="s23" name="s2" value=3>  <label for="s23">3</label>
          <input type="radio" id="s24" name="s2" value=4>  <label for="s24">4</label>
          <input type="radio" id="s25" name="s2" value=5>  <label for="s25">5</label>
          <input type="radio" id="s2n" name="s2" value=0>  <label for="s2n">N/A</label> <br> <br>
          <h3> Music enhances and supports the story. </h3>
          <input type="radio" id="s31" name="s3" value=1 required>  <label for="s31">1</label>
          <input type="radio" id="s32" name="s3" value=2>  <label for="s32">2</label>
          <input type="radio" id="s33" name="s3" value=3>  <label for="s33">3</label>
          <input type="radio" id="s34" name="s3" value=4>  <label for="s34">4</label>
          <input type="radio" id="s35" name="s3" value=5>  <label for="s35">5</label>
          <input type="radio" id="s3n" name="s3" value=0>  <label for="s3n">N/A</label> <br> <br>

          <h2> Acting </h2>
          <h3> The acting fits the theme?  </h3>
          <input type="radio" id="a11" name="a1" value=1 required>  <label for="a11">1</label>
          <input type="radio" id="a12" name="a1" value=2>  <label for="a12">2</label>
          <input type="radio" id="a13" name="a1" value=3>  <label for="a13">3</label>
          <input type="radio" id="a14" name="a1" value=4>  <label for="a14">4</label>
          <input type="radio" id="a15" name="a1" value=5>  <label for="a15">5</label>
          <input type="radio" id="a1n" name="a1" value=0>  <label for="a1n">N/A</label> <br> <br>
          <h3> Acting is natural and believable? </h3>
          <input type="radio" id="a21" name="a2" value=1 required>  <label for="a21">1</label>
          <input type="radio" id="a22" name="a2" value=2>  <label for="a22">2</label>
          <input type="radio" id="a23" name="a2" value=3>  <label for="a23">3</label>
          <input type="radio" id="a24" name="a2" value=4>  <label for="a24">4</label>
          <input type="radio" id="a25" name="a2" value=5>  <label for="a25">5</label>
          <input type="radio" id="a2n" name="a2" value=0>  <label for="a2n">N/A</label> <br> <br>
          <h3> Acting is appropriate and enjoyable to watch? </h3>
          <input type="radio" id="a31" name="a3" value=1 required>  <label for="a31">1</label>
          <input type="radio" id="a32" name="a3" value=2>  <label for="a32">2</label>
          <input type="radio" id="a33" name="a3" value=3>  <label for="a33">3</label>
          <input type="radio" id="a34" name="a3" value=4>  <label for="a34">4</label>
          <input type="radio" id="a35" name="a3" value=5>  <label for="a35">5</label>
          <input type="radio" id="a3n" name="a3" value=0>  <label for="a3n">N/A</label> <br> <br>

          <h2> Best Director </h2>
          <h3> Complexity of the story  </h3>
          <input type="radio" id="bd11" name="bd1" value=1 required>  <label for="bd11">1</label>
          <input type="radio" id="bd12" name="bd1" value=2>  <label for="bd12">2</label>
          <input type="radio" id="bd13" name="bd1" value=3>  <label for="bd13">3</label>
          <input type="radio" id="bd14" name="bd1" value=4>  <label for="bd14">4</label>
          <input type="radio" id="bd15" name="bd1" value=5>  <label for="bd15">5</label>
          <input type="radio" id="bd1n" name="bd1" value=0>  <label for="bd1n">N/A</label> <br> <br>
          <h3> Effective use of cinematic techniques </h3>
          <input type="radio" id="bd21" name="bd2" value=1 required>  <label for="bd21">1</label>
          <input type="radio" id="bd22" name="bd2" value=2>  <label for="bd22">2</label>
          <input type="radio" id="bd23" name="bd2" value=3>  <label for="bd23">3</label>
          <input type="radio" id="bd24" name="bd2" value=4>  <label for="bd24">4</label>
          <input type="radio" id="bd25" name="bd2" value=5>  <label for="bd25">5</label>
          <input type="radio" id="bd2n" name="bd2" value=0>  <label for="bd2n">N/A</label> <br> <br>
          <h3> Believability of actors' performances </h3>
          <input type="radio" id="bd31" name="bd3" value=1 required>  <label for="bd31">1</label>
          <input type="radio" id="bd32" name="bd3" value=2>  <label for="bd32">2</label>
          <input type="radio" id="bd33" name="bd3" value=3>  <label for="bd33">3</label>
          <input type="radio" id="bd34" name="bd3" value=4>  <label for="bd34">4</label>
          <input type="radio" id="bd35" name="bd3" value=5>  <label for="bd35">5</label>
          <input type="radio" id="bd3n" name="bd3" value=0>  <label for="bd3n">N/A</label> <br> <br>

          <h2> Special Effects </h2>
          <h3> Visual effects are effectively used to further enhance the effect of the story. </h3>
          <input type="radio" id="se11" name="se1" value=1 required>  <label for="se11">1</label>
          <input type="radio" id="se12" name="se1" value=2>  <label for="se12">2</label>
          <input type="radio" id="se13" name="se1" value=3>  <label for="se13">3</label>
          <input type="radio" id="se14" name="se1" value=4>  <label for="se14">4</label>
          <input type="radio" id="se15" name="se1" value=5>  <label for="se15">5</label>
          <input type="radio" id="se1n" name="se1" value=0>  <label for="se1n">N/A</label> <br> <br>
          <h3> Sound effects are effectively used to dramatize scene </h3>
          <input type="radio" id="se21" name="se2" value=1 required>  <label for="se21">1</label>
          <input type="radio" id="se22" name="se2" value=2>  <label for="se22">2</label>
          <input type="radio" id="se23" name="se2" value=3>  <label for="se23">3</label>
          <input type="radio" id="se24" name="se2" value=4>  <label for="se24">4</label>
          <input type="radio" id="se25" name="se2" value=5>  <label for="se25">5</label>
          <input type="radio" id="se2n" name="se2" value=0>  <label for="se2n">N/A</label> <br> <br> <br>
          </div>
          <center><input type="submit" name="submit" value="Confirm"></center>
        </form>
    </div>
  </div>
</body>
