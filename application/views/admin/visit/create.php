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
        <form action="<?= admin_url('visit/do_create') ?>" method="POST" enctype="multipart/form-data">
            <div class="content-task mt-5">
                <h3 class="sub-title">1. LOCATION INFORMATION</h3>
                <div class="table-responsive mt-2">
                    <table class="table table-bordered" style="margin-bottom: 10px">
                        <thead>
                            <tr>
                                <th style="text-align: center">DRAFTER</th>
                                <th style="text-align: center">DATE</th>
                                <th style="text-align: center">LAND TYPE</th>
                                <th style="text-align: center">LATITUDE</th>
                                <th style="text-align: center">LONGITUTE</th>
                                <th style="text-align: center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td data-label="EMPLOYEE">
                                    <?= $user['EMPLOYEE_ID'] ?> - <?= $user['FULL_NAME'] ?>
                                </td>
                                <td data-label="DATE">
                                    <input type="date" name="visiting_date" class="form-control" style="font-size: 14px" required>
                                </td>
                                <td data-label="LAND TYPE">
                                    <select id="land_type" class="form-control" style="width: 100%;" name="land_type" required>
                                        <option value="">SAWAH</option>
                                        <option value="">PERBUKITAN</option>
                                    </select>
                                </td>
                                <td data-label="LATITUDE">
                                    <div id="latitude"></div>
                                </td>
                                <td data-label="LONGITUDE">
                                    <div id="longitude"></div>
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
                                        <option value="">A</option>
                                        <option value="">B</option>
                                    </select>
                                </td>
                                <td data-label="REGENCIES">
                                    <select id="regencies" class="form-control" style="width: 100%;" name="regencies" required>
                                        <option value="">C</option>
                                        <option value="">D</option>
                                    </select>
                                </td>
                                <td data-label="DISTRICTS">
                                    <select id="districts" class="form-control" style="width: 100%;" name="districts" required>
                                        <option value="">E</option>
                                        <option value="">F</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <iframe class="maps-frame" src="https://maps.google.com/maps?q=-6.2336281,106.8214081&output=embed" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <table class="table table-bordered" style="margin-bottom: 10px">
                        <thead>
                            <tr>
                                <th>ADDRESS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td data-label="ADDRESS" style="text-transform: uppercase;">Jl. Gatot Subroto No.Kav. 38, RT.6/RW.1, Kuningan Bar., Kec. Mampang Prpt., Jakarta, Daerah Khusus Ibukota Jakarta 12710</td>
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
                                    <td data-label="FARMERS" width="45%"><input type="text" name="FM_farmers[]" style="width: 100%; padding: 10px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" placeholder="EX : JOHN DOE" id=""></td>
                                    <td data-label="PHONE NUMBER" width="50%"><input type="number" name="FM_phone_number[]" style="width: 100%; padding: 10px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" placeholder="EX : 08XXXXXXXXXX" id=""></td>
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
                                    <th colspan="2" style="text-align: left; font-size: 13px !important">PLANTING PHASE</th>
                                </tr>
                                <tr>
                                    <th style="text-align: left">PHASE</th>
                                    <th style="text-align: left">DESCRIPTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="align-items: flex-end">
                                    <td data-label="PHASE" width="45%" style="vertical-align: top">
                                        <select id="fasetanam" class="form-control" style="width: 100%; padding: 10px" name="phase_tanam" required>
                                            <option id="persiapan-lahan" value="PERSIAPAN LAHAN" selected>PERSIAPAN LAHAN</option>
                                            <option id="vegetatif-awal" value="VEGETATIF AWAL">VEGETATIF AWAL</option>
                                            <option id="vegetatif-akhir" value="VEGETATIF AKHIR">VEGETATIF AKHIR</option>
                                            <option id="genetatif-awal" value="GENETATIF AWAL">GENETATIF AWAL</option>
                                            <option id="genetatif-akhir" value="GENETATIF AKHIR">GENETATIF AKHIR (PANEN)</option>
                                            <option id="gagal-panen" value="PUSO / GAGAL PANEN">PUSO / GAGAL PANEN</option>
                                        </select>
                                    </td>
                                    <td data-label="DESCRIPTION" width="50%">
                                        <!-- <div class="persiapan-lahan">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="EX : LOREM IPSUM DOLOR SIT AMET" id="">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="EX : LOREM IPSUM DOLOR SIT AMET" id="">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="EX : LOREM IPSUM DOLOR SIT AMET" id="">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="EX : LOREM IPSUM DOLOR SIT AMET" id="">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="EX : LOREM IPSUM DOLOR SIT AMET" id="">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="EX : LOREM IPSUM DOLOR SIT AMET" id="">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" placeholder="EX : LOREM IPSUM DOLOR SIT AMET" id="">
                                        </div> -->
                                        <!-- <div class="vegetatif-awal">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="UMUR TANAM (1 - 25)">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="TINGGI TANAMAN">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="JUMLAH DAUN">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="JENIS PUPUK YANG SUDAH DIAPLIKASIKAN">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="ESTIMASI JUMLAH PUPUK DIAPLIKASIKAN(KG)">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="JENIS HERBISIDA / PERSTISIDA YANG DIAPLIKASIKAN">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="CUACA SAAT SURVEY (KERING, BERAWAN, GERIMIS, HUJAN ATAU BANJIR)">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="FREKUENSI HUJAN DALAM SEMINGGU DI LOKASI SURVEY (BERAPA KALI DALAM SEMINGGU)">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000;" placeholder="INTESITAS HUJAN DALAM SEMINGGU (KECIL, SEDANG, BESAR)">
                                        </div> -->
                                        <!-- <div class="vegetatif-akhir">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="UMUR TANAM (26 - 50)">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="TINGGI TANAMAN">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="JUMLAH DAUN">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="MUNCUL BUNGA JANTAN DAN BETINA (ADA / TIDAK)">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="JENIS PUPUK YANG SUDAH DIAPLIKASIKAN">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="ESTIMASI JUMLAH PUPUK DIAPLIKASIKAN (KG)">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="JENIS HERBISIDA / PESTISIDA YANG DIAPLIKASIKAN">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="CUACA SAAT SURVEY (KERING, BERAWAN, GERIMIS, HUJAN ATAU BANJIR)">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="FREKUENSI HUJAN DALAM SEMINGGU DI LOKASI SURVEY (BERAPA KALI DALAM SEMINGGU)">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000;" placeholder="INTESITAS HUJAN DALAM SEMINGGU (KECIL, SEDANG, BESAR)">
                                        </div> -->
                                        <!-- <div class="genetatif-awal">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="UMUR TANAM (51 - 70)">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="MUNCUL BUAH (ADA / TIDAK)">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="JIKA BUAH ADA MAKA UKURAN BUAH (PANJANG DAN DIAMETER BUAH MUDA)">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="MUNCUL BUNGA JANTAN DAN BETINA (ADA / TIDAK)">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="KONDISI BUAH MUDAH (HUJAN SEGAR, PUCAT ATAU BUSUK)">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="ESTIMASI JUMLAH PUPUK DIAPLIKASIKAN (KG)">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="JENIS HERBISIDA / PESTISIDA YANG DIAPLIKASIKAN">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="CUACA SAAT SURVEY (KERING, BERAWAN, GERIMIS, HUJAN ATAU BANJIR)">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="FREKUENSI HUJAN DALAM SEMINGGU DI LOKASI SURVEY (BERAPA KALI DALAM SEMINGGU)">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000;" placeholder="INTESITAS HUJAN DALAM SEMINGGU (KECIL, SEDANG, BESAR)">
                                        </div> -->
                                        <div class="genetatif-akhir">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="UMUR TANAM (71 - 110)">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="MASUK KE FORMAT HASIL PANEN PADA SHEET HASIL PANEN">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="JENIS HERBISIDA / PESTISIDA YANG DIAPLIKASIKAN">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="CUACA SAAT SURVEY (KERING, BERAWAN, GERIMIS, HUJAN ATAU BANJIR)">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="FREKUENSI HUJAN DALAM SEMINGGU DI LOKASI SURVEY (BERAPA KALI DALAM SEMINGGU)">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000;" placeholder="INTESITAS HUJAN DALAM SEMINGGU (KECIL, SEDANG, BESAR)">
                                        </div>
                                        <!-- <div class="gagal-panen">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="UMUR SAAT PUSO">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="KONDISI SAAT PUSO (KEKERINGAN / BANJIR)">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000; margin-bottom: 10px" placeholder="ESTIMASI LAHAN YANG TERKENA PUSO">
                                            <input type="text" name="FM_phone_number[]" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000;" placeholder="ESTIMASI PRODUKSI YANG HILANG KARENA PUSO">
                                        </div> -->
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="10" style="text-align: left; font-size: 13px !important">HARVEST PHASE</th>
                                </tr>
                                <tr>
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
                            <tbody>
                                <tr>
                                    <td data-label="SCORE" style="">
                                        10
                                    </td>
                                    <td data-label="BARIS">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="ACTUAL">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="%">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="BIJI">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="ACTUAL">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="%">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="BOBOT">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="ACTUAL">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="%">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                </tr>
                                <tr>
                                    <td data-label="SCORE" style="">
                                        9
                                    </td>
                                    <td data-label="BARIS">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="ACTUAL">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="%">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="BIJI">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="ACTUAL">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="%">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="BOBOT">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="ACTUAL">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="%">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                </tr>
                                <tr>
                                    <td data-label="SCORE" style="">
                                        8
                                    </td>
                                    <td data-label="BARIS">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="ACTUAL">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="%">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="BIJI">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="ACTUAL">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="%">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="BOBOT">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="ACTUAL">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="%">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                </tr>
                                <tr>
                                    <td data-label="SCORE" style="">
                                        7
                                    </td>
                                    <td data-label="BARIS">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="ACTUAL">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="%">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="BIJI">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="ACTUAL">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="%">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="BOBOT">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="ACTUAL">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="%">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                </tr>
                                <tr>
                                    <td data-label="SCORE" style="">
                                        6
                                    </td>
                                    <td data-label="BARIS">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="ACTUAL">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="%">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="BIJI">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="ACTUAL">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="%">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="BOBOT">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="ACTUAL">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="%">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                </tr>
                                <tr>
                                    <td data-label="SCORE" style="">
                                        5
                                    </td>
                                    <td data-label="BARIS">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="ACTUAL">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="%">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="BIJI">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="ACTUAL">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="%">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="BOBOT">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="ACTUAL">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="%">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                </tr>
                                <tr>
                                    <td data-label="SCORE" style="">
                                        4
                                    </td>
                                    <td data-label="BARIS">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="ACTUAL">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="%">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="BIJI">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="ACTUAL">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="%">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="BOBOT">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="ACTUAL">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="%">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                </tr>
                                <tr>
                                    <td data-label="SCORE" style="">
                                        3
                                    </td>
                                    <td data-label="BARIS">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="ACTUAL">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="%">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="BIJI">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="ACTUAL">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="%">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="BOBOT">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="ACTUAL">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="%">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                </tr>
                                <tr>
                                    <td data-label="SCORE" style="">
                                        2
                                    </td>
                                    <td data-label="BARIS">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="ACTUAL">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="%">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="BIJI">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="ACTUAL">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="%">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="BOBOT">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="ACTUAL">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="%">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                </tr>
                                <tr>
                                    <td data-label="SCORE" style="">
                                        1
                                    </td>
                                    <td data-label="BARIS">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="ACTUAL">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="%">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="BIJI">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="ACTUAL">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="%">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="BOBOT">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="ACTUAL">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="%">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                </tr>
                                <tr>
                                    <td data-label="SCORE" style="">
                                        0
                                    </td>
                                    <td data-label="BARIS">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="ACTUAL">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="%">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="BIJI">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="ACTUAL">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="%">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="BOBOT">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="ACTUAL">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                    <td data-label="%">
                                        <input type="number" style="width: 100%; padding: 8px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" >
                                    </td>
                                </tr>
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
                                <td data-label="DATE"><input type="month" name="CL_collection_date[]" class="form-control"></td>
                                <td data-label="PRICE"><input type="number" name="CL_ar_balance[]" class="form-control" onkeyup="onkeyup_data(event)" onkeydown="onkeydown_data(event)"></td>
                                <td><a onclick="deleteRow(this)" href="javascript:void(0)" class="btn btn-sm" title="Hapus"><i class="fas fa-trash text-danger"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>                   
            </div>

            <div class="content-task mt-5">
                <h3 class="sub-title">5. Visit Photos</h3>
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
                            <tr style="align-items: flex-end">
                                <th style="text-align: right; background: #fff; border: 0px"><button type="button" class="btn cust-btn-add" onclick="addImages()">+</button></th>
                            </tr>
                            <tr>
                                <td data-label ="Title"><input type="text" name="VR_image_name[]" class="form-control" placeholder="Type here.."></td>
                                <td data-label ="Upload photo"><input type="file" accept="image/png, image/jpeg, image/jpg" name="VR_image_file[]" class="form-control"></td>
                                <td><a onclick="deleteRow(this)" href="javascript:void(0)" class="btn btn-sm" title="Hapus"><i class="fas fa-trash text-danger"></i></a></td>
                            </tr>
                        </tbody>
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLUc8QC0GYh5ozbMbGBcNUm1BBIjvmmg8&callback=myMap"></script>
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
        let latitude    = position.coords.latitude;
        let longitude   = position.coords.longitude;

        lang.innerHTML  = latitude;
        long.innerHTML  = longitude;
        detailPosition(latitude, longitude)
    }

    function detailPosition(latitude, longitude) {
        $.ajax({
            url: "<?= base_url('dashboard/survey/ajax_location_detail') ?>",
            type: "GET",
            data: {
                "latitude": latitude,
                "longitude": longitude
            },
            beforeSend: function () {
                // removeElements();
            },
            success: function(response) {
                console.log(response);
                alert(response);
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
        language: "en",
        placeholder: "- SELECT REGENCIES -",
    });
    $('#districts').select2({
        theme: 'bootstrap4',
        language: "en",
        placeholder: "- SELECT DISTRICTS -",
    });

    $('#fasetanam').select2({
        theme: 'bootstrap4',
        language: "en",
        placeholder: "- SELECT PHASE -",
    });

    function addFarmers() {
        let tabledata = `
        <tr>
            <td data-label="FARMERS" width="45%"><input type="text" name="FM_farmers[]" style="width: 100%; padding: 10px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" placeholder="EX : JOHN DOE" id=""></td>
            <td data-label="PHONE NUMBER" width="50%"><input type="number" name="FM_phone_number[]" style="width: 100%; padding: 10px 10px; border-radius: 5px; text-align: left; border: 1px solid #000" placeholder="EX : 08XXXXXXXXXX" id=""></td>
            <td width="5%"><a onclick="deleteRow(this)" href="javascript:void(0)" class="btn btn-sm" title="Hapus"><i class="fas fa-trash text-danger"></i></a></td>
        </tr>
        `;

        $("#farmersinfo").append(tabledata);
    }

    function addMarketprice() {
        let tabledata = `
        <tr>
            <td data-label="DATE"><input type="month" name="CL_collection_date[]" class="form-control"></td>
            <td data-label="PRICE"><input type="number" name="CL_ar_balance[]" class="form-control" onkeyup="onkeyup_data(event)" onkeydown="onkeydown_data(event)"></td>
            <td><a onclick="deleteRow(this)" href="javascript:void(0)" class="btn btn-sm" title="Hapus"><i class="fas fa-trash text-danger"></i></a></td>
        </tr>
         `;

        $("#marketprice").append(tabledata);
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