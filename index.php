<!DOCTYPE html>
<html><head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!--<link rel="stylesheet" href="https://cdn.rawgit.com/angular-ui/bower-ui-grid/master/ui-grid.min.css" >-->
        <!-- Ionicons -->
        <link rel="stylesheet" href="bower-ui-grid-master/ui-grid.min.css" >

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link href="bootstrap/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
        <link href="bootstrap/css/daterangepicker.css" rel="stylesheet" type="text/css"/>
        <!-- Theme style -->
        <!--  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">-->
        <link rel="stylesheet" href="dist/css/AdminLTE.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
        <link href="dist/css/material-dashboard.css" rel="stylesheet" type="text/css"/>

        <!--         iCheck 
        <link href="dist/css/material-dashboard.css" rel="stylesheet" type="text/css"/>
                <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
                 Morris chart 
                <link rel="stylesheet" href="plugins/morris/morris.css">-->
        <!-- jvectormap -->
        <!--        <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">-->
        <!--         Date Picker 
                <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">-->
        <!-- Daterange picker -->
        <!--        <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">-->
        <!-- bootstrap wysihtml5 - text editor -->
        <!--        <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">-->

        <!--angular Material-->
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
        <!--angular Material-->		
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">
            .btn-box{
                margin-bottom: 20px;
                background-color: #fff;
                border: 1px solid transparent;
                border-radius: 4px;
                -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
                box-shadow: 0 1px 1px rgba(0,0,0,.05);
                text-align: center;
                text-decoration: none!important;
                padding: 25px 0;
                margin: 0 0 30px 45px;

            }
            .loading-spiner-holder{ position: fixed; z-index: 9999999; left:0;top:0; width: 100%; right: 0; bottom: 0; height: 100%; background: rgba(255,255,255,0.5) }
            .loading-spiner{ left:50%; top:50%; position: absolute;}
            .btn-box.small i{
                font-size:50px;
            }
            .btn-box.small p{font-size: 16px;}

            .btn-box1{margin-bottom: 20px;
                      background-color: #3c8dbc;
                      border: 1px solid transparent;
                      border-radius: 4px;
                      -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
                      box-shadow: 0 1px 1px rgba(0,0,0,.05);
                      text-align: center;
                      text-decoration: none!important;
                      padding: 25px 0;
                      color:#fff;
            }
            .loadingpr{ cursor: wait;}
            md-backdrop{
                position: fixed; display: none !important;
            }
            html,body{ position: initial !important; overflow: auto !important;}

        </style>
        <link href="bootstrap/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="bootstrap/css/billingstyle.css" rel="stylesheet" type="text/css"/>

    </head>
    <body class="hold-transition skin-blue sidebar-mini"  ng-app="myApp">

        <div class="wrapper">

            <header class="main-header" >
                <!-- Logo -->
                <a href="index.php" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>P</b>R</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Passive</b>R</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="javascript:" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->
                            <li class="dropdown messages-menu hidden">
                                <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="label label-success">4</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 4 messages</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu">
                                            <li><!-- start message -->
                                                <a href="#">
                                                    <div class="pull-left">

                                                    </div>
                                                    <h4>
                                                        Support Team
                                                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                    </h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li>
                                            <!-- end message -->
                                            <li>
                                                <a href="#">
                                                    <div class="pull-left">
                                                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                                    </div>
                                                    <h4>
                                                        AdminLTE Design Team
                                                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                                    </h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="pull-left">
                                                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                                    </div>
                                                    <h4>
                                                        Developers
                                                        <small><i class="fa fa-clock-o"></i> Today</small>
                                                    </h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="pull-left">
                                                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                                    </div>
                                                    <h4>
                                                        Sales Department
                                                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                    </h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="pull-left">
                                                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                                    </div>
                                                    <h4>
                                                        Reviewers
                                                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                    </h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="#">See All Messages</a></li>
                                </ul>
                            </li>
                            <!-- Notifications: style can be found in dropdown.less -->
                            <li class="dropdown notifications-menu hidden">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="label label-success">{{notification.length}}</span>

                                </a>
                                <ul class="dropdown-menu">

                                    <li>
                                        <!-- inner menu: contains the actual data -->


                                        <div class="list-group">
                                            <button type="button" class="list-group-item active"> <span class="badge">{{notification.length}}</span>Notification</button>
                                            <button type="button" class="list-group-item" ng-repeat="x in notification">{{x.Job_title}}  <span class="pull-right">{{x.referencecount}}</span> </button>

                                        </div>


                                    </li>
                                    <li class="footer"><a href="#">View all</a></li>
                                </ul>
                            </li>
                            <!-- Tasks: style can be found in dropdown.less -->

                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown">
                                    <!--                                    {{profile.profilepic}}
                                                                        <img src="{{profile.profilepic}}" class="user-image" alt="User Image">-->
                                    <span class="hidden-xs">{{profile.name}}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">

                                        <img src="{{profile.profilepic}}" class="img-circle" alt="User Image">

                                        <p>
                                            {{profile.name}} - Web Developer
                                            <small>Member since Nov. {{profile.created_at| date : "MMM d, y" }}</small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body">

                                        <!-- /.row -->
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#profile" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="" ng-click="logout()" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="{{profile.profilepic}}" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p>{{profile.name}}</p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <div ng-include="'views/partialviews/leftlink.php'"></div>
                </section>
                <!-- /.sidebar -->
            </aside>
            <!-- Side Manu Close-->
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div ng-view></div>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.3.7
                </div>
                <strong>Copyright &copy; 2016-2017 <a href="#">PassiveReferral.com</a>.</strong> All rights
                reserved.
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->

                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane" id="control-sidebar-home-tab">


                        <!-- /.control-sidebar-menu -->



                        <!-- /.control-sidebar-menu -->

                    </div>
                    <!-- /.tab-pane -->
                    <!-- Stats tab content -->
                    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                    <!-- /.tab-pane -->
                    <!-- Settings tab content -->
                    <div class="tab-pane" id="control-sidebar-settings-tab">

                    </div>
                    <!-- /.tab-pane -->
                </div>
            </aside>
            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>

        <div id="candidateshow" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Candidate Details</h4>

                    </div>
                    <div class="modal-body">
                        <div ng-include="'views/partialviews/candidatepopup.php'"></div>
                    </div>

                </div>

            </div>
        </div>


        <!-- Modal fullscreen -->

        <!-- ./wrapper -->

        <!-- jQuery 2.2.3 -->
        <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
                            $.widget.bridge('uibutton', $.ui.button);
                            var PF = {};
        </script>
        <!-- Bootstrap 3.3.6 -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
