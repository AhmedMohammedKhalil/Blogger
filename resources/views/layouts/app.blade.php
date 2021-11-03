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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/dropzone.min.css')}}">
        <link rel="stylesheet" href={{asset('css/style.css')}}>
        <link rel="stylesheet" href="{{asset('css/colors/blue.css')}}">
        <style>
           
            
            .search-followers {
                position: relative;
                cursor: pointer;
            }
            .icon-material-outline-search {
                font-size: 36px;
                position: absolute;
                top: 50%;
                transform: translate(-50%,-50%);
            }
            #header .container {
                display:flex;
            }

            #header .left {
                    display: flex;
                    width: 60%;
                    align-items: center;
                }
            #header .right {
                display: flex;
                width: 40%;
                justify-content: flex-end;
                align-items: center
            }
            @media (max-width: 426px) {
                #header {
                    height: 130px !important;
                }    
                
                #header .container {
                    display: flex;
                    flex-direction: column;
                    flex-wrap: wrap;
                }

                #header .left {
                    display: flex;
                    width: 100%;
                    align-items: center;
                    height: 60px;
                    border-bottom: 2px solid;
                }
                #header .right {
                    display: flex;
                    width: 100%;
                    padding-top: 15px;
                    justify-content: space-evenly;
                }
                .dashboard-sidebar {
                    margin-top: 140px !important;
                }
            }
            
            
            .header-widget {
                border-left: none
            }

            #header .left #logo {
                width: 275px !important;
            }

            @media (max-width: 768px) {
                #header .left #logo {
                    width: 123px !important;
                }
            }

            @media (max-width: 426px) {
                #header .left #logo {
                    width: 75% !important;
                }
            }
            #logo a {
                height: 100%;
                width: 100%;
                display: inline-block;
            }

            
            .user-avatar {
                border:5px solid #ccc;
            }
            .user-avatar::after {
                display: none
            }
            .user-name {
                font-weight: 500;
                color: #333;
                line-height: 20px;
                padding: 11px 0 0 15px; 
            }

            @media (max-width: 768px)
            {
                .user-menu .header-notifications-dropdown, .header-notifications-dropdown {
                    width: calc(100vw - 45px);
                    right: 22px;
                    top: calc(100% + 15px);
                }
            }
            .dashboard-sidebar {
                margin-top: 70px
             }

            @media (min-width: 767px)
            {
                .sidebar {
                    margin-top: 100px
                }
            }
            .full-page-container, .dashboard-container , .dashboard-content-container{
                height:100vh !important;
            }

            .dashboard-content-inner {
                margin-top:67px;
            }
            @media (max-width:992px) {
                .dashboard-content-inner {
                    margin-top:0;
                }
            }
        </style>
        @stack('css')
    </head>
    <body>
        <div class="parent">
            <!-- header-->
            @include('layouts.header')
            <div class="dashboard-container">

                <!-- Dashboard Sidebar
                ================================================== -->
                
                @include('layouts.sidebar')
                <!-- Dashboard Sidebar / End -->
            
            
                <!-- Dashboard Content
                ================================================== -->
                <div class="dashboard-content-container" data-simplebar>
                    <div class="dashboard-content-inner">
                        @yield('content')
                        <div class="dashboard-footer-spacer del" style="padding-top: 123.2px;"></div>
                        <div class="small-footer margin-top-15 del">
                            <div class="small-footer-copyrights">
                                © 2021 <strong>{{config('app.name','Blogs')}}</strong>. All Rights Reserved.
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- Dashboard Content / End -->

                
            </div>
            
        </div>
        @yield('modal')

        <!-- Footer Copyrights -->
        <script src="{{asset('js/app.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('js/jquery-migrate-3.0.0.min.js')}}"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="{{asset('js/dropzone.min.js')}}"></script>
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
            

            function messageError(errorName,message) {
                $('input[name='+errorName+']').addClass('is-invalid');
                    $('input[name='+errorName+']').parent().append(
                        '<span id='+errorName+' class="invalid-feedback d-block px-2" role="alert">'+
                                '<strong>'+message+'</strong>'+
                        '</span>'
                );
            } 
            // $('.search-followers').click(function() {
            //     if($('.search').css('display') == "none") {
            //         $('.search').css('display',"flex");
            //         $('.close').show();
            //     }
            // });
           
            // $('.close').click(function() {
            //     $('.search').hide();
            //     $('.close').hide();
            // })

        </script>
        
        @stack('js')

    </body>
</html>
