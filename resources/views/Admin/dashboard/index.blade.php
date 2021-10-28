@extends('Admin.layout')
@section('title','Dashboard - ')
@section('content')


        <!-- Dashboard Headline -->
            <div class="dashboard-headline">
				<h3>Dashboard</h3>

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


			</div>
			



  
@endsection


