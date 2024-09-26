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

                    .form-classification {
                        width: 75%; 
                        display: flex; 
                        flex-direction: column; 
                        align-content: center; 
                        justify-content: center;
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
                        .form-classification {
                            width: 100%; 
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
    <h3 class="card-title">
        <strong>CREATE CLASSIFICATION</strong>
    </h3>
    <div class="row" style="align-items: center; justify-content: center; min-height: 80vh">
        <form class="form-classification" action="<?= admin_url('master/klasifikasi/do_create') ?>" method="POST" enctype="multipart/form-data">
            <div class="content-task">
                <div class="table-responsive mt-2">
                    <table class="table table-bordered" style="margin-bottom: 10px">
                        <thead>
                            <tr>
                                <th style="text-align: left">CLASSIFICATION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td data-label="CLASSIFICATION">
                                    <input type="text" name="classification" class="form-control" style="font-size: 14px !important; text-align: left" placeholder="type here.." required>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered" style="margin-bottom: 10px">
                        <thead>
                            <tr>
                                <th style="text-align: left">REMARKS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td data-label="REMARKS">
                                    <textarea name="remarks" id="" rows="5" class="form-control" style="font-size: 14px !important; padding: 10px" placeholder="type here.."></textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="form-group row mt-5" style="margin: 20px 0px !important">
                <div class="col-lg-12 col-sm-12" style="display: flex; padding: 0px">
                    <a href="<?= admin_url('master/klasifikasi') ?>" class="btn btn-primary cust-btn-back" style="width: 50%; height: 50px; display: flex; align-items: center; justify-content: center;">CANCEL</a>
                    <span style="margin: 5px;"></span>
                    <button type="submit" class="btn btn-primary cust-btn-save" style="width: 50%; height: 50px">SAVE</button>
                </div>
            </div>
        </form>
    </div>
</div>