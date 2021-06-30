<div ng-controller='jobsinadminCtrl' ng-cloak="">
    <section class="content-header">
        <h1>
           Jobs in Admin
<!--            <small>User Management</small>-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <!--<li class="active">Dashboard</li>-->
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        
        <div ui-grid="gridOptions" ui-grid-selection ui-grid-pagination  ui-grid-cellnav ui-grid-exporter class="grid"></div>
        
        
     
        
        <div class="row" ng-show="currentjob.Approved" >
            <div class="col-md-12" style="padding:20px 10px;">
                            <form class="form-horizontal" role="form" name="userForm">

                                          <div class="form-group">
                                    <label class="col-md-3 col-sm-offset-2" Title>Status</label>
                                    <div class="col-md-6 "> 
                                        <div class="onoff-{{currentjob.Approved}} onoffcontainer btn">
                                            <div class="on" ng-click="changestatus()">
                                                Approved
                                            </div>
                                            
                                            <div class="off" ng-click="changestatus()">
                                                Unapproved
                                            </div>
                                        </div>
                                       
                                </div>
                                          </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-sm-offset-2" Title>Job Title</label>
                                    <div class="col-md-6">
                                        <!--<input type="text" class="form-control e" n="Job Title" id="title" ng-model="" placeholder="title" name="job_title"
                                               required/>-->{{myjob.job_title}}

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-sm-offset-2" Title>Job Type</label>
                                    <div class="col-md-6">
                                    {{myjob.jobtype}}
                                        

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-offset-2" Referral>Referral Bonus:</label>
                                    <div class="col-md-6">
                                       <!-- <input type="text" class="form-control e" validate n="Referral Bonus" ng-model="" placeholder="Bonus"
                                               name="referralBonus" required/>-->
                                               {{myjob.referralBonus}}


                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-offset-2" Title>Job Key Skills</label>
                                    <div class="col-md-6">
                                        <!--<textarea class="form-control e" n="key skill" id="key" ng-model="myjob.keyskills"></textarea>-->
                                      <p>  {{myjob.keyskills}}</p>


                                    </div>
                                </div>
                               
                       
                        <div id="internship">
                            <div class="form-group">
                                <label class="col-md-3 col-sm-offset-2">Internship duration</label>
                                <div class="col-md-4">
                                    <select class="form-control" ng-model='myjob.internshipduration'>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>

                                    </select>

                                </div>
                                <div class="col-md-2">
                                    <select class="form-control" ng-model='myjob.internshipdurationunit'>
                                        <option>Month</option>
                                        <option>Weeks</option>


                                    </select>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-sm-offset-2">Is Part Time Allowed</label>
                                <div class="col-md-4">
                                    <label class="radio-inline">
                                        <input type="radio" ng-model='myjob.isparttime' value="yes">Yes
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" ng-model='myjob.isparttime' value="no">No
                                    </label>

                                </div>

                            </div>
                        </div>
                        
                            <div class="form-group" id="contract">
                                <label class="col-md-3 col-sm-offset-2">Contract Re-newable</label>
                                <div class="col-md-4">
                                    <label class="radio-inline">
                                        <input type="radio" ng-model='myjob.contractrenewable' value="yes">Yes
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" ng-model='myjob.contractrenewable' value="no">No
                                    </label>

                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-sm-offset-2">Contract duration</label>
                                <div class="col-md-4">
                                {{myjob.contract}}
                                  

                                </div>
                                <div class="col-md-2">
                                {{myjob.contractunit}}
                                </div>
                            </div>
                        
                        <div class="form-group" id="freelence">
                            <label class="col-md-3 col-sm-offset-2">Change Payable</label>
                            <div class="col-md-3">
                                <label class="radio-inline">
                                    <input type="radio" ng-model='myjob.freelancepayable' value="Hourly">Hourly
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" ng-model='myjob.freelancepayable' value="Project-Based">Project-Based
                                </label>

                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-md-12">JD:</label>
                            <div class="col-md-12">
                            <div id='jdhtml' class='alert' style='background: white !important;
    border: solid 1px #eee !important;'></div>
                                <textarea class="form-control hidden "   contenteditable rows="5" ng-model="myjob.jobDescription" name="jobDescription"
                                          required></textarea>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-sm-offset-2" Title>Location</label>
                            <div class="col-md-6">

                                <!--                                <md-select ng-model="location" md-on-close="clearSearchTerm()" data-md-container-class="selectdemoSelectHeader" multiple>
                                                                    <md-select-header class="demo-select-header">
                                                                        <input ng-model="searchTerm" type="search" placeholder="Search for a location.." class="demo-header-searchbox md-text">
                                                                    </md-select-header>
                                                                    <md-optgroup label="locations">
                                                                        <md-option ng-value="location" ng-repeat="location in locations|
                                                                                               filter:searchTerm">{{location}}</md-option>
                                                                    </md-optgroup>
                                                                </md-select>  -->
                              <!--  <input ng-model="location"  class="form-control"/> -->
                                <p>{{location}}</p>
                            </div>


                        </div>




                        <div class="form-group">
                            <label class="col-md-3 col-sm-offset-2">Experience:</label>
                            <div class="col-md-3">
                              <!-- <input type="text" class="form-control e" validate n="Minimum Experience" ng-model="myjob.minimumExperience" name="minimumExperience"
                                       placeholder="min" required/>-->
                                <p>{{myjob.minimumExperience}}</p>

                            </div>
                            <div class="col-md-3">
                               <!-- <input type="text" class="form-control e" validate n="Maximum Experience" ng-model="myjob.maximumExperience" name="maximumExperience"
                                       placeholder="max" required/>-->
                                <p>{{myjob.maximumExperience}}</p>
                            </div>
                        </div>

                        <div class="form-group">

                            <!--   <label class="col-md-3 col-sm-offset-2" Salary>Salary </label>
                            <div class="col-md-3">
                                <input type="text" class="form-control e" validate n="Minimum Experience" ng-model="myjob.minimumSalary" name="inimumSalary"
                                    placeholder="From" required/>

                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control e" validate n="Maximum Experience" ng-model="myjob.maximumSalary" name="maximumSalary"
                                    placeholder="To" required/>

                            </div>--><div id="salary">
                            <label class="col-md-3 col-sm-offset-2">Salary </label>

                          



                                <div class="col-md-6">
                                    <!--<input type="number" min="10000" max="5000000" step="10000" class="form-control e" validate  n="Minimum Experience" ng-model="myjob.minimumSalary" name="minimumSalary" placeholder="From" maxlength="10" />-->
                                    <p>{{myjob.minimumSalary}}</p>
                                
                                    <!--<input type="number"  min="{{myjob.minimumSalary}}" max="5000000" step="10000"  class="form-control e" validate n="Maximum Experience" ng-model="myjob.maximumSalary" name="maximumSalary" placeholder="To" maxlength="10" />-->
                                    <p>{{myjob.maximumSalary}}</p>

                                </div>


                            </div>
                       

                        <div class='clearfix'></div>


                        <div class="form-group">
                            <label class="col-md-4 col-sm-offset-2" Industry>Hide Salary from jobseekers</label>

                            <div class="col-md-3">
                                <input type="checkbox" ng-model='myjob.HideSalaryfromjobseekers' ng-true-value="'YES'" ng-false-value="'NO'">
                            </div>

                        </div>

                        <div class='clearfix'></div>
                        <div class="form-group">
                            <label class="col-md-3 col-sm-offset-2" Industry>Industry</label>
                            <div class="col-md-6">
                                
                                    
                                   <!--<input type="text" class="form-control e" n="Industry" id="Industry_name" ng-model="myjob.Industry" placeholder="Name of industry" name="industry_id"
                                               required/>-->
                                <p>{{myjob.Industry}}</p>
                           
                                

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-sm-offset-2" Functional>Functional Area</label>
                            <div class="col-md-6">
                               
                                  <!--<input type="text" class="form-control e" n="Funtionalarea" id="area_name" ng-model="myjob.functionalArea" placeholder="area" name="function_id"
                                               required/>-->
                                        <p>{{myjob.jobrole}}</p>
                                

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-sm-offset-2" Job_Role>Job Role</label>
                            <div class="col-md-6">
                               
                                 <!-- <input type="text" class="form-control e" n="Job_role name" id="area_name" ng-model="myjob.jobrole" placeholder="job role" name="Job_Role"
                                               required/>-->
                                <p>{{myjob.jobrole}}</p>
                                            

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-sm-offset-2" opaning>Number of opening:</label>
                            <div class="col-md-6">
                                <!--<input type="text" class="form-control e" validate n="Number of opening" ng-model="myjob.numberOfOpening" name="numberOfOpening"
                                       placeholder="opening" required/>-->
                                <p>{{myjob.numberOfOpening}}</p>  


                            </div>

                        </div>




                        <div class="form-group">

                            <label class="col-md-3 col-sm-offset-2" JD></label>
                            <div class="col-md-3">
                                <div class="control-group">
                                    <label class="control-label"> Date Start</label>
                                    <div class="controls input-append date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2"
                                         data-link-format="yyyy-mm-dd">
                                        <!--<input size="16" type="text" value="" readonly ng-model="myjob.start_date">-->
                                        <p>  {{myjob.start_date}}</p>
                                        <span class="add-on">
                                            <i class="icon-remove"></i>
                                        </span>
                                        <span class="add-on">
                                            <i class="icon-th"></i>
                                        </span>
                                    </div>
                                    <input type="hidden" id="dtp_input2" value="" />
                                    <br/>
                                </div>

                            </div>

                            <div class="col-md-3">
                                <div class="control-group">
                                    <label class="control-label"> Date End</label>
                                    <div class="controls input-append date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input3"
                                         data-link-format="yyyy-mm-dd">
                                        <!--<input size="16" type="text" value="" readonly ng-model="myjob.end_date">-->
                                        <p>{{myjob.end_date}}</p>
                                        <span class="add-on">
                                            <i class="icon-remove"></i>
                                        </span>
                                        <span class="add-on">
                                            <i class="icon-th"></i>
                                        </span>
                                    </div>
                                    <input type="hidden" id="dtp_input3" value="" />
                                    <br/>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-sm-offset-2" JD>Notes</label>
                            <div class="col-md-6">
                               <!-- <textarea class="form-control e" n="Notes" rows="3" ng-model="myjob.notes" name="Notes"></textarea>-->
                                <p> {{myjob.notes}}</p> 
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-sm-offset-2">Job Status</label>
                            <div class="col-md-6">
                                <p>{{myjob.job_status}}</p>
                               <!--  <select class="form-control e" n="Status" rows="3" ng-model="myjob.job_status" name="Notes">
                                    
                                   <option>Hold</option>
                                    <option>Active</option>
                                    <option>Closed</option>-->
                                </select>

                            </div>
                        </div>

                        
                        </div><div class='hidden'>
                                 <button type="button" id="row"  class="btn btn-danger pull-right" ng-click="Delete()">Delete</button>
                                  <button type="submit" id="update"  class="btn btn-info pull-right" ng-click="usersave()">Update</button>
                      
                        </div>
                        </form>
                    </div>
                        
                    </div>
        
        <hr>
        
    </section>


</div>