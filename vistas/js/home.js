$("#type_user").on("change", function () {
  var val = $(this).val();
  if (val == "1") {
    window.location = "loginadmin";
  } else if (val == "2") {
    window.location = "logininterno";
  } else if (val == "3") {
    window.location = "loginexterno";
  }
});

$(document).ready(function () {
  $("#myTable").DataTable();
});
