 <?php

 include_once(dirMANIPULACAO."/Manipulacao.php");
    $selectall = new Manipulacao();
    $selectall->setTabela("provincia");
    $result = $selectall->allSelect();
    $recount = $selectall->counts();
    ?>
  <?php include_once(dirINCLUDE."/header.php");?>
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
         </div><a href="formprovincia">Insert</a>
         <a href="home">Voltar</a>
     </div>
     <?php include_once(dirINCLUDE."/footer.php");?>