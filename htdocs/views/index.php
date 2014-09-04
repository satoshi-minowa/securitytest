<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>ログイン - セキュリティテストサイト</title>
  </head>
  <body>
    <header><h1>セキュリティテストサイト</h1></header>
    <section>
      <h2>ログイン</h2>
      <p>ログインしてください</p>
      <p><span style="color:red"><?php echo @$errors; ?></span></p>
      <form method="post" action="/login.html">
        <p>
          アカウント：<input type="text" name="id"><br>
          パスワード：<input type="password" name="password"><br>
          <input type="submit" value="ログイン">
          <input type="hidden" name="next" value="<?php echo htmlentities(@$next, ENT_QUOTES, mb_internal_encoding()); ?>">
        <p>
      </form>
      <p>新規登録は<a href="/user/regist.html">こちら</a>から</p>
    </section>
    <footer>Copyright (C) 2014 Careritz&amp;Partners All Rights Reserved.</footer>
  </body>
</html>
