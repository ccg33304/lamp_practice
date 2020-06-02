<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'order.php';

session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db       = get_db_connect();
$user     = get_login_user($db);
$order_id = get_get('order_id');

$order         = get_order($db, $user, $order_id);
$order_details = get_order_details($db, $user, $order_id);

if ($order === false || $order_details === false) {
  set_error('購入明細の取得に失敗しました');
}

include_once VIEW_PATH . 'order_details_view.php';