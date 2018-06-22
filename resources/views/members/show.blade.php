@extends('layout.master')

@section('content')
<?php use Carbon\Carbon; use App\Http\Helpers\Utilities;?>
<div class="main-content">
<div class="section__content section__content--p30">
<div class="rightside bg-grey-100">
	<div class="page-head bg-grey-100 padding-top-15 no-padding-bottom">
		@include('flash::message')
	</div>
	<div class="container-fluid">

		<div class="row"><!-- Main row -->
			<div class="col-md-12"><!-- Main Col -->
				<div class="panel no-border ">
					<div class="panel-title">
						<div class="panel-head font-size-20">Member Details</div>
							<div class="pull-right no-margin">
									<a class="btn btn-primary" href="{{ action('MembersController@edit',['id' => $member->id]) }}">
							        <span>Edit</span>                                     
							        </a>

							        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{$member->id}}" data-id="{{$member->id}}">
							        <span>Delete</span> 
							        </button>

							        <!-- Modal -->
							        {{--<div id="deleteModal-{{$member->id}}" class="modal fade" role="dialog">
								        <div class="modal-dialog">

									        <!-- Modal content-->
									        <div class="modal-content">
										        <div class="modal-header">
											        <button type="button" class="close" data-dismiss="modal">&times;</button>
											        <h4 class="modal-title">Confirm</h4>
										        </div>
										        <div class="modal-body">
										        	<p>Are you sure you want to delete it?</p>
										        </div>
										        <div class="modal-footer">
											       	{!! Form::Open(['action'=>['MembersController@archive',$member->id],'method' => 'POST','id'=>'archiveform-'.$member->id]) !!}
											        	<input type="submit" class="btn btn-danger" value="Yes" id="btn-{{ $member->id }}"/>
											        	<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
											        {!! Form::Close() !!}
										        </div>
									        </div>
								        </div>
							        </div>--}}
							</div>
					</div>

		<div class="panel-body">
			<div class="row">				<!--Main row start-->
				<div class="col-sm-8">
				<div class="row">				
					<div class="col-sm-4">
					<!-- Spacer -->
					<div class="row visible-md visible-lg">
						<div class="col-sm-4">
							<label>&nbsp;</label>
						</div>
					</div>
						<img class="AutoFitResponsive" src="{{ url('profiles/'.$member->photo) }}"/>
					</div>
				
					      
				<div class="col-sm-8">			<!-- Outer Row Start -->

				<!-- Spacer -->
					<div class="row visible-md visible-lg">
						<div class="col-sm-4">
							<label>&nbsp;</label>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-4">
						<label>Name</label>
						</div>
						<div class="col-sm-8">
						<span class="show-data">{{$member->name}}</span>
						</div>
					</div>

					<hr class="margin-top-0 margin-bottom-10">

					<div class="row">
						<div class="col-sm-4">
						<label>Member Code</label>
						</div>
						<div class="col-sm-8">
						<span class="show-data">{{$member->member_code}}</span>
						</div>
					</div>
					<hr class="margin-top-0 margin-bottom-10">

					<div class="row">
						<div class="col-sm-4">
						<label>Date Of Birth</label>
						</div>
						<div class="col-sm-8">
						<span class="show-data">{{$member->DOB->format('Y-m-d')}}</span>
						</div>
					</div>
					<hr class="margin-top-0 margin-bottom-10">
					<div class="row">
						<div class="col-sm-4">
						<label>Gender</label>
						</div>
						<div class="col-sm-8">
						<span class="show-data">{{$member['gender']}}</span>
						</div>
					</div>
					<hr class="margin-top-0 margin-bottom-10">

					<div class="row">
						<div class="col-sm-4">
						<label>Contact Number</label>
						</div>
						<div class="col-sm-8">
						<span class="show-data">{{$member->contact}}</span>
						</div>
					</div>

					<hr class="margin-top-0 margin-bottom-10">
					<div class="row">
						<div class="col-sm-4">
						<label>Email</label>
						</div>
						<div class="col-sm-8">
						<span class="show-data">{{$member->email}}</span>
						</div>
					</div>

					<hr class="margin-top-0 margin-bottom-10">
					<div class="row">
						<div class="col-sm-4">
						<label>Member Since</label>
						</div>
						<div class="col-sm-8">
						<span class="show-data">{{$member->created_at->toFormattedDateString()}}</span>
						</div>
					</div>
					<hr class="margin-top-0 margin-bottom-10">
					<div class="row">
						<div class="col-sm-4">
						<label>Emergency Contact</label>
						</div>
						<div class="col-sm-8">
						<span class="show-data">{{$member->emergency_contact}}</span>
						</div>
					</div>

					

				</div>  <!-- End of outer Row -->
				</div>
			</div>   <!-- End of Outer Column -->

			<div class="col-sm-4">
			<div class="row"><!-- Main row -->
			<div class="col-md-12"><!-- Main Col -->
				<div class="panel bg-grey-50">
					<div class="panel-title bg-transparent">
						<div class="panel-head"><strong><span class="fa-stack">
							  <i class="fa fa-circle-thin fa-stack-2x"></i>
							  <i class="fa fa-ellipsis-h fa-stack-1x"></i>
							</span> Additional Details</strong></div>
						</div>
						<div class="panel-body">

				<div class="row">
				<?php 
                    $subscriptions = $member->subscriptions;
                    $plansArray = array();
                    if(!empty($subscriptions)){
	                    foreach($subscriptions as $subscription)
	                    {
	                        $plansArray[] = $subscription->plan->plan_name;
	                    }
	                }
                 ?>
						<div class="col-sm-4">
						<label>Plan name</label>
						</div>
						<div class="col-sm-8">
						<span class="show-data">{{implode(",",$plansArray)}}</span>
						</div>
					</div>
