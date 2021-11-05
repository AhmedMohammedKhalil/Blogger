@push('css')
    <style>
        .freelancer-name h4 {
            cursor: default;
        }

    </style>
@endpush



<div class="dashboard-headline">
    <h3>Followers</h3>
</div>
<div class="row">
    <!-- Dashboard Box -->
    <div class="col-xl-12">
        <div class="dashboard-box">

            <div class="content">
                @if (count($followers) > 0) 
                    <ul class="dashboard-box-list">
                        @foreach ($followers as $follower)
                            <li id="f_{{$follower[0]->id}}">
                                <!-- Overview -->
                                <div class="freelancer-overview">
                                    <div class="freelancer-overview-inner">

                                        <!-- Avatar -->
                                        <div class="freelancer-avatar">
                                            <a href="{{route('userprofile',['id' => $follower[0]->id])}}"><img src="{{asset('users/'.$follower[0]->id.'/images/'.$follower[0]->image)}}" alt="profile_picture"></a>
                                        </div>
                                        <!-- Name -->
                                        <div class="freelancer-name">
                                            <h4><a href="{{route('userprofile',['id' => $follower[0]->id])}}">{{$follower[0]->name}}</a></h4>
                                        </div>
                                    </div>
                                </div>

                                <!-- Buttons -->
                                @if($follower[1] == false)
                                    <div class="buttons-to-right single-right-button btn_{{$follower[0]->id}}">
                                        <a href="#" class="button ripple-effect ico @if($follower[1] == false) green follow @endif" id="{{$follower[0]->id}}" data-tippy-placement="left" title="@if($follower[1] == false) follow @endif"><i class="@if($follower[1] == false) icon-feather-plus-circle @endif"></i></a>
                                    </div>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div style="text-align: center">Not Found Followers</div>
                @endif
                

            </div>
        </div>
    </div>

</div>

@push('js')
    <script>
        var public_path = @json(public_path());
        $('.follow').click(function(e){
            e.prventDefault;
            var id = $(e.currentTarget).attr('id');
            axios.post('{{route('follow')}}',{'id':id})
            .then((res) => {
                console.log(public_path);
                Snackbar.show({text: 'follow Successfully',pos: 'bottom-left'});
                $('span.followingsCount').text(res.data.count);
                $('.btn_'+id).remove();
            })
        })
    </script>
@endpush