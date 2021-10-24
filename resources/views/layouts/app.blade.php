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
           
            
            .search-followers {
                position: relative;
            }
            .icon-material-outline-search {
                font-size: 36px;
                position: absolute;
                top: 50%;
                transform: translate(-50%,-50%);
            }
            .logo a {
                height: 100%;
                width: 100%;
                display: inline-block;
            }

            nav#navigation li {
                margin-left:50px !important
            }
            .user-avatar {
                border:5px solid #ccc;
            }
            .user-avatar::after {
                display: none
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
                    <div class="dashboard-content-inner" >
                        @yield('content')
                    </div>
                </div>
                <!-- Dashboard Content / End -->
            
            </div>
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

        @stack('js')

    </body>
</html>
