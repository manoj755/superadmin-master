  <div ng-controller='usersCtrl' ng-cloak="">
    <section class="content-header">
        <h1>
            Dashboard 
            <small>User Management</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content" id="addUser">

        <div ui-grid="gridOptions" ui-grid-selection ui-grid-pagination  ui-grid-cellnav ui-grid-exporter class="grid"></div>
      <div class="modal fade bd-example-modal-lg" id="myModal" role="dialog">
            <div class="modal-dialog">

                Password Change
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"> Password Change</h4>
                    </div>
                    <div class="modal-body">


                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="pwd">Change Password:</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" ng-model='newpassword' id="pwdc" placeholder="Change Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="pwd">Confirm Password:</label>
                                <div class="col-sm-8"> 
                                    <input type="password" class="form-control" ng-model='confirmpassword' id="pwd" placeholder="Confirm Password">
                                </div>
                            </div>

                            <div class="form-group"> 
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" ng-click='updatepassword()'  ng-disabled="!(newpassword.length > 0) || newpassword != confirmpassword"  class="btn btn-info">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
         <form class='col-md-12  alert alert-danger'><h2><span ng-show="isEditUser">Edit</span><span ng-hide="submit"></span> User Details</h2><div class='row'><div class='col-md-12'><div class="form-group">
            </div>
            <div class="row">
                <div class="col-md-4" >     <!-- ng-if="profile.app_id == 0"-->
                   <label> Application</label>
                    <select class="form-control" id="usersapp" ng-model="usernew.app_id" n="app" ng-change="loadmanager()">
                        <option ng-repeat="app in applications" value="{{app.id}}">
                            {{app.app_name}}
                        </option>
                    </select>

                </div>
                <div class="col-md-4"> 
                    <label> Role </label>
                    <select class="form-control e" n=" Role" validate  ng-change="changerole(profile.app_id)" ng-model="usernew.role_id">
                        <option ng-repeat="role in roles" value="{{role.id}}">
                            {{role.roleName}}
                        </option>
                    </select>

                </div>
               
                
                <div class="col-md-4">    
                    <label> Select Manager</label>
                    <select class="form-control"  n="Select Manager" ng-model="usernew.manager">
                        <option ng-repeat="x in users" value="{{x.id}}">
                            {{x.name}}
                        </option>
                    </select>

                </div>
                </div>
            
            

<div class="row">


                <div class="col-md-6"> <label>Name</label>     <input type="text" ng-model="usernew.name" class="form-control e" n="Name"  />  </div>
               <!-- <div class="col-md-6">     <input type="file" fileread="usernew.profilepic" class="col-md-6"/>  </div>-->


            
            <!--<div class="row">
                <div class="col-md-6"> 
                <label>Date of Birth</label>     
                    <md-datepicker type="text" ng-model="usernew.dob" required=""> </md-datepicker> 
                </div>
                <div  class="errorinline" style="" ng-show="true"><div>please enter Date of Birth !</div></div>
            </div>-->
           

                <div class="col-md-6"> <label>Email</label>     <input type="text" autocomplete="off" ng-model="usernew.email"  class="form-control m" n="Email" />  </div>
              

            </div>
            <div class="row">
                 <div class="col-md-6"> <label>Password</label>     <input type="password" autocomplete="off" ng-model="usernew.password" class="form-control e" validate n="Password" />  </div>
                <div class="col-md-6">   
                    <label>Gender</label> 
                    <select class="form-control e"  ng-model="usernew.gender"  n="Gender"  validate>
                        <option ng-repeat="x in genders" value="{{x.id}}">
                            {{x.gender_name}}
                        </option>
                    </select>

                </div>
                <div class="col-md-6"> <label>Mobile No</label>     <input type="text" ng-model="usernew.mobileNo" class="form-control n e" n="Mobile Number" />  </div>



            </div>
            <!--<div class="row">
<div class="col-md-6">

                <label>Phone No</label>   
                      <input type="text" ng-model="usernew.phoneNo"class="form-control  e" n="Phone Number" />  
                </div>
                <div class="col-md-6">

                <label>Location</label>   
                   <input type="text" ng-model="usernew.location" class="form-control e" n="Location" />            
                 </div>
                 </div>

            <div class="row">
            <div class="col-md-6">
            <label>Address</label>    <input type="text" ng-model="usernew.address"class="form-control  e" n="Address" /> 
            </div>
                <div class="col-md-6">
                    <label>Country</label>

                    <select class="form-control"  ng-model="usernew.country" n="Country" >
                        <option ng-repeat="x in countries" value="{{x.id}}">
                            {{x.name}} ({{x.country_code}})
                        </option>
                    </select>

                

            </div>
            </div>
            <div class="row">
            <div class="col-md-6">
                          <label>State</label>      
                <input type="text" ng-model="usernew.state" class="form-control  e" n="State" /> 
                </div>
                <div class="col-md-6">
               <label>City</label>       
               <input type="text" ng-model="usernew.city" class="form-control  e" n="City" />  
</div>
            </div>-->


            
                <button type="button" class="md-raised validate btn btn-default" style="margin-top:20px;" ng-show="isEditUser" ng-click="Userupdate()">Update</button>
                <button type="button" class="md-raised validate btn btn-default" style="margin-top:20px;" ng-show="isEditUser" ng-click="Userback()">Back</button>
                <button type="submit" id="submit" class="md-raised validate btn btn-default center-block" tar="#addUser" ng-click="usersave()" style="margin-top:3%;width:120px">Submit</button>

            

        </form>


    </section>


</div>




<!--<div ng-controller='usersCtrl' ng-cloak="">
<section class="content-header">
        <h1>
            Dashboard 
            <small>User Management</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

</div>-->