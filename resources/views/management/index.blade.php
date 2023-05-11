<!DOCTYPE html>
<html lang="en">
<!-- datatables.html  21 Nov 2019 03:55:21 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>مكتب السيد المحافظ</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css">
    <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
    <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='images/logo/aswan.png' />
</head>

<body class="light theme-white dark-sidebar sidebar-gone">
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            @include('layouts.sidbar')
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-secondary">
                                    <div class="card-header">
                                        <h4>  الإدارت المسؤلة للمتابعة</h4>
                                        <div class="card-header-action">
                                            <div class="dropdown">
                                                <a href="{{ route('manage.create') }}" class="btn btn-warning "> ادارة
                                                    جديد </a>

                                            </div>
                                            <a href="{{ route('home') }}" class="btn btn-primary">الرئيسية</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-secondary" style="height: 530px !important;">
                                    <div class="card-body" id="top-5-scroll" style="direction: rtl;height: 530px !important;">
                                        <ul class="list-unstyled list-unstyled-border">
                                            @isset($responsibles)
                                                @foreach ($responsibles as $respon)
                                                    <li class="media">
                                                        <img alt="image" class="mr-2 rounded-circle" width="60"
                                                            src="../assets/img/2.jpg" style="margin-left: 1rem !important;">
                                                        <div class="media-body">
                                                            <div class="media-title">
                                                                <a href="{{ route('manage.profile', $respon->id) }}">
                                                                    {{ $respon->name }} </a>
                                                            </div>
                                                            <div class="text-job" style="color: red"> محافظة أسوان </div>
                                                        </div>
                                                        <div class="media-items" style="background-color: #1f704659;">
                                                            <div class="media-item">
                                                                <div class="media-value" style="color: green">
                                                                    {{ $respon->Responetopic->count() }}</div>
                                                                <div class="media-label"> الوارد </div>
                                                            </div>
                                                            <div class="media-item">
                                                                <div class="media-value" style="color: red">
                                                                    {{ $respon->Responexport->count() }}</div>
                                                                <div class="media-label"> الصادر</div>
                                                            </div>
                                                            <div class="media-item">
                                                                <div class="media-value" style="color: rgb(0, 81, 255)">
                                                                    {{ $respon->Responetopic->where('topic_id', '==', null)->count() }}
                                                                </div>
                                                                <div class="media-label">المتبقي</div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @endisset
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
                @include('layouts.setting')
            </div>
            @include('layouts.footer')
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <script src="assets/bundles/datatables/datatables.min.js"></script>
    <script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/bundles/jquery-ui/jquery-ui.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="assets/js/page/datatables.js"></script>
    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @if (Session::has('success'))
        <script>
            toastr.success("{{ Session::get('success') }}");
        </script>
    @endif
    <script>
        $(document).ready(function() {
            $('table.table').DataTable();
        });
    </script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>
</body>


<!-- datatables.html  21 Nov 2019 03:55:25 GMT -->

</html>
