@extends('Admin.layout')
@section('title','Dashboard - ')
@section('content')

<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >
              
              {{-- headline --}}
             <div class="dashboard-headline">
				
				<!-- Breadcrumbs -->
				
			</div>
            {{-- Tag line --}}
            <div class="row">
				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div class="dashboard-box margin-top-0">
						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-material-outline-business-center"></i> Tags</h3>
						</div>

						<div class="content">
							<ul class="dashboard-box-list">
                            @foreach ($tags as $t)
								<li>
									<!-- Job Listing -->
									<div class="job-listing">
										<!-- Job Listing Details -->
										<div class="job-listing-details">
										    <a  class="job-listing-company-logo">
												<img src="{{asset('images/hashtag.jpg')}}" alt="">
											</a>
											<!-- Details -->
											<div class="job-listing-description">
												<h3 class="job-listing-title"><a>{{$t->name}}</a></h3>

                                                <div class="job-listing-footer">
													<ul>
														<li><i class="icon-material-outline-business"></i>Posts &nbsp{{$t->posts()->count()}}</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
                
									<!-- Buttons -->
                                    @if ($t->posts()->count() == 0)
                                            <div class="buttons-to-right">
                                                <a href="{{route('admin.tags.delete',['id'=>$t->id])}}" class="button red ripple-effect ico" title="Remove" data-tippy-placement="left"><i class="icon-feather-trash-2"></i></a>
                                            </div>    
                                    @endif
								</li>
                            @endforeach
							</ul>
						</div>
					</div>
				</div>
            </div>



        </div>
</div>


@endsection