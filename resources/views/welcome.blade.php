<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{asset('images/logo-favicon.png')}}" type="image/x-icon">
        <title>@yield('title'){{Config('app.name','Blogs')}}</title>

        <!-- Fonts -->

        <!-- Styles -->
        <link rel="stylesheet" href={{asset('css/style.css')}}>
        <link rel="stylesheet" href="{{asset('css/colors/blue.css')}}">
        <style>
            div.parent {
                position: relative;
                height:100vh
            }
            div.content {
                background-image: url("{{asset('images/bg.png')}}");
                background-size:cover;
                padding-top: 100px;
            }
            div.login-register-page {
                box-shadow: 6px 5px 36px #000;
                padding: 36px 12px;
                border-radius: 10px;  
                margin-top:20px;          
            }
            div.register ,div.reset-password{
                display: none;
            }
           
            .welcome-text span{
                color : rgb(0 0 0 /70%)
            }
            .welcome-text span a {
                font-weight: bold;
            }
            button {
                width:100% !important
            }
            div#footer {
                position: absolute;
                bottom: 0px;
                width: 100vw;
            }

        </style>
    </head>
    <body>
        <div class="parent">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="login-register-page login">
                                <!-- Welcome Text -->
                                <div class="welcome-text">
                                    <h3>We're glad to see you again!</h3>
                                    <span>Don't have an account? <a href="" class="font-weight-bold sign-up">Sign Up!</a></span>
                                </div>
                                    
                                <!-- Form -->
                                <form method="post" id="login-form">
                                    <div class="input-with-icon-left">
                                        <i class="icon-material-baseline-mail-outline"></i>
                                        <input type="text" class="input-text with-border" name="emailaddress" id="emailaddress" placeholder="Email Address" required/>
                                    </div>
                
                                    <div class="input-with-icon-left">
                                        <i class="icon-material-outline-lock"></i>
                                        <input type="password" class="input-text with-border" name="password" id="password" placeholder="Password" required/>
                                    </div>
                                    <a href="#" class="forgot-password">Forgot Password?</a>
                                </form>
                                
                                <!-- Button -->
                                <button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit" form="login-form">Log In <i class="icon-material-outline-arrow-right-alt"></i></button>
                                
                            </div>
                            <div class="login-register-page reset-password">
                                <!-- Welcome Text -->
                                <div class="welcome-text">
                                    <h3>We're glad to see you again!</h3>
                                    <span>Don't have an account? <a href="" class="font-weight-bold sign-up">Sign Up!</a></span>
                                </div>
                
                                
                                    
                                <!-- Form -->
                                <form method="post" id="register-account-form">
                                    <div class="input-with-icon-left" title="Should be at least 8 characters long" data-tippy-placement="bottom">
                                        <i class="icon-material-outline-lock"></i>
                                        <input type="password" class="input-text with-border" name="password-register" id="password-register" placeholder="Old Password" required/>
                                    </div>

                                    <div class="input-with-icon-left" title="Should be at least 8 characters long" data-tippy-placement="bottom">
                                        <i class="icon-material-outline-lock"></i>
                                        <input type="password" class="input-text with-border" name="password-register" id="password-register" placeholder="New Password" required/>
                                    </div>
                
                                    <div class="input-with-icon-left">
                                        <i class="icon-material-outline-lock"></i>
                                        <input type="password" class="input-text with-border" name="password-repeat-register" id="password-repeat-register" placeholder="Repeat Password" required/>
                                    </div>
                                </form>
                                
                                <!-- Button -->
                                <button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit" form="login-form">Reset <i class="icon-material-outline-arrow-right-alt"></i></button>

                            </div>
                            <div class="login-register-page register">
                                <!-- Welcome Text -->
                                <div class="welcome-text">
                                    <h3 style="font-size: 26px;">Let's create your account!</h3>
                                    <span>Already have an account? <a href="" class="sign-in">Log In!</a></span>
                                </div>
                
                                
                                    
                                <!-- Form -->
                                <form method="post" id="register-account-form">
                                    <div class="input-with-icon-left">
                                        <i class="icon-material-baseline-mail-outline"></i>
                                        <input type="text" class="input-text with-border" name="emailaddress-register" id="emailaddress-register" placeholder="Email Address" required/>
                                    </div>
                
                                    <div class="input-with-icon-left" title="Should be at least 8 characters long" data-tippy-placement="bottom">
                                        <i class="icon-material-outline-lock"></i>
                                        <input type="password" class="input-text with-border" name="password-register" id="password-register" placeholder="Password" required/>
                                    </div>
                
                                    <div class="input-with-icon-left">
                                        <i class="icon-material-outline-lock"></i>
                                        <input type="password" class="input-text with-border" name="password-repeat-register" id="password-repeat-register" placeholder="Repeat Password" required/>
                                    </div>
                                </form>
                                
                                <!-- Button -->
                                <button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit" form="login-form">Register <i class="icon-material-outline-arrow-right-alt"></i></button>

                            </div>

                        </div>
                        <div class="col-md-5 image offset-md-1">
                            <img src="{{asset('images/Blog-image.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="margin-top-70"></div>
            <!-- Footer Copyrights -->
            @include('layouts.footer')
        </div>
        
        <!-- Footer Copyrights -->

        <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('js/jquery-migrate-3.0.0.min.js')}}"></script>
        <script src="{{asset('js/mmenu.min.js')}}"></script>
        <script src="{{asset('js/tippy.all.min.js')}}"></script>
        <script src="{{asset('js/simplebar.min.js')}}"></script>
        <script src="{{asset('js/bootstrap-slider.min.js')}}"></script>
        <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
        <script src="{{asset('js/snackbar.js')}}"></script>
        <script src="{{asset('js/clipboard.min.js')}}"></script>
        <script src="{{asset('js/counterup.min.js')}}"></script>
        <script src="{{asset('js/magnific-popup.min.js')}}"></script>
        <script src="{{asset('js/slick.min.js')}}"></script>
        <script src="{{asset('js/custom.js')}}"></script>

        <script>
            $('a').click(function (ev) {
                ev.preventDefault();

            })
            $('.sign-up').click(function () {
                $('.register').show();
                $('.reset-password').hide();
                $('.login').hide();
            })
            $('.sign-in').click(function () {
                $('.login').show();
                $('.register').hide();
            })
            $('.forgot-password').click(function () {
                $('.reset-password').show();
                $('.login').hide();
            })        
            </script>
    </body>
</html>
