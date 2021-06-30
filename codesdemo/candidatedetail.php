<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-route.js"></script>
  
<body>

<div ng-app="myApp" ng-controller="customersCtrl">
   Email : <input ng-model="email"  type="text"/> <br/>
Password : <input ng-model="password" type="password"/>
<button ng-click="login()">Login</button>
{{token}}
<h1>List Example</h1>
<button ng-click="loadData()">Load Data</button>
<table border="1">
     <tr >
    <td>id</td>
    <td>candidateName</td>
        <td>gender </td>
         <td>currentOrganization </td>
          <td>currentDesignation </td>
          <td>relevantExperiance </td>
          <td>qualification </td>
          <td>country </td>
           <td>state </td>
           <td>city </td>
           <td>location </td>
           <td>preferredLocation </td>
           <td>currentSalary </td>
           <td>expectedSalary </td>
           <td>phoneNo </td>
           <td>mobileNo </td>
           <td>	noticePeriod </td>
           <td>nationality </td>
           <td>visaType </td>
           <td>remark </td>
           <td>ovarallExperiance </td>
           <td>address </td>
           <td>	email </td>
           <td>panNo </td>
           <td>industryType </td>
           <td>functionalArea </td>
           <td>dob </td>
           <td>source </td>
           <td>resume </td>
           <td>ipAddress </td>
           <td>updated_at </td>
           <td>created_at </td>
  </tr>
  <tr ng-repeat="x in list">
    <td>{{ x.id }}</td>
    <td>{{ x.candidateName }}</td>
        <td>{{ x.gender }}</td>
            <td>{{ x.currentOrganization }}</td>
            <td>{{ x.currentDesignation }}</td>
             <td>{{ x.relevantExperiance }}</td>
              <td>{{ x.qualification }}</td>
               <td>{{ x.country }}</td>
                <td>{{ x.state }}</td>
                 <td>{{ x.city }}</td>
               <td>{{ x.location }}</td>
                <td>{{ x.preferredLocation }}</td>
                 <td>{{ x.currentSalary }}</td>
                  <td>{{ x.expectedSalary }}</td>
                   <td>{{ x.phoneNo }}</td>
                   <td>{{ x.mobileNo }}</td>
                   
                   <td>{{ x.noticePeriod }}</td>
                <td>{{ x.nationality }}</td>
                 <td>{{ x.visaType }}</td>
               <td>{{ x.remark }}</td>
                <td>{{ x.ovarallExperiance }}</td>
                 <td>{{ x.address }}</td>
                  <td>{{ x.email }}</td>
                   <td>{{ x.panNo }}</td>
                   <td>{{ x.industryType }}</td>
                   
                   <td>{{ x.functionalArea }}</td>
                <td>{{ x.dob }}</td>
                 <td>{{ x.source }}</td>
               <td>{{ x.resume }}</td>
                <td>{{ x.ipAddress }}</td>
                 <td>{{ x.updated_at }}</td>
                  <td>{{ x.created_at }}</td>
                   
  </tr>
</table>

<h1>Store</h1>
 candidateName : <input ng-model="store.candidateName"  type="text"/> <br/>
gender : <input ng-model="store.gender" type="text"/><br/>
currentOrganization : <input ng-model="store.currentOrganization" type="text"/><br/>
currentDesignation : <input ng-model="store.currentDesignation" type="text"/><br/>
relevantExperiance : <input ng-model="store.relevantExperiance" type="text"/><br/>
qualification : <input ng-model="store.qualification" type="text"/><br/>
country : <input ng-model="store.country" type="text"/><br/>
state : <input ng-model="store.state" type="text"/><br/>
city : <input ng-model="store.city" type="text"/><br/>

location : <input ng-model="store.location" type="text"/><br/>
preferredLocation : <input ng-model="store.preferredLocation" type="text"/><br/>
currentSalary : <input ng-model="store.currentSalary" type="text"/><br/>
expectedSalary : <input ng-model="store.expectedSalary" type="text"/><br/>
phoneNo : <input ng-model="store.phoneNo" type="text"/><br/>
mobileNo : <input ng-model="store.mobileNo" type="text"/><br/>

noticePeriod : <input ng-model="store.noticePeriod" type="text"/><br/>
nationality : <input ng-model="store.nationality" type="text"/><br/>
visaType : <input ng-model="store.visaType" type="text"/><br/>
remark : <input ng-model="store.remark" type="text"/><br/>
ovarallExperiance : <input ng-model="store.ovarallExperiance" type="text"/><br/>
address : <input ng-model="store.address" type="text"/><br/>


email : <input ng-model="store.email" type="text"/><br/>
panNo : <input ng-model="store.panNo" type="text"/><br/>
industryType : <input ng-model="store.industryType" type="text"/><br/>
functionalArea : <input ng-model="store.functionalArea" type="text"/><br/>

dob : <input ng-model="store.dob" type="text"/><br/>
source : <input ng-model="store.source" type="text"/><br/>
resume : <input ng-model="store.resume" type="text"/><br/>

<button ng-click="stores()">Store</button>

<h1>Show</h1>
 <input ng-model="show.id"  type="text"/> <br/>


<button ng-click="shows()">show</button>


<h1>Update</h1>
 <input ng-model="updatedd.id"  type="text"/>
 messageLogStatus : <input ng-model="update.messageLogStatus"  type="text"/> <br/>
message_id : <input ng-model="update.message_id" type="text"/>
<button ng-click="updates()">update</button>



<h1>Delete</h1>
 <input ng-model="delete.id"  type="text"/>
 
<button ng-click="deletes()">delete</button>
</div>
    <script src="../js/ats.js" type="text/javascript"></script>
<script>
//var app = angular.module('myApp', []);
app.controller('customersCtrl', function($scope, $http,db,Authkey) {
    
    $scope.email='adnan@scotch.io';
    $scope.password='secret';
    $scope.token='';
    $scope.login=function(){
                    db.post('authenticate/',{'email':$scope.email,'password':$scope.password},function (response) {
            Authkey.setAuthKey(response.data.token);
        $scope.token = Authkey.getAuthKey();
        },function (response) {
       // $scope.token = response.statusText;
    })
     
    }
    $scope.loadData=function(){
        db.list("candidatedetail/",null,function (response) {$scope.list = response.data; 
    },function(response){
        //$scope.token=response.statusText;
    });}
 db.list("candidatedetail/",null,function (response) {$scope.list = response.data; 
    },function(response){
        //$scope.token=response.statusText;
    });
 $scope.stores=function(){
        db.store("candidatedetail/",$scope.store,function (response) { 
    },function(response){
        //$scope.token=response.statusText;
    });}

 $scope.shows=function(){
        db.show("candidatedetail/",$scope.show.id,function (response) { 
            $scope.list = [response.data]; 
            
    },function(response){
        //$scope.token=response.statusText;
    });}


 $scope.updates=function(){
        db.update("candidatedetail/",$scope.updatedd.id,$scope.update,function (response) { 
             console.log(response);
            
    },function(response){
        //$scope.token=response.statusText;
    });}
 $scope.deletes=function(){
        db.destroy("messagelogstatus/",$scope.delete.id,function (response) { 
         console.log(response);
            
    },function(response){
        //$scope.token=response.statusText;
    });}
});
</script>

</body>
</html>
