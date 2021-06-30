<div ng-controller='profileCtrl'>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>User profile </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{profile.profilepic}}" alt="User profile picture">

              <h3 class="profile-username text-center">{{profile.name}}</h3>

              <p class="text-muted text-center">{{profile.gender}}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="pull-right">13,287</a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                B.C.A in Computer Science from the University of Delhi.
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">{{profile.location}}</p>

              <hr>
              <strong><i class="fa fa-mobile margin-r-5"></i> Contact</strong>

              <p>Phone Number: {{profile.mobileNo}}</p>
               <p>Email: {{profile.email}}</p>

              <hr>

              

              <hr>

              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-8" >
                <div class="box box-primary">
                    <div class="box-body">
                <ul class="nav nav-tabs">
                    <li class="active" ><a href="" ng-click="ProfileTabs(0)" data-toggle="tab">Update Profile<i class="fa"></i></a></li>
                    <li><a href=""   ng-click="ProfileTabs(1)" data-toggle="tab">Password Change<i class="fa"></i></a></li>
                </ul><br>
                
                        <div class="box-title">
                    
               
                    <div class="tab-content">
                        <div class="tab-pane active"  ng-show="tabindex == 0"  ng-hide="tabindex != 0" id="info-tab">
                            
                            
                            

<form class="form-horizontal">
    
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputName" ng-model="profile.name" placeholder="Name">
                    </div>
                  </div>
<!--                <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Password</label>

                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputName" ng-model="profile.password" placeholder="password">
                    </div>
                  </div>-->
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Profile Image</label>

                    <div class="col-sm-8">
                        <iframe  ng-if="true"  border='none' style="border:0; height: 45px; overflow: hidden;"  src="views/uploadprofilepic.php">
                            
                        </iframe>
                        
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="inputName" ng-model="profile.email" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Mobile</label>

                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputName" ng-model="profile.phoneNo" placeholder="Mobile">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Address</label>

                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputSkills" ng-model="profile.address"placeholder="Address">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                      <button type="submit" class="btn btn-danger"  ng-click="updateprofie()">Update</button>
                    </div>
                  </div>
                </form>	

                             
                            

                        </div>

                        <div ng-show="tabindex == 1" ng-hide="tabindex != 1" class="tab-pane active" id="address-tab">
                            
                            

                            

                            
<form class="form-horizontal">
    
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Password</label>

                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputName"  placeholder="password">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">New Password</label>

                    <div class="col-sm-8">
                       <input type="text" class="form-control" id="inputName"  placeholder="New Password">
                            
                        </iframe>
                        
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Conform password</label>

                    <div class="col-sm-8">
                       <input type="text" class="form-control" id="inputName"  placeholder="Reset password">
                            
                       
                        
                    </div>
                  </div>
                  
                  
                  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                      <button type="submit" class="btn btn-info"  >Password Update</button>
                    </div>
                  </div>
                </form>	

                            
                            

                        </div>
                    </div>

                    
                </form>
                        </div>
                </div>
                    </div>
            </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
</div>
