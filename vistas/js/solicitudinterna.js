$("#tiposolicitud").on("click", function () {
  var tiposolicitud = $(this).attr("tiposolicitud");
  window.location =
    "index.php?ruta=nuevasolicitud&tiposolicitud=" + tiposolicitud;
});

$("#actualizarestatus").on("click", function () {
  var numsolicitud = $(this).attr("idsolicitud");
  var tiposolicitud = "interna";
  Swal.fire({
    title: "¿Deseas cerrar la solicitud?",
    showDenyButton: true,
    showCancelButton: true,
    confirmButtonText: "Cerrar",
    denyButtonText: `No cerrar`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      Swal.fire("Solicitud Cerrada!", "", "success");
      window.location =
        "index.php?ruta=cerrarsolicitud&numsolicitud=" +
        numsolicitud +
        "&tiposolicitud =" +
        tiposolicitud;
    } else if (result.isDenied) {
      Swal.fire("Solicitud no Cerrada!", "", "info");
    }
  });
});
