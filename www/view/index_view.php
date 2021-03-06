<?php header('X-FRAME-OPTIONS: DENY'); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>

  <title>商品一覧</title>
  <link rel="stylesheet" href="<?php hprint(STYLESHEET_PATH . 'index.css'); ?>">
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>

  <div class="container">
    <h1>商品一覧</h1>

    <?php include VIEW_PATH . 'templates/messages.php'; ?>
    <?php include VIEW_PATH . 'templates/index_pagination.php'; ?>

    <div class="text-right"><?php hprint($display_index); ?></div>
    <div class="card-deck mb-4">
      <div class="row">
      <?php foreach($items as $item){ ?>
        <div class="col-6 item">
          <div class="card h-100 text-center">
            <div class="card-header">
              <?php hprint($item['name']); ?>
            </div>
            <figure class="card-body">
              <img class="card-img" src="<?php hprint(IMAGE_PATH . $item['image']); ?>">
              <figcaption>
                <?php hprint(number_format($item['price'])); ?>円
                <?php if($item['stock'] > 0){ ?>
                  <form action="index_add_cart.php" method="post">
                    <input type="submit" value="カートに追加" class="btn btn-primary btn-block">
                    <input type="hidden" name="item_id" value="<?php hprint($item['item_id']); ?>">
                    <input type="hidden" name="token" value="<?php hprint($token) ?>" />
                  </form>
                <?php } else { ?>
                  <p class="text-danger">現在売り切れです。</p>
                <?php } ?>
              </figcaption>
            </figure>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>

    <?php include VIEW_PATH . 'templates/index_pagination.php'; ?>
    
  </div>

</body>
</html>