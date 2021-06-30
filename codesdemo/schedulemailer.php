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
    <td>jobName</td>
        <td>title </td>
            <td>jobDescription </td>
            <td>minimumExperience </td>
            <td>maximumExperience </td>
            <td>salary </td>
            <td>numberOfOpening </td>
            <td>referralBonus </td>
            <td>ipAddress </td>
              <td>updated_at </td>
                <td>created_at </td>
  </tr>
  <tr ng-click="showone(x.id)"  ng-repeat="x in list">
    <td>{{ x.id }}</td>
    <td>{{ x.jobName }}</td>
        <td>{{ x.title }}</td>
            <td>{{ x.jobDescription }}</td>
            <td>{{ x.minimumExperience}}</td>
            <td>{{ x.maximumExperience}}</td>
            <td>{{ x.salary}}</td>
            <td>{{ x.numberOfOpening}}</td>
            <td>{{ x.referralBonus}}</td>
             <td>{{ x.ipAddress}}</td>
              <td>{{ x.updated_at}}</td>
               <td>{{ x.created_at}}</td>
  </tr>
</table>

{{lists.jobName}}
<h1>Store</h1>
 jobName : <input ng-model="store.jobName"  type="text"/> <br/>
title : <input ng-model="store.title" type="text"/><br/>
jobDescription : <input ng-model="store.jobDescription" type="text"/><br/>
minimumExperience : <input ng-model="store.minimumExperience" type="text"/><br/>
maximumExperience : <input ng-model="store.maximumExperience" type="text"/><br/>
salary : <input ng-model="store.salary" type="text"/><br/>
numberOfOpening : <input ng-model="store.numberOfOpening" type="text"/><br/>
referralBonus : <input ng-model="store.referralBonus" type="text"/><br/>
ipAddress : <input ng-model="store.ipAddress" type="text"/><br/>
updated_at : <input ng-model="store.updated_at" type="text"/><br/>
created_at : <input ng-model="store.created_at" type="text"/><br/>
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
    <script src="js/ats.js" type="text/javascript"></script>
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
        db.list("addnewjob/",null,function (response) {$scope.list = response.data; 
    },function(response){
        //$scope.token=response.statusText;
    });}
 db.list("addnewjob/",null,function (response) {$scope.list = response.data; 
    },function(response){
        //$scope.token=response.statusText;
    });
 $scope.stores=function(){
        db.store("addnewjob/",$scope.store,function (response) { 
    },function(response){
        //$scope.token=response.statusText;
    });}

 $scope.showone=function(id){
        db.show("addnewjob/",id,function (response) { 
            $scope.lists = response.data; 
            
    },function(response){
        //$scope.token=response.statusText;
    });}
 $scope.shows=function(){
        db.show("addnewjob/",$scope.show.id,function (response) { 
            $scope.list = [response.data]; 
            
    },function(response){
        //$scope.token=response.statusText;
    });}


 $scope.updates=function(){
        db.update("addnewjob/",$scope.updatedd.id,$scope.update,function (response) { 
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
