<style>
    .ui-grid-cell {
min-width: 110% !important;

}
    .ui-grid-header-cell-row{
        //background-color: rgb(70, 81, 99);
        width: 90% !important;
    }
    .ui-grid-header-cell {
    width: 100% !important;
}
    ui-grid-top-panel{
        background-color: rgb(70, 81, 99);
        width: 90% !important;
    }
    .ui-grid-header-canvas{
        background-color: rgb(70, 81, 99);
         width: 100% !important;
    }
    .ui-grid-top-panel{
        color: white;
    }
    .ui-grid-menu-button{
        background-color: rgb(70, 81, 99);
    }
    .ui-grid-pager-panel{
        background-color: rgb(70, 81, 99);
    }


    .select11{ background: green !important; color: white;}
    .selectapproved1{ color: green; font-size: 20px;}
    .select10{ background: #a7a7a7 !important; color: white;}
    #submitjob .form-group {
        float: left;
        width: 100%;
    }
    .panel-heading:hover {
        color: #fff !important;
    }
    .text-success {
        font-size: 10px !important;
    }
    .text-info {
        font-size: 12px;
        color: #F44336 !important;
        font-weight: 800;
    }
    .joblnk {
        display: block;
        text-decoration: none !important;
        color: #1a1818;
        padding: 5px;
        border-radius: 3px;
    }
    .joblnk .jtitle {
        font-size: 16px;
        color: #5d5d5d;
        font-weight: 400;
        margin-bottom: 5px;
        display: inline-block;
    }
    .joblnk .jtitle .title_in {
        cursor: pointer;
        color: #2d85b4;
        margin-right: 2px;
    }
    .member-social a {
        margin: 0px 5px;
        font-size: 1.5em;
        display: inline-block;
        border: solid 1px #ececec;
        padding: 2px;
        text-align: center;
        background: #fbfbfb;
        width: 43px;
    }
    .joblnk .jtxt {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        margin-bottom: 5px;
        padding-top: 0px;
        font-size: 13px;
        font-weight: 400;
    }
    .box.box-primary {
        border-bottom: 2px solid #a7a7a7;
    }
    .btnnew {
        background-color: rgb(70, 81, 99);
        color: #fff;
        border-radius: 0px;
    }
    .btnnew1 {
        background-color: rgb(244, 247, 234);
        color:#0c0c0c;
        border-radius: 0px;
    }
    .btnnew2 {
        background-color: rgb(70, 81, 99);
        color: #fff;
        border-radius: 0px;
    }
    .btnnew3 {
        background-color: rgb(70, 81, 99);
        color: #fff;
        border-radius: 0px;
    }
    .btnnew4 {
        background-color: rgb(244, 247, 234);
        color: #0c0c0c;
        border-radius: 0px;
    }
    .btnnew5 {
        background-color: rgb(221, 243, 149);
        color: #0c0c0c;
        border-radius: 0px;
    }
    .btn-primary{
        background-color: rgb(70, 81, 99);

    }
    .box.box-primary {
        border-top-color: rgb(66, 77, 94);
    }
    .modal {}
    .box-body-default {
        box-shadow: 1px 2px 5px #b9b5b5;
    }
    .col-md-7 {
        margin-top: 22px;
    }
    .shareparent .sharediv{ display: none; margin-top: 10px;}
    .shareparent:hover .sharediv{ display: block;}
</style>
<div ng-controller='myleadCtrl'>


     
    <section class="content-header">
        <input ng-show="showmyjoblist" type="button"  ng-click="loadmyjoblist()" class="btn btn-default pull-right" value="My Job List"/>
        <input ng-hide="showmyjoblist" type="button"  ng-click="showmyjoblist=!showmyjoblist" class="btn btn-default pull-right" value="My Job"/>
        <div class="clearfix"></div>
        <div ng-hide="showmyjoblist">
            <div>
                <div class="btn-group">
                    <button class="btn btn-success" type="button"  ng-click="submitcv()" > Submit CV <i class="fa fa-forward"></i></button>
                    <button class="btn btn-info" type="button"  ng-click="submitcv(true)" > Download Tracker<i class="fa fa-download"></i></button>
                </div>

            </div>
            <div class="clearfix"></div>
            <div ui-grid="gridmyjoblist"  ui-grid-selection ui-grid-pagination ui-grid-cellnav ui-grid-exporter ui-grid-resize-columns
                 ui-grid-move-columns ui-grid-exporter ui-grid-selection ui-grid-pinning  class="grid"></div>
        </div>
        <div ng-show="showmyjoblist">
            <div class="col-md-12">

                <div class="hidden">
                    <label>Which columns should we export?</label>
                    <select ng-model="export_column_type">
                        <option value='all'>All</option>
                        <option value='visible'>Visible</option>
                    </select>
                    <label>Which rows should we export?</label>
                    <select ng-model="export_row_type">
                        <option value='all'>All</option>
                        <option value='visible'>Visible</option>
                        <option value='selected'>Selected</option>
                    </select>


                    <button ng-click="export()">Export</button>
                    <div class="custom-csv-link-location">
                        <label>Your CSV will show below:</label>
                        <span class="ui-grid-exporter-csv-link">&nbsp;</span>
                    </div>
                </div>
                <form class="form-inline col-md-12" ng-show='jobslist.length>0'>
                    <div class="form-group  ">
                        <label id="exporter">What format would you like to export?</label>
                        <select ng-model="export_format" id="exporter" class="form-control" ng-change="beforeexport()">
                            <option value='csv'>CSV</option>
                            <option value='pdf'>PDF</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default" ng-click="export()">Export</button>
                </form>
                <div class="hidden">


                    <div ui-grid="exportdata" ui-grid-selection ui-grid-exporter ui-grid-move-columns class="grid"></div>
                </div>


                <div ng-show='jobslist.length==0 && isfilter==false' class="col-md-12">

                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <i class="fa fa-exclamation-triangle"></i> <strong>Hi there !</strong> You neither created nor assigned any job yet, to start working.

                        <span ng-show="mp.add_new_job_store"> Please <a href="#/newjob"   class="btn btn-default"  >click  here</a> to add job .</span>
                        <span ng-hide="mp.add_new_job_store">Please contact your manager.</span> 
                    </div>
                </div>
            </div>
            <div style="margin-top:20px;" class="col-md-12">


                <ul class="nav nav-tabs showloader pull-left  ">
                    <li class="active"><a data-toggle="tab" href=""  ng-click='changefilter("all","job_status")' class="btn btn-primary">All</a></li>
                    <li><a href="" data-toggle="tab" ng-click='changefilter("Pre Demo","job_status")' class="btn btn-primary">Pre Demo</a></li>
                    <li><a href="" data-toggle="tab" ng-click='changefilter("Re Schedule","reschedule")' class="btn btn-primary">Reschedule</a></li>
                    <li><a href="" data-toggle="tab" ng-click='changefilter("Positive-Post Demo","job_status")' class="btn btn-primary">Positive/Post Demo</a></li>
                    <li><a href="" data-toggle="tab" style="background:#ddf295; color:#251e22;" ng-click='changefilter("Closed","Closed")' class="btn btn-primary">Closed</a></li>

 <li><a href="" data-toggle="tab" ng-click='changefilter("Not Interested","job_status")' class="btn btn-primary">Not Interested</a></li>
                    
                </ul>
             

                <div class="clearfix"></div>

         <div class="">
                            <div ui-grid="gridOptionsloadcandidatesInPopUp" ui-grid-selection ui-grid-pagination ui-grid-cellnav ui-grid-exporter ui-grid-resize-columns
                                 ui-grid-move-columns ui-grid-exporter ui-grid-selection ui-grid-pinning class="grid">
                            </div>
                            <div class="clearfix clear"></div>
                        </div>   <div class="clearfix clear"></div>
                <div class="clearfix"></div>
             
            </div>
        </div>


    </section>


    <!-- Assist content -->
    <section class="content">


        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-4">
                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="vendor" class="modal fade">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>

                                    </div>
                                    <div class="box box-primary">
                                        <div class="box-header">
                                            <i class="ion ion-clipboard"></i>

                                            <h3 class="box-title text-center">Assign Job to Vendor</h3>


                                        </div> 

                                        <div class="box-body">
                                            <input type="text" ng-model="vendorSearch"  class="form-control" placeholder="Search"/>



                                            <ul class="todo-list">
                                                {{selectedmanager}}
                                                <li ng-repeat="vendor in vendors | filter:vendorSearch">


                                                    <!-- drag handle -->
                                                    <span class="handle">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </span>
                                                    <!-- checkbox <input type="checkbox" ng-checked="selectedmanagerlist.indexOf(manager.id)>-1" ng-model="selectedmanager" ng-change="selectedmanagerlistset(manager.id)" value="{{manager.id}}"> -->

                                                    <input type="checkbox" ng-model="vendor.selected">


                                                    <!-- todo text -->
                                                    <span class="text"> {{vendor.name}}</span>
                                                    <!-- Emphasis label -->

                                                    <!-- General tools such as edit or delete-->
                                                    <div class="tools hidden">
                                                        <i class="fa fa-edit"></i>
                                                        <i class="fa fa-trash-o"></i>
                                                    </div>
                                                </li>




                                            </ul>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer clearfix no-border">
                                            <button type="button" class="btn btn-default pull-right" ng-click="assignjobtovendor()"> Assign Job</button>
                                            <button type="button" class="btn btn-default pull-right" ng-click="unassignjobtovendor()" help="selected vendor will be removed from job">Un-Assign Job</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal-4" class="modal fade">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>

                                    </div>
                                    <div class="box box-primary">
                                        <div class="box-header">
                                            <i class="ion ion-clipboard"></i>

                                            <h3 class="box-title text-center">Assign Job</h3>

                                            <div class="box-tools pull-right hidden">
                                                <ul class="pagination pagination-sm inline">
                                                    <li>
                                                        <a href="#">&laquo;</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">1</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">2</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">3</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">&raquo;</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- /.box-header -->

                                        <div class="box-body">
                                            <input type="text" ng-model="managerSearch"  class="form-control" placeholder="Search"/>

                                            <ul class="todo-list">

                                                {{selectedmanager}}
                                                <li ng-repeat="manager in managers | filter:managerSearch">


                                                    <!-- drag handle -->

