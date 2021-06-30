// JavaScript Document
app.controller('smsunsubscriberCtrl', function ($scope, $rootScope, db, $mdDialog) {
    $('.validate').validate('#messagetemp');

    $scope.msg = "hi charm";
    $scope.ishidereference = true;
    $scope.back = function () {
        $scope.isEdit = false;
        $scope.smsmessage = {};
    }

    $scope.Edit = function (row) {

        $scope.isEdit = false;
        db.show("smsunsubscriber/", row.id, function (response) {
            debugger;
            $scope.isEdit = true;
            $scope.smsmessage = response.data;
//            for (var i in response.data) {
//                for (var j in response.data[i]) {
//                    $scope.gridOptions.columnDefs.push({field:j});
//                }
//                break;
//            }


//            $scope.gridTotalJobs.data = response.data;

        }, function (response) {
            //$scope.token=response.statusText;
        });

    };
    $scope.Delete = function (row) {
        debugger;

        if (confirm('Are you sure?')) {
            db.destroy("smsunsubscriber/", row.id, function (response) {

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
    $scope.gridShowMessageTemplate = {
        columnDefs: [
//            {name: 'Action',
//                cellTemplate: '<a class=" btn-primary  btn-sm"  href="javascript:"  ng-click="grid.appScope.Edit(row.entity)">Edit</a><a class=" btn-danger btn-sm"  href="javascript:"   ng-click="grid.appScope.Delete(row.entity)">Delete</a>'},
//           {name: 'sms'},{name: 'created_at'},{name: 'updated_at'},{name: 'ipAddress'},
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
            $scope.gridApigridShowMessageTemplate = gridApi;
        }
    };
    $scope.gridOptions = {
        columnDefs: [

            {name: 'Action',
                cellTemplate: '<a class=" btn-primary  btn-sm"  href="javascript:"  ng-click="grid.appScope.Edit(row.entity)">Edit</a><a class=" btn-danger btn-sm"  href="javascript:"   ng-click="grid.appScope.Delete(row.entity)">Delete</a>'},
           {name: 'sms'},{name: 'created_at'},{name: 'updated_at'},{name: 'ipAddress'},
           
//            {name: 'message'},
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

        db.list("smsunsubscriber/", null, function (response) {



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



    $scope.messagesave = function () {
        if ($('.validate').validate('#messagetemp', true)) {
            //$scope.user.profilepic=$scope.user.profilepic[0];
            db.store("smsunsubscriber/", $scope.smsmessage, function (response) {

                $rootScope.addmessageandremove('Added Successfully');
                $scope.getlist();
                $scope.message = {};


            });
        }
    }


    $scope.showuser = function (id) {
        //$scope.job = job; 
        db.show("smsunsubscriber/", id, function (response) {
//            $scope.job = response.data;

        }, function (response) {
            //$scope.token=response.statusText;
        });
    }
    $scope.messageupdate = function () {
        db.update("smsunsubscriber/", $scope.smsmessage.id, $scope.smsmessage, function (response) {

            $scope.getlist();
            $rootScope.addmessageandremove('Updated Successfully');

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

 