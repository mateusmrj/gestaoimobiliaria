<?php

require_once('../../config.php');
require_once(DBAPI);

$proprietarios = null;
$proprietario = null;
/**
 *  Listagem de proprietarios
 */
function index()
{
	global $proprietarios;
	$proprietarios = findAll('proprietarios');
}


/**
 *  Cadastro de proprietarios
 */
function add()
{
  if (!empty($_POST['proprietario']))
  {
    
    $today = 
      date_create('now', new DateTimeZone('America/Sao_Paulo'));

    $proprietario = $_POST['proprietario'];
    $proprietario['modified'] = $proprietario['created'] = $today->format("Y-m-d H:i:s");
    
    save('proprietarios', $proprietario);
    header('location: index.php');
  }
}

/**
 *	Atualizacao/Edicao de proprietario
 */
function edit()
{
  $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));

  if (isset($_GET['id']))
  {

    $id = $_GET['id'];

    if (isset($_POST['proprietario'])) {

      $proprietario = $_POST['proprietario'];
      $proprietario['modified'] = $now->format("Y-m-d H:i:s");

      update('proprietarios', $id, $proprietario);
      header('location: index.php');
    } else {

      global $proprietario;
      $proprietario = find('proprietarios', $id);
    } 
  } else
  {
    header('location: index.php');
  }
}

/**
 *  Visualização de um proprietario
 */
function view($id = null)
{
  global $proprietario;
  $proprietario = find('proprietarios', $id);
}
/**
 *  Exclusão de um proprietario
 */
function delete($id = null)
{

  global $proprietario;
  $proprietario = remove('proprietarios', $id);

  header('location: index.php');
}