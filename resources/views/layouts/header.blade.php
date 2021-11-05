




<header id="header-container" class="fullwidth dashboard-header not-sticky" style="position: fixed;">

	<!-- Header -->
	<div id="header">
		<div class="container">
			
			<!-- Left Side Content -->
			<div class="left">
				
				<!-- Logo -->
				<div id="logo">
					<a href="{{route('home')}}" width=100%><img src="{{asset('images/logo.png')}}" alt=""></a>
				</div>

				<!-- Main Navigation -->
				<div class="Home">
					<h3><a href="{{route('home')}}">Home</a></h3>
				</div>
				<!-- Main Navigation / End -->
				
			</div>
			<!-- Left Side Content / End -->


			<!-- Right Side Content / End -->
			<div class="right">
				{{-- <div class="close">X</div> --}}
                <div class="header-widget search-followers">
                    <span class="icon-material-outline-search search">
                    </span>
                </div>
				<!--  User Notifications -->
				<div class="header-widget">
					
					<!-- Notifications -->
					<div class="header-notifications">

						<!-- Trigger -->
						<div class="header-notifications-trigger">
							<a href="#"><i class="icon-feather-bell"></i><span class="notify-count">{{Auth::user()->unreadNotification()->count()}}</span></a>
						</div>

						<!-- Dropdown -->
						<div class="header-notifications-dropdown">

							<div class="header-notifications-headline">
								<h4>Notifications</h4>
								<button class="mark-as-read ripple-effect-dark" title="Mark all as read" data-tippy-placement="left">
									<i class="icon-feather-check-square"></i>
								</button>
							</div>

							<div class="header-notifications-content">
								<div class="header-notifications-scroll" data-simplebar>
									<ul>
										<!-- Notification -->
										@foreach (Auth::user()->latestNotification as $notification)
											@if($notification->type == 'post') 
												<li style="@if($notification->read_at == null)  	background: #c5c5c5;	@endif">
													<a href="{{route('showpost',['post_id'=>json_decode($notification->data)->post->id,'n_id'=>$notification->id])}}">  
														<span class="notification-icon"><i class="icon-material-outline-filter-none"></i></span>
														<span class="notification-text">
															<strong>{{json_decode($notification->data)->user->name}}</strong> added new Post
														</span>
													</a>
												</li>
											@elseif ($notification->type == 'reaction')
												<li style="@if($notification->read_at == null)  	background: #c5c5c5;	@endif">
													<a href="{{route('showpost',['post_id'=>json_decode($notification->data)->reaction->reactionable_id,'n_id'=>$notification->id])}}">  
														<span class="notification-icon"><i class="icon-material-outline-favorite-border"></i></span>
														<span class="notification-text">
															<strong>{{json_decode($notification->data)->user->name}}</strong> liked in your Post
														</span>
													</a>
												</li>
											@elseif ($notification->type == 'follow')
												<li style="@if($notification->read_at == null)  	background: #c5c5c5;	@endif">
													<a href="{{route('userprofile',['id'=>json_decode($notification->data)->user->id,'n_id'=>$notification->id])}}">  
														<span class="notification-icon"><i class="icon-material-outline-group"></i></span>
														<span class="notification-text">
															<strong>{{json_decode($notification->data)->user->name}}</strong> Follow you
														</span>
													</a>
												</li>
											@else
												<li style="@if($notification->read_at == null)  	background: #c5c5c5;	@endif">
													<a href="{{route('showpost',['post_id'=>json_decode($notification->data)->comment->post_id,'n_id'=>$notification->id])}}">  
														<span class="notification-icon"><i class="icon-material-outline-forum"></i></span>
														<span class="notification-text">
															<strong>{{json_decode($notification->data)->user->name}}</strong> add Comment in Your Post
														</span>
													</a>
												</li>
											@endif

										@endforeach
										@if(Auth::user()->notifications->count() == 0) 
											<li class="notification-text">
												Not Found Notifaction
											</li>
										@endif
										
									</ul>
								</div>
							</div>

						</div>

					</div>
					

				</div>
				<!--  User Notifications / End -->

				<!-- User Menu -->
				<div class="header-widget">

					<!-- Messages -->
					<div class="header-notifications user-menu">
						<div class="header-notifications-trigger">
							<a href="
							@if (Auth::user()->role->id == "2")
								{{route('auther.profile')}}
							@else
								{{route('admin.dashboard')}}
							@endif
							"><div class="user-avatar"><img src="{{asset('users/'.Auth::user()->id.'/images/'.Auth::user()->image)}}" alt=""></div></a>
						</div>

						<!-- Dropdown -->
						<div class="header-notifications-dropdown">

							<!-- User Status -->
							<div class="user-status">

								<!-- User Name / Avatar -->
								<div class="user-details">
									<div class="user-avatar"><img src="{{asset('users/'.Auth::user()->id.'/images/'.Auth::user()->image)}}" alt=""></div>
									<div class="user-name">
										{{Auth::user()->name}}
									</div>
								</div>
								
						</div>
						<ul class="user-menu-small-nav">
							@if (Auth::user()->role->id == "2")
								<li><a href="{{route('auther.profile')}}"><i class="icon-material-outline-dashboard"></i>Profile</a></li>
							@else
								<li><a href="{{route('admin.dashboard')}}"><i class="icon-material-outline-dashboard"></i>Dashboard</a></li>
							@endif
							<li><a href="{{route('logout')}}"><i class="icon-material-outline-power-settings-new"></i>Logout</a></li>
						</ul>

						</div>
					</div>

				</div>
				<!-- User Menu / End -->

				<!-- Mobile Navigation Button -->

			</div>
			<!-- Right Side Content / End -->

		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>


