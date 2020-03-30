@extends('layouts.app')
@section('content')
	<div class="container-fluid app-body">
		<h3>Social Accounts

			@if($user->plansubs())
				@if($user->plansubs()['plan']->slug == 'proplusagencym' OR $user->plansubs()['plan']->slug == 'proplusagencyy' )
					<a href="https://bufferapp.com/oauth2/authorize?client_id={{env('BUFFER_CLIENT_ID')}}&redirect_uri={{env('BUFFER_REDIRECT')}}&response_type=code" class="btn btn-primary pull-right">Add Buffer Account</a>
				@endif
			@endif




		</h3>

		<div class="row">
			<div class="col-md-12">
				<ul class="list-inline">

					<li>
						<form>
							<input class="form-control" type="text" name="search" placeholder="Search">
							<button class="pull-right" style=" position: relative; margin-top: -27px; border: 0px; background: 0px;  padding-right: 12px; outline: none !important;"> <i class="glyphicon glyphicon-search"></i> </button>
						</form>
					</li>
					<li class="text-right">
						<form id="group-from">
							<select class="form-control group" name="group" onchange="document.getElementById('group-from').submit()">
								<option value="-1">All</option>
							@foreach($types as $type)

									<option value="{{$type}}">{{$type}}</option>
								@endforeach
							</select>
						</form>

					</li>
					<li>

				</ul>
				<table class="table table-hover social-accounts">
					<thead>
					<tr>
						<th>Group Name</th>
						<th>Group Type</th>
						<th>Account Name</th>
						<th>Post Text</th>
						<th>Time</th>
					</tr>
					</thead>
					<tbody>
					@foreach($postings as $posting)
					<tr>
						<td>
							{{$posting->groupInfo->name}}
						</td>
						<td>
							{{$posting->groupInfo->type}}
						</td>
						<td width="350">
							<div class="media">
								<div class="media-left">
									<a href="">
										<span class="fa fa-{{$posting->accountInfo->type}}"></span>
										<img width="50" class="media-object img-circle" src="{{$posting->accountInfo->avatar}}" alt="">
									</a>
								</div>
								<div class="media-body media-middle" style="width: 180px;">
									<h4 class="media-heading">{{$posting->accountInfo->name}}</h4>
								</div>
							</div>
						</td>

						<td>
							{{$posting->post->text}}
						</td>
						<td>
							{{$posting->post->created_at->format('d M, Y h:i a')}} ({{$posting->post->created_at->setTimezone('America/Chicago')
							->timezone->getName()}})
						</td>

					</tr>
					@endforeach
					</tbody>
				</table>
				<div class="text-right">
					{{$postings->links()}}
				</div>
			</div>
		</div>
	</div>
@endsection
