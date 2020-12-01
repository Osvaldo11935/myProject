 <?php
    include_once("../../src//Manipulacao/Manipulacao.php");
    $selectall = new Manipulacao();
    $selectall->setTabela("provincia");
    $result = $selectall->allSelect();
    $recount = $selectall->counts();
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
                             <li> <a class="dropdown-item" href="../../formulario/provincia/formprovincia.php">provincia</a></li>
                             <li> <a class="dropdown-item" href="../../formulario/municipio/formmunicipio.php">municipio</a></li>
                             <li> <a class="dropdown-item" href="../../formulario/pontoTuristico/formpontoTuristico.php">pontoTuristico</a></li>
                             <li> <a class="dropdown-item" href="../../formulario/pousada/formpousada.php">pousada</a></li>
                             <li> <a class="dropdown-item" href="../../formulario/hotel/formhotel.php">hotel</a></li>
                             <li><a class="dropdown-item" href="../../formulario/saloesDeEveto/formsaloesDeEveto.php">saloesDeEveto</a></li>
                         </ul>
                     </li>

                     <li class="drop-down"><a href="#">Consulta</a>
                         <ul>
                             <li> <a class="dropdown-item" href="../provincia/selectoneprovincia.php">provincia</a>
                             </li>
                             <li> <a class="dropdown-item" href="../municipio/selectonemunicipio.php">municipio</a></li>
                             <li><a class="dropdown-item" href="../pontoTuristico/selectonepontoTuristico.php">pontoTuristico</a></li>
                             <li> <a class="dropdown-item" href="selectonepousada.php">pousada</a></li>
                             <li> <a class="dropdown-item" href="../hotel/selectonehotel.php">hotel</a></li>
                             <li> <a class="dropdown-item" href="../saloesDeEveto/selectonesaloesDeEveto.php">saloesDeEveto</a></li>
                         </ul>
                     </li>
                 </ul>
             </nav>
             <!-- .nav-menu -->

         </div>
     </header>
     <section id="topbar" class="d-none d-lg-block">
     </section>
     <div class="container" style="margin-top:50px">
         <div class="table-responsive-xl">
             <table class="table">
                 <thead>
                     <tr>
                         <th>nomeProvincia</th>
                         <th>Editar</th>
                         <th>Deletar</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php foreach ($result as $dados) { ?>
                         <tr>
                             <td><?php echo $dados["nomeProvincia"] ?></td>

                             <td><a class="btn btn-warning" style="color:orage" href="../../formulario/provincia/formupprovincia.php?idprovincia=<?php echo $dados['idprovincia'] ?>">Editar</a> </td>
                             <td> <a class="btn btn-danger" style="color:red" href="removerprovincia.php?idprovincia=<?php echo $dados['idprovincia'] ?>">Deletar</a></td>
                         </tr>
                     <?php } ?>
                     <?php foreach ($recount as $cout) { ?>
                         <td>Total De Registro: <?php echo $cout["Res"] ?></td>
                     <?php } ?>
                 </tbody>
             </table>
         </div><a href="../../formulario/provincia/formprovincia.php">Insert</a>
         <a href="../../home.php">Voltar</a>
     </div>
     <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

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