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

    #farmersinfo .cust-btn-add {
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
        #farmersinfo .cust-btn-add {
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
        <strong>SURVEY ENTRY</strong>
    </h3>
    <div class="row">
        <form action="<?= admin_url('survey/do_create') ?>" method="POST" enctype="multipart/form-data">
            <div class="content-task mt-5">
                <h3 class="sub-title">1. LOCATION INFORMATION</h3>
                <div class="table-responsive mt-2">
                    <table class="table table-bordered" style="margin-bottom: 10px">
                        <thead>
                            <tr>
                                <th style="text-align: center">DRAFTER</th>
                                <th style="text-align: center">DATE</th>
                                <th style="text-align: center">LAND TYPE</th>
                                <th style="text-align: center">LUAS TANAH (Ha)</th>
                                <th style="text-align: center">COORDINATE</th>
                                <th style="text-align: center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td data-label="EMPLOYEE">
                                    <?= $user['EMPLOYEE_ID'] ?> - <?= $user['FULL_NAME'] ?>
                                </td>
                                <td data-label="DATE">
                                    <input type="hidden" name="coordinate" id="coordinate">
                                    <input type="hidden" name="address" id="address">
                                    <input type="date" name="survey_date" class="form-control" style="font-size: 14px" required>
                                </td>
                                <td data-label="LAND TYPE">
                                    <select class="form-control" style="width: 100%; text-align: center" name="land_type" required>
                                        <option value="SAWAH">SAWAH</option>
                                        <option value="PERBUKITAN">PERBUKITAN</option>
                                    </select>
                                </td>
                                <td data-label="LAND AREA">
                                    <input type="number" name="luas_lahan" class="form-control" placeholder="0" style="font-size: 14px" required>
                                </td>
                                <td data-label="COORDINATE">
                                    <div id="coordinateText"></div>
                                </td>
                                <td>
                                    <a href="javascript:void(0)" onclick="getLocation()" style="background: #00c0ff; border-radius: 10px; color: #fff; font-weight: 600; padding: 10px">UPDATE LOCATION</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table table-bordered" style="margin-bottom: 10px">
                        <thead>
                            <tr>
                                <th style="text-align: center">PROVINCE</th>
                                <th style="text-align: center">REGENCIES</th>
                                <th style="text-align: center">DISTRICTS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td data-label="PROVINCE">
                                    <select id="province" class="form-control" style="width: 100%;" name="province" required>
                                        <?php foreach($provinces as $item): ?>
                                            <option value="<?= $item['ID_PROVINCE'] ?>"><?= $item['PROVINCE'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </td>
                                <td data-label="REGENCIES">
                                    <select id="regencies" class="form-control" style="width: 100%;" name="regencies" required>
                                    </select>
                                </td>
                                <td data-label="DISTRICTS">
                                    <select id="districts" class="form-control" style="width: 100%;" name="districts" required>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div id="iframe-location"></div>
                    <table class="table table-bordered" style="margin-bottom: 10px">
                        <thead>
                            <tr>
                                <th>ADDRESS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td data-label="ADDRESS" style="text-transform: uppercase;" id="address-info"></td>
                            </tr>   
                        </tbody>
                        
                    </table>
                </div>
            </div>

            <div class="content-task mt-5">
                <h3 class="sub-title">2. FARMERS INFORMATION</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="3" style="text-align: right; background: #fff; border: 0px"><button type="button" class="btn cust-btn-add" onclick="addFarmers()">+</button></th>
                                </tr>
                                <tr>
                                    <th>FARMERS</th>
                                    <th>PHONE NUMBER</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="farmersinfo">
                                <tr style="align-items: flex-end">
                                    <th style="text-align: left; background: #fff; border: 0px"><button type="button" class="btn cust-btn-add" onclick="addFarmers()">+</button></th>
                                </tr>
                                <tr>
                                    <td data-label="FARMERS" width="45%"><input type="text" name="farmer_name[]" style="width: 100%; padding: 10px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" placeholder="EX : JOHN DOE" id=""></td>
                                    <td data-label="PHONE NUMBER" width="50%"><input type="number" name="farmer_phone[]" style="width: 100%; padding: 10px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" placeholder="EX : 08XXXXXXXXXX" id=""></td>
                                    <td width="5%"><a onclick="deleteRow(this)" href="javascript:void(0)" class="btn btn-sm" title="Hapus"><i class="fas fa-trash text-danger"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            </div>

            <div class="content-task mt-5">
                <h3 class="sub-title">3. SEGMENT CONDITION</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered" style="margin-bottom: 0px">
                            <thead>
                                <tr>
                                    <th colspan="3" style="text-align: right; background: #fff; border: 0px"><button type="button" class="btn cust-btn-add" onclick="addSegmentcondition()">+</button></th>
                                </tr>
                            </thead>
                            <tbody id="segment">
                                <tr style="align-items: flex-end">
                                    <th style="text-align: right; background: #fff; border: 0px;"><button type="button" class="btn cust-btn-add" onclick="addSegmentcondition()">+</button></th>
                                </tr>
                                <div id="segment"></div>
                            </tbody>
                        </table>
                    </div>
            </div>

            <div class="content-task mt-5">
                <h3 class="sub-title">4. MARKET PRICES</h3>
                <div class="table-responsive">
                    <table class="table table-bordered" style="margin-bottom: 20px">
                        <thead>
                            <tr>
                                <th colspan="3" style="text-align: right; background: #fff; border: 0px"><button type="button" class="btn cust-btn-add" onclick="addMarketprice()">+</button></th>
                            </tr>
                            <tr>
                                <th>DATE</th>
                                <th>PRICE</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="marketprice">
                            <tr style="align-items: flex-end">
                                <th style="text-align: right; background: #fff; border: 0px;"><button type="button" class="btn cust-btn-add" onclick="addMarketprice()">+</button></th>
                            </tr>
                            <tr>
                                <td data-label="DATE"><input type="month" name="market_date[]" class="form-control"></td>
                                <td data-label="PRICE"><input type="number" name="market_price[]" class="form-control" placeholder="EX : 200000" onkeyup="onkeyup_data(event)" onkeydown="onkeydown_data(event)"></td>
                                <td><a onclick="deleteRow(this)" href="javascript:void(0)" class="btn btn-sm" title="Hapus"><i class="fas fa-trash text-danger"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>                   
            </div>

            <div class="content-task mt-5">
                <h3 class="sub-title">5. SURVEY GALLERIES</h3>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th colspan="3" style="text-align: right; background: #fff; border: 0px"><button type="button" class="btn cust-btn-add" onclick="addImages()">+</button></th>
                            </tr>
                            <tr>
                                <th>DATE / TITLE</th>
                                <th>UPLOAD IMAGE</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="visitimages">
                            <tr style="align-items: flex-end">
                                <th style="text-align: right; background: #fff; border: 0px"><button type="button" class="btn cust-btn-add" onclick="addImages()">+</button></th>
                            </tr>
                            <tr>
                                <td data-label ="DATE / TITLE"><input type="text" name="SURVEY_IMAGE_TITLE[]" class="form-control" placeholder="EX : JAN 2024 / TITLE HERE"></td>
                                <td data-label ="UPLOAD IMAGE"><input type="file" accept="image/png, image/jpeg, image/jpg" name="SURVEY_IMAGE[]" class="form-control"></td>
                                <td><a onclick="deleteRow(this)" href="javascript:void(0)" class="btn btn-sm" title="Hapus"><i class="fas fa-trash text-danger"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="form-group row mt-5" style="margin: 20px 0px !important">
                <div class="col-lg-12 col-sm-12" style="display: flex; padding: 0px">
                    <a href="<?= admin_url('survey') ?>" class="btn btn-primary cust-btn-back" style="width: 50%; height: 50px; display: flex; align-items: center; justify-content: center;">Cancel</a>
                    <span style="margin: 5px;"></span>
                    <button type="submit" class="btn btn-primary cust-btn-save" style="width: 50%; height: 50px">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLUc8QC0GYh5ozbMbGBcNUm1BBIjvmmg8&callback=myMap"></script> -->
<script>
    const lang = document.getElementById("coordinateText");
    let segmenIndex = 0;

    function getLocation() {
        console.log('ask this');
        console.log(navigator.geolocation);
        if (navigator.geolocation) {
            
            console.log('ask this 1');
            navigator.geolocation.watchPosition(showPosition);
        } else { 
            console.log('ask this 2');
            lang.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    $(document).ready(function() {
        getLocation();
    });
        
    function showPosition(position) {
        let latitude    = position.coords.latitude;
        let longitude   = position.coords.longitude;
        let coordinate  = latitude + "," + longitude;

        lang.innerHTML  = coordinate;
        let iframe_gmap = `<iframe class="maps-frame" src="https://maps.google.com/maps?q=${coordinate}&output=embed" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>`;
            
        $("#coordinate").val(coordinate);
        $("#iframe-location").html(iframe_gmap);
        
        detailPosition(latitude, longitude)
        detailWeather(latitude, longitude)
    }

    function detailPosition(latitude, longitude) {
        let addressAPI = `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${latitude}&lon=${longitude}`;
        $.ajax({
            url: addressAPI,
            type: "GET",
            beforeSend: function () {
                // removeElements();
            },
            success: function(response) {
                // let data = JSON.parse(response);
                // console.log(response);
                // alert(data.data);
                $("#address").val(response.display_name);
                $("#address-info").text(response.display_name);
            }
        });
    }

    function detailWeather(latitude, longitude) {
        let apiKey = 'e663257c57d1ae4e5ac7cfb52b2375bc'; 
        let weatherAPI = `https://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&appid=${apiKey}&units=metric`;
        // console.log(weatherAPI); 

        $.ajax({
            url: weatherAPI,
            type: "GET",
            beforeSend: function () {
            
            },
            success: function(response) {
                // console.log(response);
                // let temperature = response.weather;
                // alert("Temperature: " + temperature + "°C");
            },
            error: function(error) {
                console.error("Error fetching weather data: ", error);
            }
        });
    }


    $('#land_type').select2({
        theme: 'bootstrap4',
        language: "en",
        placeholder: "- SELECT LAND TYPE -",
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

    $('#fasetanam').select2({
        theme: 'bootstrap4',
        language: "en",
        placeholder: "- SELECT PHASE -",
    });

    function addFarmers() {
        let tabledata = `
        <tr>
            <td data-label="FARMERS" width="45%"><input type="text" name="farmer_name[]" style="width: 100%; padding: 10px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" placeholder="EX : JOHN DOE" id=""></td>
            <td data-label="PHONE NUMBER" width="50%"><input type="number" name="farmer_phone[]" style="width: 100%; padding: 10px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" placeholder="EX : 08XXXXXXXXXX" id=""></td>
            <td width="5%"><a onclick="deleteRow(this)" href="javascript:void(0)" class="btn btn-sm" title="Hapus"><i class="fas fa-trash text-danger"></i></a></td>
        </tr>
        `;

        $("#farmersinfo").append(tabledata);
    }

    function addSegmentcondition() {
        let index = segmenIndex;
        let tabledata = `
            <div id="segment-${index}"> 
                <table class="table table-bordered" style="margin-bottom: 0px">
                    <input type="hidden" name="PLANTING_siklus[${index}]" value="${index + 1}">
                    <tr>
                        <th colspan="2" data-label="PLANTING PHASE - CYCLE ${index + 1}" style="text-align: left; font-size: 13px !important; background-color: #E6E6E6;">
                            <div style="float: left; margin-right: 15px">
                                <input style="height: 20px; width: 20px !important" class="planting-option-${index}" type="checkbox" value="1" onchange="plantingChanged(${index})"/>
                            </div>
                            <div style="display: inline-block; vertical-align: middle; margin-top: 3px">
                                PLANTING PHASE - CYCLE ${index + 1}
                            </div> 
                        </th>
                        <th style="text-align: right; background-color: #E6E6E6"><a onclick="deleteRowSegment(${index})" href="javascript:void(0)" class="btn btn-sm" title="Hapus"><i class="fas fa-trash text-danger" style="font-size: 16px; margin-top: 3px"></i></a></th>
                    </tr>
                    <thead>
                        
                        <tr class="planting-phase-${index}" style="display: none;">
                            <th style="text-align: left">DATE</th>
                            <th style="text-align: left">PHASE</th>
                            <th style="text-align: left">DESCRIPTION</th>
                        </tr>
                    </thead>
                    <tbody class="planting-phase-${index}" style="display: none;">
                        <tr style="align-items: flex-end">
                            <td data-label="DATE">
                                <input type="date" name="PLANTING_date[persiapan-lahan][${index}]" class="form-control" style="font-size: 14px" >
                            </td>
                            <td data-label="PHASE" width="45%">
                                <input type="text" name="PLANTING_phase[persiapan-lahan][${index}]" value="PERSIAPAN LAHAN" class="form-control" style="font-size: 14px" readonly>
                            </td>
                            <td data-label="DESCRIPTION" width="50%">
                                <div class="persiapan-lahan">
                                    <input type="text" name="PLANTING_description[persiapan-lahan][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="STANDARD / KETERANGAN PERSIAPAN LAHAN" id="">
                                    <input type="text" name="PLANTING_description[persiapan-lahan][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="STANDARD / KETERANGAN PERSIAPAN LAHAN" id="">
                                    <input type="text" name="PLANTING_description[persiapan-lahan][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="STANDARD / KETERANGAN PERSIAPAN LAHAN" id="">
                                    <input type="text" name="PLANTING_description[persiapan-lahan][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="STANDARD / KETERANGAN PERSIAPAN LAHAN" id="">
                                    <input type="text" name="PLANTING_description[persiapan-lahan][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="STANDARD / KETERANGAN PERSIAPAN LAHAN" id="">
                                    <input type="text" name="PLANTING_description[persiapan-lahan][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="STANDARD / KETERANGAN PERSIAPAN LAHAN" id="">
                                    <input type="text" name="PLANTING_description[persiapan-lahan][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" placeholder="STANDARD / KETERANGAN PERSIAPAN LAHAN" id="">
                                </div>
                            </td>
                        </tr>
                        <tr style="align-items: flex-end">
                            <td data-label="DATE"><input type="date" name="PLANTING_date[vegetatif-awal][${index}]" class="form-control" style="font-size: 14px" ></td>
                            <td data-label="PHASE" width="45%">
                                <input type="text" name="PLANTING_phase[vegetatif-awal][${index}]" value="VEGETATIF AWAL" class="form-control" style="font-size: 14px" readonly>
                            </td>
                            <td data-label="DESCRIPTION" width="50%">
                                <div class="vegetatif-awal">
                                    <label style="width: 100%; text-align: left">UMUR TANAM (1 - 25)</label>
                                    <input type="number" name="PLANTING_description[vegetatif-awal][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="UMUR TANAM (1 - 25)">

                                    <label style="width: 100%; text-align: left">TINGGI TANAMAN</label>
                                    <input type="text" name="PLANTING_description[vegetatif-awal][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="TINGGI TANAMAN">
                                    
                                    <label style="width: 100%; text-align: left">JUMLAH DAUN</label>
                                    <input type="text" name="PLANTING_description[vegetatif-awal][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="JUMLAH DAUN">

                                    <label style="width: 100%; text-align: left">JENIS PUPUK YANG SUDAH DIAPLIKASIKAN"</label>
                                    <input type="text" name="PLANTING_description[vegetatif-awal][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="JENIS PUPUK YANG SUDAH DIAPLIKASIKAN">
                                    
                                    <label style="width: 100%; text-align: left">ESTIMASI JUMLAH PUPUK DIAPLIKASIKAN(KG)</label>
                                    <input type="text" name="PLANTING_description[vegetatif-awal][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="ESTIMASI JUMLAH PUPUK DIAPLIKASIKAN(KG)">
                                    
                                    <label style="width: 100%; text-align: left">JENIS HERBISIDA / PERSTISIDA YANG DIAPLIKASIKAN</label>
                                    <input type="text" name="PLANTING_description[vegetatif-awal][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="JENIS HERBISIDA / PERSTISIDA YANG DIAPLIKASIKAN">
                                    
                                    <label style="width: 100%; text-align: left">CUACA SAAT SURVEY (KERING, BERAWAN, GERIMIS, HUJAN ATAU BANJIR)</label>
                                    <input type="text" name="PLANTING_description[vegetatif-awal][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="CUACA SAAT SURVEY (KERING, BERAWAN, GERIMIS, HUJAN ATAU BANJIR)">
                                    
                                    <label style="width: 100%; text-align: left">FREKUENSI HUJAN DALAM SEMINGGU DI LOKASI SURVEY (BERAPA KALI DALAM SEMINGGU)</label>
                                    <input type="text" name="PLANTING_description[vegetatif-awal][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="FREKUENSI HUJAN DALAM SEMINGGU DI LOKASI SURVEY (BERAPA KALI DALAM SEMINGGU)">
                                    
                                    <label style="width: 100%; text-align: left">INTESITAS HUJAN DALAM SEMINGGU (KECIL, SEDANG, BESAR)</label>
                                    <input type="text" name="PLANTING_description[vegetatif-awal][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000;" placeholder="INTESITAS HUJAN DALAM SEMINGGU (KECIL, SEDANG, BESAR)">
                                </div>
                            </td>
                        </tr>
                        <tr style="align-items: flex-end">
                            <td data-label="DATE"><input type="date" name="PLANTING_date[vegetatif-akhir][${index}]" class="form-control" style="font-size: 14px" ></td>
                            <td data-label="PHASE" width="45%">
                                <input type="text" name="PLANTING_phase[vegetatif-akhir][${index}]" value="VEGETATIF AKHIR" class="form-control" style="font-size: 14px" readonly>
                            </td>
                            <td data-label="DESCRIPTION" width="50%">
                                <div class="vegetatif-akhir">
                                    <label style="width: 100%; text-align: left">UMUR TANAM (26 - 50)</label>
                                    <input type="number" name="PLANTING_description[vegetatif-akhir][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="UMUR TANAM (26 - 50)">

                                    <label style="width: 100%; text-align: left">TINGGI TANAMAN</label>
                                    <input type="text" name="PLANTING_description[vegetatif-akhir][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="TINGGI TANAMAN">

                                    <label style="width: 100%; text-align: left">JUMLAH DAUN</label>
                                    <input type="text" name="PLANTING_description[vegetatif-akhir][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="JUMLAH DAUN">

                                    <label style="width: 100%; text-align: left">MUNCUL BUNGA JANTAN DAN BETINA (ADA / TIDAK)</label>
                                    <input type="text" name="PLANTING_description[vegetatif-akhir][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="MUNCUL BUNGA JANTAN DAN BETINA (ADA / TIDAK)">

                                    <label style="width: 100%; text-align: left">JENIS PUPUK YANG SUDAH DIAPLIKASIKAN</label>
                                    <input type="text" name="PLANTING_description[vegetatif-akhir][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="JENIS PUPUK YANG SUDAH DIAPLIKASIKAN">

                                    <label style="width: 100%; text-align: left">ESTIMASI JUMLAH PUPUK DIAPLIKASIKAN (KG)</label>
                                    <input type="text" name="PLANTING_description[vegetatif-akhir][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="ESTIMASI JUMLAH PUPUK DIAPLIKASIKAN (KG)">

                                    <label style="width: 100%; text-align: left">JENIS HERBISIDA / PESTISIDA YANG DIAPLIKASIKAN</label>
                                    <input type="text" name="PLANTING_description[vegetatif-akhir][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="JENIS HERBISIDA / PESTISIDA YANG DIAPLIKASIKAN">

                                    <label style="width: 100%; text-align: left">CUACA SAAT SURVEY (KERING, BERAWAN, GERIMIS, HUJAN ATAU BANJIR)</label>
                                    <input type="text" name="PLANTING_description[vegetatif-akhir][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="CUACA SAAT SURVEY (KERING, BERAWAN, GERIMIS, HUJAN ATAU BANJIR)">

                                    <label style="width: 100%; text-align: left">FREKUENSI HUJAN DALAM SEMINGGU DI LOKASI SURVEY (BERAPA KALI DALAM SEMINGGU)</label>
                                    <input type="text" name="PLANTING_description[vegetatif-akhir][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="FREKUENSI HUJAN DALAM SEMINGGU DI LOKASI SURVEY (BERAPA KALI DALAM SEMINGGU)">

                                    <label style="width: 100%; text-align: left">INTESITAS HUJAN DALAM SEMINGGU (KECIL, SEDANG, BESAR)</label>
                                    <input type="text" name="PLANTING_description[vegetatif-akhir][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000;" placeholder="INTESITAS HUJAN DALAM SEMINGGU (KECIL, SEDANG, BESAR)">
                                </div>
                            </td>
                        </tr>
                        <tr style="align-items: flex-end">
                            <td data-label="DATE"><input type="date" name="PLANTING_date[genetatif-awal][${index}]" class="form-control" style="font-size: 14px" ></td>
                            <td data-label="PHASE" width="45%">
                                <input type="text" name="PLANTING_phase[genetatif-awal][${index}]" value="GENETATIF AWAL" class="form-control" style="font-size: 14px" readonly>
                            </td>
                            <td data-label="DESCRIPTION" width="50%">
                                <div class="genetatif-awal">
                                    <label style="width: 100%; text-align: left">UMUR TANAM (51 - 70)</label>
                                    <input type="number" name="PLANTING_description[genetatif-awal][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="UMUR TANAM (51 - 70)">

                                    <label style="width: 100%; text-align: left">MUNCUL BUAH (ADA / TIDAK)</label>
                                    <input type="text" name="PLANTING_description[genetatif-awal][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="MUNCUL BUAH (ADA / TIDAK)">

                                    <label style="width: 100%; text-align: left">JIKA BUAH ADA MAKA UKURAN BUAH (PANJANG DAN DIAMETER BUAH MUDA)</label>
                                    <input type="text" name="PLANTING_description[genetatif-awal][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="JIKA BUAH ADA MAKA UKURAN BUAH (PANJANG DAN DIAMETER BUAH MUDA)">

                                    <label style="width: 100%; text-align: left">MUNCUL BUNGA JANTAN DAN BETINA (ADA / TIDAK)</label>
                                    <input type="text" name="PLANTING_description[genetatif-awal][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="MUNCUL BUNGA JANTAN DAN BETINA (ADA / TIDAK)">

                                    <label style="width: 100%; text-align: left">KONDISI BUAH MUDAH (HUJAN SEGAR, PUCAT ATAU BUSUK)</label>
                                    <input type="text" name="PLANTING_description[genetatif-awal][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="KONDISI BUAH MUDAH (HUJAN SEGAR, PUCAT ATAU BUSUK)">

                                    <label style="width: 100%; text-align: left">ESTIMASI JUMLAH PUPUK DIAPLIKASIKAN (KG)</label>
                                    <input type="text" name="PLANTING_description[genetatif-awal][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="ESTIMASI JUMLAH PUPUK DIAPLIKASIKAN (KG)">

                                    <label style="width: 100%; text-align: left">JENIS HERBISIDA / PESTISIDA YANG DIAPLIKASIKAN</label>
                                    <input type="text" name="PLANTING_description[genetatif-awal][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="JENIS HERBISIDA / PESTISIDA YANG DIAPLIKASIKAN">

                                    <label style="width: 100%; text-align: left">CUACA SAAT SURVEY (KERING, BERAWAN, GERIMIS, HUJAN ATAU BANJIR)</label>
                                    <input type="text" name="PLANTING_description[genetatif-awal][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="CUACA SAAT SURVEY (KERING, BERAWAN, GERIMIS, HUJAN ATAU BANJIR)">

                                    <label style="width: 100%; text-align: left">FREKUENSI HUJAN DALAM SEMINGGU DI LOKASI SURVEY (BERAPA KALI DALAM SEMINGGU)</label>
                                    <input type="text" name="PLANTING_description[genetatif-awal][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="FREKUENSI HUJAN DALAM SEMINGGU DI LOKASI SURVEY (BERAPA KALI DALAM SEMINGGU)">

                                    <label style="width: 100%; text-align: left">INTESITAS HUJAN DALAM SEMINGGU (KECIL, SEDANG, BESAR)</label>
                                    <input type="text" name="PLANTING_description[genetatif-awal][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000;" placeholder="INTESITAS HUJAN DALAM SEMINGGU (KECIL, SEDANG, BESAR)">
                                </div>
                            </td>
                        </tr>
                        <tr style="align-items: flex-end">
                            <td data-label="DATE"><input type="date" name="PLANTING_date[genetatif-akhir][${index}]" class="form-control" style="font-size: 14px" ></td>
                            <td data-label="PHASE" width="45%">
                                <input type="text" name="PLANTING_phase[genetatif-akhir][${index}]" value="GENETATIF AKHIR" class="form-control" style="font-size: 14px" readonly>
                            </td>
                            <td data-label="DESCRIPTION" width="50%">
                                <div class="genetatif-akhir">
                                    <label style="width: 100%; text-align: left">"UMUR TANAM (71 - 110)</label>
                                    <input type="number" name="PLANTING_description[genetatif-akhir][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="UMUR TANAM (71 - 110)">

                                    <label style="width: 100%; text-align: left">MASUK KE FORMAT HASIL PANEN PADA SHEET HASIL PANEN</label>
                                    <input type="text" name="PLANTING_description[genetatif-akhir][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="MASUK KE FORMAT HASIL PANEN PADA SHEET HASIL PANEN">

                                    <label style="width: 100%; text-align: left">ENIS HERBISIDA / PESTISIDA YANG DIAPLIKASIKAN</label>
                                    <input type="text" name="PLANTING_description[genetatif-akhir][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="JENIS HERBISIDA / PESTISIDA YANG DIAPLIKASIKAN">

                                    <label style="width: 100%; text-align: left">CUACA SAAT SURVEY (KERING, BERAWAN, GERIMIS, HUJAN ATAU BANJIR)</label>
                                    <input type="text" name="PLANTING_description[genetatif-akhir][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="CUACA SAAT SURVEY (KERING, BERAWAN, GERIMIS, HUJAN ATAU BANJIR)">

                                    <label style="width: 100%; text-align: left">FREKUENSI HUJAN DALAM SEMINGGU DI LOKASI SURVEY (BERAPA KALI DALAM SEMINGGU)</label>
                                    <input type="text" name="PLANTING_description[genetatif-akhir][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="FREKUENSI HUJAN DALAM SEMINGGU DI LOKASI SURVEY (BERAPA KALI DALAM SEMINGGU)">

                                    <label style="width: 100%; text-align: left">INTESITAS HUJAN DALAM SEMINGGU (KECIL, SEDANG, BESAR)</label>
                                    <input type="text" name="PLANTING_description[genetatif-akhir][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000;" placeholder="INTESITAS HUJAN DALAM SEMINGGU (KECIL, SEDANG, BESAR)">
                                </div>
                            </td>
                        </tr>
                        <tr style="align-items: flex-end">
                            <td data-label="DATE"><input type="date" name="PLANTING_date[gagal-panen][${index}]" class="form-control" style="font-size: 14px" ></td>
                            <td data-label="PHASE" width="45%">
                                <input type="text" name="PLANTING_phase[gagal-panen][${index}]" value="GAGAL PANEN" class="form-control" style="font-size: 14px" readonly>
                            </td>
                            <td data-label="DESCRIPTION" width="50%">
                                <div class="gagal-panen">
                                    <label style="width: 100%; text-align: left">UMUR SAAT PUSO</label>
                                    <input type="text" name="PLANTING_description[gagal-panen][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="UMUR SAAT PUSO">

                                    <label style="width: 100%; text-align: left">KONDISI SAAT PUSO (KEKERINGAN / BANJIR)</label>
                                    <input type="text" name="PLANTING_description[gagal-panen][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="KONDISI SAAT PUSO (KEKERINGAN / BANJIR)">

                                    <label style="width: 100%; text-align: left">ESTIMASI LAHAN YANG TERKENA PUSO</label>
                                    <input type="text" name="PLANTING_description[gagal-panen][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="ESTIMASI LAHAN YANG TERKENA PUSO">

                                    <label style="width: 100%; text-align: left">ESTIMASI PRODUKSI YANG HILANG KARENA PUSO</label>
                                    <input type="text" name="PLANTING_description[gagal-panen][${index}][]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000;" placeholder="ESTIMASI PRODUKSI YANG HILANG KARENA PUSO">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-bordered planting-phase-${index}" style="display: none;">
                    <tr>
                        <th colspan="10" data-label="HARVEST PHASE" style="text-align: left; font-size: 13px !important; background-color: #E6E6E6;">
                            <div style="float: left; margin-right: 15px">
                                <input style="height: 20px; width: 20px !important" class="harvest-option-${index}" type="checkbox" value="1" onchange="harvestChanged(${index})"/>
                            </div>
                            <div style="display: inline-block; vertical-align: middle; margin-top: 3px">
                                HARVEST PHASE
                            </div> 
                        </th>
                    </tr>
                    <thead>
                        
                        <tr class="harvest-phase-${index}" style="display: none;">
                            <th style="width: 10%">SCORE</th>
                            <th style="width: 10%">BARIS</th>
                            <th style="width: 10%">ACTUAL</th>
                            <th style="width: 10%">%</th>
                            <th style="width: 10%">BIJI</th>
                            <th style="width: 10%">ACTUAL</th>
                            <th style="width: 10%">%</th>
                            <th style="width: 10%">BOBOT</th>
                            <th style="width: 10%">ACTUAL</th>
                            <th style="width: 10%">%</th>
                        </tr>
                    </thead>
                    <tbody class="harvest-phase-${index}" style="display: none;">
                        <?php for ($i=10; $i >= 0; $i--) { ?>
                            <tr>
                                <td data-label="SCORE" style="">
                                    <?= $i ?>
                                    <input type="hidden" name="HARVEST_score[${index}][]" value="<?= $i ?>">
                                </td>
                                <div class="harvest-mobile" style="display: flex; ">
                                    <td data-label="BARIS">
                                        <input name="baris[${index}][]" value="<?= $harvest[$i]['BARIS'] ?>" type="text" placeholder="0" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" readonly>
                                    </td>
                                    <td data-label="ACTUAL">
                                        <input name="baris_actual[${index}][]" type="number" placeholder="0" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" id="baris-actual-${index}-<?= $i ?>" class="baris-actual-${index}" data-score="<?= $i ?>">
                                    </td>
                                    <td data-label="%">
                                        <input type="text" id="baris-percentage-${index}-<?= $i ?>" placeholder="0" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" readonly>
                                    </td>
                                </div>
                                <div class="harvest-mobile">
                                    <td data-label="BIJI">
                                        <input name="biji[${index}][]" value="<?= $harvest[$i]['BIJI'] ?>" type="text" placeholder="0" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" readonly>
                                    </td>
                                    <td data-label="ACTUAL">
                                        <input name="biji_actual[${index}][]" type="number" placeholder="0" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" id="biji-actual-${index}-<?= $i ?>" class="biji-actual-${index}" data-score="<?= $i ?>">
                                    </td>
                                    <td data-label="%">
                                        <input type="text" id="biji-percentage-${index}-<?= $i ?>" placeholder="0" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" readonly>
                                    </td>
                                </div>
                                <div class="harvest-mobile">
                                    <td data-label="BOBOT">
                                        <input name="bobot[${index}][]" value="<?= $harvest[$i]['BOBOT'] ?>" type="text" placeholder="0" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" readonly>
                                    </td>
                                    <td data-label="ACTUAL">
                                        <input name="bobot_actual[${index}][]" type="number" placeholder="0" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" id="bobot-actual-${index}-<?= $i ?>" class="bobot-actual-${index}" data-score="<?= $i ?>">
                                    </td>
                                    <td data-label="%">
                                        <input type="text" id="bobot-percentage-${index}-<?= $i ?>" placeholder="0" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" readonly>
                                    </td>
                                </div>
                                
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr class="harvest-phase-${index}" style="display: none;">
                            <td style="width: 10%" colspan="2"></td>
                            <td style="width: 10%" id="baris-total-${index}">0</td>
                            <td style="width: 10%" colspan="2"></td>
                            <td style="width: 10%" id="biji-total-${index}">0</td>
                            <td style="width: 10%" colspan="2"></td>
                            <td style="width: 10%" id="bobot-total-${index}">0</td>
                            <td style="width: 10%"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
         `;                                   
        $("#segment").append(tabledata);
        $(`.baris-actual-${index}`).on('keyup', function() {
            calculateHarvest('baris', index);
        });
        $(`.biji-actual-${index}`).on('keyup', function() {
            calculateHarvest('biji', index);
        });
        $(`.bobot-actual-${index}`).on('keyup', function() {
            calculateHarvest('bobot', index);
        });
        segmenIndex += 1;
    }

    function calculateHarvest(column,index) {
        let total = 0;
        // get total sum
        $(`.${column}-actual-${index}`).each(function() {
            let score   = $(this).data('score');
            let amount  = Number($(this).val());
            total += amount;
        });

        // set percentage
        $(`.${column}-actual-${index}`).each(function() {
            let score   = $(this).data('score');
            let amount  = Number($(this).val());

            let percentage = (amount / total) * 100;
            $(`#${column}-percentage-${index}-${score}`).val(percentage.toFixed(2).toString());
        });
        $(`#${column}-total-${index}`).text(total.toString());
    }

    function addMarketprice() {
        let tabledata = `
        <tr>
            <td data-label="DATE"><input type="month" name="market_date[]" class="form-control"></td>
            <td data-label="PRICE"><input type="number" name="market_price[]" class="form-control" placeholder="EX : 200000" onkeyup="onkeyup_data(event)" onkeydown="onkeydown_data(event)"></td>
            <td><a onclick="deleteRow(this)" href="javascript:void(0)" class="btn btn-sm" title="Hapus"><i class="fas fa-trash text-danger"></i></a></td>
        </tr>
         `;

        $("#marketprice").append(tabledata);
    }

    function addImages() {
        let tabledata = `
        <tr>
            <td data-label ="DATE / TITLE"><input type="text" name="SURVEY_IMAGE_TITLE[]" class="form-control" placeholder="EX : JAN 2024 / TITLE HERE"></td>
            <td data-label ="UPLOAD IMAGE"><input type="file" accept="image/png, image/jpeg, image/jpg" name="SURVEY_IMAGE[]" class="form-control"></td>
            <td><a onclick="deleteRow(this)" href="javascript:void(0)" class="btn btn-sm" title="Hapus"><i class="fas fa-trash text-danger"></i></a></td>
        </tr>
        `;
        $("#visitimages").append(tabledata);
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

    function deleteRowSegment(e) {
        Swal.fire({
            type: "warning",
            title: "Delete Row",
            showCancelButton: true,
            text: "Are you sure want to delete this cycle ?"
        }).then((result) => {
            if (result.value) {
                $("#segment-" + e).remove();
            }
        });
    }

    function plantingChanged(index)
    {
        if($('.planting-option-' + index).is(":checked"))   
            $('.planting-phase-' + index).show();
        else
            $('.planting-phase-' + index).hide();
    }

    function harvestChanged(index)
    {
        if($('.harvest-option-' + index).is(":checked"))   
            $('.harvest-phase-' + index).show();
        else
            $('.harvest-phase-' + index).hide();
    }

    function valueChanged()
    {
        if($('.coupon_question').is(":checked"))   
            $(".planting-phase").show();
        else
            $(".planting-phase").hide();
    }
    function value1Changed()
    {
        if($('.coupon_question2').is(":checked"))   
            $(".harvest-phase").show();
        else
            $(".harvest-phase").hide();
    }
</script>