 // JavaScript Document
app.controller('SuperAdminMessageTemplateCtrl', function ($scope, $rootScope, db, $mdDialog) {
    $('.validate').validate('#messagetemp');

    $scope.SuperAdminMessageTemplateback = function () {
        $scope.isEditSuperAdminMessageTemplate = false;
        $scope.SuperAdminMessageTemplate = {};
    }

    $scope.EditSuperAdminMessageTemplate = function (row) {
        $scope.isEdit = false;
        db.show("superadminmessagetemplate/", row.id, function (response) {
            debugger;
            $scope.isEditSuperAdminMessageTemplate = true;
            $scope.SuperAdminMessageTemplate = response.data;

        }, function (response) {
            //$scope.token=response.statusText;
        });

    };
    $scope.DeleteSuperAdminMessageTemplate = function (row) {
        debugger;

        if (confirm('Are you sure?')) {
            db.destroy("superadminmessagetemplate/", row.id, function (response) {

                $rootScope.addmessageandremove('Deleted Successfully');
               $scope.getlist();


            }, function (response) {
                //$scope.token=response.statusText;
            });
        }

    };

    $scope.gridSuperAdminMessageTemplate = {
        columnDefs: [

            {name: 'Action', width:'150',
                cellTemplate: '<a class=" btn-primary  btn-sm"  href="javascript:"  ng-click="grid.appScope.EditSuperAdminMessageTemplate(row.entity)">Edit</a><a class=" btn-danger btn-sm"  href="javascript:"   ng-click="grid.appScope.DeleteSuperAdminMessageTemplate(row.entity)">Delete</a>'},
            {field: "templateType"},
	{field: "title"},
	{field: "message"},
	{field: "added_by"},
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

        db.list("superadminmessagetemplate/", null, function (response) {



            try {
                $scope.gridSuperAdminMessageTemplate.data = response.data;
            } catch (e) {
                console.info(e);
            }

        }, function (response) {
            //$scope.token=response.statusText;
        });
    };
    $scope.getlist();



    $scope.SuperAdminMessageTemplatesave = function () {
        
            
            db.store("superadminmessagetemplate/", $scope.SuperAdminMessageTemplate, function (response) {

                $rootScope.addmessageandremove('Added Successfully');
                $scope.getlist();
                $scope.message = {};


            }, function (response) {
                $scope.errors=response.data;

            $scope.token=response.statusText;
        });
        
    };

    $scope.SuperAdminMessageTemplateupdate = function () {
        db.update("superadminmessagetemplate/", $scope.SuperAdminMessageTemplate.id, $scope.SuperAdminMessageTemplate, function (response) {

            $scope.getlist();
            $rootScope.addmessageandremove('Updated Successfully');

        }, function (response) {
                $scope.errors=response.data;

            $scope.token=response.statusText;
        });
    };

});