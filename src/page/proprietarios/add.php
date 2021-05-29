<?php 
  require_once("../../controllers/proprietariosController.php");
  add();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Novo Proprietário</h2>

<form action="add.php" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="row form-group">
    <div class="mb-3 col-7">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" name="proprietario['nome']" required>
    </div>

    <div class="mb-3 col-7">
      <label for="email">E-mail</label>
      <input type="email" class="form-control" name="proprietario['email']" required>
    </div>
  </div>
  <div class="row mb-3">
    <div class="form-group col-md-3">
      <label for="tel">Telefone</label>
      <!-- <input type="text" class="form-control" name="proprietario['telefone']"> -->
      <!-- <input type="text" id="phone" name="proprietario['telefone']" data-mask="(00) 00000-0000" -->
      <!-- placeholder="(__) _____-____"  autocomplete="off" maxlength="15" required> -->
      <input type="tel" class="form-control"id="phone" name="proprietario['telefone']" placeholder="9900000-0000" pattern="^\d{7}-\d{4}$" maxlength="12" required>
      
    </div>
    <div class="form-group col-md-3">
      <label for="tel">Dia para repasse</label>
      <input type="number" class="form-control"id="phone" name="proprietario['repasse']" maxlength="2" max="31" required>
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