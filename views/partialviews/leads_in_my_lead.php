<div class='col-md-12 row_candidate_jobs ' >

   
    
    <div class="col-md-4">
        <ul class="list-unstyled">
            <li class='i'>{{row.entity.candidateName}}  <b style="cursor: pointer;" class="name"  ng-show="row.entity.recruitershow">
                    <i style="margin-left: 5px;color:#5b4dcc;" ng-click="grid.appScope.candidateshow(row.entity.id)" help="Open Candidate" class="fa fa-link"></i>
<!--                                        <i style="margin-left: 5px;color:#5b4dcc;" ng-show="(row.entity.conversation)" help="Open Candidate" class="fa fa-link"></i>-->

                    <i style="margin-left: 3px;color:red;" ng-click="grid.appScope.setupdateid(row.entity.id)" help="Add Notes" data-toggle="modal" data-target="#candidatenots" class="fa fa-comments-o"></i>
                    <i style="margin-left: 3px;color:#63c0ca;" ng-click="grid.appScope.getnotes(row.entity.id)" help="add notes" data-toggle="modal" data-target="#notes" class="fa fa-th-list"></i>
                    <i style="margin-left: 3px;color:#00BCD4;" ng-show='row.entity.onboardingid' ng-click="grid.appScope.onboardingDetails(row.entity)" help="Onboarding" data-toggle="modal"  class="fa fa-trophy"></i>
                </b></li>
            <li>{{row.entity.currentDesignation}}({{row.entity.currentOrganization}})
            </li> 
            
            <li>Email-{{row.entity.email}}</li><li>Qualification:{{row.entity.qualification}}</li></ul></div>
    <div class="col-md-4">
        <ul class="list-unstyled"><li>Location- {{row.entity.location}}</li>
            <li>Contact number: {{row.entity.mobileNo}}</li>
            <li>Exp: {{row.entity.relevantExperiance}} year</li>
            
            <li ng-show="row.entity.last_action_date" class="text-info text-bold">
                Last Action : <i>{{row.entity.last_action_date}}</i>
            </li></ul>
    </div>
    <div class="col-md-4"><button type="button"  ng-click="grid.appScope.removecandidate(row.entity)"  ng-show="row.entity.recruiter_id" class="close pull-right" >×</button>
        <span ng-show="row.entity.vendorname.length > 0"  class="text-red">( Vendor -{{row.entity.vendorname}} )</span><div class="clearfix"></div>
        <b class="text-info text-center" help='Recruiter'>{{row.entity.recruitername}}</b> 
        
        <div class="clearfix"></div>
        <div ng-if="row.entity.pipeline_id">
        <a href="javascript:" ng-if="row.entity.id"   target="#commentstatus" data-toggle="modal"   ng-click="grid.appScope.comment(row.entity)" >
            <span class="link-black i"><i class="fa fa-files-o fa-lg"></i> {{row.entity.display_name}}</span>
        </a> 


       
            <a href=""   ng-click="grid.appScope.activity(row.entity)" >Activity</a></div>
        <br/>


        <div ng-show='row.entity.test_result !=null && row.entity.test_result.length>0' help='{{row.entity.test_result}}'>View Result</div>

        <a ng-show="row.entity.invoice_id" href="#"  class="pull-right"><span data-toggle="tooltip" ngf-accept='"application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"' ngf-pattern='"application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"'  ngf-select="grid.appScope.uploadinvoicevendor($file,row.entity.invoice_id)" title="Upload">Upload Invoice</span></a>

    </div></div>
<script>
function show(){
    $('#conversation').modal('show');
}
function hide(){
    $('#conversation').modal('hide');
}
</script>