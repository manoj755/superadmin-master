<?php include 'users.php';?>
<div id="useredit">
    <div><label for="role_id">Role Id</label>
    <input type="number" required  class="form-control" ng-model="Users.role_id" id="role_id" placeholder="Role Id">
        <span class="help-block alert-danger alert" ng-show="errors.role_id[0]">{{ errors.role_id.toString()}}</span>
  </div>
<div class='col-md-4'><div class="form-group">
    <label for="email">Email</label>
    <textarea  class="form-control" maxlength='100' ng-model="Users.email" id="email" placeholder="Email"></textarea>
        <span class="help-block alert alert-danger" ng-show="errors.email[0]">{{ errors.email.toString()}}</span>
  </div>
</div><div class='col-md-4'><div class="form-group">
    <label for="name">Name</label>
    <input type="text" required maxlength='50' class="form-control" ng-model="Users.name" id="name" placeholder="Name">
        <span class="help-block alert-danger alert" ng-show="errors.name[0]">{{ errors.name.toString()}}</span>
  </div>
</div><div class='row'><div class='col-md-4'><div class="form-group">
    <label for="password">Password</label>
    <textarea required class="form-control" maxlength='2000' ng-model="Users.password" id="password" placeholder="Password"></textarea>
        <span class="help-block alert alert-danger" ng-show="errors.password[0]">{{ errors.password.toString()}}</span>
  </div>
</div><div class='col-md-4'><div class="form-group">
    <label for="gender">Gender</label>
    <input type="number" required  class="form-control" ng-model="Users.gender" id="gender" placeholder="Gender">
        <span class="help-block alert-danger alert" ng-show="errors.gender[0]">{{ errors.gender.toString()}}</span>
  </div>
</div><div class='col-md-4'><div class="form-group">
    <label for="profilepic">Profilepic</label>
    <input type="text"   class="form-control" ng-model="Users.profilepic" id="profilepic" placeholder="Profilepic">
        <span class="help-block alert-danger alert" ng-show="errors.profilepic[0]">{{ errors.profilepic.toString()}}</span>
  </div>
</div></div><div class='row'><div class='col-md-4'><div class="form-group">
    <label for="country">Country</label>
    <textarea  class="form-control" maxlength='100' ng-model="Users.country" id="country" placeholder="Country"></textarea>
        <span class="help-block alert alert-danger" ng-show="errors.country[0]">{{ errors.country.toString()}}</span>
  </div>
</div><div class='col-md-4'><div class="form-group">
    <label for="state">State</label>
    <textarea  class="form-control" maxlength='100' ng-model="Users.state" id="state" placeholder="State"></textarea>
        <span class="help-block alert alert-danger" ng-show="errors.state[0]">{{ errors.state.toString()}}</span>
  </div>
</div><div class='col-md-4'><div class="form-group">
    <label for="city">City</label>
    <input type="text"  maxlength='50' class="form-control" ng-model="Users.city" id="city" placeholder="City">
        <span class="help-block alert-danger alert" ng-show="errors.city[0]">{{ errors.city.toString()}}</span>
  </div>
</div></div><div class='row'><div class='col-md-4'><div class="form-group">
    <label for="location">Location</label>
    <input type="text"  maxlength='50' class="form-control" ng-model="Users.location" id="location" placeholder="Location">
        <span class="help-block alert-danger alert" ng-show="errors.location[0]">{{ errors.location.toString()}}</span>
  </div>
</div><div class='col-md-4'><div class="form-group">
    <label for="phoneNo">Phone No</label>
    <input type="text"  maxlength='50' class="form-control" ng-model="Users.phoneNo" id="phoneNo" placeholder="Phone No">
        <span class="help-block alert-danger alert" ng-show="errors.phoneNo[0]">{{ errors.phoneNo.toString()}}</span>
  </div>
</div><div class='col-md-4'><div class="form-group">
    <label for="mobileNo">Mobile No</label>
    <input type="text"  maxlength='50' class="form-control" ng-model="Users.mobileNo" id="mobileNo" placeholder="Mobile No">
        <span class="help-block alert-danger alert" ng-show="errors.mobileNo[0]">{{ errors.mobileNo.toString()}}</span>
  </div>
