<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>家計簿アプリDB版（入力画面）</title>
</head>

<body>
  <form action="create.php" method="POST">
    <fieldset>
      <legend>家計簿アプリDB版（入力画面）</legend>
      <a href="select.php">一覧画面</a>
      <div>
        item: <input type="text" name="item">
      </div>
      <div>
        price: <input type="int" name="price"> yen
      </div>
      <div>
        date: <input type="date" name="date">
      </div>
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>

</body>

</html>