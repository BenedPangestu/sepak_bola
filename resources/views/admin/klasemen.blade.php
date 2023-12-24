<!doctype html>
<html lang="en" class="no-focus">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Codebase - Bootstrap 4 Admin Template &amp; UI Framework</title>

    <meta name="description"
        content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Codebase">
    <meta property="og:description"
        content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('assets/media/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ asset('assets/media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('assets/media/favicons/apple-touch-icon-180x180.png') }}">
    <!-- END Icons -->

    <!-- Stylesheets -->

    <!-- Fonts and Codebase framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/codebase.min.css') }}">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
    <!-- END Stylesheets -->
</head>

<body>

    <div id="page-container"
        class="sidebar-o sidebar-inverse enable-page-overlay side-scroll page-header-glass page-header-inverse main-content-boxed">
        
        {{-- sidebar --}}
        @include('includes.admin.sidebar')
        {{-- end sidebar --}}

        <!-- Header -->
        @include('includes.admin.header')
        <!-- END Header -->

        <!-- Main Container -->
        <main id="main-container">

            <!-- Hero -->
            <div class="bg-image" style="background-image: url('{{ asset('assets/media/photos/photo26@2x.jpg') }}');">
                <div class="bg-black-op-75">
                    <div class="content content-top content-full text-center">
                        <div class="py-20">
                            <h1 class="h2 font-w700 text-white mb-10">Dashboard Score Pangestu</h1>
                            <h2 class="h4 font-w400 text-white-op mb-0">Welcome Admin.</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Hero -->

            <!-- Breadcrumb -->
            <div class="bg-body-light border-b">
                <div class="content py-5 text-center">
                    <nav class="breadcrumb bg-body-light mb-0">
                        <a class="breadcrumb-item" href="{{ route('index') }}">Score Pangestu</a>
                        <span class="breadcrumb-item active">Klasemen</span>
                    </nav>
                </div>
            </div>
            <!-- END Breadcrumb -->

            <!-- Page Content -->
            <div class="content">

                <div class="content-heading">
                    Klasemen <small class="d-none d-sm-inline">score pangestu</small>
                    <a href="{{route('admin.klasemen.input')}}" type="button" class="btn btn-primary btn-sm btn-alt-primary float-right">
                        <i class="fa fa-plus mr-1"></i> Tambah Score
                    </a>
                </div>
                <!-- Hover Table -->
                <div class="block">
                    <div class="block-content">
                        <table class="table table-hover table-vcenter">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 50px;">#</th>
                                    <th class="d-none d-sm-table-cell" style="width: 15%;">Nama Klub</th>
                                    <th class="text-center" style="width: auto;">Bermain</th>
                                    <th class="text-center" style="width: auto;">Menang</th>
                                    <th class="text-center" style="width: auto;">Kalah</th>
                                    <th class="text-center" style="width: auto;">Seri</th>
                                    <th class="text-center" style="width: auto;">Goal Menang</th>
                                    <th class="text-center" style="width: auto;">Goal Kalah</th>
                                    <th class="text-center" style="width: auto;">Point</th>
                                    {{-- <th class="text-center" style="width: auto;">Actions</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 0;
                                ?>
                                @foreach ($klasemen as $item)
                                <?php $no++; ?>
                                <tr>
                                    <th class="text-center" scope="row">{{$no}}</th>
                                    <td>{{$item->klub->nama}}</td>
                                    <td class="text-center" scope="row">{{$item->bermain}}</td>
                                    <td class="text-center" scope="row">{{$item->menang}}</td>
                                    <td class="text-center" scope="row">{{$item->kalah}}</td>
                                    <td class="text-center" scope="row">{{$item->seri}}</td>
                                    <td class="text-center" scope="row">{{$item->goal_menang}}</td>
                                    <td class="text-center" scope="row">{{$item->goal_kalah}}</td>
                                    <td class="text-center" scope="row">{{$item->point}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END Hover Table -->
            </div>
            <!-- END Page Content -->

        </main>
        <!-- END Main Container -->

        <!-- Footer -->
        @include('includes.admin.footer')
        <!-- END Footer -->
    </div>
    <!-- END Page Container -->

    <!--
            Codebase JS Core

            Vital libraries and plugins used in all pages. You can choose to not include this file if you would like
            to handle those dependencies through webpack. Please check out assets/_es6/main/bootstrap.js for more info.

            If you like, you could also include them separately directly from the assets/js/core folder in the following
            order. That can come in handy if you would like to include a few of them (eg jQuery) from a CDN.

            assets/js/core/jquery.min.js
            assets/js/core/bootstrap.bundle.min.js
            assets/js/core/simplebar.min.js
            assets/js/core/jquery-scrollLock.min.js
            assets/js/core/jquery.appear.min.js
            assets/js/core/jquery.countTo.min.js
            assets/js/core/js.cookie.min.js
        -->
    <script src="{{ asset('assets/js/codebase.core.min.js') }}"></script>

    <!--
            Codebase JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at assets/_es6/main/app.js
        -->
    <script src="{{ asset('assets/js/codebase.app.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('assets/js/plugins/chartjs/Chart.bundle.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('assets/js/pages/be_pages_ecom_dashboard.min.js') }}"></script>
</body>

</html>
