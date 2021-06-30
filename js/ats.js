var app = angular.module("myApp", ["ngRoute", 'ngMaterial', 'ngTouch', 'ui.grid', 'ui.grid.selection', 'ui.grid.pagination', 'ui.grid.exporter', 'ui.grid.edit', 'ui.grid.cellNav']);
var LoginURL = 'login.php';//"ngFileUpload",
//var ServiceURL = 'http://localhost:8000/index.php/api/';
//var rooturi = 'http://localhost:8000/index.php/';

//var ServiceURL = 'http://localhost:8080/laravel/laravelpr/public/index.php/api/';
//var rooturi="http://localhost:8080/laravel/laravelpr/public/";
//
//var ServiceURL = 'http://localhost:8080/laravel/public/index.php/api/';
//var rooturi = "http://localhost:8080/laravel/public/";

//var ServiceURL = 'http://localhost:8080/laravel/public/index.php/api/';
//var rooturi="http://localhost:8080/laravel/public/";
//var ServiceURL = 'http://localhost/laravelpr/public/index.php/api/';
//var ServiceURL = 'http://api.passivereferral.com/index.php/api/';

//var ServiceURL = 'http://localhost:8080/laravel/public/index.php/api/';
//var rooturi = "http://localhost:8080/laravel/public/";
//var ServiceURL = 'http://localhost/laravelpr/public/index.php/api/';
// var ServiceURL = 'http://api.passivereferral.com/index.php/api/';
var ServiceURL = 'http://127.0.0.1:8000/index.php/api/';

// var rooturi = "http://api.passivereferral.com/";
var rooturi = 'http://127.0.0.1:8000/';
var CurrentURL = '';
function getParameterByName(name, url) {
    if (!url) {
        url = window.location.href;
    }
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results)
        return null;
    if (!results[2])
        return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}
