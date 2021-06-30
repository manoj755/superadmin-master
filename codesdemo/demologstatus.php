<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-route.js"></script>
  
<body ng-app="myApp">

<div  ng-controller="customersCtrl">
   Email : <input ng-model="email"  type="text"/> <br/>
Password : <input ng-model="password" type="password"/>
<button ng-click="login()">Login</button>
{{token}}
<h1>List Example</h1>
<button ng-click="loadData()">Load Data</button>
<table border="1">
     <tr >
    <td>id</td>
    <td>messageLogStatus</td>
        <td>message_id </td>
            <td>updated_at </td>
            <td>created_at </td>
  </tr>
  <tr ng-repeat="x in list">
    <td>{{ x.id }}</td>
    <td>{{ x.messageLogStatus }}</td>
        <td>{{ x.message_id }}</td>
            <td>{{ x.updated_at }}</td>
            <td>{{ x.created_at }}</td>
  </tr>
</table>

<h1>Store</h1>
 messageLogStatus : <input ng-model="store.messageLogStatus"  type="text"/> <br/>
message_id : <input ng-model="store.message_id" type="text"/>
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
    
<script>
    var ServiceURL = 'http://localhost:8000/index.php/api/';
var app = angular.module('myApp', []);
app.controller('customersCtrl', function($scope, $http,db,Authkey) {
    
     
 $scope.email='adnan@scotch.io';
    $scope.password='secret';
    $scope.login=function(){
                    db.post('authenticate/',{'email':$scope.email,'password':$scope.password},function (response) {
            Authkey.setAuthKey(response.data.token);
        $scope.token = Authkey.getAuthKey();
        },function (response) {
       // $scope.token = response.statusText;
    })
     
    }
    $scope.loadData=function(){
        
        db.list("messagelogstatus/",null,function (response) {$scope.list = response.data; 
    },function(response){
        //$scope.token=response.statusText;
    });}
 db.list("messagelogstatus/",null,function (response) {$scope.list = response.data; 
    },function(response){
        //$scope.token=response.statusText;
    });
 $scope.stores=function(){
        db.store("messagelogstatus/",$scope.store,function (response) { 
    },function(response){
        //$scope.token=response.statusText;
    });}

 $scope.shows=function(){
        db.show("messagelogstatus/",$scope.show.id,function (response) { 
            $scope.list = [response.data]; 
            
    },function(response){
        //$scope.token=response.statusText;
    });}


 $scope.updates=function(){
        db.update("messagelogstatus/",$scope.updatedd.id,$scope.update,function (response) { 
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
