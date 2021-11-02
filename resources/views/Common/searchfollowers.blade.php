@foreach ($unfollowers as $unfollower)
            <!--Freelancer -->
            <div class="freelancer" id="f_{{$unfollower[0]->id}}">

                <!-- Overview -->
                <div class="freelancer-overview">
                    <div class="freelancer-overview-inner">
                        
                        <!-- Bookmark Icon -->
                        <span class="bookmark-icon follow" id="{{$unfollower[0]->id}}" title="Follow" data-tippy-placement="bottom"></span>
                        
                        <!-- Avatar -->
                        <div class="freelancer-avatar">
                            <a href=""><img src="{{asset('users/'.$unfollower[0]->id.'/images/'.$unfollower[0]->image)}}" alt=""></a>
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