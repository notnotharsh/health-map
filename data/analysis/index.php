<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css" type="text/css" />
    <link rel="stylesheet" href="/css/layout.css" type="text/css" />
    <script type="text/javascript" src="/js/script.js"></script>
  </head>
  <body onload="homeImages(); checkWidth();" onresize="checkWidth();">
    <header>
      <h1><a href="/">HealthMap</a></h1>
      <h1><a href="/data">Demonstration</a></h1>
    </header>
    <div id="content">
      <div class="unit">
        <img src="/img/map.jpeg" />
        <div class="innerbox">
          <div id="message">
            <?php
            $dir = getcwd().'/../../uploads';
            if (!file_exists($dir)) {
                mkdir($dir, 0744);
            }
            if(isset($_FILES['fileToUpload'])) {
              $errors= array();
              $file_name = $dir."/".basename($_FILES['fileToUpload']['name']);
              $file_size = $_FILES['fileToUpload']['size'];
              $file_tmp = $_FILES['fileToUpload']['tmp_name'];
              $file_type = $_FILES['fileToUpload']['type'];
              $file_ext = strtolower(end(explode('.', $file_name)));
              $extensions = array("csv");
              echo "yeezys".basename($_FILES['fileToUpload']['name']);
              if (basename($_FILES['fileToUpload']['name']) == "") {
                rename(getcwd()."/../maps/champaign-county-townships.csv", $dir."/map.csv");
              } else {
                if(in_array($file_ext,$extensions) === false) {
                  $errors[] = "That's not a CSV! Try again <a href=\"/data/\">here</a>?";
                }

                if ($file_size > 2097152) {
                  $errors[] = 'File size must be less than 2 MB! Try again <a href=\"/data/\">here</a>?"';
                }

                if (empty($errors) == true) {
                  if (move_uploaded_file($file_tmp, $dir."/map.csv") == true) {
                    echo "";
                  } else {
                    echo $file_tmp;
                  }
                } else {
                  print_r($errors);
                }
              }
            } else {
              copy(getcwd()."/../maps/champaign-county-townships.csv", $dir."/map.csv");
            }
            ?>
            <h1> People under Poverty Line</h1>
            <canvas id="targetcanvas" width="500" height="600" style="border:1px solid #d3d3d3;">Your browser does not support the canvas element.</canvas>
            <div id="targets" style="display: none;">
              <?php
              $code = shell_exec("python3 targets.py");
              echo $code;
            ?>
            </div>
            <div id="percentages" style="display: none;">
              <?php
              $code = shell_exec("python3 percentages.py");
              echo $code;
            ?>
            </div>
            <div id="map" style="display: none;">
              <?php
              $code = shell_exec("python3 map.py");
              echo $code;
            ?>
            </div>
          </div>
        </div>
      </div>
      <div class="unit">
        <img src="/img/champaign.jpeg">
        <div class="innerbox">
          <div>
            <img src="/img/chambana.png" style="display: block; margin: auto"/>
          </div>
        </div>
      </div>
      <script>
        var targetcanvas = document.getElementById("targetcanvas");
        // var percentagecanvas = document.getElementById("percentagecanvas");
        var ctx = targetcanvas.getContext("2d");
        // var ctp = percentagecanvas.getContext("2d");
        map = (JSON.parse(document.getElementById("map").innerHTML));
        targets = (JSON.parse(document.getElementById("targets").innerHTML));
        percentages = (JSON.parse(document.getElementById("percentages").innerHTML));
        for (var i = 0; i < map.length; i++) {
          ctx.fillStyle = "rgb(" + targets[i][0] + ", " + targets[i][1] + ", " + targets[i][2] + ")";
          ctx.beginPath();
          ctx.moveTo(map[i][0][0],map[i][0][1]);
          for (var j = 1; j < map[i].length; j++) {
            ctx.lineTo(map[i][j][0],map[i][j][1]);
          }
          ctx.closePath();
          ctx.fill();
        }
        ctx.stroke();
      </script>
    </div>
  </body>
</html>
