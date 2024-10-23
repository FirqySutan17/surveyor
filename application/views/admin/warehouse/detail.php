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

    .maps-frame {
        border:2px solid #C1C1C1; 
        border-radius: 10px;
        width: 100%;
        height: 350px;
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

    #corninfo .cust-btn-add {
        display: none;
    }
    #segment .cust-btn-add {
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
        #corninfo .cust-btn-add {
            display: block;
        }
        #segment .cust-btn-add {
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
        <strong>DETAIL WAREHOUSE</strong>
    </h3>
    <div class="row" style="align-items: center; justify-content: center; min-height: 80vh">
        <form class="form-category"  action="<?= admin_url('warehouse/do_update') ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="wh_no" value="<?= $detail['WAREHOUSE']['WH_NO'] ?>">
            <div class="content-task">
                <h3 class="sub-title">1. WAREHOUSE INFORMATION</h3>
                <div class="table-responsive mt-2">
                    <table class="table table-bordered" style="margin-bottom: 0px">
                        <thead>
                            <tr>
                                <th style="text-align: left">DATE</th>
                                <th style="text-align: left">NAME</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td data-label="DATE">
                                    <?= date('Y-m-d', strtotime($detail['WAREHOUSE']['WH_DATE'])) ?>
                                </td> 
                                <td data-label="NAME">
                                    <?= $detail['WAREHOUSE']['WAREHOUSE_NAME'] ?>
                                </td> 
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered" style="margin-bottom: 0px">
                        <thead>
                            <tr>
                                <th style="text-align: left">PROVINCE</th>
                                <th style="text-align: left">REGENCIES</th>
                                <th style="text-align: left">DISTRICTS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td data-label="PROVINCE">
                                    <?= $detail['WAREHOUSE']['PROVINCE_NAME'] ?>
                                </td>
                                <td data-label="REGENCIES">
                                    <?= $detail['WAREHOUSE']['REGENCY_NAME'] ?>
                                </td>
                                <td data-label="DISTRICTS">
                                    <?= $detail['WAREHOUSE']['DISTRICT_NAME'] ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered" style="margin-bottom: 0px">
                        <thead>
                            <tr>
                                <th colspan="4" style="text-align: center">STOCK WAREHOUSE</th>
                            </tr>
                            <tr>
                                <th style="text-align: center">SILO</th>
                                <th style="text-align: center">FLAT WH</th>
                                <th style="text-align: center">LANTAI JEMUR</th>
                                <th style="text-align: center">DRYER</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td data-label="STOCK SILO">
                                    <?= number_format($detail['WAREHOUSE']['STOCK_SILO'])  ?>
                                </td>
                                <td data-label="STOCK FLAT WH">
                                    <?= number_format($detail['WAREHOUSE']['STOCK_FLAT']) ?>
                                </td>
                                <td data-label="STOCK LANTAI JEMUR">
                                    <?= number_format($detail['WAREHOUSE']['STOCK_LJ']) ?>
                                </td>
                                <td data-label="STOCK DRYER">
                                    <?= number_format($detail['WAREHOUSE']['STOCK_DRYER']) ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered" style="margin-bottom: 0px">
                        <thead>
                            <tr>
                                <th colspan="2" style="text-align: center">DAILY RECEIVE</th>
                                <th colspan="2" style="text-align: center">BUYING PRICE</th>
                            </tr>
                            <tr>
                                <th style="text-align: center">15%</th>
                                <th style="text-align: center">17%</th>
                                <th style="text-align: center">15%</th>
                                <th style="text-align: center">17%</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td data-label="DAILY RECEIVE 15%">
                                    <?= number_format($detail['WAREHOUSE']['DAILY_15']) ?>
                                </td>
                                <td data-label="DAILY RECEIVE 17%">
                                    <?= number_format($detail['WAREHOUSE']['DAILY_17']) ?>
                                </td>
                                <td data-label="BUYING PRICE 15%">
                                    <?= number_format($detail['WAREHOUSE']['BUYING_15']) ?>
                                </td>
                                <td data-label="BUYING PRICE 17%">
                                    <?= number_format($detail['WAREHOUSE']['BUYING_17']) ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered" style="margin-bottom: 0px">
                        <thead>
                            <tr>
                                <th colspan="2" style="text-align: center">SALES</th>
                                <th rowspan="2" colspan="2" style="text-align: center">SALES PRICE</th>
                            </tr>
                            <tr>
                                <th style="text-align: center">TRADERS</th>
                                <th style="text-align: center">FEEDMILL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td data-label="TRADERS">
                                    <?= number_format($detail['WAREHOUSE']['SALES_TRADERS']) ?>
                                </td>
                                <td data-label="FEEDMILL">
                                    <?= number_format($detail['WAREHOUSE']['SALES_FEEDMILL']) ?>
                                </td>
                                <td colspan="2" data-label="SALES PRICE">
                                    <?= number_format($detail['WAREHOUSE']['SALES_PRICE']) ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered" style="margin-bottom: 0px">
                        <thead>
                            <tr>
                                <th style="text-align: left">REMARKS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td data-label="REMARKS">
                                    <?= $detail['WAREHOUSE']['DESCRIPT'] ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="content-task mt-5">
                <h3 class="sub-title">2. ORIGIN JAGUNG</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                
                                <tr>
                                    <th>REGION</th>
                                    <th>AMOUNT (TON)</th>
                                    <!-- <th></th> -->
                                </tr>
                            </thead>
                            <tbody id="corninfo">
                                <?php if(!empty($detail['WAREHOUSE_CORN'])): ?>
                                    <?php foreach($detail['WAREHOUSE_CORN'] as $sf): ?>
                                        <tr>
                                            <td data-label="REGION" width="50%" style="text-transform: uppercase"><?= $sf['REGION'] ?></td>
                                            <td data-label="AMOUNT (TON)" width="50%"><?= number_format($sf['AMOUNT_TON']) ?></td>
                                            <!-- <td width="5%"><a onclick="deleteRow(this)" href="javascript:void(0)" class="btn btn-sm" title="Hapus"><i class="fas fa-trash text-danger"></i></a></td> -->
                                        </tr>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
            </div>

            <div class="content-task mt-5">
                <h3 class="sub-title">3. SURVEY IMAGES</h3>
                <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                
                                <tr>
                                    <th>TITLE</th>
                                    <th>UPLOAD IMAGE</th>
                                    <!-- <th></th> -->
                                </tr>
                            </thead>
                            <tbody id="surveyimages">
                                <?php if(!empty($detail['WAREHOUSE_IMAGES'])): ?>
                                    <?php foreach($detail['WAREHOUSE_IMAGES'] as $sf): ?>
                                        <tr>
                                            <td data-label="TITLE" width="50%" style="text-transform: uppercase"><?= $sf['IMAGE_TITLE'] ?></td>
                                            <td data-label="AMOUNT (TON)" width="50%"><img src="<?= base_url('upload/'.$sf['IMAGE_FILE']) ?>" alt="" style="height: 170px; width: 170px; object-fit: contain"></td>
                                            <!-- <td width="5%"><a onclick="deleteRow(this)" href="javascript:void(0)" class="btn btn-sm" title="Hapus"><i class="fas fa-trash text-danger"></i></a></td> -->
                                        </tr>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </tbody>
                        </table>
                </div>
            </div>
               
            <div class="form-group row mt-5" style="margin: 20px 0px !important">
                <div class="col-lg-12 col-sm-12" style="display: flex; padding: 0px">
                    <a href="<?= admin_url('warehouse') ?>" class="btn btn-primary cust-btn-back" style="width: 100%; height: 50px; display: flex; align-items: center; justify-content: center;">BACK TO DASHBOARD</a>
                    <!-- <span style="margin: 5px;"></span>
                    <button type="submit" class="btn btn-primary cust-btn-save" style="width: 100%; height: 50px">SAVE</button> -->
                </div>
            </div>
            </form>
    </div>
