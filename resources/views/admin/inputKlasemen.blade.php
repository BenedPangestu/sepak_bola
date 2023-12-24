<!doctype html>
<html lang="en" class="no-focus">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Score pangestu</title>

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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- Mailboxes -->
                <div class="d-flex justify-content-between align-items-center mt-2 mb-20">
                    <h2 class="h4 font-w300 mb-0">Pertandingan</h2>
                    <button type="button" name="add" id="add" class="btn btn-primary btn-sm btn-alt-primary">
                        <i class="fa fa-plus mr-1"></i> Multiple
                    </button>
                </div>
                <form method="POST" action="{{ route('admin.klasemen.store') }}" enctype="multipart/form-data">
                    <div class="block border-bottom mb-0" id="dynamic_field">
                        @csrf
                        <div class="block-content block-content-full border-bottom">
                            <div class="row align-items-center">
                                <div class="col-sm-5 py-10">
                                    <h3 class="h5 font-w700 mb-15">
                                        Nama Klub
                                    </h3>
                                    <select class="custom-select" name="klub_1[]">
                                        <option value="">Pilih klub</option>
                                        @foreach ($klub as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    <h3 class="h5 font-w700 mb-15 mt-4">
                                        Jumlah Goal
                                    </h3>
                                    <input type="number" class="form-control" name="score_klub1[]" placeholder="Score">
                                </div>
                                <div class="col text-center">
                                    <h2>
                                        VS
                                    </h2>
                                </div>
                                <div class="col-sm-5 py-10">
                                    <h3 class="h5 font-w700 mb-15">
                                        Nama Klub
                                    </h3>
                                    <select class="custom-select" name="klub_2[]">
                                        <option value="">Pilih klub</option>
                                        @foreach ($klub as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    <h3 class="h5 font-w700 mb-15 mt-4">
                                        Jumlah Goal
                                    </h3>
                                    <input type="number" class="form-control" name="score_klub2[]" placeholder="Score">
                                </div>
                            </div>

                            <div class="row align-items-center" id="btn_save">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-alt-primary ">
                                        <i class="fa fa-save mr-1"></i> Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" d-flex justify-content-center align-items-center mt-4">
                        <button id="btn_save_all" type="submit" class="d-none btn btn-primary btn-alt-primary ">
                            <i class="fa fa-save mr-1"></i> Save All
                        </button>
                    </div>
                </form>
                <!-- END Mailboxes -->
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
    <script>
        $(document).ready(function() {
            var i = 1;

            function buttonSave(i) {
                console.log(i);
                if (i == 1) {
                    $('#btn_save_all').addClass('d-none');
                    $('#btn_save').removeClass('d-none');
                } else {
                    $('#btn_save').addClass('d-none');
                    $('#btn_save_all').removeClass('d-none');

                }
            }
            $('#add').click(function() {
                i++;
                buttonSave(i);
                $('#dynamic_field').append(
                    '<div id="row" class="block-content block-content-full border-bottom"><div class="row align-items-center"><div class="col-sm-5 py-10"><h3 class="h5 font-w700 mb-15">Nama Klub</h3><select class="custom-select" name="klub_1[]"><option value="">Pilih klub</option>@foreach ($klub as $item)<option value="{{ $item->id }}">{{ $item->nama }}</option>@endforeach</select><h3 class="h5 font-w700 mb-15 mt-4">Jumlah Goal</h3><input type="number" class="form-control" name="score_klub1[]" placeholder="Score"></div><div class="col text-center"><h2>VS</h2></div><div class="col-sm-5 py-10"><h3 class="h5 font-w700 mb-15">Nama Klub</h3><select class="custom-select" id="klub_2" name="klub_2[]"><option value="">Pilih klub</option>@foreach ($klub as $item)<option value="{{ $item->id }}">{{ $item->nama }}</option>@endforeach</select><h3 class="h5 font-w700 mb-15 mt-4">Jumlah Goal</h3><input type="number" class="form-control" id="score_klub2" name="score_klub2[]" placeholder="Score"></div></div></div>'
                );
                // $('#btn_save').addClass('d-none');
                // $('#btn_save_all').removeClass('d-none');
            });
            $(document).on('click', '.btn_remove', function() {
                i--;
                buttonSave(i);
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });
            $('#submit').click(function() {
                $.ajax({
                    url: "name.php",
                    method: "POST",
                    data: $('#add_name').serialize(),
                    success: function(data) {
                        alert(data);
                        $('#add_name')[0].reset();
                    }
                });
            });
        });
    </script>
</body>

</html>
