@extends('layout.master')


@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
        	<div class="row margin-top-10">
    			<!-- Total Members -->
			    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
			        <div class="panel bg-light-blue-400">
			            <div class="panel-body padding-15-20">
			                <div class="clearfix">
			                    <div class="pull-left">
			                        <div class="color-white font-size-24 font-roboto font-weight-600" data-toggle="counter" data-start="0" data-from="0" data-to="50" data-speed="500" data-refresh-interval="10">50</div>
			                    </div>

			                    <div class="pull-right">
			                        <i class="font-size-24 color-light-blue-100 fa fa-users"></i>
			                    </div>

			                    <div class="clearfix"></div>

			                    <div class="pull-left">
			                        <div class="display-block color-light-blue-50 font-weight-600">Total Members</div>
			                    </div>
			                </div>
			            </div>
			        </div><!-- /.panel -->
			    </div>

			    <!-- Registrations This Weeks -->
			    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
			        <div class="panel bg-teal-400">
			            <div class="panel-body padding-15-20">
			                <div class="clearfix">
			                    <div class="pull-left">
			                        <div class="color-white font-size-24 font-roboto font-weight-600" data-toggle="counter" data-start="0" data-from="0" data-to="" data-speed="500" data-refresh-interval="10">10</div>
			                    </div>
			                    <div class="pull-right">
			                        <i class="font-size-24 color-teal-100 fa fa-signal"></i>
			                    </div>

			                    <div class="clearfix"></div>

			                    <div class="pull-left">
			                        <div class="display-block color-teal-50 font-weight-600">Monthly Joinings</div>
			                    </div>
			                </div>
			            </div>
			        </div><!-- /.panel -->
			    </div>

			    <!-- Inactive Members -->
			    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
			        <div class="panel bg-amber-300">
			            <div class="panel-body padding-15-20">
			                <div class="clearfix">
			                    <div class="pull-left">
			                        <div class="color-white font-size-24 font-roboto font-weight-600" data-toggle="counter" data-start="0" data-from="0" data-to="" data-speed="500" data-refresh-interval="10">8</div>
			                    </div>
			                    <div class="pull-right">
			                        <i class="font-size-24 color-amber-100 fa fa-exclamation-circle"></i>
			                    </div>

			                    <div class="clearfix"></div>

			                    <div class="pull-left">
			                        <div class="display-block color-amber-50 font-weight-600">Inactive Members</div>
			                    </div>
			                </div>
			            </div>
			        </div><!-- /.panel -->
			    </div>

			    <!-- Members Expired -->
			    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
			        <div class="panel bg-grey-500">
			            <div class="panel-body padding-15-20">
			                <div class="clearfix">
			                    <div class="pull-left">
			                        <div class="color-white font-size-24 font-roboto font-weight-600" data-toggle="counter" data-start="0" data-from="0" data-to="" data-speed="500" data-refresh-interval="10">10</div>
			                    </div>
			                    <div class="pull-right">
			                        <i class="font-size-24 color-grey-100 fa fa-ban"></i>
			                    </div>

			                    <div class="clearfix"></div>

			                    <div class="pull-left">
			                        <div class="display-block color-grey-50 font-weight-600">Membership Due</div>
			                    </div>
			                </div>
			            </div>
			        </div><!-- /.panel -->
			    </div>

			    <!-- Outstanding Payments -->
			    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
			        <div class="panel bg-red-400">
			            <div class="panel-body padding-15-20">
			                <div class="clearfix">
			                    <div class="pull-left">
			                        <div class="color-white font-size-24 font-roboto font-weight-600" data-toggle="counter" data-start="0" data-from="0" data-to="" data-speed="500" data-refresh-interval="10">-1000</div>
			                    </div>
			                    <div class="pull-right">
			                        <i class="font-size-24 color-red-100 fa fa-money"></i>
			                    </div>

			                    <div class="clearfix"></div>

			                    <div class="pull-left">
			                        <div class="display-block color-red-50 font-weight-600">Pending Payments</div>
			                    </div>
			                </div>
			            </div>
			        </div><!-- /.panel -->
			    </div>

			    <!-- Collection -->
			    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
			        <div class="panel bg-green-400">
			            <div class="panel-body padding-15-20">
			                <div class="clearfix">
			                    <div class="pull-left">
			                        <div class="color-white font-size-24 font-roboto font-weight-600" data-toggle="counter" data-start="0" data-from="0" data-to="" data-speed="500" data-refresh-interval="10">90000</div>
			                    </div>
			                    <div class="pull-right">
			                        <i class="font-size-24 color-green-100 fa fa-inr"></i>
			                    </div>

			                    <div class="clearfix"></div>

			                    <div class="pull-left">
			                        <div class="display-block color-green-50 font-weight-600">Monthly Collection</div>
			                    </div>
			                </div>
			            </div>
			        </div><!-- /.panel -->
			    </div>
			</div>
			<!--Member Quick views -->
			<div class="row"> <!--Main Row-->
			    <div class="col-lg-6">
		        	<div class="panel">
			            <div class="panel-title">
			                <div class="panel-head"><i class="fa fa-users"></i><a href="">Members</a></div>
			                <div class="pull-right"><a href="" class="btn-sm btn-primary active" role="button"><i class="fa fa-user-plus"></i> Add</a></div>
			            </div>

			            <div class="panel-body with-nav-tabs">
			                <!-- Tabs Heads -->
			                <ul class="nav nav-tabs">
			                    <li class="active"><a href="#expiring" data-toggle="tab">Expiring<span class="label label-warning margin-left-5">5</span></a></li>
			                    <li><a href="#expired" data-toggle="tab">Expired<span class="label label-danger margin-left-5">2</span></a></li>
			                    <li><a href="#birthdays" data-toggle="tab">Birthdays<span class="label label-success margin-left-5">1</span></a></li>
			                    <li><a href="#recent" data-toggle="tab">Recent</a></li>
			                </ul>

			                <!-- Tab Content -->
			                <div class="tab-content">
			                    <div class="tab-pane fade in active" id="expiring">
			                       	<div class="table-responsive">
			                            <table class="table table-hover table-condensed">
			                                <tr>
			                                    <td>
			                                        <a href=""><img src=""/></a>
			                                    </td>

			                                    <td>
			                                        <a href=""><span class="table-sub-data"</span></a>
			                                        <a href=""><span class="table-sub-data"></span></a>
			                                    </td>
			                                    <?php
			                                        
			                                    ?>
			                                    <td>
			                                        <span class="table-sub-data"><br></span>
			                                        <span class="table-sub-data"></span>
			                                    </td>

			                                     
			                                    <td>
			                                        <a class="btn btn-info btn-xs btn pull-right" href="">Renew</a>
			                                    </td>
			                                </tr>
			                                   <div class="tab-empty-panel font-size-24 color-grey-300">
			                                        No Data
			                                   </div>
			                            </table>
			                        </div>
			                        <a class="btn btn-color btn-xs palette-concrete pull-right margin-right-10 margin-top-10" href="">View All</a>
			                    </div>

			                    <div class="tab-pane fade" id="expired">
			                            <div class="table-responsive">
			                                <table class="table table-hover">
			                                    <tr>
			                                        <td>
			                                            <a href=""><img src=""/></a>
			                                        </td>

			                                        <td>
			                                            <a href=""><span class="table-sub-data"></span></a>
			                                            <a href=""><span class="table-sub-data"></span></a>
			                                        </td>
			                                        <?php
			                                            
			                                        ?>
			                                        <td>
			                                            <span class="table-sub-data"><br></span>
			                                            <span class="table-sub-data"></span>
			                                        </td>

			                                        <td>
			                                           
			                                        </td>
			                                    </tr>
			                                    <div class="tab-empty-panel font-size-24 color-grey-300">
			                                        No Data
			                                   </div>
			                                </table>
			                            </div>
			                        <a class="btn btn-color btn-xs palette-concrete pull-right margin-right-10 margin-top-10" href="">View All</a>
			                    </div>

			                    <div class="tab-pane fade" id="birthdays">
			                            <div class="table-responsive">
			                                <table class="table table-hover">
			                                    <tr>
			                                        
			                                        <td><a href=""><img src=""/></a></td>
			                                        <td><a href=""></a></td>
			                                        <td></td>
			                                        <td></td>
			                                    </tr>
			                                    <div class="tab-empty-panel font-size-24 color-grey-300">
			                                        No Data
			                                   </div>
			                                </table>
			                          </div>
			                    </div>

			                    <div class="tab-pane fade" id="recent">
			                        <div class="table-responsive">
			                            <table class="table table-hover table-condensed">
			                                <tr>
			                                    <td>
			                                        <a href=""><img src=""/></a>
			                                    </td>

			                                    <td>
			                                        <a href=""><span class="table-sub-data"></span></a>
			                                        <a href=""><span class="table-sub-data"></span></a>
			                                    </td>

			                                    <td>
			                                        <span class="table-sub-data"><br></span>
			                                        <span class="table-sub-data"></span>
			                                    </td>
			                                </tr>
			                                <div class="tab-empty-panel font-size-24 color-grey-300">
			                                        No Data
			                                   </div>
			                            </table>
			                        </div>
			                        <a class="btn btn-color btn-xs palette-concrete pull-right margin-right-10 margin-top-10" href="">View All</a>
		                    	</div>
		                	</div> <!-- Tab-content ends -->
		            	</div> <!-- Pannel-body ends -->
		        	</div> <!-- pannel ends -->
		    	</div> <!-- col end -->
        	</div> <!-- row ends -->
    	</div>
	</div>
</div>
@endsection