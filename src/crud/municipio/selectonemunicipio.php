 <?php
  //error_reporting(E_ALL & ~E_NOTICE);
  include_once(dirMANIPULACAO."/Manipulacao.php");
  $selectone = new Manipulacao();
  $selectone->setTabela("municipio");
  $result = $selectone->SelectJoin(" nomeMunicipio like '%{$_POST["idmunicipio"]}%'");
  $recount = $selectone->counts();
  ?>
   <?php include_once(dirINCLUDE."/header.php");?>
   <section id="topbar" class="d-none d-lg-block">
   </section>

   <div class="container" style="margin-top:50px">
     <form method="POST"><input class="form-control" type="text" name="idmunicipio" placeholder="faca a sua pesquisa"></form>
     <div class="table-responsive-xl">
       <table class="table">
         <thead>
           <tr>
             <th>nomeMunicipio</th>
             <th>nomeProvincia</th>
             <th>Editar</th>
             <th>Deletar</th>
           </tr>
         </thead>
         <tbody>
           <?php foreach ($result as $dados) { ?>
             <tr>
               <td><?php echo $dados["nomeMunicipio_munic"] ?></td>
               <td><?php echo $dados["nomeProvincia_provi"] ?></td>

               <td><a class="btn btn-warning" style="color:orage" href="../../formulario/municipio/formupmunicipio.php?idmunicipio=<?php echo $dados['idmunicipio_munic'] ?>">Editar</a></td>
               <td> <a class="btn btn-danger" style="color:red" href="removermunicipio.php?idmunicipio=<?php echo $dados['idmunicipio_munic'] ?>">Deletar</a></td>
             </tr>
           <?php } ?>
           <?php foreach ($recount as $cout) { ?>
             <td>Total De Registro: <?php echo $cout["Res"] ?></td>
           <?php } ?>
         </tbody>
       </table>
     </div><a href="formmunicipio">Insert</a>
     <a href="home">Voltar</a>
   </div>
   <?php include_once(dirINCLUDE."/footer.php");?>