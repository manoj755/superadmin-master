<div class="col-md-12" >

    <div class="col-md-6">
        <ul class="list-unstyled">
            <li> <a href="" class="name" ng-click="grid.appScope.candidateshow(row.entity.id)">{{row.entity.candidateName}}</a></li>
            <li><span style="font-weight: 600;">Designation:-</span>{{row.entity.currentDesignation}}</li>
            <li><span style="font-weight: 600;">Official-Email:-</span>{{row.entity.email}}</li>
            <li>Qualification:-{{row.entity.qualification}}</li></ul>
    </div>
    <div class="col-md-6"><ul class="list-unstyled">
            <li><span style="font-weight: 600;">Contact:-</span>{{row.entity.mobileNo}}</li>
            <li><span style="font-weight: 600;">Exp:-</span>{{row.entity.ovarallExperiance}} </li>
            <li><span style="font-weight: 600;">Current Salary:-</span>{{row.entity.currentSalary}} </li>
            <li><span style="font-weight: 600;">Preferred Location:-</span>{{row.entity.preferredLocation}}</li>
          <li  ng-if="row.entity.pipeline_id">  <a href="javascript:"   target="#commentstatus" data-toggle="modal"   ng-click="grid.appScope.comment(row.entity)" >
            <span class="link-black i"><i class="fa fa-files-o fa-lg"></i> {{row.entity.display_name}}</span>
        </a>
           <a href=""   ng-click="grid.appScope.activity(row.entity)" >Activity</a></li>
        
        </ul></div>
          
    </div>


<!--<div class="col-md-4">

        <a href="javascript:" ng-if="row.entity.ajid" ng-hide="ishidecomment"  ng-click="grid.appScope.comment(row.entity)" >
            <i class="fa fa-files-o fa-lg"></i> <span class="link-black">{{row.entity.display_name}}</span>
        </a> </div>-->

