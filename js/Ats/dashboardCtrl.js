// JavaScript Document
app.controller('dashboardCtrl', function ($scope, db,$rootScope, $mdDialog, FH) {
    $('.validate').validate('#addCandidate');
    $('.validate').validate('#addjob');
     $('.validate').validate('#internaldata');

    $scope.msg = "hi charm";
    $scope.ishidereference = true;

    $scope.gridOptions = {
        columnDefs: [
            {name: "--", cellTemplate: 'views/partialviews/candidate_in_jobsd_dashboard.php'}
        ],
        rowHeight: 50,
        //showHeader: false,
        // enableCellEditOnFocus:true,
        enableGridMenu: true, enableColumnResize: true,
        //enableSelectAll: true,
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


    $scope.filterdropdown = '';
    $scope.process = 'all';
    $scope.mainprocess = 0;
    $scope.searchcandidatetext = '';
    $scope.loadCandidate = function () {
        var SelectedJob = FH.SelectedCheckboxWithComma($scope.jobslist);

        var Search = {
            filterdropdown: $scope.filterdropdown,
            process: $scope.process,
            mainprocess: $scope.mainprocess,
            searchcandidatetext: $scope.searchcandidatetext,
            selectedjob: SelectedJob
        };


        db.list("candidatesdetailmyjob/", Search, function (response) {

            $scope.candidatedetails = response.data;
            $scope.gridOptions.data = response.data;
            $scope.gridOptions.exporterAllDataFn = function () {
                return $scope.candidatedetails;

            }
        }, function (response) {
            //$scope.token=response.statusText;
        });
    }
    $scope.loadCandidate();

    $scope.filterbyJob = function () {
        $scope.loadCandidate();
    }
    $scope.filterdropdownfunction = function (choice, display) {
        $scope.filterdropdown = choice;
        $scope.displaydd = display;
        //$scope.filterbyJob();


    }
    $scope.filterdrbytab = function (mainprocess, childprocess) {
        $scope.process = childprocess;
        $scope.mainprocess = mainprocess;
        $scope.filterbyJob();


    }
    db.list('manager/', null, function (response) {
        $scope.managers = response.data;
        console.log(response);

    });
  
    
    db.list('clientdetail/', null, function (response) {
        $scope.clientdetails = response.data;
        console.log(response);

    });
    
    
     db.list('getinterviewschedule/', null, function (response) {
        $scope.getinterviewschedules = response.data;
        console.log(response.data);

    });
    
    
    db.list('getreminder/', null, function (response) {
        $scope.getreminders = response.data;
        console.log(response);

    });
    
    $scope.internaldata = function () {

        $mdDialog.show({
            contentElement: '#internaldata',
            parent: angular.element(document.body),
            clickOutsideToClose: true,
            fullscreen: false,
            disableParentScroll: false
        });
    };
    $scope.cancel = function () {
        $mdDialog.hide();
    }
    
 $scope.getcandidatebyclient = function () {

        db.list("addnewjob/", {clientId: $scope.copycandidate.client_detail_id}, function (response) {
            $scope.jobslistbyclients = response.data;
        }, function (response) {
            //$scope.token=response.statusText;
        });
    }
    
    $scope.candidatesave = function () {
       
        if ($('.validate').validate('#addCandidate', true)) {
            //$scope.user.profilepic=$scope.user.profilepic[0];
            db.store("candidatedetail/", $scope.store, function (response) {
              console.log(response);
              $rootScope.addmessageandremove('Assign Candidate Successfully');
                $scope.getlist();
                $scope.cancel();
                $scope.store = {};
               

            }, function (response) { });
        }
    }
db.list('master/country', {'gi': 'rolecreating'}, function (response) {
        $scope.countries = response.data;
    });
    db.list('master/gender', {'gi': 'rolecreating'}, function (response) {
        $scope.genders = response.data;
    });
 
});
