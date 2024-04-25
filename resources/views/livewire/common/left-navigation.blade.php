<div>

    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="leftside-menu position-fixed">

        <!-- Brand Logo Light -->
        <a href="{{ route('employees') }}" class="logo logo-light">
            <span class="logo-lg">
                <img src="{{ asset(AppConst::ASSET_IMAGES . '/logo.png') }}" alt="logo">
            </span>
            <span class="logo-sm">
                <img src="{{ asset(AppConst::ASSET_IMAGES . '/logo-sm.png') }}" alt="small logo">
            </span>
        </a>

        <!-- Brand Logo Dark -->
        <a href="{{ route('employees') }}" class="logo logo-dark">
            <span class="logo-lg">
                <img src="{{ asset(AppConst::ASSET_IMAGES . '/logo-dark.png') }}" alt="dark logo">
            </span>
            <span class="logo-sm">
                <img src="{{ asset(AppConst::ASSET_IMAGES . '/logo-dark-sm.png') }}" alt="small logo">
            </span>
        </a>

        <!-- Sidebar Hover Menu Toggle Button -->
        <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
            <i class="ri-checkbox-blank-circle-line align-middle"></i>
        </div>

        <!-- Full Sidebar Menu Close Button -->
        <div class="button-close-fullsidebar">
            <i class="ri-close-fill align-middle"></i>
        </div>

        <!-- Sidebar -left -->
        <div class="h-100" id="leftside-menu-container">
            <!-- Leftbar User -->
            <div class="leftbar-user">
                <a href="pages-profile.html">
                    <img src="{{ asset(AppConst::ASSET_IMAGES . '/users/avatar-1.jpg') }}" alt="user-image"
                        height="42" class="rounded-circle shadow-sm">
                    <span class="leftbar-user-name mt-2">Dominic Keller</span>
                </a>
            </div>
            <!--- Sidemenu -->
            <ul class="side-nav">
                @forelse($modules as $key => $module)
                    @if ($module->sub_module_id === null)
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#{{ $module['alias'] }}" aria-expanded="false"
                                aria-controls="{{ $module['alias'] }}" class="side-nav-link">
                                <i class="{{ $module['icon'] }}"></i>
                                <span> {{ $module['name'] }} </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="{{ $module['alias'] }}">
                                <ul class="side-nav-second-level">
                                    <li class="side-nav-title">
                                        <a href="#">test1</a>
                                    </li>
                                    {{-- @foreach ($modules as $subModule)
                                        @if ($subModule->sub_module_id === $module->id)
                                            @php
                                                $route_name = Str::of($subModule['route_name'])->explode(',');
                                                $route_name = route(
                                                    $route_name[0],
                                                    preg_replace('/[^0-9]/', '', $route_name[1]),
                                                );
                                                $class = str_contains(url()->current(), $route_name)
                                                    ? 'menuitem-active'
                                                    : '';
                                            @endphp
                                        @else
                                            @php
                                                $route_name = route($subModule['route_name']);
                                                $class = str_contains(url()->current(), $route_name)
                                                    ? 'menuitem-active'
                                                    : '';
                                            @endphp
                                        @endif
                                        <li class="{{ $class }}">
                                            <a href="{{ $route_name }}">{{ $subModule['name'] }}</a>
                                        </li>
                                        @empty
                                            <li class="side-nav-title">No Sub Module Assigned</li>
                                        @endforelse --}}
                                    </ul>
                                </div>
                            </li>
                        @endif
                    @empty
                        <li class="side-nav-title">No Module Assigned</li>
                    @endforelse


                </ul>
                <!--- End Sidemenu -->

                <div class="clearfix"></div>
            </div>
        </div>

    </div>
