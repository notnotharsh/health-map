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
        <img src="/img/data.jpeg" />
        <div class="innerbox">
          <h1>I hope you'll like this demonstration.</h1>
          <p>Scroll down to see it in action!</p>
        </div>
      </div>
      <div class="unit">
        <img src="/img/data.jpeg" />
        <div class="innerbox">
          <h1>Input CSV file:</h1>
          <p>This is the data set to visualize. If you don't input anything, no worries, we'll use our own file <a href="/data/poverty-status-champaign-county-townships.csv">here</a>.</p>
          <form action="/data/maps" method="post" enctype="multipart/form-data">
            <input type="file" style="text-align-last: center;" name="fileToUpload" id="fileToUpload"></input>
            <input type="submit" style="color: #222222" name="submit"></input>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
