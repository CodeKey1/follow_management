<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title> مكتب السيد المحافظ </title>
    <link rel='shortcut icon' type='image/x-icon' href='images/logo/aswan.png' />
    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/rtl/bootstrap.min.css">
    <!-- Template CSS -->
    <!-- Custom style CSS -->
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
        }

        body {
            height: 100%;
            width: 100%;
        }

        .background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: url(images/logo/aswan.png) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            opacity: 0.8;
        }

        .background::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: linear-gradient(135deg, #279c96, #ee7326) !important;
            /*background-image: linear-gradient(to bottom, #ff0000, #ff3d66, #ff75ad, #ffa6e0, #f8d1fc, #decae9, #c9c2d2, #b9b9b9, #878787, #585858, #2e2e2e, #000000);*/
            opacity: .7;
        }

        .container {
            background-color: #fff;
            opacity: 0.95;
            border-radius: 15px;
            animation: glow 1s infinite alternate;
            margin-top: 10%;
        }

        .container #login-row #login-box #login-form {
            padding: 20px;
        }

        .container #login-row #login-box #login-form #register-link {
            margin-top: -85px;
        }

        #inner-logo {
            text-align: center;
            border-right: 1px solid #000;
        }

        #inner-logo img {
            width: 50%;
        }

        @keyframes glow {
            from {
                box-shadow: 0 0 10px 10px #279c96;
            }

            to {
                box-shadow: 0 0 10px 10px #ee7326;
            }
        }

        @media (min-width: 512px) {
            .container {
                margin-top: 5%;
                width: 50% !important;
            }
        }

        @media (max-width: 512px) {
            .container {
                margin-top: 5%;
                width: 90% !important;
            }

            #inner-logo {
                border: none;
            }

            #inner-logo img {
                width: 30%;
            }
        }

        @media only screen and (min-width: 500px) and (max-width: 1200px) {
            #inner-logo {
                border: none;
            }

            #inner-logo img {
                width: 23%;
            }
        }
    </style>
    <style>
        #gover {
            display: flex;
            flex-direction: row;
            width: 100%;
            justify-content: space-around;
            align-items: center;
            padding: 5px;
        }

        #gover img {
            width: 40%;
            border-radius: 10px;
            box-shadow: rgba(0, 0, 0, 0.2) 0px 18px 50px -10px;
        }

        .window {
            display: none;
            position: fixed;
            z-index: 10;
            padding: 50px 0;
            left: 0;
            top: 0;
            width: 100vw;
            height: 100%;
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgba(0, 0, 0, 0.5);
        }

        .window .title {
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .window .profile {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            display: inline-block;
            box-shadow: 0 0 5px var(--primary), 0 0 10px var(--primary);
        }

        .window h1 {
            display: inline-block;
            margin-left: 10px;
        }

        /* The Close Button */

        .window-close {
            color: #fff;
            float: right;
            font-size: 40px;
            font-weight: bold;
        }

        .window-close:hover,
        .window-close:focus {
            color: red;
            text-decoration: none;
            cursor: pointer;
        }

        /* window Content */
        .window-content {
            position: relative;
            background-color: #f8f8f8a0;
            margin: auto;
            padding: 10px;
            border: 1px solid #888;
            width: 50%;
            border-radius: 15px;
        }

        @media screen and (max-width: 768px) {
            .window .title {
                flex-direction: column;
                text-align: center;
                justify-content: center;
                align-items: center;
                width: 100%;
            }

            .window-content {
                width: 80%;
            }

            .window h1 {
                margin-left: 0;
            }

            .window p {
                text-align: justify;
            }

            #gover {
                flex-direction: column;
            }

            #gover img {
                width: 70%;
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="background"></div>
    <div class="container">
        <button class="btn btn-primary" onclick="showInfo()"
            style="position: absolute; border-radius: 50%; margin-top: 15px;">?</button>
        <h2 class="text-center pt-5">متابعة  مكتب السيد المحافظ </h2>
        <div id="login-col">
            <div class="col-lg-6" id="inner-logo">
                <img src="images/logo/logo.png">
            </div>
            <div class="col-lg-6">
                <form id="login-form" class="form text-right needs-validation" method="POST"
                    action="{{ route('login') }}">
                    <h3 class="text-center text-dark">تسجيل الدخول</h3>
                    @csrf
                    <div class="form-group">
                        <label for="username">البريد الالكتروني</label>
                        <input placeholder="username" type="email"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label">الرقم السري</label>
                        <input type="password" id="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password" placeholder="Password">
                        <label for="checkbox">عرض الرقم السري</label>
                        <input type="checkbox" id="checkbox" onclick="show()">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                            تسجيل الدخول
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--POP_UP WINDOW CLICKED THE a-->
    <div id='popup' class='window'>
        <div class='window-content'>
            <span class='window-close'>&times;</span>
            <div id='popup-content'>
            </div>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <script>
        var modal = document.getElementById('popup');
        var change = document.getElementById('popup-content');
        var span = document.getElementsByClassName('window-close')[0];

        function showInfo() {
            modal.style.display = 'block';
            change.innerHTML = `<div class='row'>
                                  <div class='col-lg-12'>
                                      <div class='panel panel-default'>
                                          <div class='panel-heading' style='text-align: center; font-weight: bold; font-size: larger'>
                                              حول البرنامج
                                          </div>
                                      <div id='gover'>
                    <img src='images/ashraf.jpg'>
                    <h4 class='text-center text-info'>تم انشاء وتطوير البرنامج  في عهد <br><br> محافظ اسوان اللواء الوزير / أشرف عطية عبدالباري <br><br> مايو 2023 م</h4>
                  </div>
                                      <div class='panel-body text-right'>
                                          <h3 class='text-center text-info'>عن البرنامج</h3>
                                          <h4 class='text-center'> متابعة دورة العمل الخاصة بمكتب السيد المحافظ  <br> طباعة التقارير ومتابعة عمليات الوارد والصادر  </h4>
                                      </div>
                  <footer class='text-center' style='background-color:#279c96; color:white; border-radius:0 0 10px 10px'>
                  <h5 style='padding:5px;'>ادارة نظم المعلومات والتحول الرقمي</h5>
                  </div>
                  </footer>
                                  </div>
                              </div>`;
        }

        function show() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = 'none';
            window.onscroll = function() {};
        }
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
                window.onscroll = function() {};
            }
        }
    </script>
</body>


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->

</html>
