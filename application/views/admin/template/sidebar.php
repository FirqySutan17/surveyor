<style>

    .menu-items::-webkit-scrollbar {
        display: none;
    }

    /* Hide scrollbar for IE, Edge and Firefox */
    .menu-items {
        overflow-y: scroll;
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }
    li.dropdown {
        display: block;
        float: none;
        width: 100%;
        padding: 0 16px;
        position: relative;
    }

    li.dropdown ul {
        background-color: #f7f7f7;
        border-radius: 10px;
        padding: 10px 0px 10px 0px;
        margin-top: 10px;
        z-index: 1;
        position: relative;
    }

    li.dropdown ul a {
        padding: 8px 10px;
        font-size: 12px;
        color: #717171;
        display: flex;
        position: relative;
        letter-spacing: 0px;
        vertical-align: middle;
        border-radius: 5px;
        margin: 5px 0px;
        height: 33px;
    }

    li.dropdown ul a:hover {
        background: #f8971d;
        color: #fff
    }

    li.dropdown ul a.active {
        background: #f8971d;
        color: #fff !important;
    }
    th {
        height: auto !important;
    }
    .bx.bxs-right-arrow {
        font-size: 12px
    }
    .menu-items li a i {
        font-size: 24px;
        min-width: 25px;
        justify-content: flex-start;
    }
    li.dropdown ul li.active a {
        color: #000;
        font-weight: 600
    }

    li.dropdown ul li:hover a {
        color: #fff;
    }
    .menu-content {
        display: none;
        background-color: #262626;
        padding-left: 8px;
    }
    .bx.bx-chevron-right {
        color: #000;
        font-size: 21px
    }
    .bx.bx-chevron-right {
        transform: rotate(0deg);
        transition: all 0.6s;
    }
    .bx.bx-chevron-right.active-arrow {
        transform: rotate(90deg);
    }
    li.dropdown ul a {
        font-size: 10px !important;
        font-weight: 700 !important;
    }
</style>

