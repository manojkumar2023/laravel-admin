<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item start ">
                <a href="{{ route('admin.dashboard') }}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="heading">
                <h3 class="uppercase">Master Settings</h3>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-diamond"></i>
                    <span class="title">Masters</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ route('admin.property-types.index') }}" class="nav-link ">
                            <span class="title">Property Types</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ route('admin.property-options.index') }}" class="nav-link ">
                            <span class="title">Property Options</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ route('admin.property-areas.index') }}" class="nav-link ">
                            <span class="title">Property Areas</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="heading">
                <h3 class="uppercase">Features</h3>
            </li>
            <li class="nav-item  ">
                <a href="{{ route('admin.agents.index') }}" class="nav-link nav-toggle">
                    <i class="icon-diamond"></i>
                    <span class="title">Agents</span>
                    <!-- <span class="arrow"></span> -->
                </a>
                <!-- <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="ui_colors.html" class="nav-link ">
                            <span class="title">Color Library</span>
                        </a>
                    </li>
                </ul> -->
            </li>
            <li class="nav-item  ">
                <a href="{{ route('admin.clients.index') }}" class="nav-link nav-toggle">
                    <i class="icon-diamond"></i>
                    <span class="title">Clients</span>
                    <!-- <span class="arrow"></span> -->
                </a>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>