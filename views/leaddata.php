
<style>

    .ui-grid-header-canvas{
        background-color: rgb(70, 81, 99);
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
        background-color: rgb(244, 247, 234);
        color: #0c0c0c;
        border-radius: 0px;
    }
    .btnnew4 {
        background-color: rgb(70, 81, 99);
        color: #fff;
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
<div ng-controller='leaddataCtrl'>
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h3>
            Internal Lead Database
            <!--<small></small>-->
        </h3>
        <!--<ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>-->
    </section>
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
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->

        <!--        <div class="col-md-12">
                    <div class="centered max-width try-search scroll-section" data-section-label="Try search" style="top:0px;margin:0px;padding:5px;">
                        <form id="search_form" name="search_form" onsubmit="return false;">
                            <input ng-model="smartsearch.keyword"  data-g-action="URL Entry" data-g-event="Search: Products" data-g-label="Site Search: Sample Search" id="search_url" name="search_url" value="" placeholder="Keyword" type="text">
                            <input ng-model="smartsearch.location"  data-g-action="Search Text Entry" data-g-event="Search: Products" data-g-label="Site Search: Sample Search" id="search_term" name="search_term" placeholder="Location" type="text">
                            <input class="maia-button" ng-click="getCandidateDetails()" data-g-action="Search Button" data-g-event="Search: Products" data-g-label="Site Search: Sample Search" id="search_submit" type="submit" value="Search">
                        </form>
        
        
                    </div>
        
                </div>-->


        <div class="col-md-4 hidden">
            <div class="row" id="sendMessagew">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form method="post">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Keywords</label>
                                <input type="text" class="form-control e"  n=" a Keywords"   ng-model="detailedsearch.keyword" id="formGroupExampleInput" placeholder="Keywords">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Key Skills</label>
                                <input type="text" class="form-control  e"  n=" key Skills" id="Keyword"  ng-model="detailedsearch.keyskills" id="formGroupExampleInput2" placeholder="Key Skills">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Experience</label><br>
                                <input type="number" id="replyNumber" class="e"  validate n="Maximum Experience " id="exp" ng-model="detailedsearch.minexperience" min="0" data-bind="value:replyNumber" placeholder="max"/>
                                <input type="number" id="replyNumber" class="e" validate n="Minimum Experience " id="min" ng-model="detailedsearch.maxexperience" min="0" data-bind="value:replyNumber" placeholder="Min" />
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Salary</label><br>

                                <input type="number" id="replyNumber" class="e" validate n="Minimum Salary " id="minsalary" min="0" ng-model="detailedsearch.minsalary" data-bind="value:replyNumber" placeholder="max"/>


                                <input type="number" id="replyNumber" class="e" validate n="Minimum Salary " id="minsalary" min="0" ng-model="detailedsearch.maxsalary"  data-bind="value:replyNumber" placeholder="Min" />

                            </div>
                            <!--                            <div class="form-group">
                                                            <select class = "form-control input-sm">
                                                                <option value = "">UG Qualification</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <select class = "form-control input-sm">
                                                                <option value = "">PG Qualification</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <select class = "form-control input-sm">
                                                                <option value = "">Industry</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <select class = "form-control input-sm">
                                                                <option value = "">Funcation Area</option>
                                                            </select>
                                                        </div>-->
                            <div class="form-group">
                                <button type="submit" class="btn btn-success validate"   tar="#sendMessagew" ng-click="getCandidateDetailsdetaileds()" >submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12" style="background-color:#fff;">
            <!-- Example split danger button -->
            <div class="row">
                <div class="col-md-4 col-sm-8 hidden">

                    <button type="button"  class="btn btn-block btn-primary btn-md"  data-toggle="modal" data-target="#myModal-2">Email</button>

                    <!--<div ng-include="'views/partialviews/sendEmailForm.html'"></div>-->
                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal-2" class="modal fade">
                        <div class="modal-dialog" id="internalemail">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                    <h4 class="modal-title">Email</h4>
                                </div>
                                <div class="modal-body">

                                    <form class="form-horizontal" role="form">
                                        <div class="form-group">

                                            <div class="col-lg-10">
                                                <input type="text" ng-model="sendemailmodel.prmTo" class="form-control m" n="To" validate id="inputEmail4" placeholder="TO:">
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <div class="col-lg-10">
                                                <input type="text"  ng-model="sendemailmodel.prmCC" class="form-control m" n="CC" validate id="inputEmail5" placeholder="CC:">
                                            </div>

                                        </div>
                                        <div class="form-group">

                                            <div class="col-lg-10">
                                                <input type="text" class="form-control m" n="BCC" validate  ng-model="sendemailmodel.prmBCC" id="inputEmail5" placeholder="BCC:">
                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <div class="col-lg-10">
                                                <input type="file" class="form-control"  ng-model="sendemailmodel.prmAttachment" id="upload" placeholder="Attechment">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-10">

                                                <select class="form-control m-bot15" ng-model="sendmailselected"  ng-options="x.title for x in emailmessagetemplates" name="emailmessagetemplate_id">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <div class="col-lg-10">
                                                <input type="text" class="form-control e" n=""  ng-model="sendemailmodel.prmSubject"  id="inputEmail5" placeholder="Subject:">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12 col-sm-12 col-xs-12">

                                                <textarea class="form-control e" n="message" id="textareaemail" placeholder="message"  ng-model="sendemailmodel.prmMessagge" style="min-width: 100%; height: 87px;">
{{emailselected.message}}</textarea>
                                            </div>
                                        </div>

                                        <button type="submit"  class="btn btn-primary btn-md" tar="#internalemail" ng-click="sendemailform()">send</button>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-4 " ng-show="mp.btn_take_internal_refeference">

                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal-3" class="modal fade">
                        <div class="modal-dialog" id="getrefer">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                    <h4 class="modal-title">Get References/Send Mail to Candidates</h4>
                                </div>  
                                <div class="modal-body">
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label for="inputEmail" class="control-label col-xs-2">{{clientsdepartment}}:</label>
                                            <div class="col-xs-10">
                                                <select class="form-control m-bot15 e" n="Client" ng-change="getcandidatebyclient()" ng-model="myjob.client_detail_id" name="client_detail_id">
                                                    <option value="{{x.id}}" ng-repeat="x in clients">{{x.billingName}}</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword" class="control-label col-xs-2">Jobs:</label>
                                            <div class="col-xs-10">
                                                <select class="form-control m-bot15 e" n="Job" ng-model="myjob.add_new_job_id" name="add_new_job_id">
                                                    <option  value="{{x.id}}"  ng-repeat="x in jobslistbyclients">{{x.job_title}}</option>

                                                </select>
                                            </div>
                                        </div>

                                        <ul class="nav nav-tabs">
                                            <li class="active" ><a href="" ng-click="smsTabs(0)" data-toggle="tab">SMS<i class="fa"></i></a></li>
                                            <li><a href=""   ng-click="smsTabs(1)" data-toggle="tab">Send Mail <i class="fa"></i></a></li>
                                        </ul>

                                        <div class="tab-content">
                                            <div class="tab-pane active"  ng-show="tabindex == 0"  ng-hide="tabindex != 0" id="info-tab">

                                                <div class="form-group">
                                                    <div class="col-sm-12">

                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" ng-model="sendsms" value="">
                                                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                                Send Sms..
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <select class="form-control m-bot15" ng-model="smsselected" ng-change='setsms()'  ng-options="x.templatename for x in smsmessagetemplates" name="smsmessagetemplate_id">

                                                        </select>

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <textarea class="form-control" ng-model="sms.prmMessagge" style="width: 100%;">{{smsselected.message}}</textarea>

                                                    </div>
                                                </div>
                                            </div>
                                            <div ng-show="tabindex == 1" ng-hide="tabindex != 1" class="tab-pane active" id="address-tab">


                                                <div class="form-group">
                                                    <div class="col-sm-12">

                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" ng-model="sendemail" value="">
                                                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                                Send Mail
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">

                                                        <select class="form-control m-bot15" ng-model="emailselected" ng-change='setemail()' ng-options="x.templatename for x in emailmessagetemplates" name="emailmessagetemplate_id">

                                                        </select>

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <textarea class="form-control" style="width: 100%;" ng-model="myjob.prmSubject">{{emailselected.title}}</textarea>

                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <textarea contenteditable  class="form-control" style="width: 100%;" ng-model="myjob.prmMessagge">{{emailselected.message}}</textarea>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-offset-2 col-xs-10">
                                                <button type="submit" tar="#getrefer" class="btn btn-primary"   ng-click="sendMessage()">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-2">
                    <div class="dropdown pull-right">
                        <button class="btn btn-defualt dropdown-toggle" type="button" data-toggle="dropdown"> <span class="label label-success"><i class="fa fa-bell-o"></i> {{leadnotification.length}}</span>
                            <span class="caret"></span></button>

                        <ul class="dropdown-menu" style="width:600px; overflow: auto; max-height: 400px; ">

                            <li>
                                <!-- inner menu: contains the actual data -->


                                <div class="list-group">
                                    <button type="button" class="list-group-item active"> <span class="badge">{{leadnotification.length}}</span>Notification</button>

                                    <span href="#" help="{{x.difference}} hour(s)" class="list-group-item" ng-repeat="x in leadnotification" > 

                                        <a  data-toggle="modal" href="#"    
                                            class="Bold" > {{x.candidateName}}</a> <i  class="fa fa-star text-danger"></i> ->  
                                        <a href="#" style="color:gray; text-decoration: underline;" >{{x.comment}} </a>

                                        <a href="javascript:"  ng-if="x.pipeline_id" target="#commentstatus" data-toggle="modal"   ng-click="comment(x)" >
                                            <span class="link-black i"><i class="fa fa-files-o fa-lg"></i> {{x.current_status}}</span>
                                        </a>
                                        <span class="pull-right"> (<i>{{x.reminderDate}}</i>)</span> 
                                    </span>

                                </div>


                            </li>
                            <!--                                    <li class="footer"><a href="#">View all</a></li>-->
                        </ul>

                    </div>
                </div>
                <div class="col-md-2"  ng-show="mp.add_to_job_store">

                    <button type="button"  class="btn   btn-default btn-md" ng-show="filter == 'no_status'"  data-toggle="modal" data-target="#myModal-4">Add To Pipeline</button>

                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal-4" class="modal fade">
                        <div class="modal-dialog" id="client">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                    <h4 class="modal-title">Add to Pipeline</h4>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal">

                                        <div class="form-group">
                                            <label for="Jobs" class="control-label col-xs-2">Owner</label>
                                            <div class="col-xs-10">
                                                <select class="form-control e" n="Owner" ng-model="addnewjob.manager"  >
                                                    <option value="{{profile.id}}">Self</option>
                                                    <option value="{{x.id}}" ng-repeat="x in managers">
                                                        {{x.name}}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" ng-if="false">
                                            <label for="Jobs" class="control-label col-xs-2">Status</label>
                                            <div class="col-xs-10">
                                                <select class="form-control e" n="Owner" ng-model="addnewjob.status"  >

                                                    <option value="{{x.id}}"  ng-repeat="x in allstatusesdefaultdata">
                                                        {{x.DisplayName}}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- <div class="form-group">
                                             <label for="Status" class="control-label col-xs-2">Status:</label>
                                             <div class="col-xs-10">
                                                <select class="form-control m-bot15">
                                                                                   <option>Status</option>
                                                                                   <option>Option 2</option>
                                                                                   <option>Option 3</option>
                                                                               </select>
                                             </div>
                                         </div>-->
                                        <div class="form-group">
                                            <div class="col-md-4 col-md-offset-4">
                                                <button type="submit"  class="btn btn-primary btn-block"  tar="#client" ng-click="addtojobcandidates()">Add</button>
                                            </div>

                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-2 col-sm-12 validate">
                        <a class="btn btn-default"  href="" data-toggle="modal" help='Add Candidate' data-target="#addcandidate" ng-if="mp.candidate_detail_store">
                            Add
                        </a> 
                        <div id="addcandidate" class="modal fade " role="dialog">
                            <div class="modal-dialog modal-lg">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Add Candidate</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p><div class="col-md-12 ">
                                            <form class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <label for="name" class ="control-label col-sm-4">Full Name</label>
                                                    <div class="col-sm-7">                   
                                                        <input type="text" ng-model="store.candidateName" class="form-control e" validate  id="name" placeholder="Enter name">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="address" class ="control-label col-sm-4">Gender</label>
                                                    <div class="col-sm-7">
                                                        <div >
                                                            <select ng-model="store.gender" class="form-control">
                                                                <option ng-repeat="x in genders" value="{{x.id}}">
                                                                    {{x.gender_name}}
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="mobileNo" class="control-label col-sm-4">Mobile Number</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control e no" validate n="Mobile" ng-model="store.mobileNo" id="mobileNo" placeholder="Mobile Number">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="email" class="control-label col-sm-4">Email</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control e m" validate n="Email" ng-model="store.email" id="email" placeholder="Email">
                                                    </div>
                                                </div>
                                                <!--                                            <div class="form-group">
                                                                                                <label for="panNo" class="control-label col-sm-4">Pan No</label>
                                                                                                <div class="col-sm-7">
                                                                                                    <input type="text" class="form-control e" n="Pan Number"  ng-model="store.panNo" id="panNo" placeholder="Pan No">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="industryType" class="control-label col-sm-4">Industry Type</label>
                                                                                                <div class="col-sm-7">
                                                                                                    <input type="text" class="form-control e" n="Industry" ng-model="store.industryType" id="industryType" placeholder="Industry Type">
                                                                                                </div>
                                                                                            </div>
                                                
                                                                                            <div class="form-group">
                                                                                                <label for="functionalArea" class="control-label col-sm-4">Functional Area</label>
                                                                                                <div class="col-sm-7">
                                                                                                    <input type="text" class="form-control e" n="Functional Area" ng-model="store.functionalArea" id="functionalArea" placeholder="functionalArea">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="functionalArea" class="control-label col-sm-4">D.O.B</label>
                                                                                                <div class="col-sm-7">
                                                                                                    <input type="date" ng-model="store.dob" name="contactDurationStart" md-placeholder="Date of Birth" class="form-control" />
                                                                                                </div>
                                                                                            </div>
                                                
                                                
                                                                                            <div class="form-group">
                                                                                                <label for="Key Skills" class="control-label col-sm-4">Key Skills</label>
                                                                                                <div class="col-sm-7">
                                                                                                    <input type="text" class="form-control vn" n="Key Skills" ng-model="store.keySkills" id="Salary" placeholder="Key Skills">
                                                                                                </div>
                                                                                            </div>
                                                
                                                                                            <div class="form-group">
                                                                                                <label for="function" class="control-label col-sm-4">Function</label>
                                                                                                <div class="col-sm-7">
                                                                                                    <input type="text" class="form-control e" n="Function"  id="Function" placeholder="function">
                                                                                                </div>
                                                                                            </div>-->
                                                <div class="form-group" ng-hide="true">
                                                    <label for="source" class="control-label col-sm-4">Source</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control " ng-model="store.source" value="0" id="source" placeholder="Source">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="resume" class="control-label col-sm-4">Resume</label>
                                                    <div class="col-sm-7">

                                                        <iframe class="form-control" style="border:0; height: 45px; overflow: hidden;" src="views/uploadresume.php" id="uploadResume"></iframe>
                                                    </div>
                                                </div>

                                                <div class="form-group">

                                                    <div class="col-md-4 col-md-offset-4">
                                                        <button  class="btn btn-success btn-md btn-block validate" tar="#addLead" ng-click="leadsave()" >Save</button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-1">
                        <label for="upload">Upload:</label>
                        <span  class="form-control" id="upload"><i ngf-accept='"application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"' ngf-pattern='"application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"' data-toggle="tooltip" ngf-select="upload($file)" title="Upload CVs(Excel)"  class="fa fa-upload fa-2x"></i></span>
                    </div>
                    <div class='col-md-2'>
                        <a class="quick-btn hidden" href="javascript:" help='call'   data-target='#calldiv' style=' color:green !important; '  data-toggle='modal' ng-if="mp.btn_can_call" >
                            <i class="fa fa-phone fa-2x"></i>

                        </a> 
                    </div>


                </div>
            </div>
            <div id="calldiv" class="modal " role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Call</h4>
                        </div>
                        <div class="modal-body">
                            <p><div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label for="Client" class="control-label col-xs-2">{{clientsdepartment}}:</label>
                                            <div class="col-xs-8">
                                                <select class="form-control e" n="Client"  ng-change="getcandidatebyclient(true)" ng-model="copycandidate.client_detail_id"  name="client_detail_id" required>
                                                    <option  value="{{x.id}}"  ng-repeat="x in clients">{{x.billingName}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Jobs" class="control-label col-xs-2">Jobs:</label>
                                            <div class="col-xs-8">
                                                <select class="form-control e" n="Jobs" ng-model="copycandidate.job_id"  >
                                                    <option value="{{job.id}}" ng-repeat="job in jobslistbyclients">
                                                        {{job.job_title}} ({{job.id}})
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Jobs" class="control-label col-xs-2">Owner</label>
                                            <div class="col-xs-8">
                                                <select class="form-control e" n="Owner" ng-model="copycandidate.manager"  >
                                                    <option value="{{profile.id}}">Self</option>
                                                    <option value="{{x.id}}" ng-repeat="x in managers">
                                                        {{x.name}}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-4 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary btn-block" tar="#addjob"  ng-click="sendcalltocandidates()">Place in Queue</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
            <hr class="hrstye">
            <div class="row">
                <div class="col-md-12">


                    <div class="box-body chat" id='internaldata' >
                        <div class="clearfix"></div>
                        {{gridOptions.selectedItems}}
                        <div class="input-group">
                            <div class="input-group-btn search-panel">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    <span id="search_concept">Search </span>  
                                </button>
                                <!--                        <ul class="dropdown-menu" role="menu">
                                                            <li><a href="" ng-click="filterdropdownfunction('my_candidates', 'My Candidates')">My Candidates</a></li>
                                                            <li><a href="" ng-click="filterdropdownfunction('my_referrals', 'My referrals')">My referrals</a></li>
                                                            <li><a href="" ng-click="filterdropdownfunction('jobs', 'Jobs')">Jobs</a></li>
                                
                                                        </ul>-->
                            </div>

                            <input type="text" class="form-control" ng-change="getCandidate()" ng-model="searchcandidatetext"  placeholder="Search...">
        <!--                    <span class="input-group-btn">
                                <button class="btn btn-default" ng-click="filterbyJob()" type="button"><span class="glyphicon glyphicon-search"></span></button>
                            </span>-->
                        </div> 
                        <div>

                            <div class="text-right">
                                <input type="button" ng-click="toggleexport()" class="btn btn-sm btn-default " value="Change format to export" />
                            </div>
                            <!--  
                            <div ui-grid="gridOptions" ui-grid-selection ui-grid-pagination  ui-grid-cellnav ui-grid-exporter class="grid"></div>-->
                            <div style="margin-bottom:42px;">
                                <ul class="nav nav-tabs showloader pull-left  ">
                    <!--<li class="active"><a data-toggle="tab" href="#"  ng-click='changefilter("All","client_status")' class="btn btn-primary">All <span class="badge ng-binding" >{{item.interested}}</span></a></li>-->
                                    <li><a href="" data-toggle="tab" ng-click='changefilter("no_status", "is_my_lead")' class="btn btn-primary">New Leads</a></li>
                                    <!--<li><a href="" data-toggle="tab" ng-click='changefilter("New Leads", "job_status")' class="btn btn-primary">New Leads</a></li>-->
                                    <li><a href="" data-toggle="tab" ng-click='changefilter("Call_Status", "job_status")' class="btn btn-primary">Call Status</a></li>
                                    <li><a href="" data-toggle="tab" ng-click='changefilter("VE Prospect", "ve_prospect")' class="btn btn-primary">VE Prospect</a></li>
                                    <li><a href="" data-toggle="tab" ng-click='changefilter("VE Prospect no status", "ve_prospect_no_status")' class="btn btn-primary">VE Prospect no status</a></li>
                                    <li><a href="" data-toggle="tab" style="background:#ddf295; color:#251e22;" ng-click='changefilter("Negative", "negative")' class="btn btn-primary">Negative</a></li>


                                </ul>
                            </div>
                            <div ui-grid="gridOptionsloadcandidatesInPopUp" ui-grid-selection ui-grid-pagination ui-grid-cellnav ui-grid-exporter ui-grid-resize-columns
                                 ui-grid-move-columns ui-grid-exporter ui-grid-selection ui-grid-pinning class="grid">
                            </div>

                            <div class="loadmore">
                                <div ng-show="loaderMore_s" ng-class="result">
                                    <img src="~/Content/ng-loader.gif" />
                                    {{lblMessage}}
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <div role="contentinfo" class="ui-grid-pager-panel_stop  custompagerclr ng-scope">
                                <div role="navigation" class="ui-grid-pager-container">
                                    <div role="menubar" class="ui-grid-pager-control">
                                        <!-- Start Page -->
                                        <button type="button" role="menuitem" class="ui-grid-pager-first" ui-grid-one-bind-title="aria.pageToFirst"

                                                ui-grid-one-bind-aria-label="aria.pageToFirst"

                                                ng-click="pagination.firstPage()"

                                                ng-disabled="cantPageBackward()" title="Page to first" aria-label="Page to first"

                                                disabled="disabled">
                                            <div class="first-triangle">
                                                <div class="first-bar"></div>
                                            </div>
                                        </button>

                                        <!-- Prev Page -->
                                        <button type="button" role="menuitem" class="ui-grid-pager-previous"

                                                ui-grid-one-bind-title="aria.pageBack" ui-grid-one-bind-aria-label="aria.pageBack"

                                                ng-click="pagination.previousPage()"

                                                ng-disabled="cantPageBackward()" title="Page back" aria-label="Page back" disabled="disabled">
                                            <div class="first-triangle prev-triangle"></div>
                                        </button>

                                        <input type="number" ui-grid-one-bind-title="aria.pageSelected" ui-grid-one-bind-aria-label="aria.pageSelected"

                                               class="ui-grid-pager-control-input ng-pristine ng-untouched ng-valid ng-not-empty ng-valid-min ng-valid-max ng-valid-required"

                                               ng-model="pagination.pageNumber"

                                               min="1" max="{{pagination.getTotalPages()}}" required="" title="Selected page"

                                               aria-label="Selected page" disabled>

                                        <span class="ui-grid-pager-max-pages-number ng-binding"

                                              ng-show="pagination.getTotalPages() > 0">
                                            <abbr ui-grid-one-bind-title="paginationOf" title="of"> /</abbr>{{pagination.getTotalPages()}}
                                        </span>

                                        <!--End  Start Submit CV-->
                                        <!-- Next Page -->
                                        <button type="button" role="menuitem" class="ui-grid-pager-next" ui-grid-one-bind-title="aria.pageForward"

                                                ui-grid-one-bind-aria-label="aria.pageForward"

                                                ng-click="pagination.nextPage()"

                                                ng-disabled="cantPageForward()"

                                                title="Page forward" aria-label="Page forward">
                                            <div class="last-triangle next-triangle"></div>
                                        </button>

                                        <!-- Last Page -->
                                        <button type="button" role="menuitem" class="ui-grid-pager-last"

                                                ui-grid-one-bind-title="aria.pageToLast" ui-grid-one-bind-aria-label="aria.pageToLast"

                                                ng-click="pagination.lastPage()" ng-disabled="cantPageToLast()" title="Page to last" aria-label="Page to last">
                                            <div class="last-triangle"><div class="last-bar"></div></div>
                                        </button>
                                    </div><!-- ngIf: grid.options.paginationPageSizes.length > 1 -->

                                    <div class="ui-grid-pager-row-count-picker ng-scope" @*ng-if="pagination.ddlpageSize.length > 1"*@>
                                        <select ng-model="pagination.ddlpageSize"

                                                ng-options="o as o for o in pagination.paginationPageSizes" ng-change="pagination.pageSizeChange()"

                                                class="ng-pristine ng-untouched ng-valid ng-not-empty"></select>
                                        <span class="ui-grid-pager-row-count-label ng-binding">&nbsp;items per page</span>
                                    </div>
                                    <!-- end ngIf: grid.options.paginationPageSizes.length > 1 -->
                                    <!-- ngIf: grid.options.paginationPageSizes.length <= 1 -->
                                </div>
                                <div class="ui-grid-pager-count-container">
                                    <div class="ui-grid-pager-count">
                                        <span ng-show="pagination.totalItems > 0" class="ng-binding" style="">
                                            {{pagination.pageNumber}}<abbr ui-grid-one-bind-title="paginationThrough" title="through"> - </abbr>{{pagination.ddlpageSize}} of {{pagination.totalItems}} items
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <p>{{SelectedRow}}</p>
                        </div>
                        <!--                  <div ng-include="'views/partialviews/candidate.html'"></div>-->
                        <!-- /.item -->

                        <!-- /.item -->
                        <!-- chat item -->

                        <!-- /.item -->
                        <!-- chat item -->







                        <!-- /.item -->
                    </div>
                </div>

            </div>
            <!-- <nav aria-label="Page navigation">
              <ul class="pagination">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>       -->

        </div>

        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
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
                                                <input type="text" ng-model="commentstatus.date" class="form-control">
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
                                    <label class="col-md-3 col-sm-offset-2">Reminder</label>
                                    <div class="col-md-4">

                                        <div class="input-group date" id="datetimepicker2">
                                            <input type="text" ng-model="commentstatus.reminderDate" class="form-control" name="reminderDate" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                        <script type="text/javascript">
                                                    $(function () {
                                                        $('#datetimepicker2').datetimepicker();
                                                    });
                                        </script>
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

    </section>
    <!-- /.content -->


</div>
<style type="text/css">
    .ui-grid-row:nth-child(even) .ui-grid-cell {
        background-color: transparent !important;
    }
</style>