function getReturnURL() {
    var URL = window.location.href;
    URL = URL.split('?');
    if (URL.length < 2) {
        return '';
    }
    URL = URL[1].split('=');
    if (URL.length < 2) {
        return '';
    }
    return URL[1];
}
var gotologin = function () {
    if (CurrentURL === undefined || CurrentURL === '') {
        window.location.href = LoginURL;
    } else {
        window.location.href = LoginURL + '?returnurl=' + CurrentURL;

    }
}
app.directive("fileread", [function () {
    return {
        scope: {
            fileread: "="
        },
        link: function (scope, element, attributes) {
            element.bind("change", function (changeEvent) {
                var reader = new FileReader();
                reader.onload = function (loadEvent) {
                    scope.$apply(function () {
                        scope.fileread = loadEvent.target.result;
                    });
                }
                reader.readAsDataURL(changeEvent.target.files[0]);
            });
        }
    }
}]);
app.directive('ngFiles', ['$parse', function ($parse) {

    function fn_link(scope, element, attrs) {
        var onChange = $parse(attrs.ngFiles);
        element.on('change', function (event) {
            onChange(scope, { $files: event.target.files });
        });
    }
    ;

    return {
        link: fn_link
    }
}]);
app.filter('capsname', function () {
    return function (x) {

        var txt = "";
        x = x.replace('_', " ");
        txt = x.toUpperCase();
        //        for (i = 0; i < x.length; i++) {
        //            c = x[i];
        //            if (i % 2 == 0) {
        //                c = c.toUpperCase();
        //            }
        //            txt += c;
        //        }

        return txt;
    };
});
app.config(function ($routeProvider, $locationProvider) {
    $routeProvider
        .when("/dashboard/:type/:id", {
            templateUrl: "views/dashboard.php"
            //        ,controller: "dashboardCtrl"

        })
        .when("/history", {
            templateUrl: "views/history.php"

        })
        .when("/clientdetails", {
            templateUrl: "views/clientdetails.php"

            //        ,controller: "historyCtrl"
        })
        .when("/report", {
            templateUrl: "views/report.php"
            //        ,controller: "reportCtrl"
        })
        .when("/myjob", {
            templateUrl: "views/myjob.php"
            //                ,controller: "myjobCtrl"
        })
        .when("/profile", {
            templateUrl: "views/profile.php"
            //        ,controller: "profileCtrl"
        }).when("/messagetemplates", {
            templateUrl: "views/messagetemplates.php"
            //        ,controller: "profileCtrl"

        }).when("/leaddata", {
            templateUrl: "views/leaddata.php"
            //        ,controller: "internaldataCtrl"
        })
        .when("/crmmessagetemplates", {
            templateUrl: "views/crmmessagetemplates.php"
            //        ,controller: "internaldataCtrl"
        }).when("/mylead", {
            templateUrl: "views/mylead.php"
            //        ,controller: "internaldataCtrl"
        }).when("/messagelog", {
            templateUrl: "views/messagelog.php"
            //        ,controller: "messageLogCtrl"
        }).when("/smslog", {
            templateUrl: "views/smslog.php"
            //        ,controller: "smsLogCtrl"
        }).when("/client", {
            templateUrl: "views/client.php"
            //        ,controller: "clientCtrl"
        }).when("/internaldata", {
            templateUrl: "views/internaldata.php"
            //        ,controller: "internaldataCtrl"
        }).when("/invoice", {
            templateUrl: "views/invoice.php"
            //        
        }).when("/users", {
            templateUrl: "views/users.php"
            //        ,controller: "usersCtrl"

        }).when("/applications", {
            templateUrl: "views/applications.php"
            //        ,controller: "applicationsCtrl"

        }).when("/parseresume", {
            templateUrl: "views/parseresume.php"
            //        ,controller: "parseresumeCtrl"
        }).when("/managerole", {
            templateUrl: "views/managerole.php"
            //        ,controller: "manageroleCtrl"
        }).when("/billingcall", {
            templateUrl: "views/billingcall.php"
            //        ,controller: "billingcallCtrl"
        })
        .when("/webbeacon", {
            templateUrl: "views/webbeacon.php"
            //        ,controller: "webbeaconCtrl"
        }).when("/billing", {
            templateUrl: "views/billing.php"
            //        ,controller: "billingCtrl"
        }).when("/referredcandidate", {
            templateUrl: "views/referredcandidate.php"
            //        ,controller: "referredcandidateCtrl"

        }).when("/jobsinadmin", {
            templateUrl: "views/jobsinadmin.php"
            //        ,controller: "clientreportCtrl"
        }).when("/clientreport", {
            templateUrl: "views/clientreport.php"
            //        ,controller: "clientreportCtrl"
        }).when("/report", {
            templateUrl: "views/report.php"
            //        ,controller: "clientreportCtrl"
        }).when("/refferreports", {
            templateUrl: "views/refferreports.php"
            //        ,controller: "clientreportCtrl"
        }).when("/jobreports", {
            templateUrl: "views/jobreports.php"
            //        ,controller: "clientreportCtrl"
        }).when("/globalsetting", {
            templateUrl: "views/globalsetting.php"
            //        ,controller: "clientreportCtrl"
        })
        .when("/smsunsubscriber", {
            templateUrl: "views/smsunsubscriber.php"
            //        ,controller: "clientreportCtrl"
        })
        .when("/emailunsubscriber", {
            templateUrl: "views/emailunsubscriber.php"
            //        ,controller: "clientreportCtrl"
        }).when("/superadminmessagetemplate", {
            templateUrl: "views/superadminmessagetemplate.php"
            //        ,controller: "clientreportCtrl"
        }).when("/applicationstatus", {
            templateUrl: "views/applicationstatus.php"
            //        ,controller: "clientreportCtrl"
        }).when("/messagelogs", {
            templateUrl: "views/messagelogs.php"
            //        ,controller: "clientreportCtrl"
        }).when("/feesslab", {
            templateUrl: "views/feesslab.php"
            //        ,controller: "clientreportCtrl"
        }).when("/schedulemailer", {
            templateUrl: "views/schedulemailer.php"
            //        ,controller: "clientreportCtrl"
        }).otherwise({
            templateUrl: "views/dashboard.php"
            //        ,controller: "dashboardCtrl"

        });

    //             $locationProvider.php5Mode({
    //  enabled: true,
    //  requireBase: true
    //});
});
app.factory('FH', function () {
    return {
        SelectedRow: function (obj, key = 'id') {
            var selectedmanager = [];
            for (var i in obj) {
                selectedmanager.push(obj[i][key]);
            }
            return selectedmanager;
        },
        SelectedCheckbox: function (obj, selected = 'selected', key = 'id') {
            var selectedmanager = [];
            for (var i in obj) {
                if (obj[i][selected] == true) {
                    selectedmanager.push(obj[i][key]);
                }
            }
            return selectedmanager;
        },
        SelectedCheckboxWithComma: function (obj, selected = 'selected', key = 'id') {
            var selectedcheckbox = '';
            for (var i in obj) {
                if (obj[i][selected] == true) {
                    selectedcheckbox += (obj[i][key]) + ',';
                }
            }
            return selectedcheckbox;
        },
        //         var totalrow=$scope.gridApi.selection.getSelectedRows();
        //            var allrow= FH.SelectedWithComma(totalrow,'id');
        SelectedWithComma: function (obj, key = 'id') {
            var selectedcheckbox = '';
            for (var i in obj) {
                selectedcheckbox += (obj[i][key]) + ',';
            }
            return selectedcheckbox.substring(0, selectedcheckbox.lastIndexOf(','));
            //return selectedcheckbox;
        },
        SelectedObjects: function (obj, selected = 'selected') {
            var selectedmanager = [];
            for (var i in obj) {
                if (obj[i][selected] == true) {
                    selectedmanager.push(obj[i]);
                }
            }
            return selectedmanager;
        }
    };
});
app.directive('loading', ['$http', function ($http) {
    return {
        restrict: 'A',
        link: function (scope, elm, attrs) {
            scope.isLoading = function () {
                return $http.pendingRequests.length > 0;
            };
            scope.$watch(scope.isLoading, function (v) {
                if (v) {
                    $('body').addClass('loadingpr');
                    elm.show();
                } else {
                    elm.hide();
                    $('body').removeClass('loadingpr');
                }
            });
        }
    };
}]);
app.directive('showTab',
    function () {
        return {
            link: function (scope, element, attrs) {
                element.click(function (e) {

                    e.preventDefault();
                    $(element).tab('show');
                });
            }
        };
    });
