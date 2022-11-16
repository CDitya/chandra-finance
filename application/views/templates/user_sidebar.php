<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(($this->session->userdata('role_id') == 1)? 'admin' : 'auditor'); ?>">
    <div class="sidebar-brand-icon">
      <img src="<?= base_url('assets/img/header/03.png'); ?>">
    </div>
    <div class="sidebar-brand-text">Chandra Finance</div>
  </a>
  <hr class="sidebar-divider my-0">
  <?php foreach($sidebar_menu as $sm): ?>
    <li class="<?= ($judul == $sm['judul'])? 'nav-item active' : 'nav-item' ?>">
      <a class="nav-link" href="<?= base_url($sm['url']); ?>">
        <i class="<?= $sm['logo']; ?>"></i>
        <span><?= $sm['judul']; ?></span>
      </a>
    </li>
    <hr class="sidebar-divider d-none d-md-block my-0">
  <?php endforeach; ?>
  <div class="text-center d-none d-md-inline mt-3">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>