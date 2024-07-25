<?php
  try {
    $pdo = new PDO(
      'mysql:host=localhost;dbname=company;charset=utf8mb4',
      'root',
      'root'
    );

    $pdo->query("DROP TABLE IF EXISTS syain");
    $pdo->query(
      "CREATE TABLE syain(
        id    INT PRIMARY KEY,
        name  VARCHAR(128),
        age   INT,
        work  VARCHAR(64)
      )"
    );
  } catch(PDOException $e) {
    echo $e->getMessage() . '<br>';
    exit;
  }

?>