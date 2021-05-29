<?php

/**
 * 	Funcoes de Banco de Dados
 */

mysqli_report(MYSQLI_REPORT_STRICT);

/**
 *	Executa a conexao com o DB
 */
function openDatabase()
{
  try {
    // Create connection
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    return $conn;
  } catch (Exception $e) {

    echo $e->getMessage();
    return null;
  }
}

/**
 *	Fecha a conexao com o DB
 */
function closeDatabase($conn)
{
  try {

    mysqli_close($conn);
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}

/**
 *  Pesquisa um Registro pelo ID em uma Tabela
 */
function find($table = null, $id = null)
{
  $database = openDatabase();
  $found = null;

  try {
    if ($id) {
      $sql = "SELECT * FROM " . $table . " WHERE id = " . $id;
      $result = $database->query($sql);

      if ($result->num_rows > 0) {
        $found = $result->fetch_assoc();
      }
    } else {

      $sql = "SELECT * FROM " . $table;
      $result = $database->query($sql);

      if ($result) {
        //if ($result->num_rows > 0) {
        $found = $result->fetch_all(MYSQLI_ASSOC);
        //}
      }
    }
  } catch (Exception $e) {
    $_SESSION['message'] = $e->GetMessage();
    $_SESSION['type'] = 'danger';
  }

  closeDatabase($database);
  return $found;
}

/**
 *  Pesquisa Todos os Registros de uma Tabela
 */
function findAll($table)
{
  return find($table);
}

/**
 *  Pesquisa Todos os Registros de uma Tabela
 */
function findWhere($table, $rows = '*', $join = null, $where = null, $order = null, $limit = null)
{
  // Create query from the variables passed to the function
  $database = openDatabase();
  $found = null;

  try {
    $sql = 'SELECT ' . $rows . ' FROM ' . $table;
    if ($join != null) {
      foreach($join as $j){
        $sql .= ' JOIN '. $j;
      }
    }
    if ($where != null) {
      $sql .= ' WHERE ' . $where;
    }
    if ($order != null) {
      $sql .= ' ORDER BY ' . $order;
    }
    if ($limit != null) {
      $sql .= ' LIMIT ' . $limit;
    }

    $result = $database->query($sql);

    if ($result) {
      //if ($result->num_rows > 0) {
      $found = $result->fetch_all(MYSQLI_ASSOC);
      //}
    }
    
  } catch (Exception $e) {
    $_SESSION['message'] = $e->GetMessage();
    $_SESSION['type'] = 'danger';
  }
  
  closeDatabase($database);
  return $found;
}


/**
 *  Insere um registro no BD
 */
function save($table = null, $data = null)
{
  $database = openDatabase();

  $columns = null;
  $values = null;

  //print_r($data);

  foreach ($data as $key => $value) {
    $columns .= trim($key, "'") . ",";
    $values .= "'$value',";
  }

  // remove a ultima virgula
  $columns = rtrim($columns, ',');
  $values = rtrim($values, ',');

  $sql = "INSERT INTO " . $table . "($columns)" . " VALUES " . "($values);";

  try {
    $database->query($sql);

    $_SESSION['message'] = 'Registro cadastrado com sucesso.';
    $_SESSION['type'] = 'success';
    $_SESSION['idInsert'] = $database->insert_id;
  } catch (Exception $e) {

    $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
    $_SESSION['type'] = 'danger';
  }

  closeDatabase($database);
}

/**
 *  Atualiza um registro em uma tabela, por ID
 */
function update($table = null, $id = 0, $data = null)
{
  $database = openDatabase();

  $items = null;

  foreach ($data as $key => $value) {
    $items .= trim($key, "'") . "='$value',";
  }

  // remove a ultima virgula
  $items = rtrim($items, ',');

  $sql  = "UPDATE " . $table;
  $sql .= " SET $items";
  $sql .= " WHERE id=" . $id . ";";

  try {
    $database->query($sql);

    $_SESSION['message'] = 'Registro atualizado com sucesso.';
    $_SESSION['type'] = 'success';
  } catch (Exception $e) {

    $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
    $_SESSION['type'] = 'danger';
  }

  closeDatabase($database);
}
/**
 *  Remove uma linha de uma tabela pelo ID do registro
 */
function remove($table = null, $id = null)
{
  $database = openDatabase();

  try {
    if ($id) {

      $sql = "DELETE FROM " . $table . " WHERE id = " . $id;
      $result = $database->query($sql);

      if ($result = $database->query($sql)) {
        $_SESSION['message'] = "Registro Removido com Sucesso.";
        $_SESSION['type'] = 'success';
      }
    }
  } catch (Exception $e) {

    $_SESSION['message'] = $e->GetMessage();
    $_SESSION['type'] = 'danger';
  }

  closeDatabase($database);
}
