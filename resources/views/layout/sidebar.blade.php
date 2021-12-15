<!-- partial:partials/_settings-panel.html -->
<div class="theme-setting-wrapper">
  <div id="settings-trigger"><i class="ti-settings"></i></div>
  <div id="theme-settings" class="settings-panel">
    <i class="settings-close ti-close"></i>
    <p class="settings-heading">SIDEBAR SKINS</p>
    <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border me-3"></div>Light</div>
    <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border me-3"></div>Dark</div>
    <p class="settings-heading mt-2">HEADER SKINS</p>
    <div class="color-tiles mx-0 px-4">
      <div class="tiles success"></div>
      <div class="tiles warning"></div>
      <div class="tiles danger"></div>
      <div class="tiles info"></div>
      <div class="tiles dark"></div>
      <div class="tiles default"></div>
    </div>
  </div>
</div>
<div id="right-sidebar" class="settings-panel">
  <i class="settings-close ti-close"></i>
  <div class="tab-content" id="setting-content">
    <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
    </div>
    <!-- To do section tab ends -->
    <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
      <div class="d-flex align-items-center justify-content-between border-bottom">
      </div>
    </div>
    <!-- chat tab ends -->
  </div>
</div>
<!-- partial -->
<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="/dashboard">
        <i class="mdi mdi-grid-large menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <li class="nav-item nav-category">Orders</li>
    <li class="nav-item">
      <a class="nav-link" href="/order">
        <i class="mdi mdi-cart menu-icon "></i>
        <span class="menu-title">List Orders</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-format-list-bulleted menu-icon"></i>
        <span class="menu-title">List Project</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="/progress/waiting">Waiting</a></li>
          <li class="nav-item"> <a class="nav-link" href="/progress/active">Active</a></li>
          <li class="nav-item"> <a class="nav-link" href="/progress/onProgress">On Progress</a></li>
          <li class="nav-item"> <a class="nav-link" href="/progress/finish">Finish</a></li>
          <li class="nav-item"> <a class="nav-link" href="/progress/failed">Failed</a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="/price">
        <i class="mdi mdi-coin menu-icon"></i>
        <span class="menu-title">Package</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="/bill">
        <i class="mdi mdi-file-document-box menu-icon"></i>
        <span class="menu-title">Bills</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="/progress">
        <i class="mdi mdi-chart-areaspline menu-icon"></i>
        <span class="menu-title">Progress</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="/subscribe">
        <i class="mdi mdi-update menu-icon"></i>
        <span class="menu-title">Subscribe</span>
      </a>
    </li>

    <li class="nav-item nav-category">Users</li>
    <li class="nav-item">
      <a class="nav-link" href="/user">
        <i class="mdi mdi-account-circle menu-icon"></i>
        <span class="menu-title">User</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="/testimoni">
        <i class="mdi mdi-comment-account menu-icon"></i>
        <span class="menu-title">Testimonial</span>
      </a>
    </li>



  </ul>
</nav>