</div></div><div class='row'><div class='col-md-4'><div class="form-group">
    <label for="address">Address</label>
    <textarea  class="form-control" maxlength='200' ng-model="Users.address" id="address" placeholder="Address"></textarea>
        <span class="help-block alert alert-danger" ng-show="errors.address[0]">{{ errors.address.toString()}}</span>
  </div>
</div><div class='col-md-4'><div class="form-group">
    <label for="dob">Dob</label>
    <input type="text"   class="form-control" ng-model="Users.dob" id="dob" placeholder="Dob">
        <span class="help-block alert-danger alert" ng-show="errors.dob[0]">{{ errors.dob.toString()}}</span>
  </div>
</div><div class='col-md-4'><div class="form-group">
    <label for="app_id">App Id</label>
    <input type="number" required  class="form-control" ng-model="Users.app_id" id="app_id" placeholder="App Id">
        <span class="help-block alert-danger alert" ng-show="errors.app_id[0]">{{ errors.app_id.toString()}}</span>
  </div>
</div></div><div class='row'><div class='col-md-4'><div class="form-group">
    <label for="manager">Manager</label>
    <input type="number" required  class="form-control" ng-model="Users.manager" id="manager" placeholder="Manager">
        <span class="help-block alert-danger alert" ng-show="errors.manager[0]">{{ errors.manager.toString()}}</span>
  </div>
</div><div class='col-md-4'><div class="form-group">
    <label for="loginId">Login Id</label>
    <input type="number" required  class="form-control" ng-model="Users.loginId" id="loginId" placeholder="Login Id">
        <span class="help-block alert-danger alert" ng-show="errors.loginId[0]">{{ errors.loginId.toString()}}</span>
  </div>
</div><div class='col-md-4'><div class="form-group">
    <label for="ipAddress">Ip Address</label>
    <input type="text"  maxlength='50' class="form-control" ng-model="Users.ipAddress" id="ipAddress" placeholder="Ip Address">
        <span class="help-block alert-danger alert" ng-show="errors.ipAddress[0]">{{ errors.ipAddress.toString()}}</span>
  </div>
</div></div><div class='row'><div class='col-md-4'><div class="form-group">
    <label for="mailpassword">Mailpassword</label>
    <textarea  class="form-control" maxlength='200' ng-model="Users.mailpassword" id="mailpassword" placeholder="Mailpassword"></textarea>
        <span class="help-block alert alert-danger" ng-show="errors.mailpassword[0]">{{ errors.mailpassword.toString()}}</span>
  </div>
</div><div class='col-md-4'><div class="form-group">
    <label for="otp">Otp</label>
    <input type="text"  maxlength='4' class="form-control" ng-model="Users.otp" id="otp" placeholder="Otp">
        <span class="help-block alert-danger alert" ng-show="errors.otp[0]">{{ errors.otp.toString()}}</span>
  </div>
</div><div class='col-md-4'><div class="form-group">
    <label for="channel_id">Channel Id</label>
    <textarea  class="form-control" maxlength='100' ng-model="Users.channel_id" id="channel_id" placeholder="Channel Id"></textarea>
        <span class="help-block alert alert-danger" ng-show="errors.channel_id[0]">{{ errors.channel_id.toString()}}</span>
  </div>
</div></div><div class='row'><div class='col-md-4'><div class="form-group">
    <label for="current_job_id">Current Job Id</label>
    <input type="number" required  class="form-control" ng-model="Users.current_job_id" id="current_job_id" placeholder="Current Job Id">
        <span class="help-block alert-danger alert" ng-show="errors.current_job_id[0]">{{ errors.current_job_id.toString()}}</span>
  </div>
</div><div class='col-md-4'><div class="form-group">
    <label for="reference_email_template_id">Reference Email Template Id</label>
    <input type="number" required  class="form-control" ng-model="Users.reference_email_template_id" id="reference_email_template_id" placeholder="Reference Email Template Id">
        <span class="help-block alert-danger alert" ng-show="errors.reference_email_template_id[0]">{{ errors.reference_email_template_id.toString()}}</span>
  </div>
</div><div class='col-md-4'><div class="form-group">
    <label for="reference_sms_template_id">Reference Sms Template Id</label>
    <input type="number" required  class="form-control" ng-model="Users.reference_sms_template_id" id="reference_sms_template_id" placeholder="Reference Sms Template Id">
        <span class="help-block alert-danger alert" ng-show="errors.reference_sms_template_id[0]">{{ errors.reference_sms_template_id.toString()}}</span>
  </div>