<!-- checkbox <input type="checkbox" ng-checked="selectedmanagerlist.indexOf(manager.id)>-1" ng-model="selectedmanager" ng-change="selectedmanagerlistset(manager.id)" value="{{manager.id}}"> -->

                                                    <input type="checkbox" ng-model="manager.selected">


                                                    <!-- todo text -->
                                                    <span class="text"> {{manager.name}}</span>
                                                    <!-- Emphasis label -->

                                                    <!-- General tools such as edit or delete-->
                                                    <div class="tools hidden">
                                                        <i class="fa fa-edit"></i>
                                                        <i class="fa fa-trash-o"></i>
                                                    </div>
                                                </li>




                                            </ul>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer clearfix no-border">
                                            <button type="button" class="btn btn-default pull-right" ng-click="assignjob()"> Assign Job</button>
                                            <button type="button" class="btn btn-default pull-right" ng-click="unassignjob()" help="Selected recruiter will be removed from selected job !!">
                                                Unassigned Job</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="onboarding" class="modal fade">
                            <div class="modal-dialog modal-xm" role="document">
                                <div class="modal-content">

                                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                    <div class="modal-header">
                                        <h3>{{onboarding.first_name}} Onboarding Details</h3>


                                    </div>
                                    <div class="modal-body">

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6" ng-show="onboarding.bv_vender">
                                                    Bv Vendor : {{onboarding.bv_vender}} <button ng-click="tochangevendor=true;" class="btn btn-sm btn-dark-green">Change</button>
                                                </div>
                                                <div class="col-md-6" ng-hide="onboarding.bv_vender && tochangevendor==false ">

                                                    <select ng-model="bv_vender_id" ng-change="changevendor(bv_vender_id)">
                                                        <option value="{{bvvendor.id}}"   ng-repeat="bvvendor in bvvendors">
                                                            {{bvvendor.name}} {{bvvendor.email}}
                                                        </option>

                                                    </select>

                                                    <button class="btn btn-sm btn-dark-green" ng-click="setbvvendor()">Set</button>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-6 ml-auto">
                                            <ul class="list-group">
                                                <li class="list-group-item">First Name:{{onboarding.first_name}}
                                                    <br/><i class="fa fa-2 {{status_show(onboarding.first_name_status)}}" aria-hidden="true"></i>
                                                    <br/> {{onboarding.first_name_comment}}
                                                </li>

                                            </ul>
                                        </div>
                                        <div class="col-md-6 ml-auto">
                                            <ul class="list-group">
                                                <li class="list-group-item">Last Name:{{onboarding.last_name}}</li>
                                            </ul>
                                        </div>
                                        <div class="form-group col-md-6 col-md-6">
                                            <ul class="list-group">
                                                <li class="list-group-item">Spouse Name:{{onboarding.spouse_name}}</li>
                                            </ul>
                                        </div>
                                        <div class="form-group col-md-6 col-md-6">
                                            <ul class="list-group">
                                                <li class="list-group-item">Blood Group:{{onboarding.blood_group}}</li>
                                            </ul>
                                        </div>
                                        <div class="form-group col-md-6 col-md-6">
                                            <ul class="list-group">
                                                <li class="list-group-item">Gender:{{onboarding.gender}}</li>
                                            </ul>
                                        </div>
                                        <div class="form-group col-md-6 col-md-6">
                                            <ul class="list-group">
                                                <li class="list-group-item">Nationality:{{onboarding.nationality}}</li>
                                            </ul>
                                        </div>
                                        <div class="form-group col-md-6 col-md-6">
                                            <ul class="list-group">
                                                <li class="list-group-item">Marital status:{{onboarding.marital_status}}</li>
                                            </ul>
                                        </div>
                                        <div class="form-group col-md-6 col-md-6">
                                            <ul class="list-group">
                                                <li class="list-group-item">Date_of_birth:{{onboarding.date_of_birth}}</li>
                                            </ul>
                                        </div>
                                        <div class="form-group col-md-6 col-md-6">
                                            <ul class="list-group">
                                                <li class="list-group-item">Pan Card:{{onboarding.pan_card}}</li>
                                            </ul>
                                        </div>
                                        <div class="form-group col-md-6 col-md-6">
                                            <ul class="list-group">
                                                <li class="list-group-item">Current Address:{{onboarding.current_address}}</li>
                                            </ul>
                                        </div>

                                        <div class="form-group col-md-6 col-md-6">
                                            <ul class="list-group">
                                                <li class="list-group-item">Permanent Address:{{onboarding.permanent_address}}</li>
                                            </ul>
                                        </div>
                                        <div class="form-group col-md-6 col-md-6">
                                            <ul class="list-group">
                                                <li class="list-group-item">Fathers Name:{{onboarding.fathers_name}}</li>
                                            </ul>
                                        </div>
                                        <div class="form-group col-md-6 col-md-6">
                                            <ul class="list-group">
                                                <li class="list-group-item">Year of passing tenth:{{onboarding.year_of_passing_tenth}}</li>
                                            </ul>
                                        </div>
                                        <div class="form-group col-md-6 col-md-6">
                                            <ul class="list-group">
                                                <li class="list-group-item">Board university tenth:{{onboarding.year_of_passing_tenth}}</li>
                                            </ul>
                                        </div>
                                        <div class="form-group col-md-6 col-md-6">
                                            <ul class="list-group">
                                                <li class="list-group-item">Year of passing twelve:{{onboarding.year_of_passing_twelve}}</li>
                                            </ul>
                                        </div>
                                        <div class="form-group col-md-6 col-md-6">
                                            <ul class="list-group">
                                                <li class="list-group-item">Board university twelve:{{onboarding.board_university_twelve}}</li>
                                            </ul>
                                        </div>
                                        <div class="form-group col-md-6 col-md-6">
                                            <ul class="list-group">
                                                <li class="list-group-item">Year of passing graduation:{{onboarding.year_of_passing_graduation}}</li>
                                            </ul>
                                        </div>
                                        <div class="form-group col-md-6 col-md-6">
                                            <ul class="list-group">
                                                <li class="list-group-item">Board university graduation:{{onboarding.board_university_graduation}}</li>
                                            </ul>
                                        </div>
                                        <div class="form-group col-md-6 col-md-6">
                                            <ul class="list-group">
                                                <li class="list-group-item">Year_of_passing_postgraduation:{{onboarding.year_of_passing_postgraduation}}</li>
                                            </ul>
                                        </div>
                                        <div class="form-group col-md-6 col-md-6">
                                            <ul class="list-group">
                                                <li class="list-group-item">Board university postgraduation:{{onboarding.board_university_postgraduation}}</li>
                                            </ul>
                                        </div>
                                        <div class="form-group col-md-6 col-md-6">
                                            <ul class="list-group">
                                                <li class="list-group-item">Existing EPF Account:{{onboarding.year_of_passing_graduation}}</li>
                                            </ul>
                                        </div>
                                        <div class="form-group col-md-6 col-md-6">
                                            <ul class="list-group">
                                                <li class="list-group-item">Existing ESIC Account:{{onboarding.board_university_graduation}}</li>
                                            </ul>
                                        </div>


                                        <div ng-repeat='organization in onboarding.OnboardingOrganizations'>

                                            <div class="form-group col-md-4 ">
                                                <ul class="list-group">
                                                    <li class="list-group-item">Organization Name:<br/>{{organization.organization_name}}</li>
                                                </ul>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <ul class="list-group">
                                                    <li class="list-group-item">Start Date:<br/>{{organization.start_date}}</li>
                                                </ul>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <ul class="list-group">
                                                    <li class="list-group-item">End Date:<br/>{{organization.end_date}}</li>
                                                </ul>
                                            </div>

                                        </div>




                                        <div class="form-group col-md-6 col-md-6">
                                            <input type="checkbox" ng-model="onboarding.is_verified_success" />

                                            <button class="btn btn-info" ng-click="onboardingverify()">Verify</button>

                                        </div>
                                        <div style="clear:both;"></div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <!--unassigned pop up for vendors or recruiters-->
                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal-5" class="modal fade">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>

                                    </div>
                                    <div class="box box-primary">
                                        <div class="box-header">
                                            <i class="ion ion-clipboard"></i>

                                            <h3 class="box-title text-center">Assign Job</h3>

                                            <div class="box-tools pull-right">
                                                <ul class="pagination pagination-sm inline">
                                                    <li>
                                                        <a href="#">&laquo;</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">1</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">2</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">3</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">&raquo;</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- /.box-header -->

                                        <div class="box-body">

                                            <ul class="todo-list">
                                                {{selectedmanager}}
                                                <li ng-repeat="manager in managers">


                                                    <!-- drag handle -->

   <!-- checkbox <input type="checkbox" ng-checked="selectedmanagerlist.indexOf(manager.id)>-1" ng-model="selectedmanager" ng-change="selectedmanagerlistset(manager.id)" value="{{manager.id}}"> -->

                                                    <input type="checkbox" ng-model="manager.selected">


                                                    <!-- todo text -->
                                                    <span class="text"> {{manager.name}}</span>
                                                    <!-- Emphasis label -->

                                                    <!-- General tools such as edit or delete-->
                                                    <div class="tools hidden">
                                                        <i class="fa fa-edit"></i>
                                                        <i class="fa fa-trash-o"></i>
                                                    </div>
                                                </li>




                                            </ul>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer clearfix no-border">
                                            <button type="button" class="btn btn-default pull-right" ng-click="assignjob()"> Assign Job</button>
                                            <button type="button" class="btn btn-default pull-right" ng-click="unassignjob()"> Unassigned Job</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--end unassigned job-->
                    </div>
                </div>
                <hr class="hrstye">






            </div>
        </div>

    </section>
    <!-- End Assist Content -->
    <!-- job Update -->
    <div id="submitjob" class="modal fade " role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Job Details</h4>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" role="form" name="userForm">

                                <div class="form-group">

                                    <label class="col-md-3 col-sm-offset-2" select>Select a {{clientsdepartment}}:</label>
                                    <div class="col-md-6">
                                        <select class="form-control e" d="" n="Select a Client" ng-model="myjob.client_detail_id" name="client_detail_id" required>
                                            <option value="{{client.id}}" ng-repeat="client in clientdetails">
                                                {{client.billingName}}


                                            </option>
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-sm-offset-2" Manager>Manager:</label>
                                    <div class="col-md-6">
                                        <select class="form-control e" n="Select a Manager" ng-model="myjob.manager_id" name="manager_id" required>
                                            <option value="{{profile.id}}">Self</option>
                                            <option value="{{manager.id}}" ng-repeat="manager in managers">
                                                {{manager.name}}
                                            </option>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-offset-2" Manager>Tracker :</label>
                                    <div class="col-md-6">

                                        <select class="form-control " ng-model="myjob.tracker_id" n="Tracker NO">
                                            <option value="{{tracker.id}}" ng-repeat="tracker in trackerlist">{{tracker.tracker_name}}</option>
                                        </select>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label class="col-md-3 col-sm-offset-2" Title>Job Title</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control e" n="Job Title" id="title" ng-model="myjob.job_title" placeholder="title" name="job_title"
                                               required/>

                                    </div>
                                </div>



                                <div class="form-group " ng-show="mp.can_add_skills_for_call">
                                    <label class="col-md-3 col-sm-offset-2" Title>Primary Skill</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control " n="Primary Skill" id="Primary_Skill" ng-model="myjob.first_skill"  
                                               required/>

                                    </div>
                                </div>


                                <div class="form-group" ng-show="mp.can_add_skills_for_call">
                                    <label class="col-md-3 col-sm-offset-2" Title>Secondary Skill</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control " n="Secondary Skill" id="Secondary_Skill" ng-model="myjob.second_skill" 
                                               required/>

                                    </div>
                                </div>
                                <div class="form-group " ng-show="mp.can_add_skills_for_call">
                                    <label class="col-md-3 col-sm-offset-2" Title>Third Skill</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control " n="Third Skill" id="Third_Skill" ng-model="myjob.third_skill" 
                                               required/>

                                    </div>
                                </div>



                                <div class="form-group">
                                    <label class="col-md-3 col-sm-offset-2" Title>Job Type</label>
                                    <div class="col-md-6">
                                        <select class="form-control" ng-model='myjob.jobtype' ng-change='changerole()' id="role">
                                            <option id="full">Full Time</option>
                                            <option id="inter">Internship</option>
                                            <option id="cont">Contract</option>
                                            <option id="freel">Freelence</option>

                                        </select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-offset-2" Referral>Referral Bonus:</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control e" validate n="Referral Bonus" ng-model="myjob.referralBonus" placeholder="Bonus"
                                               name="referralBonus" required/>


                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-offset-2" Title>Job Key Skills</label>
                                    <div class="col-md-6">
                                        <textarea class="form-control e" n="key skill" id="key" ng-model="myjob.keyskills"></textarea>


                                    </div>
                                </div>

                        </div>
                        <div id="internship">
                            <div class="form-group">
                                <label class="col-md-3 col-sm-offset-2">Internship duration</label>
                                <div class="col-md-4">
                                    <select class="form-control" ng-model='myjob.internshipduration'>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>

                                    </select>

                                </div>
                                <div class="col-md-2">
                                    <select class="form-control" ng-model='myjob.internshipdurationunit'>
                                        <option>Month</option>
                                        <option>Weeks</option>


                                    </select>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-sm-offset-2">Is Part Time Allowed</label>
                                <div class="col-md-4">
                                    <label class="radio-inline">
                                        <input type="radio" ng-model='myjob.isparttime' value="yes">Yes
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" ng-model='myjob.isparttime' value="no">No
                                    </label>

                                </div>

                            </div>
                        </div>
                        <div id="contract">
                            <div class="form-group" id="contract">
                                <label class="col-md-3 col-sm-offset-2">Contract Re-newable</label>
                                <div class="col-md-6">
                                    <label class="radio-inline">
                                        <input type="radio" ng-model='myjob.contractrenewable' value="yes">Yes
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" ng-model='myjob.contractrenewable' value="no">No
                                    </label>

                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-sm-offset-2">Contract duration</label>
                                <div class="col-md-4">
                                    <select class="form-control" ng-model='myjob.contract'>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>

                                    </select>

                                </div>
                                <div class="col-md-2">
                                    <select class="form-control" ng-model='myjob.contractunit'>
                                        <option>Month</option>
                                        <option>Weeks</option>


                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="freelence">
                            <label class="col-md-3 col-sm-offset-2">Change Payable</label>
                            <div class="col-md-6">
                                <label class="radio-inline">
                                    <input type="radio" ng-model='myjob.freelancepayable' value="Hourly">Hourly
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" ng-model='myjob.freelancepayable' value="Project-Based">Project-Based
                                </label>

                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-md-12" JD>JD:</label>
                            <div class="col-md-12">
                                <textarea class="form-control "   contenteditable rows="5" ng-model="myjob.jobDescription" name="jobDescription"
                                          required></textarea>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-sm-offset-2" Title>Location</label>
                            <div class="col-md-6">

                                <!--                                <md-select ng-model="location" md-on-close="clearSearchTerm()" data-md-container-class="selectdemoSelectHeader" multiple>
                                                                    <md-select-header class="demo-select-header">
                                                                        <input ng-model="searchTerm" type="search" placeholder="Search for a location.." class="demo-header-searchbox md-text">
                                                                    </md-select-header>
                                                                    <md-optgroup label="locations">
                                                                        <md-option ng-value="location" ng-repeat="location in locations|
                                                                                               filter:searchTerm">{{location}}</md-option>
                                                                    </md-optgroup>
                                                                </md-select>  -->
                                <select ng-model="location"  class="form-control" multiple="">
                                    <option ng-repeat="location in locations|filter:searchTerm">{{location}}</option>
                                </select>
                            </div>


                        </div>




                        <div class="form-group">
                            <label class="col-md-3 col-sm-offset-2" Exprience>Experience:</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control e" validate n="Minimum Experience" ng-model="myjob.minimumExperience" name="minimumExperience"
                                       placeholder="min" required/>

                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control e" validate n="Maximum Experience" ng-model="myjob.maximumExperience" name="maximumExperience"
                                       placeholder="max" required/>

                            </div>
                        </div>

                        <div class="form-group">

                            <!--   <label class="col-md-3 col-sm-offset-2" Salary>Salary </label>
                            <div class="col-md-3">
                                <input type="text" class="form-control e" validate n="Minimum Experience" ng-model="myjob.minimumSalary" name="inimumSalary"
                                    placeholder="From" required/>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control e" validate n="Maximum Experience" ng-model="myjob.maximumSalary" name="maximumSalary"
                                    placeholder="To" required/>
                            </div>-->
                            <label class="col-md-9 col-sm-offset-2" Salary>Salary </label>

                            <div class=" col-md-9 col-sm-offset-2">



                                <div class="col-md-6">
                                    <input type="number" min="10000" max="5000000" step="10000" class="form-control e" validate  n="Minimum Experience" ng-model="myjob.minimumSalary" name="minimumSalary" placeholder="From" maxlength="10" />

                                </div>
                                <div class="col-md-6">
                                    <input type="number"  min="{{myjob.minimumSalary}}" max="5000000" step="10000"  class="form-control e" validate n="Maximum Experience" ng-model="myjob.maximumSalary" name="maximumSalary" placeholder="To" maxlength="10" />

                                </div>


                            </div>
                        </div>

                        <div class='clearfix'></div>


                        <div class="form-group">
                            <label class="col-md-4 col-sm-offset-2" Industry>Hide Salary from jobseekers</label>

                            <div class="col-md-3">
                                <input type="checkbox" ng-model='myjob.HideSalaryfromjobseekers' ng-true-value="'YES'" ng-false-value="'NO'">
                            </div>

                        </div>

                        <div class='clearfix'></div>
                        <div class="form-group">
                            <label class="col-md-3 col-sm-offset-2" Industry>Industry</label>
                            <div class="col-md-6">
                                <select class="form-control " ng-model="myjob.Industry" name="industry_id">
                                    <option ng-repeat="industry in  industries">{{industry.industryName}}</option>
                                </select>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-sm-offset-2" Functional>Functional Area</label>
                            <div class="col-md-6">
                                <select class="form-control" ng-model="functionalArea" ng-change="getrole(x)" ng-options="x.functionalAreaName for x in functionalareas"
                                        name="function_id">
                                </select>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-sm-offset-2" Job_Role>Job Role</label>
                            <div class="col-md-6">
                                <select class="form-control" name="Job_Role" ng-model="myjob.jobRole">
                                    <option ng-repeat="jobrole in  jobroles">{{jobrole}}</option>
                                </select>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-sm-offset-2" opaning>Number of opening:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control e" validate n="Number of opening" ng-model="myjob.numberOfOpening" name="numberOfOpening"
                                       placeholder="opening" required/>



                            </div>

                        </div>




                        <div class="form-group">

                            <label class="col-md-3 col-sm-offset-2" JD></label>
                            <div class="col-md-3">
                                <div class="control-group">
                                    <label class="control-label"> Date Start</label>
                                    <div class="controls input-append date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2"
                                         data-link-format="yyyy-mm-dd">
                                        <input size="16" type="text" value="" readonly ng-model="myjob.start_date">
                                        <span class="add-on">
                                            <i class="icon-remove"></i>
                                        </span>
                                        <span class="add-on">
                                            <i class="icon-th"></i>
                                        </span>
                                    </div>
                                    <input type="hidden" id="dtp_input2" value="" />
                                    <br/>
                                </div>

                            </div>

                            <div class="col-md-3">
                                <div class="control-group">
                                    <label class="control-label"> Date End</label>
                                    <div class="controls input-append date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input3"
                                         data-link-format="yyyy-mm-dd">
                                        <input size="16" type="text" value="" readonly ng-model="myjob.end_date">
                                        <span class="add-on">
                                            <i class="icon-remove"></i>
                                        </span>
                                        <span class="add-on">
                                            <i class="icon-th"></i>
                                        </span>
                                    </div>
                                    <input type="hidden" id="dtp_input3" value="" />
                                    <br/>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-sm-offset-2" JD>Notes</label>
                            <div class="col-md-6">
                                <textarea class="form-control e" n="Notes" rows="3" ng-model="myjob.notes" name="Notes"></textarea>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-sm-offset-2">Job Status</label>
                            <div class="col-md-6">
                                <select class="form-control e" n="Status" rows="3" ng-model="myjob.job_status" name="Notes">
                                    <option>Hold</option>
                                    <option>Active</option>
                                    <option>Closed</option>
                                </select>

                            </div>
                        </div>

                        <div class="form-group">


                            <div class="col-lg-offset-2 col-md-3">
                                <!--                                            myjob, location, functionalArea-->
                                <button type="submit" class="btn btn-block btn-primary validate" tar="#addnewjobform" ng-click="addNewJobupdate()">Save</button>



                            </div>
                        </div>
                        </form>
                    </div>

                    <script type="text/javascript">
                        $('.form_date').datetimepicker({
                            language: 'fr',
                            weekStart: 1,
                            todayBtn: 1,
                            autoclose: 1,
                            todayHighlight: 1,
                            startView: 2,
                            minView: 2,
                            forceParse: 0
                        });
                        $(document).ready(function () {
                        });
                    </script>

                </div>

            </div>

        </div>
    </div>


    <!-- End Job Update-->

    <!-- All Candidate -->
    <div class="modal fade" id="candidatesall" role="dialog">
        <div class="modal-dialog modal-lg">



            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">{{gridheader}} <i class='h5'>( {{jobitemselected.ClientName}} > {{jobitemselected.location}} > {{jobitemselected.job_title}})</i></h4>
                    <ul class="nav navbar-nav navbar-right">


                        <li>
                            <a ng-if="mp.candidates_under_job_copyjob" href="javascript:" data-toggle="modal" data-target="#assignCandidate">
                                <span class="glyphicon glyphicon-log-in" style="color:#0c0c0c;"></span> Assign Candidate</a>
                        </li>
                        <li>
                            <a ng-if="mp.btn_submit_cv_to_panel" href="javascript:" ng-click="submit_cv_to_panel_status()">
                                <span class="glyphicon glyphicon-log-in" style="color:#0c0c0c;"></span> Submit to Panel</a>
                        </li>
                        <li>
                            <a href="javascript:" ng-click="submitcv()">
                                <span class="glyphicon glyphicon-log-in" style="color:#0c0c0c;"></span>Submit Cv</a>
                        </li>

                    </ul>
                </div>
                <div style="text-align: right;">
                    <button type="button" class="btn btnnew" ng-click="filterdrbytab('My Candidates', 'all')" data-toggle="modal">All
                        <span class="badge ng-binding">{{selectedjoball}}</span>
                    </button>
                    <button type="button" class="btn btnnew1" ng-click="filterdrbytab('My Candidates', 'Under Review')" data-toggle="modal">In Review/Referrals
                        <span class="badge ng-binding">{{selectedjobunderreview}}</span>
                    </button>
                    <button type="button" class="btn btnnew2" ng-click="filterdrbytab('My Candidates', 'In Process')" data-toggle="modal">In process
                        <span class="badge ng-binding">{{selectedjobinprocess}}</span>
                    </button>
                    <button type="button" class="btn btnnew5" ng-click="filterdrbytab('My Candidates', 'isinterview')" data-toggle="modal">Interview
                    <span class="badge ng-binding">{{selectedjobininterview}}</span>
                     </button>
                    <button type="button" class="btn btnnew3" ng-click="filterdrbytab('My Candidates', 'Selected')" data-toggle="modal"> Selected
                        <span class="badge ng-binding">{{selectedjobselectedcandidate}}</span>
                    </button>
                    <button type="button" class="btn btnnew4" ng-click="filterdrbytab('My Candidates', 'Rejected')" data-toggle="modal">Rejected
                        <span class="badge ng-binding">{{selectedjobrejected}}</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                         <div class="text-right">
                                <input type="button" ng-click="toggleexport()" class="btn btn-sm btn-default " value="Change format to export" />
                            </div>
                        <div class="col-md-12">
                            <input type="text" placeholder="Search" class="form-control " ng-model="filterpopup" ng-keyup="filterpopupfunction()"/>
                        </div>
                       
                        <div class="col-md-12">
                            <div ui-grid="gridOptionsloadcandidatesInPopUp" ui-grid-selection ui-grid-pagination ui-grid-cellnav ui-grid-exporter ui-grid-resize-columns
                                 ui-grid-move-columns ui-grid-exporter ui-grid-selection ui-grid-pinning class="grid">
                            </div>
                            <div class="clearfix clear"></div>
                        </div>   <div class="clearfix clear"></div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- All End Candidate-->
    <!-- All Candidate -->
    <div class="modal fade" id="internalreference" role="dialog">
        <div class="modal-dialog modal-md">


            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Get Reference</h4>

                    <div class="modal-body">

                        <div ng-click="changechecked(department)" ng-repeat="department in  departments">
                            <label>
                                <i ng-show="department.selected" class="fa fa-check-square-o text-green"></i>
                                <i ng-hide="department.selected" class="text-green fa fa-square-o"></i> {{department.department}}</label>
                        </div>
                        <div class="form-group">
                            <label for="prmSubject">Subject:</label>
                            <input type="text" ng-model='prmSubject' class="form-control" id="prmSubject">
                        </div>
                        <div class="form-group">
                            <label for="prmMessagge">Message:</label>
                            <textarea ng-model='prmMessagge' contenteditable class="form-control" id="prmMessagge"></textarea>
                        </div>



                    </div>
                    <input type="button" ng-click="getinternalreferrence()" value="submit" class="btn btn-success">
                </div>

            </div>

        </div>
    </div>

    <!-- All End Candidate-->







    <!-- Assign Job -->
    <div id="showcvs" class="modal fade " role="dialog">
        <div class="modal-dialog modal-lg" style="width:100%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" ng-click="cancel()" class="close" type="button">×</button>
                    <h4 class="modal-title">CVS</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form class="table-responsive" id="cvformdata">

                            <table class="table table-bordered">
                                <tr ng-show="$index == 0" ng-repeat="cv in cvslists">
                                    <td ng-show='cv.statusofsubmit'></td>
                                    <th>CV</th>
                                    <th>CANDIDATE NAME</th>
                                    <th>MOBILE NO</th>
                                    <th>EMAIL</th>
                                    <th>RELEVANT EXPERIANCE</th>
                                    <th>QUALIFICATION</th>
                                    <th>CURRENT SALARY</th>

                                    <th>LOCATION</th>
                                    <th>PREFERRED LOCATION</th>
                                    <th>CURRENT DESIGNATION</th>
                                    <th>CURRENT ORGANIZATION</th>

                                    <th>EXPECTED CTC</th>
                                    <th>NOTICE PERIOD</th>
                                    <th>OVERALL EXPERIANCE</th>
                                    <th ng-repeat="(key, value) in cv.extradata" ng-if="key != 'file'">{{key|capsname}}</th>

                                </tr>
                                <tr class="rowtr" ng-repeat="cv in cvslists">
                                    <td ng-show='cv.statusofsubmit'>
                                        <i ng-show='cv.statusofsubmit == "done"' class="fa fa-check text-success"></i>
                                        <i ng-show='cv.statusofsubmit == "fail"' class="fa fa-close text-danger"></i>
                                    </td>
                                    <td>
                                        <div style='width:50px; height:40px' class="button btn btn-info" ngf-select ng-model="cv.file" ngf-max-size="20MB">
                                            <i class="fa fa-upload"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control key " style="min-width:90px;" key="candidate_name" value="{{cv.candidate_name}}">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control key " style="min-width:90px;" key="mobile_no" value="{{cv.mobile_no}}">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control key " ng-disabled="true" style="min-width:90px;" key="email" value="{{cv.email}}">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control key " style="min-width:90px;" key="relevant_experiance" value="{{cv.relevant_experiance}}">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control key " style="min-width:90px;" key="qualification" value="{{cv.qualification}}">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control key " style="min-width:90px;" key="current_salary" value="{{cv.current_salary}}">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control key " style="min-width:90px;" key="location" value="{{cv.location}}">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control key " style="min-width:90px;" key="preferred_location" value="{{cv.preferred_location}}">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control key " style="min-width:90px;" key="current_designation" value="{{cv.current_designation}}">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control key " style="min-width:90px;" key="current_organization" value="{{cv.current_organization}}">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control key " style="min-width:90px;" key="expected_ctc" value="{{cv.expected_ctc}}">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control key " style="min-width:90px;" key="notice_period" value="{{cv.notice_period}}">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control key " style="min-width:90px;" key="overall_experiance" value="{{cv.overall_experiance}}">
                                    </td>
                                    <td ng-repeat="(key, value) in cv.extradata">
                                        <input type="text" class="form-control key " ng-disabled="key == 'email'" ng-if="key != 'file'" style="min-width:90px;" key="{{key}}"
                                               value="{{value}}">
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <div class="col-md-3 col-md-offset-9">
                            <div class="form-group ">
                                <input type="submit" class="form-control btn btn-info " ng-click="cvformdatapost()" id="submitcvs" value="Submit Cvs" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" id="assignCandidate">


        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" ng-click="cancel()" class="close" type="button">×</button>
                    <h4 class="modal-title">Assign Candidate</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-offset-2">{{clientsdepartment}}:</label>
                                    <div class="col-md-4">
                                        <select class="form-control e" n="Client" ng-change="getcandidatebyclient()" ng-model="copycandidate.client_detail_id" name="client_detail_id"
                                                required>
                                            <option value="{{client.id}}" ng-repeat="client in clientdetails">
                                                {{client.billingName}}
                                            </option>
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-sm-offset-2">Job:</label>
                                    <div class="col-md-4">
                                        <select class="form-control e" n="Job" ng-model="copycandidate.job_id">
                                            <option value="{{job.id}}" ng-repeat="job in jobslistbyclients">
                                                {{job.job_title}}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-offset-2">Owner</label>
                                    <div class="col-md-4">
                                        <select class="form-control e" n="Owner" ng-model="copycandidate.manager">
                                            <option value="{{profile.id}}">Self</option>
                                            <option value="{{x.id}}" ng-repeat="x in managers">
                                                {{x.name}}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-offset-2 col-md-3">
                                    <button type="submit" class="btn btn-block btn-primary" tar="#assignCandidate" ng-click="addtojobcandidates()">send</button>
                                    <div class='alert alert-success' ng-show='addtojobmessage.length>0'>
                                        {{addtojobmessage}}
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>


    <div class="modal fade" role="dialog" id="submit_cv_to_panel_status">


        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" ng-click="cancel()" class="close" type="button">×</button>
                    <h4 class="modal-title">Submit cv to panel</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" role="form">


                                <div class="form-group">
                                    <label class="col-md-3 ">Email:</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control e m" n="Email" ng-model="cv_to_panel.email"/>


                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 ">Subject:</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control e" n="Subject" ng-model="cv_to_panel.subject"/>


                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 ">Comment:</label>
                                    <div class="col-md-9">
                                        <textarea  class="form-control e" n="Comment" ng-model="cv_to_panel.comment">
                                        </textarea>


                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-block btn-primary validatebutton" validate tar="#submit_cv_to_panel_status" ng-click="sendCvToPanel()">send</button>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>

    <div class="modal" id="addvendor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="center">Add Vendor</h3>
                </div>
                <div class="modal-body">
                    <div layout-gt-xs="row">


                        <div class="col-md-6"> Name

                            <input type="text" ng-model="vendornew.name" class="form-control e" n="Name" />


                        </div>

                        <div class="col-md-6">Email

                            <input type="text" autocomplete="off" ng-model="vendornew.email" class="form-control m" n="Email" />
                        </div>

                        <!--                <md-input-container flex> <label>Name</label>     <input type="text" ng-model="vendornew.name" class="form-control e" n="Name"  />  </md-input-container>
                <md-input-container flex>       <input type="file" fileread="vendornew.profilepic" />  </md-input-container>-->


                    </div>
                    <br>
                    <!--            <div layout-gt-xs="row">
                                
                                <md-input-container flex> <label>Date of Birth</label>     
                                    <md-datepicker type="text" ng-model="vendornew.dob" required=""> </md-datepicker> 
                                </md-input-container>
                                <div  class="errorinline" style="" ng-show="true"><div>please enter Date of Birth !</div></div>
                            </div>-->

                    <div layout-gt-xs="row">
                        <!--                <md-input-container flex>-->

                        <div class="col-md-6"> Mobile Number
                            <input type="text" ng-model="vendornew.mobileNo" class="form-control n e" n="Mobile Number" />
                        </div>
                        <div class="col-md-6">Address
                            <input type="text" ng-model="vendornew.address" class="form-control n e" n="Address" />
                        </div>
                        <!--                <md-input-container flex> <label>Mobile No</label>     <input type="text" ng-model="vendornew.mobileNo" class="form-control n e" n="Mobile Number" />  </md-input-container>-->



                    </div>
                    <br>


                    <div class="row">
                        <div class="form-group">
                            <div class=" col-xs-offset-2 col-xs-10">
                                <button type="submit" class="btn btn-primary" tar="#addUser" ng-click="vendorsave()">Save</button>
                            </div>
                        </div>




                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- Assign End Job-->
    <div class="modal bs-example-modal-md" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="center">Send Mail
                        <span ng-class='countRowsinMyJob > 10 ? "text-danger" : "text - success"'> (CV Selected : {{countRowsinMyJob}})</span>
                    </h3>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">

                        <div class="form-group">

                            <div class="col-lg-10">
                                <select class="form-control m" ng-model="sendtracker.trackerno" n="Tracker NO" validate>
                                    <option value="{{tracker.id}}" ng-repeat="tracker in trackerlist">{{tracker.tracker_name}}</option>
                                </select>


                            </div>
                            <div class="col-lg-2 "><button ng-show="sendtracker.trackerno" type="button" ng-click="sendtrackermsg(true)" class="btn btn-primary btn-sm">Download</button></div>
                        </div>
                        <div class="form-group">

                            <div class="col-lg-10">
                                <input type="email" class="form-control m" ng-model="sendtracker.to" n="To" validate id="inputEmail4" placeholder="TO:">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-lg-10">
                                <input type="email" class="form-control m" ng-model="sendtracker.cc" n="CC" validate id="inputEmail5" placeholder="CC:">
                            </div>

                        </div>
                        <div class="form-group">

                            <div class="col-lg-10">
                                <input type="email" class="form-control m" n="BCC" validate ng-model="sendtracker.bcc" id="inputEmail5" placeholder="BCC:">
                            </div>

                        </div>


                        <div class="form-group">

                            <div class="col-lg-10">
                                <input type="file" class="form-control">
                                <!--                                <input type="text" class="form-control e" n=""  id="inputEmail5" placeholder="Subject:">-->
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-lg-10">
                                <input type="text" class="form-control e" n="" ng-model="sendtracker.subject" id="inputEmail5" placeholder="Subject:">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">

                                <textarea class="form-control e" n="message" contenteditable ng-model="sendtracker.message" placeholder="message" style="min-width: 100%; height: 87px;">
                                </textarea>
                            </div>
                        </div>

                        <button type="submit" ng-click="sendtrackermsg()" class="btn btn-primary btn-md">send</button>
                    </form>
                </div>

            </div>
        </div>

    </div>

    <div class="modal bs-example-modal-md" id="downloadtracker" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="center">Download Tracker
                        <span ng-class='countRowsinMyJob > 10 ? "text-danger" : "text - success"'> (CV Selected : {{countRowsinMyJob}})</span>
                    </h3>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">

                        <div class="form-group">

                            <div class="col-lg-10">
                                <select class="form-control m" ng-model="trackerno" n="Tracker NO" validate>
                                    <option value="{{tracker.id}}" ng-repeat="tracker in trackerlist">{{tracker.tracker_name}}</option>
                                </select>


                            </div>

                        </div>
                        <button type="button" ng-click="downloadtracker()" class="btn btn-primary btn-md">Download <i class="fa fa-download"></i></button>

                    </form>
                </div>

            </div>
        </div>

    </div>
  <div class="modal fade" role="dialog" id="activity">


        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" ng-click="cancel()" class="close" type="button">×</button>
                    <h4 class="modal-title text-danger">Activity</h4>
                </div>


                <div class="modal-body">
                    <div class="col-md-12" style="padding-top: 10px;" ng-repeat="x in activities">


                        <div class="media-left media-middle">
                            <a href="#">
                                <img style="width:50px; height: 50px" on-error-src="img/profilepic.png" src="{{x.profilepic}}" class="media-object img-circle img-bordered" alt="User Image">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">
                                <b>{{x.recruiter}}</b> changed status of
                                <i>
                                    <span class="text-red ">{{x.candidateName}} </span>
                                </i>  
                            </h4>
                            <div class="row">
                                <div class="col-md-8">Status :
                                    <b class="text-black">{{x.RootDisplayName}}/{{x.DisplayName}}</b>
                                </div>
                                <div class="col-md-4">Date :
                                    <b class="text-black ">{{x.created_at}}</b>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <b>Comment : </b> {{x.comment==''?'-':x.comment}}

                            </div>
                            <div class="clearfix"></div>

                        </div>
                        <hr>
                    </div>

                    <div class="alert alert-danger" ng-show="activities.length == 0">
                        No Activity!
                    </div>
                    <div class="clearfix"></div>

                </div>
            </div>
        </div>
        <!--End  Start Submit CV-->
    </div>
    <div class="modal fade" role="dialog" id="commentstatus">


        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" ng-click="cancel()" class="close" type="button">×</button>
                    <h4 class="modal-title text-danger ">Comment/Status </h4>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <form class="form-horizontal" role="form" name="userForm">
                            <div class="form-group" ng-show="showowner">
                                <label for="inputEmail" class="col-md-3  col-sm-offset-2">Owner</label>
                                <div class="col-md-4">
                                    <select class="form-control e" n="Owner" ng-model="commentstatus.recruiterid">
                                        <option value="{{profile.id}}">Self</option>
                                        <option value="{{manager.id}}" ng-repeat="manager in managers">
                                            {{manager.name}}
                                        </option>
                                    </select> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-sm-offset-2" select="">Status:</label>
                                <div class="col-md-6">
                                    <select class="form-control" style="width: 80%;" id="purpose" ng-change="purposechange()" ng-model="commentstatus.status" name="client_detail_id">
                                        <option selected="" value="{{currentstatusid}}">{{currentstatusname}}</option>
                                        <option value="{{x.id}}" isinterview="{{x.isinterview}}" ng-repeat="x in statuses">
                                            {{x.DisplayName}}
                                        </option>

                                    </select>
                                    <label ng-show="mp.btn_show_all_status" ><input type="checkbox" ng-change="comment()" ng-model="allstatus" />Override Status</label> 
                                <label><input type="checkbox" ng-model="commentstatus.noemail" ng-true-value="1" ng-false-value="0">No email/sms to candidate</label>
                                
                                </div>
                            </div>

                            <div id="business" style="display:none;">
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-offset-2">Date</label>
                                    <div class="col-md-4">

                                        <div class="input-group date" id="datetimepicker1">
                                            <input type="text" ng-model="commentstatus.reminderDate" class="form-control" name='reminderDate'>
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                        <!--                                                <md-datepicker ng-model="commentstatus.date" md-placeholder="Enter date"></md-datepicker>-->

                                    </div>

                                </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $('#datetimepicker1').datetimepicker();
                                    });
                                </script>
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-offset-2">Location</label>
                                    <div class="col-md-4">

                                        <input type="text" class="form-control" ng-model="commentstatus.location" placeholder="Location">



                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-sm-offset-2">Contact Person</label>
                                    <div class="col-md-4">

                                        <input type="text" class="form-control" ng-model="commentstatus.contactperson" placeholder="Contact Person">



                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-offset-2">Interviewer</label>
                                    <div class="col-md-4">

                                        <input type="text" class="form-control" ng-model="commentstatus.Interviewer" placeholder="Interviewer">



                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-offset-2">Mode of Interview</label>
                                    <div class="col-md-4">

                                        <input type="text" class="form-control"  ng-model="commentstatus.modeofinterview" placeholder="Mode of Interview" {{currentstatusname}} >
                                        <span >{{x.DisplayName}}</span>

                                    </div>

                                </div>

                                <label class="col-md-3 col-sm-offset-5">Interview Question</label>
                                <div class="col-md-12">

                                    <textarea class="form-control" ng-model="commentstatus.interviewquestion" style="width: 100%" contenteditable=""></textarea>

                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-sm-offset-2" referral="">Comment :</label>
                                <div class="col-md-5">
                                    <textarea class="form-control" ng-model="commentstatus.comment" placeholder="Comment" required=""></textarea>
                                </div>
                            </div>
                              <div class="form-group">
                                    <label class="col-md-3 col-sm-offset-2">reminder</label>
                                    <div class="col-md-4">

                                        <div class="input-group date" id="datetimepicker2">
                                            <input type="text" ng-model="commentstatus.reminderDate" class="form-control">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                             <script type="text/javascript">
                                    $(function () {
                                        $('#datetimepicker2').datetimepicker();
                                    });
                                </script>
                                        </div>
                                        <!--                                                <md-datepicker ng-model="commentstatus.date" md-placeholder="Enter date"></md-datepicker>-->
                                           
                                    </div>
