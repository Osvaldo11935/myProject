 <?php
  include_once(dirMANIPULACAO."/Manipulacao.php");
  $idmunicipio = $_GET["idmunicipio"];
  $selectone = new Manipulacao();
  $selectone->setTabela("municipio");
  $selectone->setValorNaTabela("idmunicipio");
  $selectone->setValorPesquisa("$idmunicipio");
  $result = $selectone->read();
  $row = mysqli_fetch_assoc($result);
  ?>
<?php include_once(dirINCLUDE."/out.php");?>
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
                   <form action="updatemunicipio" method="post">
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
   <?php include_once(dirINCLUDE."/footer.php");?>