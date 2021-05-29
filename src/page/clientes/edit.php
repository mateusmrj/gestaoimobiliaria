<?php 
  require_once("../../controllers/clientesController.php");
  edit();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Atualizar Cliente</h2>

<form action="edit.php?id=<?php echo $cliente['id']; ?>" method="post">
  <hr />
  <div class="row form-group">
    <div class="mb-3 col-md-7">
      <label for="">Nome</label>
      <input type="text" class="form-control" name="cliente['nome']" value="<?php echo $cliente['nome']; ?>">
    </div>

    <div class="mb-3 col-md-7">
      <label for="">E-mail</label>
      <input type="email" class="form-control" name="cliente['email']" value="<?php echo $cliente['email']; ?>">
    </div>
  </div>
 
  <div class="row form-group">
    <div class="mb-3 col-md-4">
      <label for="tel">Telefone</label>
      <input type="tel" class="form-control" id="tel" name="cliente['telefone']" value="<?php echo $cliente['telefone']; ?>" placeholder="9900000-0000" pattern="^\d{7}-\d{4}$" maxlength="12" required>
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