<div ng-controller='crmMessageTemplatesCtrl' ng-cloak="">
    <section class="content-header">
        <h1>
            Dashboard 
            <small>Message Template</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div ui-grid="gridOptions" ui-grid-selection ui-grid-pagination  ui-grid-cellnav ui-grid-exporter class="grid"></div>


        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">MessageTemplate</h4>
                    </div>
                    <div class="modal-body">
                        <p><div ui-grid="gridShowMessageTemplate" ui-grid-selection ui-grid-pagination  ui-grid-cellnav ui-grid-exporter class="grid"></div></p>
                        <!--         <div class="col-md-4">
                                <ul class="list-unstyled">
                                    <li> <a href="" class="name">{{row.entity.templateType}}</a></li>
                                    <li>{{row.entity.title}}</li>
                                   </ul></div>-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    </div>
                </div>

            </div>
        </div>

        <hr>
        <div class="container">
            <div class="row">
                <div class="bs-example" id="messagetemp">
                    <form class="form-horizontal">

                        <div class="form-group">
                            <label for="" class="control-label col-md-2">Template Type</label>
                            <div class="col-md-6">
                                <select class="form-control e" id="temp" n="SMS/Email" ng-model="message.templateType">
                                    <option>SMS</option>
                                    <option>Email</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label col-md-2">Template Area</label>
                            <div class="col-md-6">
                                <select class="form-control e" id="Template" n="area" ng-model="message.templatearea">
                                    <option>For Reference</option>      
                                    <option value="cs" >Candidate Status</option>      
                                    <option value="rs" ng-if="profile.app_id=='6'">Referrer Status</option>     
                                    <option value="job_status">Job Status</option>
                                    <option value="misc">Misc.</option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="titile" class="control-label col-md-2">Template Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control e" n="Template Name" ng-model="message.templatename" id="titile" >
                            </div>
                        </div>
                        <div class="form-group" ng-show="message.templateType=='Email'">
                            <label for="titile" class="control-label col-md-2">Subject</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" n="Subject" ng-model="message.title" id="titile" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="titile" class="control-label col-md-2">Message</label>
                            <div class="col-md-6">
                                <b class="text-danger">Please use lowercase for key between #valuetoreplace# otherwise value will not be replaced.</b>
                                <textarea class="form-control e" id="msg" contenteditable n="Message" ng-model="message.message" style="width: 100%"></textarea>


                            </div>
                        </div>




                        <div class="form-group">
                            <div class=" col-xs-offset-2 col-xs-10">
                                <button type="submit" class="btn btn-primary " tar="#messagetemp" ng-hide="isEdit" ng-click="messagesave()">Save</button>
                                <button type="button" class="btn btn-primary" tar="#messagetemp" ng-show="isEdit" ng-click="messageupdate()">Update</button>
                                <button type="button" class="btn btn-primary" tar="#messagetemp" ng-show="isEdit" ng-click="back()">Back</button>
                            </div>
                        </div>






                    </form>
                </div>
            </div>

        </div>
    </section>


</div>