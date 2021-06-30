// JavaScript Document
app.controller('reportCtrl', function ($scope, db, $mdDialog, $filter) { $scope.refreshgrid = function () {
        window.setTimeout(function () {
            $(window).resize();
            $(window).resize();
        }, 1000);
        window.setTimeout(function () {
            $(window).resize();
            $(window).resize();
        }, 2000);
        window.setTimeout(function () {
            $(window).resize();
            $(window).resize();
        }, 3000);
    }
    
    $scope.filterOptions = {
        filterText: ''
    };
    $scope.gridClientReports = {
        columnDefs: [{"field":"billingName","width":150},{"field":"email","width":150},
            {name: 'no_of_jobs', 
                cellTemplate: '<a class="btn primary"  href="javascript:" data-toggle="modal" data-target="#myModal6" ng-click="grid.appScope.ShowTotalCandidatejob(row.entity)">{{row.entity.no_of_jobs}}</a>'}
        
        
        
        
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

        db.list("clientreports/", null, function (response) {
            var datacolumn = [];
            for (var i in response.data) {
                for (var k in response.data[i]) {
                    //debugger;
                    datacolumn.push({'field': k, 'width': 150});
                }
                break;
            }
            console.log(JSON.stringify(datacolumn));


            $scope.gridClientReports.data = response.data;
            //console.log($scope.gridClientReports);

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

 