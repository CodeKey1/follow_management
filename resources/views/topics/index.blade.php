@extends('layouts.admin')
@section('css')
    <style>
        #import_inside {
            display: none;
        }

        thead input {
            width: 100%;
        }

        table.fixedHeader-floating {
            background-color: white
        }

        table.fixedHeader-floating.no-footer {
            border-bottom-width: 0
        }

        table.fixedHeader-locked {
            position: absolute !important;
            background-color: white
        }

        table {

            border-radius: 10px !important;

        }

        table.dataTable thead th,
        table.dataTable thead td {
            border-bottom: 1px solid #353c48 !important;
            padding: 7px
        }

        table.dataTable tr {
            border-bottom: 0.3px solid #a3a3a3 !important;
            border-radius: 10px !important;
            margin: 3px !important;
        }

        table.dataTable td {

            padding: 7px !important;
            color: #000;
            font-size: 14px;
            font-weight: 700;
        }

        @media print {
            table.fixedHeader-floating {
                display: none
            }
        }
    </style>
@endsection
@section('content')
    <div class="col-12">
        <div class="card card-secondary">
            <div class="card-header">
                <h4> كل ملفات متابعة الوارد </h4>
                <div class="card-header-action">
                    <div class="dropdown">
                        <a href="{{ route('topics.create') }}" class="btn btn-warning "> وارد
                            جديد </a>

                    </div>
                    <a href="{{ route('home') }}" class="btn btn-primary">الرئيسية</a>
                </div>
            </div>
        </div>
        <div class="section-body">
            <div class="row ">
                <div class="col-xl-4 col-lg-6">
                    <div class="card l-bg-green">
                        <div class="card-statistic-3">
                            <div class="card-icon card-icon-large"></div>
                            <div class="card-content">
                                <h4 class="card-title" style="color: black;"> نسبة الأكتمال
                                </h4>

                                @if ($topics && $topics->where('state', '<>', 1)->count() != 0)
                                    <span style="color: black;font-size: 16px;font-weight: 800;padding: 40px;">
                                        {{ ($topics->where('state', 1)->count() / $topics->count()) * 100 }}%
                                    </span>
                                @elseif ($topics->where('state', 1)->count() && $topics->count() != 0)
                                    <span style="color: black;font-size: 16px;font-weight: 800;padding: 40px;">
                                        {{ ($topics->where('state', 1)->count() / $topics->count()) * 100 }}%
                                    </span>
                                @else
                                    <span style="color: black;font-size: 16px;font-weight: 800;padding: 40px;">
                                        0%
                                    </span>
                                @endif
                                <span> نسبة الإكتمال الوارد</span>

                                <div class="progress mt-1 mb-1" data-height="8">
                                    @if ($topics->count() && $topics->where('state', 1)->count() != 0)
                                        <div class="progress-bar l-bg-green" role="progressbar"
                                            data-width="{{ ($topics->where('state', 1)->count() / $topics->count()) * 100 }}%"
                                            aria-valuenow="{{ $topics->count() }}" aria-valuemin="{{ $topics->count() }}"
                                            aria-valuemax="{{ $topics->count() }}"></div>
                                    @else
                                        <span class="float-left text-bold-700" style="font-size: 16px;font-weight: 600;">
                                            0%
                                        </span>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="card l-bg-purple">
                        <div class="card-statistic-3">
                            <div class="card-icon card-icon-large"></div>
                            <div class="card-content">
                                <h4 class="card-title" style="color: black;"> وارد لم يتم الرد
                                </h4>
                                <span> إجمالي وارد لم يتم الرد </span>
                                <span
                                    style="color: black;font-size: 16px;font-weight: 800;padding: 40px;">{{ $topics_trash }}</span>
                                <div class="progress mt-1 mb-1" data-height="8">
                                    @if ($topics_trash && $topics_trash > 0)
                                        <div class="progress-bar l-bg-green" role="progressbar"
                                            data-width="{{ ($topics_trash / $topics->count()) * 100 }}%"
                                            aria-valuenow="{{ $topics_trash }}" aria-valuemin="{{ $topics_trash }}"
                                            aria-valuemax="{{ $topics_trash }}"></div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="card l-bg-orange">
                        <div class="card-statistic-3">
                            <div class="card-icon card-icon-large"></div>
                            <div class="card-content">
                                <h4 class="card-title" style="color: black;"> عدد الوارد </h4>
                                <span class="text-nowrap"> اجمالي الملفات الواردة </span>
                                <span
                                    style="color: black;font-size: 16px;font-weight: 800;padding: 40px;">{{ $topics->count() }}</span>
                                <div class="progress mt-1 mb-1" data-height="8">
                                    @if ($topics->count() && $topics->where('state', 1)->count() != 0)
                                        <div class="progress-bar l-bg-green" role="progressbar"
                                            data-width="{{ ($topics->where('state', 1)->count() / $topics->count()) * 100 }}%"
                                            aria-valuenow="{{ $topics->count() }}" aria-valuemin="{{ $topics->count() }}"
                                            aria-valuemax="{{ $topics->count() }}"></div>
                                    @else
                                        <span class="float-left text-bold-700" style="font-size: 16px;font-weight: 600;">
                                            0%
                                        </span>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.error')
        @include('layouts.success')
        <div class="card card-secondary" id="import_side">
            <div class="card-header">
                <h4> متابعة الوارد الجهات</h4>
                <div class="card-header-action">
                    <div class="btn-group">
                        <a href="#" class="btn btn-warning" onclick="myFunction()">
                            وارد داخلي </a>
                    </div>
                    <a href="{{ route('home') }}" class="btn btn-primary">الرئيسية</a>
                </div>
            </div>

            <div class="" style="padding-top: 15px;padding-bottom: 15px;direction:rtl">
                <div class="table-responsive">
                    <table class="display" id="example" style="width:100%;text-align: center;">
                        <thead style="background-color: #353c48;height: 95px;">
                            <tr>
                                <th style="color: white"> # </th>
                                <th style="color: white"> المكاتبة </th>
                                <th style="color: white"> ت </th>
                                <th style="color: white"> الموضوع </th>
                                <th style="color: white"> جهة الوارد</th>
                                <th style="color: white"> الرد</th>
                                {{-- <th style="color: white"> الإدارات </th> --}}
                                {{-- <th> رقم الصادر </th> --}}
                                <th style="width: 3%;"> </th>
                            </tr>
                        </thead>
                        <tbody style="background-color: #353c483d;">
                            @isset($topics)
                                @foreach ($topics as $num => $Topic)
                                    <tr>
                                        <td class="text-bold-700"> {{ $num + 1 }}</td>
                                        <td class="text-bold-700">
                                            <a href="{{ route('topics.show', $Topic->id) }}">{{ $Topic->import_id }}</a>
                                        </td>
                                        <td class="text-bold-700">
                                            {{ $Topic->recived_date->format('y-m-d') }}</td>
                                        <td class="text-bold-700" style="text-align: right; color:#000;">
                                            <a href="{{ route('topics.show', $Topic->id) }}"
                                                style="text-align: right; color:#001f85;font-weight: 700;font-family: system-ui;">{{ $Topic->name }}</a>
                                        </td>
                                        <td class="text-bold-700">
                                            {{ $Topic->name_side->side_name }}

                                        </td>
                                        <td>
                                            @if ($Topic->state == 1)
                                                <div class="spinner-grow text-success" role="status">
                                                    <span class="visually-hidden" style="color: #000"> تم </span>
                                                </div>
                                            @elseif($Topic->state == 0)
                                                <div class="spinner-grow text-danger" role="status">
                                                    <span class="visually-hidden" style="color: #000"> لم يتم </span>
                                                </div>
                                            @elseif($Topic->state == 2)
                                                <div class="spinner-grow text-warning" role="status">
                                                    <span class="visually-hidden" style="color: #000"> جاري </span>
                                                </div>
                                            @endif
                                        </td>
                                        {{-- <td>
                                            @foreach ($response->where('topic_id', $Topic->id) as $value)
                                                @if ($value->state == 1)
                                                    <div class="badge badge-success">
                                                    </div>
                                                @elseif($value->state == 0)
                                                    <div class="badge badge-danger">
                                                    </div>
                                                @elseif($value->state == 2)
                                                    <div class="badge badge-warning">
                                                    </div>
                                                @endif
                                            @endforeach
                                        </td> --}}
                                        {{-- <td class="text-bold-700">
                                            @if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('export_user'))
                                            @foreach ($Topic->t_export as $Num)
                                                <a
                                                    href="{{ route('exports.edit', $Num->id) }}">
                                                    {{ $Num->export_no }} , </a>
                                            @endforeach
                                            @else
                                            <span class="badge badge-danger"> ليس لديك صلاحية
                                            </span>
                                            @endif
                                        </td> --}}
                                        <td style="width: 10%">
                                            <a href="{{ route('topics.edit', $Topic->id) }}"
                                                class="col-dark-gray waves-effect m-r-20" title=""
                                                data-toggle="tooltip" data-original-title="عرض وتعديل">
                                                <i class="material-icons">edit</i>
                                            </a>

                                            @if (auth()->user()->hasRole('admin'))
                                                <a href="{{ route('topics.delete', $Topic->id) }}"
                                                    class="col-dark-gray waves-effect m-r-20" title=""
                                                    data-toggle="tooltip" data-original-title="حذف">
                                                    <i class="material-icons">delete</i>
                                                </a>
                                            @endif
                                            {{-- <a href="{{ route('topics.archive', $Topic->id) }}"
                                            class="col-dark-gray waves-effect m-r-20"
                                            title="" data-toggle="tooltip"
                                            data-original-title="الارشيف">
                                            <i class="material-icons">archive</i>
                                        </a> --}}

                                        </td>
                                    </tr>
                                @endforeach
                            @endisset
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card card-secondary" id="import_inside">
            <div class="card-header">
                <h4> متابعة الوارد الداخلي</h4>
                <div class="card-header-action">
                    <div class="btn-group">
                        <a href="#" class="btn btn-warning" onclick="myFunction2()">
                            وارد الجهات </a>
                    </div>
                    <a href="{{ route('home') }}" class="btn btn-primary">الرئيسية</a>
                </div>
            </div>
            <div style="padding-top: 15px;padding-bottom: 15px;direction:rtl">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="table-2" style="width:100%;">
                        <thead>
                            <tr>

                                <th> رقم الرد </th>
                                <th> تاريخ استلام الوارد </th>
                                <th>عنوان الوارد </th>
                                <th> الإدارة الوارد منها</th>
                                <th> تصديق معالي الوزير / المحافظ </th>
                                <th> لصادر رقم</th>
                                <th>الملف الوارد</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($inside_import)
                                @foreach ($inside_import as $inside)
                                    <tr>

                                        <td>{{ $inside->reply_id }}</td>
                                        <td>{{ $inside->date }}</td>
                                        <td>{{ $inside->topic }}</td>
                                        <td>{{ $inside->Reply_res->name }}</td>
                                        <td>{{ $inside->confirm_vic }}</td>
                                        <td>
                                            {{ $inside->Reply_ex->export_number }}

                                        </td>
                                        <td>
                                            @foreach (explode('|', $inside->reply_file) as $file)
                                                <a href="{{ URL::to('attatch_office/import_follow/' . $file) }}"
                                                    class="portfolio-box" target="_blank">
                                                    <i class="material-icons">attach_file</i>
                                                </a>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                            @endisset
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('table.table').DataTable();
        });
    </script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>
    <script>
        function hola() {
            var mselect = document.getElementById("mselect");
            var mselectvalue = mselect.options[mselect.selectedIndex].value;
            var mdivside = document.getElementById("import_side");
            var mdivinside = document.getElementById("import_inside");


            if (mselectvalue == 1) {
                mdivside.style.display = "block";
                mdivtwo.style.display = "none";

            } else {
                mdivone.style.display = "none";
                mdivtwo.style.display = "block";

            }
        }
    </script>
    <script>
        function myFunction() {
            document.getElementById("import_side").style.display = "none";
            document.getElementById("import_inside").style.display = "block";
        }

        function myFunction2() {
            document.getElementById("import_side").style.display = "block";
            document.getElementById("import_inside").style.display = "none";
        }
    </script>
    <script>
        $(document).ready(function() {
            // Setup - add a text input to each footer cell
            $('#example thead tr').clone(true).addClass('filters').appendTo('#example thead');
            var table = $('#example').DataTable({
                orderCellsTop: true,
                fixedHeader: true,
                initComplete: function() {
                    var api = this.api();
                    // For each column
                    api.columns().eq(0).each(function(colIdx) {
                        // Set the header cell to contain the input element
                        var cell = $('.filters th').eq($(api.column(colIdx).header()).index());
                        var title = $(cell).text();
                        $(cell).html('<input class="form-control" type="text" placeholder="' +
                            title + '" />');
                        // On every keypress in this input
                        $('input', $('.filters th').eq($(api.column(colIdx).header()).index()))
                            .off('keyup change')
                            .on('keyup change', function(e) {
                                e.stopPropagation();
                                // Get the search value
                                $(this).attr('title', $(this).val());
                                var regexr =
                                    '({search})'; //$(this).parents('th').find('select').val();
                                var cursorPosition = this.selectionStart;
                                // Search the column for that value
                                api
                                    .column(colIdx)
                                    .search((this.value != "") ? regexr.replace('{search}',
                                            '(((' + this.value + ')))') : "", this.value !=
                                        "", this.value == "")
                                    .draw();
                                $(this).focus()[0].setSelectionRange(cursorPosition,
                                    cursorPosition);
                            });
                    });
                }
            });
        });
    </script>
@endsection
