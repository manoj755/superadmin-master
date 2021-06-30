// JavaScript Document
app.controller('jobreportsCtrl', function ($scope, db, $mdDialog, $filter) {
    $scope.filterOptions = {
        filterText: ''
    };
    $scope.gridJobReports = {
        columnDefs: [{"field":"id","width":150},{"field":"creater","width":150},{"field":"manager_id","width":150},{"field":"client_detail_id","width":150},{"field":"job_title","width":150},{"field":"jobDescription","width":150},{"field":"minimumExperience","width":150},{"field":"maximumExperience","width":150},{"field":"minimumSalary","width":150},{"field":"maximumSalary","width":150},{"field":"numberOfOpening","width":150},{"field":"referralBonus","width":150},{"field":"location","width":150},{"field":"Responsibility","width":150},{"field":"isapproved","width":150},{"field":"app_id","width":150},{"field":"ipAddress","width":150},{"field":"keyskills","width":150},{"field":"jobRole","width":150},{"field":"industry","width":150},{"field":"functionalArea","width":150},{"field":"job_status","width":150},{"field":"notes","width":150},{"field":"start_date","width":150},{"field":"end_date","width":150},{"field":"jobtype","width":150},{"field":"internshipduration","width":150},{"field":"internshipdurationunit","width":150},{"field":"isparttime","width":150},{"field":"contract","width":150},{"field":"contractunit","width":150},{"field":"contractrenewable","width":150},{"field":"freelancepayable","width":150}],
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
        enableHorizontalScrollbar: 1,
        minimumColumnSize: 100,
        enableFiltering: true,
        exporterPdfOrientation: 'landscape',
        exporterPdfPageSize: 'LETTER',
        exporterPdfMaxGridWidth: 1000,
        exporterCsvLinkElement: angular.element(document.querySelectorAll(".custom-csv-link-location")),
        onRegisterApi: function (gridApi) {
            $scope.gridApiClientReports = gridApi;
        }
    };











    $scope.getlist = function () {

        db.list("jobreports/", null, function (response) {
            var datacolumn = [];
            for (var i in response.data) {
                for (var k in response.data[i]) {
                    //debugger;
                    datacolumn.push({'field': k, 'width': 150});
                }
                break;
            }
            console.log(JSON.stringify(datacolumn));


            $scope.gridJobReports.data = response.data;
            //console.log($scope.gridJobReports);

        }, function (response) {
            //$scope.token=response.statusText;
        });
    }




    $scope.deleteThisRow = function (entity) {
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

 