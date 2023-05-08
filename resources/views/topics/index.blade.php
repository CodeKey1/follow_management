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
                                        <h4> كل ملفات متابعة الوارد </h4>
                                        <div class="card-header-action">
                                            <div class="dropdown">
                                                <a href="{{ route('topics.create') }}" class="btn btn-warning "> وارد
                                                    جديد </a>

                                            </div>
                                            <a href="{{ route('home') }}" class="btn btn-primary">الرئيسية</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="section-body">
                                    <div class="row ">
                                        <div class="col-xl-4 col-lg-6">
                                            <div class="card l-bg-green">
                                                <div class="card-statistic-3">
                                                    <div class="card-icon card-icon-large"></div>
                                                    <div class="card-content">
                                                        <h4 class="card-title" style="color: black;">  نسبة الأكتمال </h4>

                                                            @if ($topics && $topics->where('state','<>', 1 )->count() != 0 )
                                                            <span  style="color: black;font-size: 16px;font-weight: 800;padding: 40px;">
                                                                {{ $topics->where('state', 1 )->count()/$topics->count() *100 }}%
                                                            </span>
                                                            @elseif ($topics->where('state', 1 )->count() && $topics->count() != 0)
                                                            <span style="color: black;font-size: 16px;font-weight: 800;padding: 40px;">
                                                                {{ $topics->where('state', 1 )->count()/$topics->count() *100 }}%
                                                            </span>
                                                            @else
                                                            <span style="color: black;font-size: 16px;font-weight: 800;padding: 40px;">
                                                                0%
                                                            </span>
                                                            @endif
                                                            <span>  نسبة الإكتمال الوارد</span>

                                                        <div class="progress mt-1 mb-1" data-height="8">
                                                            @if ($topics->count() &&  $topics->where('state', 1 )->count() != 0)
                                                            <div class="progress-bar l-bg-green" role="progressbar"
                                                                data-width="{{ ($topics->where('state', 1 )->count() / $topics->count()) * 100 }}%"
                                                                aria-valuenow="{{ $topics->count() }}"
                                                                aria-valuemin="{{ $topics->count() }}"
                                                                aria-valuemax="{{ $topics->count() }}"></div>
                                                                @else
                                                                <span class="float-left text-bold-700" style="font-size: 16px;font-weight: 600;">
                                                                    0%
                                                                </span>
                                                                @endif
                                                        </div>

                                                      </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <div class="card l-bg-purple">
                                                <div class="card-statistic-3">
                                                    <div class="card-icon card-icon-large"></div>
                                                    <div class="card-content">
                                                        <h4 class="card-title" style="color: black;">  وارد لم يتم الرد </h4>
                                                        <span> إجمالي وارد لم يتم الرد   </span>
                                                        <span style="color: black;font-size: 16px;font-weight: 800;padding: 40px;">{{ $topics_trash }}</span>
                                                        <div class="progress mt-1 mb-1" data-height="8">
                                                            @if ($topics_trash && $topics_trash > 0)
                                                            <div class="progress-bar l-bg-green" role="progressbar"
                                                                data-width="{{ ($topics_trash / $topics->count()) * 100 }}%"
                                                                aria-valuenow="{{ $topics_trash }}"
                                                                aria-valuemin="{{ $topics_trash }}"
                                                                aria-valuemax="{{ $topics_trash }}"></div>
                                                                @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <div class="card l-bg-orange">
                                                <div class="card-statistic-3">
                                                    <div class="card-icon card-icon-large"></div>
                                                    <div class="card-content">
                                                        <h4 class="card-title" style="color: black;"> عدد الوارد </h4>
                                                        <span class="text-nowrap"> اجمالي الملفات الواردة </span>
                                                        <span
                                                            style="color: black;font-size: 16px;font-weight: 800;padding: 40px;">{{ $topics->count() }}</span>
                                                        <div class="progress mt-1 mb-1" data-height="8">
                                                            @if ($topics->count() &&  $topics->where('state', 1 )->count() != 0)
                                                            <div class="progress-bar l-bg-green" role="progressbar"
                                                                data-width="{{ ($topics->where('state', 1 )->count() / $topics->count()) * 100 }}%"
                                                                aria-valuenow="{{ $topics->count() }}"
                                                                aria-valuemin="{{ $topics->count() }}"
                                                                aria-valuemax="{{ $topics->count() }}"></div>
                                                                @else
                                                                <span class="float-left text-bold-700" style="font-size: 16px;font-weight: 600;">
                                                                    0%
                                                                </span>
                                                                @endif
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="card card-secondary">
                                    <div class="card-body" style="direction: rtl;">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover" id="save-stage"
                                                style="width:100%;">
                                                <thead>
                                                    <tr>
                                                        <th> # </th>
                                                        <th>اسم الوارد</th>
                                                        <th> جهة الوارد</th>
                                                        <th>  حالة الرد</th>
                                                        <th> رقم الصادر  </th>
                                                        <th>تفاصيل</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($topics)
                                                        @foreach ($topics as $Topic)
                                                            <tr>
                                                                <td class="text-bold-700"> {{ $Topic->id }}</td>
                                                                <td class="text-bold-700" style="text-align: right;">
                                                                    {{ $Topic->name }}</td>
                                                                <td class="text-bold-700">
                                                                   {{$Topic->name_side->side_name}}

                                                                </td>
                                                                <td>
                                                                    @if ($Topic->state == 1)
                                                                        <div class="badge badge-success"> </div>
                                                                    @elseif($Topic->state == 0)
                                                                        <div class="badge badge-danger"> </div>
                                                                    @elseif($Topic->state == 2)
                                                                        <div class="badge badge-warning"> </div>
                                                                    @endif
                                                                </td>
                                                                <td class="text-bold-700">
                                                                    @if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('export_user'))
                                                                    @foreach ($Topic->t_export as $Num)
                                                                    <a href="{{ route('exports.edit', $Num->id) }}"> {{$Num->export_no}} , </a>
                                                                    @endforeach
                                                                    @else
                                                                    <span class="badge badge-danger"> ليس لديك صلاحية </span>
                                                                    @endif
                                                                 </td>

                                                                <td style="width: 15%">
                                                                    <a class="btn btn-icon btn-success"
                                                                        href="{{ route('topics.edit', $Topic->id) }}"
                                                                        ata-toggle="tooltip" data-placement="top"
                                                                        title="عرض وتعديل">
                                                                        <i class="fas fa-user"></i>
                                                                    </a>
                                                                    @if (auth()->user()->hasRole('admin'))
                                                                    <a class="btn btn-icon btn-danger"href="{{ route('topics.delete', $Topic->id) }}"ata-toggle="tooltip"data-placement="top" title="حذف"><i class="fas fa-times"></i></a>
                                                                    @endif
                                                                    <a class="btn btn-icon btn-info"
                                                                        href="{{ route('topics.archive', $Topic->id) }}"ata-toggle="tooltip"
                                                                        data-placement="top" title="نقل الارشيف">
                                                                        <i class="fas fa-archive"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endisset
                                                </tbody>
                                            </table>
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
