<?php 
  require_once("../../controllers/repassesController.php");

  if (isset($_GET['id'])){
    pagar($_GET['id'], $_GET['flag'], $_GET['contrato']);
  } else {
    die("ERRO: ID não definido.");
  }
?>