// JavaScript Document
app.controller('invoicesuperadmin', function ($scope, $rootScope, db, $mdDialog) {
    $('.validate').validate('#trackermaster');

    $scope.msg = "hi charm";
    $scope.ishidereference = true;
    $scope.back = function () {
        $scope.isEdit = false;
        $scope.channelmessage = {};
    }


    $scope.Reject = function (row) {
        debugger;

        if (confirm('Are you sure?')) {
            db.store("rejectedpaytopr/", {invoice_id: row.id}, function (response) {

                $rootScope.addmessageandremove('Rejected Successfully');
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
    $scope.paytopr = function (row) {
        debugger;

        if (confirm('Are you sure?')) {
            var obj = {invoice_id: row.id};
            db.store("paidtopr/", obj, function (response) {

                $rootScope.addmessageandremove('Paid Successfully');
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
    
    $scope.gridOptions = {
        columnDefs: [ 
           {name: 'Action',enableFiltering:false,
                cellTemplate: '<a class=" btn-primary  btn-sm"  href="javascript:"  ng-click="grid.appScope.paytopr(row.entity)">Pay </a><a class=" btn-danger btn-sm"  href="javascript:"   ng-click="grid.appScope.Reject(row.entity)">Reject</a>'},
            {name: 'candidate_name'},{name:'candidate_mobile'},{name:'candidate_email'},{name:'candidate_location'},{name:'candidate_designation'}, {name: 'invoice_status'}, {name: 'created_at'}, {name: 'updated_at'}, {name: 'ipAddress'}, {name: 'created_at'}, {name: 'updated_at'},
        ],
        //showHeader:false,
        // enableCellEditOnFocus:true,
        enableGridMenu: true, enableColumnResize: true,
        enableSelectAll: true, enableFiltering: true,
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

        db.list("invoicesuperadmin/", null, function (response) {
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





});

 