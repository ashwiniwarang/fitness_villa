<?php use Carbon\Carbon;
	
?>

<!-- Hidden Fields -->
@if(Request::is('members/create'))
{!! Form::hidden('memberCounter',$memberCounter) !!}
@endif
								 
<div class="row">
	<div class="col-sm-6">
	<div class="form-group">
{!! Form::label('member_code','Member code') !!}
{!! Form::text('member_code',$member_code,['class'=>'form-control', 'id' => 'member_code', 'readonly']) !!}		
	</div>
	</div>

	<div class="col-sm-6">
	<div class="form-group">
{!! Form::label('name','Name',['class'=>'control-label']) !!}
{!! Form::text('name',null,['class'=>'form-control', 'id' => 'name']) !!}		
	</div>
	</div>
</div>	

<div class="row">
	
    <div class="col-sm-6">
		<div class="form-group">
			{!! Form::label('DOB','Date of birth') !!}
			{!! Form::text('DOB',null,['class'=>'form-control datepicker-default', 'id' => 'DOB']) !!}	
	    </div>								
    </div>

	<div class="col-sm-6">
	<div class="form-group">
	{!! Form::label('gender','Gender') !!}
{!! Form::select('gender',array('Male' => 'Male', 'Female' => 'Female'),null,['class'=>'form-control selectpicker show-tick show-menu-arrow', 'id' => 'gender']) !!}
    </div>								
    </div>								
</div>

<div class="row">
	<div class="col-sm-6">
    <div class="form-group">
    {!! Form::label('contact','Contact') !!}
{!! Form::text('contact',null,['class'=>'form-control', 'id' => 'contact']) !!}											
	</div>
	</div>
	<div class="col-sm-6">
    <div class="form-group">
    {!! Form::label('email','Email') !!}
{!! Form::text('email',null,['class'=>'form-control', 'id' => 'email']) !!}
    </div>								
    </div>								
</div>

<div class="row">
	<div class="col-sm-6">
    <div class="form-group">
    {!! Form::label('emergency_contact','Emergency contact') !!}
{!! Form::text('emergency_contact',null,['class'=>'form-control', 'id' => 'emergency_contact']) !!}											
	</div>
	</div>
	<div class="col-sm-6">
    <div class="form-group">
    {!! Form::label('health_issues','Health issues') !!}
{!! Form::text('health_issues',null,['class'=>'form-control', 'id' => 'health_issues']) !!}
    </div>								
    </div>								
</div>

<div class="row">
	<div class="col-sm-6">
	<div class="form-group">
{!! Form::label('proof_name','Proof name') !!}
{!! Form::text('proof_name',null,['class'=>'form-control', 'id' => 'proof_name']) !!}		
	</div>
	</div>

	@if(isset($member))
	<?php
        $image = url('proofs/'.$member['proof_photo']);
    ?>
    <div class="col-sm-4">
	<div class="form-group">
{!! Form::label('proof_photo','Proof photo') !!}
{!! Form::file('proof_photo',['class'=>'form-control', 'id' => 'proof_photo']) !!}	
    </div>								
    </div>
    <div class="col-sm-2">
	<img alt="proof Pic" class="pull-right" src="{{ $image }}" onerror="this.src='{{url(config('custom_config.default_proof'))}}'"/>
    </div>
	@else
	<div class="col-sm-6">
	<div class="form-group">
{!! Form::label('proof_photo','Proof photo') !!}
{!! Form::file('proof_photo',['class'=>'form-control', 'id' => 'proof_photo']) !!}	
    </div>								
    </div>
    @endif								
</div>

<div class="row">
@if(isset($member))
<?php
    $image = url('profiles/'.$member['photo']);
?>
    <div class="col-sm-4">
	<div class="form-group">
		{!! Form::label('photo','Photo') !!}
		{!! Form::file('photo',['class'=>'form-control', 'id' => 'photo']) !!}	
    </div>								
    </div>
    <div class="col-sm-2">
	<img alt="profile Pic" class="pull-right" src="{{ $image }}" onerror="this.src='{{url(config('custom_config.default_photo'))}}'"/>
    </div>
	@else
	<div class="col-sm-6">
	<div class="form-group">
		{!! Form::label('photo','Photo') !!}
		{!! Form::file('photo',['class'=>'form-control', 'id' => 'photo']) !!}	
    </div>								
    </div>
    @endif

	<div class="col-sm-6">
	<div class="form-group">
		{!! Form::label('status','Status') !!}
		<!--0 for inactive , 1 for active-->
		{!! Form::select('status',array('1' => 'Active', '0' => 'InActive'),null,['class' => 'form-control selectpicker show-tick show-menu-arrow', 'id' => 'status']) !!}
    </div>								
    </div>								
</div>



<div class="row">
	<div class="col-sm-6">
	<div class="form-group">
{!! Form::label('aim','Why do you plan to join?',['class'=>'control-label']) !!}
{!! Form::select('aim',array('Fitness' => 'Fitness', 'Networking' => 'Networking', 'Body Building' => 'Body Building', 'Fatloss' => 'Fatloss', 'Weightgain' => 'Weightgain', 'Others' => 'Others'),null,['class' => 'form-control selectpicker show-tick show-menu-arrow', 'id' => 'aim']) !!}		
	</div>
	</div>
	<div class="col-sm-6">
	<div class="form-group">
{!! Form::label('source','How do you came to know about us?',['class'=>'control-label']) !!}
{!! Form::select('source',array('Promotions' => 'Promotions', 'Word Of Mouth' => 'Word Of Mouth', 'Others' => 'Others'),null,['class' => 'form-control selectpicker show-tick show-menu-arrow', 'id' => 'source']) !!}		
	</div>
	</div>
</div>

<div class="row">	
	<div class="col-sm-6">
	<div class="row">
	<div class="col-sm-12">
    <div class="form-group">
{!! Form::label('occupation','Occupation') !!}
{!! Form::select('occupation',array('Student' => 'Student', 'Housewife' => 'Housewife','Self Employed' => 'Self Employed','Professional' => 'Professional','Freelancer' => 'Freelancer','Others' => 'Others'),null,['class' => 'form-control selectpicker show-tick show-menu-arrow', 'id' => 'occupation']) !!}											
	</div>
	</div>
	

	<div class="col-sm-12">
	<div class="form-group">
{!! Form::label('pin_code','Pin Code',['class'=>'control-label']) !!}
{!! Form::text('pin_code',null,['class'=>'form-control', 'id' => 'pin_code']) !!}		
	</div>
	</div>
	</div>
	</div>

	<div class="col-sm-6">
	<div class="form-group">
	{!! Form::label('address','Address') !!}
{!! Form::textarea('address',null,['class'=>'form-control', 'id' => 'address', 'rows' => 5]) !!}		
	</div>
	</div>
</div>