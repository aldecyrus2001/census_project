<div class="sidebar-container">
    <div class="sidemenu-container navbar-collapse collapse fixed-menu">
        <div id="remove-scroll" class="left-sidemenu">
            <ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false"
                data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                <li class="sidebar-toggler-wrapper hide">
                    <div class="sidebar-toggler">
                        <span></span>
                    </div>
                </li>
                <li class="sidebar-user-panel">
                    <div class="sidebar-user">
                        <div class="sidebar-user-picture">
                            <img alt="image" src="../assets/profile_pictures/administrator/<?php echo $_SESSION["profile_picture"] ?>">
                        </div>
                        <div class="sidebar-user-details">
                            <div class="user-name"><?php echo $_SESSION["name"] ?></div>
                            <div class="user-role"><?php echo $_SESSION["role"] ?></div>
                        </div>
                    </div>
                </li>
                <li class="nav-item start">
                    <a href="../views/dashboard.php" class="nav-link nav-toggle">
                        <i data-feather="airplay"></i>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item  ">
                    <a href="../views/all_administrator.php" class="nav-link ">
                        <i data-feather="user"></i>
                        <span class="title">Admin & Staffs</span>
                    </a>
                </li>

                <li class="nav-item  ">
                    <a href="../views/all_resident.php" class="nav-link nav-toggle"> 
                        <i data-feather="users"></i>
                        <span class="title">Residents</span>
                    </a>
                </li>

                <li class="nav-item  ">
                    <a href="../views/all_household.php" class="nav-link nav-toggle"> 
                        <i data-feather="home"></i>
                        <span class="title">Households</span>
                    </a>
                </li>

                


                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i data-feather="pie-chart"></i>
                        <span class="title">Charts</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="charts_apexchart.html" class="nav-link ">
                                <span class="title">Apex chart</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="charts_amchart.html" class="nav-link ">
                                <span class="title">amChart</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="charts_plotly.html" class="nav-link ">
                                <span class="title">Plotly Charts</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="charts_echarts.html" class="nav-link ">
                                <span class="title">eCharts</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="charts_morris.html" class="nav-link ">
                                <span class="title">Morris Charts</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="charts_chartjs.html" class="nav-link ">
                                <span class="title">Chartjs</span>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>