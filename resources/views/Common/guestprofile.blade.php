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

            @media (max-width: 992px) {
                .full-page-sidebar .sidebar-container {
                    padding: 0;
                }
            }
            .full-page-sidebar .sidebar-container {
                padding: 20px 40px 0
            }
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
        div.p-c {
            margin-bottom: 60px;
            box-shadow: -2px 5px 23px #ccc;
        }
        .flex {
            display:flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center
        }
        .posts-content{
            margin-top:20px;    
        }
        .ui-w-40 {
            width: 100px !important;
            height: auto;
        }
        .default-style .ui-bordered {
            border: 1px solid rgba(24,28,33,0.06);
        }
        .ui-bg-cover {
            background-color: transparent;
            background-position: center center;
            background-size: cover;
        }
        .ui-rect, .ui-rect-30, .ui-rect-60, .ui-rect-67, .ui-rect-75 {
            position: relative !important;
            display: block !important;
            width: 100% !important;
        }
        .d-flex, .d-inline-flex, .media, .media>:not(.media-body), .jumbotron, .card {
            -ms-flex-negative: 1;
            flex-shrink: 1;
        }
        .bg-dark {
            background-color: rgba(24,28,33,0.9) !important;
        }
        .card-footer, .card hr {
            border-color: rgba(24,28,33,0.06);
        }
        .ui-rect-content {
            position: absolute !important;
            top: 0 !important;
            right: 0 !important;
            bottom: 0 !important;
            left: 0 !important;
        }
        .default-style .ui-bordered {
            border: 1px solid rgba(24,28,33,0.06);
        }
        .content-item {
            padding:15px 0;
            background-color:#FFFFFF;
        }

        .content-item.grey {
            background-color:#F0F0F0;
            padding:50px 0;
            height:100%;
        }

        .content-item h2 {
            font-weight:700;
            font-size:35px;
            line-height:45px;
            text-transform:uppercase;
            margin:20px 0;
        }

        .content-item h3 {
            font-weight:400;
            font-size:20px;
            color:#555555;
            margin:10px 0 15px;
            padding:0;
        }

        .content-headline {
            height:1px;
            text-align:center;
            margin:20px 0 70px;
        }

        .content-headline h2 {
            background-color:#FFFFFF;
            display:inline-block;
            margin:-20px auto 0;
            padding:0 20px;
        }

        .grey .content-headline h2 {
            background-color:#F0F0F0;
        }

        .content-headline h3 {
            font-size:14px;
            color:#AAAAAA;
            display:block;
        }


        #comments {
            border: 2px solid rgb(0 0 0 /10%);
            background-color:#FFFFFF;
        }
        #comments .btn {
            margin-top:7px;
        }
        #comments a {
            color : black
        }
        #comments form fieldset {
            clear:both;
        }

        #comments .media {
            border-top:1px dashed #DDDDDD;
            padding:20px 0;
            margin:0;
        }

        #comments .media > .pull-left {
            margin-right:20px;
        }

        #comments .media img {
            max-width:100px;
        }
        #comments img {
            border-radius: 50%;

        }
        #comments .menu ,.media .menu{
            margin-bottom: 0;
            width: 67px;
            justify-content: flex-end;
        }
        #comments .media-heading , #comments .menu li, .media .menu li{
            font-size: 30px
        }

        #comments .media-detail li a {
            font-size: 18px;
            text-decoration: none;
            padding: 0 20px;
            text-align: center;
        }

        #comments .media h4 span {
            font-size:14px;
            color:#999999;
        }

        #comments .media p {
            margin-bottom:15px;
            text-align:justify;
        }

        #comments .media-detail {
            margin:0;
        }

        #comments .media-detail li {
            color:#AAAAAA;
            font-size:12px;
            padding-right: 10px;
            font-weight:600;
        }

        #comments .media-detail a:hover {
            background-color: rgb(0 0 0 /20%)
        }

        #comments .media-detail li:last-child {
            padding-right:0;
        }

        #comments .media-detail li i {
            color:#666666;
            font-size:15px;
            margin-right:10px;
        }
        .image-user {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 130px;
            padding-right: 0;
        }
        .posts-content {
            padding: 0
        }
        .images {
            justify-content: space-evenly;
            flex-wrap: wrap;

        }
        .images img {
            width: 315px;
            height: 315px;
            margin: 10px 0;
        }
        .more-images {
            width: 100%;
            height: 315px;
            right: 0;
            top: 0;
            background-color: black;
            margin-top: 10px;
        }
        .tag {
            border-radius: 10px;
            padding: 5px;
            background: #5590fb;
            color: black;
            margin-right: 10px;
        }
        .card-footer .media-detail li a {
            font-size: 18px;
            text-decoration: none;
            padding: 0 20px;
            text-align: center;
            color : black;
            border-radius: 10px
        }
        .card-footer .media-detail li a:hover {
            background-color: #555555;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(3,auto);
            grid-column-gap: 30px
        }

        @media (max-width:426px) {
            .grid {
                display: grid;
                grid-template-columns: repeat(1,auto);
                grid-column-gap: 30px
            }
        }
        .single-page-header {
            margin-bottom: 65px;
            padding: 60px 0;
            position: relative;
            margin-top: 80px;
        }
        </style>
        @stack('css')
    </head>
    <body>
            @include('layouts.header')
            <div class="single-page-header freelancer-header" data-background-image="{{asset('images/single-freelancer.jpg')}}">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="single-page-header-inner">
                                <div class="left-side">
                                    <div class="header-image freelancer-avatar"><img src="{{asset('users/'.$user->id.'/images/'.$user->image)}}" alt=""></div>
                                    <div class="header-details">
                                        <h3>{{$user->name}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    
                    <!-- Content -->
                    <div class="col-xl-8 col-lg-8 content-right-offset">
                        
                        @if($posts->count() > 0)
                            <div class="dashboard-headline margin-top-20 padding-left-20" style="
                            text-align: center;">
                                <h3>Posts</h3>
                            </div>
                            <div class="row">
                                {{-- posts --}}
                                <div class="col-md-12 col-lg-10 offset-lg-1 posts-comments">
                                    @include('Common.Posts-comments')
                                </div>
                                {{--end posts--}}
                                
                            </div>
                        @endif
            
                    </div>
                    
            
                    <!-- Sidebar -->
                    <div class="col-xl-4 col-lg-4">
                        <div class="sidebar-container">
                            <a href="#" id="{{$user->id}}" class="apply-now-button margin-bottom-50 following @if($following == null) follow @else unfollow @endif">Make @if($following == null) Follow @else Unfollow @endif<i class="icon-material-outline-arrow-right-alt"></i></a>
                        </div>
                    </div>
            
                </div>
            </div>
            <div id="footer">

                <div class="footer-bottom-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                © 2021 <strong>{{config('app.name','Blogs')}}</strong>. All Rights Reserved.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            @yield('modal')
            <script src="{{asset('js/app.js')}}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
            <script src="{{asset('js/jquery-migrate-3.0.0.min.js')}}"></script>
            <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
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


                $('.following').click(function(e){
                    e.prventDefault;

                    var id = $(e.currentTarget).attr('id');
                    if($('.following').hasClass('unfollow')) {
                        axios.post('{{route('unfollow')}}',{'id':id})
                        .then((res) => {
                            Snackbar.show({text: 'Unfollow Successfully',pos: 'bottom-left'});
                            $('.following').addClass('follow');
                            $('.following').html('Make Follow <i class="icon-material-outline-arrow-right-alt"></i>')
                            $('.following').removeClass('unfollow')
                        })
                    }
                   
                })

                $('.following').click(function(e){
                    e.prventDefault;

                    var id = $(e.currentTarget).attr('id');
                    if($('.following').hasClass('follow')) {
                        axios.post('{{route('follow')}}',{'id':id})
                        .then((res) => {
                            Snackbar.show({text: 'follow Successfully',pos: 'bottom-left'});
                            $('.following').addClass('unfollow');
                            $('.following').html('Make UnFollow <i class="icon-material-outline-arrow-right-alt"></i>')
                            $('.following').removeClass('follow')
                        })
                    }
                   
                })
               
            </script>
            
        
        @stack('js')

    </body>
</html>







