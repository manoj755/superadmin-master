// JavaScript Document
app.controller('clientCtrl', function($scope, $http,db,$mdDialog) {
    
    $scope.email='adnan@scotch.io';
    $scope.password='secret';
    $scope.token='';
  
     
 
 db.list("clientdetail/",null,function (response) {$scope.clients = response.data; 
    },function(response){
        //$scope.token=response.statusText;
    });
 $scope.stores=function(){
        db.store("clientdetail/",$scope.store,function (response) {
            $scope.varname=true
    },function(response){
        //$scope.token=response.statusText;
    });}

 $scope.shows=function(clientid){
     //$scope.client = client; 
        db.show("clientdetail/",clientid,function (response) { 
            $scope.client = response.data; 
            
    },function(response){
        //$scope.token=response.statusText;
    });
     }


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


//custom page logic begins
$scope.tabindex=0;
$scope.clientTabs=function(tabindex){
    $scope.tabindex=tabindex;
    console.log($scope.tabindex);
}
//custom page logic ends
$scope.status = '  ';
  $scope.customFullscreen = false;

  $scope.showAlert = function(ev) {
    // Appending dialog to document.body to cover sidenav in docs app
    // Modal dialogs should fully cover application
    // to prevent interaction outside of dialog
    $mdDialog.show(
      $mdDialog.alert()
        .parent(angular.element(document.querySelector('#popupContainer')))
        .clickOutsideToClose(true)
        .title('This is an alert title')
        .textContent('You can specify some description text in here.')
        .ariaLabel('Alert Dialog Demo')
        .ok('Got it!')
        .targetEvent(ev)
    );
  };

  $scope.showConfirm = function(ev) {
    // Appending dialog to document.body to cover sidenav in docs app
    var confirm = $mdDialog.confirm()
          .title('Would you like to delete your debt?')
          .textContent('All of the banks have agreed to forgive you your debts.')
          .ariaLabel('Lucky day')
          .targetEvent(ev)
          .ok('Please do it!')
          .cancel('Sounds like a scam');

    $mdDialog.show(confirm).then(function() {
      $scope.status = 'You decided to get rid of your debt.';
    }, function() {
      $scope.status = 'You decided to keep your debt.';
    });
  };
  $scope.ngclicktest=function(){
      alert($scope.msg);
      
  }
$scope.myStaticDialog=function(){
     $mdDialog.show({
    contentElement: '#myStaticDialog',
    parent: angular.element(document.body),  
      clickOutsideToClose:true,
      fullscreen: $scope.customFullscreen 
  });
}
  $scope.showPrompt = function(ev) {
    // Appending dialog to document.body to cover sidenav in docs app
    var confirm = $mdDialog.prompt()
      .title('What would you name your dog?')
      .textContent('Bowser is a common name.')
      .placeholder('Dog name')
      .ariaLabel('Dog name')
      .initialValue('Buddy')
      .targetEvent(ev)
      .ok('Okay!')
      .cancel('I\'m a cat person');

    $mdDialog.show(confirm).then(function(result) {
      $scope.status = 'You decided to name your dog ' + result + '.';
    }, function() {
      $scope.status = 'You didn\'t name your dog.';
    });
  };

  $scope.showAdvanced = function(ev) {
    $mdDialog.show({
      controller: DialogController,
      templateUrl: 'views/client/customdialog.html',
      parent: angular.element(document.body),
      targetEvent: ev,
      clickOutsideToClose:true,
      fullscreen: $scope.customFullscreen // Only for -xs, -sm breakpoints.
    })
    .then(function(answer) {
      $scope.status = 'You said the information was "' + answer + '".';
    }, function() {
      $scope.status = 'You cancelled the dialog.';
    });
  };

  $scope.showTabDialog = function(ev) {
    $mdDialog.show({
      controller: DialogController,
      templateUrl: 'views/client/tab.html',
      parent: angular.element(document.body),
      targetEvent: ev,
      clickOutsideToClose:true
    })
        .then(function(answer) {
          $scope.status = 'You said the information was "' + answer + '".';
        }, function() {
          $scope.status = 'You cancelled the dialog.';
        });
  };

  $scope.showPrerenderedDialog = function(ev) {
    $mdDialog.show({
      controller: DialogController,
      contentElement: '#myDialog',
      parent: angular.element(document.body),
      targetEvent: ev,
      clickOutsideToClose: true
    });
  };

  function DialogController($scope, $mdDialog) {
    $scope.hide = function() {
      $mdDialog.hide();
    };

    $scope.cancel = function() {
      $mdDialog.cancel();
    };

    $scope.answer = function(answer) {
      $mdDialog.hide(answer);
    };
  }
  
  // control with data
  
   $scope.status = '  ';
    var questList = this;
    questList.allsQ = [];
    questList.openDialog = function($event) {
      $mdDialog.show({
        controller: function ($timeout, $q, $scope, $mdDialog) {
                var quest =this; 
                // you will be returning quest

                $scope.cancel = function($event) {
                $mdDialog.cancel();
                };
                $scope.finish = function($event) {
                $mdDialog.hide();
                };
                $scope.answer = function() {
                //pass quest to hide function.
                $mdDialog.hide(quest);
                };
                },
        controllerAs: 'questList',
        templateUrl: 'views/client/customdialog.html',
        parent: angular.element(document.body),
        targetEvent: $event,
        clickOutsideToClose:true,
         locals: {parent: $scope},
      })
     .then(function(quest) {

      //here quest has data you entered in model
      questList.allsQ.push({
         titolo: quest.titolo ,
         capitolo: quest.capitolo,
         descrizione: quest.descrizione,
         importo: quest.importo,
         data: quest.data
      });
      questList.titolo = '';
      questList.capitolo = '';
      questList.descrizione = '';
      questList.importo = '';
      questList.data = '';
      console.log(questList.allsQ);
      console.log(questList.allsQ.length);
    });
    };

});

app.controller('questList',function($scope){
    
    $scope.msg="narender";
    
    
    
});