@push('css')
    <style>
        .freelancer-name h4 {
            cursor: default;
        }

    </style>
@endpush



<div class="dashboard-headline">
    <h3>Followings</h3>
</div>
<div class="row">
    <!-- Dashboard Box -->
    <div class="col-xl-12">
        <div class="dashboard-box">

            <div class="content followings-content">
                @if (count($followings) > 0)
                <ul class="dashboard-box-list followings-list">
                    @foreach ($followings as $following)
                        <li id="f_{{$following->id}}">
                            <!-- Overview -->
                            <div class="freelancer-overview">
                                <div class="freelancer-overview-inner">

                                    <!-- Avatar -->
                                    <div class="freelancer-avatar">
                                        <a href="#"><img src="{{asset('storage/users/'.$following->id.'/images/'.$following->image)}}" alt="profile_picture"></a>
                                    </div>
                                    <!-- Name -->
                                    <div class="freelancer-name">
                                        <h4><a href="#">{{$following->name}}</a></h4>
                                    </div>
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="buttons-to-right single-right-button">
                                <a href="#" class="button red ripple-effect ico unfollow" id="{{$following->id}}" data-tippy-placement="left" title="Unfollow"><i class="icon-feather-minus-circle"></i></a>
                            </div>
                        </li>
                    @endforeach
                </ul>
                @else
                    <div style="text-align: center">Not Found Followings</div>
                @endif
                

            </div>
        </div>
    </div>

</div>

@push('js')
    <script>
        $('.unfollow').click(function(e){
            e.prventDefault;
            var id = $(e.currentTarget).attr('id');
            axios.post('{{route('unfollow')}}',{'id':id})
            .then((res) => {
                console.log(res);
                Snackbar.show({text: 'Unfollow Successfully',pos: 'bottom-left'});
                $('#f_'+id).remove();
                $('span.followingsCount').text(res.data.count);
                if(res.data.count == 0) {
                    $('ul.followings-list').remove();
                    $('.followings-content').append( '<div style="text-align: center">Not Found Followings</div>');

                }
            })
        })
    </script>
@endpush