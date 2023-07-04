@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="assets/bundles/select2/dist/css/select2.min.css">
    <style>
        #import_inside {
            display: none;
        }

        #reply {
            display: none;
        }
    </style>
@endsection
@section('content')
    <div class="col-12 col-md-12 col-lg-12" style="direction: rtl">
        <div class="card card-primary">
            <div class="card-header">
                <h4>اضــافة وارد جديــد</h4>
                <div class="card-header-action">

                    <a href="{{ route('topic.index') }}" class="btn btn-warning">كل
                        الوارد</a>
                    <a href="{{ route('home') }}" class="btn btn-primary">الرئيسية</a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group col-md-12" style="direction: rtl">
                    <div class="row">
                        <label for="select" class="col-md-2 col-form-label text-md-end"
                            style="font-size: 16px; font-weight: 800;
                        color: black;">{{ __(' اختر نوع الملف الوارد ') }}</label>
                        <div class="col-md-10">
                            <select class="form-control" id="mselect" name="select" onChange="hola();" required>
                                <option value="" disabled selected> اختر نوع الوارد
                                </option>
                                <option value="1"> وارد لجهة </option>
                                <option value="2"> وارد لإدارة</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-secondary" id="side">
            <form class="needs-validation" id="work_experience" novalidate="" action="{{ route('topics.save') }}"
                method="POST"enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <input class="user-name text-bold-700 float-left" type="hidden" name="cat_name"
                        value="{{ Auth::user()->cat_name }}">
                    <input class="user-name text-bold-700 float-left" type="hidden" name="users_name"
                        value="{{ Auth::user()->name }}">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>رقم الوارد المكاتبة</label>
                            <input style="height: calc(2.25rem + 6px);" id="import_id" type="number" name="import_id" class="form-control" required>
                                <div class="invalid-feedback">
                                    الرجاء ادخال رقم الوارد
                                  </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>تاريخ الوارد المكاتبة</label>
                            <input style="height: calc(2.25rem + 6px);" type="date" name="import_date" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label> رقم المكتب الداخلي </label>
                            <input style="height: calc(2.25rem + 6px);" type="number" name="office_id" class="form-control" required>
                                <div class="invalid-feedback">
                                    الرجاء ادخال رقم المكتب الداخلي
                                  </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label> تاريخ استلام الوارد </label>
                            <input style="height: calc(2.25rem + 6px);" type="date" name="recived_date"
                                class="form-control" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label> الإدارة المسؤلة </label>
                            <select class="form-control select2" name="responsibles_id[]" multiple style="width: 100%;">
                                <option value="" disabled> الإدارة المسؤلة للمتابعة
                                </option>
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
                            <input style="height: calc(2.25rem + 6px);" type="text" name="name"
                                class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label> اسم الجهة الوارد منها</label>
                            <button type="button" class="btn-success" data-toggle="modal" data-target="#exampleModal"
                                style="float: left;margin-bottom: 5px;"> جهة جديدة </button>
                            <select class="form-control" name="side_id" required>
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
                            <label style="margin-bottom: 8px;"> الموقف التنفيذي </label>
                            <select class="form-control" name="state">
                                <option value="" disabled>اختر موقف الرد</option>
                                <option value="2" selected> جاري المتابعة </option>
                                <option value="1"> تم الرد </option>
                                <option value="0"> لم يتم الرد </option>
                                <option value="3"> ليس له رد </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label> تأشيرة السيد المحافظ </label>
                            <input style="height: calc(2.25rem + 6px);" type="text" name="vic_sign"
                                class="form-control" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label> الملف المرفق</label>
                            <input style="height: calc(2.25rem + 6px);" type="file" multiple name="file[]"
                                class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>اضافة ملاحظات</label>
                            <textarea class="form-control" cols="10" rows="5" name="notes"> </textarea>

                        </div>
                    </div>
                    <div class="card-footer text-left">
                        <button class="btn btn-success" type="submit">حفظ</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card card-secondary" id="reply">
            <form class="needs-validation" id="work_experience" novalidate=""
                action="{{ route('topics.reply.save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <input class="user-name text-bold-700 float-left" type="hidden" name="cat_name"
                        value="{{ Auth::user()->cat_name }}">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>رقم الرد</label>
                            <input style="height: calc(2.25rem + 6px);" type="number" name="reply_id"
                                class="form-control" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label> لصادر رقم</label>
                            <select class="form-control select2" id="project" name="responsible_export_id"
                                style="width: 100%;">
                                <option value="" disabled selected>اختر رقم الصادر
                                </option>
                                @isset($inside_export)
                                    @if ($inside_export && $inside_export->count() > 0)
                                        @foreach ($inside_export as $exportID)
                                            <option value="{{ $exportID->id }}">
                                                {{ $exportID->export_number }}
                                            </option>
                                        @endforeach
                                    @endif
                                @endisset
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label> رد الإدارة </label>
                            <select class="form-control select2" name="responsibles_id" style="width: 100%;">
                                <option value="" disabled selected> وارد إدارة </option>
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
                            <label>تاريخ استلام الرد</label>
                            <input style="height: calc(2.25rem + 6px);" type="date" name="date"
                                class="form-control" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label> الملف المرفق</label>
                            <input style="height: calc(2.25rem + 6px);" type="file" multiple name="reply_file[]"
                                class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label> تصديق معالي الوزير / المحافظ </label>
                            <input style="height: calc(2.25rem + 6px);" type="text" name="confirm_vic"
                                class="form-control">
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>عنوان موضوع الوارد</label>
                            <input style="height: calc(2.25rem + 6px);" type="text" name="topic"
                                class="form-control" required>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>اضافة ملاحظات</label>
                            <textarea class="form-control" cols="10" rows="5" name="notes"> </textarea>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-success" style="float: left;">حفظ</button>
                </div>
            </form>
        </div>
    </div>
@section('model')
    <!-- Modal with form -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card-header primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="float:left">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4> اضافة جهة للوارد </h4>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" novalidate="" action="{{ route('q.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> صورة الجهة </label>
                                <input style="height: calc(2.25rem + 6px);" type="file" name="side_image"
                                    accept="image/*" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label> اسم الجهة </label>
                                <input style="height: calc(2.25rem + 6px);" type="text" name="side_name"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="text-left">
                            <button class="btn btn-primary" type="submit">حفظ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@endsection
@section('script')
<script src="assets/bundles/select2/dist/js/select2.full.min.js"></script>
@if (Session::has('success'))
    <script>
        toastr.success("{{ Session::get('success') }}");
    </script>
@endif
@if (Session::has('error'))
    <script>
        toastr.success("{{ Session::get('error') }}");
    </script>
@endif
<script>
    $('.option').hide();
    $('#city').on('change', function(e) {
        $('.option').hide();
        $('.city-' + e.target.value).show();
    });
</script>
<script>
    function hola() {
        var mselect = document.getElementById("mselect");
        var mselectvalue = mselect.options[mselect.selectedIndex].value;
        var mdivone = document.getElementById("side");
        var mdivtwo = document.getElementById("reply");


        if (mselectvalue == 1) {
            mdivone.style.display = "block";
            mdivtwo.style.display = "none";
            document.getElementById("side").disabled = true;
        } else {
            mdivone.style.display = "none";
            mdivtwo.style.display = "block";
            document.getElementById("side").disabled = false;
        }
    }
</script>
@endsection
