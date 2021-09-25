function homeImageClass(index) {
  var homeUnit = document.getElementsByClassName("unit")[index];
  var homeImage = homeUnit.getElementsByTagName("img")[0];

  var homeUnitStyle = getComputedStyle(homeUnit);
  var homeImageStyle = getComputedStyle(homeImage);

  var homeUnitWidthPX = homeUnitStyle.width;
  var homeUnitHeightPX = homeUnitStyle.height;
  var homeImageWidthPX = homeImageStyle.width;
  var homeImageHeightPX = homeImageStyle.height;

  var homeUnitWidth = Number(homeUnitWidthPX.substring(0, homeUnitWidthPX.length - 2));
  var homeUnitHeight = Number(homeUnitHeightPX.substring(0, homeUnitHeightPX.length - 2));
  var homeImageWidth = Number(homeImageWidthPX.substring(0, homeImageWidthPX.length - 2));
  var homeImageHeight = Number(homeImageHeightPX.substring(0, homeImageHeightPX.length - 2));

  homeImage.className = "";
  if ((homeImageHeight / homeImageWidth) > (homeUnitHeight / homeUnitWidth)) {
    homeImage.classList.add("high");
  } else {
    homeImage.classList.add("wide");
  }
}

function callImageResize() {
  var numIndices = document.getElementsByClassName("unit").length;
  for (var i = 0; i < numIndices; i++) {
    homeImageClass(i);
  }
}