<nav id="myNav" class="myNav close-nav">
    <?php $user_access = $this->session->userdata('user_dashboard')['user_access']; ?>
    <div class="menu-items">
        <ul class="nav-links">
            <li class="<?= $this->uri->segment(1) && empty($this->uri->segment(2)) == 'dashboard' ? 'active' : '' ?>">
                <a href="<?= route('dashboard') ?>">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M17 21H7C4.79086 21 3 19.2091 3 17V10.7076C3 9.30887 3.73061 8.01175 4.92679 7.28679L9.92679 4.25649C11.2011 3.48421 12.7989 3.48421 14.0732 4.25649L19.0732 7.28679C20.2694 8.01175 21 9.30887 21 10.7076V17C21 19.2091 19.2091 21 17 21Z"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M9 17H15" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <span class="link-name">DASHBOARD</span>
                </a>
            </li>

            <?php if (in_array('M001', $user_access) || in_array('M002', $user_access) || in_array('M003', $user_access) || in_array('M004', $user_access) || in_array('M007', $user_access) || in_array('*', $user_access)): ?>
            <li class="dropdown <?= $this->uri->segment(3) == 'common_code' ? 'active' : '' ?> <?= $this->uri->segment(3) == 'user' ? 'active' : '' ?> <?= $this->uri->segment(3) == 'customer' ? 'active' : '' ?>">
                <a href="javascript:void(0)" class="dropdown-btn">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M14 14V6M14 14L20.1023 17.487C20.5023 17.7156 21 17.4268 21 16.9661V3.03391C21 2.57321 20.5023 2.28439 20.1023 2.51296L14 6M14 14H7C4.79086 14 3 12.2091 3 10V10C3 7.79086 4.79086 6 7 6H14"
                            stroke-width="1.5" />
                        <path
                            d="M7.75716 19.3001L7 14H11L11.6772 18.7401C11.8476 19.9329 10.922 21 9.71716 21C8.73186 21 7.8965 20.2755 7.75716 19.3001Z"
                            stroke-width="1.5" />
                    </svg>

                    <span class="link-name">MASTER DATA</span>
                    <i id="arrow" class='bx bx-chevron-right'></i>
                </a>
                <ul class="nav-submenu menu-content">
                    <?php if (in_array('M001', $user_access) || in_array('*', $user_access)): ?>
                        <li class="<?= $this->uri->segment(3) == 'common_code' ? 'active' : '' ?>">
                            <a href="<?= route('dashboard/master/common_code') ?>"
                                class="">
                                <i class='bx bxs-right-arrow'></i> COMMON CODE
                            </a>
                        </li>
                    <?php endif ?>
                    <!-- <?php if (in_array('M002', $user_access) || in_array('*', $user_access)): ?>
                        <li class="<?= $this->uri->segment(3) == 'employee' ? 'active' : '' ?>">
                            <a href="<?= route('dashboard/master/employee') ?>"
                                class="">
                                <i class='bx bxs-right-arrow'></i> EMPLOYEE
                            </a>
                        </li>
                    <?php endif ?> -->
                    <!-- <?php if (in_array('M003', $user_access) || in_array('*', $user_access)): ?>
                        <li class="<?= $this->uri->segment(3) == 'customer' ? 'active' : '' ?>">
                            <a href="<?= route('dashboard/master/customer') ?>"
                                class="">
                                <i class='bx bxs-right-arrow'></i> CUSTOMER
                            </a>
                        </li>
                    <?php endif ?> -->
                    <?php if (in_array('M004', $user_access) || in_array('*', $user_access)): ?>
                        <li class="<?= $this->uri->segment(3) == 'user' ? 'active' : '' ?>">
                            <a href="<?= route('dashboard/master/user') ?>"
                                class="">
                                <i class='bx bxs-right-arrow'></i> USER
                            </a>
                        </li>
                    <?php endif ?>  
                    <?php if (in_array('M005', $user_access) || in_array('*', $user_access)): ?>
                        <li class="<?= $this->uri->segment(3) == 'klasifikasi' ? 'active' : '' ?>">
                            <a href="<?= route('dashboard/master/klasifikasi') ?>"
                                class="">
                                <i class='bx bxs-right-arrow'></i> CLASSIFICATION
                            </a>
                        </li>
                    <?php endif ?>
                    <?php if (in_array('M006', $user_access) || in_array('*', $user_access)): ?>
                        <li class="<?= $this->uri->segment(3) == 'kategori' ? 'active' : '' ?>">
                            <a href="<?= route('dashboard/master/kategori') ?>"
                                class="">
                                <i class='bx bxs-right-arrow'></i> CATEGORY
                            </a>
                        </li>
                    <?php endif ?>
                    <?php if (in_array('M007', $user_access) || in_array('*', $user_access)): ?>
                        <li class="<?= $this->uri->segment(3) == 'districts' ? 'active' : '' ?>">
                            <a href="<?= route('dashboard/master/districts') ?>"
                                class="">
                                <i class='bx bxs-right-arrow'></i> DISTRICTS
                            </a>
                        </li>
                    <?php endif ?>
                </ul>
            </li>
            <?php endif ?>

            <?php if (in_array('TR001', $user_access) || in_array('TR002', $user_access) || in_array('TR003', $user_access) || in_array('*', $user_access)): ?>
            <li class="dropdown <?= (($this->uri->segment(2) == 'survey' && $this->uri->segment(2) == 'remainder') && $this->uri->segment(3) == 'entry')  ? 'active' : '' ?>">
                <a href="javascript:void(0)" class="dropdown-btn">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M14 14V6M14 14L20.1023 17.487C20.5023 17.7156 21 17.4268 21 16.9661V3.03391C21 2.57321 20.5023 2.28439 20.1023 2.51296L14 6M14 14H7C4.79086 14 3 12.2091 3 10V10C3 7.79086 4.79086 6 7 6H14"
                            stroke-width="1.5" />
                        <path
                            d="M7.75716 19.3001L7 14H11L11.6772 18.7401C11.8476 19.9329 10.922 21 9.71716 21C8.73186 21 7.8965 20.2755 7.75716 19.3001Z"
                            stroke-width="1.5" />
                    </svg>

                    <span class="link-name">ENTRY DATA</span>
                    <i id="arrow" class='bx bx-chevron-right'></i>
                </a>
                <ul class="nav-submenu menu-content">
                    <?php if (in_array('TR003', $user_access) || in_array('*', $user_access)): ?>
                        <li class="<?= ($this->uri->segment(2) == 'attendance') ? 'active' : '' ?>">
                            <a href="<?= route('dashboard/attendance/create') ?>"
                                class="">
                                <i class='bx bxs-right-arrow'></i> ATTENDANCE
                            </a>
                        </li>
                    <?php endif ?>
                    <?php if (in_array('TR001', $user_access) || in_array('*', $user_access)): ?>
                        <li class="<?= ($this->uri->segment(2) == 'survey' && $this->uri->segment(3) == 'entry') ? 'active' : '' ?>">
                            <a href="<?= route('dashboard/survey/entry') ?>"
                                class="">
                                <i class='bx bxs-right-arrow'></i> SURVEY ENTRY
                            </a>
                        </li>
                    <?php endif ?>
                    <?php if (in_array('TR002', $user_access) || in_array('*', $user_access)): ?>
                        <li class="<?= $this->uri->segment(3) == 'warehouse' ? 'active' : '' ?>">
                            <a href="<?= admin_url('warehouse/entry') ?>"
                                class="">
                                <i class='bx bxs-right-arrow'></i> WAREHOUSE ENTRY
                            </a>
                        </li>
                    <?php endif ?>
                </ul>
            </li>
            <?php endif ?>

            <?php if (in_array('TR004', $user_access) || in_array('TR005', $user_access) || in_array('*', $user_access)): ?>
            <li class="dropdown <?= (($this->uri->segment(2) == 'survey' && $this->uri->segment(2) == 'remainder') && $this->uri->segment(3) == 'entry')  ? 'active' : '' ?> ">
                <a href="javascript:void(0)" class="dropdown-btn">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M14 14V6M14 14L20.1023 17.487C20.5023 17.7156 21 17.4268 21 16.9661V3.03391C21 2.57321 20.5023 2.28439 20.1023 2.51296L14 6M14 14H7C4.79086 14 3 12.2091 3 10V10C3 7.79086 4.79086 6 7 6H14"
                            stroke-width="1.5" />
                        <path
                            d="M7.75716 19.3001L7 14H11L11.6772 18.7401C11.8476 19.9329 10.922 21 9.71716 21C8.73186 21 7.8965 20.2755 7.75716 19.3001Z"
                            stroke-width="1.5" />
                    </svg>

                    <span class="link-name">UPDATE DATA</span>
                    <i id="arrow" class='bx bx-chevron-right'></i>
                </a>
                <ul class="nav-submenu menu-content">
                    <?php if (in_array('TR004', $user_access) || in_array('*', $user_access)): ?>
                        <li class="">
                            <a href="<?= route('dashboard/survey/data-update') ?>"
                                class="">
                                <i class='bx bxs-right-arrow'></i> SURVEY UPDATE
                            </a>
                        </li>
                    <?php endif ?>
                    <?php if (in_array('TR005', $user_access) || in_array('*', $user_access)): ?>
                        <li class="">
                            <a href="<?= admin_url('master/warehouse/data-update') ?>"
                                class="">
                                <i class='bx bxs-right-arrow'></i> GUDANG UPDATE
                            </a>
                        </li>
                    <?php endif ?>
                </ul>
            </li>
            <?php endif ?>

            <?php if (in_array('R001', $user_access) || in_array('R002', $user_access) || in_array('*', $user_access)): ?>
            <li class="dropdown <?= ($this->uri->segment(2) == 'visit' && $this->uri->segment(3) == 'report') ? 'active' : '' ?>">
                <a href="javascript:void(0)" class="dropdown-btn">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M14 14V6M14 14L20.1023 17.487C20.5023 17.7156 21 17.4268 21 16.9661V3.03391C21 2.57321 20.5023 2.28439 20.1023 2.51296L14 6M14 14H7C4.79086 14 3 12.2091 3 10V10C3 7.79086 4.79086 6 7 6H14"
                            stroke-width="1.5" />
                        <path
                            d="M7.75716 19.3001L7 14H11L11.6772 18.7401C11.8476 19.9329 10.922 21 9.71716 21C8.73186 21 7.8965 20.2755 7.75716 19.3001Z"
                            stroke-width="1.5" />
                    </svg>

                    <span class="link-name">REPORT DATA</span>
                    <i id="arrow" class='bx bx-chevron-right'></i>
                </a>
                <ul class="nav-submenu menu-content">
                    <?php if (in_array('R004', $user_access) || in_array('*', $user_access)): ?>
                        <li class="<?= ($this->uri->segment(2) == 'visit' && $this->uri->segment(3) == 'report') ? 'active' : '' ?>">
                            <a href="<?= route('dashboard/survey/report-by-districts') ?>"
                                class="">
                                <i class='bx bxs-right-arrow'></i> REPORT BY DISTRICTS
                            </a>
                        </li>
                    <?php endif ?>
                    <?php if (in_array('R001', $user_access) || in_array('*', $user_access)): ?>
                        <li class="<?= ($this->uri->segment(2) == 'visit' && $this->uri->segment(3) == 'report') ? 'active' : '' ?>">
                            <a href="<?= route('dashboard/survey') ?>"
                                class="">
                                <i class='bx bxs-right-arrow'></i> REPORT BY SURVEYOR
                            </a>
                        </li>
                    <?php endif ?>
                   
                    <?php if (in_array('R002', $user_access) || in_array('*', $user_access)): ?>
                        <li class="<?= ($this->uri->segment(2) == 'visit' && $this->uri->segment(3) == 'customer') ? 'active' : '' ?>">
                            <a href="<?= route('dashboard/warehouse') ?>"
                                class="">
                                <i class='bx bxs-right-arrow'></i> GUDANG REPORT
                            </a>
                        </li>
                    <?php endif ?>
                    <?php if (in_array('R003', $user_access) || in_array('*', $user_access)): ?>
                        <li class="<?= ($this->uri->segment(2) == 'visit' && $this->uri->segment(3) == 'report') ? 'active' : '' ?>">
                            <a href="<?= route('dashboard/attendance') ?>"
                                class="">
                                <i class='bx bxs-right-arrow'></i> ATTENDANCE REPORT
                            </a>
                        </li>
                    <?php endif ?>
                </ul>
            </li>
            <?php endif ?>
        </ul>
    </div>
</nav>