 // JavaScript Document
app.controller('usererCtrl', function ($scope, $rootScope, db, $mdDialog) {
    $('.validate').validate('#messagetemp');

    $scope.usererback = function () {
        $scope.isEdituserer = false;
        $scope.userer = {};
    }

    $scope.Edituserer = function (row) {
        $scope.isEdit = false;
        db.show("userer/", row.id, function (response) {
            debugger;
            $scope.isEdituserer = true;
            $scope.userer = response.data;

        }, function (response) {
            //$scope.token=response.statusText;
        });

    };
    $scope.Deleteuserer = function (row) {
        debugger;

        if (confirm('Are you sure?')) {
            db.destroy("userer/", row.id, function (response) {

                $rootScope.addmessageandremove('Deleted Successfully');
               $scope.getlist();


            }, function (response) {
                //$scope.token=response.statusText;
            });
        }

    };

    $scope.griduserer = {
        columnDefs: [

            {name: 'Action', width:'150',
                cellTemplate: '<a class=" btn-primary  btn-sm"  href="javascript:"  ng-click="grid.appScope.Edituserer(row.entity)">Edit</a><a class=" btn-danger btn-sm"  href="javascript:"   ng-click="grid.appScope.Deleteuserer(row.entity)">Delete</a>'},
            {field: "role_id"},
	{field: "email"},
	{field: "name"},
	//{field: "password"},
	//{field: "gender"},
	//{field: "profilepic"},
	//{field: "country"},
	//{field: "state"},
	//{field: "city"},
	//{field: "location"},
	//{field: "phoneNo"},
	{field: "mobileNo"},
	{field: "address"},
	//{field: "dob"},
	{field: "app_id"},
	//{field: "manager"},
	//{field: "loginId"},
	{field: "ipAddress"},
	//{field: "mailpassword"},
	//{field: "otp"},
	//{field: "channel_id"},
	//{field: "current_job_id"},
	//{field: "reference_email_template_id"},
	//{field: "reference_sms_template_id"},
	//{field: "isvendor"},
	//{field: "signout"},
	//{field: "is_send_auto_email_reference"},
	//{field: "user_agent"},
	//{field: "last_ip"},
	//{field: "port"},
	//{field: "outgoing_server"},
	{field: "ssl_details"},
	{field: "driver"},
	{field: "secondusername"},
	
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

        db.list("userer/", null, function (response) {



            try {
                $scope.griduserer.data = response.data;
            } catch (e) {
                console.info(e);
            }

        }, function (response) {
            //$scope.token=response.statusText;
        });
    };
    $scope.getlist();



    $scope.userersave = function () {
        
            
            db.store("userer/", $scope.userer, function (response) {

                $rootScope.addmessageandremove('Added Successfully');
                $scope.getlist();
                $scope.message = {};


            }, function (response) {
                $scope.errors=response.data;

            $scope.token=response.statusText;
        });
        
    };

    $scope.usererupdate = function () {
        db.update("userer/", $scope.userer.id, $scope.userer, function (response) {

            $scope.getlist();
            $rootScope.addmessageandremove('Updated Successfully');

        }, function (response) {
                $scope.errors=response.data;

            $scope.token=response.statusText;
        });
    };

});