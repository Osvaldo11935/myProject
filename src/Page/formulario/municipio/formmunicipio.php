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
                  <form action="createdmunicipio" method="post">
                    <fieldset>

                      <div class="form-row">
                        <div class="col-md-12 mb-3">
                          <input class="form-control" type="text" required name="nomeMunicipio" id="nomeMunicipio" placeholder="Preencha este Campo com nomeMunicipio">
                        </div><br>
                        <div class="col-md-12 mb-3">
                          <select class="form-control" name="provinciaid" id="Provincia" onclick="refrech('Provincia','nomeProvincia')">
                          </select>
                        </div>
                      </div> <button class="btn btn-primary btn-block">Enviar</button>
                      <a href="../../crud/municipio/selectallmunicipio.php">Ver Dados</a>
                      <a href="../../home.php">Voltar</a>
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