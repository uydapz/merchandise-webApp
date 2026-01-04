<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="/dashboard/home" class="app-brand-link">
        <span class="app-brand-logo demo">
          <h3>SANTRIPASIR</h3>
        </span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item {{ ($title == 'Home' ? 'active' : '') }}">
        <a style="text-decoration:none;" href="/dashboard/home" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>

      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Setting Website</span>
      </li>
      <li class="menu-item {{ ($title == 'Spanduk' ? 'active' : '') }}">
        <a style="text-decoration:none;" href="/dashboard/spanduk" class="menu-link">
          <i class="menu-icon fa fa-house-flag"></i>
          <div>Spanduk</div>
        </a>
      </li>
      <li class="menu-item {{ ($title == 'Katalog' ? 'active' : '') }}">
        <a style="text-decoration:none;" href="/dashboard/catalogue" class="menu-link">
          <i class="menu-icon fa fa-bag-shopping"></i>
          <div>Katalog</div>
        </a>
      </li>
      <li class="menu-item {{ ($title == 'Customer' ? 'active' : '') }}">
        <a style="text-decoration:none;" href="/dashboard/customer" class="menu-link">
          <i class="menu-icon fa fa-mug-hot"></i>
          <div>Customer</div>
        </a>
      </li>
      <li class="menu-item {{ ($title == 'Story' ? 'active' : '') }}">
        <a style="text-decoration:none;" href="/dashboard/story" class="menu-link">
          <i class="menu-icon fa-solid fa-comments"></i>
          <div>Story</div>
        </a>
      </li>

    </ul>
  </aside>