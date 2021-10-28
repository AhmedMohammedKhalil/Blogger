@extends('layouts.app')

@push('css')
    <style>
        .sidebar{
            margin-top:100px !important;
        }
    </style>
@endpush

@section('sidebar')
    <ul  data-submenu-title="System">
        <li class="{{Request::is('*dashboard*') ? 'active' : ''}}"><a href="{{route('admin.dashboard')}}"><i class="icon-material-outline-dashboard"></i> dashboard</a></li>
        <li class="{{Request::is('admin/tag*') ? 'active' : ''}}"><a href="{{route('admin.tags.index')}}"><i class="icon-material-outline-dashboard"></i> Tags</a></li>
        <li class="{{Request::is('admin/user*') ? 'active' : ''}}"><a href="{{route('admin.user.index')}}"><i class="icon-material-outline-dashboard"></i> Users</a></li>

    </ul>
    <ul  data-submenu-title="Account">
        <li class="{{Request::is('*profile*') ? 'active' : ''}}"><a href="{{route('admin.profile')}}"><i class="icon-material-outline-dashboard"></i> profile</a></li>
        <li class="{{Request::is('*followers*') ? 'active' : ''}}"><a href="{{route('admin.followers')}}"><i class="icon-material-outline-question-answer"></i> followers <span class="nav-tag followersCount">
            {{$followersCount}}</span></a></li>
        <li class="{{Request::is('*followings*') ? 'active' : ''}}"><a href="{{route('admin.followings')}}"><i class="icon-material-outline-star-border"></i> followings <span class="nav-tag followingsCount">
            {{Auth::user()->followings->count()}}</span></a></li>
        <li class="{{Request::is('*settings*') ? 'active' : ''}}"><a href="{{route('admin.settings')}}"><i class="icon-material-outline-settings"></i> Settings</a></li>
    </ul>
@endsection
