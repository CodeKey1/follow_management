@extends('layouts.admin')
@section('css')
@endsection
@section('content')
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" style="direction: rtl">
        <div class="card">
            <div class="body">
                <div id="mail-nav">
                    <a href="{{ route('topics.edit', $topics->id) }}" class="col-dark-gray" title="" data-toggle="tooltip"
                        data-original-title="عرض وتعديل">
                        <button type="button" class="btn btn-primary waves-effect btn-compose m-b-15">
                            تعديل
                        </button>
                    </a>
                    <h6 class="b-b p-10 text-strong">الإدارات المسؤلة للمتابعة المكاتبة الواردة
                        </h5>
                        <ul class="" id="mail-labels">
                            @foreach ($response->where('topic_id', $topics->id) as $value)
                                @if ($value->state == 1)
                                    <li>
                                        <a href="javascript:;">
                                            <i class="material-icons col-cyan">local_offer</i>
                                            {{ $value->Res_topic->name }}
                                            <div class="spinner-grow text-success" role="status">
                                                <span class="visually-hidden" style="color: #000"> تم الرد </span>
                                            </div>

                                        </a>
                                    </li>
                                @elseif($value->state == 0)
                                    <li>
                                        <a href="javascript:;">
                                            <i class="material-icons col-red">local_offer</i>{{ $value->Res_topic->name }}
                                            <div class="spinner-grow text-danger" role="status">
                                                <span class="visually-hidden" style="color: #000"> لم يتم </span>
                                            </div>
                                        </a>
                                    </li>
                                @elseif($value->state == 2)
                                    <li>
                                        <a href="javascript:;">
                                            <i
                                                class="material-icons col-orange">local_offer</i>{{ $value->Res_topic->name }}

                                            <div class="spinner-grow text-warning" role="status">
                                                <span class="visually-hidden" style="color: #000"> جاري </span>
                                            </div>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>

                </div>
            </div>
        </div>

    </div>
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9" style="direction: rtl">
        @if ($topics->state == 1)
            <button type="button" class="btn btn-success waves-effect btn-compose m-b-15" style="width: 100%"> تم الرد علي
                المكاتبة رقم {{ $topics->import_id }}</b>
            </button>
        @elseif($topics->state == 0)
            <button type="button" class="btn btn-danger waves-effect btn-compose m-b-15" style="width: 100%"> لم يتم الرد
                علي المكاتبة رقم
                {{ $topics->import_id }}</button>
        @elseif($topics->state == 2)
            <button type="button" class="btn btn-warning waves-effect btn-compose m-b-15" style="width: 100%"> جاري
                المتابعة علي المكاتبة رقم
                {{ $topics->import_id }}</button>
        @endif
        <div class="card">
            <div class="boxs mail_listing">
                <div class="inbox-body no-pad">
                    <section class="mail-list">
                        <div class="mail-sender">
                            <div class="mail-heading">
                                <div class="row">
                                    <div class="col-3">
                                        <h6 class="vew-mail-header" style="text-align: left">
                                            <span class="date pull-left"
                                                style="direction: rtl;margin-top: 18px; color: #28a745;font-size: 14px; font-weight: 400;">
                                                تاريخ
                                                إستلام الوارد :
                                                {{ $topics->recived_date->format('Y-M-d') }}
                                            </span>
                                        </h6>
                                    </div>

                                    <div class="col-9">
                                        <h6 class="vew-mail-header" style="color: #000">
                                            <b>{{ $topics->name }}</b>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <hr style="border-top: 1px solid rgb(0 0 0 / 35%);">
                            <div class="media">
                                <div class="media-body">
                                    <button type="button" class="btn btn-primary date pull-left">
                                        يوم <span class="badge badge-transparent">
                                            @if ($topics->state == 1)
                                                @foreach ($topics->t_export as $x_date)
                                                    {{ $topics->recived_date->diffInDays($x_date->send_date) }}
                                                @endforeach
                                            @else
                                                {{ $topics->recived_date->diffInDays($now) }}
                                            @endif
                                        </span>
                                    </button>
                                    <h5 class="text-primary" style="color:#000 !important;padding-right: 15px;">
                                        {{ $topics->name_side->side_name }}</h5>

                                    <span class="date pull-right"
                                        style="font-size: 14px; font-weight: 400;color: #dc3545;padding-right: 15px;direction: rtl;">

                                        تاريخ ارسال الجهة :
                                        {{ $topics->import_date->format('Y-M-d') }}

                                    </span>
                                </div>
                                <a href="#" class="table-img m-r-15">
                                    <img alt="image" src="../images/logo/logo.png" width="40" data-toggle="tooltip"
                                        title="Sachin Pandit">
                                </a>
                            </div>
                        </div>
                        <div class="view-mail p-t-20">
                            <p>{{ $topics->notes }}</p>
                        </div>
                        <div class="attachment-mail">
                            <div class="row">
                                @foreach (explode('|', $topics->file) as $file)
                                    <div class="col-md-2">
                                        <a href="{{ URL::to('attatch_office/import_follow/' . $file) }}" target="_blank">
                                            <img src="../assets/img/icon.png" class="img-thumbnail img-responsive"
                                                alt="{{ $file }}">
                                        </a>

                                    </div>
                                @endforeach
                            </div>

                        </div>
                        <label class="m-r-20" for="vice" style="color:#0072ff;margin-bottom: -1.5rem;"> تــأشيرة السـيد
                            الـمحافظ <img alt="image" width="30" src="../images/logo/aswan.png"
                                class="img-thumbnail img-responsive"></label>
                        <div class="replyBox m-t-0" id="vice">
                            <p class="p-b-20" style="color:#ff0011dd">
                                {{ $topics->vic_sign }} </p>
                        </div>

                    </section>
                </div>
            </div>
        </div>
        <div class="card">
            <form action="{{ route('viceNote') }}" method="POST"enctype="multipart/form-data">
                @csrf
                <div class="boxs mail_listing">
                    <div class="inbox-body no-pad">
                        <section class="mail-list">
                            <input type="text" name="topic_id" value="{{ $topics->id }}" hidden>
                            <label class="m-t-0" for="vice"
                                style="color:#000000;margin-bottom: -1.5rem;font-size: 17px;font-weight: 700;"> ملاحظات السـيد
                                الـمحافظ <img alt="image" width="30" src="../images/logo/aswan.png"
                                    class="img-thumbnail img-responsive"></label>
                            <textarea class="replyBox m-t-10" name="vice_note" style="width:100%;" cols="5" rows="4"></textarea>
                            <div class="card-footer text-left">
                                <button class="btn btn-success" type="submit">حفظ</button>
                            </div>
                        </section>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if ($topics->state == 1)
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" style="direction: rtl">
            <div class="card">
                <div class="body">
                    <div id="mail-nav">
                        <h6 class="b-b p-10 text-strong"> كل الجهات الصادر اليها المكاتبة </h5>
                            <ul class="" id="mail-labels">
                                @foreach ($exports as $value)
                                    @if ($topics->state == 1)
                                        <li>
                                            <a href="javascript:;">
                                                <i class="material-icons col-cyan">local_offer</i>
                                                {{ $value->sidename_export->side_name }}

                                            </a>
                                        </li>
                                    @elseif($topics->state == 0)
                                        <li>
                                            <a href="javascript:;">
                                                <i
                                                    class="material-icons col-red">local_offer</i>{{ $value->sidename_export->side_name }}

                                            </a>
                                        </li>
                                    @elseif($topics->state == 2)
                                        <li>
                                            <a href="javascript:;">
                                                <i
                                                    class="material-icons col-orange">local_offer</i>{{ $value->sidename_export->side_name }}
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @foreach ($exports->where('side_id', $topics->name_side->id) as $value)
        @if ($topics->state == 1)
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9" style="direction: rtl">
                @foreach ($exports->where('side_id', $topics->name_side->id) as $exports)
                    @if ($topics->state == 1)
                        <button type="button" class="btn btn-success waves-effect btn-compose m-b-15"
                            style="width: 100%"> تم الرد علي المكاتبة برقم
                            صادر{{ $exports->export_no }}</b> </button>
                    @elseif($topics->state == 0)
                        <button type="button" class="btn btn-danger waves-effect btn-compose m-b-15"
                            style="width: 100%"> لم يتم الرد علي المكاتبة برقم
                            صادر{{ $exports->export_no }}</button>
                    @elseif($topics->state == 2)
                        <button type="button" class="btn btn-warning waves-effect btn-compose m-b-15"
                            style="width: 100%"> جاري المتابعة علي المكاتبة برقم
                            صادر{{ $exports->export_no }}</button>
                    @endif
                @endforeach
                <div class="card">
                    <div class="boxs mail_listing">
                        <div class="inbox-body no-pad">
                            <section class="mail-list">
                                <div class="mail-sender">
                                    <div class="mail-heading">
                                        <div class="row">
                                            <div class="col-3">

                                            </div>
                                            <div class="col-9">
                                                <h4 class="vew-mail-header">
                                                    <b>{{ $exports->name }}</b>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="border-top: 1px solid rgb(0 0 0 / 35%);">
                                    <div class="media">
                                        <div class="media-body">

                                            <h5 class="text-primary" style="color:#000 !important;padding-right: 15px;">
                                                {{ $topics->name_side->side_name }}</h5>

                                            <span class="date pull-right"
                                                style="font-size: 14px; font-weight: 400;color: #dc3545;padding-right: 15px;direction: rtl;">
                                                @foreach ($topics->t_export->where('side_id', $topics->name_side->id) as $x_date)
                                                    تاريخ إرسال الصادر :
                                                    {{ $x_date->send_date->format('Y-M-d') }}
                                                @endforeach
                                            </span>
                                        </div>
                                        <a href="#" class="table-img m-r-15">
                                            <img alt="image" src="../images/logo/logo.png" width="40"
                                                data-toggle="tooltip" title="Sachin Pandit">
                                        </a>
                                    </div>
                                </div>
                                <div class="view-mail p-t-20">
                                    <p>{{ $topics->notes }}</p>
                                </div>
                                <div class="attachment-mail">
                                    <div class="row">
                                        @foreach (explode('|', $topics->file) as $file)
                                            <div class="col-md-2">
                                                <a href="{{ URL::to('attatch_office/import_follow/' . $file) }}"
                                                    target="_blank">
                                                    <img src="../assets/img/icon.png" class="img-thumbnail img-responsive"
                                                        alt="{{ $file }}">
                                                </a>

                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                                <label class="m-r-20" for="vice" style="color:#176007;margin-bottom: -1.5rem;">
                                    ملاحظـــات
                                    <img alt="image" width="30" src="../images/logo/aswan.png"
                                        class="img-thumbnail img-responsive"></label>
                                <div class="replyBox m-t-0" id="vice">
                                    <p class="p-b-20" style="color:#000000dd">
                                        {{ $exports->details }} </p>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($topics->state == 0)
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" style="direction: rtl">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                <button type="button" class="btn btn-danger waves-effect btn-compose m-b-15"style="width: 100%"> لم يتم
                    الرد علي المكاتبة برقم
                    صادر{{ $value->export_no }}</button>
            </div>
        @elseif($topics->state == 2)
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" style="direction: rtl">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                <button type="button" class="btn btn-warning waves-effect btn-compose m-b-15"style="width: 100%"> جاري
                    المتابعة علي المكاتبة برقم
                    صادر{{ $value->export_no }}</button>
            </div>
        @endif
    @endforeach
@endsection
@section('script')
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
@endsection
