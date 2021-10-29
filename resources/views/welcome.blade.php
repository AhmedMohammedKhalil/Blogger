<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{asset('images/logo-favicon.png')}}" type="image/x-icon">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title'){{Config('app.name','Blogs')}}</title>

        <!-- Fonts -->

        <!-- Styles -->
        <link rel="stylesheet" href={{asset('css/style.css')}}>
        <link rel="stylesheet" href="{{asset('css/colors/blue.css')}}">
        <style>
            
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
                                <form method="post" action="#" id="login-form">
                                    
                                    <div class="input-with-icon-left">
                                        <i class="icon-material-baseline-mail-outline"></i>
                                        <input type="email" class="input-email with-border{{ $errors->has('email_login') ? ' is-invalid' : '' }}" name="email_login" id="emailaddress"  placeholder="Email Address" value="{{ old('email_login') }}" required autofocus/>

                                        @if ($errors->has('email_login'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email_login') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                
                                    <div class="input-with-icon-left">
                                        <i class="icon-material-outline-lock"></i>
                                        <input type="password" class="input-text with-border{{ $errors->has('password_login') ? ' is-invalid' : '' }}" name="password_login" id="password" placeholder="Password" required/>
                                        @if ($errors->has('password_login'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password_login') }}</strong>
                                            </span>
                                        @endif
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
                                <form method="post" action="#" id="reset-password">
                                    <div class="input-with-icon-left">
                                        <i class="icon-material-baseline-mail-outline"></i>
                                        <input type="email" class="input-email with-border{{ $errors->has('email_reset') ? ' is-invalid' : '' }}" name="email_reset" id="emailaddress_reset"  placeholder="Email Address" value="{{ old('email_reset') }}" required autofocus/>
                                    
                                    </div>

                                    <div class="input-with-icon-left" title="Should be at least 8 characters long" data-tippy-placement="bottom">
                                        <i class="icon-material-outline-lock"></i>
                                        <input type="password" class="input-text with-border{{ $errors->has('password_reset') ? ' is-invalid' : '' }}" name="password_reset" id="password_reset" placeholder="New Password" required/>
                                        
                                    </div>
                
                                    <div class="input-with-icon-left">
                                        <i class="icon-material-outline-lock"></i>
                                        <input type="password" class="input-text with-border{{ $errors->has('password_repeat_reset') ? ' is-invalid' : '' }}" name="password_repeat_reset" id="password_repeat_reset" placeholder="Repeat Password" required/>
                                    </div>
                                </form>
                                
                                <!-- Button -->
                                <button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit" form="reset-password">Reset <i class="icon-material-outline-arrow-right-alt"></i></button>

                            </div>
                            <div class="login-register-page register">
                                <!-- Welcome Text -->
                                <div class="welcome-text">
                                    <h3 style="font-size: 26px;">Let's create your account!</h3>
                                    <span>Already have an account? <a href="" class="sign-in">Log In!</a></span>
                                </div>
                
                                
                                    
                                <!-- Form -->
                                <form method="POST" action="#" id="register-form">
                                    <div class="input-with-icon-left">
                                        <i class="icon-material-baseline-mail-outline"></i>
                                        <input type="text" class="input-text with-border{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" placeholder="Name" value="{{ old('name') }}" required autofocus/>
                                        
                                    </div>
                                    <div class="input-with-icon-left">
                                        <i class="icon-material-baseline-mail-outline"></i>
                                        <input type="email" class="input-text with-border{{ $errors->has('email_register') ? ' is-invalid' : '' }}" name="email_register" id="email_register" placeholder="Email Address" value="{{ old('email_register') }}" required/>
                                        
                                    </div>
                
                                    <div class="input-with-icon-left" title="Should be at least 8 characters long" data-tippy-placement="bottom">
                                        <i class="icon-material-outline-lock"></i>
                                        <input type="password" class="input-text with-border{{ $errors->has('password_register') ? ' is-invalid' : '' }}" name="password_register" id="password_register" placeholder="Password" required/>
                                       
                                    </div>
                
                                    <div class="input-with-icon-left" title="Should be at least 8 characters long" data-tippy-placement="bottom">
                                        <i class="icon-material-outline-lock"></i>
                                        <input type="password" class="input-text with-border{{ $errors->has('password_repeat_register') ? ' is-invalid' : '' }}" name='password_repeat_register' id='password_repeat_register' placeholder="Repeat Password" required/>
                                       
                                    </div>
                                </form>
                                
                                <!-- Button -->
                                <button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit" form="register-form">Register <i class="icon-material-outline-arrow-right-alt"></i></button>

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
        <script src="{{asset('js/app.js')}}"></script>
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
            function footer () {
                var p = $('#footer').position().top;
                var h = document.documentElement.clientHeight - 59;
                var scroll = document.documentElement.scrollHeight - 59;
                //console.log(p+" "+h)
                if(p < h) {
                    $('#footer').css({
                        position : "fixed",bottom : 0,width:'100%'
                    });
                }else {
                    $('#footer').css({
                            position : "relative",bottom : 0,width:'100%'
                    });
                }
                if(h < scroll) {
                    $('#footer').css({
                            position : "relative",bottom : 0,width:'100%'
                    });
                }
                
            }
            const resizeObserver = new ResizeObserver(() => {
                footer();
            });

            resizeObserver.observe(document.querySelector('#footer'))
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

            $(document).ready(() => {
                function messageError(errorName,message) {
                    $('input[name='+errorName+']').addClass('is-invalid');
                        $('input[name='+errorName+']').parent().prepend(
                            '<span id='+errorName+' class="invalid-feedback d-block px-2" role="alert">'+
                                    '<strong>'+message+'</strong>'+
                            '</span>'
                    );
                } 
                function deleteMessages() {

                    if($('input').hasClass('is-invalid')) {
                        $('input').removeClass('is-invalid');
                    }
                    if($('span.invalid-feedback').length) {
                        $('span.invalid-feedback').remove();
                    }
                    if($('span#invalid').length) {
                        $('span#invalid').remove();
                    }
                }
                $('#register-form').submit((e) => {
                    deleteMessages();
                    e.preventDefault();
                    axios.post('{{ route('register') }}',$(e.target).serialize())
                    .then((res) => {
                        console.log(res)
                        var errors = res.data.errors;
                        if(errors) {
                            console.log(errors)
                            if(errors.name){
                                messageError('name',errors.name[0]);
                            }
                            if(errors.email_register){
                                messageError('email_register',errors.email_register[0]);
                            }
                            
                            if(errors.password_register){
                                messageError('password_register',errors.password_register[0]);
                            }
                            if(errors.password_repeat_register){
                                messageError('password_repeat_register',errors.password_repeat_register[0]);
                            }
                        }else {
                            window.location.replace("{{route('home')}}");
                        }
                    })
                })

                $('#login-form').submit((e) => {
                    deleteMessages();
                    e.preventDefault();
                    axios.post('{{ route('login') }}',$(e.target).serialize())
                    .then((res) => {
                        var errors = res.data.errors;
                        if(errors) {
                            if(errors.email_login){
                                messageError('email_login',errors.email_login[0]);
                            }
                            
                            if(errors.password_login){
                                messageError('password_login',errors.password_login[0]);
                            }
                            if(errors.password_repeat_login){
                                messageError('password_repeat_login',errors.password_repeat_login[0]);
                            }
                            if(errors.invalid){
                                $('#login-form').prepend(
                                    '<span id="invalid" class="invalid-feedback d-block px-2" role="alert">'+
                                            '<strong>'+errors.invalid[0]+'</strong>'+
                                    '</span>'
                                );
                            }
                        }else {
                                window.location.replace("{{route('home')}}");

                        }
                    })
                })

                $('#reset-password').submit((e) => {
                    deleteMessages();
                    e.preventDefault();
                    axios.post('{{ route('reset-password') }}',$(e.target).serialize())
                    .then((res) => {
                        var errors = res.data.errors;
                        if(errors) {
                            if(errors.email_reset){
                                messageError('email_reset',errors.email_reset[0]);
                            }
                            
                            if(errors.password_reset){
                                messageError('password_reset',errors.password_reset[0]);
                            }
                            if(errors.password_repeat_reset){
                                messageError('password_repeat_reset',errors.password_repeat_reset[0]);
                            }
                        }else {
                                window.location.replace("{{route('welcome')}}");
                                Snackbar.show({
                                    text: 'Password Successfuly changed',
                                    pos : 'bottom-left'
                                });
                        }
                    })
                })
                $('input').on('focus',(e) => {
                    var input = $(e.target)
                    if(input.hasClass('is-invalid')) {
                        input.removeClass('is-invalid');
                    }
                    if($('span.invalid-feedback').length) {
                        $('span.invalid-feedback').remove();
                    }
                    if($('span#invalid').length) {
                        $('span#invalid').remove();
                    }
                })  

            })  
            </script>
    </body>
</html>
