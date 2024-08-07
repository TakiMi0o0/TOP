<?php
  session_start();
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $errorMessage = '';
  }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="direction" content="">
  <title>お問い合わせ | HP</title>
</head>
<body>
  <?php
    $switch = 0;
    $missingFields = [];
    if (empty($name)) {
      $missingFields[] = 'お名前';
    }
    if (!empty($missingFields)) {
      $switch = 1;
      $errorMessage .= '※以下の必須項目が入力されていません。<br>・' . implode('<br>・', $missingFields). '<br><br>';
    }
    if ($errorMessage) {
      echo '<div style="color:red; text-align:center;">' . $errorMessage . '</div>';
    }
  ?>

  <form action=<?php if ($switch === 0){ echo "test2.php";} else { echo "test1.php";} ?> method="post">
    <div class="contacts">
      <label for="name">お名前</label><input type="text" placeholder="山田太郎" id="name" name="name" value="<?php echo $name ?>">
    </div>
    <div class="form_submit">
      <input type="submit" value=<?php if ($switch === 0){ echo "送信する";} else { echo "確認する";} ?> class="confirmation">
    </div>
  </form>
</body>