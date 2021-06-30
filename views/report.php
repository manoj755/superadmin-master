<div ng-controller='reportCtrl' ng-cloak="">
    <section class="content-header">
        <h1>
            Dashboard 
            <small>Client Reports</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
         <div class="row">
            <div class="col-md-12col-xs-12">
                <div class="text-center">
                        <a class="quick-btn"  href="#/refferreports">
                <i class="fa  fa-file-text fa-2x" class="col-md-3"></i>
              
                <span class="label label-info">Reffer Report</span> 
              
              </a> 
                    <a class="quick-btn" href="#/jobreports" >
                <i class="glyphicon glyphicon-header fa-2x"></i>
              
                <span class="label label-info">Job Report</span> 
              </a> 

            </div>
            </div> 
         </div><hr>
        <div ui-grid="gridClientReports" ui-grid-selection ui-grid-pagination  ui-grid-cellnav ui-grid-exporter class="grid"></div>
       
    </section>


</div>