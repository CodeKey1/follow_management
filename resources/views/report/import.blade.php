<!DOCTYPE html>
<html lang="en">
<!-- datatables.html  21 Nov 2019 03:55:21 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>مكتب السيد المحافظ</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css">
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
                                    <input type="hidden" id="token_search" value="{{ csrf_token() }}">
                                        <input type="hidden" id="ajax_search_url"
                                            value="{{ route('report.ajax_search') }}">
                                    <div class="card-header">
                                        <h4> تقارير المكاتبات </h4>

                                        <div class="card-header-action">
                                            <div class="dropdown">
                                                <a href="{{ route('exports.create') }}" class="btn btn-warning "> وارد
                                                    جديد </a>

                                            </div>
                                            <a href="{{ route('home') }}" class="btn btn-primary">الرئيسية</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-secondary">
                                    <div class="card-body" style="direction: rtl;">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for=""> اختر نوع التقرير </label>
                                                <select name="mselect" id="mselect" onchange="hola()"
                                                    class="form-control">
                                                    <option value="" selected disabled> اختر التقرير </option>
                                                    <option value="1"> الوارد </option>
                                                    <option value="2"> الصادر </option>
                                                    {{-- <option value="0"> الجهـة  </option> --}}
                                                    <option value="3"> الجهة </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div id="div1" style="display: none;">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <input type="radio" checked name="searchbyradio"
                                                        id="searchbyradio" value="import_id"> برقم الواد
                                                    <input type="radio" name="searchbyradio" id="searchbyradio"
                                                        value="name"> عنوان الوارد
                                                    <input type="radio" name="searchbyradio" id="searchbyradio"
                                                        value="note"> بشأن
                                                    <input autofocus
                                                        style="margin-top: 10px !important;height: calc(2.25rem + 6px);"
                                                        type="text" id="search_by_text"
                                                        placeholder=" بشأن  - عنوان الوارد  - برقم الواد "
                                                        class="form-control">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for=""> حالة تنفيذ الوارد </label>
                                                    <select name="searchByactiveStatus" id="searchByactiveStatus"
                                                        class="form-control">
                                                        <option value="all" selected> عرض الكل </option>
                                                        <option value="1"> تم الرد</option>
                                                        <option value="0"> لم يتم </option>
                                                        <option value="2"> جاري </option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for=""> مـــن </label>
                                                    <input type="date" name="order_date_form" id="order_date_form"
                                                        class="form-control" style="height: calc(2.25rem + 6px);">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for=""> الــــي </label>
                                                    <input type="date" name="order_date_to" id="order_date_to"
                                                        class="form-control" style="height: calc(2.25rem + 6px);">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <button class="btn btn-primary" type="submit"
                                                        style="width: 130px;height: calc(2.25rem + 6px);margin-top: 30px !important"
                                                        onclick="showReport()"> عرض التقرير </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="div2" style="display: none;">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <input type="radio" checked name="searchbyradio"
                                                        id="searchbyradio" value="customer_code"> برقم الصادر
                                                    <input type="radio" name="searchbyradio" id="searchbyradio"
                                                        value="account_number"> عنوان الصادر
                                                    <input type="radio" name="searchbyradio" id="searchbyradio"
                                                        value="name"> بشأن
                                                    <input autofocus
                                                        style="margin-top: 10px !important;height: calc(2.25rem + 6px);"
                                                        type="text" id="search_by_text"
                                                        placeholder=" بشأن  - عنوان الصادر  - برقم الصادر "
                                                        class="form-control">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for=""> حالة تنفيذ الوارد </label>
                                                    <select name="" id="" class="form-control">
                                                        <option value="all" selected> عرض الكل </option>
                                                        <option value="1"> تم الرد</option>
                                                        <option value="0"> لم يتم </option>
                                                        <option value="2"> جاري </option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for=""> مـــن </label>
                                                    <input type="date" id="search_by_text" class="form-control"
                                                        style="height: calc(2.25rem + 6px);">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for=""> الــــي </label>
                                                    <input type="date" id="search_by_text" class="form-control"
                                                        style="height: calc(2.25rem + 6px);">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <button class="btn btn-primary" type="submit"
                                                        style="width: 130px;height: calc(2.25rem + 6px);margin-top: 30px !important"
                                                        onclick="showReport()"> عرض التقرير </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="div3" style="display: none;">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <input type="radio" checked name="searchbyradio"
                                                        id="searchbyradio" value="customer_code"> برقم الجهة
                                                    <input type="radio" name="searchbyradio" id="searchbyradio"
                                                        value="account_number"> اسم الجهة
                                                    <input type="radio" name="searchbyradio" id="searchbyradio"
                                                        value="name"> بشأن
                                                    <input autofocus
                                                        style="margin-top: 10px !important;height: calc(2.25rem + 6px);"
                                                        type="text" id="search_by_text"
                                                        placeholder=" بشأن  - اسم الجهة  - برقم الجهة "
                                                        class="form-control">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for=""> حالة تنفيذ الوارد </label>
                                                    <select name="" id="" class="form-control">
                                                        <option value="all" selected> عرض الكل </option>
                                                        <option value="1"> تم الرد</option>
                                                        <option value="0"> لم يتم </option>
                                                        <option value="2"> جاري </option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for=""> مـــن </label>
                                                    <input type="date" id="search_by_text" class="form-control"
                                                        style="height: calc(2.25rem + 6px);">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for=""> الــــي </label>
                                                    <input type="date" id="search_by_text" class="form-control"
                                                        style="height: calc(2.25rem + 6px);">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <button class="btn btn-primary" type="submit"
                                                        style="width: 130px;height: calc(2.25rem + 6px);margin-top: 30px !important"
                                                        onclick="showReport()"> عرض التقرير </button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="card card-secondary" id="Report" style="display: none;">
                                    <div class="card-body" style="direction: rtl;">
                                        <div id="ajax_responce_serarchDiv" class="col-md-12">
                                            @if (@isset($data) && !@empty($data) && count($data) > 0)
                                            {{-- <table id="example2" class="table table-bordered table-hover">
                                                <thead class="custom_thead">
                                                    <th> الجهة </th>
                                                    <th> الموضوع </th>
                                                    <th>  المسؤل </th>
                                                    <th> تأشيرة السيد المحافظ </th>
                                                    <th> موقف التنفيذ </th>
                                                    <th> ملاحظات </th>

                                                </thead>
                                                <tbody>
                                                    @foreach ($data as $info)
                                                    <tr>
                                                        <td>{{ $info->name_side->side_name }}</td>
                                                        <td>{{ $info->name }}</td>
                                                        <td></td>
                                                        <td>
                                                           @if($info->current_balance >0)
                                                           مدين ب ({{ $info->current_balance*1 }}) جنيه
                                                           @elseif ($info->current_balance <0)
                                                           دائن ب ({{ $info->current_balance*1*(-1) }})   جنيه
                                                           @else
                                                           متزن
                                                           @endif
                                                        </td>

                                                        <td></td>
                                                        <td>{{ $info->notes }}</td>

                                                     </tr>
                                                    @endforeach
                                                </tbody>
                                            </table> --}}
                                            <br>

                                            @else
                                            <div class="alert alert-danger">
                                               عفوا لاتوجد بيانات لعرضها !!
                                            </div>
                                            @endif
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

    <script src="assets/bundles/jquery-ui/jquery-ui.min.js"></script>

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

    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>
    <script>
        function hola() {
            var mselect = document.getElementById("mselect");
            var mselectvalue = mselect.options[mselect.selectedIndex].value;
            var mdiv1 = document.getElementById("div1");
            var mdiv2 = document.getElementById("div2");
            var mdiv3 = document.getElementById("div3");

            if (mselectvalue == 1) {
                div1.style.display = "block";
                div2.style.display = "none";
                div3.style.display = "none";
            } else if (mselectvalue == 2) {
                div1.style.display = "none";
                div2.style.display = "block";
                div3.style.display = "none";
            } else if (mselectvalue == 3) {
                div1.style.display = "none";
                div2.style.display = "none";
                div3.style.display = "block";
            } else {
                div1.style.display = "none";
                div2.style.display = "none";
                div3.style.display = "none";
            }

        }

        function showReport() {
            document.getElementById("Report").style.display = "block";
        }
    </script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>


<!-- datatables.html  21 Nov 2019 03:55:25 GMT -->

</html>
