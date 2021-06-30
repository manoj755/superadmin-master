// JavaScript Document
app.controller('FeesSlabCtrl', function ($scope, $rootScope, db, $mdDialog) {
    $('.validate').validate('#messagetemp');

    $scope.FeesSlabback = function () {
        $scope.isEditFeesSlab = false;
        $scope.FeesSlab = {};
    }

    $scope.EditFeesSlab = function (row) {
        $scope.isEdit = false;
        db.show("feesslab/", row.id, function (response) {
            debugger;
            $scope.isEditFeesSlab = true;
            $scope.FeesSlab = response.data;

        }, function (response) {
            //$scope.token=response.statusText;
        });

    };
    $scope.DeleteFeesSlab = function (row) {
        debugger;

        if (confirm('Are you sure?')) {
            db.destroy("feesslab/", row.id, function (response) {

                $rootScope.addmessageandremove('Deleted Successfully');
               $scope.getlist();


            }, function (response) {
                //$scope.token=response.statusText;
            });
        }

    };

    $scope.gridFeesSlab = {
        columnDefs: [

            {name: 'Action', width:'150',
                cellTemplate: '<a class=" btn-primary  btn-sm"  href="javascript:"  ng-click="grid.appScope.EditFeesSlab(row.entity)">Edit</a><a class=" btn-danger btn-sm"  href="javascript:"   ng-click="grid.appScope.DeleteFeesSlab(row.entity)">Delete</a>'},
            {field: "client_detail_id"},
	{field: "fromSlab"},
	{field: "toSlab"},
	{field: "AmountorPercentage"},
	{field: "isPercentage"},
	{field: "app_id"},
	
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

        db.list("feesslab/", null, function (response) {



            try {
                $scope.gridFeesSlab.data = response.data;
            } catch (e) {
                console.info(e);
            }

        }, function (response) {
            //$scope.token=response.statusText;
        });
    };
    $scope.getlist();



    $scope.FeesSlabsave = function () {
        
            
            db.store("feesslab/", $scope.FeesSlab, function (response) {

                $rootScope.addmessageandremove('Added Successfully');
                $scope.getlist();
                $scope.message = {};


            }, function (response) {
                $scope.errors=response.data;

            $scope.token=response.statusText;
        });
        
    };

    $scope.FeesSlabupdate = function () {
        db.update("feesslab/", $scope.FeesSlab.id, $scope.FeesSlab, function (response) {

            $scope.getlist();
            $rootScope.addmessageandremove('Updated Successfully');

        }, function (response) {
                $scope.errors=response.data;

            $scope.token=response.statusText;
        });
    };

});