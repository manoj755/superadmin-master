<ul class="nav nav-tabs">
    <li class="active"><a show-tab data-toggle="tab" onclick="return false;" href="#profile">Profile</a></li>
    <li ><a show-tab  onclick="return false;"  data-toggle="tab" href="#cv">CV</a></li>


</ul>


<div class="tab-content">
    <div id="profile" class=" tab-pane fade in active">
        <div class="container" style="width:100%;padding:40px 20px;background:#dee5ea; color: #4e4e4e;">

            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label for="name" class ="control-label col-sm-4">Full Name</label>
                    <div class="col-sm-7"> 
                        <input type="text" class="form-control" ng-model="candidateshowdata.candidateName" id="name" placeholder="Enter name">
                    </div>
                </div>


                <div class="form-group">
                    <label for="gender" class ="control-label col-sm-4">Gender</label>
                    <div class="col-sm-7">
                        <select class="form-control" id="gender" ng-model="candidateshowdata.gender">
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                            
                        </select>
                    </div>
                </div>


<!--                <div class="form-group">
                    <label for="email" class ="control-label col-sm-4">Current Organization</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="currentorg" ng-model="candidateshowdata.currentOrganization" placeholder="Current Organization">
                    </div>
                </div>
                <div class="form-group">
                    <label for="currentdesignation" class="control-label col-sm-4">Current designation</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="currentdesignation" ng-model="candidateshowdata.currentDesignation" placeholder="Current designation">
                    </div>
                </div>-->
                <div class="form-group">
                    <label for="currentdesignation" class="control-label col-sm-4">Relevant Experiance</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="currentdesignation" ng-model="candidateshowdata.relevantExperiance" placeholder="Relevant Experiance">
                    </div>
                </div>
                
                 <div class="form-group">
                    <label for="Qualification" class="control-label col-sm-4">Qualification</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" ng-model="candidateshowdata.qualification" id="Qualification" placeholder="Qualification">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Qualification" class="control-label col-sm-4">Country</label>
                    <div class="col-sm-7">
                        <select  class="form-control" ng-model="candidateshowdata.country" id="Qualification" placeholder="Country">
                              <option ng-repeat="x in countries" value="{{x.id}}">
                            {{x.name}} ({{x.country_code}})
                        </option>
                        </select>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="Qualification" class="control-label col-sm-4">State</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" ng-model="candidateshowdata.state" id="Qualification" placeholder="State">
                    </div>
                </div>
                 <div class="form-group">
                    <label for="Qualification" class="control-label col-sm-4">City</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" ng-model="candidateshowdata.city" id="Qualification" placeholder="City">
                    </div>
                </div>
                  <div class="form-group">
                    <label for="location" class="control-label col-sm-4">Current Location</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control"  ng-model="candidateshowdata.location"  id="location" placeholder="CurrentLocation">
                    </div>
                </div>

                <div class="form-group">
                    <label for="preferedlocation" class="control-label col-sm-4">Prefered Location</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" ng-model="candidateshowdata.preferredLocation" id="preferelocation" placeholder="prefered Location">
                    </div>
                </div>
                 <div class="form-group">
                    <label for="Salary" class="control-label col-sm-4">Current Salary</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control"  ng-model="candidateshowdata.currentSalary" id="Salary" placeholder="Current Salary">
                    </div>
                </div>
                 <div class="form-group">
                    <label for="Salary" class="control-label col-sm-4">Expected  Salary</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control"  ng-model="candidateshowdata.expectedSalary" id="Salary" placeholder="Expected  salary">
                    </div>
                </div>
                   <div class="form-group">
                    <label for="Mobile" class="control-label col-sm-4">Phone Number</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" ng-model="candidateshowdata.phoneNo" id="mobile" placeholder="Phone Number">
                    </div>
                </div>
                
                   <div class="form-group">
                    <label for="Mobile" class="control-label col-sm-4">Mobile</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" ng-model="candidateshowdata.mobileNo" id="mobile" placeholder="Enter the Mobile">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Mobile" class="control-label col-sm-4">Notice Period</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" ng-model="candidateshowdata.noticePeriod" id="mobile" placeholder="Notice Period">
                    </div>
                </div>
                 <div class="form-group">
                    <label for="Mobile" class="control-label col-sm-4">Nationality</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" ng-model="candidateshowdata.nationality" id="mobile" placeholder="Nationality">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Mobile" class="control-label col-sm-4">Visa Type</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" ng-model="candidateshowdata.visaType" id="mobile" placeholder="Visa Type">
                    </div>
                </div>
