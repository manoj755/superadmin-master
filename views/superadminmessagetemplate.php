<div ng-controller="SuperAdminMessageTemplateCtrl" class="col-md-12" ng-cloak=""> 
<h1> Super Admin Message Template</h1> <div ui-grid="gridSuperAdminMessageTemplate" ui-grid-selection ui-grid-pagination  ui-grid-cellnav ui-grid-exporter class="grid"></div>
<form class='col-md-12  alert alert-info'><h2><span ng-show="isEditSuperAdminMessageTemplate">Edit</span><span ng-hide="isEditSuperAdminMessageTemplate">Add</span>  Super Admin Message Template</h2><div class='row'><div class='col-md-12'><div class="form-group">
    <label class="control-label col-sm-2" for="templateType">Template Type</label>
        <div class="col-sm-10"> 
    <input type="text" required maxlength='50' class="form-control" ng-model="SuperAdminMessageTemplate.templateType" id="templateType" placeholder="Template Type">
        <span class="help-block alert-danger alert" ng-show="errors.templateType[0]">{{ errors.templateType.toString()}}</span>
            </div>
  </div>
</div></div><div class='row'><div class='col-md-12'><div class="form-group">
    <label class="control-label col-sm-2" for="title">Title</label>
        <div class="col-sm-10"> 
    <input type="text" required maxlength='50' class="form-control" ng-model="SuperAdminMessageTemplate.title" id="title" placeholder="Title">
        <span class="help-block alert-danger alert" ng-show="errors.title[0]">{{ errors.title.toString()}}</span>
            </div>
  </div>
</div></div><div class='row'><div class='col-md-12'><div class="form-group">
    <label class="control-label col-sm-2" for="message">Message</label>
        <div class="col-sm-10"> 
    <input type="text" required maxlength='50' class="form-control" ng-model="SuperAdminMessageTemplate.message" id="message" placeholder="Message">
        <span class="help-block alert-danger alert" ng-show="errors.message[0]">{{ errors.message.toString()}}</span>
            </div>
  </div>
</div></div><div class='row'><div class='col-md-12'><div class="form-group">
    <label class="control-label col-sm-2" for="added_by">Added By</label>
        <div class="col-sm-10"> 
    <input type="text"  maxlength='30' class="form-control" ng-model="SuperAdminMessageTemplate.added_by" id="added_by" placeholder="Added By">
        <span class="help-block alert-danger alert" ng-show="errors.added_by[0]">{{ errors.added_by.toString()}}</span>
            </div>
  </div>
</div></div><div class='row'><div class='col-md-12'><div class="form-group">
    <label class="control-label col-sm-2" for="ipAddress">Ip Address</label>
        <div class="col-sm-10"> 
    <input type="text"  maxlength='50' class="form-control" ng-model="SuperAdminMessageTemplate.ipAddress" id="ipAddress" placeholder="Ip Address">
        <span class="help-block alert-danger alert" ng-show="errors.ipAddress[0]">{{ errors.ipAddress.toString()}}</span>
            </div>
  </div>
</div></div> <div class="form-group">
                            <div class=" col-md-10">
                                <button type="submit" class="btn btn-primary"  ng-hide="isEditSuperAdminMessageTemplate" ng-click="SuperAdminMessageTemplatesave()">Save</button>
                                <button type="button" class="btn btn-primary" ng-show="isEditSuperAdminMessageTemplate" ng-click="SuperAdminMessageTemplateupdate()">Update</button>
                                <button type="button" class="btn btn-primary" ng-show="isEditSuperAdminMessageTemplate" ng-click="SuperAdminMessageTemplateback()">Back</button>
                            </div>
                        </div>
</form></div>