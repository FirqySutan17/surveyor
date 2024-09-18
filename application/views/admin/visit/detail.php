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
        table thead {
            display: none;
        }
        table, table tbody, table tr, table td {
            display: block;
            width: 100%;
        } 
        table tbody tr td {
            text-align: right;
            padding-left: 50%;
            position: relative;

        }
        table td:before {
            content: attr(data-label);
            position: absolute;
            left:0%;
            width: 50%;
            padding-left: 15px;
            font-weight: 600;
            font-size: 14px;
            text-align: left;
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
                <div class="row wrap-drf">
                    <div class="col-6 box-drf-1"></div>
                    <div class="col-6 box-drf-2">
                        <table class="table table-bordered table-print" style="margin-bottom: 0px">
                            <thead>
                                <tr>
                                    <th class="th-drf">DRF</th>
                                    <th class="th-drf">ADJ</th>
                                    <th class="th-drf">DEC</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="height: 65px; width: 60px"></td>
                                    <td style="height: 65px; width: 60px"></td>
                                    <td style="height: 65px; width: 60px"></td>
                                </tr>
                                <tr>
                                    <td><?= $vr['CREATED_BY_NAME'] ?></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><?= date('d/m/Y', strtotime($vr['CREATED_DATE'])) ?></td>
                                    <td>&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/</td>
                                    <td>&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <h3 class="sub-title">1. Customer Information / Informasi Customer</h3>
                <div class="table-responisve mt-2">
                    <table class="table table-bordered" style="margin-bottom: 0px">
                        <thead>
                            <tr>
                                <th style="text-align: center">Visiting No</th>
                                <th style="text-align: center">Visiting Date</th>
                                <th style="text-align: center">Plant</th>
                                <th style="text-align: center">Customer</th>
                                <th style="text-align: center">Region</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: center" data-label="Visiting No"><?= $vr['VISITING_NO'] ?></td>
                                <td style="text-align: center" data-label="Visiting Date"><?= date('Y-m-d', strtotime($vr['VISITING_DATE'])) ?></td>
                                <td style="text-align: center" data-label="Plant"><?= $vr['COMPANY_NAME'] ?></td>
                                <td style="text-align: center" data-label="Customer"><?= $vr['CUSTOMER'].' - '.$vr['CUSTOMER_NAME'] ?></td>
                                <td style="text-align: center" data-label="Region"><?= empty($vr['REGION_NAME']) ? '-' : $vr['REGION_NAME'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive " style="margin-top: 10px">
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
                        <tbody>
                            <tr>
                                <td style="text-align: center"><?= $vr['COMPANY_CODE'] ?></td>
                                <td style="text-align: center"><?= $vr['CUSTOMER'] ?></td>
                                <td style="text-align: center"><?= $vr['CUSTOMER_NAME'] ?></td>
                                <td style="text-align: center"><?= $vr['SALES_OFFICE_NAME'] ?></td>
                                <td style="text-align: center"><?= $vr['CHIEF'] ?></td>
                                <td style="text-align: center"><?= $vr['TELEPHONE_2'] ?></td>
                                <td style="text-align: center"><?= $vr['STREET'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="content-task mt-5">
                <h3 class="sub-title">2. Transaction Information / Informasi Transaksi</h3>
                <div class="table-it">
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
                                <td>
                                    <?= $vr['TRANSDATE_OPEN'] != '19700101' ? date('Y-m-d', strtotime($vr['TRANSDATE_OPEN'])) : ''  ?>
                                </td>
                                <td>
                                    <?= $vr['TRANSDATE_CLOSE'] != '19700101' ? date('Y-m-d', strtotime($vr['TRANSDATE_CLOSE'])) : '' ?>
                                </td>
                                <td>
                                    <?= $vr['CLOSE_TYPE'] ?>
                                </td>
                                <td>
                                    Rp <?= formatRupiah($vr['AR_STOP']) ?>
                                </td>
                                <td>
                                    Rp <?= formatRupiah($vr['AR_CURRENT']) ?>
                                </td>
                                <td>
                                    Rp <?= formatRupiah($vr['COLLATERAL_AMT']) ?>
                                </td>
                                <td>
                                    <?= $vr['COLLECTION_TYPE'] ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="wrapper-reason">
                        <div class="col-item">
                            <table class="table table-bordered">
                                <tr>
                                    <th colspan="4" style="background-color: #E6E6E6; height: 40px !important">Person in Charge When Registration / Penanggung Jawab ketika Open Registrasi</th>
                                </tr>
                                <?php if ( $_COOKIE['connection'] == 'suja') : ?>
                                    <tr>
                                        <th style="background-color: #E6E6E6;" width="50%">SALES <span class="text-danger">*</span></th>
                                        <th style="background-color: #E6E6E6;" width="50%">Site CCT <span class="text-danger">*</span></th>
                                    </tr>
                                    <tr>
                                        <td class="h-it">
                                            <?= $vr['PIC_OPEN_TS_NAME'] ?>
                                        </td>
                                        <td class="h-it">
                                            <?= $vr['PIC_OPEN_CCT_NAME'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2" style="text-align: left; padding: 5px; background-color: #E6E6E6; height: 35px !important">*Stop Reason / Alasan Stop (by TS)</th>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="height:150px; max-height: 150px; text-align: left; vertical-align: text-top;">
                                            <?= $vr['STOPAGE_REASON'] ?>
                                        </td>
                                    </tr>
                                <?php else : ?>
                                    <tr>
                                        <th style="background-color: #E6E6E6;" width="25%">TS <span class="text-danger">*</span></th>
                                        <th style="background-color: #E6E6E6;" width="25%">ASM <span class="text-danger">*</span></th>
                                        <th style="background-color: #E6E6E6;" width="25%">GSM <span class="text-danger">*</span></th>
                                        <th style="background-color: #E6E6E6;" width="25%">Site CCT <span class="text-danger">*</span></th>
                                    </tr>
                                    <tr>
                                        <td class="h-it">
                                            <?= $vr['PIC_OPEN_TS_NAME'] ?>
                                        </td>
                                        <td class="h-it">
                                            <?= $vr['PIC_OPEN_ASM_NAME'] ?>
                                        </td>
                                        <td class="h-it">
                                            <?= $vr['PIC_OPEN_GSM_NAME'] ?>
                                        </td>
                                        <td class="h-it">
                                            <?= $vr['PIC_OPEN_CCT_NAME'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="4" style="text-align: left; padding: 5px; background-color: #E6E6E6; height: 35px !important">*Stop Reason / Alasan Stop (by TS)</th>
                                    </tr>
                                    <tr>
                                        <td colspan="4" style="height:150px; max-height: 150px; text-align: left; vertical-align: text-top;">
                                            <?= $vr['STOPAGE_REASON'] ?>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                               
                            </table>
                        </div>
                        <div class="col-item">
                            <table class="table table-bordered">
                                <tr>
                                    <th colspan="4" style="background-color: #E6E6E6; height: 40px !important">Person in Charge When Stop / Penanggung Jawab ketika Stop</th>
                                </tr>
                                <?php if ( $_COOKIE['connection'] == 'suja') : ?>
                                    <tr>
                                        <th style="background-color: #E6E6E6;" width="50%">SALES <span class="text-danger">*</span></th>
                                        <th style="background-color: #E6E6E6;" width="50%">Site CCT <span class="text-danger">*</span></th>
                                    </tr>
                                    <tr>
                                        <td class="h-it">
                                            <?= $vr['PIC_CLOSE_TS_NAME'] ?>
                                        </td>
                                        <td class="h-it">
                                            <?= $vr['PIC_CLOSE_CCT_NAME'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2" style="text-align: left; padding: 5px; background-color: #E6E6E6; height: 35px !important">*Expense not finish yet / Biaya belum diselesaikan</th>
                                    </tr>
                                    <tr>
                                        <td colspan="2"style="height:150px; max-height: 150px; text-align: left; vertical-align: text-top;">
                                            <?= $vr['PENDING_FEE_STATUS'] ?>
                                        </td>
                                    </tr>
                                <?php else : ?>
                                    <tr>
                                        <th style="background-color: #E6E6E6;" width="25%">TS <span class="text-danger">*</span></th>
                                        <th style="background-color: #E6E6E6;" width="25%">ASM <span class="text-danger">*</span></th>
                                        <th style="background-color: #E6E6E6;" width="25%">GSM <span class="text-danger">*</span></th>
                                        <th style="background-color: #E6E6E6;" width="25%">Site CCT <span class="text-danger">*</span></th>
                                    </tr>
                                    <tr>
                                        <td class="h-it">
                                            <?= $vr['PIC_CLOSE_TS_NAME'] ?>
                                        </td>
                                        <td class="h-it">
                                            <?= $vr['PIC_CLOSE_ASM_NAME'] ?>
                                        </td>
                                        <td class="h-it">
                                            <?= $vr['PIC_CLOSE_GSM_NAME'] ?>
                                        </td>
                                        <td class="h-it">
                                            <?= $vr['PIC_CLOSE_CCT_NAME'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="4" style="text-align: left; padding: 5px; background-color: #E6E6E6; height: 35px !important">*Expense not finish yet / Biaya belum diselesaikan</th>
                                    </tr>
                                    <tr>
                                        <td colspan="4"style="height:150px; max-height: 150px; text-align: left; vertical-align: text-top;">
                                            <?= $vr['PENDING_FEE_STATUS'] ?>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </table>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th colspan="9" style="text-align: left; height: 40px !important;">Collateral still not obtained / Informasi Aset Jaminan yang sudah didapat dan belum didapat</th>
                            </tr>
                            <tr>
                                <th colspan="9" style="text-align: left; background: #fff; border: 0px">Company Guarantee / Jaminan Perusahaan <span class="text-danger">*</span></th>
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
                            <?php if (!empty($vr_assets)): ?>
                                <?php foreach ($vr_assets as $v): ?>    
                                    <?php if ($v['CLASS1'] == 'CG'): ?>
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
                            <?php endif ?>   
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="content-task mt-5">
                <h3 class="sub-title">3. Monthly Collection Plan & Other Customer Debt / Rencana Collection Bulanan & Hutang Customer yang lain</h3>
                <div>
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
                            <?php if (!empty($vr_collection_plan)): ?>
                                <?php foreach ($vr_collection_plan as $v): ?>
                                <?php $tgl = date('Y-m', strtotime($v['COLLECTION_DATE'])); $pecah = explode("-", $tgl); $bulan = convMonth((int) $pecah[1], TRUE); $coll_date = $bulan.' '.$pecah[0]?>
                                <tr>
                                    <td><?= $coll_date ?></td>
                                    <td><?= formatRupiah($v['AMOUNT']) ?></td>
                                    <td><?= formatRupiah($v['AR_BALANCE']) ?></td>
                                    <td><?= $v['NOTES'] ?></td>
                                </tr>
                                <?php endforeach ?>
                            <?php endif ?>
                        </tbody>                        
                    </table>
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
                            <?php if (!empty($vr_other_debts)): ?>
                                <?php foreach ($vr_other_debts as $v): ?>
                                <tr>
                                    <td><?= $v['CREDITOR'] ?></td>
                                    <td><?= formatRupiah($v['CURRENT_DEBT']) ?></td>
                                    <td><?= $v['NOTES'] ?></td>
                                </tr>
                                <?php endforeach ?>
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
                                    <td><?= date('Y-m-d', strtotime($v['VISIT_DATE'])) ?></td>
                                    <td><?= $v['PARTICIPANT_CJ'] ?></td>
                                    <td><?= $v['PARTICIPANT_CUST'] ?></td>
                                    <td><?= $v['LOCATION'] ?></td>
                                    <td><?= $v['DESCRIPTION'] ?></td>
                                    <td><?= $v['COLLECTION_BD_OPINION'] ?></td>
                                </tr>
                                <?php endforeach ?>
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
                                <th colspan="2">Collection Stop Balance Strategy & Collaboration Plan / Strategi Collection Stop Saldo & Rencana Kerjasama</th>
                            </tr>
                            <tr>
                                <th>Sales Division / Divisi Sales</th>
                                <th>Site CCT</th>
                            </tr>
                        </thead>
                        <tbody id="visitstrategy">
                            <?php if (!empty($vr['STRATEGY_SALES']) || !empty($vr['STRATEGY_CCT'])): ?>
                                <tr>
                                    <td width="50%"><?= $vr['STRATEGY_SALES'] ?></td>
                                    <td width="50%"><?= $vr['STRATEGY_CCT'] ?></td>
                                </tr>
                            <?php endif ?>
                            <?php if (!empty($vr_strategy)): ?>
                                <?php foreach ($vr_strategy as $v): ?>
                                    <tr>
                                        <td width="50%"><?= $v['STRATEGY_SALES'] ?></td>
                                        <td width="50%"><?= $v['STRATEGY_CCT'] ?></td>
                                    </tr>
                                <?php endforeach ?>
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
                            <?php $tot = [1,2,3,4,5,6,7,8]; ?>
                            <?php if (!empty($vr_galleries)): ?>
                                <?php $no = 1; foreach ($vr_galleries as $v): ?>
                                    <?php if ($no == 1): ?>
                                        <tr>
                                    <?php endif ?>
                                        <td>
                                            <img class="imageshow" src="<?= base_url('upload/'.$v['IMAGE_FILENAME']) ?>" alt="" style="height: 170px; width: 170px; object-fit: cover; display:none">
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

            <div class="form-group row mt-5 buttons print-hidden" style="margin: 20px 0px !important">
                <div class="col-lg-12 col-sm-12" style="display: flex; padding: 0px">
                    <a href="<?= admin_url('visit/report') ?>" class="btn btn-primary cust-btn-back" style="width: 50%; height: 50px; display: flex; align-items: center; justify-content: center;">KEMBALI (BACK)</a>
                    <span style="margin: 5px;"></span>
                    <a href="javascript:void(0)" class="btn  btn-danger cust-btn-save" onclick="return window.print()" style="width: 50%; height: 50px; display: flex !important; align-items: center; justify-content: center;">PRINT PDF</a>
                </div>
            </div>
    </div>
</div>

<script src="<?= asset('vendor/lightbox2/dist/js/lightbox-plus-jquery.min.js') ?>"></script>
