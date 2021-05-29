<?php 
  require_once("../../controllers/imoveisController.php");
  add();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Novo imovél</h2>
<?php var_dump($cidades);
var_dump($proprietarios);
?>

<form action="add.php" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group row">
      <label for="nome">Proprietário</label>
      <select class="form-select" aria-label="Proprietário">
        <option selected>Selecione</option>
        <?php if ($proprietarios) : ?>
          <?php foreach ($proprietarios as $proprietario) : ?>
            <option value="<?php echo $proprietario["id"]; ?>"><?php echo $proprietario["nome"]; ?></option>
          <?php endforeach; ?>
        <?php endif; ?>
      </select>
    </div>

    <div class="form-group col-md-7">
      <label for="cidade">Cidade</label>
      <select id="cidade" name="imoveis['cidade']" class="form-select" aria-label="Proprietário">
        <?php if ($cidades) : ?>
          <option selected>Selecione</option>
          <?php foreach ($cidades as $cidade) : ?>
            <option value="<?php echo $cidade; ?>"><?php echo $cidade; ?></option>
          <?php endforeach; ?>
        <?php endif; ?>
      </select>
    </div>

    <div class="form-group col-md-7">
      <label for="bairro">Bairro</label>
      <select id="bairro" name="imoveis['bairro']" class="form-select" aria-label="Proprietário">
        <option selected>Selecione</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-2">
      <label for="tel">Telefone</label>
      <!-- <input type="text" class="form-control" name="proprietario['telefone']"> -->
      <!-- <input type="text" id="phone" name="proprietario['telefone']" data-mask="(00) 00000-0000" -->
      <!-- placeholder="(__) _____-____"  autocomplete="off" maxlength="15" required> -->
      <input type="tel" class="form-control"id="phone" name="proprietario['telefone']" placeholder="9900000-0000" pattern="^\d{7}-\d{4}$" maxlength="12" required>
      
    </div>
    <div class="form-group col-md-2">
      <label for="tel">Dia para repasse</label>
      <input type="number" class="form-control"id="phone" name="proprietario['repasse']" maxlength="2" max="31" required>
    </div>
  </div>
  
  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="index.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>