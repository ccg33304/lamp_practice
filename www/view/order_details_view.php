<?php header('X-FRAME-OPTIONS: DENY'); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>購入明細</title>
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <div class="container">
    <h1>購入明細</h1>

    <?php include VIEW_PATH . 'templates/messages.php'; ?>

    <div class="container">
      <?php if ($order) { ?>
        <p>
          注文番号：<?php hprint($order['order_id']) ?><br />
          購入日時：<?php hprint($order['create_datetime']) ?><br />
          合計金額：&yen;<?php hprint(number_format($order['total_price'])); ?>
        </p>
        <table class="table table-bordered text-center">
          <thead>
            <tr>
              <th>商品名</th>
              <th>購入時の価格</th>
              <th>購入数</th>
              <th>小計</th>
            </tr>
            <?php foreach($order_details as $detail) { ?>
              <tr>
                <td><?php hprint($detail['name']); ?></td>
                <td>&yen;<?php hprint(number_format($detail['price'])); ?></td>
                <td><?php hprint(number_format($detail['amount'])); ?></td>
                <td>&yen;<?php hprint(number_format($detail['subtotal'])); ?></td>
              </tr>
            <?php } ?>
          </thead>
        </table>
      <?php } ?>
    </div>

  </div>
</body>
</html>