<!--                <div class="form-group">
                    <label for="Mobile" class="control-label col-sm-4">Remark</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" ng-model="candidateshowdata.remark" id="mobile" placeholder="Remark">
                    </div>
                </div>-->
                 
                 <div class="form-group">
                    <label for="Mobile" class="control-label col-sm-4">Ovarall Experiance</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" ng-model="candidateshowdata.ovarallExperiance" id="mobile" placeholder="Ovarall Experiance">
                    </div>
                </div>
                 <div class="form-group">
                    <label for="Mobile" class="control-label col-sm-4">Address</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" ng-model="candidateshowdata.address" id="mobile" placeholder="Address">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="control-label col-sm-4"> Official-Email</label>
                    <div class="col-sm-7">
                        <input type="email" class="form-control" ng-model="candidateshowdata.email" id="emailcandidate" placeholder="Enter the Email">
                    </div>
                </div>
             
                 <div class="form-group">
                    <label for="Pan No" class="control-label col-sm-4">Pan No</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" ng-model="candidateshowdata.panNo"  id="Function" placeholder="Enter the Pan No">
                    </div>
                </div>
<!--                 <div class="form-group">
                    <label for="industry" class="control-label col-sm-4">Industry Type</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" ng-model="candidateshowdata.industryType"  id="Function" placeholder="Industry Type">
                    </div>
                </div>
                
                 <div class="form-group">
                    <label for="function" class="control-label col-sm-4">Functional Area</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control"  ng-model="candidateshowdata.functionalArea" id="Function" placeholder="Functional Area">
                    </div>
                </div>
                 <div class="form-group">
                    <label for="DOB" class="control-label col-sm-4">Date of Birth</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" ng-model="candidateshowdata.dob" id="DOB" placeholder="DOB">
                    </div>
                </div>
                 
                <div class="form-group">
                    <label for="keyskill" class="control-label col-sm-4">Key Skills:</label>
                    <div class="col-sm-7">
                        <textarea   class="form-control"  ng-model="candidateshowdata.skillSet" id="keyskill" placeholder="Key Skills">
                        </textarea>
                    </div>
                </div>
               
               
                <div class="form-group">
                    <label for="function" class="control-label col-sm-4">Function</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control"  ng-model="candidateshowdata.function" id="Function" placeholder="function">
                    </div>
                </div>
               
                
                 <div class="form-group hidden" >
                    <label for="function" class="control-label col-sm-4">Source</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control"  ng-model="candidateshowdata.source" id="Function" placeholder="Source">
                    </div>
                </div>
               
                <div class="form-group">
                    <label for="DOB" class="control-label col-sm-4">Resume</label>
                    <div class="col-sm-7">
                        <iframe class="form-control" style="border:0; height: 45px; overflow: hidden;" src="views/uploadresume.php" id="uploadResumeupdate"></iframe>
                    </div>
                </div>-->
<!--                <div class="form-group">
                
                    <div class="col-sm-12 text-center ">
                        <a target="_blank" class="btn btn-block btn-success" href="http://api.passivereferral.com/resumes/{{candidateshowdata.resume}}">Download CV</a> 
                    </div>
                </div>-->
                
               
                <div class="form-group">
<!--<div class="col-sm-4 col-sm-offset-6">
                        <a target="_blank" class="btn btn-block btn-success btn-md" href="http://api.passivereferral.com/resumes/{{candidateshowdata.resume}}">Download CV</a> 
                    </div>-->
                    <div class="col-sm-4 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary" ng-click="updatecandidate()">Update</button>
                    </div>
                    
                </div>

            </form>
        </div>

    </div>
    <div id="cv" class="tab-pane fade ">
        <div class="well" style="position: relative;">
            
            <iframe target="{{candidateshowdata.resume}}" id="resumeview" style="border:0;"  ng-src="https://docs.google.com/gview?url=http://api.passivereferral.com/resumes/d&pid=explorer&efh=false&a=v&chrome=false&embedded=true" width="100%" height="800px"></iframe>
            <div style="width: 80px; height: 80px; position: absolute; opacity: 0; right: 0px; top: 0px;">&nbsp;</div>
        </div>
    </div>



</div>