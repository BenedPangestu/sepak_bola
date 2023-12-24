<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Score Pangestu</title>

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
    <link rel="shortcut icon" href="assets/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/media/favicons/apple-touch-icon-180x180.png">
    <!-- END Icons -->

    <!-- Stylesheets -->

    <!-- Fonts and Codebase framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">
    <link rel="stylesheet" id="css-main" href="assets/css/codebase.min.css">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
    <!-- END Stylesheets -->
</head>

<body>
    @include('includes.header')

    <main id="main-container">

        <!-- Header Section -->
        <div class="bg-image" style="background-image: url('assets/media/photos/photo21@2x.jpg');">
            <div class="bg-primary-dark-op">
                <div class="content content-full content-top">
                    <h1 class="py-50 text-white text-center">Klasemen Pertandingan</h1>
                </div>
            </div>
        </div>
        
        <!-- END Header Section -->
        <div class="container mt-4">
            <!-- Hover Table -->
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Table Pertandingan</h3>
                    {{-- <div class="block-options">
                        <div class="block-options-item">
                            <code>.table-hover</code>
                        </div>
                    </div> --}}
                </div>
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>
                            @foreach ($klasemen as $item)
                            <?php $no++ ?>
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
    </main>
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
    <script src="assets/js/codebase.core.min.js"></script>

    <!--
            Codebase JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at assets/_es6/main/app.js
        -->
    <script src="assets/js/codebase.app.min.js"></script>
</body>

</html>
