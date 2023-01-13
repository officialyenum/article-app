<div>
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3 sidebar-sticky">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.dashboard') ? 'active': ''}}" aria-current="{{ Route::is('admin.dashboard') ? 'page': ''}}" href="/admin/dashboard">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.users') ? 'active': ''}}" aria-current="{{ Route::is('admin.users') ? 'page': ''}}" href="/admin/users">
                        <span data-feather="users" class="align-text-bottom"></span>
                        Users
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.roles') ? 'active': ''}}" aria-current="{{ Route::is('admin.roles') ? 'page': ''}}" href="/admin/roles">
                        <span data-feather="users" class="align-text-bottom"></span>
                        Roles
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.posts') ? 'active': ''}}" aria-current="{{ Route::is('admin.posts') ? 'page': ''}}" href="/admin/posts">
                        <span data-feather="file" class="align-text-bottom"></span>
                        Posts
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.categories') ? 'active': ''}}" aria-current="{{ Route::is('admin.categories') ? 'page': ''}}" href="/admin/categories">
                        <span data-feather="file" class="align-text-bottom"></span>
                        Categories
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.tags') ? 'active': ''}}" aria-current="{{ Route::is('admin.tags') ? 'page': ''}}" href="/admin/tags">
                        <span data-feather="file" class="align-text-bottom"></span>
                        Tags
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.comments') ? 'active': ''}}" aria-current="{{ Route::is('admin.comments') ? 'page': ''}}" href="/admin/comments">
                    <span data-feather="message-circle" class="align-text-bottom"></span>
                        Comments
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                    Reports
                    </a>
                </li>
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
            <span>Saved reports</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle" class="align-text-bottom"></span>
            </a>
            </h6>
            <ul class="nav flex-column mb-2">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Current month
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Last quarter
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Social engagement
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Settings
                    </a>
                </li>
            </ul>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                <span>Settings</span>
                <a class="link-secondary" href="#" aria-label="Add a new report">
                    <span data-feather="plus-circle" class="align-text-bottom"></span>
                </a>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text" class="align-text-bottom"></span>
                            App
                        </a>

                        <a class="nav-link" href="#">
                            <span data-feather="file-text" class="align-text-bottom"></span>
                            Logout
                        </a>
                    </li>
                </ul>
        </div>
    </nav>
</div>

