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
    <link rel="stylesheet" href="assets/bundles/pretty-checkbox/pretty-checkbox.min.css">
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
    <style>
        .table.table-bordered td,
        .table.table-bordered th {
            height: 40px !important;
        }

        h6,
        label {
            color: #000 !important;
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
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-secondary"
                                    style="border-right: 63px solid #ffa426;border-top:0px;">
                                    <div class="card-header">
                                        <h4> فاكس الملف الوارد </h4>
                                        <div class="card-header-action">
                                            <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info"
                                                href="#"><i class="fas fa-minus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="collapse show" id="mycard-collapse">
                                        <div class="card-body">
                                            <embed src="vice/2623_012132.pdf" type="application/pdf"
                                                height="900px" width="100%">
                                        </div>

                                    </div>
                                </div>
                                @isset($Gsignatur)
                                    @foreach ($Gsignatur as $num => $GS)
                                        <div class="card card-secondary">
                                            <div class="card-header">
                                                <h4> جهة الوارد : <span> ( {{ $GS->side_name }})</span> </h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row col-md-12">
                                                    <div class=" col-md-4">
                                                        <h6 style="float: left;"> التاريخ : <span> (
                                                                {{ $GS->posta_date }} )</span> </h6>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <h6> رقم المكاتبة : <span> ( {{ $GS->posta_num }} )</span>
                                                        </h6>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                    </div>
                                                </div>
                                                <div class="row col-md-12" style="margin-top: -25px;">
                                                    <div class=" col-md-4">
                                                        <h6 style="float: left;"> تاريخ الوارد : <span> (
                                                                {{ $GS->bosta_recive }} )</span>
                                                        </h6>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <h6> رقم المكتب : <span> ( {{ $GS->posta_office_num }} )</span>
                                                        </h6>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                    </div>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" style="height: 50px !important;">
                                                        <tbody style="height: 50px;">
                                                            <tr style="border: 2px solid;">
                                                                <td class="text-bold-700"
                                                                    style="border-right: 2px solid;width:5%">
                                                                    <input type="checkbox" name="side1" id=""
                                                                        style="width: 35px;height: 35px;">

                                                                </td>
                                                                <td class="text-bold-700" style="border-right: 2px solid;">
                                                                    <h6> السيد السكرتير العام </h6>
                                                                </td>
                                                                <td class="text-bold-700"
                                                                    style="border-right: 2px solid;width:5%">
                                                                    <input type="checkbox" name="side2" id=""
                                                                        style="width: 35px;height: 35px;">
                                                                </td>
                                                                <td class="text-bold-700">
                                                                    <h6> السيد نائب المحافظ </h6>
                                                                </td>

                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div>
                                                    <br>
                                                    <h6> <span> ( الجهات المعنية )</span> </h6>
                                                    <br>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <tbody>
                                                            <tr style="border: 2px solid;">
                                                                <td class="text-bold-700"
                                                                    style="border-right: 2px solid;width:5%">
                                                                    <input type="checkbox" name="side3" id=""
                                                                        style="width: 35px;height: 35px;">

                                                                </td>
                                                                <td class="text-bold-700">
                                                                    <h6> السيد السكرتير العام </h6>
                                                                </td>
                                                            </tr>
                                                            <tr style="border: 2px solid;">
                                                                <td class="text-bold-700"
                                                                    style="border-right: 2px solid;width:5%">
                                                                    <input type="checkbox" name="side4" id=""
                                                                        style="width: 35px;height: 35px;">

                                                                </td>
                                                                <td class="text-bold-700">
                                                                    <h6> السيد السكرتير العام </h6>
                                                                </td>
                                                            </tr>
                                                            <tr style="border: 2px solid;">
                                                                <td class="text-bold-700"
                                                                    style="border-right: 2px solid;width:5%">
                                                                    <input type="checkbox" name="side5" id=""
                                                                        style="width: 35px;height: 35px;">

                                                                </td>
                                                                <td class="text-bold-700">
                                                                    <h6> السيد السكرتير العام </h6>
                                                                </td>
                                                            </tr>
                                                            <tr style="border: 2px solid;">
                                                                <td class="text-bold-700"
                                                                    style="border-right: 2px solid;width:5%">
                                                                    <input type="checkbox" name="side6" id=""
                                                                        style="width: 35px;height: 35px;">

                                                                </td>
                                                                <td class="text-bold-700">
                                                                    <h6> السيد السكرتير العام </h6>
                                                                </td>
                                                            </tr>
                                                            <tr style="border: 2px solid;">
                                                                <td class="text-bold-700"
                                                                    style="border-right: 2px solid;width:5%">
                                                                    <input type="checkbox" name="side7" id=""
                                                                        style="width: 35px;height: 35px;">

                                                                </td>
                                                                <td class="text-bold-700">
                                                                    <h6> <input style="height: calc(2.25rem + 6px);" type="text"
                                                                        name="side_name" class="form-control"> </h6>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <br>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label> قرار السيد الوزير المحافظ </label>
                                                        <textarea class="form-control" cols="10" rows="5" name="notes" style="text-align: right"> </textarea>

                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-row">
                                                    <div class="form-group col-md-2"
                                                        style=" border-radius: 100px;border: 1px solid #000; height: 165px;">
                                                        <h6
                                                            style="    text-align: center;
                                                margin-top: 35px;">
                                                            متابعة</h6>
                                                        <input class="form-control" type="date" lang="fr-CA"
                                                            name="notes"
                                                            style="border: 0px;
                                                border-bottom: 1px solid;">

                                                    </div>
                                                    <div class="form-group col-md-8">

                                                    </div>

                                                </div>
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary"> حــفــظ </button>
                                                </div>

                                            </div>
                                            {{-- <div class="" style="padding-top: 15px;padding-bottom: 15px;direction:rtl">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover"
                                                id="table-2"style="width:100%;">
                                                <thead style="background-color: #26557c;">
                                                    <tr>
                                                        <th style="color: white"> # </th>
                                                        <th style="color: white"> ت : البريد </th>
                                                        <th style="color: white"> الجهة وارد البريد</th>
                                                        <th style="color: white"> الحالة </th>
                                                        <th style="color: white"> بشــــــــــــــــــــــــــــــــــأن
                                                        </th>
                                                        <th style="color: white">الملف</th>
                                                    </tr>
                                                </thead>
                                                <tbody style="background-color: #437dad59;">
                                                    @isset($Gsignatur)
                                                        @foreach ($Gsignatur as $num => $GS)
                                                            <tr>
                                                                <td class="text-bold-700">{{ $num + 1 }}</td>
                                                                <td class="text-bold text-bold-700" style="width: 10%">
                                                                    {{ $GS->posta_date }}</td>
                                                                <td class="text-bold text-bold-400" style="color: #000086;">
                                                                    {{ $GS->posta_side }}</td>
                                                                <td style="width: 5%">
                                                                    <div class="badge badge-danger">{{ $GS->posta_state }}
                                                                    </div>
                                                                </td>
                                                                <td class="text-bold text-bold-700"> {{ $GS->posta_about }}
                                                                </td>
                                                                <td style="width: 10%">
                                                                    <a href="{{ route('scan',$GS->id) }}" class="portfolio-box" target="_blank">
                                                                        <i class="material-icons">attach_file</i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endisset
                                                </tbody>
                                            </table>
                                            <div id="pdf-container">

                                            </div>
                                        </div>
                                    </div> --}}

                                        </div>
                                    @endforeach
                                @endisset
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

    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>
</body>


<!-- datatables.html  21 Nov 2019 03:55:25 GMT -->

</html>
