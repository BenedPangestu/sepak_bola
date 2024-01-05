<!-- Sidebar -->
<nav id="sidebar">
    <!-- Sidebar Content -->
    <div class="sidebar-content">
        <!-- Side Header -->
        <div class="content-header content-header-fullrow px-15">
            <!-- Mini Mode -->
            <div class="content-header-section sidebar-mini-visible-b">
                <!-- Logo -->
                <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                    <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                </span>
                <!-- END Logo -->
            </div>
            <!-- END Mini Mode -->

            <!-- Normal Mode -->
            <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r"
                    data-toggle="layout" data-action="sidebar_close">
                    <i class="fa fa-times text-danger"></i>
                </button>
                <!-- END Close Sidebar -->

                <!-- Logo -->
                <div class="content-header-item">
                    <a class="link-effect font-w700" href="index.html">
                        <i class="si si-fire text-primary"></i>
                        <span class="font-size-xl text-dual-primary-dark">code</span><span
                            class="font-size-xl text-primary">base</span>
                    </a>
                </div>
                <!-- END Logo -->
            </div>
            <!-- END Normal Mode -->
        </div>
        <!-- END Side Header -->

        <!-- Side User -->
        <div class="content-side content-side-full content-side-user px-10 align-parent">
            <!-- Visible only in mini mode -->
            <div class="sidebar-mini-visible-b align-v animated fadeIn">
                <img class="img-avatar img-avatar32" src="{{asset('assets/media/avatars/avatar15.jpg')}}" alt="">
            </div>
            <!-- END Visible only in mini mode -->

            <!-- Visible only in normal mode -->
            <div class="sidebar-mini-hidden-b text-center">
                <a class="img-link" href="#">
                    <img class="img-avatar" src="{{asset('assets/media/avatars/avatar15.jpg')}}" alt="">
                </a>
                <ul class="list-inline mt-10">
                    <li class="list-inline-item">
                        <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase"
                            href="#">{{Auth::user()->username}}</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="link-effect text-dual-primary-dark" href="{{route('logout')}}">
                            <i class="si si-logout"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- END Visible only in normal mode -->
        </div>
        <!-- END Side User -->

        <!-- Side Navigation -->
        <div class="content-side content-side-full">
            <ul class="nav-main">
                <li>
                    <a href="{{route('admin.dashboard')}}"><i class="si si-speedometer"></i><span
                            class="sidebar-mini-hide">Dashboard</span></a>
                </li>
                <li>
                    <a href="{{route('admin.klasemen')}}"><i class="si si-graph"></i><span
                            class="sidebar-mini-hide">Klasemen</span></a>
                </li>
                <li>
                    <a href="{{route('admin.klub')}}"><i class="fa fa-soccer-ball-o"></i><span
                            class="sidebar-mini-hide">Klub</span></a>
                </li>
                @if (Auth::user()->role == 'admin')
                    <li>
                        <a href="{{route('admin.pemainbola')}}"><i class="fa fa-group"></i><span
                                class="sidebar-mini-hide">Pemain</span></a>
                    </li>
                    <li>
                        <a href="{{route('admin.user')}}"><i class="fa fa-user"></i><span
                                class="sidebar-mini-hide">User</span></a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    <!-- Sidebar Content -->
</nav>
<!-- END Sidebar -->