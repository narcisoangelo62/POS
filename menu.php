<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div> <img src="Sogod.png" width="50" height="45">
        </div>
        
        <div class="sidebar-brand-text mx-3">SLSU-DMS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Main
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="rooms.php">
            <i class="fas fa-fw fa-door-closed"></i>
            <span>Room Management</span>
        </a>
        
    </li>
    <?php if ($_SESSION['type'] == '1') { ?>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="occupants.php">
            <i class="fas fa-fw fa-people-arrows"></i>
            <span>Occupants</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="contacts.php">
            <i class="fas fa-fw fa-user-circle"></i>
            <span>Contacts</span>
        </a>
       

    
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Reports
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="payments.php">
            <i class="fas fa-fw fa-money-bill"></i>
            <span>Payments</span>
        </a>
        
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="violators.php">
            <i class="fas fa-fw fa-user-circle"></i>
            <span>Violators</span>
        </a>
        </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="paymentHistory.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Payments History</span></a>
    </li>
    <?php } ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    

</ul>
<!-- End of Sidebar -->