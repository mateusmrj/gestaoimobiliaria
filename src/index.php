<?php require_once 'config.php'; ?>
<?php require_once DBAPI; ?>

<?php include(HEADER_TEMPLATE); ?>
<?php $db = openDatabase(); ?>

<h1>Dashboard</h1>
<hr />

<?php if ($db) : ?>

<div class="row align-items-center">
	<div class="col-xs-6 col-sm-3 col-md-2">
		<a href="page/clientes/" class="btn btn-default shadow">
			<div class="row">
				<div class="col-xs-12 text-center">
					<i class="fa fa-user fa-5x"></i>
				</div>
				<div class="col-xs-12 text-center">
					<p>Clientes</p>
				</div>
			</div>
		</a>
	</div>

	<div class="col-xs-6 col-sm-3 col-md-2">
		<a href="page/proprietarios/" class="btn btn-default shadow">
			<div class="row">
				<div class="col-xs-12 text-center">
					<i class="fa fa-user fa-5x"></i>
				</div>
				<div class="col-xs-12 text-center">
					<p>Proprietários</p>
				</div>
			</div>
		</a>
	</div>

	<div class="col-xs-6 col-sm-3 col-md-2">
		<a href="page/imoveis/" class="btn btn-default shadow">
			<div class="row">
				<div class="col-xs-12 text-center">
					<i class="fa fa-home fa-5x"></i>
				</div>
				<div class="col-xs-12 text-center">
					<p>Imóveis</p>
				</div>
			</div>
		</a>
	</div>

	<div class="col-xs-6 col-sm-3 col-md-2">
		<a href="page/contratos/" class="btn btn-default shadow">
			<div class="row">
				<div class="col-xs-12 text-center">
					<i class="fa fa-file-text-o fa-5x"></i>
				</div>
				<div class="col-xs-12 text-center">
					<p>Contratos</p>
				</div>
			</div>
		</a>
	</div>
</div>

<?php else : ?>
	<div class="alert alert-danger" role="alert">
		<p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
	</div>

<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>