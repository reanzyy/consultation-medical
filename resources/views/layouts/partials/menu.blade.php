<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme shadow-sm">
    <div class="app-brand d-flex justify-content-center p-2">
        <a href="{{ route('dashboard.index') }}" class="app-brand-link">
            <span class="app-brand-logo">
                <img src="{{ asset('/assets/img/favicon/logo.png') }}" class="img-fluid" width="50" draggable="false">
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <ul class="menu-inner py-1">

        <?php
        $menus = [
            (object) [
                'title' => 'Menu',
            ],
            (object) [
                'name' => 'Dashboard',
                'icon' => 'bx-home-circle',
                'link' => 'dashboard',
                'childs' => [],
            ],
            (object) [
                'name' => 'User',
                'icon' => 'bxs-user-detail',
                'link' => 'users',
                'childs' => [],
            ],
            (object) [
                'name' => 'Spesialist',
                'icon' => 'bx-dna',
                'link' => 'specialists',
                'childs' => [],
            ],
            (object) [
                'name' => 'Doctor',
                'icon' => 'bxs-user-badge',
                'link' => 'doctors',
                'childs' => [],
            ],
            (object) [
                'title' => 'Account',
            ],
            (object) [
                'name' => 'Profile',
                'icon' => 'bx-user',
                'link' => 'profile',
                'childs' => [],
            ],
            (object) [
                'name' => 'Logout',
                'icon' => 'bx-log-out',
                'link' => 'logout',
                'childs' => [],
            ],
        ];
        ?>

        @foreach ($menus as $menu)
            @if (isset($menu->title))
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">{{ $menu->title }}</span>
                </li>
                @continue
            @endif
            <li class="menu-item {{ !count($menu->childs) && Request::is($menu->link . '*') ? 'active' : '' }}">
                <a href="{{ count($menu->childs) ? '#' : url($menu->link) }}"
                    class="menu-link {{ count($menu->childs) ? 'menu-toggle' : '' }}">
                    <i class="menu-icon tf-icons bx {{ $menu->icon }}"></i>
                    <span>{{ $menu->name }}</span>
                    @if (count($menu->childs))
                        <span class="menu-arrow"></span>
                    @endif
                </a>
                @if (count($menu->childs))
                    <ul class="menu-sub">
                        @foreach ($menu->childs as $child)
                            <li class="menu-item {{ Request::is($child->link) ? 'active' : '' }}">
                                <a class="menu-link" href="{{ url($menu->link . '/' . $child->link) }}">
                                    {{ $child->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach

    </ul>
</aside>
    