<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="direction" content="">
  <title>完了ページ | HP</title>
</head>
<body>
<?php
  try {
    $pdo = new PDO(
      'mysql:host=localhost;dbname=company;charset=utf8mb4',
      'root',
      'root',
      [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
      ]
    );

    // $pdo->query("DROP TABLE IF EXISTS form");
    // $pdo->query(
    //   "CREATE TABLE form(
    //     id   INT AUTO_INCREMENT PRIMARY KEY,
    //     name VARCHAR(128)
    //   )"
    // );

    $name = $_POST["name"];
    $params = [
      'id' => null,
      'name' => $name
    ];

    foreach(array_keys($params) as $key){
      if($count++>0){
          $columns .= ',';
          $values .= ',';
      }
      $columns .= $key;
      $values .= ':'.$key;
    }

    $pdo->beginTransaction();
    $sql = 'INSERT INTO form ('. $columns .') VALUES('. $values .')';
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    var_dump($params);
    
    $pdo->commit();
    $result = $stmt->fetchALL();
    var_dump($result);

  } catch(PDOException $e) {
    echo $e->getMessage() . '<br>';
    exit;
  }
?>
  <h2>送信完了しました。</h2>
</body>