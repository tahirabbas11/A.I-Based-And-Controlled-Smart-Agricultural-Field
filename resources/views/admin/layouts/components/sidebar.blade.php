<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar position-relative">
        <div class="multinav">
            <div class="multinav-scroll" style="height: 100%;">
                <!-- sidebar menu-->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="{{ currentSelectedURL('admin.dashboard') }}">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="icon-Home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="treeview">
                        @canany([
                            'config',
                            'create config',
                            'edit config',
                            'delete config',
                            'logo edit',
                            'favicon
                            edit',
                            ])
                            <a href="#">
                                <i class="icon-Settings1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <span>Website Setting</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-right pull-right"></i>
                                </span>
                            </a>
                        @endcan
                        <ul class="treeview-menu">
                            @can('favicon edit')
                                <li class="{{ currentSelectedURL('admin.config.favicon') }}">
                                    <a href="{{ route('admin.config.favicon') }}"><i class="icon-Commit"><span
                                                class="path1"></span><span class="path2"></span></i>Favicon</a>
                                </li>
                            @endcan
                            @can('logo edit')
                                <li class="{{ currentSelectedURL('admin.config.logo') }}">
                                    <a href="{{ route('admin.config.logo') }}"><i class="icon-Commit"><span
                                                class="path1"></span><span class="path2"></span></i>Logo</a>
                                </li>
                            @endcan
                            @can('edit config')
                                <li class="{{ currentSelectedURL('admin.config.settings') }}">
                                    <a href="{{ route('admin.config.settings') }}"><i class="icon-Commit"><span
                                                class="path1"></span><span class="path2"></span></i>Config</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="icon-Image"></i>
                            <span>Banner Management</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ currentSelectedURL('banner.create') }}">
                                <a href="{{ route('banner.create') }}"><i class="icon-Commit"><span
                                            class="path1"></span><span class="path2"></span></i>Add Banner</a>
                            </li>
                            <li class="{{ currentSelectedURL('banner.index') }}">
                                <a href="{{ route('banner.index') }}"><i class="icon-Commit"><span
                                            class="path1"></span><span class="path2"></span></i>Banner List</a>
                            </li>
                        </ul>
                    </li>

                    @foreach ($laravelAdminMenus->menus as $section)
                        @if ($section->items)
                            <li class="header">{{ $section->section }}</li>
                            @foreach ($section->items as $menu)
                                <li class="treeview">
                                    <a href="#">
                                        <i class="icon-Library"><span class="path1"></span><span
                                                class="path2"></span></i>
                                        <span>{{ $menu->title }}</span>
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-right pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">

                                        <li
                                            class="{{ Request::is('admin' . $menu->url . '/create') ? 'active' : '' }}">
                                            <a href="{{ url('/admin' . $menu->url . '/create') }}"><i
                                                    class="icon-Commit"><span class="path1"></span><span
                                                        class="path2"></span></i>Add {{ $menu->title }}</a>
                                        </li>
                                        <li class="{{ Request::is('admin' . $menu->url) ? 'active' : '' }}">
                                            <a href="{{ url('/admin' . $menu->url) }}"><i class="icon-Commit"><span
                                                        class="path1"></span><span
                                                        class="path2"></span></i>{{ $menu->title }} List</a>
                                        </li>
                                    </ul>
                                </li>
                            @endforeach
                        @endif
                    @endforeach
                    @role('super admin')
                        <li class="header">Roles</li>
                        <li class="treeview">
                            <a href="#">
                                <i class="icon-Library"><span class="path1"></span><span class="path2"></span></i>
                                <span>Roles</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-right pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                @can('create role')
                                    <li class="{{ currentSelectedURL('roles.create') }}">
                                        <a href="{{ route('roles.create') }}"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>Add Roles</a>
                                    </li>
                                @endcan
                                @can('role')
                                    <li class="{{ currentSelectedURL('roles.index') }}">
                                        <a href="{{ route('roles.index') }}"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>Roles List</a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                        <li class="header">Permissions</li>
                        <li class="treeview">
                            <a href="#">
                                <i class="icon-Library"><span class="path1"></span><span class="path2"></span></i>
                                <span>Permissions</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-right pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                @can('create permission')
                                    <li class="{{ currentSelectedURL('permissions.create') }}">
                                        <a href="{{ route('permissions.create') }}"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>Add Permission</a>
                                    </li>
                                @endcan
                                @can('permission')
                                    <li class="{{ currentSelectedURL('permissions.index') }}">
                                        <a href="{{ route('permissions.index') }}"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>Permission List</a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endrole



                    <li class="treeview">
                        @canany(['user', 'create user', 'edit user'])
                            <a href="#">
                                <i class="icon-Group"><span class="path1"></span><span class="path2"></span></i>
                                <span>Customer</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-right pull-right"></i>
                                </span>
                            </a>
                        @endcan
                        <ul class="treeview-menu">
                            @can('create user')
                                <li class="{{ currentSelectedURL('customer.create') }}">
                                    <a href="{{ route('customer.create') }}"><i class="icon-Commit"><span
                                                class="path1"></span><span class="path2"></span></i>Add Customer</a>
                                </li>
                            @endcan
                            @can('user')
                                <li class="{{ currentSelectedURL('customer.index') }}">
                                    <a href="{{ route('customer.index') }}"><i class="icon-Commit"><span
                                                class="path1"></span><span class="path2"></span></i>Customer List</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="icon-Flower"><span
                                class="path1"></span><span class="path2"></span></i>
                                <span>Plant Disease</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-right pull-right"></i>
                                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ currentSelectedURL('plant.history') }}">
                                <a href="{{ route('plant.history') }}"><i class="icon-Commit"><span
                                            class="path1"></span><span class="path2"></span></i>Plant Disease History</a>
                            </li>
                            <li class="{{ currentSelectedURL('plant.disease') }}">
                                <a href="{{ route('plant.disease') }}"><i class="icon-Commit"><span
                                            class="path1"></span><span class="path2"></span></i>Plant Disease</a>
                            </li>

                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-television" aria-hidden="true"></i>
                                <span>Montioring</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-right pull-right"></i>
                                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ currentSelectedURL('monitor') }}">
                                <a href="{{ route('monitor') }}"><i class="icon-Commit"><span
                                            class="path1"></span><span class="path2"></span></i>Montioring</a>
                            </li>

                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </section>
</aside>
