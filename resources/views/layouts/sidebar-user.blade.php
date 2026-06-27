<aside class="dutio-sidebar">

    <div class="dutio-sidebar-pill">

        <nav class="dutio-nav">

            <a href="/dashboard" class="dutio-nav-link {{ request()->is('dashboard') ? 'is-active' : '' }}">
                <span class="dutio-nav-icon">⌂</span>
                <span>Dashboard</span>
            </a>

            <a href="/checklist" class="dutio-nav-link {{ request()->is('checklist*') ? 'is-active' : '' }}">
                <span class="dutio-nav-icon">☑</span>
                <span>Checklist</span>
            </a>

            <a href="/jadwal" class="dutio-nav-link {{ request()->is('jadwal*') ? 'is-active' : '' }}">
                <span class="dutio-nav-icon">▤</span>
                <span>Jadwal</span>
            </a>

            <a href="/laporan" class="dutio-nav-link {{ request()->is('laporan*') ? 'is-active' : '' }}">
                <span class="dutio-nav-icon">↥</span>
                <span>Laporan</span>
            </a>

            <a href="/crewpoints" class="dutio-nav-link {{ request()->is('crewpoints*') ? 'is-active' : '' }}">
                <span class="dutio-nav-icon">★</span>
                <span>Crew Points</span>
            </a>

            <a href="/profile" class="dutio-nav-link {{ request()->is('profile*') ? 'is-active' : '' }}">
                <span class="dutio-nav-icon">◉</span>
                <span>Profile</span>
            </a>

        </nav>

        <div class="dutio-sidebar-footer">
            &copy; {{ date('Y') }} DUTIO
        </div>

    </div>

</aside>
