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
                <nav aria-label="breadcrumb" style="direction: rtl;">
                    <ol class="breadcrumb text-white-all" style="background-color: #353c48 !important;padding: 20px;">
                      <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-tachometer-alt"></i> الرئيسية</a></li>
                      <li class="breadcrumb-item"><a href="{{route('side')}}"><i class="far fa-file"></i> كل الجهات </a></li>
                      <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-list"></i> متابعة الجهة </li>
                    </ol>
                  </nav>
                <section class="section">
                    <div class="section-body" style="direction: rtl;">
                        <div class="row mt-sm-4">
                            <div class="col-12 col-md-12 col-lg-4">
                                <div class="card author-box card-primary">
                                    <div class="card-body">
                                        <div class="author-box-center">
                                            <img alt="image" src="../assets/img/2.jpg"
                                                class="rounded-circle author-box-picture">
                                            <div class="clearfix"></div>
                                            <div class="author-box-name">
                                                <a href="#">{{ $side->side_name }}</a>
                                            </div>
                                            <div class="author-box-job"> محافظة أسوان </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="card card-secondary">
                                    <div class="card-header">
                                        <h4> إحصائيات الجهة </h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="py-4">
                                            <p class="clearfix">
                                                <span class="float-left text-bold-700" style="font-size: 16px;font-weight: 600;">
                                                    {{$topics->count()}}
                                                </span>
                                                <span class="float-right text-bold-700" style="color:#950202;font-size: 16px;font-weight: 600;">
                                                    عدد المكاتبات الواردة
                                                </span>
                                            </p>
                                            <p class="clearfix">
                                                <span class="float-left text-bold-700" style="font-size: 16px;font-weight: 600;">
                                                    {{$export->count()}}
                                                </span>
                                                <span class="float-right text-bold-700" style="color:#950202;font-size: 16px;font-weight: 600;">
                                                    عدد المكاتبات الصادرة
                                                </span>
                                            </p>
                                            <p class="clearfix">
                                                <span class="float-left text-bold-700" style="font-size: 16px;font-weight: 600;">
                                                    {{$export->where('topic_id','==', null)->count()}}
                                                </span>
                                                <span class="float-right text-bold-700" style="color:#950202;font-size: 16px;font-weight: 600;">
                                                    عدد المكاتبات لم يتم الرد
                                                </span>
                                            </p>
                                            <p class="clearfix">
                                                @if ($export && $export->count() != 0 && $export < $topics)
                                                <span class="float-left text-bold-700" style="font-size: 16px;font-weight: 600;">
                                                    {{ $topics->count()/$export->count() *100 }}%
                                                </span>
                                                @elseif ($topics->count() != 0)
                                                <span class="float-left text-bold-700" style="font-size: 16px;font-weight: 600;">
                                                    {{ $export->count()/$topics->count() *100 }}%
                                                </span>
                                                @else
                                                <span class="float-left text-bold-700" style="font-size: 16px;font-weight: 600;">
                                                    0%
                                                </span>
                                                @endif

                                                <span class="float-right text-bold-700" style="color:#950202;font-size: 16px;font-weight: 600;">
                                                     نسبة الإكتمال
                                                </span>
                                            </p>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-md-12 col-lg-8">
                                <div class="card card-secondary">
                                    <div class="padding-20">
                                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab2" data-toggle="tab"
                                                    href="#about" role="tab" aria-selected="true"> الملقات والكتبات الواردة </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="export-tab2" data-toggle="tab"
                                                    href="#export" role="tab" aria-selected="false"> الملقات والكتبات الصادرة </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab2" data-toggle="tab"
                                                    href="#settings" role="tab" aria-selected="false"> تعديل </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content tab-bordered" id="myTab3Content">
                                            <div class="tab-pane fade show active" id="about" role="tabpanel"
                                                aria-labelledby="home-tab2">
                                                <div class="section-title">الملفات الواردة</div>
                                                <div class="card-body" style="direction: rtl;">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover" id="save-stage"
                                                        style="width:100%;">
                                                        <thead>
                                                            <tr>
                                                                <th> # </th>
                                                                <th>اسم المكاتبة الواردة</th>
                                                                <th> تاريخ الإستلام </th>
                                                                <th> حالة الرد </th>
                                                                <th> فترة الزمنية للرد </th>
                                                                <th> الملف الوارد </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @isset($topics)
                                                            @if ($topics && $topics->count() > 0)
                                                                @foreach ($topics as $topic)
                                                                    <tr>
                                                                        <td class="text-bold-700">{{ $topic->id }} </td>
                                                                        <td class="text-bold-700">{{ $topic->name }} </td>
                                                                        <td class="text-bold-700">

                                                                            {{ $topic->recived_date}}

                                                                        </td>

                                                                        <td class="text-bold-700">
                                                                            @if ($topic->state == 0)
                                                                                <div class="badge badge-danger"> لم يتم
                                                                                </div>
                                                                            @elseif($topic->state == 1)
                                                                                <div class="badge badge-success"> تم </div>
                                                                            @elseif($topic->state == 2)
                                                                                <div class="badge badge-danger"> جاري
                                                                                    المتابعة </div>
                                                                            @endif
                                                                        </td>
                                                                        <td class="text-bold-700">

                                                                            {{ $topic->updated_at->diffForHumans($topic->recived_date) ?? ''}}
                                                                        </td>
                                                                        <td class="text-bold-700">
                                                                            @if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('export_user'))
                                                                                <div class="row">
                                                                                    @foreach (explode('|', $topic->file) as $file)
                                                                                        <a href="{{ URL::to('attatch_office/import_follow/' . $file) }}"
                                                                                            class="portfolio-box"
                                                                                            target="_blank">
                                                                                            <img src="../assets/img/icon.png"
                                                                                                class="img-responsive"
                                                                                                alt="{{ $file }}"
                                                                                                ata-toggle="tooltip"
                                                                                                data-placement="top"
                                                                                                title="{{ $file }}">
                                                                                        </a>
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
                                                                @endif
                                                            @endisset
                                                        </tbody>
                                                    </table>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="export" role="tabpanel"
                                                aria-labelledby="export-tab2">
                                                <div class="section-title">الملفات الصادرة</div>
                                                <div class="card-body" style="direction: rtl;">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover" id="save-stage"
                                                            style="width:100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th> # </th>
                                                                    <th> المكاتبة الصادرة</th>
                                                                    <th> تاريخ الإرسال </th>
                                                                    <th> ملحوظة </th>
                                                                    <th> الإدارة المسؤلة </th>
                                                                    <th> الملف الصادر</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @isset($export)
                                                                    @if ($export && $export->count() > 0)
                                                                        @foreach ($export as $exports)
                                                                            <tr>
                                                                                <td class="text-bold-700">
                                                                                    {{ $exports->id }}
                                                                                </td>
                                                                                <td class="text-bold-700">
                                                                                    {{ $exports->name }}
                                                                                </td>
                                                                                <td class="text-bold-700">
                                                                                    {{ $exports->send_date }}

                                                                                </td>

                                                                                <td class="text-bold-700">
                                                                                    {{ $exports->details }}
                                                                                </td>
                                                                                <td class="text-bold-700">
                                                                                    {{ $exports->topic_export->responsename->name ?? ''}}
                                                                                </td>
                                                                                <td class="text-bold-700">
                                                                                    @if (auth()->user()->hasRole('admin') ||
                                                                                            auth()->user()->hasRole('export_user'))
                                                                                        <div class="row">
                                                                                            @foreach (explode('|', $exports->upload_f) as $images)
                                                                                                <a href="{{ URL::to('attatch_office/export_follow/' . $images) }}"
                                                                                                    class="portfolio-box"
                                                                                                    target="_blank">
                                                                                                    <img src="../assets/img/icon.png"
                                                                                                        class="img-responsive"
                                                                                                        alt="{{ $images }}"
                                                                                                        ata-toggle="tooltip"
                                                                                                        data-placement="top"
                                                                                                        title=" {{ $images }}">
                                                                                                </a>
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
                                                                    @endif
                                                                @endisset
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="settings" role="tabpanel"
                                                aria-labelledby="profile-tab2">
                                                <form class="needs-validation" id="work_experience" novalidate=""action="{{ route('side.update',$side->id) }}" method="POST" enctype="multipart/form-data">
                                                  @csrf
                                                    <div class="card-header">
                                                        <h4>تعديل بيانات الجهة</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="form-group col-md-12 col-12">
                                                                <label> اسم الجهة </label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $side->side_name }}" name="side_name" required>
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
                                {{-- <div class="card">
                                    <div class="card-header">
                                        <h4>Skills</h4>
                                    </div>
                                    <div class="card-body">

                                    </div>
                                </div> --}}
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
