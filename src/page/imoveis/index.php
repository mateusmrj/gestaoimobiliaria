<?php
    require_once('../../controllers/imoveisController.php');
    index();
?>

<?php include(HEADER_TEMPLATE); ?>

<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>Imovéis</h2>
		</div>
		<div class="col-sm-6 text-end h2">
	    	<a class="btn btn-primary" href="add.php"><i class="fa fa-plus"></i> Novo imóvel</a>
	    	<a class="btn btn-secondary" href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>
	    </div>
	</div>
</header>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo $_SESSION['message']; ?>
	</div>
	<?php //clear_messages(); ?>
<?php endif; ?>

<hr>

<table class="table table-hover">
<thead>
	<tr>
		<th>ID</th>
		<th>Proprietário</th>
		<th>Endeço</th>
		<th>Atualizado em</th>
		<th>Opções</th>
	</tr>
</thead>
<tbody>
<?php if ($imoveis) : ?>
<?php foreach ($imoveis as $imovel) : ?>
	<tr>
		<td><?php echo $imovel['id']; ?></td>
		<td><?php echo $imovel['nome']; ?></td>
		<td><?php echo $imovel['endereco']; ?></td>
		<td><?php echo date("d/m/Y H:i", strtotime($imovel['modified'])); ?></td>
		<td class="actions text-right">
			<a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete-modal" data-customer="<?php echo $imovel['id']; ?>">
				<i class="fa fa-trash"></i> Excluir
			</a>
		</td>
	</tr>
<?php endforeach; ?>
<?php else : ?>
	<tr>
		<td colspan="6">Nenhum registro encontrado.</td>
	</tr>
<?php endif; ?>
</tbody>
</table>

<?php include(MODAL_TEMPLATE); ?>
<?php include(FOOTER_TEMPLATE); ?>