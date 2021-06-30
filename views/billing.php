<div ng-controller='billingCtrl'>

    <section class="content-header">
        <h1 >
            Dashboard
            <small>Billing</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Job</li>
        </ol>
    </section>

    <div class="main-panel">
<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                
                                <div class="card-content">
                                    <div id="exTab3">	
                    <ul class="nav nav-pills">
                        <li class="active">
                            <a href="#1b" show-tab="" data-toggle="tab" aria-expanded="true">Joined Candidates</a>
                        </li>
                        <li class=""><a href="#2b" show-tab="" data-toggle="tab" aria-expanded="false">Invoice in Process</a>
                        </li>
                        <li class=""><a href="#3b" show-tab="" data-toggle="tab" aria-expanded="false">Invoice   Recieved</a>
                        </li>
                       

                    </ul>
                    <hr class="hrstye">
                    <div class="tab-content clearfix col-md-12">
                        <div class="tab-pane active" id="1b">

                            <div id="exTab3" class="container col-md-12">	
         <div class="row">
                                                 <div class="col-md-3">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                    <i class="fa fa fa-user fa-lg"> <h4>Deepak Rai</h4></i>
                                </div>
                                <ul class="nav">
                                <li>
                        <a href="#">
                            <i class="fa fa-male fa-lg"><span class="spanclass">Software</span></i><br>
                            <i class="fa fa-money fa-lg"><span class="spanclass">Billablectc</span></i><br>
                             <i class="fa fa-calendar fa-lg"><span class="spanclass">Date</span></i>
                            
                        </a>
                    </li>
                    </ul>
                               
                               
                                <div class="card-footer">
                                    <div class="timeline-heading">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-info btn-md"  data-toggle="modal" data-target=".bs-example-modal-lg">Generated</button>
                                        </div>  
                                                </div>
                                </div>
                                                
                            </div>
                        </div>
                                                
                                               
                                               
                                                
                                                
                                            </div>

                                <div class="tab-content clearfix">

                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane" id="2b">

                            <div id="exTab3" class="container col-md-12">	
                                
<div class="col-md-3">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                    <i class="fa fa fa-user fa-lg"> <h4>Deepak Rai</h4></i>
                                </div>
                                <ul class="nav">
                                <li>
                        <a href="#">
                            <i class="fa fa-male fa-lg"><span class="spanclass">Software</span></i><br>
                            <i class="fa fa-money fa-lg"><span class="spanclass">Billablectc</span></i><br>
                             <i class="fa fa-calendar fa-lg"><span class="spanclass">Date</span></i>
                            
                        </a>
                    </li>
                    </ul>
                               
                               
                                <div class="card-footer">
                                    <div class="timeline-heading">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <select class="form-control" id="selectbox">
                                                                        <option value="#">
                                                                         Select
                                                                        </option>

                                                                        <option value="#myModal1">
                                                                          Accepted
                                                                        </option>

                                                                        <option value="#myModal2">
                                                                         Rejected
                                                                        </option>

                                                                        <option value="#myModal3">
                                                                          In Process
                                                                        </option>
                                                        </select>
                                            </div>
                                        </div> 
                                                </div>
                                </div>
                                                
                            </div>
                        </div>
                                <div class="tab-content clearfix">

                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="tab-pane" id="3b">

                            <div id="exTab3" class="container col-md-12">	
                                <div class="row">
                                    <div class="col-md-4">
                                        
                                            
                                        
                                    </div>
                                    <div class="col-md-4">
                                        <div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Deepak Rai</h3>
                                        <span class="pull-right clickable"><i class="glyphicon glyphicon-plus" style="position: absolute; top: 10px;"></i></span>
				</div>
                                            <div class="panel-body">
                                                <div class="card card-stats">
                                
                                <ul class="nav">
                                <li>
                        <a href="#">
                            <i class="fa fa-male fa-lg"><span class="spanclass">Software</span></i><br>
                            <i class="fa fa-money fa-lg"><span class="spanclass">Billablectc</span></i><br>
                             <i class="fa fa-calendar fa-lg"><span class="spanclass">Date</span></i>
                            
                        </a>
                    </li>
                    </ul>
 
                                <div class="card-footer">
                                    <div class="timeline-heading">
                                        <div class="form-group">
                                             
                                        </div>  
                                                </div>
                                </div>     
                            </div>
                                            </div>
			</div>
                                    </div>
                                </div>
                                <div class="tab-content clearfix">
                                </div>
                            </div>
                        </div>
                        
                        <div class="clearfix"></div>
                        

                    </div>
                </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                 
                </div>
            </div>
    
    
    
    <!-- Genrated bill Popup-->
                                <div class="modal bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
          <h5 class="center" id="exampleModalLabel">Print the file</h5>
      </div>
      <div class="modal-body">
           <iframe src="http://www.w3schools.com" width="100%" height="380"></iframe>
         
      </div>
      <div class="modal-footer">
           
        <button type="button" class="btn btn-secondary" >PDF</button>
        <button type="button" class="btn btn-primary">Word</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-md" data-dismiss="modal">Sumit to Client</button>
      </div>
    </div>
  </div>
                                  
