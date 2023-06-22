<?php

// DB接続
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
$sql = 'SELECT * FROM info_table ORDER BY date DESC';

$stmt = $pdo->prepare($sql);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

// SQL実行の処理
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$output = "";
foreach ($result as $record) {
  $output .= "
    <tr>
      <td>{$record["item"]}</td>
      <td>{$record["price"]}</td>
      <td>{$record["date"]}</td>
    </tr>
  ";
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>家計簿アプリDB版（一覧画面）</title>
</head>

<body>
  <fieldset>
    <legend>家計簿アプリDB版（一覧画面）</legend>
    <a href="input.php">入力画面</a>
    <table>
      <thead>
        <tr>
          <th>item</th>
          <th>price</th>
          <th>date</th>
        </tr>
      </thead>
      <tbody>
        <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
            <?= $output ?>
      </tbody>
    </table>
  </fieldset>
</body>

</html>