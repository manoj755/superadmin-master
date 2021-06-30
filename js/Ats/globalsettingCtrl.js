// JavaScript Document
app.controller('globalsettingCtrl', function ($scope, $rootScope, db, $mdDialog) {
    $('.validate').validate('#trackermaster');

    $scope.msg = "hi charm";
    $scope.ishidereference = true;
    $scope.back = function () {
        $scope.isEdit = false;
        $scope.channelmessage = {};
    }

    $scope.Edit = function (row) {
        debugger;
        $scope.isEdit = true;   $scope.channelmessage=row;
//        db.show("channel/", row.id, function (response) {
//            debugger;
//            $scope.isEdit = true;
//            $scope.channelmessage = response.data;
////            for (var i in response.data) {
////                for (var j in response.data[i]) {
////                    $scope.gridOptions.columnDefs.push({field:j});
////                }
////                break;
////            }
//
//
////            $scope.gridTotalJobs.data = response.data;
//
//        }, function (response) {
//            //$scope.token=response.statusText;
//        });

    };
    $scope.Delete = function (row) {
        debugger;

        if (confirm('Are you sure?')) {
            db.destroy("globalsetting/", row.id, function (response) {

                $rootScope.addmessageandremove('Deleted Successfully');
//            for (var i in response.data) {
//                for (var j in response.data[i]) {
//                    $scope.gridOptions.columnDefs.push({field:j});
//                }
//                break;
//            }
                $scope.getlist();

//            $scope.gridTotalJobs.data = response.data;

            }, function (response) {
                //$scope.token=response.statusText;
            });
        }

    };
    $scope.gridShowChannelTemplate = {
        columnDefs: [
            {name: 'Action',
                cellTemplate: '<a class=" btn-primary  btn-sm"  href="javascript:"  ng-click="grid.appScope.Edit(row.entity)">Edit</a><a class=" btn-danger btn-sm"  href="javascript:"   ng-click="grid.appScope.Delete(row.entity)">Delete</a>'},
            {name: 'id'},{name: 'terms'},{name: 'support'},{name: 'created_at'},{name: 'updated_at'},{name: 'ipAddress'},{name: 'created_at'},{name: 'updated_at'},
        ],
        //showHeader:false,
        // enableCellEditOnFocus:true,
        enableGridMenu: true, enableColumnResize: true,
        enableSelectAll: true,
        paginationPageSizes: [5, 10, 25, 50, 75],
        paginationPageSize: 10,
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
            $scope.gridApigridShowChannelTemplate = gridApi;
        }
    };
    $scope.gridOptions = {
         columnDefs: [
            {name: 'Action',
                cellTemplate: '<a class=" btn-primary  btn-sm"  href="javascript:"  ng-click="grid.appScope.Edit(row.entity)">Edit</a><a class=" btn-danger btn-sm"  href="javascript:"   ng-click="grid.appScope.Delete(row.entity)">Delete</a>'},
            {name: 'terms'},{name: 'support'},{name: 'created_at'},{name: 'updated_at'},{name: 'ipAddress'},{name: 'created_at'},{name: 'updated_at'},
        ],
        //showHeader:false,
        // enableCellEditOnFocus:true,
        enableGridMenu: true, enableColumnResize: true,
        enableSelectAll: true,
        paginationPageSizes: [5, 10, 25, 50, 75],
        paginationPageSize: 10,
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
    $scope.getlist = function () {

        db.list("globalsetting/", null, function (response) {
            debugger;


            try {
                $scope.gridOptions.data = response.data;
            } catch (e) {
                console.info(e);
            }

        }, function (response) {
            //$scope.token=response.statusText;
        });
    }
    $scope.deleteThisRow = function (entity) {
        console.log(entity);
    }
    $scope.getlist();



    $scope.channelsave = function () {
              debugger;
          
         
         $scope.isEdit = false;
           
            //$scope.user.profilepic=$scope.user.profilepic[0];
            db.store("globalsetting/", $scope.channelmessage, function (response) {

                 $rootScope.addmessageandremove('Added Successfully');
                $scope.getlist();
             


            });

    }


    $scope.showuser = function (id) {
        
//        $scope.channel.channel;
        db.show("globalsetting/",id, function (response) {
            $scope.channelmessage = response.data;

        }, function (response) {
            //$scope.token=response.statusText;
        });
    }
    $scope.trackerupdate = function () {
        debugger;
        db.update("globalsetting/", $scope.channelmessage.id, $scope.channelmessage, function (response) {

            $scope.getlist();
            $rootScope.addmessageandremove('Updated Successfully');

        }, function (response) {
            
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

 