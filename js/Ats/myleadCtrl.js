
// JavaScript Document
app.controller('myleadCtrl', function ($scope, $rootScope, db, $mdDialog, FH, $route, $element, uiGridConstants, $http, $filter) {


    $scope.currentPage = 0;
    $scope.pageSize = 10;


    $rootScope.jobs = [];
    $scope.numberOfPages = function (data) {
        try {
            var text = Math.ceil(data.length / $scope.pageSize);
        } catch (e) {
            var text = 0;
        }
        return text;
    }
    $scope.jobnamesuggest = function () {
        if (!$('#jobssearch').hasClass('loaded')) {


            var availableTags = [
            ];
            for (var k in $scope.jobslist) {
                availableTags.push($scope.jobslist[k].job_title);
            }
            $("#jobssearch").autocomplete({
                minLength: 1,
                source: availableTags
            });

            $('#jobssearch').addClass('loaded');
        }
        ;
    }



    $scope.showmyjoblist = true;
    $scope.filter = 'Active';
    $scope.gridmyjoblist = {
        columnDefs: [
            {name: 'candidateName',
                cellTemplate: '<a class="btn btn-link"  href="javascript:"   ng-click="grid.appScope.candidateshow(row.entity.id)">{{row.entity.candidateName}}</a>'},
            {field: "job_name"},
            {field: "currentDesignation"},
            {field: "currentOrganization"},
            {field: "currentSalary"},
            {field: "email"},
            {field: "mobileNo"},
        ],
        //showHeader: false,
        // enableCellEditOnFocus:true,
        enableGridMenu: true,
        enableColumnResize: true,
        enableSelectAll: true,
        enableFiltering: true,
        paginationPageSizes: [5, 10, 25, 50, 75],
        paginationPageSize: 10,
        exporterCsvFilename: 'myFile.csv',
        exporterPdfDefaultStyle: {
            fontSize: 9
        },
        exporterPdfTableStyle: {
            margin: [30, 30, 30, 30]
        },
        exporterPdfTableHeaderStyle: {
            fontSize: 6,
            bold: true,
            italics: true,
            color: 'red'
        },
        exporterPdfHeader: {
            text: "Users",
            style: 'headerStyle'
        },
        exporterPdfFooter: function (currentPage, pageCount) {
            return {
                text: currentPage.toString() + ' of ' + pageCount.toString(),
                style: 'footerStyle'
            };
        },
        exporterPdfCustomFormatter: function (docDefinition) {
            docDefinition.styles.headerStyle = {
                fontSize: 22,
                bold: true
            };
            docDefinition.styles.footerStyle = {
                fontSize: 10,
                bold: true
            };
            return docDefinition;
        },
        exporterPdfOrientation: 'landscape',
        exporterPdfPageSize: 'LETTER',
        exporterPdfMaxGridWidth: 1000,
        exporterCsvLinkElement: angular.element(document.querySelectorAll(".custom-csv-link-location")),
        onRegisterApi: function (gridApi) {
            $scope.gridmyjoblistApi = gridApi;
            gridApi.selection.on.rowSelectionChanged($scope, function (row) {
                $scope.countRowsinMyJob = $scope.gridmyjoblistApi.selection.getSelectedRows().length;
            });
            gridApi.selection.on.rowSelectionChangedBatch($scope, function (row) {
                $scope.countRowsinMyJob = $scope.gridmyjoblistApi.selection.getSelectedRows().length;
            });
        }
    };
    $scope.colbackup = [];
    $scope.colmain = [
        {field: 'candidateName'},
        {field: 'currentDesignation'},
        {field: 'email'},
        {field: 'currentOrganization'},
        {field: 'mobileNo'},
        {field: 'currentSalary'},
        {field: 'location'},
        {field: 'ovarallExperiance'},
        {field: 'recruitername'}

    ];
    $scope.isnormal = false;
    $scope.toggleexport = function () {
        debugger;
        if ($scope.isnormal) {
            $scope.gridOptionsloadcandidatesInPopUp.columnDefs = $scope.colbackup;
            $scope.gridOptionsloadcandidatesInPopUp.rowHeight = 105;
        } else
        {
            $scope.colbackup = $scope.gridOptionsloadcandidatesInPopUp.columnDefs;
            $scope.gridOptionsloadcandidatesInPopUp.columnDefs = $scope.colmain;
            $scope.gridOptionsloadcandidatesInPopUp.rowHeight = 30;
        }
        $scope.isnormal = !$scope.isnormal;
    }


    $scope.onboardingDetails = function (row) {
        $scope.atjrow = row;
        db.list('onboarding', {atj_id: row.ajid, candidate_detail_id: row.id, id: row.onboardingid}, function (response) {
            $scope.onboarding = response.data;
            $('#onboarding').modal('show');
        });

    };


    $scope.onboardingverify = function () {
        var row = $scope.atjrow;
        db.store('onboardingverify', {atj_id: row.ajid, candidate_detail_id: row.id, id: row.onboardingid, is_verified_success: row.is_verified_success}, function (response) {
            alert('done');
        }, function () {
            alert('try again');
        });

    };




    $scope.status_show = function (status) {
        //'to be verified', 'correct', 'incorrect', 'not sure'
        if (status == "to be verified") {
            return 'fa-question-circle-o text-info';
        } else if (status == "correct") {
            return 'fa-thumbs-o-up text-success';
        } else if (status == "incorrect") {
            return 'fa-thumbs-o-down text-danger';
        } else if (status == "not sure") {
            return 'fa-arrows-h text-alert';
        }




    };
    $scope.tochangevendor = false;

    $scope.changevendor = function (bv_vendor_id) {
        $scope.bv_vendor_id = bv_vendor_id;

    }
    $scope.setbvvendor = function () {
        var row = $scope.atjrow;
        db.store('setbvvendor', {atj_id: row.ajid, candidate_detail_id: row.id, id: row.onboardingid, bv_vendor_id: $scope.bv_vendor_id}, function (response) {

            alert('done');
        });

    };

    db.list("bvvendor/", null, function (response) {



        try {
            $scope.bvvendors = response.data;
        } catch (e) {
            console.info(e);
        }

    }, function (response) {
        //$scope.token=response.statusText;
    });

    $scope.loadmyjoblist = function () {
        $scope.showmyjoblist = !$scope.showmyjoblist;
        db.list('allcandidatesmyjoblist', {}, function (response) {
            $scope.gridmyjoblist.data = response.data;
        }, '#search_concept');

    };

    $scope.setupdateid = function (id) {
        $rootScope.updateid = id;
        $('#candidatenots').modal('show');
    };
    $scope.getnotes = function (id) {
        $rootScope.updateid = id;
        $('#notesdetail').modal('show');
        $rootScope.GetNotes();
    };

    //alert('myjob');
    $scope.min = 10;
    $scope.max = 5000;
    $scope.lower = $scope.min;
    $scope.upper = $scope.max;
    $('.validate').validate('#addnewjobform');
    $('.validate').validate('#assignCandidate');
    $('.validate').validate('#submitjob');
    $scope.vendorsave = function () {
        db.store('vendor/', $scope.vendornew, function (response) {
            if (response.data.d == true) {
                alert(response.data.msg);
            }
        }, function (response) {

        })
    };

    $scope.ishidereference = true;
    $scope.columnDefs = [{
            width: '903',
            name: "--",
            cellTemplate: 'views/partialviews/leads_in_my_lead.php',
            filterCellFiltered: true,
        }

    ];

    $scope.submit_cv_to_panel_status = function () {
        debugger;
        db.list('submit_cv_to_panel_status', {}, function (response) {

            $scope.cv_to_panel = {status: response.data};
            $('#submit_cv_to_panel_status').modal('show');

        }, function (response) {
            if (response.data.msg) {
                alert(response.data.msg);
            }
        });

    };

    $scope.sendCvToPanel = function () {
        if ($('.validatebutton').validate('#submit_cv_to_panel_status', true)) {
            var totalrow = $scope.gridApipopup.selection.getSelectedRows();
            var allrow = FH.SelectedItems(totalrow, 'ajid');


            if (allrow.length == 0)
            {
                $.fn.ShowPopUp('Please select candidate to send to panel.', 'Status', 'sm');
            } else {
                $scope.cv_to_panel.allrow = allrow;
                db.store('sendtopanelcvemail', $scope.cv_to_panel, function (response) {
                    if (response.msg) {
                        $.fn.ShowPopUp(response.msg, 'Status', 'sm');
                    } else {

                        for (var k in allrow)
                        {
                            $scope.ajid = allrow[k];
                            $scope.commentstatus =
                                    {
                                        ajid: parseInt(allrow[k]),
                                        comment: $scope.cv_to_panel.comment,
                                        status: $scope.cv_to_panel.status,
                                    };

                            $scope.updatestatuscommentmyjob(false);
                        }
                        $.fn.ShowPopUp('Cv Submitted to panel.', 'Status', 'sm');
                    }
                }, function (response) {
                    $.fn.ShowPopUp('Try again.', 'Status', 'sm');
                }
                );
            }
        }
    };
    $scope.tag = function (item) {

        debugger;
        if (item.tagged != "10") {
            db.destroy('jobtag/', item.id, function (response) {
                item.tagged = "10";
            });
        } else {

            db.store('jobtag/', {job_id: item.id}, function (response) {
                item.tagged = "11";
            });
        }

    };
    $scope.is_approved_by_manager = function (item) {

        debugger;
        if (item.is_approved_by_manager != "0") {
            db.store('removeapprovedbymanager/', {job_id: item.id}, function (response) {
                item.is_approved_by_manager = "0";
            });
        } else {

            db.store('approvedbymanager/', {job_id: item.id}, function (response) {
                item.is_approved_by_manager = "1";
            });
        }

    };



    $scope.updatestatuscommentmyjob = function (showpopup) {
        if (typeof showpopup == 'undefined')
        {
            showpopup = true;
        }

        $scope.commentstatus.pipeid = $scope.pipeid;
        //$scope.commentstatus.recruiterid=$scope.recruiterid;
        console.log($scope.commentstatus);
        db.store('leadcsr/', $scope.commentstatus, function (response) {
            $('#commentstatus').modal('hide');
            $scope.filterdrbytab();
            $scope.commentstatus = {};
            $rootScope.notificationload();
            $scope.loadCandidate();
            $scope.cancel();
            if (showpopup) {
                $.fn.ShowPopUp('Status changed successfully.', 'Status', 'sm');
            }
        }, function () {
            if (showpopup) {
                $.fn.ShowPopUp('Please try again.', 'Status', 'sm');
            }
        });
    };



    $scope.selectdeselect = function (event, item) {
        //debugger;
        if (!event.ctrlKey) {
            for (var i in $scope.jobslist) {
                $scope.jobslist[i].selected = false;
                //;
            }
        }
        item.selected = !item.selected;
    };

    $scope.purposechange = function () {

        //

        if ($('#purpose').find('option:selected').attr('isinterview') == '2') {
            $("#offerhide").show();
        } else {
            $("#offerhide").hide();
        }

        if ($('#purpose').find('option:selected').attr('isinterview') == '1') {
            $("#business").show();
        } else {
            $("#business").hide();
        }

    };
    $scope.gridOptionsloadcandidatesInPopUp = {
        columnDefs: undefined,
        rowHeight: 105, //enableFilter:true,
        //showHeader: false,
        // enableCellEditOnFocus:true,
        enableGridMenu: true,
        enableColumnResize: true,
        enableSelectAll: true,
        enableFiltering: false,
        paginationPageSizes: [5, 10, 25, 50, 75],
        paginationPageSize: 10,
        exporterCsvFilename: 'myFile.csv',
        exporterPdfDefaultStyle: {
            fontSize: 9
        },
        exporterPdfTableStyle: {
            margin: [30, 30, 30, 30]
        },
        exporterPdfTableHeaderStyle: {
            fontSize: 6,
            bold: true,
            italics: true,
            color: 'red'
        },
        exporterPdfHeader: {
            text: "Users",
            style: 'headerStyle'
        },
        exporterPdfFooter: function (currentPage, pageCount) {
            return {
                text: currentPage.toString() + ' of ' + pageCount.toString(),
                style: 'footerStyle'
            };
        },
        exporterPdfCustomFormatter: function (docDefinition) {
            docDefinition.styles.headerStyle = {
                fontSize: 22,
                bold: true
            };
            docDefinition.styles.footerStyle = {
                fontSize: 10,
                bold: true
            };
            return docDefinition;
        },
        exporterPdfOrientation: 'landscape',
        exporterPdfPageSize: 'LETTER',
        exporterPdfMaxGridWidth: 1000,
        exporterCsvLinkElement: angular.element(document.querySelectorAll(".custom-csv-link-location")),
        onRegisterApi: function (gridApi) {
            $scope.gridApipopup = gridApi;
            gridApi.selection.on.rowSelectionChanged($scope, function (row) {
                $scope.countRowsinMyJob = $scope.gridApipopup.selection.getSelectedRows().length;
            });
            gridApi.selection.on.rowSelectionChangedBatch($scope, function (row) {
                $scope.countRowsinMyJob = $scope.gridApipopup.selection.getSelectedRows().length;
            });
        }
    };
    $scope.countRowsinMyJob = 0;
    $scope.filterdropdown = '';
    $scope.process = 'all';
    $scope.mainprocess = 0;
    $scope.searchcandidatetext = '';
    $scope.isfirstload = 0;
    $scope.selectedjob = 0;
    $scope.filterhistory = function () {

        $scope.gridOptionsloadcandidatesInPopUp.columnDefs = $scope.columnDefs;

        if ($scope.searchcandidatetext.length > 0) {
            var main = [];
            for (var i in $scope.candidatedetails) {
                for (var j in $scope.candidatedetails[i]) {
                    var jk = $scope.candidatedetails[i][j];
                    console.log(jk);
                    if ($scope.candidatedetails[i][j] != null && $scope.candidatedetails[i][j].toString().toLowerCase().indexOf(angular.lowercase($scope.searchcandidatetext)) != -1) {
                        main.push($scope.candidatedetails[i]);
                        break;
                    }

                }
            }
            $scope.gridOptionsloadcandidatesInPopUp.data = main;
        } else {
            $scope.gridOptionsloadcandidatesInPopUp.data = $scope.candidatedetails;
        }
    };
    $scope.filterpopupfunction = function () {
        //debugger;
        if ($.trim($scope.filterpopup.length) == 0) {
            $scope.gridOptionsloadcandidatesInPopUp.data = $scope.candidateinpopup;
        } else {
            debugger;
            var dataafterfilter = [];
            for (var i in $scope.candidateinpopup)
            {
                var currentdata = $scope.candidateinpopup[i];
                for (var t in currentdata) {
                    var val = currentdata[t];
                    if (!isNaN(val) && val != null) {
                        try {
                            val = val.toString();
                        } catch (e) {

                        }
                    }
                    if (typeof val == 'string' && val.toLowerCase().indexOf($scope.filterpopup.toLowerCase()) != -1) {
                        dataafterfilter.push(currentdata);
                        break;
                    }
                }
            }

            $scope.gridOptionsloadcandidatesInPopUp.data = dataafterfilter;
        }
    }
    $scope.filter='no_status';
    $scope.loadleads = function () {

        //
        debugger;
        var Search = {
             
        };
        Search={ process: $scope.filter,is_my_lead:1};
        $scope.gridOptionsloadcandidatesInPopUp.data = [];
        db.list("leaddetailmyleads/", Search, function (response) {
            
            $scope.gridOptionsloadcandidatesInPopUp.columnDefs = $scope.columnDefs;
            $scope.candidatedetails = response.data;
            $scope.gridOptionsloadcandidatesInPopUp.data = response.data;
            $scope.gridOptionsloadcandidatesInPopUp.exporterAllDataFn = function () {
                return $scope.candidatedetails;
            };
            $scope.candidateinpopup = response.data;
        }, function (response) {
            //$scope.token=response.statusText;
        });
    };
    
    $scope.loadleads();
    $scope.isDisabledDate = function (currentDate, mode) {
        return mode === 'day' && (currentDate.getDay() === 0 || currentDate.getDay() === 6);
    };
    $scope.sendtrackermsg = function (download) {

        if (download)
        {
            $scope.download = true;
        } else
        {
            $scope.download = false;

        }
        if ($scope.countRowsinMyJob > 0) {
            var totalrow = 0;
            if ($scope.showmyjoblist) {
                totalrow = $scope.gridApipopup.selection.getSelectedRows();
            } else {
                totalrow = $scope.gridmyjoblistApi.selection.getSelectedRows();
            }
            var allrow = FH.SelectedWithComma(totalrow, 'ajid');
            $scope.sendtracker.atjids = allrow;
            if ($scope.download)
            {
                $scope.sendtracker.download = true;
            } else {
                $scope.sendtracker.download = false;
            }
            db.store('sendtracker', $scope.sendtracker, function (r) {
                if ($scope.download) {
                    var resumes = r.data.resumes;
                    var resumehtml = '';
                    if (resumes.length > 0) {
                        resumehtml = '</br> <h3>Resume List</h3> <div class="list-group">';
                        for (var k in resumes) {
                            resumehtml += '<a target="_blank" class="list-group-item" href="http://api.passivereferral.com/resumes/' + resumes[k].resume + '">' + resumes[k].name + '</a>';
                        }
                        resumehtml += '</div>';
                    }
                    $.fn.addpopup('Your excel is ready.<a  href="http://api.passivereferral.com/trackers/' + r.data.excel + '">Click Here</a> to Download ' + resumehtml, 'Excel Prepared');
                } else {
                    $rootScope.addmessageandremove('tracker sent');
                }
            }, function (r) {
                if (r.errormsg != undefined) {
                    $rootScope.addmessageandremove(r.errormsg);
                } else {
                    $rootScope.addmessageandremove('Some error occured');
                }
            });
        } else {
            $rootScope.addmessageandremove('Please Select CV');
        }
    };

    $scope.downloadtracker = function () {


        $scope.download = true;


        if ($scope.countRowsinMyJob > 0) {
            var totalrow = 0;
            if ($scope.showmyjoblist) {
                totalrow = $scope.gridApipopup.selection.getSelectedRows();
            } else {
                totalrow = $scope.gridmyjoblistApi.selection.getSelectedRows();
                $scope.sendtracker.trackerno = $scope.trackerno;
            }
            var allrow = FH.SelectedWithComma(totalrow, 'ajid');
            $scope.sendtracker.atjids = allrow;
            if ($scope.download)
            {
                $scope.sendtracker.download = true;
            } else {
                $scope.sendtracker.download = false;
            }
            db.store('sendtracker', $scope.sendtracker, function (r) {
                if ($scope.download) {
                    $.fn.addpopup('Your excel is ready.<a href="http://api.passivereferral.com/trackers/' + r.data.excel + '">Click Here</a> to Download', 'Excel Prepared');
                } else {
                    $rootScope.addmessageandremove('tracker sent');
                }
            }, function (r) {
                if (r.errormsg != undefined) {
                    $rootScope.addmessageandremove(r.errormsg);
                } else {
                    $rootScope.addmessageandremove('Some error occured');
                }
            });
        } else {
            $rootScope.addmessageandremove('Please Select CV');
        }
    };
    $scope.filterbyJob = function () {
        $scope.loadCandidate();
    };
 
    $scope.displaydd = 'Jobs';
    $scope.currentfilter = 'jobs';
    $scope.searchtermchange = function () {
        $scope.searchcandidatetext = '';
        $scope.searchcandidate = '';
        if ($scope.currentfilter == 'jobs') {
            $('#candidatessearch').hide();
            $('#jobssearch').show();


        } else {
            $('#candidatessearch').show();
            $('#jobssearch').hide();


        }
    };
    $scope.filteragain = function () {
        $scope.jobslistlength = $scope.numberOfPages($scope.jobslist);
        $scope.exportdata.data = $scope.jobslist;
    }
    $scope.searchtermchange();
    $scope.bindJoblist = function (data) {
        $scope.jobslist = data;
        $scope.currentPage = 0;
        $scope.jobslistlength = $scope.numberOfPages($scope.jobslist);
        $scope.exportdata.data = response.data;
        if ($scope.selectedjob !== 0) {
            for (var j in $scope.jobslist) {
                if ($scope.jobslist[j].id === $scope.selectedjob) {
                    $scope.jobslist[j].selected = true;
                }

            }
        }

    }
    $scope.isfilter = false;
    $scope.changefilter = function (val, type)
    {
        $scope.filter=val;
        $scope.loadleads();

       // $scope.bindJoblist(data);
    };

    $scope.getlist = function () {

       
    };
    $scope.searchtermchange();
    $scope.filterdropdownfunction = function (choice, display) {
        debugger;
        $scope.filterdropdown = choice;
        $scope.displaydd = display;
        $scope.currentfilter = choice;
        $scope.searchtermchange();
        //$scope.filterbyJob();
        if (choice == 'jobs') {
          //  $scope.getlist();
        }

    };
    var filterjobTimeOut = null;
    $scope.filterbycandidate = function () {
        if (filterjobTimeOut != null) {
            clearTimeout(filterjobTimeOut);
        }
        filterjobTimeOut = setTimeout(function () {
            $scope.getlist();
        }, 1000);

        $scope.searchcandidatetext = '';
    };
    $scope.filterdrbytab = function (mainprocess, childprocess, jobitem) {
        $scope.isinterview = 9;
        if (childprocess == 'isinterview') {
            childprocess = 'all';
            $scope.isinterview = 1;
        }
        debugger;
        $scope.jobitemselected = jobitem;
        if (mainprocess == null) {
            mainprocess = $scope.mainprocessnewvar;
        }
        if (childprocess == null) {
            childprocess = $scope.childprocessnewvar;
        }
        $scope.mainprocessnewvar = mainprocess;
        $scope.childprocessnewvar = childprocess;
        $scope.gridheader = childprocess;
        if (jobitem != null) {
            $scope.selectedjob = jobitem.id;
//debugger;

            $scope.selectedjoball = jobitem.allcandidate;
            $scope.selectedjobunderreview = jobitem.underreview;
            $scope.selectedjobinprocess = jobitem.inprocess;
            $scope.selectedjobselectedcandidate = jobitem.selectedcandidate;
            $scope.selectedjobrejected = jobitem.rejected;
            $scope.selectedjobininterview = jobitem.candidates_interview_count;
        }
        $scope.process = childprocess;
        if (mainprocess == 'My Referrals') {
            $scope.mainprocess = 1;
            //            $('#1b .nav li').removeClass('active');
            //            $('#1b .nav li').eq(0).addClass('active');
        } else {
            //            $('#2b .nav li').removeClass('active');
            //            $('#2b .nav li').eq(0).addClass('active');
            $scope.mainprocess = 0;
        }
        $scope.filterbyJob();
    };
    db.list('manager/', null, function (response) {
        $scope.managers = response.data;
        console.log(response);

    });
    $scope.addtojobcandidates = function () {
        if ($('.validate').validate('#assignCandidate', true)) {
            $scope.addtojobmessage = '';
            //var totalrow=$scope.gridApipopup.selection.getSelectedRows();
            //var allrow= '';//FH.SelectedWithComma(totalrow,'id');//
            var totalrow = $scope.gridApipopup.selection.getSelectedRows();
            var allrow = FH.SelectedWithComma(totalrow, 'id');
            var copyjob = {
                'candidates': allrow,
                'job': $scope.copycandidate.job_id,
                'manager': $scope.copycandidate.manager
            };
            db.store('copyjob/', copyjob, function (response) {



                $scope.getlist();
                for (var i in $scope.candidates) {
                    $scope.myjob[i] = '';
                }
                if (response.data.alreadyexists > 0) {
                    $scope.addtojobmessage = response.data.alreadyexists + ' Candidate(s) already in pipeline.';
                } else {
                    $scope.addtojobmessage = 'Assign Candidate Successfully';

                }
                alert($scope.addtojobmessage);

            });
        }
    }
    db.list('clientdetail/', null, function (response) {
        $scope.clientdetails = response.data;
        console.log(response);
    });
    $scope.selectedmanagerlist = [];
    $scope.selectedmanagerlistset = function (id) {
        if ($scope.selectedmanagerlist.indexOf(id) > -1) {
            $scope.selectedmanagerlist.pop(id);
        } else {
            $scope.selectedmanagerlist.push(id);
        }

    }

    $scope.assignjobClick = function () {
        var selected = 0;
        var job_id = 0;

        for (var m in $scope.managers) {
            $scope.managers[m].selected = false;
        }
        for (var i in $scope.jobslist) {
            if ($scope.jobslist[i].selected) {
                selected = selected + 1;
                job_id = $scope.jobslist[i].id;
            }
        }
        if (selected === 1) {
            db.list('recruiterunderjob/', {
                job_id: job_id
            }, function (response) {
                var recruiterunderjoblist = response.data;
                for (var k in recruiterunderjoblist) {
                    debugger;
                    for (var m in $scope.managers) {
                        if (recruiterunderjoblist[k].recruiter_id == $scope.managers[m].id) {
                            $scope.managers[m].selected = true;
                            break;
                        }
                    }
                }
                $('#myModal-4').modal('show');
            });

        } else {
            if (selected > 1) {
                alert('Please select one job\n' + selected + ' selected!!');
            } else if (selected < 1) {
                alert('Please select job');
            }
        }
    };


    $scope.assignjobClickToVendor = function () {
        var selected = 0;
        var job_id = 0;
        debugger;
        for (var m in $scope.vendors) {
            $scope.vendors[m].selected = false;
        }
        for (var i in $scope.jobslist) {
            if ($scope.jobslist[i].selected) {
                selected = selected + 1;
                job_id = $scope.jobslist[i].id;
            }
        }
        if (selected === 1) {
            db.list('vendorunderjob/', {
                job_id: job_id
            }, function (response) {
                var vendorunderjoblist = response.data;
                for (var k in vendorunderjoblist) {
                    debugger;
                    for (var m in $scope.vendors) {
                        if (vendorunderjoblist[k].vendor_user_id == $scope.vendors[m].id) {
                            $scope.vendors[m].selected = true;
                            break;
                        }
                    }
                }
                $('#vendor').modal('show');
            });

        } else {
            if (selected > 1) {
                alert('Please select one job\n' + selected + ' selected!!');
            } else if (selected < 1) {
                alert('Please select job');
            }
        }
    };


    $scope.assignjob = function () {
        var assignjob = {
            'managers': FH.SelectedCheckbox($scope.managers),
            'jobs': FH.SelectedCheckbox($scope.jobslist)
        };
        db.store('assignjob/', assignjob, function (response) {
            console.log(response);
        });
    };


    $scope.unassignjob = function () {
        var unassignjob = {
            'managers': FH.SelectedCheckbox($scope.managers),
            'jobs': FH.SelectedCheckbox($scope.jobslist)
        };
        db.store('unassignjob/', unassignjob, function (response) {
            console.log(response);


        });
    };


    $scope.assignjobtovendor = function () {
        var assignjob = {
            'vendors': FH.SelectedCheckbox($scope.vendors),
            'jobs': FH.SelectedCheckbox($scope.jobslist)
        };
        db.store('assignjobtovendor/', assignjob, function (response) {
            console.log(response);
            $rootScope.addmessageandremove('Assigned Jobs', '#vendor');
        });
    };


    $scope.unassignjobtovendor = function () {
        var unassignjob = {
            'vendors': FH.SelectedCheckbox($scope.vendors),
            'jobs': FH.SelectedCheckbox($scope.jobslist)
        };
        db.store('unassignjobtovendor/', unassignjob, function (response) {
            console.log(response);
            $rootScope.addmessageandremove('Un-Assigned Jobs', '#vendor');
        });
    };






    $scope.showcvs = function (jobid) {

        $scope.jobidcvupload = jobid;
    };
    $scope.cvformdatapost = function () {
        var formData = [];
        console.log($scope.cvslists);
        $("#cvformdata .rowtr").each(function () {
            var Row = {
                'jobid': $scope.jobidcvupload
            };
            $(this).find('.key').each(function () {
                var key = $(this).attr('key');
                Row[key] = $(this).val();
                //                if (key == 'email') {
                //
                //                    for (var j in $scope.cvslists) {
                //                        if ($scope.cvslists[j].email == $(this).val()) {
                //                            Row['resume'] = $scope.cvslists[j].file;
                //                        }
                //                    }
                //
                //                }

            });
            formData.push(Row);
        });
        db.store('uploadcvs/', {
            cvs: formData
        }, function (response) {
            var responsedata = response.data;
            for (var tt in $scope.cvslists) {
                var email = $scope.cvslists[tt].email;
                for (var d in responsedata.alreadyexists) {
                    if (responsedata.alreadyexists[d] === email) {
                        $scope.cvslists[tt].statusofsubmit = 'fail';
                        break;
                    }
                }
                for (var d in responsedata.newcv) {
                    if (responsedata.newcv[d] === email) {
                        $scope.cvslists[tt].statusofsubmit = 'done';
                        break;
                    }
                }

            }
        }, function (response) {});
        for (var t in $scope.cvslists) {

            var data = {
                file: $scope.cvslists[t].file,
                email: $scope.cvslists[t].email,
                'jobid': $scope.jobidcvupload
            };
            db.upload('uploadcvs/', data, function (response) {}, function (response) {}, function (response) {});
        }
        console.log(formData);
    };
    $scope.upload = function (file, jobid) {

        $scope.jobidcvupload = jobid;
        db.upload('getcvexceldata/', {
            file: file
        }, function (response) {
            $('#showcvs').modal('show');
            $scope.cvslists = response.data;
        }, function (response) {
            $rootScope.addmessageandremove('Please try again');
        }, function (percentage, response) {
            document.title = percentage;
        });
    };
    $scope.uploadinvoicevendor = function (file, invoiceid) {
        if (file != null) {
            debugger;
            $scope.inovoicedata = {};
            $scope.inovoicedata.file = file;
            $scope.inovoicedata.invoiceid = invoiceid;
            db.upload('uploadinvoicevendor/', $scope.inovoicedata, function (response) {
                $rootScope.addmessageandremove('uploaded', '#candidatesall');
                alert('uploaded');
            }, function (response) {
                $rootScope.addmessageandremove('Please try again', '#candidatesall');
            }, function (percentage, response) {
                document.title = percentage;
            });
        }
    };
    $scope.loadmyteam = function () {
        db.list('manager/', null, function (response) {
            $scope.managers = response.data;
            console.log(response);
        });
    };
    $scope.loadmyteam();
    $scope.loadvendor = function () {

        db.list('vendor/', null, function (response) {
            $scope.vendors = response.data;
            console.log(response);
        });

        $scope.assignjobClickToVendor();
    };
    $scope.allstatusload = 0;
    $scope.entityvar = {};
    $scope.comment = function (entity) {
        debugger;
        if (entity)
        {
            $scope.entityvar = entity;
        } else
        {
            entity = $scope.entityvar;
        }
        if ($scope.allstatus) {
            $scope.allstatusload = 1;
        } else {
            $scope.allstatusload = 0;
        }

        debugger;
        if (entity.recruiter_id == null) {
            $scope.showowner = true;
        } else {
            $scope.showowner = false;
        }
        $scope.pipeid = entity.pipeid;
        $rootScope.pipeid = entity.pipeid;
        console.log(entity);
        $scope.currentstatusid = entity.status_id;
        $scope.currentstatusname = entity.display_name;
        db.list('leadcsr/' + entity.status_id, {allstatus: $scope.allstatusload}, function (response) {
            $("#business").hide();
            $("#offerhide").hide();
            $scope.statuses = response.data;
            $('#commentstatus').modal('show');
            //            $mdDialog.show({
            //                contentElement: '#commentstatus',
            //                parent: angular.element(document.body),
            //                clickOutsideToClose: true,
            //                fullscreen: false,
            //                disableParentScroll: false
            //
            //            });
        });
    }
    //alert('sd');
    $scope.updatestatuscommentmyjob = function () {

        $scope.commentstatus.pipeid = $scope.pipeid;
        // $scope.offer_letter_details.ajid = $scope.ajid;
        //$scope.commentstatus.recruiterid=$scope.recruiterid;
        console.log($scope.commentstatus);
        db.store('leadcsr/', $scope.commentstatus, function (response) {
            $('#commentstatus').modal('hide');
            $scope.filterdrbytab();
            $scope.commentstatus = {};
            $rootScope.notificationload();
            $scope.loadleads();
            $scope.cancel();
            $.fn.ShowPopUp('Status changed successfully.', 'Status', 'sm');
        }, function () {
            $.fn.ShowPopUp('Please try again.', 'Status', 'sm');
        });
    };
    // $.fn.ShowPopUp('Please try again.', 'Status', 'sm');
    $scope.getcandidatebyclient = function () {

        db.list("addnewjob/", {
            clientId: $scope.copycandidate.client_detail_id
        }, function (response) {
            $scope.jobslistbyclients = response.data;
        }, function (response) {
            //$scope.token=response.statusText;
        });
    }

    $scope.getlist();
    $scope.interviewquestion = {};
    $scope.addNewJobSave = function () {


        if ($('.validate').validate('#addnewjobform', true)) {
            //$scope.user.profilepic=$scope.user.profilepic[0];
            var locations = $scope.location;
            var locationstr = '';
            for (var j in locations) {
                locationstr += locations[j] + ',';
            }
            $scope.myjob.location = locationstr;
            $scope.myjob.functionalArea = $scope.functionalArea.functionalAreaName;
            db.store("addnewjob/", $scope.myjob, function (response) {
                $rootScope.addmessageandremove('Data save Successfully');
                $scope.getlist();
                for (var i in $scope.myjob) {
                    $scope.myjob[i] = '';
                }

            }, function (response) {
                alert('item save failed');
            });
        }
    };
    $scope.removecandidate = function (entity) {

        db.store("removecandidate/" + entity.ajid, {}, function (response) {

            if (response.data.msg == '1') {
                $scope.loadleads();
                $rootScope.addmessageandremove('deleted', $('#candidatesall'));
            } else {
                $rootScope.addmessageandremove("can't delete", $('#candidatesall'));
            }
        }, function () {
            $rootScope.addmessageandremove('Please try again', $('#candidatesall'));
        });
    };
    $scope.atjidentity = {};

    $scope.setatjidentity = function (entity) {
        //$scope.job = job; 
        $scope.atjidentity = entity;
        $('#trackerDetailExtra').modal('show');
        db.list('trackerdatacustom/', {ajid: entity.ajid}, function (response) {
            debugger;
            $scope.trackerdatamyjob = response.data;
        });

    };
    $scope.setatjidentitysave = function (trackerdatamyjob) {
        //$scope.job = job; 
        // $scope.atjidentity = entity;
        $('#trackerDetailExtra').modal('show');
        debugger;
        trackerdatamyjob.ajid = $scope.atjidentity.ajid;
        db.store('trackerdatacustom/', trackerdatamyjob, function (response) {
            $rootScope.addmessageandremove('Saved');
        });

    };
    $scope.activity = function (entity) {
        //$scope.job = job; 

        db.show("pipeline/activity/", entity.pipeid, function (response) {
            $scope.activities = response.data;
            $('#activity').modal('show');
            //            $mdDialog.show({
            //                contentElement: '#activity',
            //                parent: angular.element(document.body),
            //                clickOutsideToClose: true,
            //                fullscreen: false,
            //                disableParentScroll: false
            //
            //            });
        }, function (response) {
            //$scope.token=response.statusText;
        });
    };
    $scope.getrole = function () {

        console.log($scope.functionalArea);
//        $scope.jobroles = [];
//        var code = $scope.functionalArea.code;
//        if (code != null) {
//            code = code.replace('#', "");
//            code = code.split('.')[0];
//            code = parseInt(code);
//            arrRoleload = arrRoles[code];
//            //  console.log(arrRoleload);
//            for (var i in arrRoleload) {
//                if (i.indexOf('a') === -1) {
//                    $scope.jobroles.push(arrRoleload[i]);
//                }
//            }
//        }
    };
    $scope.locations = [];
    db.list('location', null, function (response) {
        var data = response.data;
        for (var j in data) {
            $scope.locations.push(data[j].location);
        }
    });

//    $scope.maximumSalary=[];
//    debugger;
//    db.list('maximumSalary',null,function(response){
//        var data =response.data;
//        for(i in data){
//            i=parseInt($scope.maximumSalary);
//            $scope.maximumSalary.push(data[i].maximumSalary);
//    }
//    });
    $scope.searchTerm;
    $scope.clearSearchTerm = function () {
        $scope.searchTerm = '';
    };
    // The md-select directive eats keydown events for some quick select
    // logic. Since we have a search input here, we don't need that logic.
    $element.find('input').on('keydown', function (ev) {
        ev.stopPropagation();
    });
    db.list("functionalarea/", null, function (response) {

        $scope.functionalareas = response.data;
    }, function (response) {
        //$scope.token=response.statusText;
    });
    db.list("industry/", null, function (response) {

        $scope.industries = response.data;
    }, function (response) {
        //$scope.token=response.statusText;
    });
    $scope.showJob = function (id, $event) {
        debugger;
        $event.stopPropagation();
        //$scope.job = job; 
        if ($rootScope.mp.add_new_job_show) {
            $scope.jobadd = false;
            db.show("addnewjob/", id, function (response) {



                $scope.myjob = response.data;
                try {
                    $scope.myjob.minimumSalary = parseInt($scope.myjob.minimumSalary);
                    $scope.myjob.maximumSalary = parseInt($scope.myjob.maximumSalary);
                } catch (e) {

                }
                if ($scope.myjob.tracker_id != null) {
                    $scope.myjob.tracker_id = $scope.myjob.tracker_id.toString();
                }
                db.list("tracker/", null, function (response) {


                    try {
                        $scope.trackerlist = response.data;
                        //                        if ($scope.trackerlist.length > 0)
                        //                        {
                        //                            // console.log($scope.trackerlist);
                        //                            $scope.myjob.tracker_id = $scope.trackerlist[0].id.toString();
                        //                        }
                    } catch (e) {
                        console.info(e);
                    }

                }, function (response) {
                    //$scope.token=response.statusText;
                });
                try {
                    $scope.myjob.client_detail_id = $scope.myjob.client_detail_id.toString();
                    $scope.myjob.manager_id = $scope.myjob.manager_id.toString();
                    $scope.location = $scope.myjob.location.toString().split(',');
                } catch (e) {
                    console.log(e);
                }
                //functionalareas $scope.functionalArea = $scope.myjob.functionalArea.toString();
                if ($scope.myjob.functionalArea != null) {
                    for (var i in $scope.functionalareas) {
                        if ($scope.myjob.functionalArea.toString() == $scope.functionalareas[i].functionalAreaName) {
                            //$scope.functionalArea = {"id": $scope.functionalareas[i].id, "functionalAreaName": $scope.functionalareas[i].functionalAreaName, "code": $scope.functionalareas[i].code, "ipAddress": $scope.functionalareas[i].ipAddress};
                            $scope.myjob.functionalArea = $scope.functionalareas[i];
                            $scope.getrole($scope.functionalArea);
                            break;
                        }


                    }
                }
                //$scope.functionalArea=""
                try {
                    $scope.myjob.Industry = $scope.myjob.industry.toString();
                    $scope.myjob.jobRole = $scope.myjob.jobRole.toString();
                } catch (e) {
                    console.log(e);
                }
                //
                $scope.changerole();
                //
                debugger;
                $('#submitjob').modal('show');
            }, function (response) {
                //$scope.token=response.statusText;
            });
        }
    };

    $scope.changerole = function () {
        debugger;
        setTimeout(function () {
            if ($('#role').val() == 'Internship') {
                $('#internship').show();
            } else {
                $('#internship').hide();
            }

            if ($('#role').val() == 'Contract') {
                $('#contract').show();
            } else {
                $('#contract').hide();
            }

            if ($('#role').val() == 'Freelence') {
                $('#freelence').show();
            } else {
                $('#freelence').hide();
            }
        }, 10);
    };
    $scope.GetInHourseReference = function (id, $event) {
        debugger;
        $event.stopPropagation();
        $scope.jobidforReference = id;
        db.list("applicationdepartment/", null, function (response) {



            try {
                $scope.departments = response.data;
                $('#internalreference').modal('show');
            } catch (e) {
                console.info(e);
            }

        }, function (response) {
            //$scope.token=response.statusText;
        });
    };
    $scope.getinternalreferrence = function () {
        console.log($scope.departments);
        var departments = [];
        for (var k in $scope.departments) {
            if ($scope.departments[k].selected) {
                departments.push($scope.departments[k].id);
            }
        }
        var dataforreference = {
            job_id: $scope.jobidforReference,
            departments: departments,
            prmMessagge: $scope.prmMessagge,
            prmSubject: $scope.prmSubject,
        };
        db.store('internalreference', dataforreference, function () {
            $('#internalreference').modal('hide');
        }, function () {

        })
    };
    $scope.changechecked = function (item) {
        debugger;
        item.selected = !item.selected;
    };
    $scope.jobupdate = true;
    $scope.addNewJobupdate = function () {
        if ($('.validate').validate('#submitjob', true)) {

            var locations = $scope.location;
            var locationstr = '';
            var isfirstlocation = true;
            for (var j in locations) {
                if (locations[j] != '') {
                    if (isfirstlocation) {
                        locationstr += locations[j];
                        isfirstlocation = false;
                    } else {
                        locationstr += ',' + locations[j];
                    }
                }
            }
            $scope.myjob.location = locationstr;
            $scope.myjob.functionalArea = $scope.functionalArea.functionalAreaName;
            //            var locations = $scope.location;
            //            var locationstr = '';
            //            for (var j in locations)
            //            {
            //                locationstr += locations[j] + ',';
            //            }
            //            $scope.myjob.location = locationstr;
            //
            //            $scope.myjob.functionalArea = $scope.functionalArea.functionalAreaName;
            db.update("addnewjob/", $scope.myjob.id, $scope.myjob, function (response) {

                $.fn.addpopup('Job Updated Successfully', "Good job done !");
                $scope.cancel();
            }, function (response) {
                //$scope.token=response.statusText;
                $.fn.addpopup('Please check if you entered wrong data.', "Please try again !");


            });
        }
    };
    $scope.deletes = function () {
        db.destroy("messagelogstatus/", $scope.delete.id, function (response) {
            console.log(response);
        }, function (response) {

            //$scope.token=response.statusText;
        });
    }


    $scope.status = '  ';
    $scope.customFullscreen = true;
    if ($route.current.params.jobid !== undefined) {
        $scope.isfirstload = 1;
        $scope.selectedjob = $route.current.params.jobid;
        $scope.filterdrbytab('My Referrals', 'Under Review');
        $scope.isfirstload = 0;
        $('#myreferrals').parent().addClass('active').prev().removeClass('active');
        $('#1b').removeClass('actieve');
        $('#2b').addClass('actieve');
    } else {
        $scope.loadleads();
    }
    $scope.addnewjobform = function () {

        $mdDialog.show({
            contentElement: '#addnewjobform',
            parent: angular.element(document.body),
            clickOutsideToClose: true,
            fullscreen: false,
            disableParentScroll: false
        });
    };
    //    $scope.assignCandidate = function () {
    //
    //        $mdDialog.show({
    //            contentElement: '#assignCandidate',
    //            parent: angular.element(document.body),
    //            clickOutsideToClose: true,
    //            fullscreen: false,
    //            disableParentScroll: false
    //        });
    //    };


    $scope.submitcv = function (download) {
        if (download)
        {
            $scope.downloadcv = true;
        } else
        {
            $scope.downloadcv = false;

        }
        db.list("tracker/", null, function (response) {


            try {
                $scope.trackerlist = response.data;
                if ($scope.downloadcv) {
                    $('#downloadtracker').modal('toggle');
                } else {
                    $('#myModal').modal('toggle');
                }
            } catch (e) {
                console.info(e);
            }

        }, function (response) {
            //$scope.token=response.statusText;
        });
        //        $mdDialog.show({
        //            contentElement: '#submitcv',
        //            parent: angular.element(document.body),
        //            clickOutsideToClose: true,
        //            fullscreen: false,
        //            disableParentScroll: false
        //
        //        });

    };
    $scope.submitjob = function () {

        $mdDialog.show({
            contentElement: '#submitjob',
            parent: angular.element(document.body),
            clickOutsideToClose: true,
            fullscreen: false,
            disableParentScroll: false

        });
    };
    $scope.cancel = function () {
        $mdDialog.hide();
    }

    $scope.testForm = function () {
        $mdDialog.show({
            contentElement: '#testform',
            parent: angular.element(document.body),
            clickOutsideToClose: true,
            fullscreen: false,
            disableParentScroll: false
        });
    };
    //export data
    $scope.exportdata = {
        columnDefs: [],
        exporterLinkLabel: 'get your csv here',
        exporterPdfDefaultStyle: {
            fontSize: 9
        },
        exporterPdfTableStyle: {
            margin: [5, 5, 5, 5]
        },
        exporterPdfTableHeaderStyle: {
            fontSize: 10,
            bold: true,
            italics: true,
            color: 'red'
        },
        exporterPdfOrientation: 'landscape',
        exporterCsvFilename: 'myjobdata.csv',
        exporterPdfPageSize: 'LETTER',
        exporterPdfMaxGridWidth: 1000,
        onRegisterApi: function (gridApi) {
            $scope.exportdata = gridApi;
        }
    };
    $scope.export_column_type = 'all';
    $scope.export_row_type = 'all';
    $scope.beforeexport = function () {
        var datatobecheck = $filter('filter')($scope.jobslist, $scope.searchcandidatetext);
        var datatobeexport = [];
        for (var k in datatobecheck) {
            if (datatobecheck[k].selected) {
                datatobeexport.push(datatobecheck[k]);
            }
        }

        if (datatobeexport.length === 0) {
            datatobeexport = datatobecheck;
        }

        $scope.exportdata.data = datatobeexport;
    };
    $scope.export = function () {



        if ($scope.export_format == 'csv') {
            var myElement = angular.element(document.querySelectorAll(".custom-csv-link-location"));
            $scope.exportdata.exporter.csvExport($scope.export_row_type, $scope.export_column_type, myElement);
        } else if ($scope.export_format == 'pdf') {
            $scope.exportdata.exporter.pdfExport($scope.export_row_type, $scope.export_column_type);
        }
        $scope.export_format = "";
    };
    //export data




//    debugger;
// 
// $(function(){
//   
//   $('#candidatesall').on('hide.bs.modal', function () {
//           
//        if (CandidatePopUpShown == false)
//        {
//            ShowCandidates = false;
//        }
//        // do something…
//    }) ;
//    $('#candidatesall').on('show.bs.modal', function () {
//        
//            debugger;
//        ShowCandidates = true;
//        // do something…
//    }); 
//});


});

