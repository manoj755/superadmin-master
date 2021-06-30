<div class="col-md-12" >

    <div class="col-md-4">
        <ul class="list-unstyled">
            <li> <a href="" class="name" ng-click="grid.appScope.candidateshow(row.entity.id)">{{row.entity.candidateName}}</a></li>
            <li>{{row.entity.currentDesignation}}</li>
            <li>Email-{{row.entity.email}}</li><li>Qualification:{{row.entity.qualification}}</li></ul></div>
    <div class="col-md-4">
        <ul class="list-unstyled"><li>city- {{row.entity.city}}</li>
            <li>Contact number: {{row.entity.phoneNo}}</li>
            <li>Exp: {{row.entity.relevantExperiance}} year</li><li></li></ul>
    </div>
    <div class="col-md-4">
        <b class="text-success text-center">{{row.entity.job_name}}</b>
        <div class="clearfix"></div>
        
        <a href="javascript:" ng-if="row.entity.id"   ng-click="grid.appScope.comment(row.entity)" >
            <i class="fa fa-files-o fa-lg"></i> <span class="link-black">{{row.entity.display_name}}</span>
        </a> 
        <a href="" ng-click="grid.appScope.activity(row.entity)" >Activity</a>
    </div></div>
