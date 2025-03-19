  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

    <?php foreach ($GLOBALS['navbar'] as $key => $value): ?>

      <?php 
      $hasPermit = false;
      foreach ($_SESSION['permisos'] as $permiso) {
        if ($GLOBALS['navbar'][$key]['page_id'] == $permiso['modulo_id']) {
          $hasPermit = true;
        }
        if (array_key_exists('permit',$GLOBALS['navbar'][$key])) {
          if ($GLOBALS['navbar'][$key]['permit']) {
            $hasPermit = true;
          }
        }
      } ?>

      <?php if($hasPermit): ?> 
      <li class="nav-item">
        <a class="nav-link <?= $data['page_id'] != $GLOBALS['navbar'][$key]['page_id'] ? 'collapsed' : ''  ?>" href="<?= base_url() ?>/<?= $GLOBALS['navbar'][$key]['url'] ?>">
          <i class="bi bi-<?= $GLOBALS['navbar'][$key]['icon'] ?>"></i>
          <span><?= $GLOBALS['navbar'][$key]['title'] ?></span>
        </a>
      </li>
      <?php endif; ?>

    <?php endforeach; ?>

    </ul>

  </aside><!-- End Sidebar-->
  