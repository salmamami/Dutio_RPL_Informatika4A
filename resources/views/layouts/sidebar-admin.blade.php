<aside class="dutio-sidebar">

    <div class="dutio-sidebar-pill">

        <div class="dutio-sidebar-menu">

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

                <a href="{{ route('koordinator.penilaian.index') }}"
                    class="dutio-nav-link {{ request()->is('koordinator/penilaian*') ? 'is-active' : '' }}">
                    <span class="dutio-nav-icon">⭐</span>
                    <span>Penilaian</span>
                </a>

                <a href="{{ route('koordinator.penghuni.index') }}"
                    class="dutio-nav-link {{ request()->is('koordinator/penghuni*') ? 'is-active' : '' }}">
                    <span class="dutio-nav-icon">👥</span>
                    <span>Penghuni</span>
                </a>

                <a href="/koordinator/crewpoints"
                    class="dutio-nav-link {{ request()->is('koordinator/crewpoints*') ? 'is-active' : '' }}">
                    <span class="dutio-nav-icon">⭐</span>
                    <span>Crew Point</span>
                </a>

                <a href="/koordinator/profile"
                    class="dutio-nav-link {{ request()->is('koordinator/profile*') ? 'is-active' : '' }}">
                    <span class="dutio-nav-icon">👤</span>
                    <span>Profile</span>
                </a>

            </nav>

        </div>

        <div class="dutio-sidebar-footer">
            © {{ date('Y') }} DUTIO
        </div>

    </div>

</aside>