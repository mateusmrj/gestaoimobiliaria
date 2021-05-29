<?php 
  require_once("../../controllers/proprietariosController.php");
  edit();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Atualizar Proprietário</h2>

<form action="edit.php?id=<?php echo $proprietario['id']; ?>" method="post">
  <hr />
  <div class="row form-group">
    <div class="mb-3 col-md-7">
      <label for="name">Nome</label>
      <input type="text" class="form-control" name="proprietario['nome']" value="<?php echo $proprietario['nome']; ?>" required>
    </div>

    <div class="mb-3 col-md-7">
      <label for="">E-mail</label>
      <input type="mail" class="form-control" name="proprietario['email']" value="<?php echo $proprietario['email']; ?>" required>
    </div>
  </div>
 
  <div class="row mb-3">
    <div class="form-group col-md-3">
      <label for="">Telefone</label>
      <input type="tel" class="form-control" id="tel" name="proprietario['telefone']" placeholder="9900000-0000" pattern="^\d{7}-\d{4}$" maxlength="12" value="<?php echo $proprietario['telefone']; ?>" required>
    </div>
    <div class="form-group col-md-2">
      <label for="repasse">Dia para repasse</label>
      <input type="number" class="form-control" id="repasse" name="proprietario['repasse']"
      maxlength="2" max="31" value="<?php echo $proprietario['repasse']; ?>" required>
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