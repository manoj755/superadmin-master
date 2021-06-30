<!--@import "//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css";-->
<!--@import "http://fonts.googleapis.com/css?family=Roboto:400,500";-->
<div ng-controller='dashboardCtrl'>
    <section class="content-header">
        <h1>
            Dashboard
            <!--<small>dashboard</small>-->
        </h1>
        <!--<ol class="breadcrumb">-->
        <!--<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>-->
        <!--<li class="active">Dashboard</li>-->
        <!--</ol>-->
    </section>
    <style>
        #sum_box h4 {
            text-align: left;
            margin-top: 0px;
            font-size: 30px;
            margin-bottom: 0px;
            padding-bottom: 0px;
        }


        #sum_box .db:hover {
            background: #40516f;
            color: #fff;
        }




        #sum_box .db:hover .icon {
            opacity: 1;
            color: #999999;
        }

        #sum_box .icon {
            color: #fff;
            font-size: 55px;
            margin-top: 7px;
            margin-bottom: 0px;
            float: right;
        }


        .panel.income.db.mbm {
            background-color: #5cb85c;
        }

        .panel.profit.db.mbm {
            background-color: #5bc0de;
        }


        .panel.task.db.mbm {
            background-color: #f0ad4e;
        }

        .panel.role.db.mbm {
            background-color: #d23535;
        }
    </style>
    <!-- Main content -->
    <div id="sum_box" class="row mbl" style="margin-left:20px;margin-top: 20px; ">
        <div class="col-sm-6 col-md-3">
            <a href="#/jobsinadmin">
                <div class="panel income db mbm">
                    <div class="panel-body" style="hight:20px;">
                        <p class="icon">
                            <i class="icon fa fa-check-square-o"></i>
                        </p>
                        <h4 class="value">
                            <span style="color:white;">Jobs Approve</span>
                        </h4>
                        <!--<p class="description">-->
                        <!--Saldo</p>-->

                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="panel profit db mbm">
                <a href="#/users">
                    <div class="panel-body">
                        <p class="icon">
                            <i class="icon fa fa-user"></i>
                        </p>
                        <h4 class="value">
                            <span data-counter="" data-start="10" data-end="50" data-step="1" data-duration="0" style="color:white;">Users</span>
                        </h4>
                        <!--<p class="description">-->
                        <!--Mensajes enviados</p>-->

                    </div>
                </a>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="panel task db mbm">
                <a href="#/applications">
                    <div class="panel-body">
                        <p class="icon">
                            <i class="icon fa fa-adn"></i>
                        </p>
                        <h4 class="value">
                            <span style="color:white;">Application</span>
                        </h4>
                        <!--<p class="description">-->
                        <!--Mensajes recibidos</p>-->

                    </div>
                </a>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <a href="#/managerole">
                <div class="panel role db mbm">
                    <div class="panel-body" style="hight:20px;">
                        <p class="icon">
                            <i class="icon fa fa-edit"></i>
                        </p>
                        <h4 class="value">
                            <span style="color:white;">manage role</span>
                        </h4>
                        <!--<p class="description">-->
                        <!--Saldo</p>-->

                    </div>
                </div>
            </a>
        </div>
    </div>


    <section class="content" ng-hide="mp.any">
        <!-- Small boxes (Stat box) -->
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-7">
                    <div class="box box-primary">
                        <div class="box-header ui-sortable-handle" style="cursor: move;">
                            <i class="ion ion-clipboard"></i>

                            <h3 class="box-title">Suggestion</h3>

                            <div class="box-tools pull-right">
                                <ul class="pagination pagination-sm inline">
                                    <li><a href="#">�</a></li>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">�</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="list-group">

                                <button type="button" class="list-group-item">

                                    <span class="handle ui-sortable-handle">
                                        <i class="fa fa-ellipsis-v"></i>
                                        <i class="fa fa-ellipsis-v"></i>
                                    </span>
                                    <span class="text">Design a nice theme</span>
                                    <span class="badge">14</span>
                                </button>
                                <button type="button" class="list-group-item" data-toggle="modal" data-target=".bs-example-modal-md" data-dismiss="modal">

                                    <span class="handle ui-sortable-handle">
                                        <i class="fa fa-ellipsis-v"></i>
                                        <i class="fa fa-ellipsis-v"></i>
                                    </span>
                                    <span class="text">Web Developer</span>
                                    <span class="badge">20</span>
                                </button>

                                <div class="modal bs-example-modal-md" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">

                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <button type="button" class="btn btn-primary">Get References</button>
                                            </div>
                                            <div class="modal-body">

                                                <div ui-grid="gridOptions" ui-grid-selection ui-grid-pagination ui-grid-cellnav ui-grid-exporter class="grid"></div>
                                            </div>


                                        </div>
                                    </div>

                                </div>
                                <button type="button" class="list-group-item">

                                    <span class="handle ui-sortable-handle">
                                        <i class="fa fa-ellipsis-v"></i>
                                        <i class="fa fa-ellipsis-v"></i>
                                    </span>
                                    <span class="text">Software</span>
                                    <span class="badge">18</span>
                                </button>
                                <button type="button" class="list-group-item">

                                    <span class="handle ui-sortable-handle">
                                        <i class="fa fa-ellipsis-v"></i>
                                        <i class="fa fa-ellipsis-v"></i>
                                    </span>
                                    <span class="text">PHP Developer</span>
                                    <span class="badge">28</span>
                                </button>
                                <button type="button" class="list-group-item">

                                    <span class="handle ui-sortable-handle">
                                        <i class="fa fa-ellipsis-v"></i>
                                        <i class="fa fa-ellipsis-v"></i>
                                    </span>
                                    <span class="text">PHP Developer</span>
                                    <span class="badge">28</span>
                                </button>
                                <button type="button" class="list-group-item">

                                    <span class="handle ui-sortable-handle">
                                        <i class="fa fa-ellipsis-v"></i>
                                        <i class="fa fa-ellipsis-v"></i>
                                    </span>
                                    <span class="text">PHP Developer</span>
                                    <span class="badge">28</span>
                                </button>
                                <button type="button" class="list-group-item">

                                    <span class="handle ui-sortable-handle">
                                        <i class="fa fa-ellipsis-v"></i>
                                        <i class="fa fa-ellipsis-v"></i>
                                    </span>
                                    <span class="text">PHP Developer</span>
                                    <span class="badge">28</span>
                                </button>
                                <button type="button" class="list-group-item">

                                    <span class="handle ui-sortable-handle">
                                        <i class="fa fa-ellipsis-v"></i>
                                        <i class="fa fa-ellipsis-v"></i>
                                    </span>
                                    <span class="text">PHP Developer</span>
                                    <span class="badge">28</span>
                                </button>
                                <button type="button" class="list-group-item">

                                    <span class="handle ui-sortable-handle">
                                        <i class="fa fa-ellipsis-v"></i>
                                        <i class="fa fa-ellipsis-v"></i>
                                    </span>
                                    <span class="text">PHP Developer</span>
                                    <span class="badge">28</span>
                                </button>
                                <button type="button" class="list-group-item">

                                    <span class="handle ui-sortable-handle">
                                        <i class="fa fa-ellipsis-v"></i>
                                        <i class="fa fa-ellipsis-v"></i>
                                    </span>
                                    <span class="text">PHP Developer</span>
                                    <span class="badge">28</span>
                                </button>
                                <button type="button" class="list-group-item">

                                    <span class="handle ui-sortable-handle">
                                        <i class="fa fa-ellipsis-v"></i>
                                        <i class="fa fa-ellipsis-v"></i>
                                    </span>
                                    <span class="text">PHP Developer</span>
                                    <span class="badge">28</span>
                                </button>
                            </div>





                        </div>



                        <!-- /.box-body -->

                    </div>


                </div>





                <div class="col-md-5">
                    <div class="box box-primary">
                        <div class="box-body">
                            <h5 class="box-title text-capitalize text-bold">Interview</h5>
                            <div>

                                <ul class="list-group">
                                    <li class="list-group-item " ng-repeat="x in getinterviewschedules"> <span class="text-bold" ng-click='candidateshow(x.candidate_id)'>{{x.candidatename}}'s</span> interview scheduled for {{x.job_title}} on {{x.reminderDate}}</li>
                                </ul>
                            </div>

                            <div ui-grid="gridOptions" ui-grid-selection ui-grid-pagination ui-grid-cellnav ui-grid-exporter class="grid hidden"></div>
                        </div>

                    </div>


                    <div class="box box-primary">
                        <div class="box-body">
                            <h5 class="box-title  text-capitalize text-bold">Reminders</h5>
                            <div>

                                <ul class="list-group">
                                    <li class="list-group-item" ng-repeat="x in getreminders"><span class="text-bold" ng-click='candidateshow(x.candidate_id)' class="text-danger">{{x.candidatename}}'s</span> reminder scheduled for {{x.job_title}} on {{x.reminderDate}}</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="clearfix"></div>


        <div class="col-md-4">

            <a href="#" class="btn-box1 small col-md-12">
                <h1 class="display-3">Welcome</h1>
                <img src="{{profile.profilepic}}" class="img-responsive center-block" />
                <h4>{{profile.name}}</h4>
            </a>

        </div>

        <div class="col-md-8">

            <!-- <div class="bottom-sheet-demo inset" layout="row" layout-sm="column" layout-align="center" >
         <md-button flex="50" class="md-primary md-raised" ng-click="showListBottomSheet()">Show as List</md-button>
         <md-button flex="50" class="md-primary md-raised" ng-click="showGridBottomSheet()">Show as Grid</md-button>
       </div>-->


            <div class="row">
                <div class="col-md-12">
                    <!-- Browser Page-->

                    <a href="javascript:" ng-click="internaldata()" class="btn-box small col-md-3">
                        <i class="glyphicon glyphicon-globe"></i>
                        <p>Browse Candidates</p>
                    </a>


                    <!-- Browser Page End-->

                    <a href="#/history" class="btn-box small col-md-3"><i class="glyphicon glyphicon-header"></i>
                        <p>History</p>
                    </a>
                    <a href="#/report" class="btn-box small col-md-3"><i class="glyphicon glyphicon-file"></i>
                        <p>Reports</p>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="#/myjob" class="btn-box small col-md-3">
                        <i class="fa fa-user-plus"></i>
                        <p>My jobs</p>
                    </a>

                    <a href="#" class="btn-box small col-md-3"><i class="glyphicon glyphicon-globe"></i>
                        <p>My Conversations</p>
                    </a>
                    <a href="#" class="btn-box small col-md-3"><i class="glyphicon glyphicon-share"></i>
                        <p>References</p>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="#" class="btn-box small col-md-3">
                        <i class="fa fa-newspaper-o"></i>
                        <p>Forum/Blogs</p>
                    </a>

                    <a href="#client" class="btn-box small col-md-3"><i class="glyphicon glyphicon-thumbs-up"></i>
                        <p>Clients</p>
                    </a>
                    <a href="!/users" class="btn-box small col-md-3"><i class="fa fa-user"></i>
                        <p>Users</p>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="#" class="btn-box small col-md-3">
                        <i class="glyphicon glyphicon-cog"></i>
                        <p>Setting</p>
                    </a>

                    <a href="#" class="btn-box small col-md-3"><i class="fa fa-server"></i>
                        <p>Network Analysis</p>
                    </a>
                    <a href="#" class="btn-box small col-md-3"><i class="fa fa-paypal"></i>
                        <p>Billing & Payments</p>
                    </a>
                </div>
            </div>

        </div>
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->

    </section>
    <div style="visibility: hidden">
        <div class="md-dialog-container row" id="internaldata">
            <md-dialog aria-label="New Job">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button aria-hidden="true" ng-click="cancel()" data-dismiss="modal" class="close" type="button">×</button>

                            <h4 class="modal-title">Browse Candidates</h4>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="info-box green-bg">
                                                    <a href="#"><img alt="internal" src="images/internal.png"></a>

                                                    <div class="title"><a href="#/internaldata" ng-click="cancel()">Internal Database</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="info-box green-bg">
                                                    <?php
                                                    $url = "http://192.168.1.14/";
                                                    ?><a id="loginnaukri" href="<?php echo $url; ?>r.aspx?token={{localStorage.getItem('Authkey')}}" target="_blank"><img alt="nakuri" src="images/1.png">
                                                        <br>
                                                        Nakuri.com
                                                    </a>

                                                </div>
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">

                                                <div class="info-box green-bg">
                                                    <a href="#"><img alt="moster" src="images/moster.png"></a>
                                                    <div class="title"><a href="#">Moster.com</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="info-box green-bg">
                                                    <a href="#">
                                                        <img alt="time" src="images/time.png"></a>
                                                    <div class="title"><a href="#">Timesjob</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="info-box green-bg">
                                                    <a href="#">
                                                        <img alt="shine" src="images/2.png"></a>

                                                    <div class="title"><a href="#">shine.com</a></div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="info-box green-bg">
                                                    <a href="#">
                                                        <img alt="link" src="images/link.png"></a>

                                                    <div class="title"><a href="#">Linked</a></div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </md-dialog>


        </div>
    </div>

</div>