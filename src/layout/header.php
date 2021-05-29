<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Gestão Imobiliária</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?php echo BASEURL; ?>resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>resources/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" role="navigation">
  <div class="container">
    <a href="<?php echo BASEURL; ?>" class="navbar-brand">Gestão Imobiliária</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?php echo BASEURL; ?>">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Clientes
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="<?php echo BASEURL; ?>page/clientes/">Gerenciar Clientes</a></li>
            <li><a class="dropdown-item" href="<?php echo BASEURL; ?>page/clientes/add.php">Novo Cliente</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Proprietários
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="<?php echo BASEURL; ?>page/proprietarios/">Gerenciar Proprietários</a></li>
            <li><a class="dropdown-item" href="<?php echo BASEURL; ?>page/proprietarios/add.php">Novo Proprietário</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Imóveis
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="<?php echo BASEURL; ?>page/imoveis/">Gerenciar Imóveis</a></li>
            <li><a class="dropdown-item" href="<?php echo BASEURL; ?>page/imoveis/add.php">Novo Imóvel</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Contratos
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="<?php echo BASEURL; ?>page/contratos/">Gerenciar Contratos</a></li>
            <li><a class="dropdown-item" href="<?php echo BASEURL; ?>page/contratos/add.php">Novo Contrato</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container my-md-5 bd-layout">
  <main class="container bd-main order-1">