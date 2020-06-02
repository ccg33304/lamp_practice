<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <title>商品管理</title>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
</head>
<body>
  <div class="container">
    <h1>商品管理</h1>
    <form
      method="post"
      action="admin_insert_item.php"
      enctype="multipart/form-data"
      class="add_item_form col-md-6">
      <div class="form-group">
        <label for="name">名前: </label>
        <input class="form-control" type="text" name="name" id="name">
      </div>
      <div class="form-group">
        <label for="price">価格: </label>
        <input class="form-control" type="number" name="price" id="price">
      </div>
      <div class="form-group">
        <label for="stock">在庫数: </label>
        <input class="form-control" type="number" name="stock" id="stock">
      </div>
      <div class="form-group">
        <label for="image">商品画像: </label>
        <input type="file" name="image" id="image">
      </div>
      <div class="form-group">
        <label for="status">ステータス: </label>
        <select class="form-control" name="status" id="status">
          <option value="open">公開</option>
          <option value="close">非公開</option>
        </select>
      </div>

      <input type="submit" value="商品追加" class="btn btn-primary">
      <!-- <input type="hidden" name="token" value="" /> -->
    </form>
    <h1>カート</h1>
    <form method="post" action="cart_change_amount.php" id="amount_hack">
      <input type="number" name="amount" value="1000">
      個
      <input type="submit" value="変更" class="btn btn-secondary">
      <input type="hidden" name="cart_id" value="13">
    </form>

    <form method="post" action="cart_delete_cart.php" id="delete_hack">
      <input type="submit" value="削除" class="btn btn-danger delete">
      <input type="hidden" name="cart_id" value="13">
    </form>

    <form method="post" action="finish.php">
        <input class="btn btn-block btn-primary" type="submit" value="購入する">
    </form>

    <h1>商品一覧</h1>
    <form action="index_add_cart.php" method="post">
      <input type="submit" value="カートに追加" class="btn btn-primary btn-block">
      <input type="hidden" name="item_id" value="32">
    </form>

    <h1>ログイン</h1>
    <form method="post" action="login_process.php" class="login_form mx-auto">
      <div class="form-group">
        <label for="name">名前: </label>
        <input type="text" name="name" id="name" class="form-control">
      </div>
      <div class="form-group">
        <label for="password">パスワード: </label>
        <input type="password" name="password" id="password" class="form-control">
      </div>
      <input type="submit" value="ログイン" class="btn btn-primary">
    </form>

    <h1>サインアップ</h1>
    <form method="post" action="signup_process.php" class="signup_form mx-auto">
      <div class="form-group">
        <label for="name">名前: </label>
        <input type="text" name="name" id="name" class="form-control">
      </div>
      <div class="form-group">
        <label for="password">パスワード: </label>
        <input type="password" name="password" id="password" class="form-control">
      </div>
      <div class="form-group">
        <label for="password_confirmation">パスワード（確認用）: </label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
      </div>
      <input type="submit" value="登録" class="btn btn-primary" id="submit-hack">
    </form>
  </div>
  <script>
    $(() => {
      // $('#amount_hack').submit();
      // $('#delete_hack').submit();
      $('#submit-hack').on('click', () => {
        alert('hacked');
      });
    });
  </script>
</body>
</html>