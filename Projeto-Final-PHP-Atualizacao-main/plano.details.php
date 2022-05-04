<?php 
  require_once('config/config.php'); 
  $PlanoService = new PlanoService(); 
  $plano = $PlanoService->localizar($_GET['id']);
  
  $categoriaService = new CategoriaService(); 
  $categorias = $categoriaService->LocalizarPorIds(array($plano->getCategoriaId()));
  
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Business - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            
            <?php 
            require("./homenav.php");
            ?>
            <!-- Header-->
            <header class="bg-dark py-5">
                <div class="container px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="col-lg-8 col-xl-7 col-xxl-6">
                            <div class="my-5 text-center text-xl-start">
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Alteração de Planos</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <form action="plano.edit" method="post">
              <div class="form-group">
                  <label for="idIdentificador">Identificador</label>
                  <input type="text" id="idIdentificador" name="inputIdentificador" class="form-control" value="<?= $plano->getId() ?>" readonly/>
              </div>
              <div class="form-group">
                  <label for="idNome">Tipo do plano</label>
                  <input type="text" id="idNome" name="inputTipo" class="form-control" value="<?= $plano->getTipo() ?>">
                </div>
                <div class="form-group">
                  <label for="idPreco">Preço do plano</label>
                  <input type="text" id="idPreco" name="inputPreco" class="form-control" value="<?= $plano->getPreco() ?>">
                </div>
                <div class="form-group">
                  <label for="inputInfo1">Descrição do Plano</label>
                  <input type="text" id="inputInfo1" name="inputInfo1" class="form-control" value="<?= $plano->getInfo1() ?>">
                </div>
                <div class="form-group">
                  <label for="inputInfo2">Descrição do Plano</label>
                  <input type="text" id="inputInfo2" name="inputInfo2" class="form-control" value="<?= $plano->getInfo2() ?>">
                </div>
                <div class="form-group">
                  <label for="inputInfo3">Descrição do Plano</label>
                  <input type="text" id="inputInfo3" name="inputInfo3" class="form-control" value="<?= $plano->getInfo3() ?>">
                </div>
                <div class="form-group">
                  <label for="inputInfo4">Descrição do Plano</label>
                  <input type="text" id="inputInfo4" name="inputInfo4" class="form-control" value="<?= $plano->getInfo4() ?>">
                </div>
                <div class="form-group">
                  <label for="inputInfo5">Descrição do Plano</label>
                  <input type="text" id="inputInfo5" name="inputInfo5" class="form-control" value="<?= $plano->getInfo5() ?>">
                </div>
                <div class="form-group">
                  <label for="inputInfo6">Descrição do Plano</label>
                  <input type="text" id="inputInfo6" name="inputInfo6" class="form-control" value="<?= $plano->getInfo6() ?>">
                </div>
                <div class="form-group">
                  <label for="inputInfo7">Descrição do Plano</label>
                  <input type="text" id="inputInfo7" name="inputInfo7" class="form-control" value="<?= $plano->getInfo7() ?>">
                </div>
                <div class="form-group">
                  <label for="inputInfo8">Descrição do Plano</label>
                  <input type="text" id="inputInfo8" name="inputInfo8" class="form-control" value="<?= $plano->getInfo8() ?>">
                </div>
                <div class="card-body">
                  <input type="hidden" id="idProduto2" name="inputId" class="form-control" value="<?= $plano->getId() ?>">  
                  <div class="form-group">
                      <label for="statusId">Categoria</label>
                      <select id="statusId" name="inputCategoria" class="form-control custom-select">
                          <?php foreach ($categorias as $categoria): ?>
                            <option <?= ($plano->getCategoriaId() == $categoria->getId()) ? 'selected' : '' ?> value="<?= $categoria->getId() ?>"><?= $categoria->getNome() ?></option>
                          <?php endforeach; ?>
                      </select>
                    </div>                    
                </div>
                
                <hr>
                <div class="row">
                  <div class="col-12">
                    &nbsp;&nbsp;&nbsp;<a href="planos" class="btn btn-secondary mb-3" onclick="return confirm('Deseja descartar as alterações?')">Cancel</a>&nbsp;
                    <button type="submit" class="btn btn-success mb-3">Salvar alterações</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </section>
        </main>
        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Your Website 2022</div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="#!">Privacy</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Terms</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
