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
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