@push('js')
	<script src="https://js.pusher.com/7.0/pusher.min.js"></script>

	<script>

		$('.mark-as-read').on('click',function() {
			$('.header-notifications-content ul li').css('background-color','transparent');
			$('.notify-count').text(0);
			axios.post('{{route('readAllNotification')}}')
		})
		// Enable pusher logging - don't include this in production
		Pusher.logToConsole = false;
		var pusher = new Pusher('7d5417edfac9cdce82e2', {
		cluster: 'eu'
		});
        var id={!!Auth::user()->id!!}
		var channel = pusher.subscribe('post-comment-'+id);
		channel.bind('postComment', function(data) {
			console.log(data);
			var user = data["user"];
			var url = '/showpost?post_id='+data.post_id+'&n_id='+data.n_id;
			$('.header-notifications-content ul').prepend(
				'<li style="background: #c5c5c5;">'+
					'<a href="'+url+'"> '+
						'<span class="notification-icon"><i class="icon-material-outline-forum"></i></span>'+
						'<span class="notification-text">'+
							'<strong>'+user.name+'</strong> add Comment in Your Post'+
						'</span>'+
					'</a>'+
				'</li>'
			)
			var number = parseInt($('.notify-count').text(), 10) + 1;
			$('.notify-count').text(number)

		});

		var channel = pusher.subscribe('post-react-'+id);
		channel.bind('postReact', function(data) {
			console.log(data);
			var user = data["user"];
			var url = '/showpost?post_id='+data.post_id+'&n_id='+data.n_id;
			$('.header-notifications-content ul').prepend(
				'<li style="background: #c5c5c5;">'+
					'<a href="'+url+'">' +
						'<span class="notification-icon"><i class="icon-material-outline-favorite-border"></i></span>'+
						'<span class="notification-text">'+
							'<strong>'+user.name+'</strong> liked in your Post'+
						'</span>'+
					'</a>'+
				'</li>'
			)
			var number = parseInt($('.notify-count').text(), 10) + 1;
			$('.notify-count').text(number)
		});

		var channel = pusher.subscribe('follow-'+id);
		channel.bind('userFollow', function(data) {
			console.log(data);
			var user = data["user"];
			var userid = user.id
			var url = '/userprofile?id='+userid+'&n_id='+data.n_id
			$('.header-notifications-content ul').prepend(
				'<li style="background: #c5c5c5;">'+
					'<a href="'+url+'">'+ 
						'<span class="notification-icon"><i class="icon-material-outline-group"></i></span>'+
						'<span class="notification-text">'+
							'<strong>'+user.name+'</strong> Follow you'+
						'</span>'+
					'</a>'+
				'</li>'
			)
			var number = parseInt($('.notify-count').text(), 10) + 1;
			$('.notify-count').text(number)
		});


		var channel = pusher.subscribe('post-follower-'+id);
		channel.bind('postFollowers', function(data) {
			console.log(data)
			var user = data["user"];
			var url = '/showpost?post_id='+data.post_id+'&n_id='+data.n_id;
			$('.header-notifications-content ul').prepend(
				'<li style="background: #c5c5c5;">'+
					'<a href="'+url+'">'+
						'<span class="notification-icon"><i class="icon-material-outline-filter-none"></i></span>'+
						'<span class="notification-text">'+
							'<strong>'+user.name+'</strong> added new Post'+
						'</span>'+
					'</a>'+
				'</li>'
			)
			var number = parseInt($('.notify-count').text(), 10) + 1;
			$('.notify-count').text(number)
			
		});


		
	
		$('.search').click(function () {
			window.location.replace("{{route('search')}}");
		})
	</script>
@endpush