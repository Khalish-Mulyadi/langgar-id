// get elements
var keyword = document.getElementById("keyword");
var searchBt = document.getElementById("search-bt");
var profile = document.getElementById("profile");

// add event on keyword press
keyword.addEventListener("keyup", function () {
  // create ajax object
  var xhr = new XMLHttpRequest();

  // check ajax ready
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      profile.innerHTML = xhr.responseText;
    }
  };

  // execute ajax
  xhr.open("GET", "assets/ajax/data.php?keyword=" + keyword.value, true);
  xhr.send();
});
