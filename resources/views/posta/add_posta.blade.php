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
                                <form class="needs-validation" novalidate="" action="{{ route('bosta.store') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h4> اضافة وارد فاكس </h4>
                                            <div class="card-header-action">
                                                <a href="{{ route('bosta.index') }}" class="btn btn-warning"> وارد فاكس
                                                </a>
                                                <a href="{{ route('home') }}" class="btn btn-primary">الرئيسية</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-secondary">
                                        <div class="card-body " id="work_experience">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label> رقم المكاتبة </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="number"
                                                        name="posta_num" class="form-control" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label> رقم المكتب </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="number"
                                                        name="posta_office_num" class="form-control" required >
                                                </div>

                                                <div class="form-group col-md-2">
                                                    <label> التاريخ </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="date"
                                                        name="posta_date" class="form-control" required>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label> تاريخ الوارد </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="date"
                                                        name="bosta_recive" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label> جهة الوارد </label>
                                                    <select class="form-control" name="side_name" required>
                                                        <option value="" disabled selected>اختر الجهة</option>
                                                        @isset($side)
                                                            @if ($side && $side->count() > 0)
                                                                @foreach ($side as $sides)
                                                                    <option value="{{ $sides->side_name }}">
                                                                        {{ $sides->side_name }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        @endisset
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label> الملف الوارد </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="file"
                                                        name="posta_file" accept="image/*" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label> بشأن </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        name="posta_about" accept="image/*" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label> الجهات المعنية </label>
                                                    <select class="form-control select2" name="side_mean[]" multiple
                                                        style="width: 100%;" required>
                                                        <option value="" disabled> الإدارة المسؤلة للمتابعة
                                                        </option>
                                                        @isset($responsibles)
                                                            @if ($responsibles && $responsibles->count() > 0)
                                                                @foreach ($responsibles as $Response)
                                                                    <option value="{{ $Response->name }}">
                                                                        {{ $Response->name }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        @endisset
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <button class="btn btn-primary" type="submit">حفظ</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
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
        function addWorkRow() {
            var elements = document.getElementsByClassName('work-xp-input');
            var empty = "no"
            for (var i = 0; i < elements.length; i++) {
                if (elements[i].value == "") {
                    empty = "yes"
                }
            }

            if (empty == "no" && document.getElementsByClassName("work-xp").length < 4) {
                const div = document.createElement('div');
                div.className = 'form-row';
                div.innerHTML =
                    `
                <div class="form-group col-md-11">
                    <input type="text" class="form-control" name="name[]" placeholder=" اسم الجهة الفرعية ">
                </div>
                    <input type="button" class="btn btn-danger" style="width:50px; height: 35px;" value="x" onclick="removeWorkRow(this)" /> `;;
                document.getElementById('work_experience').appendChild(div);
                if (document.getElementsByClassName("work-xp").length == 4) {
                    document.getElementById("addWork-btn").style.display = "none";
                }
                if (document.getElementsByClassName("work-xp").length != 4) {
                    document.getElementById("addWork-btn").style.display = "block";
                }
            } else {
                alert("برجاء ملء البيانات!");
            }
        }

        function removeWorkRow(input) {
            confirm("متأكد؟") ? document.getElementById('work_experience').removeChild(input.parentNode) : 0;
            if (document.getElementsByClassName("work-xp").length != 4) {
                document.getElementById("addWork-btn").style.display = "block";
            }
        }
    </script>
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
