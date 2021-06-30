// JavaScript Document
app.controller('applicationsCtrl', function ($scope, db, $mdDialog) {
$scope.gridOptions = {
    columnDefs: [
      
    ],
       //showHeader:false,
    // enableCellEditOnFocus:true,
    enableGridMenu: true, enableColumnResize: true,
    enableSelectAll: true,
     paginationPageSizes: [5,10,25, 50, 75],
    paginationPageSize: 10,
    exporterCsvFilename: 'myFile.csv',
    exporterPdfDefaultStyle: {fontSize: 9},
    exporterPdfTableStyle: {margin: [30, 30, 30, 30]},
    exporterPdfTableHeaderStyle: {fontSize: 10, bold: true, italics: true, color: 'red'},
    exporterPdfHeader: { text: "Users", style: 'headerStyle' },
    exporterPdfFooter: function ( currentPage, pageCount ) {
      return { text: currentPage.toString() + ' of ' + pageCount.toString(), style: 'footerStyle' };
    },
    exporterPdfCustomFormatter: function ( docDefinition ) {
      docDefinition.styles.headerStyle = { fontSize: 22, bold: true };
      docDefinition.styles.footerStyle = { fontSize: 10, bold: true };
      return docDefinition;
    },
    exporterPdfOrientation: 'landscape',
    exporterPdfPageSize: 'LETTER',
    exporterPdfMaxGridWidth: 1000,
    exporterCsvLinkElement: angular.element(document.querySelectorAll(".custom-csv-link-location")),
    onRegisterApi: function(gridApi){
      $scope.gridApi = gridApi;
    }
  };
    $scope.getlist = function () {
        debugger;
        db.list("application/", null, function (response) {
         
                 
       $scope.gridOptions.data =   response.data;

        }, function (response) {
            //$scope.token=response.statusText;
        });
    }
    $scope.deleteThisRow=function(entity){
        console.log(entity);
    }
    $scope.getlist();
   



    $scope.applicationsave = function () {
        //$scope.user.profilepic=$scope.userrole.profilepic[0];
        debugger;
        //$scope.application.is_no_job_on_pr=($scope.application.is_no_job_on_pr==null||$scope.application.is_no_job_on_pr==false?0:1);
        db.store("application/", $scope.application, function (response) {
            alert('item saved');
            $scope.getlist();
            $scope.application = {};


        });
    }


    $scope.showuser = function (id) {
        //$scope.job = job; 
        db.show("application/", id, function (response) {
            $scope.job = response.data;

        }, function (response) {
            //$scope.token=response.statusText;
        });
    }


    $scope.updateuser = function () {
        db.update("application/", $scope.updatedd.id, $scope.update, function (response) {
            console.log(response);

        }, function (response) {
            //$scope.token=response.statusText;
        });
    }
    $scope.deleteuser = function () {
        db.destroy("application/", $scope.delete.id, function (response) {
            console.log(response);

        }, function (response) {
            //$scope.token=response.statusText;
        });
    }


    $scope.status = '  ';
    $scope.customFullscreen = true;

    $scope.userform = function () {
        $mdDialog.show({
            contentElement: '#userform',
            parent: angular.element(document.body),
            clickOutsideToClose: true,
            fullscreen: false,
            disableParentScroll: false
        });
    };
    $scope.cancel = function () {
        $mdDialog.hide();
    }

    $scope.testForm = function () {
        $mdDialog.show({
            contentElement: '#testform',
            parent: angular.element(document.body),
            clickOutsideToClose: true,
            fullscreen: false,
            disableParentScroll: false
        });
    };




});

 