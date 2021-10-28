@extends('Admin.layout')
@section('title','Dashboard - ')
@section('content')
<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >

        <!-- Dashboard Headline -->
            <div class="dashboard-headline">
				<h3>{{$admin[0]->name}}</h3>
				<span>{{$admin[0]->email}} </span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a >Home</a></li>
						<li>Dashboard</li>
					</ul>
				</nav>
			</div>
        
                <!-- Fun Facts Container -->
			<div class="fun-facts-container">
				<div class="fun-fact" data-fun-fact-color="#36bd78">
					<div class="fun-fact-text">
						<span>Users</span>
						<h4>{{$user_count}}</h4>
					</div>
					<div class="fun-fact-icon"><i class="icon-material-outline-gavel"></i></div>
				</div>
				<div class="fun-fact" data-fun-fact-color="#b81b7f">
					<div class="fun-fact-text">
						<span>Posts</span>
						<h4>{{$post_count}}</h4>
					</div>
					<div class="fun-fact-icon"><i class="icon-material-outline-business-center"></i></div>
				</div>
				<div class="fun-fact" data-fun-fact-color="#efa80f">
					<div class="fun-fact-text">
						<span>Comments</span>
						<h4>{{$comment_count}}</h4>
					</div>
					<div class="fun-fact-icon"><i class="icon-material-outline-rate-review"></i></div>
				</div>

				<!-- Last one has to be hidden below 1600px, sorry :( -->
				<div class="fun-fact" data-fun-fact-color="#2a41e6">
					<div class="fun-fact-text">
						<span>This Month Views</span>
						<h4>987</h4>
					</div>
					<div class="fun-fact-icon"><i class="icon-feather-trending-up"></i></div>
				</div>
			</div>
			



        </div>
</div>
@endsection


