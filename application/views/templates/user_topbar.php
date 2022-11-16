<div id="content-wrapper" class="d-flex flex-column">
  <div id="content">
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>
      <ul class="navbar-nav ml-auto">
        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item dropdown no-arrow">
          <?php $nama = explode(' ', $user['nama']); ?>
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $nama[0]; ?></span>
            <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profil/').$user['gambar'] ?>">
          </a>
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <?php foreach($dropdown_menu as $dm): ?>
              <?php if($dm['judul'] == 'Keluar'): ?>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url($dm['url']); ?>" data-toggle="modal" data-target="#logoutModal">
              <?php else: ?>
                <a class="dropdown-item" href="<?= base_url($dm['url']); ?>">
              <?php endif; ?>
                <i class="<?= $dm['logo']; ?> mr-2 text-gray-400"></i>
                <?= $dm['judul']; ?>
              </a>
            <?php endforeach; ?>
          </div>
        </li>
      </ul>
    </nav>