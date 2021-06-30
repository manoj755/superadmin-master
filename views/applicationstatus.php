
 <div ng-controller="ApplicationStatusCtrl" class="col-md-12" ng-cloak=""> 
<h1> Application Status</h1> <div ui-grid="gridApplicationStatus" ui-grid-selection ui-grid-pagination  ui-grid-cellnav ui-grid-exporter class="grid"></div>
<form class='col-md-12  alert alert-info'><h2><span ng-show="isEditApplicationStatus">Edit</span><span ng-hide="isEditApplicationStatus">Add</span>  Application Status</h2><div class='row'><div class='col-md-6'><div class="form-group ">
    <label for="status">Status</label>
    <input type="text" required maxlength='50' class="form-control" ng-model="ApplicationStatus.status" id="status" placeholder="Status">
        <span class="help-block alert-danger alert" ng-show="errors.status[0]">{{ errors.status.toString()}}</span>
  </div>
</div><div class='col-md-6'><div class="form-group ">
    <label for="ipAddress">Ip Address</label>
    <input type="text" required maxlength='50' class="form-control" ng-model="ApplicationStatus.ipAddress" id="ipAddress" placeholder="Ip Address">
        <span class="help-block alert-danger alert" ng-show="errors.ipAddress[0]">{{ errors.ipAddress.toString()}}</span>
  </div>
</div></div> <div class="form-group">
                            <div class=" col-md-10">
                                <button type="submit" class="btn btn-primary"  ng-hide="isEditApplicationStatus" ng-click="ApplicationStatussave()">Save</button>
                                <button type="button" class="btn btn-primary" ng-show="isEditApplicationStatus" ng-click="ApplicationStatusupdate()">Update</button>
                                <button type="button" class="btn btn-primary" ng-show="isEditApplicationStatus" ng-click="ApplicationStatusback()">Back</button>
                            </div>
                        </div>
</form></div>
 