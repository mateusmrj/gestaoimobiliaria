<?php

require_once('../../config.php');
require_once(DBAPI);

$imoveis = null;
$imovel = null;
$proprietarios = null;
$cidades = null;
$bairros = null;
/**
 *  Listagem de imoveis
 */
function index()
{
	global $imoveis;
  $imoveis =  findWhere('imoveis','imoveis.*, proprietarios.nome',array('proprietarios ON imoveis.idProprietario = proprietarios.id'), null,'id ASC');
}

/**
 *  Cadastro de imoveis
 */
function add()
{
  if (!empty($_POST['imovel']))
  {
    $today = date_create('now', new DateTimeZone('America/Sao_Paulo'));

    $imovel = $_POST['imovel'];
    $imovel['modified'] = $imovel['created'] = $today->format("Y-m-d H:i:s");

    save('imoveis', $imovel);
    //var_dump($_SESSION['idInsert']); exit;
    header('location: index.php');
  }
  
  global $proprietarios;
  $proprietarios = findAll('proprietarios');

  getImoveisVista();
  
}


/**
 *  Cadastro de imoveis por busca de cidade
 */
function addPorCidade()
{
  if (!empty($_POST['imovel']))
  {
    
    $today = 
      date_create('now', new DateTimeZone('America/Sao_Paulo'));

    $imovel = $_POST['imovel'];
    $imovel['modified'] = $imovel['created'] = $today->format("Y-m-d H:i:s");
    
    save('imoveis', $imovel);
    header('location: index.php');
  }
  
  global $proprietarios;
  $proprietarios = findAll('proprietarios');

  getCidadesVista();

}

/**
 *	Busca de imovel api vista
 */
function getImoveisVista()
{
  global $imoveis;

  $dados = array(
    'fields' => array('Cidade', 'Categoria', 'Bairro','ValorVenda','FotoDestaque','ValorLocacao')
  );
 
  $key         =  'c9fdd79584fb8d369a6a579af1a8f681';
  $postFields  =  json_encode( $dados );
  $url         =  'http://sandbox-rest.vistahost.com.br/imoveis/listar?key=' . $key;
  $url        .=  '&pesquisa=' . $postFields;
  
  $ch = curl_init($url);
  curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
  curl_setopt( $ch, CURLOPT_HTTPHEADER , array( 'Accept: application/json' ) );
  $result = curl_exec( $ch );
  $imoveis = json_decode( $result, true );
  
}

/**
 *	Busca de cidade api vista
 */
function getCidadesVista()
{
  global $cidades;

  $dados = array(
    'fields' => array('Cidade')
  );
 
  $key         =  'c9fdd79584fb8d369a6a579af1a8f681';
  $postFields  =  json_encode( $dados );
  $url         =  'http://sandbox-rest.vistahost.com.br/imoveis/listarConteudo?key=' . $key;
  $url        .=  '&pesquisa=' . $postFields;
  
  $ch = curl_init($url);
  curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
  curl_setopt( $ch, CURLOPT_HTTPHEADER , array( 'Accept: application/json' ) );
  $result = curl_exec( $ch );
  $cidades = json_decode( $result, true );
  $cidades = $cidades["Cidade"];
  
}
/**
 * Retorna dados dos Bairros filtrados pela cidade via API vista
 */
function getBairrosVista($cidade)
{
  global $bairros;

  $dados = array(
    'fields' => array('Bairro'),
    'filter' => array("Cidade" => $cidade),
  );
 
  $key         =  'c9fdd79584fb8d369a6a579af1a8f681';
  $postFields  =  json_encode( $dados );
  $url         =  'http://sandbox-rest.vistahost.com.br/imoveis/listarConteudo?key=' . $key;
  $url        .=  '&pesquisa=' . $postFields;
  
  $ch = curl_init($url);
  curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
  curl_setopt( $ch, CURLOPT_HTTPHEADER , array( 'Accept: application/json' ) );
  $result = curl_exec( $ch );
  $bairros = json_decode( $result, true );
  $bairros = $bairros["Bairro"];

  return $bairros;
  
}

/**
 *  Exclusão de um imovel
 */
function delete($id = null)
{

  global $imovel;
  $imovel = remove('imoveis', $id);

  header('location: index.php');
}