</div>
               <!-- End Genrated bill Popup-->   
               
               
               
               <!--  send Mail Popup-->  
               <div class="modal bs-example-modal-md" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
          <h3 class="center" id="exampleModalLabel">Send Mail to Cleint</h3>
      </div>
      <div class="modal-body">
       <form class="form-horizontal" role="form" method="post" action="index.php">
           <div class="form-group">
		<label for="name" class="col-sm-2 control-label">Template</label>
		<div class="col-md-10">
                    <select class="form-control">
  <option>Mustard</option>
  <option>Ketchup</option>
  <option>Relish</option>
</select>

		</div>
	</div>

	<div class="form-group">
		<label for="email" class="col-sm-2 control-label">Email</label>
		<div class="col-sm-10">
			<input type="email" class="form-control" ng-model="sendemailtoclient.tomail"    placeholder="example@domain.com" value="">
		</div>
	</div>
           	<div class="form-group">
		<label for="name" class="col-sm-2 control-label">Subject</label>
		<div class="col-sm-10">
                    <input type="text" class="form-control" ng-model="sendemailtoclient.subject"  placeholder="First & Last Name" value="">
		</div>
	</div>
	<div class="form-group">
		<label for="message" class="col-sm-2 control-label">Message</label>
		<div class="col-sm-10">
			<textarea class="form-control" rows="4" ng-model="sendemailtoclient.message"  name="message"></textarea>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-10 col-sm-offset-2">
		<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
		</div>
	</div>
	
</form>
      </div>
      
    </div>
  </div>
                                  
</div>
                 <!-- End send Mail Popup-->  
                 
                 <!-- start popup selected-->
                 <div id="myModal1" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal">×</button>
                                                  <h3 class="center">In Process</h3>
                                                </div>
                                                <div class="modal-body info">
                                                 <form class="ng-pristine ng-valid">
                                              <div class="form-group">
                                                  <label for="servicetax">Service Tax</label>
                                                  <input type="text" class="form-control" id="servicetax" placeholder="Service Tax">
                                              </div>
                                              <div class="form-group">
                                                  <label for="TDS">TDS</label>
                                                  <input type="text" class="form-control" id="TDS" placeholder="TDS">
                                              </div>
                                              <div class="form-group">
                                                  <label for="servicecharge">Service Charge</label>
                                                  <input type="text" class="form-control" id="servicecharge" placeholder="TDS">
                                              </div>
                                              <button type="submit" class="btn btn-primary">Save</button>
                                          </form>
                                                </div>
                                              </div>
                                            </div>
</div>
                 
                 <!--end popup selected-->
</div>


<script type="text/javascript">
$(document).on('click', '.panel-heading span.clickable', function(e){
    var $this = $(this);
	if(!$this.hasClass('panel-collapsed')) {
		$this.parents('.panel').find('.panel-body').slideUp();
		$this.addClass('panel-collapsed');
		$this.find('i').removeClass('glyphicon glyphicon-plus').addClass('glyphicon glyphicon-plus rotate-icon');
	} else {
		$this.parents('.panel').find('.panel-body').slideDown();
		$this.removeClass('panel-collapsed');
		$this.find('i').removeClass('glyphicon glyphicon-plus rotate-icon').addClass('glyphicon glyphicon-plus');
	}
})

</script>
<script type="text/javascript">
     $("#selectbox").on("change", function() {
   var sOptionVal = $(this).val();
   if (/modal/i.test(sOptionVal)) {
     var $selectedOption = $(sOptionVal);
     $selectedOption.modal('show');
   }
 });

</script>




