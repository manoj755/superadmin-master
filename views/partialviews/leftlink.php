<ul class="sidebar-menu tree" data-widget="tree">
    <li >
        <a href="#/dashboard">

            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">

            </span>
        </a>

    </li>

    <li ng-if="mp.any || mp.page_user"><a href="#/users"><i class="fa fa-user"></i> <span>Users</span></a></li>
    <li ng-if="mp.any"><a href="#/billingcall"><i class="fa fa-edit"></i> <span>Billing Details</span></a></li>

    <li ng-if="mp.any"><a href="#/managerole"><i class="fa fa-edit"></i> <span>Manage Role</span></a></li>
     <li ><a href="#/clientdetails"><i class="fa fa-edit"></i> <span>Client Details</span></a></li>
    <li ng-if="mp.any"><a href="#/report"><i class="fab fa-rendact"></i> <span>Report</span></a></li>
    <li ng-if="mp.any"><a href="#/jobreports"><i class="fas fa-chalkboard-teacher"></i> <span>Jobreports</span></a></li>
    <li ng-if="mp.any"><a href="#/refferreports"><i class="fa  fa-thumbs-o-up"></i> <span>RefferReports</span></a></li>
    <li ng-if="mp.any"><a href="#/applications"><i class="fa fa-adn"></i> <span>Applications</span></a></li>

    <li ng-if="mp.any"><a href="#/webbeacon"><i class="fa  fa-thumbs-o-up"></i> <span>Web Beacon</span></a></li>
    <li ng-hide="mp.any"><a href="#/parseresume"><i class="fa fa-magnet"></i> <span>Parse Resume</span></a></li>

    
    <li  ><a href="#/invoice"><i class="fa fa-file-audio-o"></i> <span>Invoice</span></a></li>
    <li><a href="#/jobsinadmin"><i class="fa fa-check-square-o"></i> <span>Jobs Approve</span></a></li>
    <li><a href="#/globalsetting"><i class="fa fa-gears"></i> <span>Global Setting</span></a></li>
    <li><a href="#/smsunsubscriber"><i class="fa fa-file-excel-o"></i> <span>Sms Unsubscriber</span></a></li>
    <li><a href="#/emailunsubscriber"><i class="fa fa-calendar-times-o"></i> <span>Email Unsubscriber</span></a></li>
    <!-- crm left link start-->
     <li  ><a href="#/leaddata"><i class="fa fa-file-audio-o"></i> <span>Leads</span></a></li>
    <li><a href="#/mylead"><i class="fa fa-check-square-o"></i> <span>My Leads</span></a></li>
    <li><a href="#/crmmessagetemplates"><i class="fa fa-gears"></i> <span>Crm Message Templates</span></a></li>
   
    <!-- crm left link end-->

    <li><a href="" ng-click="logout()"><i class="fa fa-sign-out"></i> <span>Log Out</span></a></li>

</ul>