</div></div><div class='row'><div class='col-md-4'><div class="form-group">
    <label for="isvendor">Isvendor</label>
    <input type="number" required  class="form-control" ng-model="Users.isvendor" id="isvendor" placeholder="Isvendor">
        <span class="help-block alert-danger alert" ng-show="errors.isvendor[0]">{{ errors.isvendor.toString()}}</span>
  </div>
</div><div class='col-md-4'><div class="form-group">
    <label for="signout">Signout</label>
    <input type="number" required  class="form-control" ng-model="Users.signout" id="signout" placeholder="Signout">
        <span class="help-block alert-danger alert" ng-show="errors.signout[0]">{{ errors.signout.toString()}}</span>
  </div>
</div><div class='col-md-4'><div class="form-group">
    <label for="is_send_auto_email_reference">Is Send Auto Email Reference</label>
    <input type="number" required  class="form-control" ng-model="Users.is_send_auto_email_reference" id="is_send_auto_email_reference" placeholder="Is Send Auto Email Reference">
        <span class="help-block alert-danger alert" ng-show="errors.is_send_auto_email_reference[0]">{{ errors.is_send_auto_email_reference.toString()}}</span>
  </div>
</div></div><div class='row'><div class='col-md-4'><div class="form-group">
    <label for="user_agent">User Agent</label>
    <textarea  class="form-control" maxlength='200' ng-model="Users.user_agent" id="user_agent" placeholder="User Agent"></textarea>
        <span class="help-block alert alert-danger" ng-show="errors.user_agent[0]">{{ errors.user_agent.toString()}}</span>
  </div>
</div><div class='col-md-4'><div class="form-group">
    <label for="last_ip">Last Ip</label>
    <input type="text"  maxlength='45' class="form-control" ng-model="Users.last_ip" id="last_ip" placeholder="Last Ip">
        <span class="help-block alert-danger alert" ng-show="errors.last_ip[0]">{{ errors.last_ip.toString()}}</span>
  </div>
</div><div class='col-md-4'><div class="form-group">
    <label for="port">Port</label>
    <input type="text"  maxlength='45' class="form-control" ng-model="Users.port" id="port" placeholder="Port">
        <span class="help-block alert-danger alert" ng-show="errors.port[0]">{{ errors.port.toString()}}</span>
  </div>
</div></div><div class='row'><div class='col-md-4'><div class="form-group">
    <label for="outgoing_server">Outgoing Server</label>
    <textarea  class="form-control" maxlength='300' ng-model="Users.outgoing_server" id="outgoing_server" placeholder="Outgoing Server"></textarea>
        <span class="help-block alert alert-danger" ng-show="errors.outgoing_server[0]">{{ errors.outgoing_server.toString()}}</span>
  </div>
</div><div class='col-md-4'><div class="form-group">
    <label for="ssl_details">Ssl Details</label>
    <textarea  class="form-control" maxlength='100' ng-model="Users.ssl_details" id="ssl_details" placeholder="Ssl Details"></textarea>
        <span class="help-block alert alert-danger" ng-show="errors.ssl_details[0]">{{ errors.ssl_details.toString()}}</span>
  </div>
</div><div class='col-md-4'><div class="form-group">
    <label for="driver">Driver</label>
    <textarea  class="form-control" maxlength='100' ng-model="Users.driver" id="driver" placeholder="Driver"></textarea>
        <span class="help-block alert alert-danger" ng-show="errors.driver[0]">{{ errors.driver.toString()}}</span>
  </div>
</div></div><div class='row'><div class='col-md-4'><div class="form-group">
    <label for="secondusername">Secondusername</label>
    <textarea  class="form-control" maxlength='800' ng-model="Users.secondusername" id="secondusername" placeholder="Secondusername"></textarea>
        <span class="help-block alert alert-danger" ng-show="errors.secondusername[0]">{{ errors.secondusername.toString()}}</span>
  </div>
</div> <div class="form-group">
                            <div class=" col-md-10">
                                <button type="submit" class="btn btn-primary"  ng-hide="isEditUsers" ng-click="Userssave()">Save</button>
                                <button type="button" class="btn btn-primary" ng-show="isEditUsers" ng-click="Usersupdate()">Update</button>
                                <button type="button" class="btn btn-primary" ng-show="isEditUsers" ng-click="Usersback()">Back</button>
                            </div>
                        </div>
</form></div></div>