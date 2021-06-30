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
    <td> message </td>
	 <td> templateId </td>
	 <td>communicationType</td>
    <td> messageType </td>
	<td> sendedTo </td>
	 <td> sendedBy </td>
	 <td>sentDate</td>
    <td> toBeSentDate  </td>
	 <td> ipAddress</td>
	<td>updated_at </td>
    <td>created_at </td>
    
       
            
  </tr>
  <tr ng-repeat="x in list">
    <td>{{ x.id }}</td>
    <td>{{ x.message}}</td>
	 <td>{{ x.templateId}}</td>
	  <td>{{ x.communicationType}}</td>
    <td>{{ x.messageType}}</td>
	<td>{{ x.sendedTo}}</td>
	 <td>{{ x.sendedBy}}</td>
	  <td>{{ x.sentDate}}</td>
    <td>{{ x.toBeSentDate}}</td>
	 <td>{{ x.ipAddress}}</td>
    <td>{{ x.updated_at }}</td>
    <td>{{ x.created_at }}</td>
            
  </tr>
</table>

<h1>Store</h1>
 message: <input ng-model="store.message"  type="text"/> <br/>
 templateId: <input ng-model="store.templateId"  type="text"/> <br/>
 communicationType: <input ng-model="store.communicationType"  type="text"/> <br/>
 messageType: <input ng-model="store.messageType"  type="text"/> <br/>
 sendedTo: <input ng-model="store.sendedTo"  type="text"/> <br/>
 sendedBy: <input ng-model="store.sendedBy"  type="text"/> <br/>
 
 
 
<button ng-click="stores()">Store</button>

<h1>Show</h1>
 <input ng-model="show.id"  type="text"/> <br/>

<button ng-click="shows()">show</button>


<h1>Update</h1>
 <input ng-model="updatedd.id"  type="text"/>
 candidate_id : <input ng-model="update.candidate_id"  type="text"/> <br/>
 messagelogName : <input ng-model="update.messagelogName"  type="text"/> <br/>
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
        db.list("messagelog/",null,function (response) {$scope.list = response.data; 
    },function(response){
        //$scope.token=response.statusText;
    });}
 db.list("messagelog/",null,function (response) {$scope.list = response.data; 
    },function(response){
        //$scope.token=response.statusText;
    });
 $scope.stores=function(){
        db.store("messagelog/",$scope.store,function (response) { 
    },function(response){
        //$scope.token=response.statusText;
    });}

 $scope.shows=function(){
        db.show("messagelog/",$scope.show.id,function (response) { 
            $scope.list = [response.data]; 
            
    },function(response){
        //$scope.token=response.statusText;
    });}


 $scope.updates=function(){
        db.update("messagelog/",$scope.updatedd.id,$scope.update,function (response) { 
             console.log(response);
            
    },function(response){
        //$scope.token=response.statusText;
    });}
 $scope.deletes=function(){
        db.destroy("messagelog/",$scope.delete.id,function (response) { 
         console.log(response);
            
    },function(response){
        //$scope.token=response.statusText;
    });}
});
</script>

</body>
</html>
