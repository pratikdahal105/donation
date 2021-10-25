<div class="site-menubar">
    <div class="site-menubar-body">
        <div>
            <div>
                <ul class="site-menu" data-plugin="menu">
                    <li class="site-menu-category">General</li>
                    <li class="site-menu-item">
                        <a href="{{ route('home') }}">
                            <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                            <span class="site-menu-title">Dashboard</span>
                        </a>
                    </li>
                    @can('control_panel')
                        <li class="site-menu-item has-sub">
                            <a href="javascript:void(0)">
                                <i class="site-menu-icon icon wb-settings" aria-hidden="true"></i>
                                <span class="site-menu-title">System</span>
                                <span class="site-menu-arrow"></span>
                            </a>
                            <ul class="site-menu-sub">
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="{{ route('admin.users') }}">
                                        <span class="site-menu-title">Users</span>
                                    </a>
                                </li>
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="{{ route('admin.roles') }}">
                                        <span class="site-menu-title">Groups</span>
                                    </a>
                                </li>
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="{{ route('admin.permissions') }}">
                                        <span class="site-menu-title">Permissions</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endcan
                    <li class="site-menu-category">Actions</li>
                    @can('donations')
                        <li class="site-menu-item">
                            <a href="{{ route('admin.donations') }}">
                                <i class="site-menu-icon wb-check" aria-hidden="true"></i>
                                <span class="site-menu-title">Donation</span>
                            </a>
                        </li>
                    @endcan
                    @can('categories')
                        <li class="site-menu-item">
                            <a href="{{ route('admin.categories') }}">
                                <i class="site-menu-icon wb-list" aria-hidden="true"></i>
                                <span class="site-menu-title">Category</span>
                            </a>
                        </li>
                    @endcan
                    @can('campaigns')
                        <li class="site-menu-item">
                            <a href="{{ route('admin.campaigns') }}">
                                <i class="site-menu-icon wb-list-numbered" aria-hidden="true"></i>
                                <span class="site-menu-title">Campaign</span>
                            </a>
                        </li>
                    @endcan
                </ul>
                <div class="site-menubar-section">
                    <h5>
                        Milestone
                        <span class="float-right">30%</span>
                    </h5>
                    <div class="progress progress-xs">
                        <div class="progress-bar active" style="width: 30%;" role="progressbar"></div>
                    </div>
                    <h5>
                        Release
                        <span class="float-right">60%</span>
                    </h5>
                    <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-warning" style="width: 60%;" role="progressbar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-menubar-footer">
        <a href="javascript: void(0);" class="fold-show" data-placement="top" data-toggle="tooltip"
           data-original-title="Settings">
            <span class="icon wb-settings" aria-hidden="true"></span>
        </a>
        <a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Lock">
            <span class="icon wb-eye-close" aria-hidden="true"></span>
        </a>
        <a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Logout">
            <span class="icon wb-power" aria-hidden="true"></span>
        </a>
    </div>
</div>
