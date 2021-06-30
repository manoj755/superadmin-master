<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-route.js"></script>
    <script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
  
<body>

<div ng-app="myApp" ng-controller="customersCtrl">
  
</div>
     
<script>
   var ServiceURL = 'http://localhost:8000/index.php/api/';
var app = angular.module('myApp', []);
var url='my/';
app.controller('customersCtrl', function($scope, $http) {
    
//     var req = {method: 'POST',
//            url: ServiceURL + url,
//
//            data: {'a':'b','ad':[{'name':'Narender','dd':4},{'name':'Bhupender','dd':22}]}
//            ,
//            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
//        }
//        $http(req).then(function (response) {
//             
//        }, function (response) {
//            
//
//        });
$http({method: 'POST', url: ServiceURL + url, data: $.param({a:'b',ad:[{'name':'Narender','dd':4},{'name':'Bhupender','dd':22}]}),headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'} }).
        success(function(data, status, headers, config) {
            console.log(data);
        }).
        error(function(data, status, headers, config) {
            console.log(data);
        });
});
</script>

</body>
</html>
