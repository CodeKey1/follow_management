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
                                <div class="card card-secondary"
                                    style="border-right: 63px solid #ffa426;border-top:0px;">
                                    <div class="card-header">
                                        <h4> كل ملفات البريد الوارد </h4>
                                        <div class="card-header-action">
                                            <a href="{{ route('home') }}" class="btn btn-primary">الرئيسية</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="section-body">
                                    <div class="row ">
                                    </div>
                                </div>
                                <div class="card card-secondary">
                                    <div class="card-header">
                                        <h4> البريد </h4>
                                        <div class="card-header-action">
                                            <div class="btn-group">
                                                <a href="{{ route('bosta.show') }}" class="btn btn-warning"> تأشيرة
                                                    السيد المحافظ داخلي </a>
                                            </div>
                                            <a href="{{ route('bosta.Create') }}" class="btn btn-info"> أضافة بريد </a>
                                        </div>
                                    </div>
                                    <div class="" style="padding-top: 15px;padding-bottom: 15px;direction:rtl">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover"
                                                id="table-2"style="width:100%;">
                                                <thead style="background-color: #26557c;">
                                                    <tr>
                                                        <th style="color: white"> # </th>
                                                        <th style="color: white"> ت : البريد </th>
                                                        <th style="color: white"> الجهة وارد البريد</th>
                                                        <th style="color: white"> الحالة </th>
                                                        <th style="color: white"> بشــــــــــــــــــــــــــــــــــأن
                                                        </th>
                                                        <th style="color: white">الملف</th>
                                                    </tr>
                                                </thead>
                                                <tbody style="background-color: #437dad59;">
                                                    @isset($Gsignatur)
                                                        @foreach ($Gsignatur as $num => $GS)
                                                            <tr>
                                                                <td class="text-bold-700">{{ $num + 1 }}</td>
                                                                <td class="text-bold text-bold-700" style="width: 10%">
                                                                    {{ $GS->posta_date }}</td>
                                                                <td class="text-bold text-bold-400" style="color: #000086;">
                                                                    {{ $GS->posta_side }}</td>
                                                                <td style="width: 5%">
                                                                    <div class="badge badge-danger">{{ $GS->posta_state }}
                                                                    </div>
                                                                </td>
                                                                <td class="text-bold text-bold-700"> {{ $GS->posta_about }}
                                                                </td>
                                                                <td style="width: 10%">
                                                                    <a href="{{ route('bosta.show') }}" class="portfolio-box" target="_blank">
                                                                        <i class="material-icons">attach_file</i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endisset
                                                </tbody>
                                            </table>
                                            <div id="pdf-container">

                                            </div>
                                        </div>
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
