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

    @media(max-width: 600px) {
        .answer {
            margin-left: 0px
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
        font-size: 12px !important;
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

    /* .maps-frame {
        border:2px solid #C1C1C1; 
        border-radius: 10px;
        width: 100%;
        height: 350px;
    } */

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
                        font-size: 12px !important;
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

                    #farmersinfo .cust-btn-add {
                        display: none;
                    }
                    #marketprice .cust-btn-add {
                        display: none;
                    }
                    #visitimages .cust-btn-add {
                        display: none;
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
                        td {
                            font-weight: 600
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
                            margin-bottom: 10px;
                            padding: 10px 15px;
                            border-radius: 8px;
                            background: #e4e4e4;
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
                        #farmersinfo .cust-btn-add {
                            display: block;
                        }
                        #marketprice .cust-btn-add {
                            display: block;
                        }
                        #visitimages .cust-btn-add {
                            display: block;
                        }
                    }
                </style>

<div class="main-content pre-posttest">
    <h3 class="card-title">
        <strong>ATTENDANCE</strong>
    </h3>
    <div class="row">
        <form action="<?= admin_url('attendance/do-attend') ?>" method="POST" enctype="multipart/form-data">
            <div class="content-task mt-5">
                <!-- <h3 class="sub-title">ATTENDANCE CHECK</h3> -->
                <?php if ($this->session->flashdata('error')): ?>
                    <h5><?= $this->session->flashdata('error') ?></h5>
                <?php endif ?>
                <div class="table-responsive">
                    <table class="table table-bordered" style="margin-bottom: 10px">
                        <thead>
                            <tr>
                                <th style="text-align: center">EMPLOYEE</th>
                                <th style="text-align: center">CURRENT DATE</th>
                                <th style="text-align: center">CURRENT TIME</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td data-label="EMPLOYEE">
                                    <?= $user['userSurveyor']['EMPLOYEE_ID'] ?> - <?= $user['userSurveyor']['FULL_NAME'] ?>
                                </td>
                                <td data-label="DATE">
                                    <div id="current-date" style="text-transform: uppercase"></div>
                                </td>
                                <td data-label="CLOCK">
                                    <div id="current-clock"></div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table table-bordered" style="margin-bottom: 10px">
                        <thead>
                            <tr>
                                <th style="text-align: center">CHECK IN</th>
                                <th style="text-align: center">COORDINATE</th>
                                <th style="text-align: center">TAKE SELFIE</th>
                                <th style="text-align: center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($attendance_type == 'CHECK-IN'): ?>
                                <tr>
                                    <td data-label="CHECK-IN">
                                        <div id="check-in"><?= date('Y-m-d H:i:s') ?></div>
                                    </td>
                                    <td data-label="COORDINATE">
                                        <input type="hidden" name="coordinate" id="coordinate_input">
                                        <input type="hidden" name="attend_date" value="<?= $attend_date ?>">
                                        <input type="hidden" name="attend_time" value="<?= date('H:i:s') ?>">
                                        <input type="hidden" name="attend_type" value="check_in">
                                        <div id="coordinate"></div>
                                        <a id="share-location" href="javascript:void(0)" onclick="getLocation()" style="background: #00c0ff; border-radius: 10px; color: #fff; font-weight: 600; padding: 10px">SHARE LOCATION</a>
                                    </td>
                                    <td data-label="TAKE-SELFIE">
                                        <input type="file" name="selfie_in" id="selfie_in" accept="image/*" capture="user" style="display: none">
                                        <img class="selfie-prv" id="selfie_in_prv" src="#" style="display: none"/>
                                    </td>
                                    <td>
                                        <a id="selfie_btn" href="javascript:void(0)" style="background: #00c0ff; border-radius: 10px; color: #fff; font-weight: 600; padding: 10px; display:none">TAKE SELFIE</a>
                                    </td>
                                </tr>
                            <?php elseif($attendance_type == 'CHECK-OUT' || $attendance_type == 'STABLE'): ?>
                                <tr>
                                    <td data-label="CHECK-IN">
                                        <?= $latest_attendance['ATTEND_DATE'].' '.$latest_attendance['TIME_IN'] ?>
                                    </td>
                                    <td data-label="COORDINATE" style="display: flex; align-items: center; flex-direction: column; align-content: center; justify-content: center;">
                                        <?= $latest_attendance['REG_IN_OS'] ?>
                                        <br>
                                        <iframe style="height: 300px; width: 300px; margin-top: 10px" class="maps-frame" src="https://maps.google.com/maps?q=<?= $latest_attendance['REG_IN_OS'] ?>&output=embed" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </td>
                                    <td data-label="TAKE-SELFIE" style="display: flex; align-items: center; flex-direction: column; align-content: center; justify-content: center;">
                                        <?php $path = $latest_attendance['PLANT'].'/'.$latest_attendance['PLANT'].'_'.$latest_attendance['EMPNO'].'_'.$latest_attendance['ATTEND_DATE'].'_IN.jpg'; ?>
                                        <img style="height: 300px; width: 300px; margin-top: 10px; object-fit: contain" class="selfie-prv" src="<?= base_url('uploads/'.$path) ?>" />
                                    </td>
                                    <td></td>
                                </tr>
                            <?php endif ?>
                        </tbody>
                    </table>
                    <?php if ($attendance_type == 'CHECK-OUT' || $attendance_type == 'STABLE'): ?>
                        <br>
                        <table class="table table-bordered" style="margin-bottom: 10px">
                            <thead>
                                <tr>
                                    <th style="text-align: center">CHECK OUT</th>
                                    <th style="text-align: center">COORDINATE</th>
                                    <th style="text-align: center">TAKE SELFIE</th>
                                    <th style="text-align: center">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($attendance_type == 'CHECK-OUT'): ?>
                                    <tr>
                                        <td data-label="CHECK-OUT">
                                            <div id="check-out"><?= $attend_date.' '.date('H:i:s') ?></div>
                                        </td>
                                        <td data-label="COORDINATE">
                                            <input type="hidden" name="coordinate" id="coordinate_input">
                                            <input type="hidden" name="attend_date" value="<?= $attend_date ?>">
                                            <input type="hidden" name="attend_time" value="<?= date('His') ?>">
                                            <input type="hidden" name="attend_type" value="check_out">
                                            <div id="coordinate"></div>
                                            <a id="share-location" href="javascript:void(0)" onclick="getLocation()" style="background: #00c0ff; border-radius: 10px; color: #fff; font-weight: 600; padding: 10px">SHARE LOCATION</a>
                                        </td>
                                        <td data-label="TAKE-SELFIE">
                                            <input type="file" name="selfie_in" id="selfie_in" accept="image/*" capture="user" style="display: none">
                                            <img class="selfie-prv" id="selfie_in_prv" src="#" style="display: none"/>
                                        </td>
                                        <td>
                                            <a id="selfie_btn" href="javascript:void(0)" style="background: #00c0ff; border-radius: 10px; color: #fff; font-weight: 600; padding: 10px; display:none">TAKE SELFIE</a>
                                        </td>
                                    </tr>
                                <?php elseif($attendance_type == 'STABLE'): ?>
                                    <tr>
                                        <td data-label="CHECK-OUT">
                                            <?= $latest_attendance['ATTEND_DATE'].' '.$latest_attendance['TIME_OUT'] ?>
                                        </td>
                                        <td data-label="COORDINATE" style="display: flex; align-items: center; flex-direction: column; align-content: center; justify-content: center;">
                                            <?= $latest_attendance['REG_OUT_OS'] ?>
                                            <br>
                                            <iframe style="height: 300px; width: 300px; margin-top: 10px" class="maps-frame" src="https://maps.google.com/maps?q=<?= $latest_attendance['REG_OUT_OS'] ?>&output=embed" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                        </td>
                                        <td data-label="TAKE-SELFIE" style="display: flex; align-items: center; flex-direction: column; align-content: center; justify-content: center;">
                                            <?php $path = $latest_attendance['PLANT'].'/'.$latest_attendance['PLANT'].'_'.$latest_attendance['EMPNO'].'_'.$latest_attendance['ATTEND_DATE'].'_OUT.jpg'; ?>
                                            <img style="height: 300px; width: 300px; margin-top: 10px; object-fit: contain" class="selfie-prv" src="<?= base_url('uploads/'.$path) ?>" />
                                        </td>
                                        <td></td>
                                    </tr>
                                <?php endif ?>
                            </tbody>
                        </table>
                    <?php endif ?>
                    
                    <div id="check-maps">
                    <!-- <iframe id="maps-checkin" class="maps-frame" src="https://maps.google.com/maps?q=-6.2336281,106.8214081&output=embed" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                    </div>
                </div>
            </div>

            <div class="form-group row mt-5" style="margin: 20px 0px !important">
                <div class="col-lg-12 col-sm-12" style="display: flex; padding: 0px; flex-direction: column">
                    <button id="submit_btn" type="submit" class="btn btn-primary cust-btn-save" style="width: 100%; height: 50px; margin-bottom: 10px; background: #00a65a !important; border: 1px solid #00a65a !important;">SAVE</button>
                    <a href="<?= admin_url('dashboard') ?>" class="btn btn-primary cust-btn-back" style="width: 100%; height: 50px; display: flex; align-items: center; justify-content: center;">DASHBOARD</a>
                    <span style="margin: 5px;"></span>
                   
                </div>
            </div>
        </form>
    </div>
