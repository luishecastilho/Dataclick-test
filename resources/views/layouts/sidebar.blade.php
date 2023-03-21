<header>
<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">
            <a href="/" class="list-group-item list-group-item-action py-2 ripple {{ $uri == '/' ? 'active' : '' }}" aria-current="true">
                <span>Home</span>
            </a>
            <a href="/clubes" class="list-group-item list-group-item-action py-2 ripple {{ str_contains($uri, 'clubes') ? 'active' : '' }}">
                <span>Clubes</span>
            </a>
            <a href="/usuarios" class="list-group-item list-group-item-action py-2 ripple {{ str_contains($uri, 'usuarios') ? 'active' : '' }}">
                <span>Usuários</span>
            </a>
        </div>
    </div>
</nav>
<!-- Sidebar -->

<!-- Navbar -->
<nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Toggle button -->
        <button
            class="navbar-toggler"
            type="button"
            data-mdb-toggle="collapse"
            data-mdb-target="#sidebarMenu"
            aria-controls="sidebarMenu"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <i class="fas fa-bars"></i>
        </button>

        <!-- Brand -->
        <a class="navbar-brand" href="/">
            <img
            src="https://clickersports.com.br/assets/img/clicker-fans.png"
            height="50"
            alt="ClickerFans"
            loading="lazy"
            />
        </a>
    </div>
    <!-- Container wrapper -->
</nav>
</header>
<main style="margin-top: 5em; padding-top: 5%">
