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
    <td>billingName</td>
        <td>website </td>
          <td>address </td>
            <td>uploadedImage </td>
              <td>tanNo </td>
                <td>tax </td>
                <td>email </td>
                <td>phone </td>
                 <td>ipAddress </td>
                
           
            <td>created_at </td>
  </tr>
  <tr ng-repeat="x in list">
    <td>{{ x.id }}</td>
    <td>{{ x.billingName }}</td>
        <td>{{ x.website }}</td>
            <td>{{ x.address }}</td>
            <td>{{ x.uploadedImage }}</td>
             <td>{{ x.tanNo }}</td>
              <td>{{ x.tax }}</td>
              <td>{{ x.email }}</td>
              <td>{{ x.phone }}</td>
              <td>{{ x.ipAddress }}</td>
            
            <td>{{ x.created_at }}</td>
  </tr>
</table>

<h1>Store</h1>
 billingName : <input ng-model="store.billingName"  type="text"/> <br/>
website : <input ng-model="store.website" type="text"/><br/>
address : <input ng-model="store.address" type="text"/><br/>
uploadedImage : <input ng-model="store.uploadedImage" type="text"/><br/>
tanNo : <input ng-model="store.tanNo" type="text"/><br/>
tax : <input ng-model="store.tax" type="text"/><br/>
email : <input ng-model="store.email" type="text"/><br/>
phone : <input ng-model="store.phone" type="text"/><br/>
ipAddress : <input ng-model="store.ipAddress" type="text"/><br/>
<!-- Date Formet

contactDurationStart : <input ng-model="store.contactDurationStart" type="text"/>


-->
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
        window.location.href='#/dashboard';
        },function (response) {
       // $scope.token = response.statusText;
    })
     
    }
    $scope.loadData=function(){
        db.list("clientdetail/",null,function (response) {$scope.list = response.data; 
    },function(response){
        //$scope.token=response.statusText;
    });}
 db.list("clientdetail/",null,function (response) {$scope.list = response.data; 
    },function(response){
        //$scope.token=response.statusText;
    });
 $scope.stores=function(){
        db.store("clientdetail/",$scope.store,function (response) { 
    },function(response){
        //$scope.token=response.statusText;
    });}

 $scope.shows=function(){
        db.show("clientdetail/",$scope.show.id,function (response) { 
            $scope.list = [response.data]; 
            
    },function(response){
        //$scope.token=response.statusText;
    });}


 $scope.updates=function(){
        db.update("clientdetail/",$scope.updatedd.id,$scope.update,function (response) { 
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
