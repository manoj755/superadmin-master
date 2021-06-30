// JavaScript Document
app.controller('schedulemailerCtrl', function ($scope, $rootScope, db, $mdDialog) {
    db.list('superadminmessagetemplate',{},function(response){
        $scope.superadminmessagetemplates=response.data;
        //$scope.recievertypes=response.data;
    });
    db.list('recievertype',{},function(response){
       $scope.recievertypes=response.data;
    });
    $scope.usersave = function () {
        //$scope.user.profilepic=$scope.user.profilepic[0];
        db.store("schedulemailer/", $scope.ScheduleMailer, function (response) {
            $rootScope.addmessageandremove('Added Successfully');
            $scope.getlist();
            $scope.message = {};


        },function (response) {
                $scope.errors=response.data;

            $scope.token=response.statusText;
        }
    )};
    
    $scope.error={};
    $scope.save=function(){
        var goto=false;
        if(ScheduleMailer.name=='undefined' || ScheduleMailer.name==''){
            ScheduleMailername=['name is required'];
        }
        else{
            goto=true;
        }
    }


});