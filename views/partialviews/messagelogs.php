 <div ng-controller="MessageLogsCtrl" class="col-md-12" ng-cloak=""> 
<h1> Message Logs</h1> <div ui-grid="gridMessageLogs" ui-grid-selection ui-grid-pagination  ui-grid-cellnav ui-grid-exporter class="grid"></div>
<form class='col-md-12  alert alert-info'><h2><span ng-show="isEditMessageLogs">Edit</span><span ng-hide="isEditMessageLogs">Add</span>  Message Logs</h2><div class='row'><div class='col-md-6'><div class="form-group ">
    <label for="message">Message</label>
    <input type="text"   class="form-control" ng-model="MessageLogs.message" id="message" placeholder="Message">
        <span class="help-block alert-danger alert" ng-show="errors.message[0]">{{ errors.message.toString()}}</span>
  </div>
</div><div class='col-md-6'><div class="form-group ">
    <label for="templateId">Template Id</label>
    <input type="number" required  class="form-control" ng-model="MessageLogs.templateId" id="templateId" placeholder="Template Id">
        <span class="help-block alert-danger alert" ng-show="errors.templateId[0]">{{ errors.templateId.toString()}}</span>
  </div>
</div></div><div class='row'><div class='col-md-6'><div class="form-group ">
    <label for="messageType">Message Type</label>
    <input type="text"  maxlength='50' class="form-control" ng-model="MessageLogs.messageType" id="messageType" placeholder="Message Type">
        <span class="help-block alert-danger alert" ng-show="errors.messageType[0]">{{ errors.messageType.toString()}}</span>
  </div>
</div><div class='col-md-6'><div class="form-group ">
    <label for="subject">Subject</label>
    <textarea  class="form-control" maxlength='255' ng-model="MessageLogs.subject" id="subject" placeholder="Subject"></textarea>
        <span class="help-block alert alert-danger" ng-show="errors.subject[0]">{{ errors.subject.toString()}}</span>
  </div>
</div></div><div class='row'><div class='col-md-6'><div class="form-group ">
    <label for="sendedTo">Sended To</label>
    <textarea  class="form-control" maxlength='100' ng-model="MessageLogs.sendedTo" id="sendedTo" placeholder="Sended To"></textarea>
        <span class="help-block alert alert-danger" ng-show="errors.sendedTo[0]">{{ errors.sendedTo.toString()}}</span>
  </div>
</div><div class='col-md-6'><div class="form-group ">
    <label for="sendedCC">SendedCC</label>
    <textarea  class="form-control" maxlength='255' ng-model="MessageLogs.sendedCC" id="sendedCC" placeholder="SendedCC"></textarea>
        <span class="help-block alert alert-danger" ng-show="errors.sendedCC[0]">{{ errors.sendedCC.toString()}}</span>
  </div>
</div></div><div class='row'><div class='col-md-6'><div class="form-group ">
    <label for="sendedBCC">SendedBCC</label>
    <textarea  class="form-control" maxlength='255' ng-model="MessageLogs.sendedBCC" id="sendedBCC" placeholder="SendedBCC"></textarea>
        <span class="help-block alert alert-danger" ng-show="errors.sendedBCC[0]">{{ errors.sendedBCC.toString()}}</span>
  </div>
</div><div class='col-md-6'><div class="form-group ">
    <label for="sendedBy">Sended By</label>
    <textarea  class="form-control" maxlength='100' ng-model="MessageLogs.sendedBy" id="sendedBy" placeholder="Sended By"></textarea>
        <span class="help-block alert alert-danger" ng-show="errors.sendedBy[0]">{{ errors.sendedBy.toString()}}</span>
  </div>
</div></div><div class='row'><div class='col-md-6'><div class="form-group ">
    <label for="attachment">Attachment</label>
    <textarea  class="form-control" maxlength='255' ng-model="MessageLogs.attachment" id="attachment" placeholder="Attachment"></textarea>
        <span class="help-block alert alert-danger" ng-show="errors.attachment[0]">{{ errors.attachment.toString()}}</span>
  </div>
