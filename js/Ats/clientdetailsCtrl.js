// JavaScript Document
app.controller('clientdetailsCtrl', function ($scope, $rootScope, db, $mdDialog) {
    $scope.clientdetails={"start":new Date().toISOString().slice(0, 10).replace('T', ' '), "end":"2000-01-01","appid":0,"uid":0 };

       
    $scope.gridOptions = {
                                                                                                                                         

            columnDefs: [
                {field: 'id', name: 'id'},
            {field: 'app_name', },

            {field: 'total_candidates', cellTemplate: '<a class="btn primary"  href="javascript:" data-toggle="modal" data-target="#ModelShowCandidateTotal_Candidate" ng-click="grid.appScope.ShowCandidateTotalCandidate(row.entity)">{{row.entity.total_candidates}}</a>'},
            {field: 'cvparsed'},//,cellTemplate: '<a class="btn primary"  href="javascript:" data-toggle="modal" data-target="#Modelshowcvparsed" ng-click="grid.appScope.ShowCvParsed(row.entity)">{{row.entity.cvparsed}}</a>'},
            {name: 'cvaddedtojob'},//,
                //cellTemplate: '<a class="btn primary"  href="javascript:" data-toggle="modal" data-target="#ModelShowcvaddedtojob" ng-click="grid.appScope.ShowCvAddedToJob(row.entity)">{{row.entity.cvaddedtojob}}</a>'},
            {field: 'total_status_change'},//  cellTemplate: '<a class="btn primary"  href="javascript:" data-toggle="modal" data-target="#ModelShowtotal_status_change" ng-click="grid.appScope.ShowTotalStatusChange(row.entity)">{{row.entity.total_status_change}}</a>'},

         {field: 'extension_login'},//name:'extension_login', visible: true,
                //cellTemplate: '<a class="btn primary"  href="javascript:" data-toggle="modal" data-target="#ModelShowextension_login" ng-click="grid.appScope.ShowExtensionLogin(row.entity)">{{row.entity.extension_login}}</a>'},
            {field:'job_created'},//name: 'job_created',
                //cellTemplate: '<a class="btn primary"  href="javascript:" data-toggle="modal" data-target="#ModelShowjob_created" ng-click="grid.appScope.ShowJobCreated(row.entity)">{{row.entity.job_created}}</a>'},
            {field:'email_sent'},//name: 'email_sent',
                //cellTemplate: '<a class="btn primary"  href="javascript:" data-toggle="modal" data-target="#ModelShowemail_sent" ng-click="grid.appScope.ShowEmailSent(row.entity)">{{row.entity.email_sent}}</a>'},
            {name: 'message_sent'},
                //cellTemplate: '<a class="btn primary"  href="javascript:" data-toggle="modal" data-target="#ModelShowmessage_sent" ng-click="grid.appScope.ShowMessageSent(row.entity)">{{row.entity.message_sent}}</a>'},
            {name: 'reference_recieved'},
               // cellTemplate: '<a class="btn primary"  href="javascript:" data-toggle="modal" data-target="#ModelShowreference_recieved" ng-click="grid.appScope.ShowReferenceRecieved(row.entity)">{{row.entity.reference_recieved}}</a>'}
            
        ],
        //showHeader:false,
        // enableCellEditOnFocus:true,
        enableGridMenu: true, enableColumnResize: true,
        enableSelectAll: true,
        paginationPageSizes: [5, 10, 25, 50, 75],
        paginationPageSize: 10,
        exporterCsvFilename: 'myFile.csv',
        exporterPdfDefaultStyle: {fontSize: 9},
        exporterPdfTableStyle: {margin: [30, 30, 30, 30]},
        exporterPdfTableHeaderStyle: {fontSize: 10, bold: true, italics: true, color: 'red'},
        exporterPdfHeader: {text: "Users", style: 'headerStyle'},
        exporterPdfFooter: function (currentPage, pageCount) {
            return {text: currentPage.toString() + ' of ' + pageCount.toString(), style: 'footerStyle'};
        },
        exporterPdfCustomFormatter: function (docDefinition) {
            docDefinition.styles.headerStyle = {fontSize: 22, bold: true};
            docDefinition.styles.footerStyle = {fontSize: 10, bold: true};
            return docDefinition;
        },
        exporterPdfOrientation: 'landscape',
        exporterPdfPageSize: 'LETTER',
        exporterPdfMaxGridWidth: 1000,
        exporterCsvLinkElement: angular.element(document.querySelectorAll(".custom-csv-link-location")),
        onRegisterApi: function (gridApi) {
            $scope.gridApi = gridApi;
        }
    };
    
$scope.getlistmain=function(){
        //$scope.clientdetail.appid=6;
        debugger;
        //$scope.clientdetails.start=row.start;
       // $scope.clientdetails.end=row.end;
        db.list("app_report/", $scope.clientdetails,function(response)
        {
     $scope.gridOptions.data=response.data;
        },
                function (response) {
            //$scope.token=response.statusText;
            //db.sl();
        })
    
    };
   
   
    $scope.loadlogindetail = function () {
     debugger;
     
       //  $scope.clientdetails.start = moment().subtract(1, 'days');
        //$scope.clientdetails.end = moment();
 var appid = document.getElementById('usersapp').value;

       // function cb(start, end) {
            //$('#smsemailrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            //load data
            
            
            

            db.list('app_report/', $scope.clientdetails, function (response) {
                //console.log(response.data);
                $scope.gridOptions.data=response.data;
                },
         )
    // };

        //cb(start, end);
    };
    $scope.loadlogindetail();
    
//    $scope.loaddatedata = function () {
//     debugger;
//        var start = moment().subtract(1, 'days');
//        var end = moment();
// var appid = document.getElementById('usersapp').value;
//
//      function cb(start, end) {
//            //$('#smsemailrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
//            //load data
//
//            db.list('data/app_report/',{'start': start.format('YYYY-MM-DD'), 'end': end.format('YYYY-MM-DD')}, function (response) {
//                //console.log(response.data);
//                $scope.gridOptions.data=response.data;
//                },
//        cb )
//     };
//
//        cb(start, end);
//    };
    //$scope.loaddatedata();
//$scope.getclientwisedata = function (row) {
//        debugger;
//       $scope.clientdetails.appid=row.id;
//        //$scope.myjob.job_id = '0';
//        db.list("app_report/",$scope.clientdetails, function (response) {
//                $scope.gridOptions.data=response.data;
//        }, function (response) {
//            //$scope.token=response.statusText;
//        });
//    };
//   
   
   
   db.list('application/',$scope.clientdetails, function (response) {
        $scope.applications = response.data;
    });
//    db.list('users/',$scope.clientdetails, function (response) {
//        $scope.users = response.data;
//    });
    
     $scope.loadmanager = function () {
        var appid = document.getElementById('usersapp').value;
        db.list('data/users', {app_id: appid}, function (response) {
            $scope.users = response.data;
        });
    };
//    db.


//$scope.GridShowCandidateTotalCandidate = {  enableSorting: true,
//        enableRowSelection: true,
//        enableSelectAll: true,
//        //  enableFiltering:true,
//        enableGridMenu: true,};
//    $scope.ShowCandidateTotalCandidate = function (row) {
//       $scope.clientdetails.appid = row.id;
//      //  $scope.myjob.rootname = "Under Review";
////$scope.myjob.isinterview=0;
//        db.list("app_full_report/", $scope.clientdetails, function (response) {
//
//            $scope.GridShowCandidateTotalCandidate.data = response.data;
//
//}, function (response) {
//            //$scope.token=response.statusText;
//            //      db.sl();
//        });
//    };
//    
//    
//    $scope.GridShowCvParsed = {  enableSorting: true,
//        enableRowSelection: true,
//        enableSelectAll: true,
//        //  enableFiltering:true,
//        enableGridMenu: true,};
//    $scope.ShowCvParsed = function (row) {
//               $scope.clientdetails.appid = row.id;
//
//        //$scope.myjob.clientid = row.id;
//       // $scope.myjob.rootname = "Under Review";
////$scope.myjob.isinterview=0;
//        db.list("app_full_report/", $scope.clientdetails, function (response) {
//
//            $scope.GridShowCvParsed.data = response.data;
//
//}, function (response) {
//            //$scope.token=response.statusText;
//            //      db.sl();
//        });
//    };
//    
//    $scope.GridShowCvAddedToJob = {  enableSorting: true,
//        enableRowSelection: true,
//        enableSelectAll: true,
//        //  enableFiltering:true,
//        enableGridMenu: true,};
//    $scope.ShowCvAddedToJob = function (row) {
//       // $scope.myjob.clientid = row.id;
//       // $scope.myjob.rootname = "Under Review";
////$scope.myjob.isinterview=0;
//        db.list("app_full_report/", $scope.clientdetails, function (response) {
//
//            $scope.ShowCvAddedToJob.data = response.data;
//
//}, function (response) {
//            //$scope.token=response.statusText;
//            //      db.sl();
//        });
//    };
//    
//    
//    $scope.GridShowTotalStatusChange = {  enableSorting: true,
//        enableRowSelection: true,
//        enableSelectAll: true,
//        //  enableFiltering:true,
//        enableGridMenu: true,};
//    $scope.ShowTotalStatusChange = function (row) {
//        //$scope.myjob.clientid = row.id;
//      //  $scope.myjob.rootname = "Under Review";
////$scope.myjob.isinterview=0;
//        db.list("app_full_report/",$scope.clientdetails, function (response) {
//
//            $scope.GridShowcandidateStatusWiseUnderReview.data = response.data;
//
//}, function (response) {
//            //$scope.token=response.statusText;
//            //      db.sl();
//        });
//    };
//    
//    
//    $scope.GridShowExtensionLogin = {  enableSorting: true,
//        enableRowSelection: true,
//        enableSelectAll: true,
//        //  enableFiltering:true,
//        enableGridMenu: true,};
//    $scope.ShowExtensionLogin = function (row) {
//       // $scope.myjob.clientid = row.id;
//       // $scope.myjob.rootname = "Under Review";
////$scope.myjob.isinterview=0;
//        db.list("app_full_report/", $scope.clientdetails, function (response) {
//
//            $scope.GridShowExtensionLogin.data = response.data;
//
//}, function (response) {
//            //$scope.token=response.statusText;
//            //      db.sl();
//        });
//    };
//    
//    
//    $scope.GridShowJobCreated = {  enableSorting: true,
//        enableRowSelection: true,
//        enableSelectAll: true,
//        //  enableFiltering:true,
//        enableGridMenu: true,};
//    $scope.ShowJobCreated = function (row) {
//        //$scope.myjob.clientid = row.id;
//       // $scope.myjob.rootname = "Under Review";
////$scope.myjob.isinterview=0;
//        db.list("app_full_report/", $scope.clientdetails, function (response) {
//
//            $scope.GridShowJobCreated.data = response.data;
//
//}, function (response) {
//            //$scope.token=response.statusText;
//            //      db.sl();
//        });
//    };
//    
//    
//    $scope.GridShowEmailSent = {  enableSorting: true,
//        enableRowSelection: true,
//        enableSelectAll: true,
//        //  enableFiltering:true,
//        enableGridMenu: true,};
//    $scope.ShowEmailSent = function (row) {
//        //$scope.myjob.clientid = row.id;
//       // $scope.myjob.rootname = "Under Review";
////$scope.myjob.isinterview=0;
//        db.list("app_full_report/", $scope.clientdetails, function (response) {
//
//            $scope.GridShowEmailSent.data = response.data;
//
//}, function (response) {
//            //$scope.token=response.statusText;
//            //      db.sl();
//        });
//    };
//    
//    
//    $scope.GridShowMessageSent = {  enableSorting: true,
//        enableRowSelection: true,
//        enableSelectAll: true,
//        //  enableFiltering:true,
//        enableGridMenu: true,};
//    $scope.ShowMessageSent = function (row) {
//       // $scope.myjob.clientid = row.id;
//       // $scope.myjob.rootname = "Under Review";
//$scope.myjob.isinterview=0;
//        db.list("app_full_report/", $scope.clientdetails, function (response) {
//
//            $scope.GridShowMessageSent.data = response.data;
//
//}, function (response) {
//            //$scope.token=response.statusText;
//            //      db.sl();
//        });
//    };
//
// $scope.GridShowReferenceRecieved = {  enableSorting: true,
//        enableRowSelection: true,
//        enableSelectAll: true,
//        //  enableFiltering:true,
//        enableGridMenu: true,};
//    $scope.ShowReferenceRecieved = function (row) {
//       // $scope.myjob.clientid = row.id;
//       // $scope.myjob.rootname = "Under Review";
////$scope.myjob.isinterview=0;
//        db.list("app_full_report/", $scope.clientdetails, function (response) {
//
//            $scope.GridShowReferenceRecieved.data = response.data;
//
//}, function (response) {
//            //$scope.token=response.statusText;
//            //      db.sl();
//        });
//    };


});
 