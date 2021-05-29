<?php
    require_once('../../controllers/repassesController.php');
    index();
?>

<?php include(HEADER_TEMPLATE); ?>

<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>Repasses</h2>
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
<?php if ($repasses) : ?>
<?php foreach ($repasses as $repasse) : ?>
	<tr>
		<td><?php echo $repasse['parcela']."ª"; ?></td>
		<td><?php echo number_format($repasse['valor'],2,",","."); ?></td>
		<td><?php echo date("d/m/Y", strtotime($repasse['vencimento'])); ?></td>
		<td><?php echo $repasse['flagPg'] ? "Pago" : "Pendente" ; ?></td>
		<td class="actions text-right">
			<a href="#" class="btn btn-sm btn-<?= $repasse['flagPg'] ? "warning" : "success" ; ?>" data-bs-toggle="modal" data-bs-target="#pg-modal" data-customer="<?php echo $repasse['flagPg'] ? 0 : 1; ?>" data-identify="<?php echo $repasse['id']; ?>" data-contrato="<?php echo $repasse['idContrato']; ?>">
				<i class="fa fa-money"></i> <?= $repasse['flagPg'] ? "Macar como pendente" : "Marcar como pago" ; ?>
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