app.directive('rf',
    function () {
        return {
            link: function (scope, element, attrs) {
                element.click(function (e) {

                    e.preventDefault();
                    //$(element).tab('show');
                });
            }
        };
    });
app.service('Authkey', function () {
    var authkey = "";
    return {
        getAuthKey: function () {
            if (authkey === "") {
                authkey = localStorage.getItem('Authkey');
            }
            return authkey;
        },
        setAuthKey: function (key) {
            authkey = key;
            localStorage.setItem('Authkey', key);
        }
    };
});

function showloaderfunction(loader) {
    // debugger;
    if (loader) {

        $(loader).addClass('loadercontainerouter');
        if ($(loader).find('.loadercontainerouter').length == 0) {
            $(loader).append('<div class="loadingcontainer"><i class="fa fa-cog fa-spin" style="font-size:40px"></i></div>');
        }
    }
}
function hideLoaderfunction(loader) {
    $(loader).find('.loadingcontainer').remove();
}

//app.service('db', function ($http, Authkey, $mdToast, $rootScope,Upload) {
app.service('db', function ($http, Authkey, $mdToast, $rootScope) {
    //upload
    // this.upload = function (url, fulldata, success, fail, progress, loader) {
    //
    //                showloaderfunction(loader);
    //                        Upload.upload({
    //                        url: ServiceURL + url + '?token=' + Authkey.getAuthKey(),
    //                                data: fulldata
    //                        }).then(function (resp) {
    //                hideLoaderfunction(loader);
    //                        console.log('Success ' + resp.config.data.file.name + 'uploaded. Response: ' + resp.data);
    //                        if (success !== undefined) {
    //                success(resp);
    //                }
    //                }, function (resp) {
    //                hideLoaderfunction(loader);
    //                        console.log('Error status: ' + resp.status);
    //                        if (fail !== undefined) {
    //                fail(resp);
    //                }
    //                }, function (evt) {
    //                var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
    //                        console.log('progress: ' + progressPercentage + '% ' + evt.config.data.file.name);
    //                        if (progress !== undefined) {
    //                progress(progressPercentage, evt);
    //                }
    //                });
    //                };
    //post begins
    this.post = function (url, data, success, fail) {

        var req = {
            method: 'POST',
            url: ServiceURL + url,
            data: $.param(data)
            ,
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }
        $http(req).then(function (response) {
            if (success !== undefined) {
                success(response);
            }
        }, function (response) {
            if (response.status === 401 || (response.data.hasOwnProperty('error') && response.data.error === 'token_not_provided')) {
                this.gotologin();
            } else {
                if (fail !== undefined) {
                    fail(response);
                }
            }

        });
    };
    //post ends
    //post begins
    this.get = function (url, data, success, fail) {

        var req = {
            method: 'GET',
            url: ServiceURL + url,
            data: $.param(data),
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }
        $http(req).then(function (response) {
            if (success !== undefined) {
                success(response);
            }
        }, function (response) {
            if (response.status === 401 || (response.data.hasOwnProperty('error') && response.data.error === 'token_not_provided')) {
                this.gotologin();
            } else {
                if (fail !== undefined) {
                    fail(response);
                }
            }

        });
    };
    //post ends
    //list begins
    this.list = function (url, data, success, fail) {
        if (data === null || data === undefined) {
            data = {};
        }
        //wb
        data.method = 'List';
        data.requestedurl = url;
        data.fromPageURL = $rootScope.previousURL;
        data.toPageURL = $rootScope.currentURL;
        CurrentURL = $rootScope.currentURL;
        //wb
        data.token = Authkey.getAuthKey();
        var req = {
            method: 'GET',
            url: ServiceURL + url,
            params: data
        }


        $http(req).then(function (response) {
            if (success !== undefined) {
                success(response);
            }
        }, function (response) {

            if (response.status === 401 || (response.data.hasOwnProperty('error') && response.data.error === 'token_not_provided')) {
                this.gotologin();
            } else {
                if (fail !== undefined) {
                    fail(response);
                }
            }

        });
    };
    //post list
    //store begins
    this.store = function (url, data, success, fail) {


        //wb
        data.method = 'Store';
        data.requestedurl = url;
        data.fromPageURL = $rootScope.previousURL;
        data.toPageURL = $rootScope.currentURL;


        //wb
        var req = {
            method: 'POST',
            url: ServiceURL + url + '?token=' + Authkey.getAuthKey(),
            data: $.param(data), headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        };
        $http(req).then(function (response) {

            if (success !== undefined) {
                success(response);
            }
        }, function (response) {

            if (response.status === 401 || (response.data.hasOwnProperty('error') && response.data.error === 'token_not_provided')) {
                this.gotologin();
            } else {
                if (fail !== undefined) {
                    fail(response);
                } else if (response.status === 422) {
                    for (var i in response.data) {
                        $mdToast.show(
                            $mdToast.simple()
                                .textContent(response.data[i][0])
                                .position('center')
                                .hideDelay(3000)
                        );
                        break;
                    }


                }
            }

        });
    };
    //store ends
    //Show begins
    this.show = function (url, id, success, fail) {
        //wb
        var data = {};
        data.method = 'Show';
        data.requestedurl = url;
        data.fromPageURL = $rootScope.previousURL;
        data.toPageURL = $rootScope.currentURL;
        //wb
        var req = {
            method: 'GET',
            url: ServiceURL + url + id + '/?token=' + Authkey.getAuthKey()
            ,
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }
        $http(req).then(function (response) {
            if (success !== undefined) {
                success(response);
            }
        }, function (response) {
            if (response.status === 401 || (response.data.hasOwnProperty('error') && response.data.error === 'token_not_provided')) {
                this.gotologin();
            } else {
                if (fail !== undefined) {
                    fail(response);
                }
            }

        });
    };
    //show ends
    //update begins
    this.update = function (url, id, data, success, fail) {
        //wb
        data.method = 'Update';
        data.requestedurl = url;
        data.fromPageURL = $rootScope.previousURL;
        data.toPageURL = $rootScope.currentURL;
        //wb
        var req = {
            method: 'post',
            url: ServiceURL + url + 'update/' + id + '/?token=' + Authkey.getAuthKey(),
            data: $.param(data),
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }
        $http(req).then(function (response) {

            if (success !== undefined) {
                success(response);
            }
        }, function (response) {
            if (response.status === 401 || (response.data.hasOwnProperty('error') && response.data.error === 'token_not_provided')) {
                this.gotologin();
            } else {
                if (fail !== undefined) {
                    fail(response);
                }
            }

        });
    };
    //update ends
    //DELETE begin
    this.destroy = function (url, id, success, fail) {
        //wb
        var data = {};
        data.method = 'Delete';
        data.requestedurl = url;
        data.fromPageURL = $rootScope.previousURL;
        data.toPageURL = $rootScope.currentURL;
        //wb
        var req = {
            method: 'post',
            url: ServiceURL + url + 'delete/' + id + '/?token=' + Authkey.getAuthKey(),
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }
        $http(req).then(function (response) {
            if (success !== undefined) {
                success(response);
            }
        }, function (response) {
            if (response.status === 401 || (response.data.hasOwnProperty('error') && response.data.error === 'token_not_provided')) {
                this.gotologin();
            } else {
                if (fail !== undefined) {
                    fail(response);
                }
            }

        });
    };
    //DELETE list
});
//universal code


