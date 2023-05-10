<!DOCTYPE html>
<html lang="en">


<!-- email-read.html  21 Nov 2019 03:51:00 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>مكتب السيد المحافظ</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="../assets/css/app.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="../assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
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
                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="card">
                                    <div class="body">
                                        <div id="mail-nav">
                                            <button type="button" class="btn btn-danger waves-effect btn-compose m-b-15">COMPOSE</button>

                                            <h6 class="b-b p-10 text-strong">الإدارات المسؤلة للمتابعة الوارد</h5>
                                            <ul class="" id="mail-labels">
                                                @foreach ($response->where('topic_id', $topics->id) as $value)
                                                    @if ($value->state == 1)
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="material-icons col-cyan">local_offer</i>{{ $value->Res_topic->name }}</a>
                                                        </li>
                                                    @elseif($value->state == 0)
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="material-icons col-orange">local_offer</i>{{ $value->Res_topic->name }}</a>
                                                        </li>
                                                    @elseif($value->state == 2)
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="material-icons col-red">local_offer</i>{{ $value->Res_topic->name }}</a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                            {{-- <ul class="" id="mail-labels">
                                                @foreach ($response->where('topic_id', $topics->id) as $value)
                                                    @if ($value->state == 1)
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="material-icons col-cyan">local_offer</i>{{ $value->Res_topic->name }}</a>
                                                        </li>
                                                    @elseif($value->state == 0)
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="material-icons col-orange">local_offer</i>{{ $value->Res_topic->name }}</a>
                                                        </li>
                                                    @elseif($value->state == 2)
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="material-icons col-red">local_offer</i>{{ $value->Res_topic->name }}</a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul> --}}

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                                <div class="card">
                                    <div class="boxs mail_listing">
                                        <div class="inbox-body no-pad">
                                            <section class="mail-list">
                                                <div class="mail-sender">
                                                    <div class="mail-heading">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <h6 class="vew-mail-header" style="text-align: left">
                                                                    <b>{{ $topics->import_id }}</b>
                                                                </h6>

                                                            </div>
                                                            <div class="col-6">
                                                                <h4 class="vew-mail-header" >
                                                                    <b>{{ $topics->name }}</b>
                                                                </h4>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <hr style="border-top: 1px solid rgb(0 0 0 / 35%);">
                                                    <div class="media">
                                                        <div class="media-body">
                                                            <span class="date pull-left"
                                                            style="direction: rtl; color: #000000;font-size: 14px; font-weight: 400;">
                                                            @foreach ($topics->t_export as $x_date)
                                                             {{ $x_date->send_date->diffInDays($topics->recived_date) }} يوم
                                                            @endforeach
                                                        </span>
                                                            <h5 class="text-primary"
                                                                style="color:#000 !important;padding-right: 15px;">
                                                                {{ $topics->name_side->side_name }}</h5>
                                                                <span class="date pull-left"
                                                                style="direction: rtl; color: #28a745;font-size: 14px; font-weight: 400;"> تاريخ
                                                                الاستلام : {{ $topics->recived_date->format('Y-M-d') }}
                                                            </span>
                                                            <span class="date pull-right" style="font-size: 14px; font-weight: 400;color: #dc3545;padding-right: 15px;direction: rtl;">
                                                                @foreach ($topics->t_export as $x_date)
                                                                تاريخ الإرسال : {{ $x_date->send_date->format('Y-M-d') }}
                                                                @endforeach
                                                            </span>
                                                        </div>
                                                        <a href="#" class="table-img m-r-15">
                                                            <img alt="image" src="../images/logo/logo.png"
                                                                width="40" data-toggle="tooltip"
                                                                title="Sachin Pandit">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="view-mail p-t-20">
                                                    <p>{{ $topics->notes }}</p>


                                                </div>
                                                <div class="attachment-mail">
                                                    <p>
                                                        <span>
                                                            <i class="fa fa-paperclip"></i> 3 attachments — </span>
                                                        <a href="#">Download all attachments</a> |
                                                        <a href="#">View all images</a>
                                                    </p>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <a href="#">
                                                                <img class="img-thumbnail img-responsive"
                                                                    alt="attachment"
                                                                    src="assets/img/users/user-1.png">
                                                            </a>
                                                            <a class="name" href="#"> IMG_001.png
                                                                <span>20KB</span>
                                                            </a>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <a href="#">
                                                                <img class="img-thumbnail img-responsive"
                                                                    alt="attachment"
                                                                    src="assets/img/users/user-3.png">
                                                            </a>
                                                            <a class="name" href="#"> IMG_002.png
                                                                <span>22KB</span>
                                                            </a>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <a href="#">
                                                                <img class="img-thumbnail img-responsive"
                                                                    alt="attachment"
                                                                    src="assets/img/users/user-4.png">
                                                            </a>
                                                            <a class="name" href="#"> IMG_003.png
                                                                <span>28KB</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="replyBox m-t-20">
                                                    <p class="p-b-20">click here to
                                                        <a href="#">Reply</a> or
                                                        <a href="#">Forward</a>
                                                    </p>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="settingSidebar">
                    <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
                    </a>
                    <div class="settingSidebar-body ps-container ps-theme-default">
                        <div class=" fade show active">
                            <div class="setting-panel-header">Setting Panel
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Select Layout</h6>
                                <div class="selectgroup layout-color w-50">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="1"
                                            class="selectgroup-input-radio select-layout" checked>
                                        <span class="selectgroup-button">Light</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="2"
                                            class="selectgroup-input-radio select-layout">
                                        <span class="selectgroup-button">Dark</span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                                <div class="selectgroup selectgroup-pills sidebar-color">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="icon-input" value="1"
                                            class="selectgroup-input select-sidebar">
                                        <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                            data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="icon-input" value="2"
                                            class="selectgroup-input select-sidebar" checked>
                                        <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                            data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Color Theme</h6>
                                <div class="theme-setting-options">
                                    <ul class="choose-theme list-unstyled mb-0">
                                        <li title="white" class="active">
                                            <div class="white"></div>
                                        </li>
                                        <li title="cyan">
                                            <div class="cyan"></div>
                                        </li>
                                        <li title="black">
                                            <div class="black"></div>
                                        </li>
                                        <li title="purple">
                                            <div class="purple"></div>
                                        </li>
                                        <li title="orange">
                                            <div class="orange"></div>
                                        </li>
                                        <li title="green">
                                            <div class="green"></div>
                                        </li>
                                        <li title="red">
                                            <div class="red"></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <div class="theme-setting-options">
                                    <label class="m-b-0">
                                        <input type="checkbox" name="custom-switch-checkbox"
                                            class="custom-switch-input" id="mini_sidebar_setting">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="control-label p-l-10">Mini Sidebar</span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <div class="theme-setting-options">
                                    <label class="m-b-0">
                                        <input type="checkbox" name="custom-switch-checkbox"
                                            class="custom-switch-input" id="sticky_header_setting">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="control-label p-l-10">Sticky Header</span>
                                    </label>
                                </div>
                            </div>
                            <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                                    <i class="fas fa-undo"></i> Restore Default
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="../assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <script src="../assets/bundles/ckeditor/ckeditor.js"></script>
    <!-- Page Specific JS File -->
    <script src="../assets/js/page/ckeditor.js"></script>
    <!-- Template JS File -->
    <script src="../assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="../assets/js/custom.js"></script>
</body>


<!-- email-read.html  21 Nov 2019 03:51:00 GMT -->

</html>
