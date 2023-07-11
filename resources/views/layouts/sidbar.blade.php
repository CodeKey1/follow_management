<div class="navbar-bg">
</div>
<nav class="navbar navbar-expand-lg main-navbar sticky">
    <ul class="navbar-nav navbar-left">
        {{-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
                <span class="badge headerBadge1">
                    * </span> </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-left pullDown">
                <div class="dropdown-header">
                    اشعارات
                </div>
                <div class="dropdown-list-content dropdown-list-message">
                    <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white"></span>
                        <span class="dropdown-item-desc">
                            <span class="message-user">John Deo</span>
                            <span class="time messege-text">Please check your mail !!</span>
                            <span class="time">2 Min Ago</span>
                        </span>
                    </a>
                    <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                        </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                                Smith</span> <span class="time messege-text">Request for leave
                                application</span>
                            <span class="time">5 Min Ago</span>
                        </span>
                    </a>
                </div>
                <div class="dropdown-footer text-center">
                    <a href="#">عرض الكل <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li> --}}
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image"
                    src="../assets/img/user.jpg" class="user-img-radious-style"> <span
                    class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-left pullDown">
                <div class="dropdown-title"> {{ Auth::user()->name }} : مرحبا</div>
                {{-- <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                    الإعدادات
                </a> --}}
                <div class="dropdown-divider"></div>

                <div>
                    <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();"><i
                            class="fas fa-sign-out-alt"></i>
                        {{ __('تسجيل خروج') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </li>
        <li>
            {{-- <a href="{{ route('home') }}" > <img alt="image"
                src="images/investment.jpg"  /> --}}

            </a>
        </li>

    </ul>
    <div class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar"
                    class="nav-link nav-link-lg
                            collapse-btn">
                    <i data-feather="align-justify"></i></a>
            </li>

        </ul>
    </div>
</nav>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('home') }}" style="letter-spacing: initial"> <img alt="image"
                    src="../images/logo/aswan.png" class="header-logo" />
                <span class="logo-name"> مكتب السيد المحافظ </span>
            </a>
        </div>
        {{-- /* vice permission and role for sidebar*/ --}}
        @if (auth()->user()->hasRole('vice'))
            <ul class="sidebar-menu">
                <li class="dropdown active">
                    <a href="{{ route('home') }}" class="nav-link"><span> المتابعة </span><i
                            data-feather="monitor"></i></a>
                </li>
                <li class="menu-header">
                </li>
                <li class="dropdown " style="background-color: tomato;">
                    <a href="{{ route('bosta.index') }}" class="nav-link">
                        <span class="">تأشيرة السيد المحافظ </span>
                        <i data-feather="monitor"></i>
                    </a>
                </li>
                <li class="menu-header">
                </li>
                <li class="dropdown" style="background-color: #ff9147;">
                    <a href="{{ route('calendar') }}" class="nav-link"><span>  الأجندة </span><i
                            data-feather="monitor"></i></a>
                </li>
                <li class="menu-header">
                </li>
                <li class="dropdown" style="background-color: #00703b;">
                    <a href="{{ route('home') }}" class="nav-link"><span>  النوتة </span><i
                            data-feather="monitor"></i></a>
                </li>
                <li class="menu-header">
                </li>
                <li class="dropdown" style="background-color: #478aff;">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><span>  الفاكس </span>
                        <i data-feather="chevrons-right"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('bosta.Create') }}" style="color: black"> اضافة فاكس </a></li>
                    </ul>
                </li>
                <li class="menu-header">
                </li>
            </ul>
        @endif
        {{-- /* super admin permission and role for sidebar*/ --}}
        @if (auth()->user()->hasRole('admin'))
            <ul class="sidebar-menu">
                <li class="dropdown active">
                    <a href="{{ route('home') }}" class="nav-link"><span>الرئيسية</span><i
                            data-feather="monitor"></i></a>
                </li>

                {{-- <button type="button" class="btn btn-danger">
                     <span class="badge badge-transparent">4</span>
                  </button> --}}
                <li class="dropdown ">
                    <a href="{{ route('home') }}" class="nav-link">
                        <span class="">تأشيرة السيد المحافظ </span>
                        <i data-feather="monitor"></i>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="{{ route('home') }}" class="nav-link"><span>  الأجندة </span><i
                            data-feather="monitor"></i></a>
                </li>
                <li class="dropdown">
                    <a href="{{ route('home') }}" class="nav-link"><span>  النوتة </span><i
                            data-feather="monitor"></i></a>
                </li>

                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><span>  الفاكس </span>
                        <i data-feather="chevrons-right"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('bosta.index') }}">  تأشيرة السيد المحافظ </a></li>
                    </ul>
                </li>
                <li class="menu-header">
                    <hr />
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><span> الإدارت المسؤلة للمتابعة
                        </span>
                        <i data-feather="chevrons-right"></i></a>
                    <ul class="dropdown-menu">

                        <li><a class="nav-link" href="{{ route('manage') }}"> كل الإدارات </a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><span> الجهات الوارد منها
                        </span>
                        <i data-feather="chevrons-right"></i></a>
                    <ul class="dropdown-menu">

                        <li><a class="nav-link" href="{{ route('side') }}"> كل الجهات</a></li>
                    </ul>
                </li>
                <li class="menu-header">
                    <hr />
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><span>متابعة الوارد
                        </span>
                        <i data-feather="chevrons-left"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('topics.create') }}"> اضافة وارد</a></li>
                        <li><a class="nav-link" href="{{ route('topic.index') }}">كل الوارد</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><span>متابعة الصادر
                        </span>
                        <i data-feather="chevrons-right"></i></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="{{ route('exports') }}"> كل الصادر</a></li>
                            <li><a class="nav-link" href="{{ route('exports.create') }}">اضافة صادر </a></li>
                            <li><a class="nav-link" href="{{ route('export.internal') }}"> صادر الادارت لوارد </a></li>
                        </ul>
                </li>

                <li class="menu-header">
                    <hr />
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><span> التقارير </span>
                        <i data-feather="briefcase"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('report') }}">تقرير الطلبات الواردة</a></li>
                        <li><a class="nav-link" href="">تقرير شهري/سنوي </a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><span> الأرشيف </span>
                        <i data-feather="briefcase"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('archive') }}"> أرشيف متابعة الوارد </a></li>
                        <li><a class="nav-link" href="{{ route('Ex.archive') }}"> أرشيف متابعة الصادر </a></li>
                    </ul>
                </li>
                <li class="menu-header">
                    <hr />
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><span>الإعدادات</span>
                        <i data-feather="user-check"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('admin.users') }}"> المستخدمين</a></li>
                        <li><a class="nav-link" href="{{ route('role') }}">الصلحيات</a></li>
                        <li><a class="nav-link" href="">اعدادات البرنامج</a></li>

                    </ul>
                </li>
            </ul>
        @endif
        {{-- /* user permission and role for sidebar*/ --}}

        {{-- /* user permission and role for sidebar*/ --}}
        @if (auth()->user()->hasRole('user'))
            <ul class="sidebar-menu">
                <li class="dropdown active">
                    <a href="{{ route('home') }}" class="nav-link"><span>الرئيسية</span><i
                            data-feather="monitor"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><span> الإدارت المسؤلة للمتابعة
                        </span>
                        <i data-feather="chevrons-right"></i></a>
                    <ul class="dropdown-menu">

                        <li><a class="nav-link" href="{{ route('manage') }}"> كل الإدارات </a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><span> الجهات الوارد منها
                        </span>
                        <i data-feather="chevrons-right"></i></a>
                    <ul class="dropdown-menu">

                        <li><a class="nav-link" href="{{ route('side') }}"> كل الجهات</a></li>
                    </ul>
                </li>
                <li class="menu-header">
                    <hr />
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><span>متابعة الوارد
                        </span>
                        <i data-feather="chevrons-left"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('topics.create') }}"> اضافة وارد</a></li>
                        <li><a class="nav-link" href="{{ route('topic.index') }}">كل الوارد</a></li>
                    </ul>
                </li>
                {{-- <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><span>متابعة الصادر
                        </span>
                        <i data-feather="chevrons-right"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('exports.create') }}">اضافة صادر</a></li>
                        <li><a class="nav-link" href="{{ route('exports') }}"> كل الصادر</a></li>
                    </ul>
                </li> --}}

                <li class="menu-header">
                    <hr />
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><span> التقارير </span>
                        <i data-feather="briefcase"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="">تقرير الطلبات</a></li>
                        <li><a class="nav-link" href="">تقرير المزادات</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><span> الأرشيف </span>
                        <i data-feather="briefcase"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('archive') }}"> أرشيف متابعة الوارد </a></li>
                        <li><a class="nav-link" href="{{ route('Ex.archive') }}"> أرشيف متابعة الصادر </a></li>
                    </ul>
                </li>
                <li class="menu-header">
                    <hr />
                </li>

            </ul>
        @endif
        {{-- /* user permission and role for sidebar*/ --}}

        {{-- /* user permission and role for sidebar*/ --}}
        @if (auth()->user()->hasRole('export_user'))
        <ul class="sidebar-menu">
            <li class="dropdown active">
                <a href="{{ route('home') }}" class="nav-link"><span>الرئيسية</span><i
                        data-feather="monitor"></i></a>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><span> الإدارت المسؤلة للمتابعة
                    </span>
                    <i data-feather="chevrons-right"></i></a>
                <ul class="dropdown-menu">

                    <li><a class="nav-link" href="{{ route('manage') }}"> كل الإدارات </a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><span> الجهات الوارد منها
                    </span>
                    <i data-feather="chevrons-right"></i></a>
                <ul class="dropdown-menu">

                    <li><a class="nav-link" href="{{ route('side') }}"> كل الجهات</a></li>
                </ul>
            </li>
            <li class="menu-header">
                <hr />
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><span>متابعة الوارد
                    </span>
                    <i data-feather="chevrons-left"></i></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('topics.create') }}"> اضافة وارد</a></li>
                    <li><a class="nav-link" href="{{ route('topic.index') }}">كل الوارد</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><span>متابعة الصادر
                    </span>
                    <i data-feather="chevrons-right"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('exports') }}"> كل الصادر</a></li>
                        <li><a class="nav-link" href="{{ route('export.internal') }}">اضافة صادر</a></li>
                        <li><a class="nav-link" href="{{ route('exports.create') }}">اضافة صادر لوارد</a></li>
                    </ul>
            </li>

            <li class="menu-header">
                <hr />
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><span> التقارير </span>
                    <i data-feather="briefcase"></i></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="">تقرير الطلبات</a></li>
                    <li><a class="nav-link" href="">تقرير المزادات</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><span> الأرشيف </span>
                    <i data-feather="briefcase"></i></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('archive') }}"> أرشيف متابعة الوارد </a></li>
                    <li><a class="nav-link" href="{{ route('Ex.archive') }}"> أرشيف متابعة الصادر </a></li>
                </ul>
            </li>
            <li class="menu-header">
                <hr />
            </li>

        </ul>
        @endif
        {{-- /* user permission and role for sidebar*/ --}}

    </aside>
</div>