app.run(function ($rootScope, db, $mdToast) {
    $rootScope.updatecandidate = function () {

        db.update('candidatedetail/', $rootScope.updateid, $rootScope.candidateshowdata, function () {

            $rootScope.submitresume();
        });

    }
    $rootScope.submitresume = function () {
        document.getElementById('uploadResumeupdate').contentWindow.setData($rootScope.updateid, 'candidatedetail/update');

    }
    $rootScope.candidateshow = function (id) {
        $rootScope.updateid = id;
        $('#resumeview').attr('src', 'http://ats.passivereferral.com/in.html');

        if ($rootScope.countries == undefined) {
            db.list('master/country', { 'gi': 'rolecreating' }, function (response) {
                $rootScope.countries = response.data;
            });
        }
        db.show('candidatedetail/', id, function (response) {
            $rootScope.candidateshowdata = response.data;
            $('#candidateshow').modal('show');

            if ($rootScope.candidateshowdata.resume.indexOf('docx') == -1) {
                $('#resumeview').attr('src', "https://docs.google.com/gview?url=http://api.passivereferral.com/resumes/" + $rootScope.candidateshowdata.resume + "&pid=explorer&efh=false&a=v&chrome=false&embedded=true");
            } else {
                $('#resumeview').attr('src', "https://view.officeapps.live.com/op/embed.aspx?src=http://api.passivereferral.com/resumes/" + $rootScope.candidateshowdata.resume);

            }
        });
    }
    $rootScope.addmessageandremove = function (msg) {

        $mdToast.show(
            $mdToast.simple()
                .textContent(msg)
                .position('bottom right')
                .hideDelay(3000)
        );
    }
    $rootScope.closecandidate = function () {
        $('#candidateshow').modal('hide');
    };
});
