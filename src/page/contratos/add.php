<?php 
  require_once("../../controllers/contratosController.php");
  add();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Novo Contrato</h2>

<form action="add.php" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="form-group row">
    <div class="mb-3 col-7">
      <label for="Clientes">Imóvel</label>
      <select class="form-control form-select" name="contrato[imovel]" aria-label="contrato">
        <option selected>Selecione</option>
        <?php if ($imoveis) : ?>
          <?php foreach ($imoveis as $imovel) : ?>
            <option value="<?php echo $imovel["id"].";".$imovel["idProprietario"]; ?>"><?php echo $imovel["endereco"]; ?></option>
          <?php endforeach; ?>
        <?php endif; ?>
      </select>
    </div>
    <div class="mb-3 col-7">
      <label for="Clientes">Clientes</label>
      <select class="form-control form-select" name="contrato[idCliente]" aria-label="contrato">
        <option selected>Selecione</option>
        <?php if ($clientes) : ?>
          <?php foreach ($clientes as $cliente) : ?>
            <option value="<?php echo $cliente["id"]; ?>"><?php echo $cliente["nome"]; ?></option>
          <?php endforeach; ?>
        <?php endif; ?>
      </select>
    </div>
  </div>

  <div class="row mb-3">
    <div class="form-group col-md-3">
      <label for="inicio">Data início contrato:</label>
      <input type="date" class="form-control" id="inicio" name="contrato[dataInicio]" min="<?= date('Y-m-d'); ?>" required>
    </div>
    <div class="form-group col-md-3">
      <label for="tel">Valor do Alugel</label>
      <input type="text" class="form-control valor" name="contrato[valor]" required>
    </div>
  </div>
  
  <div class="row mb-3">
    <div class="form-group col-md-3">
      <label for="nome">Taxa de Administração</label>
      <input type="text" class="form-control valor" name="contrato[taxaAdministracao]" required>
    </div>
    <div class="form-group col-md-2">
      <label for="email">Condominio</label>
      <input type="text" class="form-control valor" name="contrato[condominio]" required>
    </div>
    <div class="form-group col-md-2">
      <label for="email">IPTU</label>
      <input type="text" class="form-control valor" name="contrato[iptu]" required>
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