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
    <style>
        #myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
        }

        #myImg:hover {opacity: 0.7;}


        #myImg2 {

        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
        }

        #myImg2:hover {opacity: 0.7;}

        /* The Modal (background) */
        .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1000; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.7); /* Black w/ opacity */
        }

        /* Modal Content (image) */
        .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        }

        /* Caption of Modal Image */
        #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
        }

        /* Add Animation */
        .modal-content, #caption {  
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
        from {-webkit-transform:scale(0)} 
        to {-webkit-transform:scale(1)}
        }

        @keyframes zoom {
        from {transform:scale(0)} 
        to {transform:scale(1)}
        }

        /* The Close Button */
        .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
        }

        .close:hover,
        .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px){
        .modal-content {
        width: 100%;
        }
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
                </style>
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
                    line-height: 25px
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

                @media(max-width: 600px) {
                    .answer {
                        margin-left: 0px
                    }

                    .wrapper-reason .col-item {
                        grid-column: span 8 !important;
                    }

                    input {
                        margin-right: 10px !important
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
                        text-align: right;
                        padding-left: 50%;
                        position: relative;
                        white-space: normal !important;
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
                .h-it {
                    height: 100px
                }
            </style>

            <style type="text/css">
                @media print {
                    body * {
                        visibility: hidden; 
                        print-color-adjust: exact !important;
                        -webkit-print-color-adjust: exact !important;
                        font-size: 8px !important
                    }

                    .buttons {
                        visibility: hidden !important; // To hide 
                    }

                    .main-content * {
                        visibility: visible; // Print only required part
                        -webkit-print-color-adjust: exact !important;
                        print-color-adjust: exact !important;
                        width: 100%;
                        background: white;
                        margin: 0 auto;
                        margin-bottom: 0.5cm;
                        box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
                    }
                    .imageshow {
                        display: block;
                    }
                    .wrap-brf {
                        width: 100%
                    }
                    .box-drf-1 {
                        width: 55%
                    }
                    .box-drf-2 {
                        width: 45%
                    }
                    table {
                        width: 100%;
                        table-layout: fixed;
                    }
                    .th-drf {
                        background-color: #E6E6E6;
                        -webkit-print-color-adjust: exact !important;
                        width: 33,33333333333333% !important;
                    }
                    .td-drf {
                        height: 80px;
                    }
                    .main-content[size="A4"] {  
                        width: 21cm;
                        height: 29.7cm; 
                    }
                    .page-wrapper .main-content {
                        margin-top: 0px !important;
                    }
                    .h-it {
                        height: 70px
                    }
                    .card-title {
                        font-size: 14px !important
                    }
                    .print-hidden {
                        display: none;
                    }
                    th, td {
                        padding: 0px 10px !important;
                        flex-wrap: wrap;
                    }
                }
            </style>

    <div class="main-content pre-posttest">
        
        <div class="row">
        <div class="content-task">
            <h3 class="sub-title" style="text-align: center; line-height: 20px">Visit Report for Stop Customer / Laporan Kunjungan Untuk Stop Customer</h3>
                    <h3 class="sub-title">1. Customer Information / Informasi Customer</h3>
                    <div class="table-responsive mt-2">
                        <table class="table table-bordered" style="margin-bottom: 0px">
                            <thead>
                                <tr>
                                    <th style="text-align: center">Visiting No</th>
                                    <th style="text-align: center">Visiting Date</th>
                                    <th style="text-align: center">Plant</th>
                                    <!-- <th style="text-align: center">Customer</th>
                                    <th style="text-align: center">Region</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-label="Visiting No"><?= $vr['VISITING_NO'] ?></td>
                                    <td data-label="Visiting Date"><?= date('Y-m-d', strtotime($vr['VISITING_DATE'])) ?></td>
                                    <td data-label="Plant"><?= $vr['COMPANY_NAME'] ?></td>
                                    <!-- <td data-label="Customer"><?= $vr['CUSTOMER'].' - '.$vr['CUSTOMER_NAME'] ?></td>
                                    <td data-label="Region"><?= empty($vr['REGION_NAME']) ? '-' : $vr['REGION_NAME'] ?></td> -->
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive " style="margin-top: 10px">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <!-- <th style="text-align: center">Site</th> -->
                                    <th style="text-align: center">Group Code / Kode Grup</th>
                                    <th style="text-align: center">Customer Name / Nama Customer</th>
                                    <th style="text-align: center">Type / Jenis</th>
                                    <th style="text-align: center">Owner Name / Nama Owner</th>
                                    <th style="text-align: center">Contact Number / Nomor Kontak</th>
                                    <th style="text-align: center">Address / Alamat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <!-- <td data-label="Site"><?= $vr['COMPANY_CODE'] ?></td> -->
                                    <td data-label="Group Code"><?= $vr['CUSTOMER'] ?></td>
                                    <td data-label="Customer Name"><?= $vr['CUSTOMER_NAME'] ?></td>
                                    <td data-label="Type"><?= $vr['SALES_OFFICE_NAME'] ?></td>
                                    <td data-label="Owner"><?= $vr['CHIEF'] ?></td>
                                    <td data-label="Contact"><?= $vr['TELEPHONE_2'] ?></td>
                                    <td data-label="Address"><?= $vr['STREET'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="content-task mt-5">
                    <h3 class="sub-title">2. Transaction Information / Informasi Transaksi</h3>
                    <div class="table-it">
                        <div class=" table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                        <th>Open Date / Tanggal Open (Registration) <span class="text-danger">*</span></th>
                                        <th>Stop Date / Tanggal Stop <span class="text-danger">*</span></th>
                                        <th>Stop Type <span class="text-danger">*</span></th>
                                        <th>Stop AR <span class="text-danger">*</span></th>
                                        <th>Current AR / AR Saat ini <span class="text-danger">*</span></th>
                                        <th>Collateral Amount / Jumlah Jaminan <span class="text-danger">*</span></th>
                                        <th>Collection Type / Tipe <span class="text-danger">*</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-label="Open Date">
                                        <?= $vr['TRANSDATE_OPEN'] != '19700101' ? date('Y-m-d', strtotime($vr['TRANSDATE_OPEN'])) : ''  ?>
                                    </td>
                                    <td data-label="Close Date">
                                        <?= $vr['TRANSDATE_CLOSE'] != '19700101' ? date('Y-m-d', strtotime($vr['TRANSDATE_CLOSE'])) : ''  ?>
                                    </td>
                                    <td data-label="Stop Type">
                                        <?= $vr['CLOSE_TYPE'] ?>
                                    </td>
                                    <td data-label="Stop AR">
                                        Rp <?= formatRupiah($vr['AR_STOP']) ?>
                                    </td>
                                    <td data-label="Current AR">
                                        Rp <?= formatRupiah($vr['AR_CURRENT']) ?>
                                    </td>
                                    <td data-label="Collateral Amount">
                                        Rp <?= formatRupiah($vr['COLLATERAL_AMT']) ?>
                                    </td>
                                    <td data-label="Collection Type">
                                        <?= $vr['COLLECTION_TYPE'] ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                        
                        <div class="wrapper-reason">
                            <div class="col-item table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th colspan="4" class="text-desktop" style="background-color: #E6E6E6; height: 40px !important">Person in Charge When Open / Penanggung Jawab ketika Open</th>
                                    </tr>
                                        <tr class="ts-asm">
                                            <th style="background-color: #E6E6E6;">TS <span class="text-danger">*</span></th>
                                            <th style="background-color: #E6E6E6;">ASM <span class="text-danger">*</span></th>
                                            <th style="background-color: #E6E6E6;">GSM <span class="text-danger">*</span></th>
                                            <th style="background-color: #E6E6E6;">Site CCT <span class="text-danger">*</span></th>
                                        </tr>
                                        <tr style="vertical-align: middle !important">
                                            <th class="text-mobile">Person in Charge When Open</th>
                                        </tr>
                                        <tr>
                                            <td data-label="TS" class="h-it">
                                                <?= $vr['PIC_OPEN_TS_NAME'] ?>
                                            </td>
                                            <td data-label="ASM" class="h-it">
                                                <?= $vr['PIC_OPEN_ASM_NAME'] ?>
                                            </td>
                                            <td data-label="GSM" class="h-it">
                                                <?= $vr['PIC_OPEN_GSM_NAME'] ?>
                                            </td>
                                            <td data-label="Site CCT" class="h-it">
                                                <?= $vr['PIC_OPEN_CCT_NAME'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th colspan="4" class="text-desktop" style="text-align: left; padding: 5px; background-color: #E6E6E6; height: 35px !important">*Stop Reason / Alasan Stop (by TS)</th>
                                        </tr>
                                        <tr style="vertical-align: middle !important">
                                            <th class="text-mobile" style="font-size: 12px !important">*Stop Reason</th>
                                        </tr>
                                        <tr>
                                            <td colspan="4" style="height:150px; max-height: 150px; text-align: left; vertical-align: text-top;">
                                                <?= $vr['STOPAGE_REASON'] ?>
                                            </td>
                                        </tr>
                                
                                </table>
                            </div>
                            <div class="col-item table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th colspan="4" class="text-desktop" style="background-color: #E6E6E6; height: 40px !important">Person in Charge When Stop / Penanggung Jawab ketika Stop</th>
                                    </tr>
                                        <tr class="ts-asm">
                                            <th style="background-color: #E6E6E6;">TS <span class="text-danger">*</span></th>
                                            <th style="background-color: #E6E6E6;">ASM <span class="text-danger">*</span></th>
                                            <th style="background-color: #E6E6E6;">GSM <span class="text-danger">*</span></th>
                                            <th style="background-color: #E6E6E6;">Site CCT <span class="text-danger">*</span></th>
                                        </tr>
                                        <tr style="vertical-align: middle !important">
                                            <th class="text-mobile">Person in Charge When Stop</th>
                                        </tr>
                                        <tr>
                                            <td data-label="TS" class="h-it">
                                                <?= $vr['PIC_CLOSE_TS_NAME'] ?>
                                            </td>
                                            <td data-label="ASM" class="h-it">
                                                <?= $vr['PIC_CLOSE_ASM_NAME'] ?>
                                            </td>
                                            <td data-label="GSM" class="h-it">
                                                <?= $vr['PIC_CLOSE_GSM_NAME'] ?>
                                            </td>
                                            <td data-label="Site CCT" class="h-it">
                                                <?= $vr['PIC_CLOSE_CCT_NAME'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th colspan="4" class="text-desktop" style="text-align: left; padding: 5px; background-color: #E6E6E6; height: 35px !important">*Expense not finish yet / Biaya belum diselesaikan</th>
                                        </tr>
                                        <tr style="vertical-align: middle !important">
                                            <th class="text-mobile" style="font-size: 12px !important">*Expense not finish yet</th>
                                        </tr>
                                        <tr>
                                            <td colspan="4"style="height:150px; max-height: 150px; text-align: left; vertical-align: text-top;">
                                                <?= $vr['PENDING_FEE_STATUS'] ?>
                                            </td>
                                        </tr>
                                </table>
                            </div>
                        </div>
                        <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="9" class="text-desktop" style="text-align: left; height: 40px !important;">Collateral still not obtained / Informasi Aset Jaminan yang sudah didapat dan belum didapat</th>
                                </tr>
                                
                                <tr>
                                    <th colspan="9" class="text-desktop"  style="text-align: left; background: #fff; border: 0px">Company Guarantee / Jaminan Perusahaan <span class="text-danger">*</span></th>
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
                                        </tr>
                            </thead>
                            <tbody>
                                <tr style="vertical-align: middle !important">
                                    <th class="text-mobile" style="font-size: 12px !important">Collateral still not obtained</th>
                                </tr>
                                <tr style="vertical-align: middle !important">
                                    <th class="text-mobile" style="font-size: 12px !important">Company Guarantee</th>
                                </tr>
                                <?php if (!empty($vr_assets)): ?>
                                    <?php foreach ($vr_assets as $v): ?>    
                                        <?php if ($v['CLASS1'] == 'CG'): ?>
                                            <tr>
                                                <td data-label="Classification"><?= $v['CLASS2'] ?></td>
                                                <td data-label="Type"><?= $v['ASSET_TYPE'] ?></td>
                                                <td data-label="Size"><?= $v['ASSET_SIZE'] ?></td>
                                                <td data-label="Value of Collateral"><?= formatRupiah($v['ASSET_VALUE']) ?></td>
                                                <td data-label="Asset Address"><?= $v['ASSET_ADDRESS'] ?></td>
                                                <td data-label="Doc. Certificate"><?= $v['DOCS_CERTIFICATE'] ?></td>
                                                <td data-label="Doc. SPPJ"><?= $v['DOCS_SPPJ'] ?></td>
                                                <td data-label="Doc. HT"><?= $v['DOCS_HT'] ?></td>
                                                <td data-label="Doc. Others"><?= $v['DOCS_OTHERS'] ?></td>
                                            </tr>
                                        <?php endif ?>
                                    <?php endforeach ?>

                                    <?php else: ?>
                                        <tr>
                                            <td style="text-align: center">There is no data yet</td>
                                        </tr>
                                <?php endif ?>
                            </tbody>
                            <thead>
                                <tr>
                                    <th colspan="9" style="text-align: left; background: #fff; border: 0px">Other Assets / Aset Lainnya <span class="text-danger">*</span></th>
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
                                        </tr>
                            </thead>
                            <tbody>
                                <tr style="vertical-align: middle !important">
                                    <th class="text-mobile" style="font-size: 12px !important">Other Assets</th>
                                </tr>
                                <?php if (!empty($vr_assets)): ?>
                                    <?php foreach ($vr_assets as $v): ?>    
                                        <?php if ($v['CLASS1'] == 'OTH'): ?>
                                            <tr>
                                                <td><?= $v['CLASS2'] ?></td>
                                                <td><?= $v['ASSET_TYPE'] ?></td>
                                                <td><?= $v['ASSET_SIZE'] ?></td>
                                                <td><?= formatRupiah($v['ASSET_VALUE']) ?></td>
                                                <td><?= $v['ASSET_ADDRESS'] ?></td>
                                                <td><?= $v['DOCS_CERTIFICATE'] ?></td>
                                                <td><?= $v['DOCS_SPPJ'] ?></td>
                                                <td><?= $v['DOCS_HT'] ?></td>
                                                <td><?= $v['DOCS_OTHERS'] ?></td>
                                            </tr>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                    <?php else: ?>
                                        <tr>
                                            <td style="text-align: center">There is no data yet</td>
                                        </tr>
                                <?php endif ?>   
                            </tbody>
                        </table>
                        </div>
                        
                    </div>
                </div>

                <div class="content-task mt-5">
                    <h3 class="sub-title">3. Monthly Collection Plan & Other Customer Debt / Rencana Collection Bulanan & Hutang Customer yang lain</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered" style="margin-bottom: 0px">
                            <thead>
                                <tr>
                                    <th colspan="4" style="text-align: left; background: #fff; border: 0px">Monthly Collection Plan per SPPH / Rencana Collection Bulanan per SPPH (Need attach SPPH / Harus lampir SPPH) <span class="text-danger">*</span></th>
                                </tr>
                                <tr>
                                    <th>Year Month / Tahun Bulan</th>
                                        <th>Collection Amount / Jumlah Collection</th>
                                        <th>AR Balance / AR Saldo</th>
                                        <th>Note</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="vertical-align: middle !important">
                                    <th class="text-mobile" style="font-size: 12px !important">Monthly Collection Plan per SPPH</th>
                                </tr>
                                <?php if (!empty($vr_collection_plan)): ?>
                                    <?php foreach ($vr_collection_plan as $v): ?>
                                    <?php $tgl = date('Y-m', strtotime($v['COLLECTION_DATE'])); $pecah = explode("-", $tgl); $bulan = convMonth((int) $pecah[1], TRUE); $coll_date = $bulan.' '.$pecah[0]?>
                                    <tr>
                                        <td data-label="Year/ Month"><?= $coll_date ?></td>
                                        <td data-label="Collection Amount"><?= formatRupiah($v['AMOUNT']) ?></td>
                                        <td data-label="AR Balance"><?= formatRupiah($v['AR_BALANCE']) ?></td>
                                        <td data-label="Note"><?= $v['NOTES'] ?></td>
                                    </tr>
                                    <?php endforeach ?>
                                    <?php else: ?>
                                        <tr>
                                            <td style="text-align: center">There is no data yet</td>
                                        </tr>
                                <?php endif ?>
                            </tbody>                        
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="3" style="text-align: left; background: #fff; border: 0px">Other Customer Debts / Hutang Customer yang lain <span class="text-danger">*</span></th>
                                </tr>
                                <tr>
                                <tr>
                                            <th>Creditors / Kreditor</th>
                                            <th>
                                            Current Debt / Hutang saat ini</th>
                                            <th>Note</th>
                                        </tr>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="vertical-align: middle !important">
                                    <th class="text-mobile" style="font-size: 12px !important">Other Customer Debts</th>
                                </tr>
                                <?php if (!empty($vr_other_debts)): ?>
                                    <?php foreach ($vr_other_debts as $v): ?>
                                    <tr>
                                        <td data-label="Creditors"><?= $v['CREDITOR'] ?></td>
                                        <td data-label="Current Debt"><?= formatRupiah($v['CURRENT_DEBT']) ?></td>
                                        <td data-label="Note"><?= $v['NOTES'] ?></td>
                                    </tr>
                                    <?php endforeach ?>
                                    <?php else: ?>
                                        <tr>
                                            <td style="text-align: center">There is no data yet</td>
                                        </tr>
                                <?php endif ?>
                            </tbody>
                        </table>
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
                                    <th rowspan="2">Date / Tanggal</th>
                                        <th colspan="2">Participant / Peserta</th>
                                        <th rowspan="2">Meeting Location / Lokasi Pertemuan</th>
                                        <th rowspan="2">Meeting Details / Detail isi pertemuan utama</th>
                                        <th rowspan="2">Future plans and opinions for debt collection / Rencana masa depan dan opini tentang collection BD</th>
                                        <!-- <th rowspan="2">Action</th> -->
                                    </tr>
                                    <tr>
                                        <th>CJ</th>
                                        <th>Customer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if (!empty($vr_details)): ?>
                                    <?php foreach ($vr_details as $v): ?>
                                    <tr>
                                        <td data-label="Date"><?= date('Y-m-d', strtotime($v['VISIT_DATE'])) ?></td>
                                        <td data-label="CJ"><?= $v['PARTICIPANT_CJ'] ?></td>
                                        <td data-label="Customer"><?= $v['PARTICIPANT_CUST'] ?></td>
                                        <td data-label="Meeting location"><?= $v['LOCATION'] ?></td>
                                        <td data-label="Meeting details"><?= $v['DESCRIPTION'] ?></td>
                                        <td data-label="Future plans and opinions for debt collection"><?= $v['COLLECTION_BD_OPINION'] ?></td>
                                    </tr>
                                    <?php endforeach ?>
                                    <?php else: ?>
                                        <tr>
                                            <td style="text-align: center">There is no data yet</td>
                                        </tr>
                                <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="content-task mt-5" style="height: auto">
                    <h3 class="sub-title">5. Strategy / Strategi</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="2" class="text-desktop">Collection Stop Balance Strategy & Collaboration Plan / Strategi Collection Stop Saldo & Rencana Kerjasama</th>
                                </tr>
                                <tr>
                                    <th>Sales Division / Divisi Sales</th>
                                    <th>Site CCT</th>
                                </tr>
                            </thead>
                            <tbody id="visitstrategy">
                                <!-- <tr style="vertical-align: middle !important">
                                    <th class="text-mobile" style="font-size: 12px !important">Collection Stop Balance Strategy & Collaboration Plan</th>
                                </tr> -->
                                <?php if (!empty($vr['STRATEGY_SALES']) || !empty($vr['STRATEGY_CCT'])): ?>
                                    <tr>
                                        <td data-label="Sales Division"><?= $vr['STRATEGY_SALES'] ?></td>
                                        <td data-label="Site CCT"><?= $vr['STRATEGY_CCT'] ?></td>
                                    </tr>
                                <?php endif ?>
                                <?php if (!empty($vr_strategy)): ?>
                                    <?php foreach ($vr_strategy as $v): ?>
                                        <tr>
                                            <td data-label="Sales Division"><?= $v['STRATEGY_SALES'] ?></td>
                                            <td data-label="Site CCT"><?= $v['STRATEGY_CCT'] ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                    <?php else: ?>
                                        <tr>
                                            <td style="text-align: center">There is no data yet</td>
                                        </tr>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="content-task mt-5">
                    <h3 class="sub-title">6. Visit Photos</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <!-- <thead>
                                <tr>
                                    <td colspan="5">Photo / Gambar</td>
                                </tr>
                            </thead> -->
                            <tbody>
                            <tr style="vertical-align: middle !important">
                                    <th class="text-mobile" style="font-size: 12px !important">Photos</th>
                                </tr>
                                <?php $tot = [1,2,3,4,5,6,7,8]; ?>
                                <?php if (!empty($vr_galleries)): ?>
                                    <?php $no = 1; foreach ($vr_galleries as $v): ?>
                                        <?php if ($no == 1): ?>
                                            <tr>
                                        <?php endif ?>
                                            <td style="text-align: center;">
                                                <!-- <img id="myImg" class="imageshow" src="<?= base_url('upload/'.$v['IMAGE_FILENAME']) ?>" alt="" style="height: 170px; width: 170px; object-fit: cover;"> -->
                                                <a class="buttons" href="<?= base_url('upload/'.$v['IMAGE_FILENAME']) ?>" data-lightbox="mygallery">
                                                    <img src="<?= base_url('upload/'.$v['IMAGE_FILENAME']) ?>" alt="" style="height: 170px; width: 170px; object-fit: cover">
                                                </a>
                                                <br><br>
                                                <?= $v['IMAGE_NAME'] ?>
                                                <br>
                                                <?= date('Y-m-d', strtotime($vr['CREATED_AT'])) ?>
                                            </td>
                                        <?php if ($no == 5): ?>
                                            </tr>
                                            <?php $no = 0; ?>
                                        <?php endif ?>
                                    <?php $no++; endforeach ?>
                                <?php endif ?>
                            </tbody>
                        
                        </table>
                    </div>
                </div>
        </div>
    </div>

        


            </div>
    </main>
    
</div>
    <!-- The Modal -->
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img id="modal-img" class="modal-content"  src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQS2ol73JZj6-IqypxPZXYS3rRiPwKteoD8vezk9QsRdkjt3jEn&usqp=CAU">
        <!-- <div id="caption"></div> -->
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
    <script src="<?= asset('vendor/lightbox2/dist/js/lightbox-plus-jquery.min.js') ?>"></script>
    <script src="<?= asset('vendor/sweetalert2/sweetalert2.all.min.js') ?>"></script>
    <script>
        // toggle sidebar
        $nav = $('.main-nav');
        $header = $('.page-main-header');
        $toggle_nav_top = $('#sidebar-toggle');
        $toggle_nav_top.click(function() {
        $this = $(this);
        $nav = $('.main-nav');
        $nav.toggleClass('close_icon');
        $header.toggleClass('close_icon');
        });

        $( window ).resize(function() {
        $nav = $('.main-nav');
        $header = $('.page-main-header');
        $toggle_nav_top = $('#sidebar-toggle');
        $toggle_nav_top.click(function() {
            $this = $(this);
            $nav = $('.main-nav');
            $nav.toggleClass('close_icon');
            $header.toggleClass('close_icon');
        });
        });
    </script>

    <script>
        /* When the user clicks on the button, 
        toggle between hiding and showing the dropdown content */
        function newCusto() {
        document.getElementById("myDropdownNew").classList.toggle("show");
        }
        
        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
        if (!event.target.matches('.dropbtn-new')) {
            var dropdownsNew = document.getElementsByClassName("dropdown-content-new");
            var i;
            for (i = 0; i < dropdownsNew.length; i++) {
            var openDropdownNew = dropdownsNew[i];
            if (openDropdownNew.classList.contains('show')) {
                openDropdownNew.classList.remove('show');
            }
            }
        }
        }
    </script>
    <script>
        /* When the user clicks on the button, 
        toggle between hiding and showing the dropdown content */
        function ddNotification() {
        document.getElementById("myddNotification").classList.toggle("show");
        }
        
        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
        if (!event.target.matches('.dropbtn-notification')) {
            var dropdownsNotification = document.getElementsByClassName("dropdown-content-notification");
            var i;
            for (i = 0; i < dropdownsNotification.length; i++) {
            var openddNotification = dropdownsNotification[i];
            if (openddNotification.classList.contains('show')) {
                openddNotification.classList.remove('show');
            }
            }
        }
        }
    </script>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        // var img = document.getElementById("myImg");
        var modalImg = document.getElementById("modal-img");
        var captionText = document.getElementById("caption");
        // img.onclick = function(){
        //   modal.style.display = "block";
        //   modalImg.src = this.src;
        //   captionText.innerHTML = this.alt;
        // }


        document.addEventListener("click", (e) => {
        const elem = e.target;
        if (elem.id==="myImg") {
            modal.style.display = "block";
            modalImg.src = elem.dataset.biggerSrc || elem.src;
            captionText.innerHTML = elem.alt; 
        }
        })

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() { 
        modal.style.display = "none";
        }
    </script>

    <script>
        /* When the user clicks on the button, 
        toggle between hiding and showing the dropdown content */
        function ddProfile() {
        document.getElementById("myddProfile").classList.toggle("show");
        }
            
            // Close the dropdown if the user clicks outside of it
            window.onclick = function(event) {
            if (!event.target.matches('.dd-profile')) {
                var dropdownsProfile = document.getElementsByClassName("dropdown-content-profile");
                var i;
                for (i = 0; i < dropdownsProfile.length; i++) {
                var openddProfile = dropdownsProfile[i];
                if (openddProfile.classList.contains('show')) {
                    openddProfile.classList.remove('show');
                }
                }
            }
        }
    </script>

    <script>
        function sidebar_open() {
            var sideNav = document.getElementById("myNav");
            var mainNav = document.getElementById("main");
            document.getElementById("sidebarClose").style.display = "block";
            document.getElementById("sidebarOpen").style.display = "none";
            mainNav.classList.remove("close-main");
            mainNav.classList.add("open-main");
            sideNav.classList.remove("close-nav");
            sideNav.classList.add("open-nav");
            console.log('In Open');
        }
        function sidebar_close() {
            var sideNav = document.getElementById("myNav");
            var mainNav = document.getElementById("main");
            document.getElementById("sidebarOpen").style.display = "block";
            document.getElementById("sidebarClose").style.display = "none";
            mainNav.classList.remove("open-main");
            mainNav.classList.add("close-main");
            sideNav.classList.remove("open-nav");
            sideNav.classList.add("close-nav");
            console.log('In Close');
        }
    </script>
    <script>
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
                this.classList.toggle("active-dropdown");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
                } else {
                dropdownContent.style.display = "block";
                }
            });
        }

        $(function () {
            $(".dropdown-btn").click(function (e) {
                e.preventDefault();
                $(".bx.bx-chevron-right").toggleClass("active-arrow");
            });
        });
    </script>

    <script>
         $(function() {
            $('#menu_access').select2({
                theme: 'bootstrap4',
                language: "en",
                // ajax: {
                //     url: "{{ route('roles.select') }}",
                //     dataType: 'json',
                //     delay: 250,
                //     processResults: function(data) {
                //         return {
                //             results: $.map(data, function(item) {
                //                 return {
                //                     text: item.name,
                //                     id: item.id
                //                 }
                //             })
                //         };
                //     }
                // }
            });
            $('#close_type').select2({
                theme: 'bootstrap4',
                language: "en",
                // ajax: {
                //     url: "{{ route('roles.select') }}",
                //     dataType: 'json',
                //     delay: 250,
                //     processResults: function(data) {
                //         return {
                //             results: $.map(data, function(item) {
                //                 return {
                //                     text: item.name,
                //                     id: item.id
                //                 }
                //             })
                //         };
                //     }
                // }
            });
            $('#collection_type').select2({
                theme: 'bootstrap4',
                language: "en",
                // ajax: {
                //     url: "{{ route('roles.select') }}",
                //     dataType: 'json',
                //     delay: 250,
                //     processResults: function(data) {
                //         return {
                //             results: $.map(data, function(item) {
                //                 return {
                //                     text: item.name,
                //                     id: item.id
                //                 }
                //             })
                //         };
                //     }
                // }
            });
        });
    </script>
</body>

</html>