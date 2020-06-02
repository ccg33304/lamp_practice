<?php header('X-FRAME-OPTIONS: DENY'); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>購入履歴</title>
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <div class="container">
    <h1>購入履歴</h1>

    <?php include VIEW_PATH . 'templates/messages.php'; ?>

    <div class="container">
      <?php if (is_admin($user)) { ?>
        <p class="alert alert-info">管理者は全てのユーザの購入履歴を閲覧できます</p>
      <?php } ?>
      <table class="table table-bordered text-center">
        <thead>
          <tr>
            <th>user</th>
            <th>注文番号</th>
            <th>購入日時</th>
            <th>合計金額</th>
            <th></th>
          </tr>
          <?php foreach($orders as $order) { ?>
            <tr>
            <td><?php hprint($order['user_id']); ?></td>
              <td><?php hprint($order['order_id']); ?></td>
              <td><?php hprint($order['create_datetime']); ?></td>
              <td>&yen;<?php hprint(number_format($order['total_price'])); ?></td>
              <td>
                <form method="get" action="order_details.php">
                  <input class="btn btn-link text-black" type="submit" value="明細" />
                  <input type="hidden" name="order_id" value="<?php hprint($order['order_id']); ?>" />
                </form>
              </td>
            </tr>
          <?php } ?>
        </thead>
      </table>
    </div>

  </div>
</body>
</html>