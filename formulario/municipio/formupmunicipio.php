 <?php
  include_once("../../src/Manipulacao/Manipulacao.php");
  $idmunicipio = $_GET["idmunicipio"];
  $selectone = new Manipulacao();
  $selectone->setTabela("municipio");
  $selectone->setValorNaTabela("idmunicipio");
  $selectone->setValorPesquisa("$idmunicipio");
  $result = $selectone->read();
  $row = mysqli_fetch_assoc($result);
  ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">

   <title>Home</title>
   <meta content="" name="descriptison">
   <meta content="" name="keywords">
   <link href="../../assets/img/favicon.png" rel="icon">
   <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
   <link href="../../https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">
   <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link href="../../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
   <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
   <link href="../../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
   <link href="../../assets/vendor/venobox/venobox.css" rel="stylesheet">
   <link href="../../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
   <link href="../../assets/vendor/aos/aos.css" rel="stylesheet">
   <link href="../../assets/css/style.css" rel="stylesheet">
 </head>

 <body>

   <header id="header">
     <div class="container">

       <div class="logo float-left">
         <h1 class="text-light"><a href="../../home.php"><span>CANDONGUEIRO DIGITAL</span></a></h1>
       </div>
       <nav class="nav-menu float-right d-none d-lg-block">
         <ul>
           <li><a href="../../crud/logaut.php">Sair</a></li>
           <li><a href="../../infProvincia.php">Info Provincia</a></li>
           <li class="drop-down"><a href="#">Cadastrar</a>
             <ul>
               <li> <a class="dropdown-item" href="../provincia/formprovincia.php">provincia</a></li>
               <li> <a class="dropdown-item" href="formmunicipio.php">municipio</a></li>
               <li> <a class="dropdown-item" href="../pontoTuristico/formpontoTuristico.php">pontoTuristico</a></li>
               <li> <a class="dropdown-item" href="../pousada/formpousada.php">pousada</a></li>
               <li> <a class="dropdown-item" href="../hotel/formhotel.php">hotel</a></li>
               <li><a class="dropdown-item" href="../saloesDeEveto/formsaloesDeEveto.php">saloesDeEveto</a></li>
             </ul>
           </li>

           <li class="drop-down"><a href="#">Consulta</a>
             <ul>
               <li> <a class="dropdown-item" href="../../crud/provincia/selectoneprovincia.php">provincia</a>
               </li>
               <li> <a class="dropdown-item" href="../../crud/municipio/selectonemunicipio.php">municipio</a></li>
               <li><a class="dropdown-item" href="../../crud/pontoTuristico/selectonepontoTuristico.php">pontoTuristico</a></li>
               <li> <a class="dropdown-item" href="../../crud/pousada/selectonepousada.php">pousada</a></li>
               <li> <a class="dropdown-item" href="../../crud/hotel/selectonehotel.php">hotel</a></li>
               <li> <a class="dropdown-item" href="../../crud/saloesDeEveto/selectonesaloesDeEveto.php">saloesDeEveto</a></li>
             </ul>
           </li>
         </ul>
       </nav>
       <!-- .nav-menu -->

     </div>
   </header>
   <section id="topbar" class="d-none d-lg-block">
   </section>
   <main id="main">
     <section id="contact" class="contact">
       <div class="container">
         <div class="section-title">
         </div>
         <div class="row">
           <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300" class="php-email-form">
             <div class="card-body">
               <div class="card" style="margin-top:20px">
                 <h5 class="card-header">
                   <legend>...</legend>
                 </h5>
                 <div class="card-body">
                   <form action="../../crud/municipio/updatemunicipio.php" method="post">
                     <fieldset>

                       <input type="hidden" name="idmunicipio" value="<?php echo $row['idmunicipio'] ?>">
                       <div class="form-row">
                         <div class="col-md-6 mb-3">
                           <input class="form-control" type="text" required name="nomeMunicipio" id="nomeMunicipio" value="<?php echo $row["nomeMunicipio"] ?>" placeholder="Preencha este Campo com nomeMunicipio">
                         </div><br>
                         <div class="col-md-6 mb-3">
                           <input class="form-control" type="text" required name="provinciaid" id="provinciaid" value="<?php echo $row["provinciaid"] ?>" placeholder="Preencha este Campo com id">
                         </div><br>
                       </div>
                       <button class="btn btn-primary btn-block">Enviar</button>
                     </fieldset>
                   </form>
                 </div>
               </div>
             </div>
           </div>

         </div>

       </div>
     </section>
   </main>

   <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

   <!-- Vendor JS Files -->
   <script src="../../assets/vendor/jquery/jquery.min.js"></script>
   <script src="../../js/javaScript.js"></script>
   <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="../../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
   <script src="../../assets/vendor/php-email-form/validate.js"></script>
   <script src="../../assets/vendor/jquery-sticky/jquery.sticky.js"></script>
   <script src="../../assets/vendor/venobox/venobox.min.js"></script>
   <script src="../../assets/vendor/waypoints/jquery.waypoints.min.js"></script>
   <script src="../../assets/vendor/counterup/counterup.min.js"></script>
   <script src="../../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
   <script src="../../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
   <script src="../../assets/vendor/aos/aos.js"></script>

   <!-- Template Main JS File -->
   <script src="../../assets/js/main.js"></script>

 </body>

 </html>