<!--        <script src="//cdn.datatables.net/plug-ins/1.10.11/sorting/date-eu.js" type="text/javascript"></script>-->
        <!-- Morris.js charts -->
        <!--
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="plugins/morris/morris.min.js"></script>-->
        <!-- Sparkline -->
        <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="plugins/knob/jquery.knob.js"></script>
        <!-- daterangepicker -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
        <script src="bootstrap/js/bootstrap-datetimepicker.js" type="text/javascript"></script>
        <script src="plugins/daterangepicker/daterangepicker.js"></script>
        <!-- datepicker -->
        <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <!-- Slimscroll -->
        <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="plugins/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/app.min.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="dist/js/pages/dashboard.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js"></script>
        <link href="plugins/select2/select2.min.css" rel="stylesheet" type="text/css"/>


        <!-- Angular Material requires Angular.js Libraries -->
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular-touch.js"></script>
        <script src="https://cdn.rawgit.com/angular-ui/bower-ui-grid/master/ui-grid.min.js"></script>
        <script src="http://ui-grid.info/docs/grunt-scripts/csv.js"></script>
        <script src="http://ui-grid.info/docs/grunt-scripts/pdfmake.js"></script>
        <script src="http://ui-grid.info/docs/grunt-scripts/vfs_fonts.js"></script> 
        <!--<script src="http://ui-grid.info/release/ui-grid-unstable.js"></script>-->
        <script src="bower-ui-grid-master/ui-grid.min.js"></script>

        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular-route.js"></script>


        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular-animate.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular-aria.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular-messages.min.js"></script>


        <!-- Angular Material Library -->
        <script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>

        <script src="js/ats.js" type="text/javascript"></script>
        <script src="js/ng-upload/ng-file-upload-shim.min.js" type="text/javascript"></script>
        <script src="js/ng-upload/ng-file-upload.min.js" type="text/javascript"></script>
        <script src="js/atsjquery.js" type="text/javascript"></script>
        <script type="text/javascript">

                            app.run(function ($rootScope, db) {
                                $rootScope.tokenindex = localStorage.getItem('Authkey');
                                $rootScope.logout = function () {
                                    localStorage.setItem('Authkey', '');
                                    gotologin();

                                }
                                $rootScope.$on('$locationChangeStart', function (event, current, previous) {
//                                    console.log("Previous URL" + previous);
//                                    console.log('current Url ' + current);
                                    $rootScope.previousURL = previous;
                                    $rootScope.currentURL = current;

                                });

                                /*   db.post('my/', {'a':'b','ad':[{'name':'Narender','dd':4},{'name':'Bhupender','dd':22}]}, function (response) {
                                 console.log(response);
                                 }, function (r) {
                                 
                                 console.log(r);
                                 })*/
                                db.list('profile/', null, function (response) {

                                    $rootScope.profile = response.data;
                                    if ($rootScope.profile.profilepic.indexOf('base64') == -1) {
                                        $rootScope.profile.profilepic = rooturi + 'profile/' + $rootScope.profile.profilepic;
                                    }
                                    PF = response.data;
                                    document.title = 'PR : ' + $rootScope.profile.application;
                                }, function (response) {});
                                db.list('mypermission/', null, function (response) {
                                    var data = response.data;
                                    $rootScope.mp = {};
                                    for (var i in data) {
                                        $rootScope.mp[data[i].slug] = true;
                                    }
                                    console.log($rootScope.mp);

                                }, function (response) {});

                                db.list('getnotification/', null, function (response) {
                                    console.info('laod');
                                    $rootScope.notification = response.data;

                                }, function (response) {});



                            });
        </script>

        <!--All Controller Begins
        Author :Narender
        Date : 02-01-2017
        Description : to include all js files
        -->
        <!-- crm begins-->
        <script src="js/Ats/leaddata.js" type="text/javascript"></script>
        <script src="js/Ats/myleadCtrl.js" type="text/javascript"></script>
        <script src="js/Ats/crmMessageTemplatesCtrl.js" type="text/javascript"></script>
        <!--crm ends-->

        <script src="js/commonjs.js" type="text/javascript"></script>
