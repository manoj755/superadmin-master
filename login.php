<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.rawgit.com/angular-ui/bower-ui-grid/master/ui-grid.min.css" />
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
        <style type="text/css">
            body{background:url(images/bg.jpg);
                 background-size:cover;}
            </style>

            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
        </head>
        <body class="hold-transition login-page" ng-app="myApp">
        <div class="login-box"  ng-controller="loginctrl">
            <div class="login-logo">
                <a href="#l"><b>PassiveReferral</b>.com</a>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form ng-submit="login()"  >
                    <div class="form-group has-feedback">
                        <input type="email" name="email" class="form-control" ng-model="email" placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="password" class="form-control" ng-model="password" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            {{msg}}
                        </div>
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input ng-model="remember"   ng-checked="false" type="checkbox"> Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" ng-click="login()" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


                <!-- /.social-auth-links -->

                <a href="#">I forgot my password</a><br>
                <a href="register.php" class="text-center">Register a new membership</a>

            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.min.js"></script>
        <!-- jQuery 2.2.3 -->
        <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="plugins/iCheck/icheck.min.js"></script>

        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular-touch.js"></script>
        <script src="https://cdn.rawgit.com/angular-ui/bower-ui-grid/master/ui-grid.min.js"></script>
        <script src="http://ui-grid.info/docs/grunt-scripts/csv.js"></script>
        <script src="http://ui-grid.info/docs/grunt-scripts/pdfmake.js"></script>
        <script src="http://ui-grid.info/docs/grunt-scripts/vfs_fonts.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular-route.js"></script>


        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular-animate.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular-aria.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular-messages.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>
        <script src="js/ats.js" type="text/javascript"></script>
        <script>
//commit
            app.controller('loginctrl', function ($scope, $http, Authkey) {

                $scope.login = function () {


                    var req = {method: 'POST',
                        url: ServiceURL + 'authenticate/?employer=d',

                        data: $.param({'email': $scope.email, 'password': $scope.password, 'remember': $scope.remember})
                        ,
                        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                    }
                    $http(req).then(function (response) {
                        if(response.data.token){
                        Authkey.setAuthKey(response.data.token);
                        $scope.token = Authkey.getAuthKey();
                        
                        returnurl = getReturnURL();
                        if (returnurl === '')
                        {
                           window.location.href = 'index.php#/dashboard/888/ff';
                        } else
                        {
                           window.location.href = returnurl;

                        }}else{
                            $scope.msg='No Token Received';
                        }

                    }, function (response) {
                        if (response.status === 401 || (response.data === null && response.data.hasOwnProperty('error') && response.data.error === 'token_not_provided'))
                        {
                            $scope.msg = 'Please enter valid credentials';
                        } else
                        {

                        }

                    });

                }
            });
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>
    </body>
</html>
