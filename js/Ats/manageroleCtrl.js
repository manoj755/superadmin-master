// JavaScript Document
app.controller('manageroleCtrl', function ($scope, db, $mdDialog, FH) {

    $scope.getlist = function () {

        db.list("userrole/", null, function (response) {
            $scope.roles = response.data;

        }, function (response) {
            //$scope.token=response.statusText;
        });
    }
    $scope.setcheckbox = function (area)
    {
        for (var i in area.permissions)
        {
            area.permissions[i].selected = area.selected;

        }

    }
    $scope.deleteThisRow = function (entity) {
        console.log(entity);
    }
    $scope.getlist();
    $scope.sameright=false;    
    $scope.getrolefunction = function () {
        if($scope.sameright) {
        
        }else{
        db.list('rolepermission', {role_id: $scope.role.role_id}, function (response) {
            
            $scope.rolepermissions = response.data;

            for (var j in $scope.areas) {
                for (var k in $scope.areas[j].permissions)
                {
                    //$scope.areas[j].permissions[k].selected=true; 
                    // console.log($scope.areas[j].permissions[k].id + '---' + $scope.rolepermissions[i].permission_id);
                    var exists = false;
                    for (var i in $scope.rolepermissions) {
                        var areapermissionid = $scope.areas[j].permissions[k].id;
                        var rolepermissionspermission_id = $scope.rolepermissions[i].permission_id;
                        console.log(areapermissionid+'---'+rolepermissionspermission_id);
                        if (areapermissionid == rolepermissionspermission_id) {
                            exists = true;
                            break;
                        }

                    }
                    $scope.areas[j].permissions[k].selected = exists;

                }
            }
        });
        }
    }
    db.list('area/', null, function (response) {
        $scope.areas = response.data;
    }, function (response) {

    });

    $scope.updatepermission = function () {
        var permissions = [];

        for (var i in $scope.areas) {
            var permission = FH.SelectedCheckbox($scope.areas[i].permissions);
            if (permission.length > 0) {
                for (var j in permission) {
                    permissions.push(permission[j]);
                }
            }
        }

        var copyjob = {'permissions': permissions, 'role_id': $scope.role.role_id};
        db.store('rolepermission/', copyjob, function (response) {

            console.log(response);
            alert('done');
        });

    }

    $scope.userrolesave = function () {
        //$scope.user.profilepic=$scope.userrole.profilepic[0];

        db.store("userrole/", $scope.userrole, function (response) {
            alert('item saved');
            $scope.getlist();
            $scope.userrole = {};


        });
    }

    $scope.showuserrole = function (id) {
        //$scope.job = job; 
        db.show("userrole/", id, function (response) {
            $scope.job = response.data;

        }, function (response) {
            //$scope.token=response.statusText;
        });
    }


    $scope.updateuserrole = function () {
        db.update("userrole/", $scope.updatedd.id, $scope.update, function (response) {
            console.log(response);

        }, function (response) {
            //$scope.token=response.statusText;
        });
    }
    $scope.deleteuserrole = function () {
        db.destroy("userrole/", $scope.delete.id, function (response) {
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



});

 