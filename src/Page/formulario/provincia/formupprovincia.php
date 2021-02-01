 <?php
 include_once(dirMANIPULACAO."/Manipulacao.php");
  $idprovincia =  explode("/",$_GET["url"])[1];
  $selectone = new Manipulacao();
  $selectone->setTabela("provincia");
  $selectone->setValorNaTabela("idprovincia");
  $selectone->setValorPesquisa("$idprovincia");
  $result = $selectone->read();
  $row = mysqli_fetch_assoc($result);
  ?>

<?php   include_once(dirINCLUDE."/out.php");?>
   <section id="topbar" class="d-none d-lg-block">
   </section>

   <main id="main">
     <section id="contact" class="contact">
       <div class="container">
         <div class="section-title">
         </div>
         <div class="row">
           <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300" class="php-email-form">
             <div class="card" style="margin-top:20px">
               <h5 class="card-header">
                 <legend>...</legend>
               </h5>
               <div class="card-body">
                 <form action="../updateprovincia" method="post">
                   <fieldset>

                     <input type="hidden" name="idprovincia" value="<?php echo $row['idprovincia'] ?>">
                     <div class="form-row">
                       <div class="col-md-6 mb-3">
                         <input class="form-control" type="text" required name="nomeProvincia" id="nomeProvincia" value="<?php echo $row["nomeProvincia"] ?>" placeholder="Preencha este Campo com nomeProvincia">
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
     </section>
   </main>
   <?php  include_once(dirINCLUDE."/footer.php");?>