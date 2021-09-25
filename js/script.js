function homeImages() {
  var units = document.getElementsByClassName("unit");
  for (var i = 0; i < units.length; i++) {
    var source = units[i].getElementsByTagName("img")[0].src;
    units[i].style.backgroundImage = "url(\"" + source + "\")";
  }
}

function checkWidth() {
  if (innerWidth > 1200) {
    for (var i = 0; i < document.getElementsByClassName("innerbox").length; i++) {
      document.getElementsByClassName("innerbox")[i].style.width = "600px";
    }
  } else {
    for (var i = 0; i < document.getElementsByClassName("innerbox").length; i++) {
      document.getElementsByClassName("innerbox")[i].style.width = "50%";
    }
  }
}
