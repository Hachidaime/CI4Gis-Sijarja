<?php $pager->setSurroundCount(2) ?>

<!-- Start Pagination Container -->
<ul class="pagination mb-0">
  <?php if ($pager->hasPrevious()) : ?>
    <!-- Start Pagination Item -->
    <li class="page-item">
      <!-- Start Pagination Item -->
      <a class="page-link" href="javascript:void(0)" data-uri="<?= $pager->getFirst() ?>" aria-label="First">
        <span aria-hidden="true">
          <i class="fas fa-angle-double-left"></i>
        </span>
      </a>
    </li>
    <!-- End Pagination Item -->

    <!-- Start Pagination Item -->
    <li class="page-item">
      <!-- Start Pagination Item -->
      <a class="page-link" href="javascript:void(0)" data-uri="<?= $pager->getPrevious() ?>" aria-label="Previous">
        <span aria-hidden="true">
          <i class="fas fa-angle-left"></i>
        </span>
      </a>
    </li>
    <!-- End Pagination Item -->
  <?php endif ?>

  <?php foreach ($pager->links() as $link) : ?>
    <!-- Start Pagination Item -->
    <li class="page-item<?= $link['active'] ? ' active' : '' ?>">
      <!-- Start Pagination Item -->
      <a class="page-link" href="javascript:void(0)" data-uri="<?= $link['uri'] ?>">
        <?= $link['title'] ?>
      </a>
    </li>
    <!-- End Pagination Item -->
  <?php endforeach ?>

  <?php if ($pager->hasNext()) : ?>
    <!-- Start Pagination Item -->
    <li class="page-item">
      <!-- Start Pagination Item -->
      <a class="page-link" href="javascript:void(0)" data-uri="<?= $pager->getNext() ?>" aria-label="Next">
        <span aria-hidden="true">
          <i class="fas fa-angle-right"></i>
        </span>
      </a>
    </li>
    <!-- End Pagination Item -->

    <!-- Start Pagination Item -->
    <li class="page-item">
      <!-- Start Pagination Item -->
      <a class="page-link" href="javascript:void(0)" data-uri="<?= $pager->getLast() ?>" aria-label="Last">
        <span aria-hidden="true">
          <i class="fas fa-angle-double-right"></i>
        </span>
      </a>
    </li>
    <!-- End Pagination Item -->
  <?php endif ?>
</ul>
<!-- Start Pagination Container -->