<div class="col-md-12" >

    <div class="col-md-6">
        <ul class="list-unstyled">
            <li> <a href="" class="name" ng-click="grid.appScope.candidateshow(row.entity.id)">{{row.entity.candidateName}}</a> {{row.entity.currentDesignation}} 
                ({{row.entity.currentOrganization}})
            </li>
            <li><span style="font-weight: 600;">Email:-</span>{{row.entity.email}}</li>
            <li><span style="font-weight: 600;">Qualification:-</span>{{row.entity.qualification}}</li>
            <li><span style="font-weight: 600;">Location:-</span>{{row.entity.location}}</li>
        </ul>
        
        
        
    </div>
    <div class="col-md-4"><ul class="list-unstyled">
            <li><span style="font-weight: 600;">Contact:-</span>{{row.entity.mobileNo}}</li>
            <li><span style="font-weight: 600;">Exp:-</span>{{row.entity.ovarallExperiance}} </li>
            <li><span style="font-weight: 600;">Current Salary:-</span>{{row.entity.currentSalary}} </li>
            <li><span style="font-weight: 600;">Preferred Location:-</span>{{row.entity.preferredLocation}}</li>
        </ul>
    </div>

    <div class="col-md-2">
        <div class="sourceid" style="margin-top: 24px;">


            <img src="images/{{row.entity.sourceid}}.png" alt=""/>
        </div>

    </div>

</div>
