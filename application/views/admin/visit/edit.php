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
</style>

<div class="main-content pre-posttest">
    <h3 class="card-title">
        <strong>Visit Update</strong>
    </h3>
    <div class="row">
        <form action="<?= admin_url('visit/do_update') ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="visiting_no" value="<?= $vr['VISITING_NO'] ?>">
            <?php if (!empty($vr_galleries)): ?>
                <?php foreach ($vr_galleries as $vg): ?>
                    <input type="hidden" name="VR_image_filename[]" value="<?= $vg['IMAGE_FILENAME'] ?>">
                <?php endforeach ?>
            <?php endif ?>
            <div class="content-task">
                <h3 class="sub-title">1. Customer Information / Informasi Customer</h3>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group row">
                            <label for="plant" class="col-lg-12 col-sm-12 col-form-label">Visiting No <span class="text-danger">*</span></label>
                            <div class="col-lg-12 col-sm-12">
                                <input type="text" class="form-control" style="font-size: 14px" value="<?= $vr['VISITING_NO'] ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group row">
                            <label for="plant" class="col-lg-12 col-sm-12 col-form-label">Visiting Date <span class="text-danger">*</span></label>
                            <div class="col-lg-12 col-sm-12">
                                <input type="date" name="visiting_date" class="form-control" style="font-size: 14px" value="<?= date('Y-m-d', strtotime($vr['VISITING_DATE'])) ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group row">
                            <label for="plant" class="col-lg-12 col-sm-12 col-form-label">Plant <span class="text-danger">*</span></label>
                            <div class="col-lg-12 col-sm-12">
                                <select id="plant_entry" class="form-control" style="width: 100%;" name="plant" required>
                                    <option value="" selected>- PILIH PLANT -</option>
                                    <?php foreach ($plant as $field): ?>
                                      <option <?= $vr['COMPANY_CODE'] == $field['CODE'] ? 'selected' : ''   ?> value="<?= $field['CODE'] ?>"><?= $field['CODE'].' - '.$field['CODE_NAME'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group row">
                            <label for="customer" class="col-lg-12 col-sm-12 col-form-label">Customer <span class="text-danger">*</span></label>
                            <div class="col-lg-12 col-sm-12">
                                <select id="customer_entry" class="form-control" style="width: 100%;" name="customer" required>
                                    <option data-jsondetail='<?= json_encode($vr) ?>' value="<?= $vr['CUSTOMER'] ?>" selected><?= $vr['CUSTOMER'].' - '.$vr['CUSTOMER_NAME'] ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group row">
                            <label for="customer" class="col-lg-12 col-sm-12 col-form-label">Region</label>
                            <div class="col-lg-12 col-sm-12">
                                <input type="text" id="region_entry" class="form-control" value="<?= $vr['REGION_NAME'] ?>" readonly>
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
                        <tbody id="customerdetail">
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
                                <td>
                                    <input type="date" name="transdate_open" class="form-control" value="<?= date('Y-m-d', strtotime($vr['TRANSDATE_OPEN'])) ?>">
                                </td>
                                <td>
                                    <input type="date" name="transdate_close" class="form-control" value="<?= date('Y-m-d', strtotime($vr['TRANSDATE_CLOSE'])) ?>">
                                </td>
                                <td>
                                    <select id="close_type" class="form-control" style="width: 100%;" name="close_type">
                                        <option <?= $vr['CLOSE_TYPE'] == 'SUKARELA' ? 'selected' : '' ?> value="SUKARELA">SUKARELA</option>
                                        <option <?= $vr['CLOSE_TYPE'] == 'DIPAKSA' ? 'selected' : '' ?> value="DIPAKSA">DIPAKSA</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="ar_stop" class="form-control format-amount" placeholder="0" value="<?= formatRupiah($vr['AR_STOP']) ?>">
                                </td>
                                <td>
                                    <input type="text" name="ar_current" class="form-control format-amount" placeholder="0" value="<?= formatRupiah($vr['AR_CURRENT']) ?>">
                                </td>
                                <td>
                                    <input type="text" name="collateral_amt" class="form-control format-amount" placeholder="0" value="<?= $vr['COLLATERAL_AMT'] ?>">
                                </td>
                                <td>
                                    <select id="collection_type" class="form-control" style="width: 100%;" name="collection_type">
                                        <?php foreach ($collection_type as $name): ?>
                                            <option <?= $vr['COLLECTION_TYPE'] == $name ? 'selected' : '' ?> value="<?= $name ?>"><?= str_replace("_", " ", $name) ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="wrapper-reason">
                        <div class="col-item">
                            <table class="table table-bordered">
                                <tr>
                                    <th colspan="4" style="background-color: #E6E6E6; height: 40px !important">Person in Charge When Registration /  Penanggung Jawab ketika Registrasi</th>
                                </tr>
                                <?php if ( $_COOKIE['connection'] == 'suja') : ?>
                                    <tr>
                                        <th style="background-color: #E6E6E6; width: 50%;">SALES</th>
                                        <th style="background-color: #E6E6E6; width: 50%">SITE CCT</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control pic_sales" style="width: 100%;" name="pic_open_ts">
                                                <?php if (!empty($vr['PIC_OPEN_TS'])): ?>
                                                <option value="<?= $vr['PIC_OPEN_TS'] ?>" selected><?= $vr['PIC_OPEN_TS'].' - '.$vr['PIC_OPEN_TS_NAME'] ?></option>
                                                <?php endif ?>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control pic_sales" style="width: 100%;" name="pic_open_cct">
                                                <?php if (!empty($vr['PIC_OPEN_CCT'])): ?>
                                                <option value="<?= $vr['PIC_OPEN_CCT'] ?>" selected><?= $vr['PIC_OPEN_CCT'].' - '.$vr['PIC_OPEN_CCT_NAME'] ?></option>
                                                <?php endif ?>
                                            </select>
                                        </td>
                                    </tr>
                                <?php else : ?>
                                    <tr>
                                        <th style="background-color: #E6E6E6; width: 50%;">TS</th>
                                        <th style="background-color: #E6E6E6; width: 50%">ASM</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control pic_sales" style="width: 100%;" name="pic_open_ts">
                                                <?php if (!empty($vr['PIC_OPEN_TS'])): ?>
                                                <option value="<?= $vr['PIC_OPEN_TS'] ?>" selected><?= $vr['PIC_OPEN_TS'].' - '.$vr['PIC_OPEN_TS_NAME'] ?></option>
                                                <?php endif ?>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control pic_sales" style="width: 100%;" name="pic_open_asm">
                                                <?php if (!empty($vr['PIC_OPEN_ASM'])): ?>
                                                <option value="<?= $vr['PIC_OPEN_ASM'] ?>" selected><?= $vr['PIC_OPEN_ASM'].' - '.$vr['PIC_OPEN_ASM_NAME'] ?></option>
                                                <?php endif ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="background-color: #E6E6E6; width: 50%">GSM</th>
                                        <th style="background-color: #E6E6E6; width: 50%">Site CCT</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control pic_sales" style="width: 100%;" name="pic_open_gsm">
                                                <?php if (!empty($vr['PIC_OPEN_GSM'])): ?>
                                                <option value="<?= $vr['PIC_OPEN_GSM'] ?>" selected><?= $vr['PIC_OPEN_GSM'].' - '.$vr['PIC_OPEN_GSM_NAME'] ?></option>
                                                <?php endif ?>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control pic_sales" style="width: 100%;" name="pic_open_cct">
                                                <?php if (!empty($vr['PIC_OPEN_CCT'])): ?>
                                                <option value="<?= $vr['PIC_OPEN_CCT'] ?>" selected><?= $vr['PIC_OPEN_CCT'].' - '.$vr['PIC_OPEN_CCT_NAME'] ?></option>
                                                <?php endif ?>
                                            </select>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                               
                                <tr>
                                    <th colspan="4" style="text-align: left; padding: 5px; background-color: #E6E6E6; height: 35px !important">*Stop Reason / Alasan Stop (by TS)</th>
                                </tr>
                                <tr>
                                    <td colspan="4"><textarea name="stopage_reason" style="width: 100%; border-radius: 5px; padding: 10px" placeholder="Type here.." id="" rows="5"><?= $vr['STOPAGE_REASON'] ?></textarea></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-item">
                            <table class="table table-bordered">
                                <tr>
                                    <th colspan="4" style="background-color: #E6E6E6; height: 40px !important">Person in Charge When Stop / Penanggung Jawab ketika Stop</th>
                                </tr>
                                <?php if ( $_COOKIE['connection'] == 'suja') : ?>
                                    <tr>
                                        <th style="background-color: #E6E6E6; width: 50%">SALES</th>
                                        <th style="background-color: #E6E6E6; width: 50%">SITE CCT</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control pic_sales" style="width: 100%;" name="pic_close_ts">
                                                <?php if (!empty($vr['PIC_CLOSE_TS'])): ?>
                                                <option value="<?= $vr['PIC_CLOSE_TS'] ?>" selected><?= $vr['PIC_CLOSE_TS'].' - '.$vr['PIC_CLOSE_TS_NAME'] ?></option>
                                                <?php endif ?>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control pic_sales" style="width: 100%;" name="pic_close_cct">
                                                <?php if (!empty($vr['PIC_CLOSE_CCT'])): ?>
                                                <option value="<?= $vr['PIC_CLOSE_CCT'] ?>" selected><?= $vr['PIC_CLOSE_CCT'].' - '.$vr['PIC_CLOSE_CCT_NAME'] ?></option>
                                                <?php endif ?>
                                            </select>
                                        </td>
                                    </tr>
                                <?php else : ?>
                                    <tr>
                                        <th style="background-color: #E6E6E6; width: 50%">TS</th>
                                        <th style="background-color: #E6E6E6; width: 50%">ASM</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control pic_sales" style="width: 100%;" name="pic_close_ts">
                                                <?php if (!empty($vr['PIC_CLOSE_TS'])): ?>
                                                <option value="<?= $vr['PIC_CLOSE_TS'] ?>" selected><?= $vr['PIC_CLOSE_TS'].' - '.$vr['PIC_CLOSE_TS_NAME'] ?></option>
                                                <?php endif ?>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control pic_sales" style="width: 100%;" name="pic_close_asm">
                                                <?php if (!empty($vr['PIC_CLOSE_ASM'])): ?>
                                                <option value="<?= $vr['PIC_CLOSE_ASM'] ?>" selected><?= $vr['PIC_CLOSE_ASM'].' - '.$vr['PIC_CLOSE_ASM_NAME'] ?></option>
                                                <?php endif ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="background-color: #E6E6E6; width: 50%">GSM</th>
                                        <th style="background-color: #E6E6E6; width: 50%">Site CCT</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control pic_sales" style="width: 100%;" name="pic_close_gsm">
                                                <?php if (!empty($vr['PIC_CLOSE_GSM'])): ?>
                                                <option value="<?= $vr['PIC_CLOSE_GSM'] ?>" selected><?= $vr['PIC_CLOSE_GSM'].' - '.$vr['PIC_CLOSE_GSM_NAME'] ?></option>
                                                <?php endif ?>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control pic_sales" style="width: 100%;" name="pic_close_cct">
                                                <?php if (!empty($vr['PIC_CLOSE_CCT'])): ?>
                                                <option value="<?= $vr['PIC_CLOSE_CCT'] ?>" selected><?= $vr['PIC_CLOSE_CCT'].' - '.$vr['PIC_CLOSE_CCT_NAME'] ?></option>
                                                <?php endif ?>
                                            </select>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                               
                                <tr>
                                    <th colspan="4" style="text-align: left; padding: 5px; background-color: #E6E6E6; height: 35px !important">*Expense not finish yet / Biaya belum diselesaikan</th>
                                </tr>
                                <tr>
                                    <td colspan="4"><textarea name="pending_fee_status" style="width: 100%; border-radius: 5px; padding: 10px" placeholder="Type here.." id="" rows="5"><?= $vr['PENDING_FEE_STATUS'] ?></textarea></td>
                                </tr>
                            </table>
                        </div>
                    </div>
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
                                <th colspan="8" style="text-align: left; background: #fff; border: 0px">Others Asset / Aset Lainnya <span class="text-danger">*</span></th>
                                <th colspan="2" style="text-align: right; background: #fff; border: 0px"><button type="button" class="btn cust-btn-add" onclick="addAssets(1)">+</button></th>
                            </tr>
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
                        </thead>
                        <tbody id="assets2"></tbody>
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
                        <tbody id="collectionplan"></tbody>
                        
                    </table>
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
                        <tbody id="otherdebt"></tbody>
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
                            <tbody id="visitdetail"></tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="content-task mt-5">
                <h3 class="sub-title">5. Strategy / Strategi</h3>
                <!-- <div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Klasifikasi</th>
                                <th>Strategi Collection Stop Saldo & Rencana Kerjasama</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Divisi Sales</td>
                                <td><textarea name="strategy_sales" style="width: 100%; border-radius: 5px; padding: 10px" placeholder="Type here.." id="" rows="5"><?= $vr['STRATEGY_SALES'] ?></textarea></td>
                            </tr>
                            <tr>
                                <td>Site CCT</td>
                                <td><textarea name="strategy_cct" style="width: 100%; border-radius: 5px; padding: 10px" placeholder="Type here.." id="" rows="5"><?= $vr['STRATEGY_CCT'] ?></textarea></td>
                            </tr>
                        </tbody>
                    </table>
                </div> -->
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
                            <?php if (!empty($vr['STRATEGY_SALES']) || !empty($vr['STRATEGY_CCT'])): ?>
                                <tr>
                                    <td width="45%"><textarea name="VR_strategy_sales[]" style="width: 100%; border-radius: 5px; padding: 10px" placeholder="Type here.." id="" rows="5" maxlength="500"><?= $vr['STRATEGY_SALES'] ?></textarea></td>
                                    <td width="50%"><textarea name="VR_strategy_cct[]" style="width: 100%; border-radius: 5px; padding: 10px" placeholder="Type here.." id="" rows="5" maxlength="500"><?= $vr['STRATEGY_CCT'] ?></textarea></td>
                                    <td width="5%"><a onclick="deleteRow(this)" href="javascript:void(0)" class="btn btn-sm" title="Hapus"><i class="fas fa-trash text-danger"></i></a></td>
                                </tr>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="content-task mt-5">
                <h3 class="sub-title">6. Visit Photos</h3>
                <div>
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
                            <tbody id="visitimages"></tbody>
                        </table>
                </div>
            </div>

            <div class="form-group row mt-5" style="margin: 20px 0px !important">
                <div class="col-lg-12 col-sm-12" style="display: flex; padding: 0px">
                    <a href="<?= admin_url('visit/report') ?>" class="btn btn-primary cust-btn-back" style="width: 50%; height: 50px; display: flex; align-items: center; justify-content: center;">Cancel</a>
                    <span style="margin: 5px;"></span>
                    <button type="submit" class="btn btn-primary cust-btn-save" style="width: 50%; height: 50px">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        load_dataEdit();
    });
    function load_dataEdit() {
        var vr_assets = <?= json_encode($vr_assets) ?>;
        var vr_collection_plan = <?= json_encode($vr_collection_plan) ?>;
        var vr_details = <?= json_encode($vr_details) ?>;
        var vr_other_debts = <?= json_encode($vr_other_debts) ?>;
        var vr_galleries = <?= json_encode($vr_galleries) ?>;
        var vr_strategy = <?= json_encode($vr_strategy) ?>;

        if (vr_assets.length > 0) {
            for (var i = 0; i < vr_assets.length; i++) {
                var class1 = vr_assets[i].CLASS1 == 'CG' ? 0 : 1;
                addAssets(class1, vr_assets[i]);
            }
        }

        if (vr_collection_plan.length > 0) {
            for (var i = 0; i < vr_collection_plan.length; i++) {
                addCollectionPlan(vr_collection_plan[i]);
            }
        }

        if (vr_other_debts.length > 0) {
            for (var i = 0; i < vr_other_debts.length; i++) {
                addOtherDebt(vr_other_debts[i]);
            }
        }

        if (vr_details.length > 0) {
            for (var i = 0; i < vr_details.length; i++) {
                addVisitDetail(vr_details[i]);
            }
        }

        if (vr_galleries.length > 0) {
            for (var i = 0; i < vr_galleries.length; i++) {
                addImages(vr_galleries[i]);
            }
        }

        if (vr_strategy.length > 0) {
            for (var i = 0; i < vr_strategy.length; i++) {
                addStrategy(vr_strategy[i]);
            }
        }
    }

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
                <td style="text-align: center">${data.COMPANY_CODE}</td>
                <td style="text-align: center">${data.CUSTOMER}</td>
                <td style="text-align: center">${data.CUSTOMER_NAME}</td>
                <td style="text-align: center">${data.SALES_OFFICE_NAME == null ? '-' : data.SALES_OFFICE_NAME}</td>
                <td style="text-align: center">${data.CHIEF == null ? '-' : data.CHIEF}</td>
                <td style="text-align: center">${data.TELEPHONE_2 == null ? '-' : data.TELEPHONE_2}</td>
                <td style="text-align: center">${data.STREET}</td>
            </tr>
        `;
        $("#customerdetail").html(tabledata);
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

    function checkNull(value, type = 'CHAR') {
        if (type == 'CHAR') {
            return value == null ? '' : value;
        } else if (type == 'INT') {
            return value == null ? '0' : value;
        }
    }

    function addAssets(isOthers = 0, data = undefined) {
        if (data == undefined) {
            data = [];
            data.CLASS2 = '';
            data.ASSET_TYPE = '';
            data.ASSET_SIZE = '';
            data.ASSET_VALUE = '0';
            data.ASSET_ADDRESS = '';
            data.DOCS_CERTIFICATE = '';
            data.DOCS_SPPJ = '';
            data.DOCS_HT = '';
            data.DOCS_OTHERS = '';
        } else {
            if (data.CLASS1 == null) {
                data.CLASS2 = '';
            }
            data.ASSET_TYPE = checkNull(data.ASSET_TYPE);
            data.ASSET_SIZE = checkNull(data.ASSET_SIZE);
            data.ASSET_VALUE = checkNull(data.ASSET_VALUE, 'INT');
            data.ASSET_ADDRESS = checkNull(data.ASSET_ADDRESS);
            data.DOCS_CERTIFICATE = checkNull(data.DOCS_CERTIFICATE);
            data.DOCS_SPPJ = checkNull(data.DOCS_SPPJ);
            data.DOCS_HT = checkNull(data.DOCS_HT);
            data.DOCS_OTHERS = checkNull(data.DOCS_OTHERS);
        }
        let guarantee_data = `
            <select class='form-control' name='assets_class2[]'>
                <option ${data.CLASS2 == 'ASET TIDAK BERGERAK' ? 'selected' : ''} value='ASET TIDAK BERGERAK'>ASET TIDAK BERGERAK</option>
                <option ${data.CLASS2 == 'ASET BERGERAK' ? 'selected' : ''} value='ASET BERGERAK'>ASET BERGERAK</option>
                <option ${data.CLASS2 == 'CEK / GIRO' ? 'selected' : ''} value='CEK / GIRO'>CEK / GIRO</option>
            </select>
        `;
        let others_data = `<input type="text" name="assets_class2[]" class="form-control" value="${data.CLASS2}">`;

        let class2_data = guarantee_data;
        let class1_data = 'CG';
        if (isOthers == 1) { class2_data = others_data; class1_data = 'OTH';}

        let tabledata = `
            <tr>
                <td>${class2_data}</td>
                <td>
                    <input type="hidden" name="assets_class1[]" class="form-control" value='${class1_data}'>
                    <input type="text" name="asset_type[]" class="form-control" value="${data.ASSET_TYPE}">
                </td>
                <td><input type="text" name="asset_size[]" class="form-control" value="${data.ASSET_SIZE}"></td>
                <td><input type="text" name="asset_value[]" class="form-control" onkeyup="onkeyup_data(event)" onkeydown="onkeydown_data(event)" value="${formatRupiah(data.ASSET_VALUE)}"></td>
                <td><input type="text" name="asset_address[]" class="form-control" value="${data.ASSET_ADDRESS}"></td>
                <td><input type="text" name="docs_certificate[]" class="form-control" value="${data.DOCS_CERTIFICATE}"></td>
                <td><input type="text" name="docs_sppj[]" class="form-control" value="${data.DOCS_SPPJ}"></td>
                <td><input type="text" name="docs_ht[]" class="form-control" value="${data.DOCS_HT}"></td>
                <td><input type="text" name="docs_others[]" class="form-control" value="${data.DOCS_OTHERS}"></td>
                <td><a onclick="deleteRow(this)" href="javascript:void(0)" class="btn btn-sm" title="Hapus"><i class="fas fa-trash text-danger"></i></a></td>
            </tr>
        `;

        if (isOthers == 1) { $("#assets2").append(tabledata); }
        else { $("#assets1").append(tabledata); }
    }

    function addCollectionPlan(data = undefined) {
        if (data == undefined) {
            data = [];
            data.COLLECTION_DATE = '';
            data.AMOUNT = '0';
            data.AR_BALANCE = '0';
            data.NOTES = '';
        } else {
            console.log(data);
            data.COLLECTION_DATE = formatDate(data.COLLECTION_DATE, 0);
            data.AMOUNT     = checkNull(data.AMOUNT, 'INT');
            data.AR_BALANCE = checkNull(data.AR_BALANCE, 'INT');
            data.NOTES      = checkNull(data.NOTES);
        }
        let tabledata = `
            <tr>
                <td><input type="month" name="CL_collection_date[]" class="form-control" value="${data.COLLECTION_DATE}"></td>
                <td><input type="text" name="CL_amount[]" class="form-control" onkeyup="onkeyup_data(event)" onkeydown="onkeydown_data(event)" value="${formatRupiah(data.AMOUNT)}"></td>
                <td><input type="text" name="CL_ar_balance[]" class="form-control" onkeyup="onkeyup_data(event)" onkeydown="onkeydown_data(event)" value="${formatRupiah(data.AR_BALANCE)}"></td>
                <td><input type="text" name="CL_note[]" class="form-control" value="${data.NOTES}"></td>
                <td><a onclick="deleteRow(this)" href="javascript:void(0)" class="btn btn-sm" title="Hapus"><i class="fas fa-trash text-danger"></i></a></td>
            </tr>
        `;

        $("#collectionplan").append(tabledata);
    }

    function addOtherDebt(data = undefined) {
        if (data == undefined) {
            data = [];
            data.CREDITOR = '';
            data.CURRENT_DEBT = '0';
            data.NOTES = '';
        } else {
            data.CREDITOR     = checkNull(data.CREDITOR);
            data.CURRENT_DEBT = checkNull(data.CURRENT_DEBT, 'INT');
            data.NOTES      = checkNull(data.NOTES);
        }
        let tabledata = `
            <tr>
                <td><input type="text" name="OT_creditor[]" class="form-control" value="${data.CREDITOR}"></td>
                <td><input type="text" name="OT_current_debt[]" class="form-control" onkeyup="onkeyup_data(event)" onkeydown="onkeydown_data(event)" value="${data.CURRENT_DEBT}"></td>
                <td><input type="text" name="OT_note[]" class="form-control"  value="${data.NOTES}"></td>
                <td><a onclick="deleteRow(this)" href="javascript:void(0)" class="btn btn-sm" title="Hapus"><i class="fas fa-trash text-danger"></i></a></td>
            </tr>
        `;

        $("#otherdebt").append(tabledata);
    }

    function addVisitDetail(data = undefined) {
        if (data == undefined) {
            data = [];
            data.VISIT_DATE = '';
            data.PARTICIPANT_CJ = '';
            data.PARTICIPANT_CUST = '';
            data.LOCATION = '';
            data.DESCRIPTION = '';
            data.COLLECTION_BD_OPINION = '';
        } else {
            data.VISIT_DATE             = formatDate(data.VISIT_DATE);
            data.PARTICIPANT_CJ         = checkNull(data.PARTICIPANT_CJ);
            data.PARTICIPANT_CUST         = checkNull(data.PARTICIPANT_CUST);
            data.LOCATION         = checkNull(data.LOCATION);
            data.DESCRIPTION         = checkNull(data.DESCRIPTION);
            data.COLLECTION_BD_OPINION         = checkNull(data.COLLECTION_BD_OPINION);
        }
        console.log(data);
        let tabledata = `
            <tr>
                <td><input type="date" name="VD_visit_date[]" class="form-control" value="${data.VISIT_DATE}"></td>
                <td><input type="text" name="VD_participant_cj[]" class="form-control" value="${data.PARTICIPANT_CJ}"></td>
                <td><input type="text" name="VD_participant_customer[]" class="form-control" value="${data.PARTICIPANT_CUST}"></td>
                <td><input type="text" name="VD_location[]" class="form-control" value="${data.LOCATION}"></td>
                <td><textarea type="text" name="VD_description[]" class="form-control" rows="3" style="font-size: 10px">${data.DESCRIPTION}</textarea></td>
                <td><textarea type="text" name="VD_collection_bd_opinion[]" class="form-control" rows="3" style="font-size: 10px">${data.COLLECTION_BD_OPINION}</textarea></td>
                <td><a onclick="deleteRow(this)" href="javascript:void(0)" class="btn btn-sm" title="Hapus"><i class="fas fa-trash text-danger"></i></a></td>
            </tr>
        `;

        $("#visitdetail").append(tabledata);
    }

    function addImages(data = undefined) {
        if (data == undefined) {
            data = [];
            data.IMAGE_NAME = '';
            data.IMAGE_FILENAME = '';
        } else {
            data.IMAGE_NAME     = checkNull(data.IMAGE_NAME);
            data.IMAGE_FILENAME = checkNull(data.IMAGE_FILENAME);
        }

        let imagefile_load = '';
        if (data.IMAGE_FILENAME != '') {
            imagefile_load = `
                <img src="<?= base_url('upload/') ?>${data.IMAGE_FILENAME}" alt="" style="height: 170px; width: 170px; object-fit: cover;margin-bottom:20px">
                <br/>
            `;
        }
        let tabledata = `
            <tr>
                <td>
                    <input type="text" name="VR_image_name[]" class="form-control" placeholder="Type here.." value="${data.IMAGE_NAME}">
                </td>
                <td>
                    ${imagefile_load}
                    <input type="file" accept="image/png, image/jpeg, image/jpg" name="VR_image_file[]" class="form-control">
                </td>
                <td><a onclick="deleteRow(this)" href="javascript:void(0)" class="btn btn-sm" title="Hapus"><i class="fas fa-trash text-danger"></i></a></td>
            </tr>
        `;

        $("#visitimages").append(tabledata);
    }

    function addStrategy(data = undefined) {
        if (data == undefined) {
            data = [];
            data.STRATEGY_SALES = '';
            data.STRATEGY_CCT   = '';
        } else {
            data.STRATEGY_SALES = checkNull(data.STRATEGY_SALES);
            data.STRATEGY_CCT   = checkNull(data.STRATEGY_CCT);
        }
        let tabledata = `
            <tr>
                <td width="45%"><textarea name="VR_strategy_sales[]" style="width: 100%; border-radius: 5px; padding: 10px" placeholder="Type here.." id="" rows="5" maxlength="500">${data.STRATEGY_SALES}</textarea></td>
                <td width="50%"><textarea name="VR_strategy_cct[]" style="width: 100%; border-radius: 5px; padding: 10px" placeholder="Type here.." id="" rows="5" maxlength="500">${data.STRATEGY_CCT}</textarea></td>
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

    function formatDate(dateString, fullDate = 1) {
        var year = dateString.substring(0, 4);
        var month = Number(dateString.substring(5, 6));

        if (month < 10) {
            month = "0" + month.toString();
        }
        month = month.toString();

        var results = year + "-" + month;
        if (fullDate == 1) {
            var date = Number(dateString.substring(dateString.length - 2));
            if (date < 10) {
                date = "0" + date.toString();
            }
            date = date.toString();
            results = results + '-' + date;


        }
        return results;
    }
</script>