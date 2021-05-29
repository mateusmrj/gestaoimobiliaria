<?php 
	require_once("../../controllers/proprietariosController.php");
	view($_GET['id']);
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Proprietário Id: <?php echo $proprietario['id']; ?></h2>
<hr>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

<dl class="row">
	<dt class="">Nome:</dt>
	<dd class="mb-3"><?php echo $proprietario['nome']; ?></dd>

	<dt>E-mail:</dt>
	<dd class="mb-3"><?php echo $proprietario['email']; ?></dd>

	<dt>Telefone:</dt>
	<dd><?php echo $proprietario['telefone']; ?></dd>
</dl>

<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="edit.php?id=<?php echo $proprietario['id']; ?>" class="btn btn-primary">Editar</a>
	  <a href="index.php" class="btn btn-secondary">Voltar</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>