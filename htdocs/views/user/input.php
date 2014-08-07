<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>ユーザー情報 - セキュリティテストサイト</title>
  </head>
  <body>
    <header><h1>セキュリティテストサイト</h1></header>
    <section>
      <h2>ユーザー情報　変更</h2>
      <p>ユーザー情報を変更できます。</p>
      <form action="/user/confirm.html">
        <p>
          アカウント：<input type="text" name="id" value="<?php echo $user->id; ?>"><br>
          パスワード：<input type="text" name="password" value="<?php echo $user->password; ?>"><br>
          <input type="submit" value="確認">
        <p>
      </form>
      <p>
        <a href="/top.html">トップ</a>
        <a href="/logout.html">ログアウト</a>
      </p>
    </section>
    <footer>Copyright (C) 2014 Careritz&amp;Partners All Rights Reserved.</footer>
  </body>
</html>
