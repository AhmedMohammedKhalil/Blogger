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
							<a href="#"><i class="icon-feather-bell"></i><span>4</span></a>
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
										<li class="notifications-not-read">
											<a href="dashboard-manage-candidates.html">
												<span class="notification-icon"><i class="icon-material-outline-group"></i></span>
												<span class="notification-text">
													<strong>Michael Shannah</strong> applied for a job <span class="color">Full Stack Software Engineer</span>
												</span>
											</a>
										</li>

										<!-- Notification -->
										<li>
											<a href="dashboard-manage-bidders.html">
												<span class="notification-icon"><i class=" icon-material-outline-gavel"></i></span>
												<span class="notification-text">
													<strong>Gilbert Allanis</strong> placed a bid on your <span class="color">iOS App Development</span> project
												</span>
											</a>
										</li>

										<!-- Notification -->
										<li>
											<a href="dashboard-manage-jobs.html">
												<span class="notification-icon"><i class="icon-material-outline-autorenew"></i></span>
												<span class="notification-text">
													Your job listing <span class="color">Full Stack PHP Developer</span> is expiring.
												</span>
											</a>
										</li>

										<!-- Notification -->
										<li>
											<a href="dashboard-manage-candidates.html">
												<span class="notification-icon"><i class="icon-material-outline-group"></i></span>
												<span class="notification-text">
													<strong>Sindy Forrest</strong> applied for a job <span class="color">Full Stack Software Engineer</span>
												</span>
											</a>
										</li>
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
							"><div class="user-avatar"><img src="{{asset('/storage/users/'.Auth::user()->id.'/images/'.Auth::user()->image)}}" alt=""></div></a>
						</div>

						<!-- Dropdown -->
						<div class="header-notifications-dropdown">

							<!-- User Status -->
							<div class="user-status">

								<!-- User Name / Avatar -->
								<div class="user-details">
									<div class="user-avatar"><img src="{{asset('/storage/users/'.Auth::user()->id.'/images/'.Auth::user()->image)}}" alt=""></div>
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
	<script>
		$('.search').click(function () {
			window.location.replace("{{route('search')}}");
		})
	</script>
@endpush