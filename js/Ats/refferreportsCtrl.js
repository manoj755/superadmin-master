// JavaScript Document
app.controller('refferreportsCtrl', function ($scope, db, $mdDialog) {
$scope.gridRefferReport = {
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
      $scope.gridApiRefferReport = gridApi;
    }
  };
 
  
  
  
  
  
  
  
  
  
  
  
    $scope.getlist = function () {

        db.list("referrerreports/", null, function (response) {
         
            
            
            
       $scope.gridRefferReport.data =   response.data;

        }, function (response) {
            //$scope.token=response.statusText;
        });
    }
    
    
    
    
    $scope.deleteThisRow=function(entity){
        console.log(entity);
    }
    $scope.getlist();
   



  


   


 


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

 