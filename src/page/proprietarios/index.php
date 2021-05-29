<?php
    require_once('../../controllers/proprietariosController.php');
    index();
?>

<?php include(HEADER_TEMPLATE); ?>

<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>Proprietários</h2>
		</div>
		<div class="col-sm-6 text-end h2">
	    	<a class="btn btn-primary" href="add.php"><i class="fa fa-plus"></i> Novo proprietário</a>
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
		<th>Nome</th>
		<th>E-mail</th>
		<th>Telefone</th>
		<th>Dia para repasse</th>
		<th>Atualizado em</th>
		<th>Opções</th>
	</tr>
</thead>
<tbody>
<?php if ($proprietarios) : ?>
<?php foreach ($proprietarios as $proprietario) : ?>
	<tr>
		<td><?php echo $proprietario['id']; ?></td>
		<td><?php echo $proprietario['nome']; ?></td>
		<td><?php echo $proprietario['email']; ?></td>
		<td><?php echo $proprietario['telefone']; ?></td>
		<td class="text-center"><?php echo $proprietario['repasse']; ?></td>
		<td><?php echo date("d/m/Y H:i", strtotime($proprietario['modified'])); ?></td>
		<td class="actions text-right">
			<a href="view.php?id=<?php echo $proprietario['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
			<a href="edit.php?id=<?php echo $proprietario['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
			<a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete-modal" data-customer="<?php echo $proprietario['id']; ?>">
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