</div>

<script>

    $('#wh_name').select2({
        theme: 'bootstrap4',
        language: "en",
        placeholder: "- SELECT WAREHOUSE -",
    });

   $('#province').select2({
        theme: 'bootstrap4',
        language: "en",
        placeholder: "- SELECT PROVINCE -",
    });

    $('#regencies').select2({
        theme: 'bootstrap4',
        placeholder: "- SELECT REGENCIES -",
        ajax: {
            url: "<?= base_url('ajax/load/kota') ?>",
            dataType: 'json',
            data: function (params) {
                return {
                q: params.term,
                provinsi: $("#province option:selected").val()
                };
            },
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.ID_REGENCIES + " - " + item.REGENCIES,
                            id: item.ID_REGENCIES
                        }
                    })
                };
            }
        },
        // templateSelection: function (data, container) {
        //     // // Add custom attributes to the <option> tag for the selected option
        //     // $(data.element).attr('data-jsondetail', data.jsondetail);
        //     // return data.text;
        // }
    }).on("select2:select", function (e) {
        // let data = $("#customer_entry option:selected").val();
        // let detaildata = $("#customer_entry option:selected").data('jsondetail');
        // load_datacustomer(detaildata);
    });

    $('#districts').select2({
        theme: 'bootstrap4',
        placeholder: "- SELECT DISTRICTS -",
        ajax: {
            url: "<?= base_url('ajax/load/desa') ?>",
            dataType: 'json',
            data: function (params) {
                return {
                q: params.term,
                kota: $("#regencies option:selected").val()
                };
            },
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.ID_DISTRICTS + " - " + item.DISTRICS,
                            id: item.ID_DISTRICTS
                        }
                    })
                };
            }
        },
        // templateSelection: function (data, container) {
        //     // // Add custom attributes to the <option> tag for the selected option
        //     // $(data.element).attr('data-jsondetail', data.jsondetail);
        //     // return data.text;
        // }
    }).on("select2:select", function (e) {
        // let data = $("#customer_entry option:selected").val();
        // let detaildata = $("#customer_entry option:selected").data('jsondetail');
        // load_datacustomer(detaildata);
    });

    function addCorn() {
        let tabledata = `
        <tr>
            <td data-label="REGION" width="45%"><input type="text" name="region[]" style="width: 100%; padding: 10px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; text-tranform: uppercase" placeholder="EX : DKI JAKARTA" id=""></td>
            <td data-label="AMOUNT (TON)" width="50%"><input  type="text" name="amount_ton[]" style="width: 100%; padding: 10px 10px; border-radius: 5px; text-align: center; border: 1px solid #000" placeholder="0" id=""></td>
            <td width="5%"><a onclick="deleteRow(this)" href="javascript:void(0)" class="btn btn-sm" title="Hapus"><i class="fas fa-trash text-danger"></i></a></td>
        </tr>
        `;

        $("#corninfo").append(tabledata);
    }

    function addImages(data = undefined) {
        if (data == undefined) {
            data = [];
            data.IMAGE_TITLE = '';
            data.IMAGE_FILE = '';
        } else {
            data.IMAGE_TITLE     = checkNull(data.IMAGE_TITLE);
            data.IMAGE_FILE = checkNull(data.IMAGE_FILE);
        }

        let imagefile_load = '';
        if (data.IMAGE_FILE != '') {
            imagefile_load = `
                <img src="<?= base_url('upload/') ?>${data.IMAGE_FILE}" alt="" style="height: 170px; width: 170px; object-fit: cover;margin-bottom:20px">
                <br/>
            `;
        }
        let tabledata = `
            <tr>
                <td><input type="text" name="image_title[]" class="form-control" placeholder="Type here.." value="${data.IMAGE_TITLE}"></td>
                <td>
                    ${imagefile_load}
                    <input type="file" accept="image/png, image/jpeg, image/jpg" name="image_file[]" class="form-control">
                </td>
                <td><a onclick="deleteRow(this)" href="javascript:void(0)" class="btn btn-sm" title="Hapus"><i class="fas fa-trash text-danger"></i></a></td>
            </tr>
        `;

        $("#surveyimages").append(tabledata);
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
</script>
