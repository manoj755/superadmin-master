// JavaScript Document
app.controller('usersCtrl', function ($scope, $rootScope, db, $mdDialog) {

    $('.validate').validate('#addUser');
//    $.fn.addpopup('hi','msg');
    $scope.msg = "hi charm";
    $scope.ishidereference = true;
    
$scope.Userback = function () {
        $scope.isEditUser = false;
        $scope.User = {};
    };
$scope.EditUser = function (row) {
        $scope.isEdit = false;
        db.show("user/", row.id, function (response) {
            debugger;
            $scope.isEditUser = true;
            $scope.usernew = response.data;

        }, function (response) {
            //$scope.token=response.statusText;
        });

    };
    $scope.gridOptions = {
        columnDefs: [

            {name: 'Action',
                cellTemplate: '<a class=" btn-danger btn-sm" data-toggle="modal"  ng-click="grid.appScope.changepassword(row.entity)" data-target="#myModal"   href="javascript:"  ">Change</a>'},
//            {name: 'message'},
             {name: 'Edit', width:'70',
                cellTemplate: '<a class=" btn-primary  btn-sm"  href="javascript:"  ng-click="grid.appScope.EditUser(row.entity)">Edit</a>'},
            
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
    $scope.loadmanager = function () {
        var appid = document.getElementById('usersapp').value;
        db.list('data/users', {app_id: appid}, function (response) {
            $scope.users = response.data;
        });
    };

    $scope.changepassword = function (row) {
        $scope.user = row;
    };

    $scope.updatepassword = function () {
        db.update('super/changepassword/', $scope.user.id, {'newpassword': $scope.newpassword}, function (response) {
            alert('password changed successfully');
            $('#myModal').modal('toggle');
        }, function (response) {
            alert('Please try again');
        });
    };



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

            $scope.gridOptions.columnDefs.push({name: 'Actions', cellTemplate:
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
    $scope.deleteThisRow = function (entity) {
        console.log(entity);
    }
    $scope.getlist();
    db.list('userrole/', {'gi': 'rolecreating'}, function (response) {
        $scope.roles = response.data;
    });
    db.list('application/', {'gi': 'rolecreating'}, function (response) {
        $scope.applications = response.data;
    });
    db.list('master/country', {'gi': 'rolecreating'}, function (response) {
        $scope.countries = response.data;
    });
    db.list('master/gender', {'gi': 'rolecreating'}, function (response) {
        $scope.genders = response.data;
    });







    $scope.usersave = function () {
        //$scope.user.profilepic=$scope.user.profilepic[0];

        if ($('.validate').validate('#addUser', true)) {
            //$scope.user.profilepic=$scope.user.profilepic[0];

            $scope.usernew.app_id = document.getElementById('usersapp').value;
            console.log($scope.usernew);

                db.store("user/", $scope.usernew, function (response) {
                $rootScope.addmessageandremove('User  Successfully');
                $scope.getlist();
                $scope.user = {};



            });
        }
    }

    $scope.showuser = function (id) {
        //$scope.job = job; 
        db.show("user/", id, function (response) {
            $scope.job = response.data;

        }, function (response) {
            //$scope.token=response.statusText;
        });
    }


    $scope.updateuser = function () {
        db.update("user/", $scope.updatedd.id, $scope.update, function (response) {
            console.log(response);

        }, function (response) {
            //$scope.token=response.statusText;
        });
    }
    $scope.deleteuser = function () {
        db.destroy("user/", $scope.delete.id, function (response) {
            console.log(response);

        }, function (response) {
            //$scope.token=response.statusText;
        });
    }


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

$scope.Userupdate = function () {
        db.update("user/", $scope.User.id, $scope.User, function (response) {

            $scope.getlist();
            $rootScope.addmessageandremove('Updated Successfully');

        }, function (response) {
                $scope.errors=response.data;

            $scope.token=response.statusText;
        });
    };




});
 