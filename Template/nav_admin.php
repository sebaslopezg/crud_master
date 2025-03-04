  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

    <?php foreach ($GLOBALS['navbar'] as $key => $value): ?>

      <li class="nav-item">
        <a class="nav-link <?= $data['page_id'] != $GLOBALS['navbar'][$key]['page_id'] ? 'collapsed' : ''  ?>" href="<?= base_url() ?>/<?= $GLOBALS['navbar'][$key]['url'] ?>">
          <i class="bi bi-<?= $GLOBALS['navbar'][$key]['icon'] ?>"></i>
          <span><?= $GLOBALS['navbar'][$key]['title'] ?></span>
        </a>
      </li>

    <?php endforeach; ?>

    </ul>

  </aside><!-- End Sidebar-->
  