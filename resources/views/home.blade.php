<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>مكتب السيد المحافظ</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css" />
    <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css" />
    <link rel="stylesheet" href="assets/bundles/owlcarousel2/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/bundles/owlcarousel2/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/components.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='images/logo/aswan.png' />
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('2dbd33348671a769597f', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('user-notification');
        channel.bind('my-notification', function(data) {
            toastr.success(JSON.stringify(data));
        });
    </script>
</head>

<body class="light theme-white dark-sidebar sidebar-gone">
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            @include('layouts.sidbar')

            <div class="main-content">
                <section class="section">
                    <div class="row ">
                        <div class="col-xl-3 col-lg-6">
                            <div class="card l-bg-green">
                                <div class="card-statistic-3">
                                    <div class="card-icon card-icon-large"></div>
                                    <div class="card-content">
                                        <h4 class="card-title"> أرشيف الصادر </h4>
                                        <span> إجمالي أرشيف الصادر </span>
                                        <span
                                            style="color: black;font-size: 16px;font-weight: 800;padding: 40px;">{{ $exports_trash }}</span>
                                        <div class="progress mt-1 mb-1" data-height="8">
                                            @if ($exports_trash && $exports_trash > 0)
                                                <div class="progress-bar l-bg-green" role="progressbar"
                                                    data-width="{{ ($exports_trash / $exports_trash) * 100 }}%"
                                                    aria-valuenow="{{ $exports->count() }}"
                                                    aria-valuemin="{{ $exports_trash }}"
                                                    aria-valuemax="{{ $exports_trash }}"></div>
                                            @endif
                                        </div>
                                        <p class="mb-0 text-sm">
                                            @if ($exports_trash && $exports_trash > 0)
                                                <span class="mr-2"
                                                    style="color: black;font-size: 16px;font-weight: 800;"><i
                                                        class="fa fa-arrow-up"></i>
                                                    {{ ($exports_trash / $exports_trash) * 100 }}%</span>
                                            @endif
                                            <span class="text-nowrap"> نسبة الإكتمال </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card l-bg-cyan">
                                <div class="card-statistic-3">
                                    <div class="card-icon card-icon-large"></div>
                                    <div class="card-content">
                                        <h4 class="card-title"> عدد الصادرة </h4>
                                        <span class="text-nowrap"> اجمالي الملفات الصادرة </span>
                                        <span
                                            style="color: black;font-size: 16px;font-weight: 800;padding: 40px;">{{ $exports->count() }}</span>
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
                                        <p class="mb-0 text-sm">
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
                                            <span class="text-nowrap"> نسبة الإكتمال </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card l-bg-purple">
                                <div class="card-statistic-3">
                                    <div class="card-icon card-icon-large"></div>
                                    <div class="card-content">
                                        <h4 class="card-title"> أرشيف الوارد </h4>
                                        <span> إجمالي أرشيف الوارد </span>
                                        <span
                                            style="color: black;font-size: 16px;font-weight: 800;padding: 40px;">{{ $topics_trash }}</span>
                                        <div class="progress mt-1 mb-1" data-height="8">
                                            @if ($topics_trash && $topics_trash > 0)
                                                <div class="progress-bar l-bg-green" role="progressbar"
                                                    data-width="{{ ($topics_trash / $topics_trash) * 100 }}%"
                                                    aria-valuenow="{{ $topics->count() }}"
                                                    aria-valuemin="{{ $topics_trash }}"
                                                    aria-valuemax="{{ $topics_trash }}"></div>
                                            @endif
                                        </div>
                                        <p class="mb-0 text-sm">
                                            @if ($topics_trash && $topics_trash > 0)
                                                <span class="mr-2"
                                                    style="color: black;font-size: 16px;font-weight: 800;"><i
                                                        class="fa fa-arrow-up"></i>
                                                    {{ ($topics_trash / $topics_trash) * 100 }}%</span>
                                            @endif
                                            <span class="text-nowrap"> نسبة الإكتمال </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card l-bg-orange">
                                <div class="card-statistic-3">
                                    <div class="card-icon card-icon-large"></div>
                                    <div class="card-content">
                                        <h4 class="card-title"> عدد الوارد </h4>
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
                                        <p class="mb-0 text-sm">
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
                                            <span class="text-nowrap"> نسبة الإكتمال </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>المكاتبات الواردة</h4>

                                    <div class="card-header-action">
                                        <a href="{{ route('topic.index') }}" class="btn btn-primary"> كل الملفات
                                            الواردة </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas id="lineChartFill"></canvas>
                                    <input type="hidden" name="users" value="{{ $users['user'] }}">
                                    <input type="hidden" name="service" value="{{ $users['service'] }}">
                                    <input type="hidden" name="month" value="{{ $users['month'] }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4> المكاتبات الصادرة </h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="line-chart"></canvas>
                                    <input type="hidden" name="years" value="{{ $orderCharts['label'] }}">
                                    <input type="hidden" name="data" value="{{ $orderCharts['data'] }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-12">

                            <div class="card card-danger">
                                <div class="card-header">
                                    <h4>الجهات</h4>
                                    <div class="card-header-action">
                                        <a href="{{ route('side') }}" class="btn btn-danger btn-icon icon-right"> عرض
                                            الكل <i class="fas fa-chevron-left"></i></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="owl-carousel owl-theme" id="users-carousel">
                                        @foreach ($sides as $side)
                                            <div>
                                                <div class="user-item">
                                                    <a href="{{ route('side.profile', $side->id) }}"> <img
                                                            alt="image" src="assets/img/2.png" class="img-fluid"
                                                            style="width:65%;display:inline-block"> </a>

                                                    <div class="user-details">
                                                        <div class="user-name"> {{ $side->side_name }} </div>

                                                        <div class="user-cta">
                                                            {{-- <button class="btn btn-primary">{{ $side->side_name }}</button> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    {{-- <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>طلبات الإستثمار المتأخرة</h4>

                                    <div class="card-header-action">
                                        <a href="#" class="btn btn-primary">View All</a>
                                    </div>
                                </div>
                                <div class="card-body" style="direction: rtl;">
                                    <div class="table-responsive">
                                        <table class="table" id="save-stage" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th>الطلب</th>
                                                    <th>الحالة</th>
                                                    <th>التاخير</th>
                                                    <th>تاريخ الطلب</th>

                                                </tr>
                                            </thead>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> --}}
                </section>
            </div>
            Main Content
            <footer class="main-footer">
                <div class="footer-left">
                    <a href="https://aswan.gov.eg/">ISDT</a></a>
                </div>
                <div class="footer-right">
                </div>
            </footer>
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="assets/js/app.min.js"></script>
    <script src="assets/bundles/owlcarousel2/dist/owl.carousel.min.js"></script>
    <script src="assets/bundles/datatables/datatables.min.js"></script>
    <script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <script src="assets/js/page/widget-data.js"></script>
    <!-- Template JS File -->
    <script src="assets/bundles/apexcharts/apexcharts.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="assets/js/page/index.js"></script>
    <script src="assets/js/page/datatables.js"></script>
    <!-- Template JS File -->
    <script src="assets/bundles/chartjs/chart.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="assets/js/page/chart-chartjs.js"></script>
    <script src="assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>