<!--        <script src="js/Ats/clientCtrl.js" type="text/javascript"></script>-->
        <script src="js/Ats/dashboardCtrl.js" type="text/javascript"></script>
<!--        <script src="js/Ats/historyCtrl.js" type="text/javascript"></script>-->
<!--        <script src="js/Ats/myjobCtrl.js" type="text/javascript"></script>-->
        <script src="js/Ats/reportCtrl.js" type="text/javascript"></script>
<!--        <script src="js/Ats/internaldata.js" type="text/javascript"></script>-->
        <script src="js/Ats/userCtrl.js" type="text/javascript"></script>
        <script src="js/Ats/profile.js" type="text/javascript"></script>
        <script src="js/Ats/manageroleCtrl.js" type="text/javascript"></script>
        <script src="js/Ats/billingcallCtrl.js" type="text/javascript"></script>

<!--        <script src="js/Ats/messageTemplates.js" type="text/javascript"></script>-->
<!--        <script src="js/Ats/messagelogCtrl.js" type="text/javascript"></script>-->
<!--        <script src="js/Ats/smslogCtrl.js" type="text/javascript"></script>-->
        <script src="js/Ats/applicationsCtrl.js" type="text/javascript"></script>
        <script src="js/Ats/webbeaconCtrl.js" type="text/javascript"></script>
<!--        <script src="js/Ats/parseresumeCtrl.js" type="text/javascript"></script>-->
        <script src="js/Ats/billingCtrl.js" type="text/javascript"></script>
<!--        <script src="js/Ats/referredCtrl.js" type="text/javascript"></script>-->
<!--        <script src="js/Ats/clientreportCtrl.js" type="text/javascript"></script>-->
        <script src="js/Ats/jobsinadmin.js" type="text/javascript"></script>
        <script src="js/Ats/clientdetailsCtrl.js" type="text/javascript"></script>
        <script src="js/Ats/reportCtrl.js" type="text/javascript"></script>
        <script src="js/Ats/jobreportsCtrl.js" type="text/javascript"></script>
        <script src="js/Ats/refferreportsCtrl.js" type="text/javascript"></script>
        <script src="js/Ats/globalsettingCtrl.js" type="text/javascript"></script>
        <script src="js/Ats/smsunsubscriberCtrl.js" type="text/javascript"></script>
        <script src="js/Ats/emailunsubscriberCtrl.js" type="text/javascript"></script>
        <!--Till here Controller-->

        <script src="js/Ats/invoiceCtrl.js" type="text/javascript"></script>

        <script src="js/Ats/schedulemailer.js" type="text/javascript"></script>

        <script src="js/Ats/superadminmessagetemplate.js" type="text/javascript"></script>
        <script src="js/Ats/applicationstatus.js" type="text/javascript"></script>
        <script src="js/Ats/messagelogs.js" type="text/javascript"></script>
        <script src="js/Ats/feesslab.js" type="text/javascript"></script>


        <!--All Controller Ends-->

        <!-- Your application bootstrap  -->
        <script type="text/javascript">

                            //    /**
                            //     * You must include the dependency on 'ngMaterial' 
                            //     */
                            //    angular.module('BlankApp', ['ngMaterial']);
                            //  </script>
        <div class="loading-spiner-holder"  style="display: none;" data-loading >
            <div class="loading-spiner"><i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i></div></div>

    </body>
</html>
