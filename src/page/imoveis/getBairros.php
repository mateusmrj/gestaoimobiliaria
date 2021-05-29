<?php 
  require_once("../../controllers/imoveisController.php");
  /**
   * busca dados dos bairros para retorno do ajax
   */
  if (isset($_POST['cidade'])){
    $bairros = getBairrosVista($_POST['cidade']);

    $options = '<option selected>Selecione</option>\n';
    foreach($bairros as $bairro){
      $options .= '<option value="'. $bairro .'">'. $bairro .'</option>\n';
    }

    echo $options;

  } else {
    die("ERRO: ID não definido.");
  }
