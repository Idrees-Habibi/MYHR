<div>
    {{-- Stop trying to control. --}}
    <div class="navbar-custom">
        <div class="topbar container-fluid">
            <div class="d-flex align-items-center gap-lg-2 gap-1">

                <!-- Topbar Brand Logo -->
                <div class="logo-topbar">
                    <!-- Logo light -->
                    <a href="{{ route('employees') }}" class="logo-light">
                        <span class="logo-lg">
                            <img src="{{ asset(AppConst::ASSET_LOGO) }}" alt="logo">
                        </span>
                        <span class="logo-sm">
                            <img src="{{ asset(AppConst::ASSET_SM_LOGO) }}" alt="small logo">
                        </span>
                    </a>

                    <!-- Logo Dark -->
                    <a href="{{ route('employees') }}" class="logo-dark">
                        <span class="logo-lg">
                            <img src="{{ asset(AppConst::ASSET_DARK_LOGO) }}" alt="dark logo">
                        </span>
                        <span class="logo-sm">
                            <img src="{{ asset(AppConst::ASSET_DARK_SM_LOGO) }}" alt="small logo">
                        </span>
                    </a>
                </div>

                <!-- Sidebar Menu Toggle Button -->
                <button class="button-toggle-menu">
                    <i class="mdi mdi-menu"></i>
                </button>

                <!-- Horizontal Menu Toggle Button -->
                <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </button>

            </div>

            <ul class="topbar-menu d-flex align-items-center gap-3">

                <li class="d-none d-sm-inline-block">
                    <div class="nav-link" id="light-dark-mode" data-bs-toggle="tooltip" data-bs-placement="left"
                        title="Theme Mode">
                        <i class="ri-moon-line font-22"></i>
                    </div>
                </li>


                <li class="d-none d-md-inline-block">
                    <a class="nav-link" href="#" data-toggle="fullscreen">
                        <i class="ri-fullscreen-line font-22"></i>
                    </a>
                </li>
                <li class="dropdown">
                    {{-- @livewire('aSSET.auth.profile-menu') --}}
                </li>
            </ul>
        </div>
    </div>
</div>
