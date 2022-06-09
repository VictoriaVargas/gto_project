$("#newtype_user").on("change", function () {
  var val = $(this).val();

  if (val == "1") {
    $("#div2").remove();
    $("#div3").remove();

    $("#formulario_registro").append(
      "<div id='div1' class='mb-3 padre'><div class='mb-3'><input type='text' name='nombrecompleto' class='form-control form-control-lg' placeholder='Nombre Completo' aria-label='Email' autocomplete='off' required></div><div class='mb-3'><input type='email' name='email' class='form-control form-control-lg' placeholder='Email' aria-label='Email' autocomplete='off' required></div><div class='mb-3'><input type='password' name='password' class='form-control form-control-lg' placeholder='Password' aria-label='Password' autocomplete='off' required></div><input type='file' name='imagen' class='form-control form-control-lg'  aria-label='Email' autocomplete='off' required></div>"
    );
  } else if (val == "2") {
    $("#div1").remove();
    $("#div3").remove();

    $("#formulario_registro").append(
      "<div id='div2' class='mb-3 div2'><div class='mb-3'><input type='text' name='nombrecompleto' class='form-control form-control-lg' placeholder='Nombre Completo' aria-label='Email' autocomplete='off' required></div><div class='mb-3'><input type='email' name='email' class='form-control form-control-lg' placeholder='Email' aria-label='Email' autocomplete='off' required></div><div class='mb-3'><input type='text' name='rfc' class='form-control form-control-lg' placeholder='RFC' aria-label='Email' autocomplete='off' required></div><div class='mb-3'><input type='password' name='password' class='form-control form-control-lg' placeholder='Password' aria-label='Password' autocomplete='off' required></div>"
    );
  } else if (val == "3") {
    $("#div2").remove();
    $("#div1").remove();

    $("#formulario_registro").append(
      "<div id='div3' class='mb-3 div3'><div class='mb-3'><input type='text' name='nombrecompleto' class='form-control form-control-lg' placeholder='Nombre Completo' aria-label='Email' autocomplete='off' required></div><div class='mb-3'><input type='email' name='email' class='form-control form-control-lg' placeholder='Email' aria-label='Email' autocomplete='off' required></div><div class='mb-3'><input type='text' name='centrotrabajo' class='form-control form-control-lg' placeholder='Centro de Trabajo' aria-label='Email' autocomplete='off' required></div><div class='mb-3'><input type='password' name='password' class='form-control form-control-lg' placeholder='Password' aria-label='Password' autocomplete='off' required></div>"
    );
  }
});
