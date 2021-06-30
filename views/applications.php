<div ng-controller='applicationsCtrl' ng-cloak="">
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
         
        <div ui-grid="gridOptions" ui-grid-selection ui-grid-pagination  ui-grid-cellnav ui-grid-exporter class="grid"></div><br>
       <div class="container">
           <div class="row">
               <div class="col-md-8 col-md-offset-2">
  <form>
    <div class="form-group row">
      <label for="appname" class="col-sm-2 col-form-label">App Name</label>
      <div class="col-sm-10">
          <input type="text" class="form-control" ng-model="application.app_name" id="appname" placeholder="App Name">
      </div>
    </div>
    <div class="form-group row">
      <label for="appaddress" class="col-sm-2 col-form-label">App Address </label>
      <div class="col-sm-10">
          <input type="text" class="form-control" ng-model="application.app_address" id="appaddress" placeholder="App Address">
      </div>
    </div>
      <div class="form-group row">
      <label for="appmobile" class="col-sm-2 col-form-label">App MobileNo </label>
      <div class="col-sm-10">
          <input type="text" class="form-control" ng-model="application.app_mobileNo" placeholder="App MobileNo ">
      </div>
    </div>
      <div class="form-group row">
      <label for="appmobile" class="col-sm-2 col-form-label">Type</label>
      <div class="col-sm-10">
          
          <label class="radio-inline">
                                                            <input name="radioGroup"  value="1" ng-model="application.IsAts" type="radio"> Consultant
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input name="radioGroup" value="0" checked="" ng-model="application.IsAts" type="radio"> Corporate
                                                        </label>
          
      </div>
    </div>
      
         <div class="form-group row">
      <label for="appmobile" class="col-sm-2 col-form-label">No of License</label>
      <div class="col-sm-10" >
          <input type="number" min="1"  class="form-control"  ng-model="application.noOfLicense" placeholder="No Of License">
      </div>
    </div>
      <div class="form-group row">
      <label for="appmobile" class="col-sm-2 col-form-label">Department to be copy</label>
      <div class="col-sm-10" >
          <input type="checkbox" class="" ng-true-value="1" ng-false-value="0"  ng-model="application.copy_client_to_department" />
      </div>
    </div>
       <div class="form-group row">
      <label for="is_no_job_on_pr" class="col-sm-2 col-form-label">No jobs on pr</label>
      <div class="col-sm-10" >
          <input type="checkbox" class="form-check-input" ng-checked="" ng-model="application.is_no_job_on_pr"  ng-true-value="1" ng-false-value="0" return="true">
      </div>
    </div>
    {{application}}
    <div class="form-group row">
      <div class="offset-sm-2 col-sm-10">
          <button type="submit" class="btn btn-primary" ng-click="applicationsave()">Submit</button>
      </div>
    </div>
  </form>
               </div>
           </div>
</div>

    </section>


</div>
