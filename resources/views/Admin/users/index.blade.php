@extends('admin.layout')
@section('title','Users - ')
@section('content')

              {{-- headline --}}
             <div class="dashboard-headline">
				<h3>Users</h3>
			</div>
            {{-- Tag line --}}
            <div class="row">
				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div class="dashboard-box margin-top-0">

						<div class="content">
							<ul class="dashboard-box-list">
                            @foreach ($users as $u)
                                
                                <li>
									<!-- Job Listing -->
									<div class="job-listing">

										<!-- Job Listing Details -->
										<div class="job-listing-details">

											<!-- Logo -->
											<a href="#" class="job-listing-company-logo">
												<img src="{{asset('users/'.$u->id.'/images/'.$u->image)}}" alt="" style="border-radius:50%">
											</a>

											<!-- Details -->
											<div class="job-listing-description">
												<h3 class="job-listing-title"><a>{{$u->name}}</a></h3>
												<!-- Job Listing Footer -->
												<div class="job-listing-footer">
													<ul>
														<li><i class="icon-material-outline-email"></i>{{$u->email}}</li>
														<li><i class="icon-material-outline-assignment"></i>Posts &nbsp {{$u->posts()->count()}}</li>
														<li><i class="icon-material-outline-person-pin"></i> {{$u->role->name}}</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									<!-- Buttons -->
									<div class="buttons-to-right">
										<a href="{{route('admin.user.delete',['id'=>$u->id])}}"class="button red ripple-effect ico" title="Remove" data-tippy-placement="left"><i class="icon-feather-trash-2"></i></a>
									</div>
								</li>
								
                            @endforeach
							</ul>
						</div>
					</div>
				</div>
            </div>


@endsection