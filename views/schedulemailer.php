<div ng-controller="schedulemailerCtrl" class="col-md-12" ng-cloak=""> 

  <div class="container">
      <section class="content">




   <div class="row">
   <div class="col-md-12">
    <div class="form-group">
        <label for="sel1">Template :</label>
       
      
                                <select class="form-control  e"  id="title" name="template.id" ng-model="ScheduleMailer.template_id" >
                                    <option value="{{superadminmessagetemplate.id}}" ng-repeat="superadminmessagetemplate in superadminmessagetemplates">
                                        {{superadminmessagetemplate.title}}
                                    </option>
                                </select>
      <br>
    </div>
   </div>
  </div> 
      </section>                 
  
      <div class="row">
          <div class="col-md-8">
             <div  ng-repeat="recievertype in recievertypes">
      <label><input type="checkbox"  ng-false-value="''" value="{{recievertype.id}}" id="{{recievertype}}" name="list_status" ng-model="ScheduleMailer.list_status">  {{recievertype.type}}</label>
</div>
          </div>
      </div>
  <div class="form-group">
        <label for="date">Date:</label>
        
        <input type="date" format="yyyy/mm/dd   " ng-model="ScheduleMailer.to_be_sent_date" name="to_be_sent_date"><br>
        
                        
                       </div>  
                                <button type="submit" class="btn btn-primary"   ng-click="usersave()">Save</button>
                                 
 </div>
      </div>
          
          
          