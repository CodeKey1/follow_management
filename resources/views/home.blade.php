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
                                                    data-width="{{ ($exports->count() / $topics->count()) * 100 }}%"
                                                    aria-valuenow="{{ ($exports->count() / $topics->count()) * 100 }}%"
                                                    aria-valuemin="0" aria-valuemax="{{ $topics->count() }}"></div>
                                            @else
                                                <span class="float-left text-bold-700"
                                                    style="font-size: 16px;font-weight: 600;">
                                                    0%
                                                </span>
                                            @endif

                                        </div>
                                        <p class="mb-0 text-sm">

                                            @if ($exports && $topics->where('state', 1)->count() != 0)
                                                <span
                                                    style="color: black;font-size: 16px;font-weight: 800;padding: 40px;">
                                                    {{ ($exports->count() / $topics->count()) * 100 }}%
                                                </span>
                                            @elseif ($topics->where('state', 1)->count() && $exports->count() != 0)
                                                <span
                                                    style="color: black;font-size: 16px;font-weight: 800;padding: 40px;">
                                                    {{ ($exports->count() / $topics->count()) * 100 }}%
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
                                            style="color: black;font-size: 16px;font-weight: 800;padding: 40px;">

                                            {{ $topics->count() }}

                                        </span>
                                        <div class="progress mt-1 mb-1" data-height="8">
                                            @if ($topics->count() && $topics->where('state', 1)->count() != 0)
                                                <div class="progress-bar l-bg-green" role="progressbar"
                                                    data-width="{{ ($topics->count() / $topics->where('state', 1)->count()) * 100 }}%"
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

                    <div class="row" style="direction: rtl;">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                            <div class="card">
                                <ul class="nav nav-pills" id="myTab3" role="tablist"
                                    style="padding: 8px; border-bottom: solid 1px #efefef;">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3"
                                            role="tab" aria-controls="home" aria-selected="true"> احصائيات الجهات
                                            1 </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3"
                                            role="tab" aria-controls="profile" aria-selected="false"> احصائيات
                                            الجهات 2 </a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3"
                                            role="tab" aria-controls="contact" aria-selected="false"> احصائيات
                                            الجهات 3 </a>
                                    </li> --}}
                                </ul>
                                <div class="tab-content" id="myTabContent2">
                                    <div class="tab-pane fade show active" id="home3" role="tabpanel"
                                        aria-labelledby="home-tab3">
                                        <div class="row">
                                            <div class="recent-report__chart">
                                                <label for="chart7"
                                                    style="font-size: 16px; font-weight: 700; color: black;padding-right: 90px;">رئاسة
                                                    الجمهورية</label>
                                                <div id="chart7"></div>
                                                <input type="hidden" name="data"
                                                    value="{{ $orderCharts['data'] }}">
                                            </div>
                                            <div class="recent-report__chart">
                                                <label for="chart9"
                                                    style="font-size: 16px; font-weight: 700; color: black;padding-right: 90px;">
                                                    رئاسة مجلس الوزراء </label>
                                                <div id="chart9"></div>
                                                <input type="hidden" name="data1"
                                                    value="{{ $orderCharts['data1'] }}">
                                            </div>
                                            <div class="recent-report__chart">
                                                <label for="chart10"
                                                    style="font-size: 16px; font-weight: 700; color: black;padding-right: 90px;">
                                                    وزارة التنمية المحلية </label>
                                                <div id="chart10"></div>
                                                <input type="hidden" name="data2"
                                                    value="{{ $orderCharts['data2'] }}">
                                            </div>
                                            <div class="recent-report__chart">
                                                <label for="chart11"
                                                    style="font-size: 16px; font-weight: 700; color: black;padding-right: 90px;">
                                                    كافة الوزارات الأخري </label>
                                                <div id="chart11"></div>
                                                <input type="hidden" name="data3"
                                                    value="{{ $orderCharts['data3'] }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile3" role="tabpanel"
                                        aria-labelledby="profile-tab3">
                                        <div class="row">
                                            <div class="recent-report__chart">
                                                <label for="chart9"
                                                    style="font-size: 16px; font-weight: 700; color: black;padding-right: 90px;">
                                                    رئاسة مجلس النواب</label>
                                                <div id="chart12"></div>
                                                <input type="hidden" name="data6"
                                                    value="{{ $orderCharts['data6'] }}">
                                            </div>
                                            <div class="recent-report__chart">
                                                <label for="chart10"
                                                    style="font-size: 16px; font-weight: 700; color: black;padding-right: 90px;">
                                                    هيئات - شركات</label>
                                                <div id="chart13"></div>
                                                <input type="hidden" name="data4"
                                                    value="{{ $orderCharts['data4'] }}">
                                            </div>
                                            <div class="recent-report__chart">
                                                <label for="chart11"
                                                    style="font-size: 16px; font-weight: 700; color: black;padding-right: 90px;">
                                                    جهات أخري </label>
                                                <div id="chart14"></div>
                                                <input type="hidden" name="data5"
                                                    value="{{ $orderCharts['data5'] }}">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="tab-pane fade" id="contact3" role="tabpanel"
                                        aria-labelledby="contact-tab3">
                                        Vestibulum imperdiet odio sed neque ultricies, ut dapibus mi maximus. Proin
                                        ligula massa,
                                        gravida in lacinia efficitur, hendrerit eget mauris. Pellentesque fermentum, sem
                                        interdum
                                        molestie finibus, nulla diam varius leo, nec varius lectus elit id dolor.
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-8">
                            <div class="card  card-primary">
                                <div class="card-header">
                                    <h4>  احصائيات سنوية للمكاتبات </h4>
                                    <div class="card-header-action">
                                        <a href="{{ route('topic.index') }}" class="btn btn-primary"> كل الملفات
                                            الواردة </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="recent-report__chart">
                                        <div id="chart1"></div>
                                        <input type="hidden" name="N" value="{{ $users['N'] }}">
                                        <input type="hidden" name="M" value="{{ $users['M'] }}">
                                        <input type="hidden" name="X" value="{{ $users['X'] }}">
                                        <input type="hidden" name="month" value="{{ $users['month'] }}">
                                    </div>
                                </div>
                            </div>
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
                                                            alt="image" src="{{ URL::to('images/'. $side->side_image ) }}"
                                                            class="img-fluid" style="width:100%;display:inline-block">
                                                    </a>

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
                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                <div class="card  card-danger">
                                    <div class="card-header">
                                        <h4> متابعة المكاتبات  </h4>
                                    </div>
                                    <div style="padding-top: 15px;padding-bottom: 15px;direction:rtl">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                                                <thead>
                                                    <tr>

                                                        <th> رقم المكاتبة </th>
                                                        <th> تاريخ المكاتبة </th>
                                                        <th> الحالة </th>
                                                        <th>مدة التأخير</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($topics)
                                                        @foreach ($topics as $Topic)
                                                        @if ($Topic->state == 0 || $Topic->state == 2)
                                                            <tr>
                                                                <td class="text-bold-700"><a href="{{ route('topics.show', $Topic->id) }}">{{ $Topic->import_id }}</a></td>
                                                                <td class="text-bold-700"><a href="{{ route('topics.show', $Topic->id) }}">{{ $Topic->recived_date->format('Y-m-d') }}</a></td>
                                                                <td>
                                                                    @if($Topic->state == 0)
                                                                    <div class="spinner-grow text-danger" role="status">
                                                                        <span class="visually-hidden" style="color: #000">    </span>
                                                                      </div>
                                                                    @elseif($Topic->state == 2)
                                                                    <div class="spinner-grow text-warning" role="status">
                                                                        <span class="visually-hidden" style="color: #000">  </span>
                                                                      </div>
                                                                    @endif
                                                                </td>
                                                                <td class="text-bold-700">
                                                                    <p style="display: none;">{{ $delaiy = $Topic->recived_date->diffInDays($now) }}</p>
                                                                    @if ($Topic->state == 0)
                                                                    <button type="button" class="btn btn-danger date">
                                                                        @if($delaiy<365)
                                                                            <span class="badge badge-transparent" >
                                                                            {{$Topic->recived_date->diffInDays($now) }}
                                                                            </span>يوم
                                                                            @elseif($delaiy>=365)
                                                                            <span class="badge badge-transparent" >
                                                                                {{$Topic->recived_date->diffInYears($now) }}
                                                                                </span>سنة
                                                                        @endif
                                                                    </button>
                                                                    @elseif($Topic->state == 2)
                                                                    <button type="button" class="btn btn-warning date">
                                                                        @if($delaiy<365)
                                                                            <span class="badge badge-transparent" >
                                                                            {{$Topic->recived_date->diffInDays($now) }}
                                                                            </span>يوم
                                                                            @elseif($delaiy>=365)
                                                                            <span class="badge badge-transparent" >
                                                                                {{$Topic->recived_date->diffInYears($now) }}
                                                                                </span>سنة
                                                                        @endif
                                                                    </button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            @endif
                                                        @endforeach
                                                    @endisset
                                                </tbody>
                                            </table>
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
    <script src="assets/bundles/owlcarousel2/dist/owl.carousel.min.js"></script>
    <script src="assets/bundles/datatables/datatables.min.js"></script>
    <script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <script src="assets/js/page/widget-data.js"></script>
    <!-- Template JS File -->
    <script src="assets/bundles/apexcharts/apexcharts.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="assets/js/page/chart-apexcharts.js"></script>
    <script src="assets/js/page/datatables.js"></script>
    <!-- Template JS File -->
    <!-- Page Specific JS File -->
    <script src="assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>
