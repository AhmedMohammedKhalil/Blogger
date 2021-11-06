@extends('layouts.main')
@section('title','Search - ')
@section('sidebar')
    <div class="sidebar-container">
        <form id="searching" action="javascript:void(0)">
            <!-- Location -->
            <div class="sidebar-widget">
                <h3>Search</h3>
                <div class="input-with-icon">
                    <div id="autocomplete-container">
                        <input id="user" name="user" type="text" placeholder="Search">
                    </div>
                    <i class="icon-material-outline-search"></i>
                </div>
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
            @include('Common.searchfollowers')
        </div>
    
    
@endsection


@push('js')
    <script>
        $('body').on('click','.follow',(e) => {
            e.prventDefault();
            var id = $(e.currentTarget).attr('id');
            axios.post('{{route('follow')}}',{'id':id})
            .then((res) => {
                Snackbar.show({text: 'follow Successfully',pos: 'bottom-left'});
                $('#f_'+id).remove();
            })
        })
         
        var unfollowers = @json($unfollowers) ;
        $('#searching').submit((e) => {
            e.preventDefault();
            var user = $('#user').val();
            axios.post('{{route('searching')}}',{'username' : user ,'unfollowers':unfollowers})
            .then((res) => {
                console.log(res);
                $('.followrs > *').remove();
                $('.followrs').append(res.data.html);
            })
        })
    </script>
@endpush