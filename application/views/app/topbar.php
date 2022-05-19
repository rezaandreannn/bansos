<!--**********************************
            Nav header start
        ***********************************-->
<div class="nav-header">
    <div class="brand-logo">
        <a href="index.html">
            <b class="logo-abbr"><img src="images/logo.png" alt=""> </b>
            <span class="logo-compact"><img src="./images/logo-compact.png" alt=""></span>
            <span class="brand-title">
                <img src="images/logo-text.png" alt="">
            </span>
        </a>
    </div>
</div>
<!--**********************************
            Nav header end
        ***********************************-->

<!--**********************************
            Header start
        ***********************************-->
<div class="header">
    <div class="header-content clearfix">

        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
        </div>
        <div class="header-left">

        </div>
        <div class="header-right">
            <ul class="clearfix">
                <li class="icons dropdown d-none d-md-flex">
                    <a href="javascript:void(0)" class="log-user" data-toggle="dropdown">
                        <span><?= $user['username'] ?></span> <i class="fa fa-angle-down f-s-14" aria-hidden="true"></i>
                    </a>
                    <div class="drop-down dropdown-profile   dropdown-menu">
                        <div class="dropdown-content-body">
                            <ul>
                                <li>
                                    <a href="app-profile.html"><i class="icon-user"></i> <span>Profile</span></a>
                                </li>
                                <hr class="my-2">
                                <li><a href="<?= base_url('auth/logout'); ?>"><i class="icon-key"></i> <span>Logout</span></a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="icons dropdown">
                    <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                        <span class="activity active"></span>
                        <img src="<?= base_url('assets'); ?>/images/user/1.png" height="40" width="40" alt="">
                    </div>

                </li>
            </ul>
        </div>
    </div>
</div>
<!--**********************************
            Header end ti-comment-alt
        ***********************************-->