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
    <link rel='shortcut icon' type='image/x-icon' href='../images/logo/aswan.png' />
</head>

<body class="light theme-white dark-sidebar sidebar-gone">
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
                                    action="{{ route('topics.update', $topics->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card card-secondary">
                                        <div class="card-header">
                                            <h4> عرض وتعديل ملف وارد : <span
                                                    style="color: crimson;
                                                font-size: larger;">{{ $topics->name }}</span>
                                            </h4>
                                            <div class="card-header-action">
                                                <a href="{{ route('topic.index') }}" class="btn btn-warning">كل
                                                    الوارد</a>
                                                <a href="{{ route('home') }}" class="btn btn-primary">الرئيسية</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-primary">

                                        <div class="card-body">
                                            <input class="user-name text-bold-700 float-left" type="hidden"
                                                name="cat_name" value="{{ Auth::user()->cat_name }}">
                                            <input class="user-name text-bold-700 float-left" type="hidden"
                                                name="users_name" value="{{ Auth::user()->name }}">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label>رقم الوارد</label>
                                                    <input style="height: calc(2.25rem + 6px);" type="number"
                                                        value="{{ $topics->import_id }}" class="form-control" disabled>
                                                    <input style="height: calc(2.25rem + 6px);" type="number"
                                                        name="import_id" value="{{ $topics->import_id }}"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label> الإدارة المسؤلة </label>
                                                    <select class="form-control select2" multiple disabled
                                                        style="width: 100%;">
                                                        @foreach ($topics->rsename as $value)
                                                            <option value="{{ $value->id }}" selected>
                                                                {{ $value->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <select class="form-control select2" multiple
                                                        name="responsibles_id[]" style="width: 100%;">
                                                        @foreach ($topics->rsename as $svalue)
                                                            <option value="{{ $svalue->id }}" disabled selected>
                                                                {{ $svalue->name }}</option>
                                                        @endforeach
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
                                                <div class="form-group col-md-4">
                                                    <label> اسم الجهة الوارد منها</label>
                                                    <select class="form-control" id="city" disabled>
                                                        <option value="{{ $topics->side_id }}" disabled selected>
                                                            {{ $topics->name_side->side_name }}</option>
                                                    </select>
                                                    <select class="form-control" id="city" name="side_id">
                                                        <option value="{{ $topics->side_id }}" disabled selected>
                                                            {{ $topics->name_side->side_name }}</option>
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
                                                <div class="form-group col-md-12">
                                                    <label>عنوان الملف الوارد</label>
                                                    <textarea cols="10" rows="2" type="text" value="{{ $topics->name }}" class="form-control" readonly>{{ $topics->name }}</textarea>
                                                    <textarea cols="10" rows="2" type="text" name="name" value="{{ $topics->name }}" class="form-control">{{ $topics->name }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-5">
                                                    <label> تأشيرة السيد المحافظ </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        value="{{ $topics->vic_sign }}"
                                                        class="form-control"placeholder="" readonly>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        name="vic_sign" value="{{ $topics->vic_sign }}"
                                                        class="form-control" required>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label> تاريخ الوارد المكاتبة </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="datetime-local"
                                                        value="{{ $topics->import_date }}" class="form-control"
                                                        readonly>
                                                    <input style="height: calc(2.25rem + 6px);" type="datetime-local"
                                                        name="import_date" value="{{ $topics->import_date }}"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label> تاريخ استلام الوارد </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="datetime-local"
                                                        value="{{ $topics->recived_date }}" class="form-control"
                                                        readonly>
                                                    <input style="height: calc(2.25rem + 6px);" type="datetime-local"
                                                        name="recived_date" value="{{ $topics->recived_date }}"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <label> م/ التنفيذي </label>
                                                    <select class="form-control" disabled>
                                                        <option
                                                            value="1"@if ($topics->state == '1') selected @endif>
                                                            تم الرد </option>
                                                        <option
                                                            value="0"@if ($topics->state == '0') selected @endif>
                                                            لم يتم الرد </option>
                                                        <option
                                                            value="2"@if ($topics->state == '2') selected @endif>
                                                            جاري المتابعة </option>
                                                        <option
                                                            value="2"@if ($topics->state == '3') selected @endif>
                                                             ليس له رد </option>
                                                    </select>
                                                    <select class="form-control" name="state">
                                                        <option value="" disabled>اختر موقف الرد</option>
                                                        <option
                                                            value="1"@if ($topics->state == '1') selected @endif>
                                                            تم الرد </option>
                                                        <option
                                                            value="0"@if ($topics->state == '0') selected @endif>
                                                            لم يتم الرد </option>
                                                        <option
                                                            value="2"@if ($topics->state == '2') selected @endif>
                                                            جاري المتابعة </option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label> الملف المرفق</label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        value="{{ $topics->file }}" class="form-control" readonly>
                                                    <input style="height: calc(2.25rem + 6px);" type="file"
                                                        multiple name="file[]" class="form-control">
                                                </div>

                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label>اضافة ملاحظات</label>
                                                    <textarea class="form-control" cols="10" rows="5" disabled>{{ $topics->notes }}</textarea>
                                                    <textarea class="form-control" name="notes" cols="10" rows="5">{{ $topics->notes }}</textarea>

                                                </div>
                                            </div>

                                            {{-- <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label> الملف المرفق </label>
                                                    @if (isset($topics->id) && $topics)
                                                        @foreach (explode('|', $topics->file) as $file)
                                                            <a href="{{ asset('attatch_office/import_follow/' . $file) }}" target="_blank">
                                                                <span class="text-bold-600">
                                                                    <img class="gallery-thumbnail card-img-top"
                                                                        style=" display: block; ">{{ $topics->file }}</span>
                                                            </a>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div> --}}
                                            <button type="submit"
                                                class="btn btn-success"style="float: left;">حفظ</button>
                                        </div>

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
        $('#city').on('change', function(e) {
            $('.option').hide();
            $('.city-' + e.target.value).show();
        });
    </script>

</body>


<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->

</html>
