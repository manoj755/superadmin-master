
     // JavaScript Document
app.controller('MessageLogsCtrl', function ($scope, $rootScope, db, $mdDialog) {
    $('.validate').validate('#messagetemp');

    $scope.MessageLogsback = function () {
        $scope.isEditMessageLogs = false;
        $scope.MessageLogs = {};
    };

    $scope.EditMessageLogs = function (row) {
        $scope.isEdit = false;
        db.show("messagelogs/", row.id, function (response) {
            debugger;
            $scope.isEditMessageLogs = true;
            $scope.MessageLogs = response.data;

        }, function (response) {
            //$scope.token=response.statusText;
        });

    };
    $scope.DeleteMessageLogs = function (row) {
        debugger;

        if (confirm('Are you sure?')) {
            db.destroy("messagelogs/", row.id, function (response) {

                $rootScope.addmessageandremove('Deleted Successfully');
               $scope.getlist();


            }, function (response) {
                //$scope.token=response.statusText;
            });
        }

    };

    $scope.gridMessageLogs = {
        columnDefs: [

            {name: 'Action', width:'150',
                cellTemplate: '<a class=" btn-primary  btn-sm"  href="javascript:"  ng-click="grid.appScope.EditMessageLogs(row.entity)">Edit</a><a class=" btn-danger btn-sm"  href="javascript:"   ng-click="grid.appScope.DeleteMessageLogs(row.entity)">Delete</a>'},
            {field: "message"},
	{field: "templateId"},
	{field: "messageType"},
	{field: "subject"},
	{field: "sendedTo"},
	{field: "sendedCC"},
	{field: "sendedBCC"},
	{field: "sendedBy"},
	{field: "attachment"},
	{field: "isSend"},
	{field: "toBeSentDate"},
	{field: "sentDate"},
	{field: "app_id"},
	{field: "ipAddress"},
	{field: "response"},
	{field: "templateno"},
	{field: "atsid"},
	{field: "isSuperAdmin"}
	
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

        db.list("messagelogs/", null, function (response) {



            try {
                $scope.gridMessageLogs.data = response.data;
            } catch (e) {
                console.info(e);
            }

        }, function (response) {
            //$scope.token=response.statusText;
        });
    };
    $scope.getlist();



    $scope.MessageLogssave = function () {
        
            
            db.store("messagelogs/", $scope.MessageLogs, function (response) {

                $rootScope.addmessageandremove('Added Successfully');
                $scope.getlist();
                $scope.message = {};


            }, function (response) {
                $scope.errors=response.data;

            $scope.token=response.statusText;
        });
        
    };

    $scope.MessageLogsupdate = function () {
        db.update("messagelogs/", $scope.MessageLogs.id, $scope.MessageLogs, function (response) {

            $scope.getlist();
            $rootScope.addmessageandremove('Updated Successfully');

        }, function (response) {
                $scope.errors=response.data;

            $scope.token=response.statusText;
        });
    };

});