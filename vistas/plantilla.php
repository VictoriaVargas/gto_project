<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="vistas/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="vistas/assets/img/favicon.png">
  <title>
    GTO | 2022
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="vistas/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="vistas/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  <link href="vistas/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="vistas/assets/css/argon-dashboard.css?v=2.0.2" rel="stylesheet" />
  <!-- Jquery -->
  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

</head>

<body class="g-sidenav-show bg-gray-100">
<?php     
    if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){
        echo '<div class="min-height-300 bg-primary position-absolute w-100"></div>';
        include "modulos/lateral.php";
            echo '<main class="main-content position-relative border-radius-lg ">';
                include "modulos/cabezote.php";
                    /*==============================
                            CONTENIDO
                    ==============================*/
                    if(isset($_GET["ruta"])){

                        if($_GET["ruta"] == "inicio" || 
                            $_GET["ruta"] == "salir" ||
                            $_GET["ruta"] == "solicitudesinternos"||
                            $_GET["ruta"] == "nuevasolicitud"){
                            
                                include "modulos/".$_GET["ruta"].".php";
                        }else{

                            include "modulos/404.php";
                        }

                    }else{}
                /*==============================
                                PIE DE PAGINA
                ==============================*/

                include "modulos/footer.php";
            echo '</main>';
                
    }else{  
        $url = $_SERVER['REQUEST_URI'];
        /* echo $url; */
        if(strpos($url,"gto/loginadmin")){
            include "modulos/loginadmin.php";
        }else
        if(strpos($url,"gto/logininterno")){
            include "modulos/logininterno.php";
        }else
        if(strpos($url,"gto/loginexterno")){
            include "modulos/loginexterno.php";
        }else
        if(strpos($url,"gto/")){
            include "modulos/login.php";
        }   
    }?>
            </div>
        </div>
    </div>

    <!-- Estilos adicionales y scripts -->
    <!--   Core JS Files   -->
    <script src="vistas/assets/js/core/popper.min.js"></script>
    <script src="vistas/assets/js/core/bootstrap.min.js"></script>
    <script src="vistas/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="vistas/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="vistas/assets/js/plugins/chartjs.min.js"></script>

    <!-- SCRIPTS -->
    <script src="vistas/js/home.js"></script>
    <script src="vistas/js/nuevasolicitud.js"></script>

    <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
        damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
    </script>

<script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#ccc',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="vistas/assets/js/argon-dashboard.min.js?v=2.0.2"></script>
</body>

</html>