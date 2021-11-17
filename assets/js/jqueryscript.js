$(document).ready(function () {
  // set event
  $("#keyword").on("keyup", function () {
    $("#profile").load("assets/ajax/data.php?keyword=" + $("#keyword").val());
  });
});
