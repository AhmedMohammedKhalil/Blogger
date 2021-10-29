@extends('layouts.main')
@section('title','Search - ')
@section('sidebar')
    <div class="sidebar-container">
        <form id="searching" method="GET" action="{{route('searching')}}">
            @csrf
            <!-- Location -->
            <div class="sidebar-widget">
                <h3>Search</h3>
                <div class="input-with-icon">
                    <div id="autocomplete-container">
                        <input id="autocomplete-input" name="user" type="text" placeholder="Search">
                    </div>
                    <i class="icon-material-outline-search"></i>
                </div>
            </div>

            <!-- Tags -->
            <div class="sidebar-widget">
                <h3>Tags</h3>
                <select name="tags[]" class="selectpicker default" multiple data-selected-text-format="count" data-size="7" title="All Categories" >
                    <option>Admin Support</option>
                    <option>Customer Service</option>
                    <option>Data Analytics</option>
                    <option>Design & Creative</option>
                    <option>Legal</option>
                    <option>Software Developing</option>
                    <option>IT & Networking</option>
                    <option>Writing</option>
                    <option>Translation</option>
                    <option>Sales & Marketing</option>
                </select>
            </div>

            <div class="clearfix"></div>

            <div class="margin-bottom-40"></div>
        </form>
    </div>
    <!-- Sidebar Container / End -->
    <!-- Search Button -->
    <div class="sidebar-search-button-container">
        <button type="submit" form="searching" class="button ripple-effect">Search</button>
    </div>
    <!-- Search Button / End-->
@endsection
@section('content')
    <h3 class="page-title">Search Results</h3>
    <!-- Freelancers List Container -->
    <div class="freelancers-container freelancers-grid-layout margin-top-35 followrs">
        @foreach ($unfollowers as $unfollower)
        <!--Freelancer -->
        <div class="freelancer" id="f_{{$unfollower[0]->id}}">

            <!-- Overview -->
            <div class="freelancer-overview">
                <div class="freelancer-overview-inner">
                    
                    <!-- Bookmark Icon -->
                    <span class="bookmark-icon" id="follow_{{$unfollower[0]->id}}" title="Follow" data-tippy-placement="bottom"></span>
                    
                    <!-- Avatar -->
                    <div class="freelancer-avatar">
                        <a href=""><img src="{{asset('storage/users/'.$unfollower[0]->id.'/images/'.$unfollower[0]->image)}}" alt=""></a>
                    </div>

                    <!-- Name -->
                    <div class="freelancer-name">
                        <h4><a href="single-freelancer-profile.html">{{$unfollower[0]->name}}</a></h4>                                        
                    </div>
                </div>
            </div>
            
            <!-- Details -->
            <div class="freelancer-details">
                <div class="freelancer-details-list" style = "text-align: center">
                    <ul>
                        <li>followers<strong>{{$unfollower[1]}}</strong></li>
                        <li>posts<strong>{{$unfollower[0]->posts->count()}}</strong></li>
                    </ul>
                </div>
                <a href="single-freelancer-profile.html" class="button button-sliding-icon ripple-effect">View Profile <i class="icon-material-outline-arrow-right-alt"></i></a>
            </div>
        </div>
        <!-- Freelancer / End -->
        @endforeach




    </div>
@endsection
