@extends('layouts.app')


@section('sidebar')
    <ul class="sidebar" data-submenu-title="Account">
        <li class="{{Request::is('*profile*') ? 'active' : ''}}"><a href="{{route('auther.profile')}}">
            <i class="icon-material-outline-dashboard"></i> profile</a></li>
        <li class="{{Request::is('*followers*') ? 'active' : ''}}"><a href="{{route('auther.followers')}}">
            <i class="icon-material-outline-question-answer"></i> followers <span class="nav-tag followersCount">
                {{$followersCount}}</span></a></li>
        <li class="{{Request::is('*followings*') ? 'active' : ''}}"><a href="{{route('auther.followings')}}">
            <i class="icon-material-outline-star-border"></i> followings <span class="nav-tag followingsCount">
            {{Auth::user()->followings->count()}}</span></a></li>
        <li class="{{Request::is('*settings*') ? 'active' : ''}}"><a href="{{route('auther.settings')}}">
            <i class="icon-material-outline-settings"></i> Settings</a></li>
    </ul>
@endsection
