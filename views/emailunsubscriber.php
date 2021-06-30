<div ng-controller='emailunsubscriberCtrl' ng-cloak="">
    <section class="content-header">
        <h1>
            Dashboard 
            <small>Email Unsubscriber</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"> Email Unsubscriber</li>
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
        <!--<form name="userForm">

            <div layout-gt-xs="row">
                <md-input-container flex> <label>Role</label>     
                    
                    <md-select ng-model="user.role_id">
                        <md-option ng-repeat="role in roles" value="{{role.id}}">
                            {{role.roleName}}
                        </md-option>
                    </md-select>

                </md-input-container>
                <md-input-container flex> <label>Name</label>     <input type="text" ng-model="user.name" required=""/>  </md-input-container>
                <md-input-container flex> <label>Profile Pic</label>     <input type="file" fileread="user.profilepic" />  </md-input-container>


            </div>
            <div layout-gt-xs="row">
                <md-input-container> <label>Date of Birth</label>     
                    <md-datepicker type="text" ng-model="user.dob" required=""> </md-datepicker> 
                </md-input-container>
            </div>
            <div layout-gt-xs="row">

                <md-input-container> <label>Email</label>     <input type="text" ng-model="user.email"/>  </md-input-container>
                <md-input-container> <label>Password</label>     <input type="text" ng-model="user.password"/>  </md-input-container>

            </div>
            <div layout-gt-xs="row">
                <md-input-container> <label>Gender</label>     <input type="text" ng-model="user.gender"/>  </md-input-container>
                <md-input-container> <label>Mobile No</label>     <input type="text" ng-model="user.mobileNo"/>  </md-input-container>



            </div>
            <div layout-gt-xs="row" layout-xs="column">


                <md-input-container> <label>phoneNo</label>     <input type="text" ng-model="user.phoneNo"/>  </md-input-container>

                <md-input-container> <label>Location</label>     <input type="text" ng-model="user.location"/>  </md-input-container>            </div>
            <div layout-gt-xs="row">
                <md-input-container> <label>Address</label>     <input type="text" ng-model="user.address"/>  </md-input-container>

                <md-input-container> <label>Country</label>     <input type="text" ng-model="user.country"/>  </md-input-container>


            </div>
            <div layout-gt-xs="row">

                <md-input-container> <label>State</label>     <input type="text" ng-model="user.state"/>  </md-input-container>
                <md-input-container> <label>City</label>     <input type="text" ng-model="user.city"/>  </md-input-container>

            </div>


            <div layout-gt-xs="row">
                <md-button type="submit" class="md-raised" ng-click="usersave()">Submit</md-button>

            </div>
             
        </form>-->
        <hr>
        <div class="container">
            <div class="row">
                <div class="bs-example" id="messagetemp">
                    <form class="form-horizontal">

                   
                        
                        <div class="form-group">
                            <label for="titile" class="control-label col-md-2">Email</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control e" n="Template Name" ng-model="message.email" id="titile" >
                            </div>
                        </div>
                       
                       
                        </div>




                        <div class="form-group">
                            <div class=" col-xs-offset-2 col-xs-10">
                                <button type="submit" class="btn btn-primary" tar="#messagetemp" ng-hide="isEdit" ng-click="messagesave()">Save</button>
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