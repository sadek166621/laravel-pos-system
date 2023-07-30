<div class="left-sidebar">
                <!-- left sidebar HEADER -->
                <div class="left-sidebar-header">
                    <div class="left-sidebar-title">Navigation</div>
                    <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
                        <span></span>
                    </div>
                </div>
                <!-- NAVIGATION -->
                <!-- ========================================================= -->
                <div id="left-nav" class="nano">
                    <div class="nano-content">
                        <nav>
                            <ul class="nav nav-left-lines" id="main-nav">
                                <!--HOME-->
                                <li class="active-item"><a href="{{route('home')}}"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>
                                <li class="active"><a href="{{route('pos')}}"><i class="fa fa-credit-card"></i><span>Pos</span></a></li>
                                <!--UI ELEMENTENTS-->
                                <li class="has-child-item close-item">
                                    <a><i class="fa fa-first-order" aria-hidden="true"></i><span>Order Module</span></a>
                                    <ul class="nav child-nav level-1">
                                        <li><a href="{{route('all-orders')}}">All Orders</a></li>
                                        <li><a href="{{route('due-orders')}}">Due Orders</a></li>
                                    </ul>
                                </li>
                                <li class="has-child-item close-item">
                                    <a><i class="fa fa-list-alt" aria-hidden="true"></i><span>Categorys</span></a>
                                    <ul class="nav child-nav level-1">
                                        <li><a href="{{route('add-category')}}">Add Category</a></li>
                                    </ul>
                                </li>
                                <li class="has-child-item close-item">
                                    <a><i class="fa fa-industry" aria-hidden="true"></i><span>Suppliers</span></a>
                                    <ul class="nav child-nav level-1">
                                        <li><a href="{{route('add-suppliers')}}">Add Suppliers</a></li>
                                        <li><a href="{{route('manage-suppliers')}}">Manage Suppliers</a></li>
                                    </ul>
                                </li>
                                <li class="has-child-item close-item">
                                    <a><i class="fa fa-user-o" aria-hidden="true"></i><span>Customers</span></a>
                                    <ul class="nav child-nav level-1">
                                        <li><a href="{{route('add-customer')}}">Add Customer</a></li>
                                        <li><a href="{{route('manage-customer')}}">Manage Customer</a></li>
                                    </ul>
                                </li>
                                <li class="has-child-item close-item">
                                    <a><i class="fa fa-product-hunt" aria-hidden="true"></i><span>Products</span></a>
                                    <ul class="nav child-nav level-1">
                                        <li><a href="{{route('add-product')}}">Add Products</a></li>
                                    </ul>
                                    <ul class="nav child-nav level-1">
                                        <li><a href="{{route('manage-product')}}">Manage Products</a></li>
                                    </ul>
                                    <ul class="nav child-nav level-1">
                                        <li><a href="{{route('import-product')}}">Import Products</a></li>
                                    </ul>
                                </li>
                                <li class="has-child-item close-item">
                                    <a><i class="fa fa-users" aria-hidden="true"></i><span>Employeers</span></a>
                                    <ul class="nav child-nav level-1">
                                        <li><a href="{{route('add-employeers')}}">Add Employeers</a></li>
                                        <li><a href="{{route('manage-employeers')}}">Manage Employeers</a></li>
                                    </ul>
                                </li>
                                <li class="has-child-item close-item">
                                    <a><i class="fa fa-calendar-check-o" aria-hidden="true"></i><span>Attendance</span></a>
                                    <ul class="nav child-nav level-1">
                                        <li><a href="{{route('add-attendance')}}">Add Attendance</a></li>
                                        <li><a href="{{route('manage-attendance')}}">Manage Attendance</a></li>
                                    </ul>
                                </li>
                                <li class="has-child-item close-item">
                                    <a><i class="fa fa-money" aria-hidden="true"></i><span>Expenses</span></a>
                                    <ul class="nav child-nav level-1">
                                        <li><a href="{{route('add-expense')}}">Add Expenses</a></li>
                                        <li><a href="{{route('today-expense')}}">Today Expenses</a></li>
                                        <li><a href="{{route('month-expense')}}">Monthly Expenses</a></li>
                                        <li><a href="{{route('year-expense')}}">Year Expenses</a></li>
                                        <li><a href="{{route('all-expense')}}">All Expenses</a></li>
                                    </ul>
                                </li>


                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
