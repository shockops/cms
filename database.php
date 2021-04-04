<?php
class DB {
  private $pdo = null;
  private $stmt = null;

  function __construct(){
    try {
      $this->pdo = new PDO(
        "mysql:host=127.0.0.1;dbname=admin;charset=utf8", "root", "", [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
          PDO::ATTR_EMULATE_PREPARES => false,
        ]
      );
    } catch (Exception $ex) { die($ex->getMessage()); }
  }

  function __destruct(){
    if ($this->stmt!==null) { $this->stmt = null; }
    if ($this->pdo!==null) { $this->pdo = null; }
  }

  function select($sql, $cond=null){
    $result = false;
    try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute($cond);
      $result = $this->stmt->fetchAll();
    } catch (Exception $ex) { die($ex->getMessage()); }
    $this->stmt = null;
    return $result;
  }

  function exec($sql, $data=null) {
      try {
        $this->stmt = $this->pdo->prepare($sql);
        $this->stmt->execute($data);
        $this->lastID = $this->pdo->lastInsertId();
      } catch (Exception $ex) {
        $this->error = $ex;
        return false;
      }
      $this->stmt = null;
      return true;
    }
} 
?>
