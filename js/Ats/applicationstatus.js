 
     // JavaScript Document
app.controller('ApplicationStatusCtrl', function ($scope, $rootScope, db, $mdDialog) {
    $('.validate').validate('#messagetemp');

    $scope.ApplicationStatusback = function () {
        $scope.isEditApplicationStatus = false;
        $scope.ApplicationStatus = {};
    }

    $scope.EditApplicationStatus = function (row) {
        $scope.isEdit = false;
        db.show("applicationstatus/", row.id, function (response) {
            debugger;
            $scope.isEditApplicationStatus = true;
            $scope.ApplicationStatus = response.data;

        }, function (response) {
            //$scope.token=response.statusText;
        });

    };
    $scope.DeleteApplicationStatus = function (row) {
        debugger;

        if (confirm('Are you sure?')) {
            db.destroy("applicationstatus/", row.id, function (response) {

                $rootScope.addmessageandremove('Deleted Successfully');
               $scope.getlist();


            }, function (response) {
                //$scope.token=response.statusText;
            });
        }

    };

    $scope.gridApplicationStatus = {
        columnDefs: [

            {name: 'Action', width:'150',
                cellTemplate: '<a class=" btn-primary  btn-sm"  href="javascript:"  ng-click="grid.appScope.EditApplicationStatus(row.entity)">Edit</a><a class=" btn-danger btn-sm"  href="javascript:"   ng-click="grid.appScope.DeleteApplicationStatus(row.entity)">Delete</a>'},
            {field: "status"},
	{field: "ipAddress"},
	
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

        db.list("applicationstatus/", null, function (response) {



            try {
                $scope.gridApplicationStatus.data = response.data;
            } catch (e) {
                console.info(e);
            }

        }, function (response) {
            //$scope.token=response.statusText;
        });
    };
    $scope.getlist();



    $scope.ApplicationStatussave = function () {
        
            
            db.store("applicationstatus/", $scope.ApplicationStatus, function (response) {

                $rootScope.addmessageandremove('Added Successfully');
                $scope.getlist();
                $scope.message = {};


            }, function (response) {
                $scope.errors=response.data;

            $scope.token=response.statusText;
        });
        
    };

    $scope.ApplicationStatusupdate = function () {
        db.update("applicationstatus/", $scope.ApplicationStatus.id, $scope.ApplicationStatus, function (response) {

            $scope.getlist();
            $rootScope.addmessageandremove('Updated Successfully');

        }, function (response) {
                $scope.errors=response.data;

            $scope.token=response.statusText;
        });
    };

});
     