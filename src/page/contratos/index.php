<?php
    require_once('../../controllers/contratosController.php');
    index();
?>

<?php include(HEADER_TEMPLATE); ?>

<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>Contratos</h2>
		</div>
		<div class="col-sm-6 text-end h2">
	    	<a class="btn btn-primary" href="add.php"><i class="fa fa-plus"></i> Novo Contrato</a>
	    	<a class="btn btn-secondary" href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>
	    </div>
	</div>
</header>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
		<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo $_SESSION['message']; ?>
	</div>
	<?php //clear_messages(); ?>
<?php endif; ?>

<hr>

<table class="table table-hover">
<thead>
	<tr>
		<th>id</th>
		<th class="col-3">Imóvel</th>
		<th>Locador</th>
		<th>Locatário</th>
		<th>Aluguel</th>
		<th>Início</th>
		<!-- <th>Fim</th> -->
		<th>Opções</th>
	</tr>
</thead>
<tbody>
<?php if ($contratos) : ?>
<?php foreach ($contratos as $contrato) : ?>
	<tr>
		<td><?php echo $contrato['id']; ?></td>
		<td><?php echo $contrato['endereco']; ?></td>
		<td><?php echo $contrato['locador']; ?></td>
		<td><?php echo $contrato['locatario']; ?></td>
		<td><?php echo number_format($contrato['valor'],2,",","."); ?></td>
		<td><?php echo date("d/m/Y", strtotime($contrato['dataInicio'])); ?></td>
		<!-- <td><?php echo date("d/m/Y", strtotime($contrato['dataFim'])); ?></td> -->
		<td class="actions text-right">
			<a href="view.php?id=<?php echo $contrato['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> View</a>
			<a href="/page/mensalidades/index.php?id=<?php echo $contrato['id']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-money"></i> Mensalidades</a>
			<a href="/page/repasses/index.php?id=<?php echo $contrato['id']; ?>" class="btn btn-sm btn-info"><i class="fa fa-usd"></i> Repasses</a>
			<!-- <a href="edit.php?id=<?php echo $contrato['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a> -->
			<!-- <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete-modal" data-customer="<?php echo $contrato['id']; ?>">
				<i class="fa fa-trash"></i> Excluir
			</a> -->
		</td>
	</tr>
<?php endforeach; ?>
<?php else : ?>
	<tr>
		<td colspan="7">Nenhum registro encontrado.</td>
	</tr>
<?php endif; ?>
</tbody>
</table>
<?php include(MODAL_TEMPLATE); ?>
<?php include(FOOTER_TEMPLATE); ?>