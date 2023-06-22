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
        name: <input type="text" name="name">
      </div>
      <div>
        money: <input type="int" name="money"> yen
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