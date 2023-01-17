$(document).ready(function() {
  $("#filter-button").click(function() {
    
    refreshTrainings();
  });
});

function refreshTrainings() {
var ime = $("#ime").val();

$.ajax({
  type: "POST",
  url: "filter-treninga.php",
  data: {ime: ime},
  success: function(data) {
    // Display the filtered trainings
    // in the table element with id="trainings-table"
    $("#trainings-table").html(data);
  }
});
}

document.addEventListener("DOMContentLoaded", function() {
  document.getElementById("filter-button").addEventListener("click", refreshTrainings);
});



