<?php

function get_orders($dbh, $user) {
  $sql = '
    SELECT
      orders.order_id,
      create_datetime,
      orders.user_id,
      SUM(order_details.price * order_details.amount) as total_price
    FROM
      orders
        INNER JOIN
          order_details
        ON
          orders.order_id = order_details.order_id';

  // 管理者かそうでないかで条件が変化する
  if (is_admin($user)) {
    // 管理者なら全取得
    $sql = $sql . '
      GROUP BY
        orders.order_id';

    return fetch_all_query($dbh, $sql);
  } else {
    // 一般ユーザは自分の履歴のみ
    $sql = $sql . '
      WHERE
        orders.user_id = ?
      GROUP BY
        orders.order_id';

    return fetch_all_query($dbh, $sql, array($user['user_id']));
  }
}

function get_order($dbh, $user, $order_id) {
  $sql = '
    SELECT
      orders.order_id,
      create_datetime,
      SUM(order_details.price * order_details.amount) as total_price
    FROM
      orders
        INNER JOIN
          order_details
        ON
          orders.order_id = order_details.order_id';

  // 管理者かそうでないかで条件が変化する
  if (is_admin($user)) {
    // 管理者ならorder_idのみで取得
    $sql = $sql . '
      WHERE
        orders.order_id = ?
      GROUP BY
        orders.order_id';
    return fetch_query($dbh, $sql, array($order_id));
  } else {
    // 一般ユーザはorder_idとuser_idが一致していたら取得する
    $sql = $sql . '
      WHERE
        orders.order_id = ? AND  orders.user_id = ?
      GROUP BY
        orders.order_id';
        return fetch_query($dbh, $sql, array($order_id, $user['user_id']));
  }
}

function get_order_details($dbh, $user, $order_id) {
  $sql = '
    SELECT
      order_details.price,
      order_details.amount,
      order_details.price * order_details.amount as subtotal,
      items.name
    FROM
      order_details
        INNER JOIN
          orders
        ON
          orders.order_id = order_details.order_id
        INNER JOIN
          items
        ON
          order_details.item_id = items.item_id
    WHERE
      order_details.order_id = ?';

    // 管理者かそうでないかで分岐する
    if (is_admin($user)) {
      // 管理者ならそのまま実行
      return fetch_all_query($dbh, $sql, array($order_id));
    } else {
      // 一般ユーザは条件追加
      $sql = $sql . ' AND orders.user_id = ?';
      return fetch_all_query($dbh, $sql, array($order_id, $user['user_id']));
    }
}