<hr class="margin-top-0 margin-bottom-10">					

					<div class="row">
						<div class="col-sm-4">
						<label>Status</label>
						</div>
						<div class="col-sm-8">
						<span class="show-data">{{Utilities::getStatusValue($member->status)}}</span>
						</div>
					</div>
<hr class="margin-top-0 margin-bottom-10">
					<div class="row">
						<div class="col-sm-4">
						<label>Aim</label>
						</div>
						<div class="col-sm-8">
						<span class="show-data">{{$member->aim}}</span>
						</div>
					</div>
<hr class="margin-top-0 margin-bottom-10">
					<div class="row">
						<div class="col-sm-4">
						<label>ID Proof</label>
						</div>
						<div class="col-sm-8">
						<span class="show-data">{{$member->proof_name}}</span>
						</div>
					</div>
<hr class="margin-top-0 margin-bottom-10">
					<div class="row">
					<div class="col-sm-4">
					<label>Address</label>
					</div>
					<div class="col-sm-8">
					<span class="show-data">{{$member->address}}</span>
					</div>
				</div>
				<hr class="margin-top-0 margin-bottom-10">
					<div class="row">
					<div class="col-sm-4">
					<label>Health Issues</label>
					</div>
					<div class="col-sm-8">
					<span class="show-data">{{$member->health_issues}}</span>
					</div>
				</div>

					</div>
					</div>
					</div>
					</div>

			</div>

			</div>   <!-- End Of Main Row -->
		</div>
	</div>
</div>
</div>

<!--######################### Subscription history for the member ################################# -->
<div class="row">
	<div class="col-md-12">
		<div class="panel no-border ">
			<div class="panel-title">
				<div class="panel-head font-size-20">Subscription history for the member</div>
			</div>
				<div class="panel-body">
					<table id="_payment" class="table table-bordered table-striped">
						<thead>
			                <tr>
				                <th>Invoice Number</th>
				                <th>Plan Name</th>
				                <th>Start Date</th>
				                <th>End Date</th>
				                <th>Status</th>
				                <th>Payment Status</th>
			                </tr>
		                </thead>
		                {{--<tbody>
			                @foreach ($member->subscriptions->sortByDesc('created_at') as $subscription)  
			                <tr>                                         
				                <td><a href="{{ action('InvoicesController@show',['id' => $subscription->invoice_id]) }}">{{ $subscription->invoice->invoice_number }}</a></td>           
				                <td>{{ $subscription->plan->plan_name }}</td>           
				                <td>{{ $subscription->start_date->format('Y-m-d') }}</td>           
			                	<td>{{ $subscription->end_date->format('Y-m-d') }}</td>           
			                	<td><span class="{{ Utilities::getSubscriptionLabel ($subscription->status) }}">{{ Utilities::getSubscriptionStatus ($subscription->status) }}</span></td>           
			                	<td>{{ Utilities::getInvoiceStatus ($subscription->invoice->status) }}</td>           
			                </tr>
			                @endforeach
						</tbody>--}}	
					</table>
				</div>
		</div>
	</div>
</div>

</div>
</div>
</div>
</div>
@stop