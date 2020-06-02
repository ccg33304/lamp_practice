<?php foreach(get_errors() as $error){ ?>
  <p class="alert alert-danger"><span><?php hprint($error); ?></span></p>
<?php } ?>
<?php foreach(get_messages() as $message){ ?>
  <p class="alert alert-success"><span><?php hprint($message); ?></span></p>
<?php } ?>