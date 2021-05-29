<?php

require_once('../../config.php');
require_once(DBAPI);

$contratos = null;
$contrato = null;
$imoveis = null;
$clientes = null;
$proprietarios = null;
/**
 *  Listagem de contratos
 */
function index()
{
	global $contratos;
	$contratos = findWhere('contratos','contratos.id, dataInicio, dataFim, valor, imoveis.endereco, proprietarios.nome as locador, clientes.nome as locatario',
    array('proprietarios ON proprietarios.id = contratos.idProprietario', 'imoveis ON imoveis.id =  contratos.idImovel','clientes ON clientes.id =  contratos.idCliente'),null,'id ASC'
  );
}

/**
 *  Cadastro de contratos
 */
function add()
{
  if (!empty($_POST['contrato']))
  {
    list($_POST['contrato']['idImovel'], $_POST['contrato']['idProprietario']) = explode(";",$_POST['contrato']['imovel']);
    unset($_POST['contrato']['imovel']);
    
    //calcula data fim
    $_POST['contrato']['dataFim'] = 
      date('Y-m-d', strtotime($_POST['contrato']['dataInicio']."+1  year"));

    $today = date_create('now', new DateTimeZone('America/Sao_Paulo'));

    $contrato = $_POST['contrato'];
    $contrato['modified'] = $contrato['created'] = $today->format("Y-m-d H:i:s");
    
    save('contratos', $contrato);
    geraInfoContratos($_SESSION['idInsert'],$_POST['contrato']);
    header('location: index.php');
  }

  global $imoveis;
  $imoveis = findAll('imoveis');

  global $clientes;
  $clientes = findAll('clientes');
}

/**
 * Gera dados da mensalidade e repasses
 */
function geraInfoContratos($idContrato, array $dados)
{
  //mensalidade = taxas de aluguel, IPTU e Condomínio
  $valorMensalidade = $primeiraMensalidade = $dados['valor'] + $dados['condominio'] + $dados['iptu'];
  //repasse = valorMensalidade menos taxas de administracao e Condomínio
  $valorRepasse = $primeiroRepasse = $valorMensalidade - $dados['condominio'] - $dados['taxaAdministracao'];
  
  $diaRepasse = getDataRepasse($dados['idProprietario']);
  $inicioRepasse = date('Y-m', strtotime($dados['dataInicio']))."-".$diaRepasse;

  $diaInicio = date('d', strtotime($dados['dataInicio']));
  $i = 0;

  $dataPrimeira = $dados['dataInicio'];
  //calcula desconto para caso o inicio não seja dia primeiro
  if($diaInicio > 1){
    $valorDia = $dados['valor']/30;//$valorMensalidade/30;
    $desconto = $valorDia * $diaInicio;
    $primeiraMensalidade = $valorMensalidade - $desconto;
    $primeiroRepasse = $primeiraMensalidade - $dados['condominio'] - $dados['taxaAdministracao'];
    $aux = $diaInicio-1;
    $dados['dataInicio'] = date('Y-m-d', strtotime($dados['dataInicio']."-$aux  day"));
  }

  $today = date_create('now', new DateTimeZone('America/Sao_Paulo'));
  
  while($i <= 11){
    $dataMensalidade = date('Y-m-d', strtotime($dados['dataInicio']."+$i  month"));
    $dataRepasse = date('Y-m-d', strtotime($inicioRepasse."+$i  month"));
    if($i==0){
      $mensalidade = [
        'parcela' => $i + 1,
        'valor' => $primeiraMensalidade,
        'vencimento' => $dataPrimeira,
      ];

      $repasse = [
        'parcela' => $i + 1,
        'valor' => $primeiroRepasse,
        'vencimento' => $dataRepasse,
      ];
    }else{
      $mensalidade = [
        'parcela' => $i + 1,
        'valor' => $valorMensalidade,
        'vencimento' => $dataMensalidade,
      ];

      $repasse = [
        'parcela' => $i + 1,
        'valor' => $valorRepasse,
        'vencimento' => $dataRepasse,
      ];
    }

    $mensalidade['idContrato'] = $repasse['idContrato'] = $idContrato;
    $mensalidade['modified'] = $mensalidade['created'] = $today->format("Y-m-d H:i:s");
    $repasse['modified'] = $repasse['created'] = $today->format("Y-m-d H:i:s");

    save('mensalidades',$mensalidade);
    save('repasses',$repasse);
    $i++;
  }
}

/**
 * Pega data de repasse do proprietário
 */
function getDataRepasse($id)
{
  $proprietario = find('proprietarios', $id);
  return $proprietario['repasse'];
}

/**
 *  Visualização de um contrato
 */
function view($id = null)
{
  global $contrato;
  //$contrato = find('contratos', $id);
  $where = 'contratos.id = '.$id;
  $contrato = findWhere('contratos','contratos.*, valor, imoveis.endereco, proprietarios.nome as locador, clientes.nome as locatario',
    array('proprietarios ON proprietarios.id = contratos.idProprietario', 'imoveis ON imoveis.id =  contratos.idImovel','clientes ON clientes.id =  contratos.idCliente'),
    $where
  );
  $contrato = $contrato['0'];
}