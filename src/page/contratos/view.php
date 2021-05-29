<?php 
	require_once("../../controllers/contratosController.php");
	view($_GET['id']);
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Contrato Id: <?php echo $contrato['id']; ?></h2>
<hr>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
		<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo $_SESSION['message']; ?>
	</div>
<?php endif; ?>

<dl class="row">
	<dt class="">Imóvel:</dt>
	<dd class="mb-2"><?php echo $contrato['endereco']; ?></dd>

	<dt>Locador:</dt>
	<dd class="mb-2"><?php echo $contrato['locador']; ?></dd>

	<dt>Locatário:</dt>
	<dd class="mb-2"><?php echo $contrato['locatario']; ?></dd>

	<dt>Valor Aluguel:</dt>
	<dd class="mb-2">R$ <?php echo number_format($contrato['valor'],2,",","."); ?></dd>

	<dt>Data Início:</dt>
	<dd class="mb-2"><?php echo date("d/m/Y", strtotime($contrato['dataInicio'])); ?></dd>

	<dt>Data Fim:</dt>
	<dd class="mb-2"><?php echo date("d/m/Y", strtotime($contrato['dataFim'])); ?></dd>

	<dt>Condominio:</dt>
	<dd class="mb-2">R$ <?php echo number_format($contrato['condominio'],2,",","."); ?></dd>

	<dt>IPTU:</dt>
	<dd class="mb-2">R$ <?php echo number_format($contrato['iptu'],2,",","."); ?></dd>

	<dt>Taxa Administração:</dt>
	<dd>R$ <?php echo number_format($contrato['taxaAdministracao'],2,",","."); ?></dd>
</dl>

<div id="actions" class="row">
	<div class="col-md-12">
	  <!-- <a href="edit.php?id=<?php echo $contrato['id']; ?>" class="btn btn-primary">Editar</a> -->
	  <a href="index.php" class="btn btn-secondary">Voltar</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>