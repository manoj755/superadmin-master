// JavaScript Document
app.controller('profileCtrl', function($scope, $http,db,$mdDialog) {
  
     
 $scope.feeslab=[{from:'0',to:'100',amt:'1000'},{from:'100',to:'200',amt:'2000'}];
 $scope.remove=function(idx){
     $scope.feeslab.pop(idx);
 }
 $scope.addfeeslab=function(){
     $scope.feeslab.push({from:$scope.fromfeesslab,to:$scope.tofeesslab,amt:$scope.amt});
 }
 db.list("profile/",null,function (response) {$scope.clients = response.data; 
    },function(response){
        //$scope.token=response.statusText;
    });
// $scope.clientsave=function(){
//     $scope.newclient.feeslab=$scope.feeslab;
//        db.store("profile/",$scope.newclient,function (response) {
//            alert('data saved');
//    },function(response){
//        alert('please try again');
//    });}

 $scope.shows=function(clientid){
     //$scope.client = client; 
        db.show("profile/",clientid,function (response) { 
            $scope.client = response.data; 
            alert('thanks');
    },function(response){
        //$scope.token=response.statusText;
    });
     }
    

$scope.updateprofie = function () {
        db.update("profile/", 1, $scope.profile, function (response) {
            console.log(response);
            alert('update');
        }, function (response) {
            //$scope.token=response.statusText;
        });
    }
 $scope.deletes=function(){
        db.destroy("profile/",$scope.delete.id,function (response) { 
         console.log(response);
            
    },function(response){
        //$scope.token=response.statusText;
    });}


//custom page logic begins
$scope.tabindex=0;
$scope.ProfileTabs=function(tabindex){
    $scope.tabindex=tabindex;
    console.log($scope.tabindex);
}


//custom page logic ends
$scope.status = '  ';
  $scope.customFullscreen = true;

$scope.myStaticDialog=function(){
     $mdDialog.show({
    contentElement: '#myStaticDialog',
    parent: angular.element(document.body),  
      clickOutsideToClose:true,
      fullscreen: false,
      disableParentScroll:false
  });
};
$scope.cancel=function(){
    $mdDialog.hide();
}
   

});

 