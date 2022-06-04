function getEncargado() {
  var iddpto = document.getElementById("departamento").value;
  $.ajax({
    type: "POST",
    url: "ajax/encargados.ajax.php",
    data: { id: iddpto },
    success: function (data) {
      document.getElementById("cardcliente").innerHTML = data;
    },
  });
}

$("#select1").hide();
$("#select2").hide();
$("#select3").hide();
$("#select4").hide();
$("#select5").hide();
$("#select6").hide();
$("#select7").hide();

$("#departamento").on("change", function () {
  getEncargado();
  var departamento = $(this).val();
  if (departamento == 1) {
    $("#select1").show();
    $("#select2").hide();
    $("#select3").hide();
    $("#select4").hide();
    $("#select5").hide();
    $("#select6").hide();
    $("#select7").hide();
  } else if (departamento == 2) {
    $("#select1").hide();
    $("#select2").hide();
    $("#select3").show();
    $("#select4").hide();
    $("#select5").hide();
    $("#select6").hide();
    $("#select7").hide();
  } else if (departamento == 3) {
    $("#select1").hide();
    $("#select2").hide();
    $("#select3").hide();
    $("#select4").show();
    $("#select5").hide();
    $("#select6").hide();
    $("#select7").hide();
  } else if (departamento == 4) {
    $("#select1").hide();
    $("#select2").hide();
    $("#select3").hide();
    $("#select4").hide();
    $("#select5").hide();
    $("#select6").hide();
    $("#select7").show();
  } else if (departamento == 5) {
    $("#select1").hide();
    $("#select2").show();
    $("#select3").hide();
    $("#select4").hide();
    $("#select5").hide();
    $("#select6").hide();
    $("#select7").hide();
  } else if (departamento == 6) {
    $("#select1").hide();
    $("#select2").hide();
    $("#select3").hide();
    $("#select4").hide();
    $("#select5").show();
    $("#select6").hide();
    $("#select7").hide();
  } else if (departamento == 7) {
    $("#select1").hide();
    $("#select2").hide();
    $("#select3").hide();
    $("#select4").hide();
    $("#select5").hide();
    $("#select6").show();
    $("#select7").hide();
  }
});
