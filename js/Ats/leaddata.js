
// JavaScript Document
app.controller('leaddataCtrl', function ($scope, $rootScope, db, $mdDialog, FH) {
    $('.validate').validate('#client');
    $('.validate').validate('#getrefer');
    $('.validate').validate('#internalemail');
    $('.validate').validate('#sendMessagew');
    $scope.submit = function () {
        document.getElementById('uploadResume').contentWindow.setData($scope.updateid, 'candidatedetail/update');
    };
    $scope.leadsave = function () {

        db.store("leaddetail/", $scope.store, function (response) {
            $scope.updateid = response.data.id;
            $scope.submit();

            $rootScope.addmessageandremove('Lead added successfully.');
            //$scope.getlist();
            //$scope.cancel();
            $scope.store = {};
        }, function (response) {
            $rootScope.addmessageandremove('Please try again.');
        });
    };

    db.list('master/country', {
        'gi': 'rolecreating'
    }, function (response) {
        $scope.countries = response.data;
    });
    db.list('master/gender', {
        'gi': 'rolecreating'
    }, function (response) {
        $scope.genders = response.data;
    });
    $scope.msg = "hi charm";
    $scope.ishidereference = true;
    $scope.ishidecomment = true;
    $scope.getcandidatebyclient = function () {
        debugger;

        db.list("addnewjob/", {clientId: $scope.copycandidate.client_detail_id}, function (response) {
            $scope.jobslistbyclients = response.data;

        }, function (response) {
            //$scope.token=response.statusText;
        });
    };

    $scope.sendcalltocandidates = function () {
        if ($('.validate').validate('#calldiv', true)) {
            var totalrow = $scope.gridApi.selection.getSelectedRows();
            var allrow = FH.SelectedWithComma(totalrow, 'id');
            var copyjob = {
                'candidates': allrow,
                'job': $scope.copycandidate.job_id,
                "manager": $scope.copycandidate.manager
            };
            db.store('sendcall/', copyjob, function (response) {

                console.log(response);
                alert('done');
                // if (response.data.alreadyexists > 0) {
                //     $scope.addtojobmessage = response.data.alreadyexists + ' Candidate(s) already in pipeline.';
                // } else {
                //     $scope.addtojobmessage = 'Assign Candidate Successfully';

                // }
                // alert($scope.addtojobmessage);
            }, function (response) {
                if (response.data.msg) {
                    alert(response.data.msg);
                } else {
                    alert('please try again');
                }
            });
        }
    };


//    $scope.gridOptions = {
//        
//        columnDefs: [
//            {name: "--", cellTemplate: 'views/partialviews/internaldatabase.php'}
//        ],
//
//        rowHeight: 80,
//        //showHeader: false,
//        // enableCellEditOnFocus:true,
//        enableGridMenu: true, enableColumnResize: true,
//        //enableSelectAll: true,enableFiltering:true,
//        paginationPageSizes: [5, 10, 25, 50, 75],
//        paginationPageSize: 10,
//        exporterCsvFilename: 'myFile.csv',
//        exporterPdfDefaultStyle: {fontSize: 9},
//        exporterPdfTableStyle: {margin: [30, 30, 30, 30]},
//        exporterPdfTableHeaderStyle: {fontSize: 10, bold: true, italics: true, color: 'red'},
//        exporterPdfHeader: {text: "Users", style: 'headerStyle'},
//        exporterPdfFooter: function (currentPage, pageCount) {
//            return {text: currentPage.toString() + ' of ' + pageCount.toString(), style: 'footerStyle'};
//        },
//        exporterPdfCustomFormatter: function (docDefinition) {
//            docDefinition.styles.headerStyle = {fontSize: 22, bold: true};
//            docDefinition.styles.footerStyle = {fontSize: 10, bold: true};
//            return docDefinition;
//        }
//        , selectedItems: [],
//
//        exporterPdfOrientation: 'landscape',
//        exporterPdfPageSize: 'LETTER',
//        exporterPdfMaxGridWidth: 1000,
//        exporterCsvLinkElement: angular.element(document.querySelectorAll(".custom-csv-link-location")),
//        onRegisterApi: function (gridApi) {
//            $scope.gridApi = gridApi;
//        }
//    };
    $scope.setemail = function () {

        $scope.myjob.prmSubject = $scope.emailselected.title;
        $scope.myjob.prmMessagge = $scope.emailselected.message;
    };

    $scope.sms = {};
    $scope.sms.prmMessagge = '';
    $scope.setsms = function () {

        //$scope.myjob.prmSubject = $scope.emailselected.title;
        $scope.sms.prmMessagge = $scope.smsselected.message;
    };

    $scope.addtojobcandidates = function () {
        if ($('.validate').validate('#client', true)) {
            debugger;
            var totalrow = $scope.gridApipopup.selection.getSelectedRows();
            var allrow = FH.SelectedWithComma(totalrow, 'id');
            var copyjob = {'candidates': allrow, 'job': $scope.addnewjob.add_new_job_id, 'manager': $scope.addnewjob.faddtojobcandidates,// 'status': $scope.addnewjob.status
            };
            db.store('addtopipeline/', copyjob, function (response) {

                console.log(response);

                $scope.cancel();
                if (response.data.alreadyexists > 0) {
                    $scope.addtojobmessage = response.data.alreadyexists + ' Lead(s) already in pipeline.';
                } else {
                    $scope.addtojobmessage = 'Added to Pipeline Successfully';

                }
                $rootScope.addmessageandremove($scope.addtojobmessage);
                //alert($scope.addtojobmessage);
            }, function (response) {

            });

        }
    }

//$scope.removeRow = function(row) {
//    var index = $scope.totalrow.indexOf(row.entity);
//    if (index !== -1) {
//        $scope.totalrow.splice(index, 1);
//    }
//};




    $scope.sendMessage = function () {
        if ($('.validate').validate('#getrefer', true)) {
            //$scope.user.profilepic=$scope.user.profilepic[0];

            var totalrow = $scope.gridApi.selection.getSelectedRows();
            var allrow = FH.SelectedWithComma(totalrow, 'id');
            if ($scope.sendemail) {
                debugger;

                $scope.myjob.prmCandidateId = allrow;
                $scope.myjob.prmTemplateId = $scope.emailselected.id;
                $scope.myjob.jobid = $scope.myjob.add_new_job_id;
                $scope.myjob.token = localStorage.Authkey;

                db.store("getreference/", $scope.myjob, function (response) {

                    console.log(response);
                    alert('done');




                });
            }
            if ($scope.sendsms) {
                $scope.sms.prmTemplateId = $scope.smsselected.id;
                $scope.sms.prmCandidateId = allrow;
                $scope.sms.jobid = $scope.myjob.add_new_job_id;
                db.store("smsgetreference/", $scope.sms, function (response) {

                    console.log(response);
                    alert('done');




                });
            }
        }
    }

    $scope.getreffer = function () {
        if ($('.validate').validate('#getrefer', true)) {
            var copyjob = {'candidates': FH.SelectedCheckbox($scope.candidatedetails), 'job': $scope.addnewjob.add_new_job_id, 'manager': $scope.addnewjob.manager};
            db.store('copyjob/', copyjob, function (response) {

                console.log(response);
                alert('done');
                if (response.data.alreadyexists > 0) {
                    $rootScope.addmessageandremove(response.data.alreadyexists + ' Candidate(s) already in pipeline.');
                }
            });

        }
    };
    $scope.loadmanagerid = function () {

        db.list('manager/', null, function (response) {
            $scope.managers = response.data;
            console.log(response);

        });
    };
    $scope.loadmanagerid();
    $scope.sendemailform = function () {
        if ($('.validate').validate('#internalemail', true)) {

            var totalrow = $scope.gridApi.selection.getSelectedRows();
            var allrow = FH.SelectedWithComma(totalrow, 'id');
            $scope.sendemailmodel.prmTemplateId = $scope.sendmailselected.id;
            $scope.sendemailmodel.prmCandidateId = allrow;
            db.store('sendemail/', $scope.sendemailmodel, function (response) {

                console.log(response);
                alert('done');
            });

        }
    }


    $scope.updatecandidate = function () {
        db.update("candidatedetail/", id, $scope.candidateshowdata, function (response) {
            console.log(response);
            alert('thanks');
        }, function (response) {
            //$scope.token=response.statusText;


        });
    }




    $scope.getcandidatebyclientaddtojob = function () {

        db.list("addnewjob/", {clientId: $scope.addtojob.client_detail_id}, function (response) {
            $scope.jobslistbyclientsaddtojob = response.data;
        }, function (response) {
            //$scope.token=response.statusText;
        });
    }
    $scope.gridOptions = [];

    //Pagination
    $scope.pagination = {
        paginationPageSizes: [15, 25, 50, 75, 100, 200, 500, 1000, 1500, 3000, 5000, 10000, 15000, 20000, 30000, 50000],
        ddlpageSize: 15,
        pageNumber: 1,
        pageSize: 15,
        totalItems: 0,
        getTotalPages: function () {
            return Math.ceil(this.totalItems / this.pageSize);
        },
        pageSizeChange: function () {
            if (this.ddlpageSize == "All")
                this.pageSize = $scope.pagination.totalItems;
            else
                this.pageSize = this.ddlpageSize

            this.pageNumber = 1
            $scope.getCandidate();
        },
        firstPage: function () {
            if (this.pageNumber > 1) {
                this.pageNumber = 1
                $scope.getCandidate();
            }
        },
        nextPage: function () {
            if (this.pageNumber < this.getTotalPages()) {
                this.pageNumber++;
                $scope.getCandidate();
            }
        },
        previousPage: function () {
            if (this.pageNumber > 1) {
                this.pageNumber--;
                $scope.getCandidate();
            }
        },
        lastPage: function () {
            if (this.pageNumber >= 1) {
                this.pageNumber = this.getTotalPages();
                $scope.getCandidate();
            }
        }
    };
    $scope.gridOptions = {
        useExternalPagination: true,
        useExternalSorting: true,
        //enableFiltering: true,
        enableSorting: true,
        enableRowSelection: true,
        enableSelectAll: true,
        //  enableFiltering:true,
        enableGridMenu: true,
        columnDefs: [
            {name: "--", cellTemplate: 'views/partialviews/internalleaddatabase.php'}
        ],
        onRegisterApi: function (gridApi) {
            $scope.gridApi = gridApi;
        },
        rowHeight: 105,
//            columnDefs: [
//                {name: "ProductID", displayName: "Product ID", width: '10%', headerCellClass: $scope.highlightFilteredHeader},
//                {name: "ProductTitle", title: "Product Title", width: '40%', headerCellClass: $scope.highlightFilteredHeader},
//                {name: "Type", title: "Type", headerCellClass: $scope.highlightFilteredHeader},
//                {
//                    name: "Price", title: "Price", cellFilter: 'number',
//                    filters: [{condition: uiGridConstants.filter.GREATER_THAN, placeholder: 'Minimum'}, {condition: uiGridConstants.filter.LESS_THAN, placeholder: 'Maximum'}],
//                    headerCellClass: $scope.highlightFilteredHeader
//                },
//                {name: "CreatedOn", displayName: "Created On", cellFilter: 'date:"short"', headerCellClass: $scope.highlightFilteredHeader},
//                {
//                    name: 'Edit',
//                    enableFiltering: false,
//                    enableSorting: false,
//                    width: '5%',
//                    enableColumnResizing: false,
//                    cellTemplate: '<span class="label label-warning label-mini">' +
//                            '<a href="" style="color:white" title="Select" ng-click="grid.appScope.GetByID(row.entity)">' +
//                            '<i class="fa fa-check-square" aria-hidden="true"></i>' +
//                            '</a>' +
//                            '</span>'
//                }
//            ],
//        exporterAllDataFn: function () {
//            return getPage(1, $scope.gridOptions.totalItems, paginationOptions.sort)
//                    .then(function () {
//                        $scope.gridOptions.useExternalPagination = false;
//                        $scope.gridOptions.useExternalSorting = false;
//                        getPage = null;
//                    });
//        },

//        exporterFieldCallback :function ( grid, row, col, value ){
//           
//
//return value;
//}
    };
    $scope.colbackup = [];
    $scope.colmain = [
        {field: 'candidateName'},
        {field: 'currentDesignation'},
        {field: 'email'},
        {field: 'qualification'},
        {field: 'mobileNo'},
        {field: 'ovarallExperiance'},
        {field: 'currentSalary'},
        {field: 'preferredLocation'}

    ];
    $scope.isnormal = false;
    $scope.toggleexport = function () {
        debugger;
        if ($scope.isnormal) {
            $scope.gridOptions.columnDefs = $scope.colbackup;
            $scope.gridOptions.rowHeight = 105;
        } else
        {
            $scope.colbackup = $scope.gridOptions.columnDefs;
            $scope.gridOptions.columnDefs = $scope.colmain;
            $scope.gridOptions.rowHeight = 30;
        }
        $scope.isnormal = !$scope.isnormal;
    }
    //ui-Grid Call
    $scope.getCandidate = function () {
        $scope.loaderMore = true;
        $scope.lblMessage = 'loading please wait....!';
        $scope.result = "color-green";

        $scope.highlightFilteredHeader = function (row, rowRenderIndex, col, colRenderIndex) {
            if (col.filters[0].term) {
                return 'header-filtered';
            } else {
                return '';
            }
        };


        var NextPage = (($scope.pagination.pageNumber - 1) * $scope.pagination.pageSize);
        var NextPageSize = $scope.pagination.pageSize;
        var filter = {'pageSize': $scope.pagination.pageSize,
            'page': $scope.pagination.pageNumber,
            'searchText': $scope.searchcandidatetext,
            'is_my_lead': 0,
            'is_vendor_empanelment':1
        };
    }


    $scope.isfilter = false;
    $scope.changefilter = function (val, type)
    {
        $scope.filter = val;
        $scope.loadleads();

        // $scope.bindJoblist(data);
    };
    $scope.columnDefs = [{
            width: '903',
            name: "--",
            cellTemplate: 'views/partialviews/leads_in_my_lead.php',
            filterCellFiltered: true,
        }

    ];
    $scope.filterpopupfunction = function () {
        debugger;
        if ($.trim($scope.filterpopup.length) == 0) {
            $scope.gridOptions.data = $scope.candidateinpopup;
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

            $scope.gridOptions.data = dataafterfilter;
        }
    }

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
    $scope.filter = 'no_status';
    $scope.loadleads = function () {

        //

        var Search = {

        };
        Search = {process: $scope.filter, is_my_lead: 0};
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
    }

    $scope.allstatusdefault = function () {
        db.list('leadcsr/' + 1, {allstatus: 1,is_my_lead:1}, function (response) {

            $scope.allstatusesdefaultdata = response.data;

        });
    }
    $scope.allstatusdefault();
    $scope.loadleads();

    $scope.allstatusload = 0;
    $scope.entityvar = {};
    $scope.comment = function (entity) {
        if (entity) {
            if (entity.is_notification) {
                $scope.is_notification = true;
            } else {
                $scope.is_notification = false;
            }
        }
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
        if (entity.pipeline_id) {
            $scope.pipeid = entity.pipeline_id;
            $rootScope.pipeid = entity.pipeline_id;
        } else {
            $scope.pipeid = entity.pipe_line_id;
            $rootScope.pipeid = entity.pipe_line_id;
        }
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
    $scope.activity = function (entity) {
        //$scope.job = job; 
        debugger;
        db.show("pipeline/activity/", entity.pipeline_id, function (response) {
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
    $scope.updatestatuscommentmyjob = function (showpopup) {
        debugger;
        if (typeof showpopup == 'undefined')
        {
            showpopup = true;
        }
        if ($scope.is_notification) {
            $scope.commentstatus.is_notification = 1;
        }
        $scope.commentstatus.pipeid = $scope.pipeid;
        //$scope.commentstatus.recruiterid=$scope.recruiterid;
        console.log($scope.commentstatus);
        db.store('leadcsr/', $scope.commentstatus, function (response) {
            $('#commentstatus').modal('hide');
            
            $scope.commentstatus = {};
            //$rootScope.notificationload();
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
    $scope.upload = function (file) {
        if (file != null) {
            debugger;
            db.upload('cvsexcelupload/', {file: file}, function (response) {
                debugger;

                alert('uploaded');

            }, function (response) {
                $rootScope.addmessageandremove('Please try again');
            }, function (percentage, response) {
                document.title = percentage;
            });
        }
    };
    // $scope.getleadnotification =function(){
    db.list('getleadnotification', null, function (response) {
        debugger;
        $scope.leadnotification = response.data;
    });
    //}
    //$scope.getleadnotification();
    //Default Load
    $scope.getCandidate();

    //Selected Call
    $scope.GetByID = function (model) {
        $scope.SelectedRow = model;
    };
//    $scope.filterOptions = {
//        filterText: "",
//        useExternalFilter: true
//    };
//    $scope.totalServerItems = 0;
//    $scope.pagingOptions = {
//        pageSizes: [50,100,250, 500, 1000],
//        pageSize: 50,
//        currentPage: 1
//    };
//    $scope.setPagingData = function (data, count) {
//        
//        $scope.myData = data;
//        $scope.totalServerItems = count;
//        if (!$scope.$$phase) {
//            $scope.$apply();
//        }
//           
//    };
//
//    $scope.getPagedDataAsync = function (pageSize, page, searchText) {
//        setTimeout(function () {
//            var data;
//            var ft
//            if (searchText) {
//                ft = searchText.toLowerCase();
//
//            } else {
//                ft = '';
//            }
//
//            var filter = {'pageSize': pageSize,
//                'page': page,
//                'searchText': ft,
//            };
//            db.list("candidatelistinternal/", filter, function (response) {
//                //  $scope.candidatedetails = response.data;\
//                
//                //$scope.myData = response.data;
////                $scope.totalServerItems = response.totalItems;
////                $scope.gridApi.grid.options.totalItems = response.data.totalItems;
////                $scope.gridOptions.data = response.data.data;
//                $scope.setPagingData(response.data.data, response.data.totalItems);
//                // SUGGESTION #1 -- empty and fill the array
//                /* $scope.items.length = 0;
//                 angular.forEach(data.items, function (item) {
//                 $scope.items.push(item);
//                 }); 
//                 */
//                // https://groups.google.com/forum/#!searchin/angular/nggrid/angular/vUIfHWt4s_4/oU_C9w8j-uMJ
////                
////                $scope.$apply(function () {
////                    $scope.items = response.data.data;
////                });
//
//
//            }, function (response) {
//                //$scope.token=response.statusText;
//            });
//        }, 100);
//    };
//
//    $scope.getPagedDataAsync($scope.pagingOptions.pageSize, $scope.pagingOptions.currentPage);
//
//    $scope.$watch('pagingOptions', function (newVal, oldVal) {
//        if (newVal !== oldVal && newVal.currentPage !== oldVal.currentPage) {
//            $scope.getPagedDataAsync($scope.pagingOptions.pageSize, $scope.pagingOptions.currentPage, $scope.filterOptions.filterText);
//        }
//    }, true);
//    $scope.$watch('filterOptions', function (newVal, oldVal) {
//        if (newVal !== oldVal) {
//            $scope.getPagedDataAsync($scope.pagingOptions.pageSize, $scope.pagingOptions.currentPage, $scope.filterOptions.filterText);
//        }
//    }, true);
//
//    $scope.gridOptions = {
//        paginationPageSizes:  $scope.pagingOptions.pageSizes,
//        paginationPageSize: $scope.pagingOptions.pageSize,
//        columnDefs: [
//            {name: "--", cellTemplate: 'views/partialviews/internaldatabase.php'}
//        ],
//        rowHeight: 105,
//        data: 'myData',
//        enablePaging: true,
//        showFooter: true,
//        totalServerItems: 'totalServerItems',
//        pagingOptions: $scope.pagingOptions,
//        filterOptions: $scope.filterOptions
//    };
//    $scope.gridOptions = {
//        
//        enablePaging: true,
//        enablePinning: true,
//        pagingOptions: $scope.pagingOptions,
//        filterOptions: $scope.filterOptions,
//        keepLastSelected: true,
//        multiSelect: true,
//        showColumnMenu: true,
//        showFilter: true,
//        showGroupPanel: true,
//        showFooter: true,
//        sortInfo: $scope.sortOptions,
//        totalServerItems: "totalServerItems",
//        useExternalSorting: true,
//        i18n: "en",
//        onRegisterApi: function (gridApi) {
//            $scope.gridApi = gridApi;
//        },  
//    };



//    $scope.gridOptions = {
//        columnDefs: [
//            {name: "--", cellTemplate: 'views/partialviews/internaldatabase.php'}
//        ],
//        rowHeight: 105,
//        //showHeader: false,
//        // enableCellEditOnFocus:true,
//        enableGridMenu: true, enableColumnResize: true,
//        //enableSelectAll: true,enableFiltering:true,
//        paginationPageSizes:  $scope.pagingOptions.pageSizes,
//        paginationPageSize: $scope.pagingOptions.pageSize,
//        exporterCsvFilename: 'myFile.csv',
//        exporterPdfDefaultStyle: {fontSize: 9},
//        exporterPdfTableStyle: {margin: [30, 30, 30, 30]},
//        exporterPdfTableHeaderStyle: {fontSize: 10, bold: true, italics: true, color: 'red'},
//        exporterPdfHeader: {text: "Users", style: 'headerStyle'},
//        exporterPdfFooter: function (currentPage, pageCount) {
//            return {text: currentPage.toString() + ' of ' + pageCount.toString(), style: 'footerStyle'};
//        },
//        exporterPdfCustomFormatter: function (docDefinition) {
//            docDefinition.styles.headerStyle = {fontSize: 22, bold: true};
//            docDefinition.styles.footerStyle = {fontSize: 10, bold: true};
//            return docDefinition;
//        },
//        exporterPdfOrientation: 'landscape',
//        exporterPdfPageSize: 'LETTER',
//        exporterPdfMaxGridWidth: 1000,
//        exporterCsvLinkElement: angular.element(document.querySelectorAll(".custom-csv-link-location")),
//        onRegisterApi: function (gridApi) {
//            $scope.gridApi = gridApi;
//        },  
//        enablePaging: true,
//        showFooter: true,
////        totalServerItems: $scope.totalServerItems,
////        pagingOptions: $scope.pagingOptions,
////        filterOptions: $scope.filterOptions
//    };
//    $scope.refresh = function () {
//        setTimeout(function () {
//
//            var filter = {'pageSize': $scope.pagingOptions.pageSize,
//                'page': $scope.pagingOptions.currentPage,
//                'searchText': $scope.filterOptions.filterText,
//                sortFields: $scope.sortOptions.fields,
//                sortDirections: $scope.sortOptions.directions
//            };
//            db.list("candidatelistinternal/", filter, function (response) {
//                //  $scope.candidatedetails = response.data;\
//                
//                //$scope.myData = response.data;
////                $scope.totalServerItems = response.totalItems;
//                 $scope.gridApi.grid.options.totalItems = response.data.totalItems;
//                $scope.gridOptions.data = response.data.data;
//                // SUGGESTION #1 -- empty and fill the array
//                /* $scope.items.length = 0;
//                 angular.forEach(data.items, function (item) {
//                 $scope.items.push(item);
//                 }); 
//                 */
//                // https://groups.google.com/forum/#!searchin/angular/nggrid/angular/vUIfHWt4s_4/oU_C9w8j-uMJ
////                
////                $scope.$apply(function () {
////                    $scope.items = response.data.data;
////                });
//                
//
//            }, function (response) {
//                //$scope.token=response.statusText;
//            });
//
//        }, 100);
//    };
//
//    // watches
//    $scope.$watch('pagingOptions', function (newVal, oldVal) {
//        if (newVal !== oldVal && newVal.currentPage !== oldVal.currentPage) {
//            $scope.refresh();
//        }
//    }, true);
//
//    $scope.$watch('filterOptions', function (newVal, oldVal) {
//        if (newVal !== oldVal) {
//            $scope.refresh();
//        }
//    }, true);
//
//    $scope.$watch('sortOptions', function (newVal, oldVal) {
//        if (newVal !== oldVal) {
//            $scope.refresh();
//        }
//    }, true);
//
//    $scope.refresh();
//    $scope.getPagedDataAsync = function (pageSize, page, searchText) {
//        setTimeout(function () {
//            var data;
//            var ft;
//            if (searchText) {
//                ft = searchText.toLowerCase();
//
//            } else {
//                ft = '';
//            }
//         
//        }, 100);
//    };
//    $scope.getPagedDataAsync($scope.pagingOptions.pageSize, $scope.pagingOptions.currentPage);
//    $scope.$watch('pagingOptions', function (newVal, oldVal) {
//        if (newVal !== oldVal && newVal.currentPage !== oldVal.currentPage) {
//            $scope.getPagedDataAsync($scope.pagingOptions.pageSize, $scope.pagingOptions.currentPage, $scope.filterOptions.filterText);
//        }
//    }, true);
//    $scope.$watch('filterOptions', function (newVal, oldVal) {
//        if (newVal !== oldVal) {
//            $scope.getPagedDataAsync($scope.pagingOptions.pageSize, $scope.pagingOptions.currentPage, $scope.filterOptions.filterText);
//        }
//    }, true);

//    $scope.filterhistory = function () {
//
//
//        if ($scope.searchcandidatetext.length > 0) {
//
//            var main = [];
//            var fullarr = $scope.searchcandidatetext.split('or');
//            for (var i in $scope.candidatedetails) {
//                for (var j in $scope.candidatedetails[i])
//                {
//
//                    var IsDone = false;
//                    var jk = $scope.candidatedetails[i][j];
//
//                    for (var t in fullarr) {
//                        var crtext = $.trim(fullarr[t]);
//                        if ($scope.candidatedetails[i][j] !== null && $scope.candidatedetails[i][j].toString().toLowerCase().indexOf(angular.lowercase(crtext)) !== -1) {
//
//                            if ($scope.candidatedetails[i].email != null && $scope.candidatedetails[i].email != "") {
//                                main.push($scope.candidatedetails[i]);
//
//                                IsDone = true;
//                                break;
//                            }
//
//                        }
//
//                    }
//                    if (IsDone) {
//                        break;
//                    }
//                }
//            }
//            $scope.gridOptions.data = main;
//        } else
//        {
//            $scope.gridOptions.data = $scope.candidatedetails;
//        }
//    };
//    $scope.getCandidateDetails = function () {
//        //CandiDatedetail
//
//        db.list("candidatelistinternal/", $scope.smartsearch, function (response) {
//            $scope.candidatedetails = response.data;
//            $scope.gridOptions.data = response.data;
//            $scope.gridOptions.exporterAllDataFn = function () {
//                return $scope.candidatedetails;
//            }
//
//        }, function (response) {
//            //$scope.token=response.statusText;
//        });
//    };

//    $scope.getCandidateDetailsdetaileds = function () {
//        //CandiDatedetail
//
//        db.list("candidatelistinternaldetailedsearch/", $scope.detailedsearch, function (response) {
//            $scope.candidatedetails = response.data;
//            $scope.gridOptions.data = response.data;
//            $scope.gridOptions.exporterAllDataFn = function () {
//                return $scope.candidatedetails;
//            }
//
//        }, function (response) {
//            //$scope.token=response.statusText;
//        });
//    };
    // $scope.getCandidateDetails();
    //SMS-Message-Template
    db.list("smsmessagetemplate/", null, function (response) {
        $scope.smsmessagetemplates = response.data;
    }, function (response) {
        //$scope.token=response.statusText;
    });
    //Email-Message-Template
    db.list("emailmessagetemplate/", null, function (response) {
        $scope.emailmessagetemplates = response.data;
    }, function (response) {
        //$scope.token=response.statusText;
    });

    db.list("clientdetail/", null, function (response) {
        $scope.clients = response.data;
    }, function (response) {
        //$scope.token=response.statusText;
    });

    $scope.clientsave = function () {

        db.store("candidatedetail", $scope.newclient, function (response) {
            alert('data saved');
        }, function (response) {
            alert('please try again');
        });
    }






    $scope.updates = function () {
        db.update("candidatedetail", $scope.updatedd.id, $scope.update, function (response) {
            console.log(response);

        }, function (response) {
            //$scope.token=response.statusText;
        });
    }
    $scope.deletes = function () {
        db.destroy("messagelogstatus/", $scope.delete.id, function (response) {
            console.log(response);

        }, function (response) {
            //$scope.token=response.statusText;
        });
    }


//custom page logic begins
    $scope.tabindex = 0;
    $scope.smsTabs = function (tabindex) {
        $scope.tabindex = tabindex;
        console.log($scope.tabindex);
    }
//custom page logic ends
    $scope.status = '  ';
    $scope.customFullscreen = true;

    $scope.candidatedialog = function () {
        $mdDialog.show({
            contentElement: '#myStaticDialog',
            parent: angular.element(document.body),
            clickOutsideToClose: true,
            fullscreen: false,
            disableParentScroll: false
        });
    };
    $scope.cancel = function () {
        $mdDialog.hide();
    };



});

