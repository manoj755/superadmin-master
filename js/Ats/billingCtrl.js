// JavaScript Document
app.controller('billingCtrl', function ($scope, db,$rootScope, $mdDialog, FH) {
    
    $('.validate').validate('#addCandidate');
    $('.validate').validate('#addjob');
   
    $scope.msg = "hi charm";
    $scope.ishidereference = true;
     $scope.addtojobcandidates = function () {
          if ($('.validate').validate('#addjob', true)) {
        var copyjob = {'candidates': FH.SelectedCheckbox($scope.candidatedetails), 'job': $scope.copycandidate.job_id};
        db.store('copyjob/', copyjob, function (response) {

            console.log(response);
            alert('done');
        });
    }
     }

    $scope.gridOptions = {
        columnDefs: [

            {name: "--", cellTemplate: 'views/partialviews/candidate_in_job.php'}
        ],

        selectedItems: [],

        rowHeight: 80,

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
    db.list('clientdetail/', null, function (response) {
        $scope.clientdetails = response.data;
        console.log(response);

    });

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



    $scope.getlist = function () {

        db.list("billing/", null, function (response) {
            $scope.jobslist = response.data;
        }, function (response) {
            //$scope.token=response.statusText;
        });
    }
    $scope.getCandidateDetails = function () {
        //CandiDatedetail

        db.list("billing/", $scope.smartsearch, function (response) {
            $scope.candidatedetails = response.data;
            $scope.gridOptions.data = response.data;
            $scope.gridOptions.exporterAllDataFn = function () {
                return $scope.candidatedetails;
            }
        }, function (response) {
            //$scope.token=response.statusText;
        });
    }
    $scope.getCandidateDetails();
    $scope.getlist();
    $scope.addNewJobSave = function () {
        db.store("billing/", $scope.addnewjob, function (response) {
            alert('item saved');
            $scope.getlist();
            for (var i in $scope.addnewjob) {
                $scope.addnewjob[i] = '';
            }

        }, function (response) {
            alert('item save failed');
        });
    }

    $scope.showJob = function (id) {
        //$scope.job = job; 
        db.show("billing/", id, function (response) {
            $scope.job = response.data;

        }, function (response) {
            //$scope.token=response.statusText;
        });
    }


    $scope.updates = function () {
        db.update("billing/", $scope.updatedd.id, $scope.update, function (response) {
            console.log(response);

        }, function (response) {
            //$scope.token=response.statusText;
        });
    }
    $scope.deletes = function () {
        db.destroy("messagelogstatus/", $scope.delete.id, function (response) {
            console.log(response);

        }, function (response) {
            //$scope.token=response.statusText;
        });
    }


    $scope.status = '  ';
    $scope.customFullscreen = true;

    $scope.comment = function () {
        $mdDialog.show({
            contentElement: '#comment',
            parent: angular.element(document.body),
            clickOutsideToClose: true,
            fullscreen: false,
            disableParentScroll: false
        });
    };
    $scope.cancel = function () {
        $mdDialog.hide();
    }
    $scope.addjob = function () {

        console.log(FH.SelectedRow($scope.gridApi.selection.getSelectedRows()));
        $mdDialog.show({
            contentElement: '#addjob',
            parent: angular.element(document.body),
            clickOutsideToClose: true,
            fullscreen: false,
            disableParentScroll: false
        });
    };
    $scope.tabindex = 0;
    $scope.historyTabs = function (tabindex) {
        $scope.tabindex = tabindex;
        console.log($scope.tabindex);
    };

    $scope.addCandidateform = function () {
        $mdDialog.show({
            contentElement: '#addCandidate',
            parent: angular.element(document.body),
            clickOutsideToClose: true,
            fullscreen: false,
            disableParentScroll: false
        });

    }


});


