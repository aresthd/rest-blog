<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse mt-3">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                {{-- Apabila ada request url dasboard maka tambahkan class active --}}
                <a class="nav-link {{ Request::is('dashboard') ? 'link-dark' : 'link-secondary' }}" aria-current="page" href="/dashboard">       
                    <span data-feather="home"></span>
                    <span class="{{ Request::is('dashboard') ? 'link-dark' : 'link-secondary' }}">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                {{-- Apabila ada request url dasboard maka tambahkan class active --}}
                <a class="nav-link link-secondary" href="/posts#categories">       
                    <span data-feather="file-text"></span>
                    <span class="link-secondary">All Posts</span>
                </a>
            </li>
            <li class="nav-item">
                {{-- Link untuk mengarahkan url ke route /dashboard/posts --}}
                {{-- Apabila ada request url dashboard/posts/... maka tambahkan class active --}}
                <a class="nav-link {{ Request::is('dashboard/posts*') ? 'link-dark' : 'link-secondary' }}" href="/dashboard/posts">
                    <span data-feather="file-text"></span>
                    <span class="{{ Request::is('dashboard/posts*') ? 'link-dark' : 'link-secondary' }}">My Post</span>
                </a>
            </li>
        </ul>

        {{-- Administrator --}}
        {{-- Baris berikut hanya bisa diakses oleh yg punya akses di gerbang admin --}}
        @can('admin')
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Administrator</span>
            </h6>
            <ul class="nav flex-column">
                <li class="nav-item">
                    {{-- Link untuk mengarahkan url ke route /dashboard/categories --}}
                    {{-- Apabila ada request url dashboard/categories/... maka tambahkan class active --}}
                    <a class="nav-link {{ Request::is('dashboard/categories*') ? 'link-dark' : 'link-secondary' }}" href="/dashboard/categories">
                        <span data-feather="grid"></span>
                        <span class="{{ Request::is('dashboard/categories*') ? 'link-dark' : 'link-secondary' }}">Post Categories</span>
                    </a>
                </li>
            </ul>
        @endcan
        
        
    </div>
</nav>