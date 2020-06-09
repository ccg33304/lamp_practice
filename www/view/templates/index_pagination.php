
<nav>
  <ul class="pagination justify-content-center">
    <li class="page-item"><a class="page-link" href="?page=<?php hprint($prev); ?>">前へ</a></li>
<?php for ($i = 1; $i <= $pages; $i++) { ?>
    <li class="page-item <?php hprint($current_page === $i ? 'active' : ''); ?>">
      <a class="page-link" href="?page=<?php hprint($i) ?>"><?php hprint($i) ?></a>
    </li>
<?php } ?>
    <li class="page-item"><a class="page-link" href="?page=<?php hprint($next); ?>">次へ</a></li>
  </ul>
</nav>