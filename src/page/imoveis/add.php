<?php 
  require_once("../../controllers/imoveisController.php");
  add();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Novo imovél</h2>

<form action="add.php" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="row mb-3">
    <div class="form-group">
      <label for="Proprietario">Proprietário</label>
      <select class="form-control form-select" name="imovel['idProprietario']" aria-label="Proprietario">
        <option selected>Selecione</option>
        <?php if ($proprietarios) : ?>
          <?php foreach ($proprietarios as $proprietario) : ?>
            <option value="<?php echo $proprietario["id"]; ?>"><?php echo $proprietario["nome"]; ?></option>
          <?php endforeach; ?>
        <?php endif; ?>
      </select>
    </div>
  </div>

  <div class="row">
    <?php if ($imoveis) : ?>

      <label class="mb-3">Selecione endereço do imovél</label>
      <div class="form-group row">
      
      <?php foreach ($imoveis as $imovelKey => $imovel) : ?>
        <div class="form-group col-md-12 col-sm-4 col-lg-2">
          <label>
            <input type="radio" name="imovel['endereco']" id="<?= $imovelKey ?>" value="<?= $imovel['Codigo'] ?> - <?= $imovel['Categoria'] ?>, <?= $imovel['Bairro'] ?> - <?= $imovel['Cidade'] ?>" />
            <img src="../../resources/img/<?= $imovelKey ?>.jpg">
            <address class="text-center"><?= $imovel['Codigo'] ?> - <?= $imovel['Categoria'] ?>, <?= $imovel['Bairro'] ?> - <?= $imovel['Cidade'] ?></address>
          </label>
        </div>
      <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>

  
  <div id="actions" class="row mt-3">
    <div class="col-12 form-group">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>