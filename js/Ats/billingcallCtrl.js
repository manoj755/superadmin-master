app.controller('billingcallCtrl', function ($scope, $rootScope, db, $mdDialog, FH) {

    db.list('application/', { 'gi': 'rolecreating' }, function (response) {
        $scope.applications = response.data;
    });


    $scope.Creditsave = function () {
        //$scope.user.profilepic=$scope.user.profilepic[0];
        $scope.creditnew.starts;

        if ($('.validate').validate('#addCredit', true)) {
            //$scope.user.profilepic=$scope.user.profilepic[0];
            if ($scope.creditnew.balancetype == 'Subscription') {
                debugger;
                $scope.creditnew.start = $scope.toYYMMDD($scope.creditnew.starts);
                $scope.creditnew.end = $scope.toYYMMDD($scope.creditnew.ends);
            }
            $scope.creditnew.app_id = document.getElementById('usersapp').value;
            console.log($scope.creditnew);
            db.store("billingdetail/", $scope.creditnew, function (response) {
       
                $rootScope.addmessageandremove(response.data.msg);
                for (const i in $scope.creditnew) {
                    if ($scope.creditnew[i]) {
                        $scope.creditnew[i] = '';
                    }
                  }
            });
        }

    }


    // $scope.checkrechargetype = function () {
    //     if ($scope.creditnew.balancetype == 'Subscription') {

    //     } else {

    //     }

    // }



    $scope.toYYMMDD = function (date) {
        let dd = date.getDate();

        let mm = date.getMonth() + 1;
        const yyyy = date.getFullYear();
        if (dd < 10) {
            dd = '0' + dd;
        }

        if (mm < 10) {
            mm = '0' + mm;
        }
        return yyyy + '-' + mm + '-' + dd;
    }
});