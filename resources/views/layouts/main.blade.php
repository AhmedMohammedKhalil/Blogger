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
                width: 320px !important;
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
                padding-top : 76px;
            }
            @media (max-width:426px) {
                .full-page-container {
                    padding-top: 115px;
                }
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

            .full-page-sidebar .full-page-sidebar-inner {
                overflow: hidden;
                height: 100%;
            }
            .full-page-content-inner {
                position: relative;
            }
            .full-page-content-inner .small-footer {
                width: 100%;
                left: 0px;
                padding: 25px 50px;
                position: absolute;
                bottom: 0;
            }
            @media (max-width: 768px) {
                .full-page-sidebar-inner, .full-page-content-container,
                 .full-page-container .full-page-sidebar { 
                    height: auto !important
                 }

            }
        </style>
        @stack('css')
    </head>
    <body>
            @include('layouts.header')
            <div class="full-page-container">
                <div class="full-page-sidebar">
                    <div class="full-page-sidebar-inner" >
                        @yield('sidebar')
                    </div>
                </div>
                <!-- Full Page Sidebar / End -->
                
                <!-- Full Page Content -->
                <div class="full-page-content-container" data-simplebar>
                    <div class="full-page-content-inner">
                        <div style="padding-bottom: 100px">
                            @yield('content')
                        </div>
                        
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
            @yield('modal')
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
            

            
        
        @stack('js')

    </body>
</html>