<label style="margin-left: 250px;margin-top: 10px;"><input type="checkbox" ng-model="commentstatus.is_vendor_empanelment" ng-true-value="1" ng-false-value="0">Is Vendor Empanelment</label>
                                </div>
                            <div class="col-lg-offset-2 col-md-3">
                                <button type="submit" class="btn btn-block btn-primary" ng-click="updatestatuscommentmyjob()">Update</button>
                            </div>
                        </form>


                    </div>

                    <div class="clearfix"></div>
                </div>


            </div>
        </div>
        <!--End  Start Submit CV-->
    </div>
  
    <div class="modal fade" role="dialog" id="trackerDetailExtra">


        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" ng-click="cancel()" class="close" type="button">×</button>
                    <h4 class="modal-title text-danger">Tracker Data</h4>
                </div>


                <div class="modal-body">
                    <div class="col-md-12" style="padding-top: 10px;"  >

                        <div class="form-group">
                            <label>Resume Source:</label>
                            <input type="text" ng-model="trackerdatamyjob.resume_source" class="form-control"  >
                        </div>
                        <div class="form-group">
                            <label>Resume Source Name:</label>
                            <input type="text" ng-model="trackerdatamyjob.resume_source_name" class="form-control"  >
                        </div> <div class="form-group">
                            <label>Panel Shared Date(first):</label>
                            <input type="text" ng-model="trackerdatamyjob.panel_shared_date_first" class="form-control"  >
                        </div> <div class="form-group">
                            <label>Joining Date:</label>
                            <input type="text" ng-model="trackerdatamyjob.joining_date" class="form-control"  >
                        </div> <div class="form-group">
                            <label>Offered Release Date:</label>
                            <input type="text" ng-model="trackerdatamyjob.offered_release_date" class="form-control"  >
                        </div> <div class="form-group">
                            <label>Offered Fixed:</label>
                            <input type="text" ng-model="trackerdatamyjob.offered_fixed" class="form-control"  >
                        </div> <div class="form-group">
                            <label>Offered Retiral:</label>
                            <input type="text" ng-model="trackerdatamyjob.offered_retiral" class="form-control"  >
                        </div> <div class="form-group">
                            <label>Variable/Hotskills incentive:</label>
                            <input type="text" ng-model="trackerdatamyjob.variable_hotskills_incentive" class="form-control"  >
                        </div>
                        <div class="form-group">
                            <label>Actual Date of Joining:</label>
                            <input type="text" ng-model="trackerdatamyjob.actual_date_of_joining" class="form-control"  >
                        </div>
                        <div class="form-group">
                            <label>Recruitment Expense Po Type:</label>
                            <input type="text" ng-model="trackerdatamyjob.recruitment_expense_po_type" class="form-control"  >
                        </div>
                        <div class="form-group">
                            <label>Amount:</label>
                            <input type="text" ng-model="trackerdatamyjob.amount" class="form-control"  >
                        </div>
                        <div class="form-group">
                            <label>Relocation Expense:</label>
                            <input type="text" ng-model="trackerdatamyjob.relocation_expense" class="form-control"  >
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Save" ng-click="setatjidentitysave(trackerdatamyjob)" />
                        </div>

                    </div>


                    <div class="clearfix"></div>

                </div>
            </div>
        </div>
        <!--End  Start Submit CV-->
    </div>
</div>
