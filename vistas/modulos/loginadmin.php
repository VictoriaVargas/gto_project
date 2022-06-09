<html>
<body>
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
          <div class="container-fluid">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 ">
              Mejor Atención y Servicio | GTO
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Iniciar Sesión</h4>
                  <p class="mb-0">Rellena el siguiente formulario</p>
                </div>
                <div class="card-body">
                  <form action="" method="POST">
                    <input type="hidden" name="type_user" value="1">
                    <p class="mb-0">Selecciona el tipo de usuario</p>
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" aria-label="Email" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" autocomplete="off" required>
                    </div>               
                    <button class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Ingresar</button>
                      <?php 
                        $login = new ControladorUsuarios();
                        $login -> ctrIngresoUsuario();
                      ?>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('vistas/assets/img/logingto.jpg');
          background-size: cover;">
                <span class="mask bg-gradient-primary opacity-6"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">MAS</h4>
                <p class="text-white position-relative">Mejor Atención y Servicio, Guanajuato.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</body>
</html>