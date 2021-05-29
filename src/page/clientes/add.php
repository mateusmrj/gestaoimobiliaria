<?php 
  require_once("../../controllers/clientesController.php");
  add();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Novo Cliente</h2>

<form action="add.php" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="row form-group">
    <div class="mb-3 col-md-7">
      <label for="">Nome</label>
      <input type="text" class="form-control" name="cliente['nome']" required>
    </div>

    <div class="mb-3 col-md-7">
      <label for="">E-mail</label>
      <input type="email" class="form-control" name="cliente['email']" required>
    </div>
  </div>
  <div class="row form-group">
    <div class="mb-3 col-md-4">
      <label for="tel">Telefone</label>
      <input type="tel" class="form-control" id="tel" name="cliente['telefone']" placeholder="(00) 00000-0000" maxlength="15" required>
    </div>
  </div>
  
  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>