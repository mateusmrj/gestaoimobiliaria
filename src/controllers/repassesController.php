<?php

require_once('../../config.php');
require_once(DBAPI);

$repasses = null;
$repasse = null;

/**
 *  Listagem de repasses
 */
function index()
{
	global $repasses;
  $id = $_GET['id'];
  $where = "idContrato = ". $id;
	$repasses = findWhere('repasses','repasses.*',null,$where);
}

function pagar($id,$flag, $contrato)
{
  global $repasse;
  $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));

  $repasse = update('repasses', $id, ['flagPg' => $flag, 'modified' => $now->format("Y-m-d H:i:s")]);

  header('location: index.php?id='.$contrato);
}