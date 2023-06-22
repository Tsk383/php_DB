<?php
// POSTデータ確認
if (
  !isset($_POST['name']) || $_POST['name'] === '' ||
  !isset($_POST['money']) || $_POST['money'] === ''||
  !isset($_POST['date']) || $_POST['date'] === ''
) {
  exit('ParamError');
}

$name = $_POST['name'];
$money = $_POST['money'];
$date = $_POST['date'];

// 各種項目設定
$dbn ='mysql:dbname=php_kadai;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// DB接続
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

// SQL作成&実行
$sql = 'INSERT INTO info_table (id, name, money, date) VALUES (NULL, :name, :money, :date)';

$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':money', $money, PDO::PARAM_INT);
$stmt->bindValue(':date', $date, PDO::PARAM_STR);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

// SQL実行の処理

header('Location:input.php');
exit();