<div ng-controller="FeesSlabCtrl" class="col-md-12" ng-cloak=""> 
<h1> Fees Slab</h1> <div ui-grid="gridFeesSlab" ui-grid-selection ui-grid-pagination  ui-grid-cellnav ui-grid-exporter class="grid"></div>
<form class='col-md-12  alert alert-info'><h2><span ng-show="isEditFeesSlab">Edit</span><span ng-hide="isEditFeesSlab">Add</span>  Fees Slab</h2><div class='row'><div class='col-md-4'><div class="form-group">
    <label for="client_detail_id">Client Detail Id</label>
    <input type="number" required  class="form-control" ng-model="FeesSlab.client_detail_id" id="client_detail_id" placeholder="Client Detail Id">
        <span class="help-block alert-danger alert" ng-show="errors.client_detail_id[0]">{{ errors.client_detail_id.toString()}}</span>
  </div>
</div><div class='col-md-4'><div class="form-group">
    <label for="fromSlab">From Slab</label>
    <input type="number" required  class="form-control" ng-model="FeesSlab.fromSlab" id="fromSlab" placeholder="From Slab">
        <span class="help-block alert-danger alert" ng-show="errors.fromSlab[0]">{{ errors.fromSlab.toString()}}</span>
  </div>
</div><div class='col-md-4'><div class="form-group">
    <label for="toSlab">To Slab</label>
    <input type="number" required  class="form-control" ng-model="FeesSlab.toSlab" id="toSlab" placeholder="To Slab">
        <span class="help-block alert-danger alert" ng-show="errors.toSlab[0]">{{ errors.toSlab.toString()}}</span>
  </div>
</div></div><div class='row'><div class='col-md-4'><div class="form-group">
    <label for="AmountorPercentage"> Amountor Percentage</label>
    <input type="text" required  class="form-control" ng-model="FeesSlab.AmountorPercentage" id="AmountorPercentage" placeholder=" Amountor Percentage">
        <span class="help-block alert-danger alert" ng-show="errors.AmountorPercentage[0]">{{ errors.AmountorPercentage.toString()}}</span>
  </div>
</div><div class='col-md-4'><div class="form-group">
    <label for="isPercentage">Is Percentage</label>
    <input type="number" required  class="form-control" ng-model="FeesSlab.isPercentage" id="isPercentage" placeholder="Is Percentage">
        <span class="help-block alert-danger alert" ng-show="errors.isPercentage[0]">{{ errors.isPercentage.toString()}}</span>
  </div>
</div><div class='col-md-4'><div class="form-group">
    <label for="app_id">App Id</label>
    <input type="number" required  class="form-control" ng-model="FeesSlab.app_id" id="app_id" placeholder="App Id">
        <span class="help-block alert-danger alert" ng-show="errors.app_id[0]">{{ errors.app_id.toString()}}</span>
  </div>
</div></div> <div class="form-group">
                            <div class=" col-md-10">
                                <button type="submit" class="btn btn-primary"  ng-hide="isEditFeesSlab" ng-click="FeesSlabsave()">Save</button>
                                <button type="button" class="btn btn-primary" ng-show="isEditFeesSlab" ng-click="FeesSlabupdate()">Update</button>
                                <button type="button" class="btn btn-primary" ng-show="isEditFeesSlab" ng-click="FeesSlabback()">Back</button>
                            </div>
                        </div>
</form></div>