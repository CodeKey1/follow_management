<!DOCTYPE html>
<html lang="en">


<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>مكتب السيد المحافظ</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="../assets/css/app.min.css">
    <link rel="stylesheet" href="../assets/bundles/izitoast/css/iziToast.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="../assets/bundles/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="../assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="../assets/bundles/izitoast/css/iziToast.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="../assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='images/logo/aswan.png' />
</head>

<body class="light theme-white dark-sidebar">
    <div class="loader"></div>E
    <div id="app">
        <div class="main-wrapper main-wrapper-1">

            @include('layouts.sidbar')
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-body">
                        <div class="row" style="direction: rtl">
                            <div class="col-12 col-md-12 col-lg-12">
                                @include('layouts.success')
                                @include('layouts.error')
                                <form class="needs-validation" id="work_experience" novalidate=""
                                    action="{{ route('exports.update', $exports->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h4> عرض وتعديل ملف صادر : <span
                                                    style="color: crimson;
                                                font-size: larger;">{{ $exports->name }}</span>
                                            </h4>
                                            <div class="card-header-action">
                                                <a href="{{ route('exports') }}" class="btn btn-warning">كل الصادر</a>
                                                <a href="{{ route('home') }}" class="btn btn-primary">الرئيسية</a>
                                            </div>
                                        </div>
                                        <input class="user-name text-bold-700 float-left" type="hidden" name="cat_name"
                                            value="{{ Auth::user()->cat_name }}">
                                    </div>
                                    <div class="card card-secondary">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <input class="user-name text-bold-700 float-left" type="hidden"
                                                        name="cat_name" value="{{ Auth::user()->cat_name }}">
                                                    <label>رقم الوارد</label>
                                                    <select class="form-control" name="topic_id" @readonly(true)>
                                                        @isset($topics)
                                                            @if ($topics && $topics->count() > 0)
                                                                <option value="{{ $exports->topic_export->id ?? ''}}" selected>
                                                                    {{ $exports->topic_export->import_id ?? 'لايوجد'}}
                                                                </option>
                                                            @endif
                                                        @endisset
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label> اسم الجهة الوارد منها </label>
                                                    <select class="form-control" @readonly(true)>
                                                        <option value="{{ $exports->sidename_export->id }}" selected>
                                                            {{ $exports->sidename_export->side_name }}
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>عنوان الملف الصادر</label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        value="{{ $exports->name }}" name="name"
                                                        class="form-control" readonly="true">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-secondary">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>رقم الصادر</label>
                                                    <input style="height: calc(2.25rem + 6px);" type="number"
                                                        value="{{ $exports->export_no }}" class="form-control"
                                                        readonly>
                                                    <input style="height: calc(2.25rem + 6px);" type="number"
                                                        value="{{ $exports->export_no }}" name="export_no"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label> اسم الجهة الصادر اليها</label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        value="{{ $exports->sidename_export->side_name }}"
                                                        class="form-control" readonly>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        value="{{ $exports->sidename_export->id }}" name="side_id"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label> تاريخ الإرسال </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        value="{{ $exports->send_date->format('d-M-y') }}"
                                                        class="form-control" readonly>
                                                    <input style="height: calc(2.25rem + 6px);" type="date"
                                                        value="{{ $exports->send_date }}" name="send_date"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label> الملف المرفق</label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        value="{{ $exports->upload_f }}" name="file" multiple
                                                        class="form-control" readonly>
                                                    <input style="height: calc(2.25rem + 6px);" type="file"
                                                        multiple name="upload_f" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label>اضافة ملاحظات</label>
                                                    <textarea class="form-control" cols="10" rows="5" readonly> {{ $exports->details }}</textarea>
                                                    <textarea class="form-control" cols="10" rows="5" name="details"> {{ $exports->details }}</textarea>

                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success"
                                                style="float: left;">حفظ</button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                            {{-- <a href="javascript:void(0)" style="padding: 5px 10px 5px 10px;" id="addWork-btn"
                                class="btn btn-primary form-label" onclick="addWorkRow()">+ اضف مستحق
                            </a> --}}
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
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/bundles/select2/dist/js/select2.full.min.js"></script>
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <script src="../assets/bundles/izitoast/js/iziToast.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="../assets/js/page/toastr.js"></script>
    <!-- Template JS File -->
    <script src="../assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="../assets/js/custom.js"></script>
    <script src="../assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
    <script src="../assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script>
        $('.option').hide();
        $('.coption').hide();
        $('#project').on('change', function(e) {
            $('.option').hide();
            $('.license-' + e.target.value).show();
            $('.cat-' + e.target.value).show();
        });

        $('#city_id').on('change', function(e) {
            $('.coption').hide();
            $('.city-' + e.target.value).show();
        });
        $('#project').on('change', function(e) {
            $('.coption').hide();
            $('.type-' + e.target.value).show();
        });
    </script>

</body>


<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->

</html>
