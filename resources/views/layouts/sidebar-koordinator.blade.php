<aside class="dutio-sidebar koordinator-sidebar">

    <!-- Logo -->
    <div class="logo">

        <div class="dutio-brand">

            <!-- Foto Logo -->
            <img src="{{ asset('assets/img/dutio-logo.png') }}" alt="Logo DUTIO">
    
            <!-- Tulisan -->
            <div class="dutio-brand-text">
                <h4>DUTIO</h4>
            </div>

        </div>

    </div>


    <!-- Menu -->
    <nav class="dutio-nav">

        <a href="/dashboard-koordinator"
            class="dutio-nav-link {{ request()->is('dashboard-koordinator') ? 'is-active' : '' }}">

            <i class="bi bi-grid-fill"></i>

            Dashboard

        </a>

        <a href="/jadwal"
           class="dutio-nav-link {{ request()->is('jadwal') ? 'is-active' : '' }}">

            <i class="bi bi-calendar-event-fill"></i>

            Kelola Jadwal

        </a>

        <a href="/checklist"
           class="dutio-nav-link {{ request()->is('checklist') ? 'is-active' : '' }}">

            <i class="bi bi-check2-square"></i>

            Checklist

        </a>

        <a href="/laporan"
           class="dutio-nav-link {{ request()->is('laporan') ? 'is-active' : '' }}">

            <i class="bi bi-file-earmark-text-fill"></i>

            Verifikasi Laporan

        </a>

        <a href="/crewpoints"
           class="dutio-nav-link {{ request()->is('crewpoints') ? 'is-active' : '' }}">

            <i class="bi bi-award-fill"></i>

            Crew Points

        </a>

        <a href="/profile"
           class="dutio-nav-link {{ request()->is('profile') ? 'is-active' : '' }}">

            <i class="bi bi-person-circle"></i>

            Profile

        </a>

    </nav>


    <!-- Bottom -->
    <div class="koordinator-sidebar-footer">

        <hr>

        <div class="d-flex align-items-center mb-3">

            <img src="https://ui-avatars.com/api/?name=Koordinator"
                 class="rounded-circle"
                 width="45">

            <div class="ms-3">

                <div class="fw-semibold">

                    {{ auth()->user()->name }}

                </div>

                <small class="text-muted">

                    Koordinator

                </small>

            </div>

        </div>

        <a href="/logout"
           class="btn btn-outline-danger w-100 rounded-pill">

            <i class="bi bi-box-arrow-right"></i>

            Logout

        </a>

    </div>

</aside>