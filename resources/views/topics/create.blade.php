<!DOCTYPE html>
<html lang="en">


<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>مكتب السيد المحافظ</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css">
    <link rel="stylesheet" href="assets/bundles/izitoast/css/iziToast.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/bundles/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="assets/bundles/izitoast/css/iziToast.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <!-- Custom style CSS -->
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
                        <div class="row" style="direction: rtl">
                            <div class="col-12 col-md-12 col-lg-12">
                                @include('layouts.success')
                                @include('layouts.error')
                                <form class="needs-validation" id="work_experience" novalidate=""
                                    action="{{ route('topics.save') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h4>اضــافة وارد جديــد</h4>
                                            <div class="card-header-action">
                                                <a href="{{ route('topic.index') }}" class="btn btn-info"
                                                    data-toggle="modal" data-target="#exampleModal"> اضافة جهة </a>
                                                <a href="{{ route('topic.index') }}" class="btn btn-warning">كل
                                                    الوارد</a>
                                                <a href="{{ route('home') }}" class="btn btn-primary">الرئيسية</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-secondary">
                                        <div class="card-body">
                                            <input class="user-name text-bold-700 float-left" type="hidden" name="cat_name" value="{{ Auth::user()->cat_name }}">
                                            <input class="user-name text-bold-700 float-left" type="hidden" name="users_name" value="{{ Auth::user()->name }}">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>رقم الوارد المكاتبة</label>
                                                    <input style="height: calc(2.25rem + 6px);" type="number"
                                                        name="import_id" class="form-control"placeholder="" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>تاريخ الوارد المكاتبة</label>
                                                    <input style="height: calc(2.25rem + 6px);" type="date"
                                                        name="import_date" class="form-control"placeholder="" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label> رقم المكتب الداخلي </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="number"
                                                        name="import_id" class="form-control"placeholder="" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label> تاريخ استلام الوارد </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="datetime-local"
                                                        name="recived_date" class="form-control"placeholder="" required>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label> الإدارة المسؤلة </label>
                                                    <select class="form-control select2"  name="responsibles_id[]" multiple style="    width: 100%;">
                                                        <option value="" disabled > الإدارة المسؤلة للمتابعة </option>
                                                        @isset($responsibles)
                                                            @if ($responsibles && $responsibles->count() > 0)
                                                                @foreach ($responsibles as $Response)
                                                                    <option value="{{ $Response->id }}">
                                                                        {{ $Response->name }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        @endisset
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>عنوان الملف الوارد</label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        name="name" class="form-control"placeholder="" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label> اسم الجهة الوارد منها</label>
                                                    <select class="form-control"  name="side_id" required>
                                                        <option value="" disabled selected>اختر الجهة</option>
                                                        @isset($side)
                                                            @if ($side && $side->count() > 0)
                                                                @foreach ($side as $sides)
                                                                    <option value="{{ $sides->id }}">
                                                                        {{ $sides->side_name }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        @endisset
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label> الموقف التنفيذي </label>
                                                    <select class="form-control"  name="state">
                                                        <option value="" disabled >اختر موقف الرد</option>
                                                        <option value="2" selected> جاري المتابعة </option>
                                                        <option value="1"> تم الرد  </option>
                                                        <option value="0">  لم يتم الرد </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label> تأشيرة السيد المحافظ </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        name="vic_sign" class="form-control"placeholder="" required>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label> الملف المرفق</label>
                                                    <input style="height: calc(2.25rem + 6px);" type="file" multiple
                                                        name="file[]" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label>اضافة ملاحظات</label>
                                                    <textarea class="form-control" cols="10" rows="5" name="notes"> </textarea>

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
            <!-- Modal with form -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="">
                                <div class="form-group">
                                    <label>اضافة جهة </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="اسم الجهة "
                                            name="name">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect" style="float:left">حفظ الجهة</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.setting')
        </div>
        @include('layouts.footer')
    </div>
    </div>
    <!-- General JS Scripts -->
    <script src="assets/js/app.min.js"></script>
    <script src="assets/bundles/select2/dist/js/select2.full.min.js"></script>
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <script src="assets/bundles/izitoast/js/iziToast.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="assets/js/page/toastr.js"></script>
    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
    <script src="assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script>
        $('.option').hide();
        $('#city').on('change', function(e) {
            $('.option').hide();
            $('.city-' + e.target.value).show();
        });
    </script>

</body>


<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->

</html>