</div><div class='col-md-6'><div class="form-group ">
    <label for="isSend">Is Send</label>
    <input type="number" required  class="form-control" ng-model="MessageLogs.isSend" id="isSend" placeholder="Is Send">
        <span class="help-block alert-danger alert" ng-show="errors.isSend[0]">{{ errors.isSend.toString()}}</span>
  </div>
</div></div><div class='row'><div class='col-md-6'><div class="form-group ">
    <label for="toBeSentDate">To Be Sent Date</label>
    <input type="text"   class="form-control" ng-model="MessageLogs.toBeSentDate" id="toBeSentDate" placeholder="To Be Sent Date">
        <span class="help-block alert-danger alert" ng-show="errors.toBeSentDate[0]">{{ errors.toBeSentDate.toString()}}</span>
  </div>
</div><div class='col-md-6'><div class="form-group ">
    <label for="sentDate">Sent Date</label>
    <input type="text"   class="form-control" ng-model="MessageLogs.sentDate" id="sentDate" placeholder="Sent Date">
        <span class="help-block alert-danger alert" ng-show="errors.sentDate[0]">{{ errors.sentDate.toString()}}</span>
  </div>
</div></div><div class='row'><div class='col-md-6'><div class="form-group ">
    <label for="app_id">App Id</label>
    <input type="number" required  class="form-control" ng-model="MessageLogs.app_id" id="app_id" placeholder="App Id">
        <span class="help-block alert-danger alert" ng-show="errors.app_id[0]">{{ errors.app_id.toString()}}</span>
  </div>
</div><div class='col-md-6'><div class="form-group ">
    <label for="ipAddress">Ip Address</label>
    <input type="text"  maxlength='50' class="form-control" ng-model="MessageLogs.ipAddress" id="ipAddress" placeholder="Ip Address">
        <span class="help-block alert-danger alert" ng-show="errors.ipAddress[0]">{{ errors.ipAddress.toString()}}</span>
  </div>
</div></div><div class='row'><div class='col-md-6'><div class="form-group ">
    <label for="response">Response</label>
    <textarea  class="form-control" maxlength='2000' ng-model="MessageLogs.response" id="response" placeholder="Response"></textarea>
        <span class="help-block alert alert-danger" ng-show="errors.response[0]">{{ errors.response.toString()}}</span>
  </div>
</div><div class='col-md-6'><div class="form-group ">
    <label for="templateno">Templateno</label>
    <input type="number" required  class="form-control" ng-model="MessageLogs.templateno" id="templateno" placeholder="Templateno">
        <span class="help-block alert-danger alert" ng-show="errors.templateno[0]">{{ errors.templateno.toString()}}</span>
  </div>
</div></div><div class='row'><div class='col-md-6'><div class="form-group ">
    <label for="atsid">Atsid</label>
    <input type="number" required  class="form-control" ng-model="MessageLogs.atsid" id="atsid" placeholder="Atsid">
        <span class="help-block alert-danger alert" ng-show="errors.atsid[0]">{{ errors.atsid.toString()}}</span>
  </div>
</div><div class='col-md-6'><div class="form-group ">
    <label for="isSuperAdmin">Is Super Admin</label>
    <input type="text"  maxlength='50' class="form-control" ng-model="MessageLogs.isSuperAdmin" id="isSuperAdmin" placeholder="Is Super Admin">
        <span class="help-block alert-danger alert" ng-show="errors.isSuperAdmin[0]">{{ errors.isSuperAdmin.toString()}}</span>
  </div>
</div></div> <div class="form-group">
                            <div class=" col-md-10">
                                <button type="submit" class="btn btn-primary"  ng-hide="isEditMessageLogs" ng-click="MessageLogssave()">Save</button>
                                <button type="button" class="btn btn-primary" ng-show="isEditMessageLogs" ng-click="MessageLogsupdate()">Update</button>
                                <button type="button" class="btn btn-primary" ng-show="isEditMessageLogs" ng-click="MessageLogsback()">Back</button>
                            </div>
                        </div>
</form></div>