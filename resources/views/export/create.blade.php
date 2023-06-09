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
    <style>
        /* #div1 {
            display: none;
        }

        #div3 {
            display: none;
        }

        #div4 {
            display: none;
        }

        #div5 {
            display: none;
        }

        #div6 {
            display: none;
        } */
        #side {
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
                        <div class="row" style="direction: rtl">
                            <div class="col-12 col-md-12 col-lg-12">
                                @include('layouts.success')
                                @include('layouts.error')

                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h4>اضــافة ملف صادر جديــد </h4>
                                        <div class="card-header-action">
                                            <a href="{{ route('exports') }}" class="btn btn-warning">كل الصادر</a>
                                            <a href="{{ route('home') }}" class="btn btn-primary">الرئيسية</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group col-md-12">
                                            <div class="row">
                                                <label for="select" class="col-md-2 col-form-label text-md-end"
                                                    style="font-size: 16px; font-weight: 800;
                                                    color: black;">{{ __(' اختر نوع الملف الصادر ') }}</label>
                                                <div class="col-md-10">
                                                    <select class="form-control" id="mselect" name="select"
                                                        onChange="hola();" required>
                                                        <option value="" disabled selected> اختر نوع الصادر
                                                        </option>
                                                        <option value="1"> صادر لجهة </option>
                                                        <option value="2"> صادر لإدارة</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="side">
                                    <form class="needs-validation" novalidate="" action="{{ route('exports.save') }}"
                                         method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card card-secondary" id="div1">
                                            <div class="card-body">
                                                <div class="form-row">

                                                    <div class="form-group col-md-6">
                                                        <label>رقم الوارد</label>
                                                        <select class="form-control select2" id="project" name="topic_id"
                                                            style="width: 100%;">
                                                            <option value="" disabled selected>اختر الملف الوارد
                                                            </option>
                                                            @isset($topics)
                                                                @if ($topics && $topics->count() > 0)
                                                                    @foreach ($topics as $topic)
                                                                        <option value="{{ $topic->id }}">
                                                                            {{ $topic->import_id }}
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            @endisset
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label> اسم الجهة الوارد منها </label>
                                                        <select class="form-control" id="sub_cat" name="">
                                                            <option value="" disabled selected> الجهة الوارد منها
                                                            </option>
                                                            @isset($topics)
                                                                @if ($topics && $topics->count() > 0)
                                                                    @foreach ($topics as $topic)
                                                                        <option class="option cat-{{ $topic->id }}"
                                                                            value="{{ $topic->name_side->id }}">
                                                                            {{ $topic->name_side->side_name }}
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            @endisset
                                                        </select>
                                                    </div>
                                                    {{-- <div class="form-group col-md-12">
                                                        <label> الإدارة المسؤلة </label>
                                                        <select class="form-control select2" multiple disabled
                                                            style="width: 100%;" name="responsible_id[]">
                                                            @isset($topics)
                                                                @if ($topics && $topics->count() > 0)
                                                                    @foreach ($topics as $value)
                                                                        @foreach ($value->rsename as $values)
                                                                            <option value="{{ $values->id }}">
                                                                                {{ $values->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    @endforeach
                                                                @endif
                                                            @endisset
                                                        </select>
                                                    </div> --}}
                                                    {{-- <div class="form-group col-md-12">
                                                        <label>عنوان الملف الصادر</label>
                                                        @isset($topics)
                                                            @if ($topics && $topics->count() > 0)
                                                                @foreach ($topics as $topic)
                                                                    <input name="name" cols="10" rows="2" value="{{ $topic->name }}"
                                                                        class="option license-{{ $topic->id }} form-control" id="tittle" />{{ $topic->name }}
                                                                @endforeach
                                                            @endif
                                                        @endisset
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-secondary">
                                            <div class="card-body" id="work_side">
                                                <div class="form-row">
                                                    <div class="form-group col-md-12" id="div7">
                                                        <label> عنوان الصادر </label>
                                                        <input style="height: calc(2.25rem + 6px);" type="text" multiple
                                                            name="name" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <input class="user-name text-bold-700 float-left" type="hidden"
                                                            name="cat_name" value="{{ Auth::user()->cat_name }}">
                                                        <label>رقم الصادر</label>
                                                        <input style="height: calc(2.25rem + 6px);" type="number"
                                                            name="export_no[]" class="form-control" required>
                                                    </div>
                                                    <div class="form-group col-md-6" id="div4">
                                                        <label> اسم الجهة الصادر اليها</label>
                                                        <select class="form-control select2" name="side_id[]"
                                                            style="width: 100%;">
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
                                                        <label> تاريخ الإرسال </label>
                                                        <input style="height: calc(2.25rem + 6px);" type="date"
                                                            name="send_date" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label> الملف المرفق</label>
                                                        <input style="height: calc(2.25rem + 6px);" type="file" multiple
                                                            name="upload_f[]" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>اضافة ملاحظات</label>
                                                        <textarea class="form-control" cols="10" rows="5" name="details[]"> </textarea>
                                                    </div>
                                                </div>
                                                <a href="javascript:void(0)" style="padding: 5px 10px 5px 10px;"
                                                    id="addside-btn" class="btn btn-primary form-label"
                                                    onclick="addsideRow()"> اضافة جهة  صادر
                                                    اليها
                                                </a>
                                                <hr>
                                            </div>
                                            <div class="card-footer text-left">
                                                <button class="btn btn-primary" type="submit">حفظ</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id="manage">
                                    <form class="needs-validation" novalidate="" action="{{ route('exports.save') }}"
                                         method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="card card-secondary">
                                            <div class="card-body" id="work_manage">
                                                <div class="form-row">
                                                    <div class="form-group col-md-12" id="div7">
                                                        <label> عنوان الصادر </label>
                                                        <input style="height: calc(2.25rem + 6px);" type="text" multiple
                                                            name="namex" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-6" id="div2">
                                                        <label>رقم الوارد</label>
                                                        <select class="form-control select2" id="project" name="topic_id"
                                                            style="width: 100%;">
                                                            <option value="" disabled selected>اختر الملف الوارد
                                                            </option>
                                                            @isset($topics_inside)
                                                                @if ($topics_inside && $topics_inside->count() > 0)
                                                                    @foreach ($topics_inside as $topic)
                                                                        <option value="{{ $topic->id }}">
                                                                            {{ $topic->import_id }}
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            @endisset
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <input class="user-name text-bold-700 float-left" type="hidden"
                                                            name="cat_name" value="{{ Auth::user()->cat_name }}">
                                                        <label>رقم الصادر</label>
                                                        <input style="height: calc(2.25rem + 6px);" type="number"
                                                            name="export_number[]" class="form-control" required>
                                                    </div>
                                                    <div class="form-group col-md-6" id="div3">
                                                        <label> اسم الإدارة الصادر اليها</label>
                                                        <select class="form-control select2" name="responsible_id[]"
                                                            style="width: 100%;">
                                                            <option value="" disabled>اختر الإدارة</option>
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
                                                    <div class="form-group col-md-6">
                                                        <label> تاريخ الإرسال </label>
                                                        <input style="height: calc(2.25rem + 6px);" type="date"
                                                            name="date" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label> الملف المرفق</label>
                                                        <input style="height: calc(2.25rem + 6px);" type="file" multiple
                                                            name="file[]" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-6" >
                                                        <label> حالة الرد </label>
                                                        <select class="form-control" name="state">
                                                            <option value="" disabled>اختر الرد</option>
                                                            <option value="1" > لا يوجد</option>
                                                            <option value="2" > جاري </option>
                                                            <option value="3" >تم الرد</option>

                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>اضافة ملاحظات</label>
                                                        <textarea class="form-control" cols="10" rows="5" name="details[]" >  </textarea>
                                                    </div>
                                                </div>
                                                <a href="javascript:void(0)" style="padding: 5px 10px 5px 10px;"
                                                    id="addWork-btn" class="btn btn-primary form-label"
                                                    onclick="addWorkRow()"> اضافة إدارة صادر
                                                    اليها
                                                </a>
                                                <hr>
                                            </div>
                                            <div class="card-footer text-left">
                                                <button class="btn btn-primary" type="submit">حفظ</button>
                                            </div>
                                        </div>
                                    </form>
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
        function addsideRow() {
            var elements = document.getElementsByClassName('side-xp-input');
            var empty = "no"
            for (var i = 0; i < elements.length; i++) {
                if (elements[i].value == "") {
                    empty = "yes"
                }
            }

            if (empty == "no" && document.getElementsByClassName("side-xp").length < 6) {
                const div = document.createElement('div');
                div.className = 'form-row';
                div.innerHTML = `
                <div class="form-group col-md-12">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                             <label>رقم الصادر</label>
                             <input style="height: calc(2.25rem + 6px);" type="number" name="export_no[]" class="form-control" required>
                        </div>
                        <div class="form-group col-md-4" id="div5">
                            <label> اسم الجهة الصادر اليها</label>
                            <select class="form-control" name="side_id[]">
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

                    </div>
                    <div class="form-group col-md-12">
                        <label>اضافة ملاحظات</label>
                        <textarea class="form-control" cols="10" rows="5" name="details[]"> </textarea>
                    </div>
                </div>
                    <input type="button" class="btn-danger form-label" style="height: 35px;width: 100%;
                       margin-bottom: 27px; height: 35px; display: block;" value="x" onclick="removesideRow(this)" />`;
                document.getElementById('work_side').appendChild(div);
                if (document.getElementsByClassName("side-xp").length == 6) {
                    document.getElementById("addsideRow").style.display = "none";
                }
                if (document.getElementsByClassName("side-xp").length != 6) {
                    document.getElementById("addsideRow").style.display = "block";
                }


            } else {
                alert("برجاء ملء البيانات!");
            }
        }
        function addWorkRow() {
            var elements = document.getElementsByClassName('work-xp-input');
            var empty = "no"
            for (var i = 0; i < elements.length; i++) {
                if (elements[i].value == "") {
                    empty = "yes"
                }
            }

            if (empty == "no" && document.getElementsByClassName("work-xp").length < 6) {
                const div = document.createElement('div');
                div.className = 'form-row';
                div.innerHTML = `
                <div class="form-group col-md-12">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                             <label>رقم الصادر</label>
                             <input style="height: calc(2.25rem + 6px);" type="number" name="export_number[]" class="form-control" required>
                        </div>
                        <div class="form-group col-md-4" id="div6">
                            <label> اسم الإدارة الصادر اليها</label>
                            <select class="form-control select2"
                                name="responsible_id[]" style="width: 100%;">
                                <option value="" disabled>اختر الإدارة</option>
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
                    </div>
                    <div class="form-group col-md-12">
                        <label>اضافة ملاحظات</label>
                        <textarea class="form-control" cols="10" rows="5" name="note[]"> </textarea>
                    </div>
                </div>
                    <input type="button" class="btn-danger form-label" style="height: 35px;width: 100%;
                       margin-bottom: 27px; height: 35px; display: block;" value="x" onclick="removeWorkRow(this)" />`;
                document.getElementById('work_manage').appendChild(div);
                if (document.getElementsByClassName("work-xp").length == 6) {
                    document.getElementById("addWork-btn").style.display = "none";
                }
                if (document.getElementsByClassName("work-xp").length != 6) {
                    document.getElementById("addWork-btn").style.display = "block";
                }


            } else {
                alert("برجاء ملء البيانات!");
            }
        }
        function removeWorkRow(input) {
            confirm("متأكد؟") ? document.getElementById('work_manage').removeChild(input.parentNode) : 0;
            if (document.getElementsByClassName("work-xp").length != 4) {
                document.getElementById("addWorkRow").style.display = "block";
            }
        }
    </script>
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
    <script>
        function hola() {
            var mselect = document.getElementById("mselect");
            var mselectvalue = mselect.options[mselect.selectedIndex].value;
            var mdivone = document.getElementById("side");
            var mdivtwo = document.getElementById("manage");
            // var mdiv3 = document.getElementById("div3");
            // var mdiv4 = document.getElementById("div4");
            // var mdiv5 = document.getElementById("div5");
            // var mdiv6 = document.getElementById("div6");
            // var mdiv7 = document.getElementById("div7");

            if (mselectvalue == 1) {
                mdivone.style.display = "block";
                mdivtwo.style.display = "none";
                // mdiv3.style.display = "none";
                // mdiv4.style.display = "block";
                // mdiv7.style.display = "none";
                // mdiv5.style.display = "block";
                // mdiv6.style.display = "none";
            } else {
                mdivone.style.display = "none";
                mdivtwo.style.display = "block";
                // mdiv3.style.display = "block";
                // mdiv4.style.display = "none";
                // mdiv7.style.display = "block";
                // mdiv5.style.display = "none";
                // mdiv6.style.display = "block";
            }
        }
    </script>

</body>
<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->

</html>
