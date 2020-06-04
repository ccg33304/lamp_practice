<?php
require_once '../conf/const.php';
require_once '../model/functions.php';
require_once '../model/user.php';
require_once '../model/item.php';

session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$user = get_login_user($db);

// トークン生成
$token = get_csrf_token();


/**
 * ここからページネーションの処理
 */

// 現在のページ番号を取得
$current_page = get_get('page');

// ページ番号の値が整数値でなければ1にする
if (is_positive_integer($current_page) === false) {
  $current_page = 1;
}

// 以降の処理の為にINT型にキャスト
$current_page = (int) $current_page;

// 商品データ取得のLIMIT句に指定する、オフセットとカウントを設定
$limit_offset = ($current_page - 1) * DISPLAY_ITEM_NUM;
$limit_count  = DISPLAY_ITEM_NUM;
$limit = array(
  'offset' => $limit_offset,
  'count'  => $limit_count
);

// 商品データ取得
$items       = get_open_items($db, $limit);

// 全体の商品数取得
$items_count = get_open_items_count($db)['count'];

// 総ページ数の計算
$pages = (int) ceil($items_count / DISPLAY_ITEM_NUM);

// 前のページ番号
$prev = $current_page === 1 ? 1 : $current_page - 1;
// 次のページ番号
$next = $current_page === $pages ? $pages : $current_page + 1;

// 画面に表示するインデックス
$first = ($current_page - 1) * DISPLAY_ITEM_NUM + 1;
$last  = ($current_page - 1) * DISPLAY_ITEM_NUM + DISPLAY_ITEM_NUM;
// $lastの値が商品の総数を超えている場合、$lastを商品の総数と同じにする
if ($last > $items_count) {
  $last = $items_count;
}

$display_index = "{$items_count}件中 {$first} - {$last}件目の商品";

include_once VIEW_PATH . 'index_view.php';