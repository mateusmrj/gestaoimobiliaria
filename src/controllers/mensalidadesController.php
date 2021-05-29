<?php

require_once('../../config.php');
require_once(DBAPI);

$mensalidades = null;
$mensalidade = null;

/**
 *  Listagem de mensalidades
 */
function index()
{
	global $mensalidades;
  $id = $_GET['id'];
  $where = "idContrato = ". $id;
	$mensalidades = findWhere('mensalidades','mensalidades.*',null,$where);
}

function pagar($id,$flag, $contrato)
{
  global $mensalidade;
  $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));

  $mensalidade = update('mensalidades', $id, ['flagPg' => $flag, 'modified' => $now->format("Y-m-d H:i:s")]);

  header('location: index.php?id='.$contrato);
}