</div>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLUc8QC0GYh5ozbMbGBcNUm1BBIjvmmg8&callback=myMap"></script> -->
<script>
    const coordinate = document.getElementById("coordinate");
    let iframe_gmaps = `<iframe style="height: 300px; width: 300px; margin-top: 10px" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=_googlemap_coordinate_&amp;key=AIzaSyBxty2H-6okfgQqlKcUb_g5qW62W9ocEVw"></iframe>`;

    function getLocation() {
        console.log(navigator.geolocation);
        if (navigator.geolocation) {
            
            navigator.geolocation.watchPosition(showPosition);
        } else { 
            coordinate.innerHTML = "Geolocation is not supported by this browser.";
        }
    }
        
    function showPosition(position) {
        let latitude    = position.coords.latitude;
        let longitude   = position.coords.longitude;
        let coordinate  = latitude + "," + longitude;

        $("#coordinate").text(coordinate);
        $("#coordinate_input").val(coordinate);
        $("#share-location").remove();

        let gmaps_iframe = iframe_gmaps.replace("_googlemap_coordinate_", coordinate);
        $("#check-maps").html(gmaps_iframe);
        selfiePhase();
    }

    function selfiePhase() {
        $("#selfie_btn").show();
    }

    function getMobileOperatingSystem() {
        const userAgent = navigator.userAgent || navigator.vendor || window.opera;

        // Windows Phone must come first because its UA also contains "Android"
        if (/windows phone/i.test(userAgent)) {
            return "Windows Phone";
        }

        if (/android/i.test(userAgent)) {
            return "Android";
        }

        // iOS detection from: http://stackoverflow.com/a/9039885/177710
        if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
            return "iOS";
        }

        return "unknown";
        // return "Android";
    }

    document.getElementById("selfie_btn").addEventListener("click", function() {
        const result = getMobileOperatingSystem();

        // if (result != "unknown"){
            document.getElementById("selfie_in").click();
        // } else {
        //     alert("Error, please use Android/iOS phone and updated browser!");
        // }
    });

    document.getElementById("selfie_in").addEventListener("change", function () {
        console.log('onchange');

        const inputFile = document.getElementById("selfie_in");
        const btnSubmit = document.getElementById("submit_btn");
        const imgSelfie = document.getElementById("selfie_in_prv");
        const btnSelfie = document.getElementById("selfie_btn");
        if (inputFile.files.length === 0) {
            btnSubmit.style.display = 'none';
            imgSelfie.style.display = 'none';
            btnSelfie.style.display = 'block';
        } else {
            btnSelfie.style.display = 'none';
            btnSubmit.style.display = 'block';
            imgSelfie.style.display = 'inline-block';

            const [file] = inputFile.files;
            imgSelfie.src = URL.createObjectURL(file);
        }
    });
</script>
<script type='text/javascript'>
    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
    var date = new Date();
    var day = date.getDate();
    var month = date.getMonth();
    var thisDay = date.getDay(),
    thisDay = myDays[thisDay];
    var yy = date.getYear();
    var year = (yy < 1000) ? yy + 1900 : yy;
    document.getElementById('current-date').innerHTML=thisDay + ', ' + day + ' ' + months[month] + ' ' + year;
</script>
<script type="text/javascript">
    function showTime() {
        var a_p = "";
        var today = new Date();
        var curr_hour = today.getHours();
        var curr_minute = today.getMinutes();
        curr_hour = checkTime(curr_hour);
        curr_minute = checkTime(curr_minute);
        document.getElementById('current-clock').innerHTML=curr_hour + ":" + curr_minute;
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }
    setInterval(showTime, 500);
</script>