@extends('layouts.app')

@section('title','Home - ')

@push('css')
    <style>
        .filter{
            margin-top:100px;
            text-align: center;
        }
        .filter h3{
            padding-bottom: 20px
        }
    </style>
@endpush

@section('sidebar')
<div class="filter">
    <h3>Select Tags : </h3>
    <div class="tags">
        <div class="checkbox">
            <input type="checkbox" id="chekcbox1" checked="">
            <label for="chekcbox1"><span class="checkbox-icon"></span> Checkbox</label>
        </div>
    </div>
</div>
   
@endsection
