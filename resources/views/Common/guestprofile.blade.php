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

        @include('Common.styles')
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

            <div class="container" style="min-height: 60vh">
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
                        @else
                        <div class="dashboard-headline margin-top-20 padding-left-20" style="
                        text-align: center;">
                            Not Found Posts
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







