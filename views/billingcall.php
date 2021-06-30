<div ng-controller='billingcallCtrl' ng-cloak="">
    <section class="content-header">
        <h1>
            Dashboard
            <small>Bill Management</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content" id="addCredit">

        <div ui-grid="gridOptions" ui-grid-selection ui-grid-pagination ui-grid-cellnav ui-grid-exporter class="grid"></div>

        <form class='col-md-12'>
            <h2><span ng-show="isEditUser">Edit</span><span ng-hide="submit"></span> Add Credit</h2>
            <div class='row'>
                <div class='col-md-12'>
                    <div class="form-group">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <!-- ng-if="profile.app_id == 0"-->
                            <label> Application</label>
                            <select class="form-control e" validate id="usersapp" ng-model="creditnew.app_id" n="app" ng-change="loadmanager()">
                                <option ng-repeat="app in applications" value="{{app.id}}">
                                    {{app.app_name}} ({{app.id}})
                                </option>
                            </select>

                        </div>
                        <div class="col-md-4"> <label>Add Credit</label> <input type="text" ng-model="creditnew.credit" class="form-control e" n="Credit" /> </div>


                        <div class="col-md-4">
                            <!-- ng-if="profile.app_id == 0"-->
                            <label> Balance Type</label>
                            <select class="form-control e" validate id="usersapp" ng-model="creditnew.balancetype" n="Balance type">
                                <option value="Subscription">Subscription</option>
                                <option value="Promotional">Promotional</option>
                                <option value="Top-Up">Top-Up</option>
                            </select>

                        </div>
                    </div>



                    <div class="row" ng-if="creditnew.balancetype == 'Subscription'">
                        <div class="col-md-4">
                            <!-- ng-if="profile.app_id == 0"-->
                            <label> Carry forward</label>
                            <select class="form-control e" validate id="Carryforward" ng-model="creditnew.carryforward" n="Carry Forward">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>

                        </div>
                        <div class="col-md-4">
                            <label> Date start</label>
                            <div class="controls input-append date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                <input type="date" size="8" value="" validate ng-model="creditnew.starts" class="form-control e" n="Date Start">
                                <span class="add-on"><i class="icon-remove"></i></span>
                                <span class="add-on"><i class="icon-th"></i></span>
                            </div>

                            <input type="hidden" id="dtp_input2" value="" /><br />


                        </div>


                        <div class="col-md-4">
                            <label> Date End</label>
                            <div class="controls input-append date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input3" data-link-format="yyyy-mm-dd">
                                <input type="date" size="8" value="" validate ng-model="creditnew.ends" class="form-control e" n="Date End">
                                <span class="add-on"><i class="icon-remove"></i></span>
                                <span class="add-on"><i class="icon-th"></i></span>
                            </div>
                            <input type="hidden" id="dtp_input3" value="" /><br />

                        </div>




                    </div>


                    <button type="submit" id="submit" class="md-raised validate btn btn-default center-block" tar="#addCredit" ng-click="Creditsave()" style="margin-top:3%;width:120px">Submit</button>



        </form>


    </section>
</div>