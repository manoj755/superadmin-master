// JavaScript Document
app.controller('clientCtrl', function ($scope, $http,$rootScope,  db, $mdDialog) {
    
    $('.validate').validate('#myStaticDialog');
   
    $scope.msg = "hi charm";
    $scope.ishidereference = true;
    
    $scope.gridOptions = {
        columnDefs: [
            {name: "--", cellTemplate: 'views/partialviews/client.php'}
        ],
        rowHeight: 42,
        showHeader: false,
        // enableCellEditOnFocus:true,
        enableGridMenu: true, enableColumnResize: true,
        //enableSelectAll: true,
        paginationPageSizes: [5, 10, 25, 50, 75],
        paginationPageSize: 10,
        enableSelectAll:false,
        exporterCsvFilename: 'myFile.csv',
        exporterPdfDefaultStyle: {fontSize: 9},
        exporterPdfTableStyle: {margin: [30, 30, 30, 30]},
        exporterPdfTableHeaderStyle: {fontSize: 10, bold: true, italics: true, color: 'red'},
        exporterPdfHeader: {text: "Users", style: 'headerStyle'},
        exporterPdfFooter: function (currentPage, pageCount) {
            return {text: currentPage.toString() + ' of ' + pageCount.toString(), style: 'footerStyle'};
        },
        exporterPdfCustomFormatter: function (docDefinition) {
            docDefinition.styles.headerStyle = {fontSize: 22, bold: true};
            docDefinition.styles.footerStyle = {fontSize: 10, bold: true};
            return docDefinition;
        },
        exporterPdfOrientation: 'landscape',
        exporterPdfPageSize: 'LETTER',
        exporterPdfMaxGridWidth: 1000,
        exporterCsvLinkElement: angular.element(document.querySelectorAll(".custom-csv-link-location")),
        onRegisterApi: function (gridApi) {
            $scope.gridApi = gridApi;
        }
    };

    //$scope.feeslab = [{from: '0', to: '100', amt: '1000'}, {from: '100', to: '200', amt: '2000'}];
    $scope.feeslab = [];
    $scope.remove = function (idx, isupdate) {

        if (isupdate == 0) {
            
            $scope.feeslab.splice(idx,1);
        } else
        {
            
            $scope.client.fee_slab.splice(idx,1);
        }
    }
    $scope.addfeeslab = function (isupdate) {
         var numbers = /^[0-9]+$/;
         var lastAmount=0;
        if (isupdate == 1) {
            var isPercentage = true;
            var Type = "%";
            if ($scope.client.feeslabtype == "Fixed")
            {
                isPercentage = false;
                Type = "Fixed";
            }
            
            
              if($scope.fromfeesslab.match(numbers)&&$scope.tofeesslab.match(numbers)&&$scope.amt.match(numbers)){
                 if($scope.fromfeesslab < $scope.tofeesslab){
                  
                      angular.forEach($scope.fee_slab,function(value){
                 
                  
                       alert(value.to);
                 lastAmount=  value.to; 
                 
            })
                     alert(lastAmount);
                  if($scope.fromfeesslab>lastAmount){
                      alert('done');
            $scope.client.fee_slab.push({fromSlab: $scope.fromfeesslab, toSlab: $scope.tofeesslab, AmountorPercentage: $scope.amt, type: Type, isPercentage: isPercentage})
                        
                                            
                    }
                                                 else
                                                      window.alert('From Fees slab should be greater than 0 and last To-Fees Slab');
                                                             }
           else
               window.alert('To Fees slab should be greater than From Fees Slab');
        }
        else
            window.alert('Wrong Input Only Numbers Allow');
            
            
            
            
            
            
            } else
        {
            
            var isPercentage = true;
            var Type = "%";
            if ($scope.newclient.feeslabtype == "Fixed")
            {
                isPercentage = false;
                Type = "Fixed";
            }
            
            
             if($scope.fromfeesslab.match(numbers)&&$scope.tofeesslab.match(numbers)&&$scope.amt.match(numbers)){
                 if($scope.fromfeesslab < $scope.tofeesslab){
               
                      angular.forEach($scope.feeslab,function(value){
                 
                 
                 lastAmount=  value.to; 
                 
            })
                     
                  if($scope.fromfeesslab>lastAmount){
                      
            $scope.feeslab.push({from: $scope.fromfeesslab, to: $scope.tofeesslab, amt: $scope.amt, type: Type, ispercentage: isPercentage});
                        
                                            
                    }
                                                 else
                                                      window.alert('From Fees slab should be greater than 0 and last To-Fees Slab');
                                                             }
           else
               window.alert('To Fees slab should be greater than From Fees Slab');
        }
        else
            window.alert('Wrong Input Only Numbers Allow');
        }
    }
    
    
    //if ($rootScope.mp!=undefined || $rootScope.mp.client_detail_list) {
  db.list("clientdetail/", null, function (response) {
        $scope.clients = response.data;
        $scope.gridOptions.data = response.data;
        $scope.gridOptions.exporterAllDataFn = function () {
            return $scope.clients;
        }
    }, function (response) {
        //$scope.token=response.statusText;
    });
//}
    
    
    $scope.clientsave = function () {
        if ($('.validate').validate('#myStaticDialog', true)) {
        $scope.newclient.feeslab = $scope.feeslab;
        db.store("clientdetail/", $scope.newclient, function (response) {
           $rootScope.addmessageandremove('Client Data Successfully');
           $scope.cancel();
        }, function (response) {
            alert('please try again');
        });
    }
    }

    $scope.shows = function (clientid) {
        //$scope.client = client; 
        if ($rootScope.mp.client_detail_show) {
        db.show("clientdetail/", clientid, function (response) {
            $scope.client = response.data;
            $scope.client.contactDurationStart = new Date($scope.client.contactDurationStart);
            $scope.client.contactDurationEnd = new Date($scope.client.contactDurationEnd);

        }, function (response) {
            //$scope.token=response.statusText;
        });
    }
}


    $scope.clientupdate = function () {
        db.update("clientdetail/", $scope.client.id, $scope.client, function (response) {
            console.log(response);

        }, function (response) {
            //$scope.token=response.statusText;
        });
    }
    $scope.deletes = function () {
        db.destroy("messagelogstatus/", $scope.delete.id, function (response) {
            console.log(response);

        }, function (response) {
            //$scope.token=response.statusText;
        });
    }


//custom page logic begins
    $scope.tabindex = 0;
    $scope.clientTabs = function (tabindex) {
        $scope.tabindex = tabindex;
        console.log($scope.tabindex);
    }
//custom page logic ends
    $scope.status = '  ';
    $scope.customFullscreen = true;

    $scope.myStaticDialog = function () {
        $mdDialog.show({
            contentElement: '#myStaticDialog',
            parent: angular.element(document.body),
            clickOutsideToClose: true,
            fullscreen: false,
            disableParentScroll: false
        });
    };
    $scope.cancel = function () {
        $mdDialog.hide();
    }


});

 