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
</style>

<div class="main-content pre-posttest">
    <h3 class="card-title">
        <strong>SURVEY ENTRY</strong>
    </h3>
    <div class="row">
        <form action="<?= admin_url('visit/do_create') ?>" method="POST" enctype="multipart/form-data">
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
                <h3 class="sub-title">1. LOCATION INFORMATION</h3>
                <!-- <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group row">
                            <label for="plant" class="col-lg-12 col-sm-12 col-form-label">SURVEY DATE <span class="text-danger">*</span></label>
                            <div class="col-lg-12 col-sm-12">
                                <input type="date" name="visiting_date" class="form-control" style="font-size: 14px" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group row">
                            <label for="plant" class="col-lg-12 col-sm-12 col-form-label">Plant <span class="text-danger">*</span></label>
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
                            <label for="customer" class="col-lg-12 col-sm-12 col-form-label">Customer <span class="text-danger">*</span></label>
                            <div class="col-lg-12 col-sm-12">
                                <select id="customer_entry" class="form-control" style="width: 100%;" name="customer" required>
                                    <option value="" selected>- PILIH CUSTOMER -</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group row">
                            <label for="customer" class="col-lg-12 col-sm-12 col-form-label">Region</label>
                            <div class="col-lg-12 col-sm-12">
                                <input type="text" id="region_entry" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="table-responsive mt-2">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="text-align: center">DATE</th>
                                <th style="text-align: center">DRAFTER</th>
                                <th style="text-align: center">LATITUDE</th>
                                <th style="text-align: center">LONGITUTE</th>
                                <th style="text-align: center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="date" name="visiting_date" class="form-control" style="font-size: 14px" required>
                                </td>
                                <td>
                                    <?= $user['EMPLOYEE_ID'] ?> - <?= $user['FULL_NAME'] ?>
                                </td>
                                <td>
                                    <div id="latitude"></div>
                                </td>
                                <td>
                                    <div id="longitude"></div>
                                </td>
                                <td>
                                    <a href="javascript:void(0)" onclick="getLocation()">UPDATE LOCATION</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.229637197503!2d106.81942827503788!3d-6.233430493754773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e168e90827%3A0x865d0ef790a78279!2sMenara%20Jamsostek%2C%20Jl.%20Gatot%20Subroto%20No.Kav.%2038%2C%20RT.6%2FRW.1%2C%20Kuningan%20Bar.%2C%20Kec.%20Mampang%20Prpt.%2C%20Jakarta%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2012710!5e0!3m2!1sid!2sid!4v1726641729740!5m2!1sid!2sid" width="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
<script>
    const lang = document.getElementById("latitude");
    const long = document.getElementById("longitude");

    function getLocation() {
        console.log('ask this');
        console.log(navigator.geolocation);
        if (navigator.geolocation) {
            
            console.log('ask this 1');
            navigator.geolocation.watchPosition(showPosition);
        } else { 
            console.log('ask this 2');
            lang.innerHTML = "Geolocation is not supported by this browser.";
            long.innerHTML = "Geolocation is not supported by this browser.";
        }
    }
        
    function showPosition(position) {
        lang.innerHTML = position.coords.latitude;
        long.innerHTML = position.coords.longitude;
    }
</script>