// JavaScript Document
app.controller('clientdetailsCtrl', function ($scope, $rootScope, db, $mdDialog) {
    $scope.clientdetails={"start":new Date().toISOString().slice(0, 10).replace('T', ' '), "end_date":"2000-01-01","appid":0  };

    $('.validate').validate('#addUser');
//    $.fn.addpopup('hi','msg');
    $scope.msg = "hi charm";
    $scope.ishidereference = true;
    
//$scope.Userback = function () {
//        $scope.isEditUser = false;
//        $scope.User = {};
//    };
//$scope.EditUser = function (row) {
//        $scope.isEdit = false;
//        db.show("user/", row.id, function (response) {
//            debugger;
//            $scope.isEditUser = true;
//            $scope.usernew = response.data;
//
//        }, function (response) {
//            //$scope.token=response.statusText;
//        });
//
//    };

          
    $scope.gridOptions = {
                                                                                                                                         

            columnDefs: [
                {field: 'id', name: 'id'},
            {field: 'app_name', name: 'app_name'},
            {field: 'total_candidates', name: 'total_candidates'},
            {field: 'cvparsed', name: 'cvparsed'},
            {name: 'cvaddedtojob',
                cellTemplate: '<a class="btn primary"  href="javascript:" data-toggle="modal" data-target="#myModal2" ng-click="grid.appScope.ShowCandidateClientWise(row.entity)">{{row.entity.cvaddedtojob}}</a>'},
            {field: 'total_status_change', name: 'total_status_change'},
         {field: 'extension_login',name:'extension_login', visible: true,
                cellTemplate: '<a class="btn primary"  href="javascript:" data-toggle="modal" data-target=".bd-example-modal-lg" ng-click="grid.appScope.showjobsClientWise(row.entity)">{{row.entity.extension_login}}</a>'},
            {field:'job_created',name: 'job_created',
                cellTemplate: '<a class="btn primary"  href="javascript:" data-toggle="modal" data-target="#myModal5" ng-click="grid.appScope.ShowcandidateStatusWiseSelected(row.entity)">{{row.entity.job_created}}</a>'},
            {field:'email_sent',name: 'email_sent',
                cellTemplate: '<a class="btn primary"  href="javascript:" data-toggle="modal" data-target="#myModal3" ng-click="grid.appScope.ShowcandidateStatusWiseRejected(row.entity)">{{row.entity.email_sent}}</a>'},
            {name: 'message_sent',
                cellTemplate: '<a class="btn primary"  href="javascript:" data-toggle="modal" data-target="#inprocessroot" ng-click="grid.appScope.ShowcandidateStatusWiseInProcess(row.entity)">{{row.entity.message_sent}}</a>'},
            {name: 'reference_recieved',
                cellTemplate: '<a class="btn primary"  href="javascript:" data-toggle="modal" data-target="#UnderReview" ng-click="grid.appScope.ShowcandidateStatusWiseUnderReview(row.entity)">{{row.entity.reference_recieved}}</a>'},
            
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
    
    
    $scope.getlistmain=function( row){
        //$scope.clientdetail.appid=6;
        debugger;
        $scope.clientdetails.start=row.start;
        $scope.clientdetails.end=row.end;
        db.list("app_report/", $scope.clientdetails,function(response)
        {
     $scope.gridOptions.data=response.data;
        },
                function (response) {
            //$scope.token=response.statusText;
            //db.sl();
        })
    
    };
    
    
    
    
    $scope.loadmanager = function () {
        var appid = document.getElementById('usersapp').value;
        db.list('data/users', {app_id: appid}, function (response) {
            $scope.users = response.data;
        });
    };

//    $scope.changepassword = function (row) {
//        $scope.user = row;
//    };
//
//    $scope.updatepassword = function () {
//        db.update('super/changepassword/', $scope.user.id, {'newpassword': $scope.newpassword}, function (response) {
//            alert('password changed successfully');
//            $('#myModal').modal('toggle');
//        }, function (response) {
//            alert('Please try again');
//        });
//    };



    $scope.changerole = function (appid) {

        appid = parseInt(appid);
        if (appid !== 0)
        {

            db.list('data/users', {app_id: appid}, function (response) {
                $scope.users = response.data;
            });
        }
    }
    $scope.getlist = function () {

        db.list("user/", null, function (response) {

            $scope.gridOption.columnDefs.push({name: 'Actions', cellTemplate:
                        '<div class="grid-action-cell">' +
                        '<a ng-click="deleteThisRow(row.entity);" href>Delete</a></div>'});

            for (var i in response.data) {
                for (var j in response.data[i])
                {
                    if (j == 'profilepic')
                    {
                        $scope.gridOptions.columnDefs.push({name: 'Profile', field: 'profilepic', width: 150, cellTemplate: '<div class="ui-grid-cell-contents"><img style="height:20px; width:auto;" src="{{COL_FIELD}}" /></div>'});
                    } else
                    {
                        $scope.gridOptions.columnDefs.push({name: j});

                    }


                }
                break;
            }

            $scope.gridOptions.data = response.data;

        }, function (response) {
            //$scope.token=response.statusText;
        });
    }
    // login detail
     $scope.loadlogindetail = function () {
     debugger;
        var start = moment().subtract(1, 'days');
        var end = moment();


        function cb(start, end) {
            //$('#smsemailrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            //load data

            db.list('app_report/', {'start': start.format('2018-04-23'), 'end': end.format('2017-07-23')}, function (response) {
                console.log(response.data);
                $scope.gridOptions.data=response.data;




//                var xval = ['x'];
//                var smssentval = ['Sms Sent'];
//                var QueuedSmsval = ['Queued Sms'];
//                var TotalSmsval = ['Total Sms'];
//                var EmailSentval = ['Email Sent'];
//                var QueuedEmailval = ['Queued Email'];
//                var TotalEmailval = ['Total Email'];
//
//
//                for (var i in response.data) {
//                    xval.push(response.data[i].name);
//                    smssentval.push(response.data[i].totalsmssent);
//                    QueuedSmsval.push(response.data[i].totalsmstosend);
//                    TotalSmsval.push(parseInt(response.data[i].totalsmssent) + parseInt(response.data[i].totalsmstosend));
//                    EmailSentval.push(response.data[i].totalemailsent);
//                    QueuedEmailval.push(response.data[i].totalemailtosend);
//                    TotalEmailval.push(parseInt(response.data[i].totalemailsent) + parseInt(response.data[i].totalemailtosend));
//                }
//
//                var smsmail = c3.generate({
//                    bindto: '#smsmail',
//                    data: {
//                        x: 'x',
//                        columns: [
//                            xval,
//                            smssentval,
//                            QueuedSmsval,
//                            TotalSmsval,
//                            EmailSentval,
//                            QueuedEmailval,
//                            TotalEmailval
//                        ],
//                        type: 'bar'
//                    },
//                    bar: {
//                        width: {
//                            ratio: 0.8 // this makes bar width 50% of length between ticks
//                        }
//                    },
//                    axis: {
//                        x: {
//                            type: 'category',
//                            tick: {
//                                rotate: 90,
//                                multiline: false
//                            },
//                            height: 150
//                        }
//                    }
//                });
//            }, function (response) {
//            });
//            //load data
//        }
//
//        $('#smsemailrange').daterangepicker({
//            startDate: start,
//            endDate: end,
//            ranges: {
//                'Today': [moment(), moment()],
//                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
//                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
//                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
//                'This Month': [moment().startOf('month'), moment().endOf('month')],
//                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
         cb)
     };

        cb(start, end);
    };
    $scope.loadlogindetail();
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
//    $scope.deleteThisRow = function (entity) {
//        console.log(entity);
//    }
    $scope.getlist();
    db.list('userrole/', {'gi': 'rolecreating'}, function (response) {
        $scope.roles = response.data;
    });
    db.list('application/', {'gi': 'rolecreating'}, function (response) {
        $scope.applications = response.data;
    });
//    db.list('master/country', {'gi': 'rolecreating'}, function (response) {
//        $scope.countries = response.data;
//    });
//    db.list('master/gender', {'gi': 'rolecreating'}, function (response) {
//        $scope.genders = response.data;
//    });







//    $scope.usersave = function () {
//        //$scope.user.profilepic=$scope.user.profilepic[0];
//
//        if ($('.validate').validate('#addUser', true)) {
//            //$scope.user.profilepic=$scope.user.profilepic[0];
//
//            $scope.usernew.app_id = document.getElementById('usersapp').value;
//            console.log($scope.usernew);
//
//                db.store("user/", $scope.usernew, function (response) {
//                $rootScope.addmessageandremove('User  Successfully');
//                $scope.getlist();
//                $scope.user = {};
//
//
//
//            });
//        }
//    }

    $scope.showuser = function (id) {
        //$scope.job = job; 
        db.show("user/", id, function (response) {
            $scope.job = response.data;

        }, function (response) {
            //$scope.token=response.statusText;
        });
    }


//    $scope.updateuser = function () {
//        db.update("user/", $scope.updatedd.id, $scope.update, function (response) {
//            console.log(response);
//
//        }, function (response) {
//            //$scope.token=response.statusText;
//        });
//    }
//    $scope.deleteuser = function () {
//        db.destroy("user/", $scope.delete.id, function (response) {
//            console.log(response);
//
//        }, function (response) {
//            //$scope.token=response.statusText;
//        });
//    }


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

//$scope.Userupdate = function () {
//        db.update("user/", $scope.User.id, $scope.User, function (response) {
//
//            $scope.getlist();
//            $rootScope.addmessageandremove('Updated Successfully');
//
//        }, function (response) {
//                $scope.errors=response.data;
//
//            $scope.token=response.statusText;
//        });
//    };




});
 