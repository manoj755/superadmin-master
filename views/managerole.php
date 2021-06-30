<div ng-controller='manageroleCtrl' ng-cloak="">
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
    <section class="content">


        <form name="userForm">

            <div class="row">
                <div class="col-md-3"> <label>Role</label>     

                    <select class="form-control" ng-model="role.role_id" ng-change="getrolefunction()">
                        <option ng-repeat="role in roles" value="{{role.id}}">
                            {{role.roleName}}
                        </option>
                    </select>

                </div>
                <div class="col-md-3"> <label>Same Right</label>     

                    <input   type="checkbox" ng-model="sameright" />

                </div>
                
                <div class="col-md-3"> <label>Role</label>     <input  class="form-control"  type="text" ng-model="userrole.roleName" required=""/> 
                </div>
                <div class="col-md-3">
                <button type="submit" class="btn btn-default" ng-click="userrolesave()">Submit</button>
                </div>

            </div>



        </form>

        <div class="row">
            <div class="col-md-4 cls{{(($index+1)%3)}} "  ng-repeat="area in areas">
                
                <div class="panel panel-default">
                    <div class="panel-heading">{{area.area_name}} <input type="checkbox"   class="pull-right" ng-change="setcheckbox(area)" ng-model="area.selected" /></div>
                    <div class="panel-body">
                        <div class="row"  ng-repeat="permission in area.permissions">
                            <div class="col-xs-9">{{permission.id}} : {{permission.permission_name}} </div> <div class="col-xs-3">
                                <input type="checkbox"   class="pull-right" ng-model="permission.selected"  />
                            </div> 

                        </div>
                    </div>
                </div>
            </div>
            

        </div>

        <div>
            <md-button type="submit" class="md-raised" ng-click="updatepermission()">Submit</md-button>
        </div>


    </section>


</div>