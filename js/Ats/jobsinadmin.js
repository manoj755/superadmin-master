// JavaScript Document
app.controller('jobsinadminCtrl', function ($scope, $rootScope, db, $mdDialog) {
    $('.validate').validate('#messagetemp');

    $scope.msg = "hi charm";
    $scope.ishidereference = true;

$scope.back = function () {
        $scope.isEdit = false;
        $scope.job = {};
    }

    $scope.Edit = function (row) {

        $scope.isEdit = false;
        db.show("addnewjob/", row.id, function (response) {
            debugger;
            $scope.isEdit = true;
            $scope.addnewjob= response.data;
//            for (var i in response.data) {
//                for (var j in response.data[i]) {
//                    $scope.gridOptions.columnDefs.push({field:j});
//                }
//                break;
//            }


//            $scope.gridTotalJobs.data = response.data;

        }, function (response) {
            //$scope.token=response.statusText;
        });

    };
   
    $scope.currentjob = {};
    $scope.job_edit = function (row) {
        $scope.currentjob = row;


        db.show("addnewjob/", row.id, function (response) {



            $scope.myjob = response.data;
            $('#jdhtml').html($.parseHTML($scope.myjob.jobDescription));
            try {
                $scope.myjob.minimumSalary = parseInt($scope.myjob.minimumSalary);
                $scope.myjob.maximumSalary = parseInt($scope.myjob.maximumSalary);
            } catch (e) {

            }
            if ($scope.myjob.tracker_id != null) {
                $scope.myjob.tracker_id = $scope.myjob.tracker_id.toString();
            }

            try {
                $scope.myjob.client_detail_id = $scope.myjob.client_detail_id.toString();
                $scope.myjob.manager_id = $scope.myjob.manager_id.toString();
                $scope.location = $scope.myjob.location.toString().split(',');
            } catch (e) {
                console.log(e);
            }
            //functionalareas $scope.functionalArea = $scope.myjob.functionalArea.toString();
            if ($scope.myjob.functionalArea != null) {
                for (var i in $scope.functionalareas) {
                    if ($scope.myjob.functionalArea.toString() == $scope.functionalareas[i].functionalAreaName) {
                        //$scope.functionalArea = {"id": $scope.functionalareas[i].id, "functionalAreaName": $scope.functionalareas[i].functionalAreaName, "code": $scope.functionalareas[i].code, "ipAddress": $scope.functionalareas[i].ipAddress};
                        $scope.functionalArea = $scope.functionalareas[i];
                        $scope.getrole($scope.functionalArea);
                        break;
                    }


                }
            }
            //$scope.functionalArea=""
            try {
                $scope.myjob.Industry = $scope.myjob.industry.toString();
                $scope.myjob.changerole = $scope.myjob.changerole.toString();
            } catch (e) {
                console.log(e);
            }
            //
            $scope.changerole();
            //
            debugger;
            $('#submitjob').modal('show');
        }, function (response) {
            //$scope.token=response.statusText;
        });
    };
    $scope.changerole = function () {
        debugger;
        setTimeout(function () {
            if ($('#role').val() == 'Internship') {
                $('#internship').show();
            } else {
                $('#internship').hide();
            }

            if ($('#role').val() == 'Contract') {
                $('#contract').show();
            } else {
                $('#contract').hide();
            }

            if ($('#role').val() == 'Freelence') {
                $('#freelence').show();
            } else {
                $('#freelence').hide();
            }
        }, 10);
    };
    //$('jobsinsuperadmin').db({
    // "order": [[ 3, "desc" ]], //or asc 
    // "columnDefs" : [{"targets":3, "type":"job_id"}],
//});

    $scope.changestatus = function () {
        var row = $scope.currentjob;
        var approved = 1;
        if (row.Approved === 'Approved')
        {
            approved = 0;
        }
        db.update("jobsinsuperadmin/", row.id, {isapproved: approved}, function (response) {

            if ($scope.currentjob.Approved === 'Approved')
            {

                $scope.currentjob.Approved = 'Unapproved';
            } else
            {
                $scope.currentjob.Approved = 'Approved';
            }
            $scope.getlist();

//            for (var i in response.data) {
//                for (var j in response.data[i]) {
//                    $scope.gridOptions.columnDefs.push({field:j});
//                }
//                break;
//            }


//            $scope.gridTotalJobs.data = response.data;

        }, function (response) {
            //$scope.token=response.statusText;
        });

    };
    $scope.gridShowMessageTemplate = {
        columnDefs: [
//            {field: 'job_title', name: 'jobtitle'},
//            {name: 'Total_Candidate',
//                cellTemplate: '<a class="btn primary"  href="javascript:" data-toggle="modal" data-target="#myModal6" ng-click="grid.appScope.ShowTotalCandidatejob(row.entity)">{{row.entity.Total_Candidate}}</a>'}
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
            $scope.gridApigridShowMessageTemplate = gridApi;
        }
    };
    $scope.gridOptions = {
        columnDefs: [
            {name: 'Company Name', field: 'compnay_name'},

            {name: 'referralBonus'},
            {name: 'Created',field: 'created_at'},
            {name: 'id'},
            {name: 'Job Title',minWidth:'200', cellTemplate: '<a href="javascript:" data-toggle="modal" data-target="#myModal" ng-click="grid.appScope.job_edit(row.entity)">{{row.entity.job_title}}- {{row.entity.id}}</a>'},
            //cellTemplate: '<a href="javascript:" data-toggle="modal" data-target="#myModal" ng-click="grid.appScope.Job Title(row.entity)"></a>'},

            {name: 'status',
                field: 'Approved'},
            {name: 'Creater',
                field: 'creater'}
            
                
            
          
            
//{name:'job_title'},

                    //{name: 'jobDescription'},

                    //{name: 'referralBonus'},
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

        db.list("jobsinsuperadmin/", null, function (response) {



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
   



      $scope.usersave = function () {
        if ($('.validate').validate('#messagetemp', true)) {
            //$scope.user.profilepic=$scope.user.profilepic[0];
            db.store("messagetemplate/", $scope.message, function (response) {

                $rootScope.addmessageandremove('Data Successfully');
                $scope.getlist();
                $scope.message = {};


            });
        }
    }
   

    $scope.showuser = function (id) {
        //$scope.job = job; 
        db.show("messagetemplate/", id, function (response) {
            $scope.job = response.data;

        }, function (response) {
            //$scope.token=response.statusText;
        });
    }
    $scope.messageupdate = function () {
        db.update("messagetemplate/", $scope.message.id, $scope.update, function (response) {
            console.log(response);

        }, function (response) {
            //$scope.token=response.statusText;
        });
    }



    $scope.updateuser = function () {
        db.update("messagetemplate/", $scope.updatedd.id, $scope.update, function (response) {
            console.log(response);

        }, function (response) {
            //$scope.token=response.statusText;
        });
    }




    $scope.deleteuser = function () {
        db.destroy("messagetemplate/", $scope.delete.id, function (response) {
            console.log(response);
    
        }, function (response) {
            //$scope.token=response.statusText;
        });
    }
   
     $scope.Delete = function () {
        debugger;
 var row =$scope.currentjob;
        if (confirm('Are you sure?')) {
            db.destroy("addnewjob/", row.id, function (response) {

                $rootScope.addmessageandremove('Deleted Successfully');
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

 