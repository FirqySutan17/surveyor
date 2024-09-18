<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="CJ Feed and Care">
    <meta name="keywords" content="CJ Feed and Care">
    <meta name="author" content="Cheiljedang Indonesia ">
    <link rel="icon" type="image/png" href="<?= asset('icon/iconcj.ico') ?>" sizes="16x16">
    <link rel="icon" type="image/png" href="<?= asset('icon/iconcj.ico') ?>" sizes="32x32">


    <title>Surveyor System - CJ Feed & Care Indonesia</title>

    <!-- Scripts -->
    <script src="<?= asset('js/app.js') ?>" defer></script>

    <!-- Font Awesome -->
    <link href="<?= asset('vendor/css/fontawesome.css') ?>" rel="stylesheet">
    <link href="<?= asset('vendor/css/brands.css') ?>" rel="stylesheet">
    <link href="<?= asset('vendor/css/solid.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link href="<?= asset('css/app.css') ?>" rel="stylesheet">
    <link href="<?= asset('vendor/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= asset('css/w3.css') ?>" rel="stylesheet">
    
    <link rel="stylesheet" href="<?= asset('vendor/select2/css/select2.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('vendor/select2/css/select2-bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/display.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/w3.css') ?>">
    <link rel="stylesheet" href="<?= asset('vendor/bootstrap/dist/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('vendor/font-awesome/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('vendor/Ionicons/css/ionicons.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('vendor/dist/css/AdminLTE.css') ?>">
    <link rel="stylesheet" href="<?= asset('vendor/dist/css/skins/_all-skins.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('vendor/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('vendor/datatables.net-bs/css/buttons.dataTables.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('vendor/lightbox2/dist/css/lightbox.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('vendor/sweetalert2/sweetalert2.min.css') ?>">
    
    <link href="<?= asset('css/style-master.css') ?>" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .btn-newicon svg {
            margin-top: -2px;
            margin-right: 5px;
        }

        @font-face {
            font-family: cjfont;
            src: url('<?= asset("font/cjfont.ttf") ?>');
        }

        .nav-dash,
        .slider {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            background-color: #ffffff;
            text-align: center;
            padding: 0 2em;
            height: 80vh;
        }

        .nav-dash h1,
        .slider h1 {
            font-family: cjfont;
            font-size: 2vw;
            margin: 0;
            padding-bottom: 0.5rem;
            letter-spacing: 0.5rem;
            color: #04302c;
            transition: all 0.3s ease;
            z-index: 3;
            margin-bottom: 20px
        }

        h1:hover {
            transform: translate3d(0, -10px, 22px);
            color: #ee141e;
        }

        .nav-dash h2,
        .slider h2 {
            font-size: 2vw;
            letter-spacing: 0.5rem;
            font-family: "ROBOTO", sans-serif;
            font-weight: 300;
            color: #ff9600;
            z-index: 4;
        }

        .nav-dash a {
            text-decoration: none;
            z-index: 10;
            background: #000;
            border: 1px solid transparent;
            color: #fff;
            font-size: 18px;
            padding: 10px 70px;
            border-radius: 10px;
            font-family: cjfont;
            transition: all 0.5s ease;
        }

        .nav-dash a:hover {
            background: transparent;
            border: 1px solid #000;
            color: #000;
        }

        .nav-dash-container {
            display: flex;
            flex-direction: row;
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 75px;
            box-shadow: 20px 20px 50px rgba(0, 0, 0, 0.5);
            background: #1e1f26;
            z-index: 10;
            transition: all 0.3s cubic-bezier(0.19, 1, 0.22, 1);
        }

        .nav-dash-container--top-first {
            position: fixed;
            top: 75px;
            transition: all 0.3s cubic-bezier(0.19, 1, 0.22, 1);
        }

        .nav-dash-container--top-second {
            position: fixed;
            top: 0;
        }

        .nav-dash-container--top-second {
            position: fixed;
            top: 0;
        }

        .nav-dash-tab {
            display: flex;
            justify-content: center;
            align-items: center;
            flex: 1;
            color: #03dac6;
            letter-spacing: 0.1rem;
            transition: all 0.5s ease;
            font-size: 2vw;
        }

        .nav-dash-tab:hover {
            color: #1e1f26;
            background: #03dac6;
            transition: all 0.5s ease;
        }

        .nav-dash-tab-slider {
            position: absolute;
            bottom: 0;
            width: 0;
            height: 5px;
            background: #03dac6;
            transition: left 0.3s ease;
        }

        .background {
            position: absolute;
            height: 100vh;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: auto;
        }

        .c-form form {
            width: 55%;
            margin-top: 50px;
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            padding-left: 7px !important;
            padding-right: 0;
            height: auto;
            margin-top: 0px !important;
        }

        @media (max-width: 800px) {

            .nav-dash h1,
            .slider h1 {
                font-size: 20px;
                margin-top: 30px;
                line-height: 35px
            }

            .nav-dash h2,
            .slider h2 {
                font-size: 3vw;
            }

            .nav-dash-tab {
                font-size: 3vw;
            }
        }

        @media screen only (min-width: 360px) {


            .nav-dash h2,
            .slider h2 {
                font-size: 2vw;
                letter-spacing: 0.2vw;
            }

            .nav-dash-tab {
                font-size: 1.2vw;
            }
        }

        .background {
            position: absolute;
            height: 100vh;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 0;
        }
    </style>

    <style>
        table.dataTable th {
            position: relative;
            text-align: center
        }

        table.dataTable thead .sorting:after,
        table.dataTable thead .sorting_asc:after,
        table.dataTable thead .sorting_desc:after,
        table.dataTable thead .sorting_asc_disabled:after,
        table.dataTable thead .sorting_desc_disabled:after {
            position: absolute;
            bottom: 5px;
            right: 5px;
        }

        table.dataTable thead>tr>th.sorting_asc,
        table.dataTable thead>tr>th.sorting_desc,
        table.dataTable thead>tr>th.sorting,
        table.dataTable thead>tr>td.sorting_asc,
        table.dataTable thead>tr>td.sorting_desc,
        table.dataTable thead>tr>td.sorting {
            padding: 10px 20px;
        }

        .table>tbody>tr>td,
        .table>tbody>tr>th,
        .table>tfoot>tr>td,
        .table>tfoot>tr>th,
        .table>thead>tr>td,
        .table>thead>tr>th {
            vertical-align: middle;
        }

        select.input-sm {
            height: 40px;
            line-height: 30px;
            text-align: center;
        }

        .box-header {
            background: #3c8dbc;
            border: 4px solid #000;
            border-radius: 10px 10px 0px 0px;
            padding: 25px 0px;
        }

        .box.box-solid.box-primary {
            border-top: none;
            border: 0px solid transparent
        }

        .box-title {
            font-size: 24px;
            font-weight: 700;
            text-transform: uppercase;
            color: #fff;
        }

        .box.box-info {
            border-top-color: transparent;
        }

        .content {
            padding: 0px
        }

        .date-range {
            background-color: #000;
            color: #fff;
            text-align: center;
            width: 100%;
            padding: 8px 16px;
            border-radius: 0px 0px 10px 10px;
            border: 2px solid #000;
            font-weight: 600
        }

        .box-header.with-border {
            border-bottom: 1px solid #f4f4f4;
        }

        .b-style {
            font-family: cjFont;
            font-size: 14px;
            color: #0f172a;
            margin-bottom: 0px;
            background: transparent;
            padding: 0px;
            padding-top: 5px;
        }
        i.bx {
            font-size: 17px;
            display: inline-block;
            vertical-align: middle;
            margin-top: -3px;
            margin-right: 5px;
        }
    </style>
