<!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a href="<?php echo site_url();?>/Welcome" aria-expanded="false"><i class="fa fa- "></i><span class="hide-menu">Dashboard</span></a></li>
                        <li class="nav-label">Features</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-suitcase"></i><span class="hide-menu">Event Options<span class="label label-rouded label-warning pull-right">4</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo site_url();?>/EventName">Event Name</a></li>
                                <li><a href="<?php echo site_url();?>/Home/catEvent"> Event Category</a></li>
                                <li><a href="<?php echo site_url();?>/EventArtist"> Event Artist</a></li>
                                <li><a href="<?php echo site_url();?>/HomeVenue/venueEvent">Event Venue</a></li>
                                <li><a href="<?php echo site_url();?>/EventVenue">Event Seat Zone</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-suitcase"></i><span class="hide-menu">Event Schedules<span class="label label-rouded label-danger pull-right">2</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo site_url();?>/EventSchedule/allData">Add Schedule</a></li>
                                <li><a href="<?php echo site_url();?>/EventSchedule">Show All Schedules</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-wpforms"></i><span class="hide-menu">Ticket Approval<span class="label label-rouded label-primary pull-right">2</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo site_url();?>/Order">Ticket Request</a></li>
                                <li><a href="<?php echo site_url();?>/ApprovalTicket">Approval Tickets</a></li>
                            </ul>
                        </li>
                        <li class="nav-label">EXTRA</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-book"></i><span class=" hide-menu">General <span class="label label-rouded label-success pull-right">8</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo site_url();?>/Admin">Input Admin</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>

        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->