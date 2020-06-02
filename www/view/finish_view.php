<?php header('X-FRAME-OPTIONS: DENY'); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>ご購入ありがとうございました！</title>
  <link rel="stylesheet" href="<?php hprint(STYLESHEET_PATH . 'admin.css'); ?>">
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>


  <div class="container">
    <?php include VIEW_PATH . 'templates/messages.php'; ?>

    <?php if ($purchase_success) { ?>
        <h1>ご購入ありがとうございました！</h1>
        <table class="table table-bordered">
          <thead class="thead-light">
            <tr>
              <th>商品画像</th>
              <th>商品名</th>
              <th>価格</th>
              <th>購入数</th>
              <th>小計</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($carts as $cart){ ?>
            <tr>
              <td><img src="<?php hprint(IMAGE_PATH . $cart['image']);?>" class="item_image"></td>
              <td><?php hprint($cart['name']); ?></td>
              <td><?php hprint(number_format($cart['price'])); ?>円</td>
              <td>
                  <?php hprint($cart['amount']); ?>個
              </td>
              <td><?php hprint(number_format($cart['price'] * $cart['amount'])); ?>円</td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        <p class="text-right">合計金額: <?php hprint(number_format($total_price)); ?>円</p>
    <?php } ?>
  </div>
</body>
</html>