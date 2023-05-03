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

<body class="light theme-white dark-sidebar">
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
                                        <h4>  كل الجهات للوارد </h4>
                                        <div class="card-header-action">
                                            <div class="dropdown">
                                                <a href="{{ route('side.create') }}" class="btn btn-warning "> جهة
                                                    جديد </a>
                                            </div>
                                            <a href="{{ route('home') }}" class="btn btn-primary">الرئيسية</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-secondary">
                                    <div class="card-body" id="top-8-scroll" style="direction: rtl;">
                                        <ul class="list-unstyled user-details list-unstyled-border list-unstyled-noborder" style="direction: rtl;height: 100% !important;">
                                            @isset($side)
                                                    @foreach ($side as $Side)
                                            <li class="media">
                                              <img alt="image" class="mr-2 rounded-circle" width="60" src="../assets/img/2.jpg" style="margin-left: 1rem !important;">
                                              <div class="media-body">
                                                <div class="media-title">
                                                    <a href="{{route('side.profile',$Side->id)}}"> {{ $Side->side_name }} </a>
                                                </div>
                                                <div class="text-job" style="color: red"> محافظة أسوان </div>
                                              </div>
                                              <div class="media-items">
                                                <div class="media-item">
                                                  <div class="media-value">{{ $Side->side_topic->count() }}</div>
                                                  <div class="media-label"> عدد الوارد </div>
                                                </div>
                                                <div class="media-item">
                                                  <div class="media-value">{{ $Side->side_export->count() }}</div>
                                                  <div class="media-label">عدد الصادر</div>
                                                </div>
                                                <div class="media-item">
                                                  <div class="media-value">{{ $Side->side_export->where('topic_id','==', null)->count() }} </div>
                                                  <div class="media-label">المتبقي</div>
                                                </div>
                                              </div>
                                            </li>
                                            @endforeach
                                                @endisset
                                          </ul>
                                    </div>
                                    {{-- <div class="card-body" style="direction: rtl;">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover" id="save-stage"
                                                style="width:100%;">
                                                <thead>
                                                    <tr>
                                                        <th> # </th>
                                                        <th>اسم الجهة</th>
                                                        <th> عدد الوارد</th>
                                                        <th> عدد الصادر</th>
                                                        <th>تفاصيل</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($side)
                                                    @foreach ($side as $Side)
                                                        <tr>
                                                            <td class="text-bold-700">
                                                                 {{ $Side->id }}</td>
                                                            <td class="text-bold-700" style="text-align: right;">
                                                                <a href="{{route('side.profile',$Side->id)}}"> {{ $Side->side_name }} </a> </td>
                                                            <td class="text-bold-700"> {{ $Side->side_topic->count() }}</td>
                                                            <td class="text-bold-700"> {{ $Side->side_export->count() }}</td>
                                                            <td style="width: 15%">
                                                                <a class="btn btn-icon btn-primary"href="{{ route('side.edit', $Side->id) }}"ata-toggle="tooltip" data-placement="top"title="عرض وتعديل">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endisset
                                                </tbody>
                                            </table>
                                        </div>
                                    </div> --}}
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
