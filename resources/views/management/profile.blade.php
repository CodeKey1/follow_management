<!DOCTYPE html>
<html lang="en">
<!-- email-inbox.html  21 Nov 2019 03:50:57 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Otika - Admin Dashboard Template</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css">
    <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
    <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body class="light theme-white dark-sidebar sidebar-gone">
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            @include('layouts.sidbar')
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-body" style="direction: rtl;">
                        <div class="row mt-sm-4">
                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="card author-box card-primary">
                                    <div class="card-body">
                                        <div class="author-box-center">
                                            <img alt="image" src="../assets/img/2.jpg"
                                                class="rounded-circle author-box-picture">
                                            <div class="clearfix"></div>
                                            <div class="author-box-name">
                                                <a href="#">{{ $responsible->name }}</a>
                                            </div>
                                            <div class="author-box-job"> محافظة أسوان </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="card card-secondary" style="background-color: #353c48b0;">
                                    <div class="card-body" style="padding-top: 10px;padding-bottom: 5px;">
                                        <p class="clearfix">
                                            <span class="float-left text-bold-900"
                                                style="font-size: 20px;font-weight: 800;color:yellowgreen">
                                                {{ $responsible->Responetopic->count() }}
                                            </span>
                                            <span class="float-right text-bold-700"
                                                style="color:#ffffff;font-size: 20px;font-weight: 900;">
                                                عدد الواردة للإدارة
                                            </span>
                                        </p>
                                        <p class="clearfix">
                                            <span class="float-left text-bold-900"
                                                style="font-size: 20px;font-weight: 800;color:#ffa426">
                                                {{ $responsible->Responexport->count() }}
                                            </span>
                                            <span class="float-right text-bold-900"
                                                style="color:#ffffff;font-size: 20px;font-weight: 900;">  عدد الصادرة من الإدارة </span>
                                        </p>
                                        <p class="clearfix">
                                            <span class="float-left text-bold-900"
                                                style="font-size: 20px;font-weight: 800;color:#ffa426">
                                                {{ $responsible->Responetopic->where('state','<>',1)->count() }}
                                            </span>
                                            <span class="float-right text-bold-900"
                                                style="color:#ffffff;font-size: 20px;font-weight: 900;"> لم يتم الرد من الإدارة </span>
                                        </p>

                                        <p class="clearfix">
                                            @if (
                                                $responsible->Responexport &&
                                                    $responsible->Responexport->count() != 0 &&
                                                    $responsible->Responexport < $responsible->Responetopic)
                                                <span class="float-left text-bold-800"
                                                    style="font-size: 20px;font-weight: 800;color:yellow"">
                                                    {{ ($responsible->Responetopic->count() / $responsible->Responexport->count()) * 100 }}%
                                                </span>
                                            @elseif ($responsible->Responetopic->count() != 0)
                                                <span class="float-left text-bold-800"
                                                    style="font-size: 20px;font-weight: 800;color:yellow"">
                                                    {{ ($responsible->Responexport->count() / $responsible->Responetopic->count()) * 100 }}%
                                                </span>
                                            @else
                                                <span class="float-left text-bold-800"
                                                    style="font-size: 20px;font-weight: 800;color:yellow">
                                                    0%
                                                </span>
                                            @endif
                                            <span class="float-right text-bold-800"
                                                style="color:#ffffff;font-size: 20px;font-weight: 800;">
                                                نسبة الإكتمال
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                                <div class="card card-secondary">
                                    <div class="card-body">
                                        <div class="recent-report__chart">
                                            <div id="chart1"></div>
                                            <input type="hidden" name="X" value="{{ $master['X'] }}">
                                            <input type="hidden" name="M" value="{{ $master['M'] }}">
                                            <input type="hidden" name="N" value="{{ $master['N'] }}">
                                            <input type="hidden" name="month" value="{{ $master['month'] }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="card card-secondary">
                                    <ul class="nav nav-tabs padding-10" id="myTab2" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about"
                                                role="tab" aria-selected="true"> الملقات والكتبات الواردة </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " id="export-tab2" data-toggle="tab" href="#export"
                                                role="tab" aria-selected="true"> الصادر الداخلي</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " id="import-tab2" data-toggle="tab" href="#import"
                                                role="tab" aria-selected="true"> الوارد الداخلي</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings"
                                                role="tab" aria-selected="false"> تعديل </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTab3Content">
                                        <div class="tab-pane fade show active" id="about" role="tabpanel"
                                            aria-labelledby="home-tab2">
                                            <div class="boxs mail_listing"
                                                style="padding-top: 15px;padding-bottom: 15px;">
                                                <div class="inbox-center table-responsive">
                                                    <table class="table table-striped table-hover" id="table-2">
                                                        <thead>
                                                            <tr>
                                                                <th> رقم الوارد </th>
                                                                <th> تاريخ الاستلام</th>
                                                                <th> الحالة </th>
                                                                <th> المكاتبة </th>
                                                                <th> الملف الوارد </th>
                                                                <th> رقم الصادر </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @isset($responsible)
                                                                @foreach ($responsible->Responetopic as $respon)
                                                                    <tr>
                                                                        <td><a
                                                                                href="{{ route('topics.show', $respon->id) }}">{{ $respon->import_id }}</a>
                                                                        </td>
                                                                        </td>
                                                                        <td class="text-left">
                                                                            {{ $respon->recived_date->format('d-M-y') }}
                                                                        </td>
                                                                        <td>
                                                                            <a href="#">
                                                                                @if ($respon->state == 0)
                                                                                    <span class="badge badge-danger">
                                                                                    </span>
                                                                                @elseif($respon->state == 1)
                                                                                    <span class="badge badge-success">
                                                                                    </span>
                                                                                @elseif($respon->state == 2)
                                                                                    <span class="badge badge-warning">
                                                                                    </span>
                                                                                @endif
                                                                            </a>
                                                                        </td>
                                                                        <td class="max-texts" style="width: 40%;"><a
                                                                                href="#">{{ $respon->name }}</a>
                                                                        </td>
                                                                        <td class="hidden-m">
                                                                            @if (auth()->user()->hasRole('admin') ||
                                                                                    auth()->user()->hasRole('export_user'))
                                                                                @foreach (explode('|', $respon->file) as $file)
                                                                                    <a href="{{ URL::to('attatch_office/import_follow/' . $file) }}"
                                                                                        class="portfolio-box"
                                                                                        target="_blank">
                                                                                        <i
                                                                                            class="material-icons">attach_file</i>
                                                                                    </a>
                                                                                @endforeach
                                                                            @else
                                                                                <span
                                                                                    style="color: white; background: #950202; padding: 5px; border-radius: 5px;">
                                                                                    ليس لديك الصلاجية </span>
                                                                            @endif
                                                                        </td>
                                                                        <td class="text-right">
                                                                            @if (auth()->user()->hasRole('admin') ||
                                                                                    auth()->user()->hasRole('export_user'))
                                                                                <div class="row">
                                                                                    @foreach ($manage_export as $expo)
                                                                                        <a
                                                                                            href="{{ route('exports.edit', $expo->id) }}">
                                                                                            {{ $expo->export_number }} , </a>
                                                                                    @endforeach
                                                                                </div>
                                                                            @else
                                                                                <span
                                                                                    style="color: white; background: #950202; padding: 5px; border-radius: 5px;">
                                                                                    ليس لديك الصلاجية </span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endisset
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="export" role="tabpanel"
                                            aria-labelledby="export-tab2">
                                            <form class="needs-validation" id="work_experience"
                                                novalidate=""action="{{ route('manage.update', $responsible->id) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="card-header">

                                                </div>
                                                <div class="card-body">
                                                    <div class="row">

                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="import" role="tabpanel"
                                            aria-labelledby="import-tab2">
                                            <form class="needs-validation" id="work_experience"
                                                novalidate=""action="{{ route('manage.update', $responsible->id) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="card-header">

                                                </div>
                                                <div class="card-body">
                                                    <div class="row">

                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="settings" role="tabpanel"
                                            aria-labelledby="profile-tab2">
                                            <form class="needs-validation" id="work_experience"
                                                novalidate=""action="{{ route('manage.update', $responsible->id) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="card-header">
                                                    <h4>تعديل بيانات الإدارة</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="form-group col-md-12 col-12">
                                                            <label> اسم الإدارة </label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $responsible->name }}" name="name"
                                                                required>
                                                            <div class="invalid-feedback">
                                                                Please fill in the first name
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer text-right">
                                                    <button class="btn btn-primary"> تعديل </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
            @include('layouts.footer')
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <script src="assets/js/page/datatables.js"></script>
    <!-- Template JS File -->
    <script src="assets/js/page/widget-data.js"></script>
    <script src="assets/bundles/apexcharts/apexcharts.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="assets/js/page/chart-apexcharts.js"></script>
    <!-- Template JS File -->
    <script src="assets/bundles/chartjs/chart.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="assets/js/page/chart-chartjs.js"></script>
    <script src="assets/bundles/datatables/datatables.min.js"></script>
    <script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/bundles/jquery-ui/jquery-ui.min.js"></script>
    <!-- Page Specific JS File -->
    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>
    <script>
        $(document).ready(function() {
            $('table.table').DataTable();
        });
    </script>
</body>


<!-- email-inbox.html  21 Nov 2019 03:50:58 GMT -->

</html>