</head>

<body class="body-auth">
    <script src="<?= asset('js/jquery.min.js') ?>"></script>
    <script src="<?= asset('vendor/select2/js/select2.min.js') ?>"></script>
    <div id="master">
        <div class="page-main-header">
            <div class="main-header-right row m-0">
                <div class="main-header-left">
                    <a href="javascript:void(0)">
                        <img class="img-fluid brand-style" src="<?= asset('img/cj-logo.png') ?>" alt="">
                    </a>
                    
                    <p class="breadcrumb b-style"><?= $title ?></p>
                </div>

            </div>
        </div>

        <main class="page-wrapper">
            <div id="main" class="main open-main">
                <style>
                    .pre-posttest h3 {
                        font-weight: 700;
                        border-bottom: 2px solid #000;
                        padding-bottom: 10px;
                        margin-bottom: 10px;
                    }

                    .pre-posttest h4 {
                        font-weight: 500;
                        font-style: italic
                    }

                    .qna {
                        margin-bottom: 20px
                    }

                    .qna label {
                        font-weight: 500 !important;
                    }

                    .answer {
                        margin-top: 10px
                    }

                    input {
                        display: inline-block;
                        vertical-align: middle;
                        margin-top: 2px !important;
                        margin-right: 8px !important;
                    }

                    .question {
                        font-size: 17px;
                        font-weight: 600
                    }

                    h3.sub-title {
                        font-size: 16px;
                        text-decoration: none;
                        margin-top: 10px;
                        /* margin-bottom: 20px; */
                        border-bottom: 1px solid #000;
                        text-transform: uppercase;
                        font-weight: 700;
                        padding-bottom: 15px;
                        font-size: 14px !important;
                    }

                    .box-att {
                        background: #007bff;
                        color: #fff;
                        padding: 20px;
                        border-radius: 10px
                    }

                    .divi-delayed-button-2 {
                        text-align: center;
                        padding: 15px;
                        font-weight: 800;
                        font-size: 18px;
                        border: none;
                        /* border-top-right-radius: 10px; */
                        background: #007bff;
                        color: #fff;
                        border-radius: 8px;
                        margin-bottom: 20px
                    }

                    .divi-delayed-button-2:hover {
                        background: #58a9ff
                    }

                    .content-task {
                        /* border-top: 1px solid #000;
                        border-bottom: 1px solid #000; */
                        /* margin-bottom: 10px; */
                        margin-top: 15px !important;
                        border-bottom: 1px solid #000;
                    }

                    .answer {
                        margin-left: 25px;
                        display: flex;
                        justify-content: left;
                        align-content: center;
                    }

                    [type="checkbox"],
                    [type="radio"] {
                        width: 15px !important;
                    }

                    .text-mobile {
                        display: none;
                    }

                    
                </style>

                <style>
                    table.dataTable th {
                        position: relative;
                        text-align: center
                    }

                    table.dataTable thead .sorting:after,
                    table.dataTable thead .sorting_asc:after,
                    table.dataTable thead .sorting_desc:after,
                    table.dataTable thead .sorting_asc_disabled:after,
                    table.dataTable thead .sorting_desc_disabled:after {
                        position: absolute;
                        bottom: 5px;
                        right: 5px;
                    }

                    table.dataTable thead>tr>th.sorting_asc,
                    table.dataTable thead>tr>th.sorting_desc,
                    table.dataTable thead>tr>th.sorting,
                    table.dataTable thead>tr>td.sorting_asc,
                    table.dataTable thead>tr>td.sorting_desc,
                    table.dataTable thead>tr>td.sorting {
                        padding: 10px 20px;
                    }

                    .table>tbody>tr>td,
                    .table>tbody>tr>th,
                    .table>tfoot>tr>td,
                    .table>tfoot>tr>th,
                    .table>thead>tr>td,
                    .table>thead>tr>th {
                        vertical-align: middle;
                    }

                    select.input-sm {
                        height: 40px;
                        line-height: 30px;
                        text-align: center;
                    }

                    .box-header {
                        background: #3c8dbc;
                        border: 4px solid #000;
                        border-radius: 10px 10px 0px 0px;
                        padding: 25px 0px;
                    }

                    .box.box-solid.box-primary {
                        border-top: none;
                        border: 0px solid transparent
                    }

                    .box-title {
                        font-size: 24px;
                        font-weight: 700;
                        text-transform: uppercase;
                        color: #fff;
                    }

                    .box.box-info {
                        border-top-color: transparent;
                    }

                    .content {
                        padding: 0px
                    }

                    .date-range {
                        background-color: #000;
                        color: #fff;
                        text-align: center;
                        width: 100%;
                        padding: 8px 16px;
                        border-radius: 0px 0px 10px 10px;
                        border: 2px solid #000;
                        font-weight: 600
                    }

                    .box-header.with-border {
                        border-bottom: 1px solid #f4f4f4;
                    }

                    .b-style {
                        font-family: cjFont;
                        font-size: 14px;
                        color: #0f172a;
                        margin-bottom: 0px;
                        background: transparent;
                        padding: 0px;
                        padding-top: 5px
                    }

                    table.table-bordered.dataTable th, table.table-bordered.dataTable td {
                        font-size: 10px !important
                    }

                    table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:after, table.dataTable thead .sorting_asc_disabled:after, table.dataTable thead .sorting_desc_disabled:after {
                        bottom: 10px !important;
                    }

                    select.input-sm {
                        height: 30px;
                        line-height: 20px;
                        margin: 0px 5px
                    }

                    div.dataTables_wrapper div.dataTables_length select {
                        width: 50px;
                    }
                    div.dataTables_wrapper div.dataTables_info {
                        padding-top: 8px;
                        white-space: nowrap;
                        font-size: 10px !important;
                    }
                    .pagination>.disabled>a, .pagination>.disabled>a:focus, .pagination>.disabled>a:hover, .pagination>.disabled>span, .pagination>.disabled>span:focus, .pagination>.disabled>span:hover {
                        font-size: 11px
                    }
                    .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
                        font-size: 11px;
                    }
                    div.dataTables_wrapper div.dataTables_length label {
                        font-size: 11px;
                    }
                    td {
                        height: auto;
                        padding: 10px !important
                    }
                    div.dataTables_wrapper div.dataTables_filter label {
                        font-weight: normal;
                        white-space: nowrap;
                        text-align: left;
                        font-size: 11px;
                        display: inline-block;
                        vertical-align: middle;
                    }
                    .pagination>li>a, .pagination>li>span {
                        position: relative;
                        float: left;
                        padding: 6px 12px;
                        margin-left: -1px;
                        line-height: 1.42857143;
                        color: #337ab7;
                        text-decoration: none;
                        background-color: #fff;
                        border: 1px solid #ddd;
                        font-size: 11px;
                    }
                    .table-responsive {
                        width: 100%
                    }
                    .table-w-message {
                        width: 1330px;
                    }
                    .c-form {
                        max-width: 100%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }
                    .cust-btn-back {
                        color: red;
                        border: 1px solid red;
                        background: #fff;
                    }
                    .cust-btn-back:hover {
                        background: red;
                        color: #fff;
                        border: 1px solid red;
                    }
                    .row {
                        margin: 0px !important;
                    }
                    #customerdetail td {
                        background-color: #eee;
                    }

                    th, td {
                        font-size: 10px !important;
                        text-align: center;
                    }
                    input {
                        font-size: 10px !important;
                        text-align: center;
                    }
                    .wrapper-reason {
                        display: grid;
                        grid-template-columns: repeat(8, 1fr);
                        width: 100%;
                    }
                    .wrapper-reason .col-item {
                        grid-column: span 4;
                    }
                    .cust-btn-add {
                        background: green;
                        color: #fff;
                        width: 120px;
                        padding: 5px;
                        border: 1px solid transparent;
                        font-weight: 700
                    }
                    .cust-btn-add:hover {
                        border: 1px solid green;
                    }
                    .select2-container .select2-selection--single .select2-selection__rendered {
                        font-size: 10px !important;
                        margin-top: 3px !important;
                    }
                    .select2-container--bootstrap4 .select2-results__option {
                        font-size: 12px
                    }

                    @media (max-width: 1024px) {
                        #region_entry {
                            margin-bottom: 20px
                        }
                        .wrapper-reason .col-item {
                            grid-column: span 8;
                        }
                        h3.sub-title {
                            line-height: 25px;
                        }
                    }

                    @media(max-width: 600px) {
                        .answer {
                            margin-left: 0px
                        }

                        input {
                            margin-right: 10px !important
                        }
                        input[type=date].form-control, input[type=time].form-control, input[type=datetime-local].form-control, input[type=month].form-control {
                            line-height: 20px;
                        }

                        [type="checkbox"],
                        [type="radio"] {
                            width: 30px !important;
                        }

                        .question {
                            line-height: 25px;
                            font-size: 18px
                        }
                        table thead {
                            display: none;
                        }
                        table, table tbody, table tr, table td {
                            display: flex;
                            flex-direction: column;
                            width: 100%;
                        } 
                        th, td {
                            font-size: 12px !important;
                            text-align: center;
                        }
                        table tbody tr td {
                            text-align: center;
                            padding-left: 50%;
                            position: relative;
                            white-space: normal !important;
                            font-size: 12px !important;

                        }
                        input {
                            font-size: 12px !important;
                        }
                        select {
                            font-size: 12px !important;
                        }
                        textarea {
                            font-size: 12px !important;
                        }
                        table td:before {
                            content: attr(data-label);
                            width: 100%;
                            font-weight: 600;
                            font-size: 13px;
                            text-align: left;
                            text-transform: uppercase;
                            margin-bottom: 5px;
                        } 
                        .ts-asm {
                            display: none;
                        }
                        .h-it {
                            height: auto !important;
                        }
                        .text-desktop {
                            display: none;
                        }
                        .text-mobile {
                            display: block;
                            font-size: 14px !important;
                            font-weight: 600;
                            text-transform: uppercase;
                            padding: 15px 0px;
                            vertical-align: middle !important;
                        }
                        th {
                            height: auto !important;
                            padding: 15px !important;
                        }
                    }
                </style>

                <div class="main-content pre-posttest">
                    <!-- <h3 class="card-title">
                        <strong>Visit Entry</strong>
                    </h3> -->
                    <div class="row">
                        <form action="<?= base_url('visit/do_create_mobile') ?>" method="POST" enctype="multipart/form-data">
                            <div class="content-task">
                                <!-- <div class="row">
                                    <div class="col-md-6 col-sm-12"></div>
                                    <div class="col-md-6 col-sm-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>DRF</th>
                                                    <th>ADJ</th>
                                                    <th>DEC</th>
                                                </tr>
                                               
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="height: 100px; width: 60px"><?= $user['EMPLOYEE_ID'] ?> <br> <?= $user['FULL_NAME'] ?></td>
                                                    <td style="height: 100px; width: 60px"></td>
                                                    <td style="height: 100px; width: 60px"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> -->
                                <h3 class="sub-title">1. Customer Information / Informasi Customer</h3>
                                <input type="hidden" name="employee_id_sess" value="<?= $employee_id ?>">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group row">
                                            <label for="plant" class="col-lg-12 col-sm-12 col-form-label" style="font-size: 13px; text-transform: uppercase">Visiting Date <span class="text-danger">*</span></label>
                                            <div class="col-lg-12 col-sm-12">
                                                <input type="date" name="visiting_date" class="form-control" style="font-size: 14px;" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group row">
                                            <label for="plant" class="col-lg-12 col-sm-12 col-form-label" style="font-size: 13px; text-transform: uppercase">Plant <span class="text-danger">*</span></label>
                                            <div class="col-lg-12 col-sm-12">
                                                <select id="plant_entry" class="form-control" style="width: 100%;" name="plant" required>
                                                    <option value="" selected>- PILIH PLANT -</option>
                                                    <?php foreach ($plant as $field): ?>
                                                      <option value="<?= $field['CODE'] ?>" selected><?= $field['CODE'].' - '.$field['CODE_NAME'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group row">
                                            <label for="customer" class="col-lg-12 col-sm-12 col-form-label" style="font-size: 13px; text-transform: uppercase">Customer <span class="text-danger">*</span></label>
                                            <div class="col-lg-12 col-sm-12">
                                                <select id="customer_entry" class="form-control" style="width: 100%;" name="customer" required>
                                                    <!-- <option value="" selected>- PILIH CUSTOMER -</option> -->
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group row">
                                            <label for="customer" class="col-lg-12 col-sm-12 col-form-label" style="font-size: 13px; text-transform: uppercase">Region</label>
                                            <div class="col-lg-12 col-sm-12">
                                                <input type="text" id="region_entry" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive mt-2">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center">Site</th>
                                                <th style="text-align: center">Group Code / Kode Grup</th>
                                                <th style="text-align: center">Customer Name / Nama Customer</th>
                                                <th style="text-align: center">Type / Jenis</th>
                                                <th style="text-align: center">Owner Name / Nama Owner</th>
                                                <th style="text-align: center">Contact Number / Nomor Kontak</th>
                                                <th style="text-align: center">Address / Alamat</th>
                                            </tr>
                                        </thead>
                                        <tbody id="customerdetail"></tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="content-task mt-5">
                                <h3 class="sub-title">2. Transaction Information / Informasi Transaksi</h3>
                                <div class="table-it">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5%">Open Date / Tanggal Open (Registration) <span class="text-danger">*</span></th>
                                                    <th style="width: 5%">Stop Date / Tanggal Stop <span class="text-danger">*</span></th>
                                                    <th style="width: 15%">Stop Type <span class="text-danger">*</span></th>
                                                    <th>Stop AR <span class="text-danger">*</span></th>
                                                    <th>Current AR / AR Saat ini <span class="text-danger">*</span></th>
                                                    <th>Collateral Amount / Jumlah Jaminan <span class="text-danger">*</span></th>
                                                    <th style="width: 17%">Collection Type / Tipe <span class="text-danger">*</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td data-label="Open Date">
                                                        <input type="date" name="transdate_open" class="form-control">
                                                    </td>
                                                    <td data-label="Close Date">
                                                        <input type="date" name="transdate_close" class="form-control">
                                                    </td>
                                                    <td data-label="Stop Type">
                                                        <select id="close_type" class="form-control" style="width: 100%;" name="close_type">
                                                            <option value="SUKARELA">SUKARELA</option>
                                                            <option value="DIPAKSA">DIPAKSA</option>
                                                        </select>
                                                    </td>
                                                    <td data-label="Stop AR">
                                                        <input type="text" name="ar_stop" class="form-control format-amount" placeholder="0">
                                                    </td>
                                                    <td data-label="Current AR">
                                                        <input type="text" name="ar_current" class="form-control format-amount" placeholder="0">
                                                    </td>
                                                    <td data-label="Collateral Amount">
                                                        <input type="text" name="collateral_amt" class="form-control format-amount" placeholder="0">
                                                    </td>
                                                    <td data-label="Collection Type">
                                                        <select id="collection_type" class="form-control" style="width: 100%;" name="collection_type">
                                                            <?php foreach ($collection_type as $name): ?>
                                                                <option value="<?= $name ?>"><?= str_replace("_", " ", $name) ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                    <div class="wrapper-reason">
                                        <div class="col-item">
                                            <table class="table table-bordered">
                                                <tr class="text-desktop">
                                                    <th colspan="4" style="background-color: #E6E6E6; height: 40px !important">Person in Charge When Registration /  Penanggung Jawab ketika Registrasi</th>
                                                </tr>
                                                <tr style="vertical-align: middle !important">
                                                    <th class="text-mobile">Person in Charge When Open</th>
                                                </tr>
                                                    <tr class="ts-asm">
                                                        <th style="background-color: #E6E6E6; width: 50%;">TS</th>
                                                        <th style="background-color: #E6E6E6; width: 50%">ASM</th>
                                                    </tr>
                                                    <tr>
                                                        <td data-label="TS">
                                                            <select class="form-control pic_sales" style="width: 100%;" name="pic_open_ts">
                                                                <option value="" selected>- PILIH EMPLOYEE -</option>
                                                            </select>
                                                        </td>
                                                        <td data-label="ASM">
                                                            <select class="form-control pic_sales" style="width: 100%;" name="pic_open_asm">
                                                                <option value="" selected>- PILIH EMPLOYEE -</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr class="ts-asm">
                                                        <th style="background-color: #E6E6E6; width: 50%">GSM</th>
                                                        <th style="background-color: #E6E6E6; width: 50%">Site CCT</th>
                                                    </tr>
                                                    <tr>
                                                        <td data-label="GSM">
                                                            <select class="form-control pic_sales" style="width: 100%;" name="pic_open_gsm">
                                                                <option value="" selected>- PILIH EMPLOYEE -</option>
                                                            </select>
                                                        </td>
                                                        <td data-label="Site CCT">
                                                            <select class="form-control pic_sales" style="width: 100%;" name="pic_open_cct">
                                                                <option value="" selected>- PILIH EMPLOYEE -</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                               
                                                <tr>
                                                    <th colspan="4" class="text-desktop" style="text-align: left; padding: 5px; background-color: #E6E6E6; height: 35px !important">*Stop Reason / Alasan Stop (by TS)</th>
                                                </tr>
                                                <tr style="vertical-align: middle !important">
                                                    <th class="text-mobile" style="font-size: 12px !important">*Stop Reason</th>
                                                </tr>
                                                <tr>
                                                    <td colspan="4"><textarea name="stopage_reason" style="width: 100%; border-radius: 5px; padding: 10px" placeholder="Type here.." id="" rows="5" maxlength="500"></textarea></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-item">
                                            <table class="table table-bordered">
                                                <tr class="text-desktop">
                                                    <th colspan="4" style="background-color: #E6E6E6; height: 40px !important">Person in Charge When Stop / Penanggung Jawab ketika Stop</th>
                                                </tr>
                                                <tr style="vertical-align: middle !important">
                                                    <th class="text-mobile">Person in Charge When Stop</th>
                                                </tr>
                                                    <tr class="ts-asm">
                                                        <th style="background-color: #E6E6E6; width: 50%">TS</th>
                                                        <th style="background-color: #E6E6E6; width: 50%">ASM</th>
                                                    </tr>
                                                    <tr>
                                                        <td data-label="TS">
                                                            <select class="form-control pic_sales" style="width: 100%;" name="pic_close_ts">
                                                                <option value="">- PILIH EMPLOYEE -</option>
                                                            </select>
                                                        </td>
                                                        <td data-label="ASM">
                                                            <select class="form-control pic_sales" style="width: 100%;" name="pic_close_asm">
                                                                <option value="">- PILIH EMPLOYEE -</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr class="ts-asm">
                                                        <th style="background-color: #E6E6E6; width: 50%">GSM</th>
                                                        <th style="background-color: #E6E6E6; width: 50%">Site CCT</th>
                                                    </tr>
                                                    <tr>
                                                        <td data-label="GSM">
                                                            <select class="form-control pic_sales" style="width: 100%;" name="pic_close_gsm">
                                                                <option value="">- PILIH EMPLOYEE -</option>
                                                            </select>
                                                        </td>
                                                        <td data-label="Site CCT">
                                                            <select class="form-control pic_sales" style="width: 100%;" name="pic_close_cct">
                                                                <option value="">- PILIH EMPLOYEE -</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                
                                                <tr>
                                                    <th colspan="4" class="text-desktop" style="text-align: left; padding: 5px; background-color: #E6E6E6; height: 35px !important">*Expense not finish yet / Biaya belum diselesaikan</th>
                                                </tr>
                                                <tr style="vertical-align: middle !important">
                                                    <th class="text-mobile" style="font-size: 12px !important">*Expense not finish yet</th>
                                                </tr>
                                                <tr>
                                                    <td colspan="4"><textarea name="pending_fee_status" style="width: 100%; border-radius: 5px; padding: 10px" placeholder="Type here.." id="" rows="5" maxlength="500"></textarea></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th colspan="10" style="text-align: left; height: 40px !important;">Collateral still not obtained / Informasi Aset Jaminan yang sudah didapat dan belum didapat</th>
                                                </tr>
                                                <tr>
                                                    <th colspan="8" style="text-align: left; background: #fff; border: 0px">Company Guarantee / Jaminan Perusahaan <span class="text-danger">*</span></th>
                                                    <th colspan="2" style="text-align: right; background: #fff; border: 0px"><button type="button" class="btn cust-btn-add" onclick="addAssets()">+</button></th>
                                                </tr>
                                            </thead>
                                            <thead>
                                                    <tr>
                                                        <th>
                                                        Classification / Klasifikasi</th>
                                                        <th>Type / Tipe</th>
                                                        <th>Size / Ukuran</th>
                                                        <th>Value of Collateral / Nilai Jaminan</th>
                                                        <th>
                                                        Asset Address / Alamat Aset</th>
                                                        <th>Doc. Certificate / Sertifikat</th>
                                                        <th>Doc. SPPJ</th>
                                                        <th>Doc. HT</th>
                                                        <th>Doc. Others / Lainnya</th>
                                                        <th></th>
                                                    </tr>
                                            </thead>
                                            <tbody id="assets1"></tbody>
                                            <thead>
                                                <tr>
                                                    <th colspan="8" style="text-align: left; background: #fff; border: 0px">Other Assets / Aset Lainnya <span class="text-danger">*</span></th>
                                                    <th colspan="2" style="text-align: right; background: #fff; border: 0px"><button type="button" class="btn cust-btn-add" onclick="addAssets(1)">+</button></th>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        Classification / Klasifikasi</th>
                                                        <th>Type / Tipe</th>
                                                        <th>Size / Ukuran</th>
                                                        <th>Value of Collateral / Nilai Jaminan</th>
                                                        <th>
                                                        Asset Address / Alamat Aset</th>
                                                        <th>Doc. Certificate / Sertifikat</th>
                                                        <th>Doc. SPPJ</th>
                                                        <th>Doc. HT</th>
                                                        <th>Doc. Others / Lainnya</th>
                                                        <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="assets2"></tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="content-task mt-5">
                                <h3 class="sub-title">3. Monthly Collection Plan & Other Customer Debt / Rencana Collection Bulanan & Hutang Customer yang lain</h3>
                                <div>
                                <div class="table-responsive">
                                    <table class="table table-bordered" style="margin-bottom: 0px">
                                            <thead>
                                                <tr>
                                                    <th colspan="4" style="text-align: left; background: #fff; border: 0px">Monthly Collection Plan per SPPH / Rencana Collection Bulanan per SPPH (Need attach SPPH / Harus lampir SPPH) <span class="text-danger">*</span></th>
                                                    <th colspan="1" style="text-align: right; background: #fff; border: 0px"><button type="button" class="btn cust-btn-add" onclick="addCollectionPlan()">+</button></th>
                                                </tr>
                                                <tr>
                                                    <th>Year Month / Tahun Bulan</th>
                                                    <th>Collection Amount / Jumlah Collection</th>
                                                    <th>AR Balance / AR Saldo</th>
                                                    <th>Note</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="collectionplan">
                                            <tr style="vertical-align: middle !important">
                                                <th class="text-mobile" style="font-size: 12px !important">Monthly Collection Plan per SPPH</th>
                                                <th style="text-align: right; background: #fff; border: 0px;"><button type="button" class="btn cust-btn-add" onclick="addCollectionPlan()">+</button></th>
                                            </tr>
                                            </tbody>
                                    </table>
                                </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th colspan="3" style="text-align: left; background: #fff; border: 0px">Other Customer Debts / Hutang Customer yang lain <span class="text-danger">*</span></th>
                                                    <th colspan="1" style="text-align: right; background: #fff; border: 0px"><button type="button" class="btn cust-btn-add" onclick="addOtherDebt()">+</button></th>
                                                </tr>
                                                <tr>
                                                <tr>
                                                        <th>Creditors / Kreditor</th>
                                                        <th>
                                                        Current Debt / Hutang saat ini</th>
                                                        <th>Note</th>
                                                        <th></th>
                                                    </tr>
                                                </tr>
                                            </thead>
                                            <tbody id="otherdebt">
                                                <tr style="vertical-align: middle !important">
                                                    <th class="text-mobile" style="font-size: 12px !important">Other Customer Debts</th>
                                                    <th colspan="1" style="text-align: right; background: #fff; border: 0px"><button type="button" class="btn cust-btn-add" onclick="addOtherDebt()">+</button></th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>

                            </div>

                            <div class="content-task mt-5">
                                <h3 class="sub-title">4. 
                                Visit Details / Detail Kunjungan</h3>
                                <div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th colspan="7" style="text-align: right; background: #fff; border: 0px"><button type="button" class="btn cust-btn-add" onclick="addVisitDetail()">+</button></th>
                                                </tr>
                                                <tr>
                                                    <th rowspan="2">Date / Tanggal</th>
                                                    <th colspan="2">Participant / Peserta</th>
                                                    <th rowspan="2">Meeting Location / Lokasi Pertemuan</th>
                                                    <th rowspan="2">Meeting Details / Detail isi pertemuan utama</th>
                                                    <th rowspan="2">Future plans and opinions for debt collection / Rencana masa depan dan opini tentang collection BD</th>
                                                    <th rowspan="2"></th>
                                                </tr>
                                                <tr>
                                                    <th>CJ</th>
                                                    <th>Customer</th>
                                                </tr>
                                            </thead>
                                            <tbody id="visitdetail">
                                                <tr>
                                                    <th style="text-align: right; background: #fff; border: 0px"><button type="button" class="btn cust-btn-add" onclick="addVisitDetail()">+</button></th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="content-task mt-5">
                                <h3 class="sub-title">5. Strategy / Strategi</h3>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="3" style="text-align: right; background: #fff; border: 0px"><button type="button" class="btn cust-btn-add" onclick="addStrategy()">+</button></th>
                                            </tr>
                                            <tr>
                                                <th colspan="3">Collection Stop Balance Strategy & Collaboration Plan / Strategi Collection Stop Saldo & Rencana Kerjasama</th>
                                            </tr>
                                            <tr>
                                                <th>
                                                Sales Division / Divisi Sales</th>
                                                <th>Site CCT</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="visitstrategy">
                                            <!-- <tr>
                                                <th>Collection Stop Balance Strategy & Collaboration Plan / Strategi Collection Stop Saldo & Rencana Kerjasama</th>
                                            </tr> -->
                                            <tr>
                                                <th style="text-align: right; background: #fff; border: 0px"><button type="button" class="btn cust-btn-add" onclick="addStrategy()">+</button></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="content-task mt-5">
                                <h3 class="sub-title">6. Visit Photos</h3>
                                <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th colspan="3" style="text-align: right; background: #fff; border: 0px"><button type="button" class="btn cust-btn-add" onclick="addImages()">+</button></th>
                                                </tr>
                                                <tr>
                                                    <th>Title / Judul</th>
                                                    <th>Upload Image</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="visitimages">
                                                <tr>
                                                    <th style="text-align: right; background: #fff; border: 0px"><button type="button" class="btn cust-btn-add" onclick="addImages()">+</button></th>
                                                </tr>
                                            </tbody>
                                        </table>
                                </div>
                            </div>

                            <div class="form-group row mt-5" style="margin: 20px 0px !important">
                                <div class="col-lg-12 col-sm-12" style="display: flex; padding: 0px">
                                    <button type="submit" class="btn btn-primary cust-btn-save" style="width: 100%; height: 50px">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <script type="text/javascript">
                    $('#customer_entry').select2({
                        theme: 'bootstrap4',
                        placeholder: "- PILIH CUSTOMER -",
                        ajax: {
                            url: "<?= base_url('ajax/load/customer') ?>",
                            dataType: 'json',
                            data: function (params) {
                              return {
                                q: params.term,
                                plant: $("#plant_entry option:selected").val()
                              };
                            },
                            processResults: function(data) {
                                return {
                                    results: $.map(data, function(item) {
                                        return {
                                            text: item.CUSTOMER + " - " + item.CUSTOMER_NAME,
                                            id: item.CUSTOMER,
                                            jsondetail: JSON.stringify(item)
                                        }
                                    })
                                };
                            }
                        },
                        templateSelection: function (data, container) {
                            // Add custom attributes to the <option> tag for the selected option
                            $(data.element).attr('data-jsondetail', data.jsondetail);
                            return data.text;
                        }
                    }).on("select2:select", function (e) {
                        let data = $("#customer_entry option:selected").val();
                        let detaildata = $("#customer_entry option:selected").data('jsondetail');
                        load_datacustomer(detaildata);
                    });

                    $('.pic_sales').select2({
                        theme: 'bootstrap4',
                        placeholder: "- PILIH EMPLOYEE -",
                        ajax: {
                            url: "<?= base_url('ajax/load/employee') ?>",
                            dataType: 'json',
                            data: function (params) {
                                let pic_attribute_name = $(this).attr('name');
                                console.log(pic_attribute_name);
                                return {
                                    q: params.term,
                                    attribute_name: pic_attribute_name,
                                    plant: $("#plant_entry option:selected").val()
                                };
                                
                            },
                            processResults: function(data) {
                                return {
                                    results: $.map(data, function(item) {
                                        return {
                                            text: item.EMPNO + " - " + item.FULL_NAME,
                                            id: item.EMPNO
                                        }
                                    })
                                };
                            }
                        }
                    });

                    $('#plant_entry').select2({
                        theme: 'bootstrap4',
                        language: "en",
                        placeholder: "- PILIH PLANT -",
                    }).on("change", function (e) {
                        clear_datacustomer();
                        clear_sales();
                    });

                    function clear_datacustomer() {
                        $("#customer_entry").empty();
                        $("#customerdetail").empty();
                        $("#region_entry").val('');
                    }

                    function clear_sales() {
                        $(".pic_sales").empty();
                    }

                    function load_datacustomer(data) {
                        $("#region_entry").val(data.REGION_NAME == null ? "-" : data.REGION_NAME);

                        let tabledata = `
                            <tr>
                                <td data-label='Site'>${data.COMPANY_CODE}</td>
                                <td data-label="Group Code">${data.CUSTOMER}</td>
                                <td data-label="Customer Name">${data.CUSTOMER_NAME}</td>
                                <td data-label="Type">${data.SALES_OFFICE_NAME == null ? '-' : data.SALES_OFFICE_NAME}</td>
                                <td data-label="Owner">${data.CHIEF == null ? '-' : data.CHIEF}</td>
                                <td data-label="Contact">${data.TELEPHONE_2 == null ? '-' : data.TELEPHONE_2}</td>
                                <td data-label="Address">${data.STREET}</td>
                            </tr>
                        `;
                        $("#customerdetail").html(tabledata);
                    }

                    function addAssets(isOthers = 0) {
                        let guarantee_data = `
                            <select class='form-control' name='assets_class2[]'>
                                <option value='ASET TIDAK BERGERAK'>ASET TIDAK BERGERAK</option>
                                <option value='ASET BERGERAK'>ASET BERGERAK</option>
                                <option value='CEK / GIRO'>CEK / GIRO</option>
                            </select>
                        `;
                        let others_data = `<input type="text" name="assets_class2[]" class="form-control">`;

                        let class2_data = guarantee_data;
                        let class1_data = 'CG';
                        if (isOthers == 1) { class2_data = others_data; class1_data = 'OTH';}

                        let tabledata = `
                            <tr>
                                <td>${class2_data}</td>
                                <td>
                                    <input type="hidden" name="assets_class1[]" class="form-control" value='${class1_data}'>
                                    <input type="text" name="asset_type[]" class="form-control">
                                </td>
                                <td><input type="text" name="asset_size[]" class="form-control"></td>
                                <td><input type="text" name="asset_value[]" class="form-control" onkeyup="onkeyup_data(event)" onkeydown="onkeydown_data(event)"></td>
                                <td><input type="text" name="asset_address[]" class="form-control"></td>
                                <td><input type="text" name="docs_certificate[]" class="form-control"></td>
                                <td><input type="text" name="docs_sppj[]" class="form-control"></td>
                                <td><input type="text" name="docs_ht[]" class="form-control"></td>
                                <td><input type="text" name="docs_others[]" class="form-control"></td>
                                <td><a onclick="deleteRow(this)" href="javascript:void(0)" class="btn btn-sm" title="Hapus"><i class="fas fa-trash text-danger"></i></a></td>
                            </tr>
                        `;

                        if (isOthers == 1) { $("#assets2").append(tabledata); }
                        else { $("#assets1").append(tabledata); }

                    }

                    function deleteRow(e) {
                        Swal.fire({
                            type: "warning",
                            title: "Delete Row",
                            showCancelButton: true,
                            text: "Are you sure want to delete this data ?"
                        }).then((result) => {
                            if (result.value) {
                                $(e).parent().parent().remove();
                            }
                        });
                    }

                    function addCollectionPlan() {
                        let tabledata = `
                            <tr>
                                <td data-label="Year/ Month"><input type="month" name="CL_collection_date[]" class="form-control"></td>
                                <td data-label="Collection Amount"><input type="text" name="CL_amount[]" class="form-control" onkeyup="onkeyup_data(event)" onkeydown="onkeydown_data(event)"></td>
                                <td data-label="AR Balance"><input type="text" name="CL_ar_balance[]" class="form-control" onkeyup="onkeyup_data(event)" onkeydown="onkeydown_data(event)"></td>
                                <td data-label="Note"><input type="text" name="CL_note[]" class="form-control"></td>
                                <td><a onclick="deleteRow(this)" href="javascript:void(0)" class="btn btn-sm" title="Hapus"><i class="fas fa-trash text-danger"></i></a></td>
                            </tr>
                        `;

                        $("#collectionplan").append(tabledata);
                    }

                    function addOtherDebt() {
                        let tabledata = `
                            <tr>
                                <td data-label="Creditors"><input type="text" name="OT_creditor[]" class="form-control"></td>
                                <td data-label="Current Debt"><input type="text" name="OT_current_debt[]" class="form-control" onkeyup="onkeyup_data(event)" onkeydown="onkeydown_data(event)"></td>
                                <td data-label="Note"><input type="text" name="OT_note[]" class="form-control"></td>
                                <td><a onclick="deleteRow(this)" href="javascript:void(0)" class="btn btn-sm" title="Hapus"><i class="fas fa-trash text-danger"></i></a></td>
                            </tr>
                        `;

                        $("#otherdebt").append(tabledata);
                    }

                    function addVisitDetail() {
                        let tabledata = `
                            <tr>
                                <td data-label="Date"><input type="date" name="VD_visit_date[]" class="form-control"></td>
                                <td data-label="CJ"><input type="text" name="VD_participant_cj[]" class="form-control"></td>
                                <td data-label="Customer"><input type="text" name="VD_participant_customer[]" class="form-control"></td>
                                <td data-label="Meeting location"><input type="text" name="VD_location[]" class="form-control"></td>
                                <td data-label="Meeting details"><textarea type="text" name="VD_description[]" class="form-control" rows="3" style="font-size: 10px"></textarea></td>
                                <td data-label="Future plans and opinions for debt collection"><textarea type="text" name="VD_collection_bd_opinion[]" class="form-control" rows="3" style="font-size: 10px"></textarea></td>
                                <td><a onclick="deleteRow(this)" href="javascript:void(0)" class="btn btn-sm" title="Hapus"><i class="fas fa-trash text-danger"></i></a></td>
                            </tr>
                        `;

                        $("#visitdetail").append(tabledata);
                    }

                    function addImages() {
                        let tabledata = `
                            <tr>
                                <td data-label ="Title"><input type="text" name="VR_image_name[]" class="form-control" placeholder="Type here.."></td>
                                <td data-label ="Upload photo"><input type="file" accept="image/png, image/jpeg, image/jpg" name="VR_image_file[]" class="form-control"></td>
                                <td><a onclick="deleteRow(this)" href="javascript:void(0)" class="btn btn-sm" title="Hapus"><i class="fas fa-trash text-danger"></i></a></td>
                            </tr>
                        `;

                        $("#visitimages").append(tabledata);
                    }

                    function addStrategy() {
                        
                         let tabledata = `
                            <tr>
                                <td data-label="Sales Division" width="45%"><textarea name="VR_strategy_sales[]" style="width: 100%; border-radius: 5px; padding: 10px" placeholder="Type here.." id="" rows="5" maxlength="500"></textarea></td>
                                <td data-label="Site CCT" width="50%"><textarea name="VR_strategy_cct[]" style="width: 100%; border-radius: 5px; padding: 10px" placeholder="Type here.." id="" rows="5" maxlength="500"></textarea></td>
                                <td width="5%"><a onclick="deleteRow(this)" href="javascript:void(0)" class="btn btn-sm" title="Hapus"><i class="fas fa-trash text-danger"></i></a></td>
                            </tr>
                        `;

                        $("#visitstrategy").append(tabledata);
                    }

                    $(".format-amount").on('keydown', function(e) {
                       onkeydown_data(e); 
                    });


                    $(".format-amount").on('keyup', function(e) {
                        onkeyup_data(e);
                    });

                    function onkeydown_data(e) {
                        var code = e.keyCode || e.which;
                        // Arrow Up, Arrow Down, Backspace, Tab, Delete, 1 - 9
                        var allowed_keycode = [38, 40, 8, 9, 46, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105];
                        if (!allowed_keycode.includes(code)) {
                            e.preventDefault();
                        }
                    }

                    function onkeyup_data(e) {
                        var code = e.keyCode || e.which;
                        // Arrow Up, Arrow Down, Backspace, Tab, Delete, 1 - 9
                        var allowed_keycode = [38, 40, 8, 9, 46, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105];
                        if (allowed_keycode.includes(code)) {
                            console.log(e, e.target.value);
                            var curr_val = e.target.value;
                            var nominal  = curr_val.replace(",", "");
                            var real_val = formatRupiah(nominal.toString());
                            e.target.value = real_val;
                        }
                    }

                    function formatRupiah(angka){
                        var number_string = angka.replace(/[^,\d]/g, '').toString(),
                        split           = number_string.split(','),
                        sisa            = split[0].length % 3,
                        rupiah          = split[0].substr(0, sisa),
                        ribuan          = split[0].substr(sisa).match(/\d{3}/gi);

                        // tambahkan titik jika yang di input sudah menjadi angka ribuan
                        if(ribuan){
                            separator = sisa ? '.' : '';
                            rupiah += separator + ribuan.join('.');
                        }

                        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                        return rupiah;
                    }
                </script>
            </div>
        </main>
    </div>


    <script src="<?= asset('vendor/js/bootstrap.bundle.min.js') ?>">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"
        integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?= asset('vendor/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= asset('vendor/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
    <script src="<?= asset('vendor/select2/js/select2.min.js') ?>"></script>
    <script src="<?= asset('js/main.js') ?>"></script>

    <script src="<?= asset('vendor/sweetalert2/sweetalert2.all.min.js') ?>"></script>


    <script>
        $(document).ready(function() {
            <?php if($this->session->flashdata('alert')){ ?>
                Swal.fire('<?php echo $this->session->flashdata('alert') ?>');
            <?php unset($_SESSION['alert']); } ?>
        });
         $(function() {
            $('#menu_access').select2({
                theme: 'bootstrap4',
                language: "en",
            });
            $('#close_type').select2({
                theme: 'bootstrap4',
                language: "en",
            });
            $('#collection_type').select2({
                theme: 'bootstrap4',
                language: "en",
            });
        });
    </script>
</body>

</html>