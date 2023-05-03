<!DOCTYPE html>
<html lang="en">
<!-- datatables.html  21 Nov 2019 03:55:21 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title></title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css">
    <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
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
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body class="light theme-white dark-sidebar">
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            @include('layouts.sidbar')
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                  <div class="section-body" style="direction: rtl;">
                    <div class="row mt-sm-4">
                      <div class="col-12 col-md-12 col-lg-4">
                        <div class="card author-box">
                          <div class="card-body">
                            <div class="author-box-center">
                              <img alt="image" src="assets/img/users/user-1.png" class="rounded-circle author-box-picture">
                              <div class="clearfix"></div>
                              <div class="author-box-name">
                                <a href="#">Sarah Smith</a>
                              </div>
                              <div class="author-box-job">Web Developer</div>
                            </div>
                            <div class="text-center">
                              <div class="author-box-description">
                                <p>
                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur voluptatum alias molestias
                                  minus quod dignissimos.
                                </p>
                              </div>
                              <div class="mb-2 mt-3">
                                <div class="text-small font-weight-bold">Follow Hasan On</div>
                              </div>
                              <a href="#" class="btn btn-social-icon mr-1 btn-facebook">
                                <i class="fab fa-facebook-f"></i>
                              </a>
                              <a href="#" class="btn btn-social-icon mr-1 btn-twitter">
                                <i class="fab fa-twitter"></i>
                              </a>
                              <a href="#" class="btn btn-social-icon mr-1 btn-github">
                                <i class="fab fa-github"></i>
                              </a>
                              <a href="#" class="btn btn-social-icon mr-1 btn-instagram">
                                <i class="fab fa-instagram"></i>
                              </a>
                              <div class="w-100 d-sm-none"></div>
                            </div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header">
                            <h4>Personal Details</h4>
                          </div>
                          <div class="card-body">
                            <div class="py-4">
                              <p class="clearfix">
                                <span class="float-left">
                                  Birthday
                                </span>
                                <span class="float-right text-muted">
                                  30-05-1998
                                </span>
                              </p>
                              <p class="clearfix">
                                <span class="float-left">
                                  Phone
                                </span>
                                <span class="float-right text-muted">
                                  (0123)123456789
                                </span>
                              </p>
                              <p class="clearfix">
                                <span class="float-left">
                                  Mail
                                </span>
                                <span class="float-right text-muted">
                                  test@example.com
                                </span>
                              </p>
                              <p class="clearfix">
                                <span class="float-left">
                                  Facebook
                                </span>
                                <span class="float-right text-muted">
                                  <a href="#">John Deo</a>
                                </span>
                              </p>
                              <p class="clearfix">
                                <span class="float-left">
                                  Twitter
                                </span>
                                <span class="float-right text-muted">
                                  <a href="#">@johndeo</a>
                                </span>
                              </p>
                            </div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header">
                            <h4>Skills</h4>
                          </div>
                          <div class="card-body">
                            <ul class="list-unstyled user-progress list-unstyled-border list-unstyled-noborder">
                              <li class="media">
                                <div class="media-body">
                                  <div class="media-title">Java</div>
                                </div>
                                <div class="media-progressbar p-t-10">
                                  <div class="progress" data-height="6">
                                    <div class="progress-bar bg-primary" data-width="70%"></div>
                                  </div>
                                </div>
                              </li>
                              <li class="media">
                                <div class="media-body">
                                  <div class="media-title">Web Design</div>
                                </div>
                                <div class="media-progressbar p-t-10">
                                  <div class="progress" data-height="6">
                                    <div class="progress-bar bg-warning" data-width="80%"></div>
                                  </div>
                                </div>
                              </li>
                              <li class="media">
                                <div class="media-body">
                                  <div class="media-title">Photoshop</div>
                                </div>
                                <div class="media-progressbar p-t-10">
                                  <div class="progress" data-height="6">
                                    <div class="progress-bar bg-green" data-width="48%"></div>
                                  </div>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-12 col-lg-8">
                        <div class="card">
                          <div class="padding-20">
                            <ul class="nav nav-tabs" id="myTab2" role="tablist">
                              <li class="nav-item">
                                <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                                  aria-selected="true">About</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings" role="tab"
                                  aria-selected="false">Setting</a>
                              </li>
                            </ul>
                            <div class="tab-content tab-bordered" id="myTab3Content">
                              <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                                <div class="row">
                                  <div class="col-md-3 col-6 b-r">
                                    <strong>Full Name</strong>
                                    <br>
                                    <p class="text-muted">Emily Smith</p>
                                  </div>
                                  <div class="col-md-3 col-6 b-r">
                                    <strong>Mobile</strong>
                                    <br>
                                    <p class="text-muted">(123) 456 7890</p>
                                  </div>
                                  <div class="col-md-3 col-6 b-r">
                                    <strong>Email</strong>
                                    <br>
                                    <p class="text-muted">johndeo@example.com</p>
                                  </div>
                                  <div class="col-md-3 col-6">
                                    <strong>Location</strong>
                                    <br>
                                    <p class="text-muted">India</p>
                                  </div>
                                </div>
                                <p class="m-t-30">Completed my graduation in Arts from the well known and
                                  renowned institution
                                  of India – SARDAR PATEL ARTS COLLEGE, BARODA in 2000-01, which was
                                  affiliated
                                  to M.S. University. I ranker in University exams from the same
                                  university
                                  from 1996-01.</p>
                                <p>Worked as Professor and Head of the department at Sarda Collage, Rajkot,
                                  Gujarat
                                  from 2003-2015 </p>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                  industry. Lorem
                                  Ipsum has been the industry's standard dummy text ever since the 1500s,
                                  when
                                  an unknown printer took a galley of type and scrambled it to make a
                                  type
                                  specimen book. It has survived not only five centuries, but also the
                                  leap
                                  into electronic typesetting, remaining essentially unchanged.</p>
                                <div class="section-title">Education</div>
                                <ul>
                                  <li>B.A.,Gujarat University, Ahmedabad,India.</li>
                                  <li>M.A.,Gujarat University, Ahmedabad, India.</li>
                                  <li>P.H.D., Shaurashtra University, Rajkot</li>
                                </ul>
                                <div class="section-title">Experience</div>
                                <ul>
                                  <li>One year experience as Jr. Professor from April-2009 to march-2010
                                    at B.
                                    J. Arts College, Ahmedabad.</li>
                                  <li>Three year experience as Jr. Professor at V.S. Arts &amp; Commerse
                                    Collage
                                    from April - 2008 to April - 2011.</li>
                                  <li>Lorem Ipsum is simply dummy text of the printing and typesetting
                                    industry.
                                  </li>
                                  <li>Lorem Ipsum is simply dummy text of the printing and typesetting
                                    industry.
                                  </li>
                                  <li>Lorem Ipsum is simply dummy text of the printing and typesetting
                                    industry.
                                  </li>
                                  <li>Lorem Ipsum is simply dummy text of the printing and typesetting
                                    industry.
                                  </li>
                                </ul>
                              </div>
                              <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                                <form method="post" class="needs-validation">
                                  <div class="card-header">
                                    <h4>Edit Profile</h4>
                                  </div>
                                  <div class="card-body">
                                    <div class="row">
                                      <div class="form-group col-md-6 col-12">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" value="John">
                                        <div class="invalid-feedback">
                                          Please fill in the first name
                                        </div>
                                      </div>
                                      <div class="form-group col-md-6 col-12">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" value="Deo">
                                        <div class="invalid-feedback">
                                          Please fill in the last name
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="form-group col-md-7 col-12">
                                        <label>Email</label>
                                        <input type="email" class="form-control" value="test@example.com">
                                        <div class="invalid-feedback">
                                          Please fill in the email
                                        </div>
                                      </div>
                                      <div class="form-group col-md-5 col-12">
                                        <label>Phone</label>
                                        <input type="tel" class="form-control" value="">
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="form-group col-12">
                                        <label>Bio</label>
                                        <textarea
                                          class="form-control summernote-simple">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur voluptatum alias molestias minus quod dignissimos.</textarea>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="form-group mb-0 col-12">
                                        <div class="custom-control custom-checkbox">
                                          <input type="checkbox" name="remember" class="custom-control-input" id="newsletter">
                                          <label class="custom-control-label" for="newsletter">Subscribe to newsletter</label>
                                          <div class="text-muted form-text">
                                            You will get new information about products, offers and promotions
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="card-footer text-right">
                                    <button class="btn btn-primary">Save Changes</button>
                                  </div>
                                </form>
                              </div>
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
                            <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                            <span class="selectgroup-button">Light</span>
                          </label>
                          <label class="selectgroup-item">
                            <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                            <span class="selectgroup-button">Dark</span>
                          </label>
                        </div>
                      </div>
                      <div class="p-15 border-bottom">
                        <h6 class="font-medium m-b-10">Sidebar Color</h6>
                        <div class="selectgroup selectgroup-pills sidebar-color">
                          <label class="selectgroup-item">
                            <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                            <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                              data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                          </label>
                          <label class="selectgroup-item">
                            <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
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
                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                              id="mini_sidebar_setting">
                            <span class="custom-switch-indicator"></span>
                            <span class="control-label p-l-10">Mini Sidebar</span>
                          </label>
                        </div>
                      </div>
                      <div class="p-15 border-bottom">
                        <div class="theme-setting-options">
                          <label class="m-b-0">
                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                              id="sticky_header_setting">
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
    <script>
        $(document).ready(function() {
            $('table.table').DataTable();
        });
    </script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>
</body>


<!-- datatables.html  21 Nov 2019 03:55:25 GMT -->

</html>
