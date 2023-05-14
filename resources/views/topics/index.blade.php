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
    <style>
        #import_inside {
            display: none;
        }
    </style>
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
                                                        <h4 class="card-title" style="color: black;"> نسبة الأكتمال
                                                        </h4>

                                                        @if ($topics && $topics->where('state', '<>', 1)->count() != 0)
                                                            <span
                                                                style="color: black;font-size: 16px;font-weight: 800;padding: 40px;">
                                                                {{ ($topics->where('state', 1)->count() / $topics->count()) * 100 }}%
                                                            </span>
                                                        @elseif ($topics->where('state', 1)->count() && $topics->count() != 0)
                                                            <span
                                                                style="color: black;font-size: 16px;font-weight: 800;padding: 40px;">
                                                                {{ ($topics->where('state', 1)->count() / $topics->count()) * 100 }}%
                                                            </span>
                                                        @else
                                                            <span
                                                                style="color: black;font-size: 16px;font-weight: 800;padding: 40px;">
                                                                0%
                                                            </span>
                                                        @endif
                                                        <span> نسبة الإكتمال الوارد</span>

                                                        <div class="progress mt-1 mb-1" data-height="8">
                                                            @if ($topics->count() && $topics->where('state', 1)->count() != 0)
                                                                <div class="progress-bar l-bg-green" role="progressbar"
                                                                    data-width="{{ ($topics->where('state', 1)->count() / $topics->count()) * 100 }}%"
                                                                    aria-valuenow="{{ $topics->count() }}"
                                                                    aria-valuemin="{{ $topics->count() }}"
                                                                    aria-valuemax="{{ $topics->count() }}"></div>
                                                            @else
                                                                <span class="float-left text-bold-700"
                                                                    style="font-size: 16px;font-weight: 600;">
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
                                                        <h4 class="card-title" style="color: black;"> وارد لم يتم الرد
                                                        </h4>
                                                        <span> إجمالي وارد لم يتم الرد </span>
                                                        <span
                                                            style="color: black;font-size: 16px;font-weight: 800;padding: 40px;">{{ $topics_trash }}</span>
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
                                                            @if ($topics->count() && $topics->where('state', 1)->count() != 0)
                                                                <div class="progress-bar l-bg-green" role="progressbar"
                                                                    data-width="{{ ($topics->where('state', 1)->count() / $topics->count()) * 100 }}%"
                                                                    aria-valuenow="{{ $topics->count() }}"
                                                                    aria-valuemin="{{ $topics->count() }}"
                                                                    aria-valuemax="{{ $topics->count() }}"></div>
                                                            @else
                                                                <span class="float-left text-bold-700"
                                                                    style="font-size: 16px;font-weight: 600;">
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
                                <div class="card card-secondary" id="import_side">
                                    <div class="card-header">
                                        <h4> متابعة الوارد الجهات</h4>
                                        <div class="card-header-action">
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-warning" onclick="myFunction()">
                                                    وارد داخلي </a>
                                            </div>
                                            <a href="{{ route('home') }}" class="btn btn-primary">الرئيسية</a>
                                        </div>
                                    </div>
                                    <div style="padding-top: 15px;padding-bottom: 15px;direction:rtl">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover" id="table-2"
                                                style="width:100%;">
                                                <thead>
                                                    <tr>
                                                        <th> # </th>
                                                        <th> رقم المكاتبة </th>
                                                        <th> تاريخ استلام الوارد </th>
                                                        <th>اسم الوارد</th>
                                                        <th> جهة الوارد</th>
                                                        <th> حالة الرد</th>
                                                        <th> الإدارات المسؤلة </th>
                                                        <th> رقم الصادر </th>
                                                        <th>تفاصيل</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($topics)
                                                        @foreach ($topics as $Topic)
                                                            <tr>
                                                                <td class="text-bold-700"> {{ $Topic->id }}</td>
                                                                <td class="text-bold-700">
                                                                    <a
                                                                        href="{{ route('topics.show', $Topic->id) }}">{{ $Topic->import_id }}</a>
                                                                </td>
                                                                <td class="text-bold-700">
                                                                    {{ $Topic->recived_date->format('Y-M-d') }}</td>
                                                                <td class="text-bold-700" style="text-align: right;">
                                                                    {{ $Topic->name }}</td>
                                                                <td class="text-bold-700">
                                                                    {{ $Topic->name_side->side_name }}

                                                                </td>
                                                                <td>
                                                                    @if ($Topic->state == 1)
                                                                        <div class="spinner-grow text-success"
                                                                            role="status">
                                                                            <span class="visually-hidden"
                                                                                style="color: #000"> تم </span>
                                                                        </div>
                                                                    @elseif($Topic->state == 0)
                                                                        <div class="spinner-grow text-danger"
                                                                            role="status">
                                                                            <span class="visually-hidden"
                                                                                style="color: #000"> لم يتم </span>
                                                                        </div>
                                                                    @elseif($Topic->state == 2)
                                                                        <div class="spinner-grow text-warning"
                                                                            role="status">
                                                                            <span class="visually-hidden"
                                                                                style="color: #000"> جاري </span>
                                                                        </div>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @foreach ($response->where('topic_id', $Topic->id) as $value)
                                                                        @if ($value->state == 1)
                                                                            <div class="badge badge-success">
                                                                            </div>
                                                                        @elseif($value->state == 0)
                                                                            <div class="badge badge-danger">
                                                                            </div>
                                                                        @elseif($value->state == 2)
                                                                            <div class="badge badge-warning">
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                </td>
                                                                <td class="text-bold-700">
                                                                    @if (auth()->user()->hasRole('admin') ||
                                                                            auth()->user()->hasRole('export_user'))
                                                                        @foreach ($Topic->t_export as $Num)
                                                                            <a
                                                                                href="{{ route('exports.edit', $Num->id) }}">
                                                                                {{ $Num->export_no }} , </a>
                                                                        @endforeach
                                                                    @else
                                                                        <span class="badge badge-danger"> ليس لديك صلاحية
                                                                        </span>
                                                                    @endif
                                                                </td>
                                                                <td style="width: 15%">
                                                                    <a href="{{ route('topics.edit', $Topic->id) }}"
                                                                        class="col-dark-gray waves-effect m-r-20"
                                                                        title="" data-toggle="tooltip"
                                                                        data-original-title="عرض وتعديل">
                                                                        <i class="material-icons">edit</i>
                                                                    </a>

                                                                    @if (auth()->user()->hasRole('admin'))
                                                                        <a href="{{ route('topics.delete', $Topic->id) }}"
                                                                            class="col-dark-gray waves-effect m-r-20"
                                                                            title="" data-toggle="tooltip"
                                                                            data-original-title="حذف">
                                                                            <i class="material-icons">delete</i>
                                                                        </a>
                                                                    @endif
                                                                    {{-- <a href="{{ route('topics.archive', $Topic->id) }}"
                                                                        class="col-dark-gray waves-effect m-r-20"
                                                                        title="" data-toggle="tooltip"
                                                                        data-original-title="الارشيف">
                                                                        <i class="material-icons">archive</i>
                                                                    </a> --}}

                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endisset
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-secondary" id="import_inside">
                                    <div class="card-header">
                                        <h4> متابعة الوارد الداخلي</h4>
                                        <div class="card-header-action">
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-warning" onclick="myFunction2()">
                                                    وارد الجهات </a>
                                            </div>
                                            <a href="{{ route('home') }}" class="btn btn-primary">الرئيسية</a>
                                        </div>
                                    </div>
                                    <div style="padding-top: 15px;padding-bottom: 15px;direction:rtl">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover" id="table-2"
                                                style="width:100%;">
                                                <thead>
                                                    <tr>

                                                        <th> رقم الرد </th>
                                                        <th> تاريخ استلام الوارد </th>
                                                        <th>عنوان الوارد </th>
                                                        <th> الإدارة الوارد منها</th>
                                                        <th> تصديق معالي الوزير / المحافظ </th>
                                                        <th> لصادر رقم</th>
                                                        <th>الملف الوارد</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($inside_import)
                                                        @foreach ($inside_import as $inside)
                                                            <tr>

                                                                <td>{{ $inside->reply_id }}</td>
                                                                <td>{{ $inside->date }}</td>
                                                                <td>{{ $inside->topic }}</td>
                                                                <td>{{ $inside->Reply_res->name }}</td>
                                                                <td>{{ $inside->confirm_vic }}</td>
                                                                <td>
                                                                    {{ $inside->Reply_ex->export_number }}

                                                                </td>
                                                                <td>
                                                                    @foreach (explode('|', $inside->reply_file) as $file)
                                                                    <a href="{{ URL::to('attatch_office/import_follow/' . $file) }}"
                                                                        class="portfolio-box" target="_blank">
                                                                        <i class="material-icons">attach_file</i>
                                                                    </a>
                                                                    @endforeach
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
    <script>
        function hola() {
            var mselect = document.getElementById("mselect");
            var mselectvalue = mselect.options[mselect.selectedIndex].value;
            var mdivside = document.getElementById("import_side");
            var mdivinside = document.getElementById("import_inside");


            if (mselectvalue == 1) {
                mdivside.style.display = "block";
                mdivtwo.style.display = "none";

            } else {
                mdivone.style.display = "none";
                mdivtwo.style.display = "block";

            }
        }
    </script>
    <script>
        function myFunction() {
            document.getElementById("import_side").style.display = "none";
            document.getElementById("import_inside").style.display = "block";
        }

        function myFunction2() {
            document.getElementById("import_side").style.display = "block";
            document.getElementById("import_inside").style.display = "none";
        }
    </script>
</body>


<!-- datatables.html  21 Nov 2019 03:55:25 GMT -->

</html>
