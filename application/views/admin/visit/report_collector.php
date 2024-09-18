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
        font-size: 20px;
        font-weight: 700;
        text-decoration: none;
        margin-top: 20px;
        margin-bottom: 20px;
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
        border-top: 1px solid #000;
        border-bottom: 1px solid #000;
        margin-bottom: 20px
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
        width: 100%;
    }
    .select2-container .select2-selection--single .select2-selection__rendered {
        font-size: 12px
    }
    .label-span {
        font-size: 12px
    }
    .btn-primary {
        font-size: 12px;
    }
</style>


<div class="main-content pre-posttest">
    <h3 class="card-title">
        <strong>Collection Data - Report</strong>
    </h3>
    <form class="form-horizontal" action="#" method="POST">
        <div class="row" style="padding: 0px 10px; border-bottom: 2px solid #000; padding-bottom: 10px;margin: 0px 0px; margin-bottom: 10px; ">
            <div class="col-md-4 col-sm-12" style="display: flex;">
                <span class="label-span" style="width: 29%; display: inline-block; vertical-align: middle; margin-top: 12px; font-weight: 600">DATE : </span> 
                <input type="date" name="date" value="<?= $filter['date'] ?>" class="form-control" required>
            </div>
            <div class="col-md-4 col-sm-12" style="display: flex;; align-items: center">
                <span class="label-span" style="width: 22%; display: inline-block; vertical-align: middle; margin-top: 5px; font-weight: 600">PLANT : </span> 
                <select id="plant" class="form-control" name="plant" style="width: 78%">
                    <?php foreach ($plant as $field): ?>
                        <option <?= $filter['plant'] == $field['CODE'] ? 'selected' : '' ?> value="<?= $field['CODE'] ?>"><?= $field['CODE'] ?> - <?= $field['CODE_NAME'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <!-- <div class="col-md-6 col-sm-12" style="display: flex;">
                <span class="label-span" style="width: 22%; display: inline-block; vertical-align: middle; margin-top: 5px; font-weight: 600">COLLECTOR : </span> 
                <select id="collector" class="form-control" name="collector" style="width: 78%">
                    <?php if ($filter['customer'] != '*'): ?>
                        <option value="<?= $filter['customer'] ?>"><?= str_replace('|', ' - ', $filter['customer']) ?></option>
                    <?php endif ?>
                </select>
            </div> -->
            <div class="col-md-2 col-sm-12" style="display: flex; align-items: center">
                <button type="submit" class="btn btn-primary btn-block" style="height: 30px">FILTER</button>
            </div>
            <div class="col-md-2 col-sm-12" style="display: flex; align-items: center">
                <button type="submit" formaction="<?= admin_url('visit/report-collector/excel') ?>" class="btn btn-info btn-block" style="height: 30px">EXCEL</button>
            </div>
        </div>
    </form>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-w-message" id="example1" style="width: 100% !important">
            <thead>
                <tr>
                    <th rowspan="2" style="text-align: center;">Site</th>
                    <th rowspan="2" style="text-align: center;">Name</th>
                    <th colspan="3" style="text-align: center;">Running</th>
                    <th colspan="3" style="text-align: center;">Stop</th>
                    <th colspan="3" style="text-align: center;">Total</th>
                </tr>
                <tr> 
                    <th style="text-align: center;">Target</th>
                    <th style="text-align: center;">Cash In</th>
                    <th style="text-align: center;">%</th>
                    <th style="text-align: center;">Target</th>
                    <th style="text-align: center;">Cash In</th>
                    <th style="text-align: center;">%</th>
                    <th style="text-align: center;">Target</th>
                    <th style="text-align: center;">Cash In</th>
                    <th style="text-align: center;">%</th>
                </tr>
            </thead>
            <tbody>
            <?php $tRunningTarget = 0; $tRunningCashIn = 0; $tStopTarget = 0; $tStopCashIn = 0; $tTotalTarget = 0; $tTotalCashIn = 0; ?>
            <?php if (!empty($datatable)): ?>
                <?php foreach ($datatable as $v): ?>  
                    <?php 
                        $defaultRoundedRunning  = 2;
                        $defaultRoundedStop     = 2;
                        $defaultRoundedTotal    = 2;
                        $runningIndex   = ($v['RUNNING_CASH_IN'] > 0 && $v['RUNNING_TARGET'] > 0) ? round(($v['RUNNING_CASH_IN'] / $v['RUNNING_TARGET']) * 100, $defaultRoundedRunning) : 0;
                        if ($v['RUNNING_CASH_IN'] > 0 && $v['RUNNING_TARGET'] > 0) {
                            while ($runningIndex <= 0 && $defaultRoundedRunning <= 5) {
                                $defaultRoundedRunning += 1;
                                $runningIndex   = ($v['RUNNING_CASH_IN'] > 0 && $v['RUNNING_TARGET'] > 0) ? round(($v['RUNNING_CASH_IN'] / $v['RUNNING_TARGET']) * 100, $defaultRoundedRunning) : 0;
                            }
                        }
                        $stopIndex      = ($v['STOP_CASH_IN'] > 0 && $v['STOP_TARGET'] > 0) ? round(($v['STOP_CASH_IN'] / $v['STOP_TARGET']) * 100, $defaultRoundedStop) : 0;
                        if ($v['STOP_CASH_IN'] > 0 && $v['STOP_TARGET'] > 0) {
                            while ($stopIndex <= 0 && $defaultRoundedStop <= 5) {
                                $defaultRoundedStop += 1;
                                $stopIndex      = ($v['STOP_CASH_IN'] > 0 && $v['STOP_TARGET'] > 0) ? round(($v['STOP_CASH_IN'] / $v['STOP_TARGET']) * 100, $defaultRoundedStop) : 0;
                            }
                        }

                        $cTarget    = $v['RUNNING_TARGET'] + $v['STOP_TARGET'];
                        $cCashIn    = $v['RUNNING_CASH_IN'] + $v['STOP_CASH_IN'];
                        $totalIndex = ($cCashIn > 0 && $cTarget > 0) ? round(($cCashIn / $cTarget) * 100, $defaultRoundedTotal) : 0;
                        if ($cCashIn > 0 && $cTarget > 0) {
                            while ($totalIndex <= 0 && $defaultRoundedTotal <= 5) {
                                $defaultRoundedTotal += 1;
                                $totalIndex      = ($cCashIn > 0 && $cTarget > 0) ? round(($cCashIn / $cTarget) * 100, $defaultRoundedTotal) : 0;
                            }
                        }

                        $tRunningTarget += $v['RUNNING_TARGET'];
                        $tRunningCashIn += $v['RUNNING_CASH_IN'];
                        $tStopTarget += $v['STOP_TARGET'];
                        $tStopCashIn += $v['STOP_CASH_IN'];
                        $tTotalTarget += $cTarget;
                        $tTotalCashIn += $cCashIn;
                    ?>
                    <tr>
                        <td style="text-align: left; white-space: nowrap;"><?= $v['COMPANY_ID'] ?></td>
                        <td style="text-align: left; white-space: nowrap;"><?= $v['EMPLOYEE_ID'].' - '.$v['EMPLOYEE_NAME'] ?></td>
                        <td style="text-align: right;"><?= formatRupiah($v['RUNNING_TARGET']) ?></td>
                        <td style="text-align: right;"><?= formatRupiah($v['RUNNING_CASH_IN']) ?></td>
                        <td style="text-align: right;"><?= $runningIndex ?>%</td>
                        <td style="text-align: right;"><?= formatRupiah($v['STOP_TARGET']) ?></td>
                        <td style="text-align: right;"><?= formatRupiah($v['STOP_CASH_IN']) ?></td>
                        <td style="text-align: right;"><?= $stopIndex ?>%</td>
                        <td style="text-align: right;"><?= formatRupiah($cTarget) ?></td>
                        <td style="text-align: right;"><?= formatRupiah($cCashIn) ?></td>
                        <td style="text-align: right;"><?= $totalIndex ?>%</td>
                    </tr>
               <?php endforeach ?>
            <?php endif ?>
            </tbody>
            <tfoot>
                <?php
                    $defaultRoundedRunning  = 2;
                    $defaultRoundedStop     = 2;
                    $defaultRoundedTotal    = 2;
                    $runningIndex   = ($tRunningCashIn > 0 && $tRunningTarget > 0) ? round(($tRunningCashIn / $tRunningTarget) * 100, $defaultRoundedRunning) : 0;
                    if ($tRunningCashIn > 0 && $tRunningTarget > 0) {
                        while ($runningIndex <= 0 && $defaultRoundedRunning <= 5) {
                            $defaultRoundedRunning += 1;
                            $runningIndex   = ($tRunningCashIn > 0 && $tRunningTarget > 0) ? round(($tRunningCashIn / $tRunningTarget) * 100, $defaultRoundedRunning) : 0;
                        }
                    }
                    $stopIndex      = ($tStopCashIn > 0 && $tStopTarget > 0) ? round(($tStopCashIn / $tStopTarget) * 100, $defaultRoundedStop) : 0;
                    if ($tStopCashIn > 0 && $tStopTarget > 0) {
                        while ($stopIndex <= 0 && $defaultRoundedStop <= 5) {
                            $defaultRoundedStop += 1;
                            $stopIndex      = ($tStopCashIn > 0 && $tStopTarget > 0) ? round(($tStopCashIn / $tStopTarget) * 100, $defaultRoundedStop) : 0;
                        }
                    }

                    $totalIndex      = ($tTotalCashIn > 0 && $tTotalTarget > 0) ? round(($tTotalCashIn / $tTotalTarget) * 100, $defaultRoundedStop) : 0;
                    if ($tTotalCashIn > 0 && $tTotalTarget > 0) {
                        while ($stopIndex <= 0 && $defaultRoundedStop <= 5) {
                            $defaultRoundedStop += 1;
                            $stopIndex      = ($tTotalCashIn > 0 && $tTotalTarget > 0) ? round(($tTotalCashIn / $tTotalTarget) * 100, $defaultRoundedStop) : 0;
                        }
                    }
                ?>
                <tr> 
                    <th colspan="2" style="text-align: right;">GRAND TOTAL</th>
                    <th style="text-align: right;"><?= formatRupiah($tRunningTarget) ?></th>
                    <th style="text-align: right;"><?= formatRupiah($tRunningCashIn) ?></th>
                    <th style="text-align: right;"><?= $runningIndex ?>%</th>
                    <th style="text-align: right;"><?= formatRupiah($tStopTarget) ?></th>
                    <th style="text-align: right;"><?= formatRupiah($tStopCashIn) ?></th>
                    <th style="text-align: right;"><?= $stopIndex ?>%</th>
                    <th style="text-align: right;"><?= formatRupiah($tTotalTarget) ?></th>
                    <th style="text-align: right;"><?= formatRupiah($tTotalCashIn) ?></th>
                    <th style="text-align: right;"><?= $totalIndex ?>%</th>
                </tr>
            </tfoot>
        </table>
    </div>
    
</div>

<script>
    $(function () {
      $('#example1').DataTable(
        {"language": {"paginate": { "previous": "&lt","next": "&gt",}}}
      );
      $('#plant').select2({
            theme: 'bootstrap4',
            language: "en",
            placeholder: "- PILIH PLANT -",
        }).on("change", function (e) {
              console.log('check');
              $("#customer").empty();
        });
        $('#drafter').select2({
            theme: 'bootstrap4',
            language: "en",
            placeholder: "- PILIH REGION -",
        }).on("change", function (e) {
              console.log('check');
        });
        $('#collector').select2({
            theme: 'bootstrap4',
            language: "en",
            placeholder: "- PILIH COLLECTOR -",
            allowClear: true,
            ajax: {
                url: "<?= base_url('ajax/load/customer') ?>",
                dataType: 'json',
                data: function (params) {
                  return {
                    q: params.term,
                    plant: $("#plant option:selected").val()
                  };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.CUSTOMER + " - " + item.CUSTOMER_NAME,
                                id: item.CUSTOMER + "|" + item.CUSTOMER_NAME,
                            }
                    })
                };
            }
        },
        }).on("change", function (e) {
              console.log('check');
        });
    })
</script>