<aside class="dutio-sidebar">

    <div class="dutio-sidebar-pill">

        <nav class="dutio-nav">

            <a href="/koordinator/dashboard"
                class="dutio-nav-link {{ request()->is('koordinator/dashboard') ? 'is-active' : '' }}">
                <span class="dutio-nav-icon">⌂</span>
                <span>Dashboard</span>
            </a>

            <a href="/koordinator/jadwal"
                class="dutio-nav-link {{ request()->is('koordinator/jadwal*') ? 'is-active' : '' }}">
                <span class="dutio-nav-icon">📅</span>
                <span>Kelola Jadwal</span>
            </a>

            <a href="/koordinator/checklist"
                class="dutio-nav-link {{ request()->is('koordinator/checklist*') ? 'is-active' : '' }}">
                <span class="dutio-nav-icon">☑</span>
                <span>Kelola Checklist</span>
            </a>

            <a href="/koordinator/laporan"
                class="dutio-nav-link {{ request()->is('koordinator/laporan*') ? 'is-active' : '' }}">
                <span class="dutio-nav-icon">📷</span>
                <span>Verifikasi Laporan</span>
            </a>

            <a href="/koordinator/user"
                class="dutio-nav-link {{ request()->is('koordinator/user*') ? 'is-active' : '' }}">
                <span class="dutio-nav-icon">👥</span>
                <span>Pengguna</span>
            </a>

            <a href="/koordinator/crewpoint"
                class="dutio-nav-link {{ request()->is('koordinator/crewpoint*') ? 'is-active' : '' }}">
                <span class="dutio-nav-icon">⭐</span>
                <span>Crew Point</span>
            </a>

            <a href="/koordinator/profile"
                class="dutio-nav-link {{ request()->is('koordinator/profile*') ? 'is-active' : '' }}">
                <span class="dutio-nav-icon">👤</span>
                <span>Profile</span>
            </a>

        </nav>

        <div class="dutio-sidebar-footer">
            &copy; {{ date('Y') }} DUTIO
        </div>

    </div>

</aside>