@extends('layouts.main')

@section('title','Home - ')

@section('content')

@endsection

@section('sidebar')
    <div class="sidebar-container">
        <form id="searching" method="GET" action="{{route('searching')}}">
            @csrf

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
