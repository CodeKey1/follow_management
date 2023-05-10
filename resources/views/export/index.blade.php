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
                                        <h4> كل ملفات متابعة الصادرة </h4>
                                        <div class="card-header-action">
                                            <div class="dropdown">
                                                <a href="{{ route('exports.create') }}" class="btn btn-warning "> صادر
                                                    جديد لوارد </a>
                                                <a href="{{ route('export.internal') }}" class="btn btn-danger "> صادر
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
                                                        <h4 class="card-title"> نسبة الأكتمال </h4>
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
                                            <div class="card l-bg-cyan">
                                                <div class="card-statistic-3">
                                                    <div class="card-icon card-icon-large"></div>
                                                    <div class="card-content">
                                                        <h4 class="card-title"> الصادرة لم يتم</h4>
                                                        <span class="text-nowrap"> اجمالي الملفات الصادرة </span>
                                                        <span
                                                            style="color: black;font-size: 16px;font-weight: 800;padding: 40px;">{{ $topics->where('state', '<>', 1)->count() }}</span>
                                                        <div class="progress mt-1 mb-1" data-height="8">
                                                            <div class="progress-bar l-bg-green" role="progressbar"
                                                                data-width="{{ ($topics->where('state', '<>', 1)->count() / $topics->count()) * 100 }}%"
                                                                aria-valuenow="{{ $topics->count() }}"
                                                                aria-valuemin="{{ $topics->count() }}"
                                                                aria-valuemax="{{ $topics->count() }}">
                                                            </div>
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
                                                        <h4 class="card-title"> عدد الصادرة </h4>
                                                        <span class="text-nowrap"> اجمالي الملفات الصادرة </span>
                                                        <span
                                                            style="color: black;font-size: 16px;font-weight: 800;padding: 40px;">{{ $exports->count() }}</span>
                                                        <div class="progress mt-1 mb-1" data-height="8">
                                                            @if ($exports->count() &&  $exports->where('state', 1 )->count() != 0)
                                                            <div class="progress-bar l-bg-green" role="progressbar"
                                                                data-width="{{ ($exports->where('state', 1)->count() / $topics->count()) * 100 }}%"
                                                                aria-valuenow="{{ $exports->count() }}"
                                                                aria-valuemin="{{ $exports->count() }}"
                                                                aria-valuemax="{{ $exports->count() }}">
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
                                        <div class="" style="padding-top: 15px;padding-bottom: 15px;direction:rtl">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover" id="table-2"
                                                    style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th> # </th>
                                                            <th> رقم الوارد </th>
                                                            <th> تاريخ استلام الوارد </th>
                                                            <th> الإدارات المسؤلة </th>
                                                            <th>اسم الصادر</th>
                                                            <th> جهة الصادر</th>
                                                            <th> رقم الصادر</th>
                                                            <th> تاريخ ارسال الصادر</th>
                                                            <th> مدة التنفيذ </th>
                                                            <th>تفاصيل</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @isset($exports)
                                                            @foreach ($exports as $Export)
                                                                <tr>
                                                                    <td class="text-bold-700">{{ $Export->id }}</td>
                                                                    <td class="text-bold-700">
                                                                        <a href="{{ route('topics.edit',$Export->topic_export->id ) }}">
                                                                             {{ $Export->topic_export->import_id }}
                                                                         </a>
                                                                    </td>
                                                                    <td class="text-bold-700">{{ $Export->topic_export->recived_date->format('Y-M-d') }}</td>
                                                                    <td>
                                                                        @foreach ($response->where('export_id', $Export->id) as $value)

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
                                                                    <td class="text-bold text-bold-700">{{ $Export->name }}</td>
                                                                    <td class="text-bold text-bold-700">{{ $Export->sidename_export->side_name }}</td>
                                                                    <td class="text-bold text-bold-700">
                                                                        <a href="{{ route('exports.edit',$Export->id ) }}">
                                                                            {{ $Export->export_no }}
                                                                        </a>
                                                                    </td>
                                                                    <td class="text-bold text-bold-700">{{ $Export->send_date->format('Y-M-d') }}</td>
                                                                    <td class="text-bold text-bold-700">
                                                                        @if ($Export->topic_export->recived_date->diffInDays(($Export->send_date)) >= 10)
                                                                                        <div class="badge badge-danger" style="vertical-align: middle; padding: 10px 23px; font-weight: 800; letter-spacing: 0.3px; border-radius: 5px; font-size: 16px;"> {{$Export->topic_export->recived_date->diffInDays(($Export->send_date))}} يوم
                                                                                        </div>
                                                                                    @elseif($Export->topic_export->recived_date->diffInDays(($Export->send_date)) >= 5 == 9 )
                                                                                        <div class="badge badge-warning" style="vertical-align: middle; padding: 10px 23px; font-weight: 800; letter-spacing: 0.3px; border-radius: 5px; font-size: 16px;">
                                                                                            {{$Export->topic_export->recived_date->diffInDays(($Export->send_date))}} يوم </div>
                                                                                    @elseif($Export->topic_export->recived_date->diffInDays(($Export->send_date)) <= 4)
                                                                                        <div class="badge badge-success" style="vertical-align: middle; padding: 10px 23px; font-weight: 800; letter-spacing: 0.3px; border-radius: 5px; font-size: 16px;">
                                                                                            {{$Export->topic_export->recived_date->diffInDays(($Export->send_date))}} يوم </div>
                                                                                    @endif
                                                                        </td>
                                                                    <td style="width: 15%">
                                                                        <a href="{{ route('exports.edit',$Export->id) }}" class="col-dark-gray waves-effect m-r-20" title="" data-toggle="tooltip" data-original-title="عرض وتعديل">
                                                                            <i class="material-icons">edit</i>
                                                                          </a>

                                                                        @if (auth()->user()->hasRole('admin'))
                                                                        <a href="{{ route('exports.delete', $Export->id) }}" class="col-dark-gray waves-effect m-r-20" title="" data-toggle="tooltip" data-original-title="حذف">
                                                                            <i class="material-icons">delete</i>
                                                                          </a>

                                                                        @endif
                                                                        <a href="{{ route('exports.archive', $Export->id) }}" class="col-dark-gray waves-effect m-r-20" title="" data-toggle="tooltip" data-original-title="الارشيف">
                                                                            <i class="material-icons">archive</i>
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
