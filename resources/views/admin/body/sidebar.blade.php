<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="menu-title">Settings</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-table-2"></i>
                        <span>Tickets</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all-tickets') }}">All Tickets</a></li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-share-line"></i>
                        <span>Ticket Type</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all-ticket-type') }}">All Ticket Type</a></li>
                        <li><a href="{{ route('add-ticket-type')  }}">Add Ticket Type</a></li>
                        
                    </ul>
                </li>

                
                

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>