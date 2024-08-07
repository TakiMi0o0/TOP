<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="direction" content="">
  <title>完了ページ | HP</title>
  <link rel="stylesheet" href="/PHP/reset.css">
  <link rel="stylesheet" href="/PHP/stylesheet.css">
</head>

<body>
  <!--  ヘッダー&メインイメージ  -->
  <header>
    <div class="header-main">
      <h1 class="header-left">ここには会社名が入ります</h1>
      <div class="header-right">
        <a href="#"><div class="left-btn">ボタン01</div></a>
        <a href="#"><div class="right-btn">ボタン02</div></a>
      </div>
    </div>
    <ul class="header-menu">
    <li class="menu01"><a href="/php/tasks">Tasks</a></li>
      <li class="menu02"><a href="#">メニュー02</a></li>
      <li class="menu02"><a href="#">メニュー03</a></li>
    </ul>
  </header>
  <div class="main-image">
    <img src="/PHP/images/mv_contact.png" alt="">
  </div>
  <div class="contact">
    <div class="contact-text">
      <h2 class="contact-text-title">お問い合わせ</h2>

      <?php
        try {
          $pdo = new PDO(
            'mysql:host=localhost;dbname=consumer;charset=utf8mb4',
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
          //     id         INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
          //     name       VARCHAR(64) NOT NULL,
          //     kana       VARCHAR(64) NOT NULL,
          //     email      VARCHAR(128) NOT NULL,
          //     phone      VARCHAR(11) NOT NULL,
          //     selected   VARCHAR(64) NOT NULL,
          //     detail     VARCHAR(256) NOT NULL,
          //     agree      VARCHAR(1) NOT NULL,
          //     created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
          //   )"
          // );

          $name = $_POST["name"];
          $kana = $_POST["kana"];
          $email = $_POST["email"];
          $phone = $_POST["phone"];
          $selected = $_POST["selected"];
          $detail = $_POST["detail"];
          $agree = $_POST["agree"];
          $params = [
            'id' => null,
            'name' => $name,
            'kana' => $kana,
            'email' => $email,
            'phone' => $phone,
            'selected' => $selected,
            'detail' => $detail,
            'agree' => $agree,
            'created_at' => null
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
          // var_dump($params);
    
          $pdo->commit();
          $result = $stmt->fetchALL();
          // var_dump($result);

        } catch(PDOException $e) {
          echo $e->getMessage() . '<br>';
          exit;
        }
      ?>
      
      <h2 class="form_sent">送信完了しました。</h2>
    </div>
  </div>

  <!--  リンク  -->
  <div class="links">
    <div class="link-left">
      <div class="link_text">こちらからご購入ください</div>
      <a href="#"><div class="left-btn">ネットショップ</div></a>
    </div>
    <div class="link-right">
      <div class="link_text">お気軽にお問い合わせください</div>
      <a href="/PHP/contact"><div class="right-btn">お問い合わせ</div></a>
    </div>
  </div>

  <!--  フッター  -->
  <footer>
    <div class="company-prof">
      <div class="company-name">ここには会社名が入ります</div>
      <div class="company-address">住所が入ります</div>
      <div class="company-phone">03-1234-5678</div>
      <div class="company-time">営業時間：9:00～18:00</div>
    </div>
    <div class="footer-menu">
      <ul class="footer-links">
        <li class="footer-link01"><a href="#">リンク01</a></li>
        <li class="footer-link02"><a href="#">リンク02</a></li>
        <li class="footer-link03"><a href="#">リンク03</a></li>
        <li class="footer-link04"><a href="#">リンク04</a></li>
        <li class="footer-link05"><a href="#">リンク05</a></li>
        <li class="footer-link06"><a href="#">リンク06</a></li>
      </ul>
      <ul class="footer-links">
        <li class="footer-link07"><a href="#">リンク07</a></li>
      </ul>
    </div>
    <p class="footer-text">ここには会社名が入ります©Copyright.</p>
  </footer>
</body>
</html>