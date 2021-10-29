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

            @media (max-width: 768px) {
                #header .left #logo {
                    width: 200px !important;
                }
            }
            #header .left #logo {
                width: 281px !important;
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

           
            @media (min-width: 767px)
            {
                .sidebar {
                    margin-top: 100px
                }
            }

            
            @media (max-width:992px) {
                .full-page-content-inner {
                    margin-top:0;
                }
            }
            .full-page-container {
                padding-top : 80px;
            }
            .sidebar-search-button-container {
                position : relative
            }

            .bookmark-icon:hover {
                background-color: green;
                color: #fff;
            }

            .bookmark-icon:before {
                top: 2px;
                content: "\002B";
                font-size: 36px;
                font-weight: bold;
            }

        </style>
    </head>
    <body>
            @include('layouts.header')
            <div class="full-page-container">
                <div class="full-page-sidebar">
                    <div class="full-page-sidebar-inner" data-simplebar>
                        @yield('sidebar')
                    </div>
                </div>
                <!-- Full Page Sidebar / End -->
                
                <!-- Full Page Content -->
                <div class="full-page-content-container" data-simplebar>
                    <div class="full-page-content-inner">
                        @yield('content')
                        
                        <div class="small-footer margin-top-15">
                            <div class="small-footer-copyrights">
                                © 2021 <strong>{{config('app.name','Blogs')}}</strong>. All Rights Reserved.
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- Footer / End -->
            
                    </div>
                </div>
                <!-- Full Page Content / End -->
            
            </div>
        {{-- <script src="{{asset('js/app.js')}}"></script> --}}
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
            

            function messageError(errorName,message) {
                $('input[name='+errorName+']').addClass('is-invalid');
                    $('input[name='+errorName+']').parent().append(
                        '<span id='+errorName+' class="invalid-feedback d-block px-2" role="alert">'+
                                '<strong>'+message+'</strong>'+
                        '</span>'
                );
            } 
        </script>
        
        @stack('js')

    </body>
</html>







