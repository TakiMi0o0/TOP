<?php
require_once('common.php');

$id = $_GET["id"];
show_top("社員情報の削除");
show_delete($id, $status);
show_down(true);
?>