<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>ユーザー情報 - セキュリティテストサイト</title>
  </head>
  <body>
    <header><h1>セキュリティテストサイト</h1></header>
    <section>
      <h2>ユーザー情報　変更確認</h2>
      <p>この内容で変更します。</p>
      <form>
        <p>
          アカウント：<?php echo $user->id; ?><br>
          パスワード：●●●●<br>
          <input type="submit" formaction="/user/input.html" value="戻る">
          <input type="submit" formaction="/user/complate.html" value="変更">
        <p>
      </form>
    </section>
    <footer>Copyright (C) 2014 Careritz&amp;Partners All Rights Reserved.</footer>
  </body>
</html>
