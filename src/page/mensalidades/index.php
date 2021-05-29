<?php
    require_once('../../controllers/mensalidadesController.php');
    index();
?>

<?php include(HEADER_TEMPLATE); ?>

<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>Mensalidades</h2>
		</div>
		<div class="col-sm-6 text-end h2">
			<a class="btn btn-dark" href="/page/contratos/"> Voltar</a>
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
		<th>Parcela</th>
		<th>Valor</th>
		<th>Vencimento</th>
		<th>Status</th>
		<th>Opções</th>
	</tr>
</thead>
<tbody>
<?php if ($mensalidades) : ?>
<?php foreach ($mensalidades as $mensalidade) : ?>
	<tr>
		<td><?php echo $mensalidade['parcela']."ª"; ?></td>
		<td><?php echo number_format($mensalidade['valor'],2,",","."); ?></td>
		<td><?php echo date("d/m/Y", strtotime($mensalidade['vencimento'])); ?></td>
		<td><?php echo $mensalidade['flagPg'] ? "Pago" : "Pendente" ; ?></td>
		<td class="actions text-right">
			<a href="#" class="btn btn-sm btn-<?= $mensalidade['flagPg'] ? "warning" : "success" ; ?>" data-bs-toggle="modal" data-bs-target="#pg-modal" data-customer="<?php echo $mensalidade['flagPg'] ? 0 : 1; ?>" data-identify="<?php echo $mensalidade['id']; ?>" data-contrato="<?php echo $mensalidade['idContrato']; ?>">
				<i class="fa fa-money"></i> <?= $mensalidade['flagPg'] ? "Macar como pendente" : "Marcar como pago" ; ?>
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
<?php include(MODALPG_TEMPLATE); ?>
<?php include(MODAL_TEMPLATE); ?>
<?php include(FOOTER_TEMPLATE); ?>