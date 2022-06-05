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
    $.ajax({
      type: "POST",
      url: "ajax/tramites.ajax.php",
      data: { id: 1 },
      success: function (data) {
        document.getElementById("tramite_select").innerHTML = data;
      },
    });
  } else if (departamento == 2) {
    $.ajax({
      type: "POST",
      url: "ajax/tramites.ajax.php",
      data: { id: 2 },
      success: function (data) {
        document.getElementById("tramite_select").innerHTML = data;
      },
    });
  } else if (departamento == 3) {
    $.ajax({
      type: "POST",
      url: "ajax/tramites.ajax.php",
      data: { id: 3 },
      success: function (data) {
        document.getElementById("tramite_select").innerHTML = data;
      },
    });
  } else if (departamento == 4) {
    $.ajax({
      type: "POST",
      url: "ajax/tramites.ajax.php",
      data: { id: 4 },
      success: function (data) {
        document.getElementById("tramite_select").innerHTML = data;
      },
    });
  } else if (departamento == 5) {
    $.ajax({
      type: "POST",
      url: "ajax/tramites.ajax.php",
      data: { id: 5 },
      success: function (data) {
        document.getElementById("tramite_select").innerHTML = data;
      },
    });
  } else if (departamento == 6) {
    $.ajax({
      type: "POST",
      url: "ajax/tramites.ajax.php",
      data: { id: 6 },
      success: function (data) {
        document.getElementById("tramite_select").innerHTML = data;
      },
    });
  } else if (departamento == 7) {
    $.ajax({
      type: "POST",
      url: "ajax/tramites.ajax.php",
      data: { id: 7 },
      success: function (data) {
        document.getElementById("tramite_select").innerHTML = data;
      },
    });
  }
});

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
