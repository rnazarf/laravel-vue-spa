<nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
    <a class="navbar-brand me-lg-5" href="{{ asset('/dist') }}/index.html">
        <img class="navbar-brand-dark" src="{{ asset('/dist') }}/assets/img/brand/light.svg" alt="Volt logo" />
        <img class="navbar-brand-light" src="{{ asset('/dist') }}/assets/img/brand/dark.svg" alt="Volt logo" />
    </a>
    <div class="d-flex align-items-center">
        <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
    <div class="sidebar-inner px-4 pt-3">
        <div
            class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
            <div class="d-flex align-items-center">
                <div class="avatar-lg me-4">
                    <img src="{{ asset('/dist') }}/assets/img/team/profile-picture-3.jpg"
                        class="card-img-top rounded-circle border-white" alt="Bonnie Green">
                </div>
                <div class="d-block">
                    <h2 class="h5 mb-3">Hi, Jane</h2>
                    <a href="{{ asset('/dist') }}/pages/examples/sign-in.html"
                        class="btn btn-secondary btn-sm d-inline-flex align-items-center">
                        <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                            </path>
                        </svg>
                        Sign Out
                    </a>
                </div>
            </div>
            <div class="collapse-close d-md-none">
                <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
                    aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation">
                    <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>
        <ul class="nav flex-column pt-3 pt-md-0">
            <router-link to="/home" class="nav-item " tag="li" active-class="active">
                <router-link to="/home" class="nav-link">
                    <span class="sidebar-icon">
                        <i class="bi bi-house-fill me-2"></i>
                    </span>
                    <span class="sidebar-text">Home</span>
                </router-link>
            </router-link>
            <router-link to="/product" class="nav-item " tag="li" active-class="active">
                <router-link to="/product" class="nav-link">
                    <span class="sidebar-icon">
                        <i class="bi bi-bucket-fill me-2"></i>
                    </span>
                    <span class="sidebar-text">Product</span>
                </router-link>
            </router-link>
            <router-link to="/category" class="nav-item " tag="li" active-class="active">
                <router-link to="/category" class="nav-link">
                    <span class="sidebar-icon">
                        <i class="bi bi-puzzle-fill me-2"></i>
                    </span>
                    <span class="sidebar-text">Category</span>
                </router-link>
            </router-link>
            <router-link to="/order" class="nav-item " tag="li" active-class="active">
                <router-link to="/order" class="nav-link">
                    <span class="sidebar-icon">
                        <i class="bi bi-cart-check-fill me-2"></i>
                    </span>
                    <span class="sidebar-text">Order</span>
                </router-link>
            </router-link>
            <router-link to="/flash-sale" class="nav-item " tag="li" active-class="active">
                <router-link to="/flash-sale" class="nav-link">
                    <span class="sidebar-icon">
                        <i class="bi bi-percent me-2"></i>
                    </span>
                    <span class="sidebar-text">Flash Sale</span>
                </router-link>
            </router-link>
            <router-link to="/banner" class="nav-item " tag="li" active-class="active">
                <router-link to="/banner" class="nav-link">
                    <span class="sidebar-icon">
                        <i class="bi bi-image-fill me-2"></i>
                    </span>
                    <span class="sidebar-text">Banner</span>
                </router-link>
            </router-link>
            <router-link to="/bank" class="nav-item " tag="li" active-class="active">
                <router-link to="/bank" class="nav-link">
                    <span class="sidebar-icon">
                        <i class="bi bi-bank2 me-2"></i>
                    </span>
                    <span class="sidebar-text">Bank</span>
                </router-link>
            </router-link>
            <router-link to="/payment" class="nav-item " tag="li" active-class="active">
                <router-link to="/payment" class="nav-link">
                    <span class="sidebar-icon">
                        <i class="bi bi-cash-coin me-2"></i>
                    </span>
                    <span class="sidebar-text">Payment</span>
                </router-link>
            </router-link>
            <router-link to="/voucher" class="nav-item " tag="li" active-class="active">
                <router-link to="/voucher" class="nav-link">
                    <span class="sidebar-icon">
                        <i class="bi bi-receipt me-2"></i>
                    </span>
                    <span class="sidebar-text">Voucher</span>
                </router-link>
            </router-link>
            <router-link to="/user" class="nav-item" tag="li" active-class="active">
                <router-link to="/user" class="nav-link">
                    <span class="sidebar-icon">
                        <i class="bi bi-people-fill me-2"></i>
                    </span>
                    <span class="sidebar-text">User</span>
                </router-link>
            </router-link>
            <li class="nav-item">
                <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                    data-bs-toggle="collapse" data-bs-target="#submenu-app">
                    <span>
                        <span class="sidebar-icon">
                            <i class="bi bi-gear-fill me-2"></i>
                        </span>
                        <span class="sidebar-text">Setting</span>
                    </span>
                    <span class="link-arrow">
                        <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                </span>
                <div class="multi-level collapse " role="list" id="submenu-app" aria-expanded="false">
                    <ul class="flex-column nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ asset('/dist') }}/pages/tables/bootstrap-tables.html">
                                <span class="sidebar-text">Site Config</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ asset('/dist') }}/pages/tables/bootstrap-tables.html">
                                <span class="sidebar-text">Email SMTP</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ asset('/dist') }}/pages/tables/bootstrap-tables.html">
                                <span class="sidebar-text">Telegram Notification</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ asset('/dist') }}/pages/tables/bootstrap-tables.html">
                                <span class="sidebar-text">Social Media</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
