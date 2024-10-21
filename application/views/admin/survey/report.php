<style>
	.pre-posttest h3 {
		font-weight: 700;
		border-bottom: 2px solid #000;
		padding-bottom: 10px;
		margin-bottom: 10px;
	}

	.pre-posttest h4 {
		font-weight: 500;
		font-style: italic;
	}

	.qna {
		margin-bottom: 20px;
	}

	.qna label {
		font-weight: 500 !important;
	}

	.answer {
		margin-top: 10px;
	}

	input {
		display: inline-block;
		vertical-align: middle;
		margin-top: 2px !important;
		margin-right: 8px !important;
	}

	.question {
		font-size: 17px;
		font-weight: 600;
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
		border-radius: 10px;
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
		margin-bottom: 20px;
	}

	.divi-delayed-button-2:hover {
		background: #58a9ff;
	}

	.content-task {
		border-top: 1px solid #000;
		border-bottom: 1px solid #000;
		margin-bottom: 20px;
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

	@media (max-width: 600px) {
		.answer {
			margin-left: 0px;
		}

		input {
			margin-right: 10px !important;
		}

		[type="checkbox"],
		[type="radio"] {
			width: 30px !important;
		}

		.question {
			line-height: 25px;
			font-size: 18px;
		}
	}
</style>

<style>
	table.dataTable th {
		position: relative;
		text-align: center;
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

	table.dataTable thead > tr > th.sorting_asc,
	table.dataTable thead > tr > th.sorting_desc,
	table.dataTable thead > tr > th.sorting,
	table.dataTable thead > tr > td.sorting_asc,
	table.dataTable thead > tr > td.sorting_desc,
	table.dataTable thead > tr > td.sorting {
		padding: 10px 20px;
	}

	.table > tbody > tr > td,
	.table > tbody > tr > th,
	.table > tfoot > tr > td,
	.table > tfoot > tr > th,
	.table > thead > tr > td,
	.table > thead > tr > th {
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
		border: 0px solid transparent;
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
		padding: 0px;
	}

	.date-range {
		background-color: #000;
		color: #fff;
		text-align: center;
		width: 100%;
		padding: 8px 16px;
		border-radius: 0px 0px 10px 10px;
		border: 2px solid #000;
		font-weight: 600;
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

	table.table-bordered.dataTable th,
	table.table-bordered.dataTable td {
		font-size: 9px !important;
	}

	table.dataTable thead .sorting:after,
	table.dataTable thead .sorting_asc:after,
	table.dataTable thead .sorting_desc:after,
	table.dataTable thead .sorting_asc_disabled:after,
	table.dataTable thead .sorting_desc_disabled:after {
		bottom: 10px !important;
	}

	select.input-sm {
		height: 30px;
		line-height: 20px;
		margin: 0px 5px;
	}

	div.dataTables_wrapper div.dataTables_length select {
		width: 50px;
	}
	div.dataTables_wrapper div.dataTables_info {
		padding-top: 8px;
		white-space: nowrap;
		font-size: 10px !important;
	}
	.pagination > .disabled > a,
	.pagination > .disabled > a:focus,
	.pagination > .disabled > a:hover,
	.pagination > .disabled > span,
	.pagination > .disabled > span:focus,
	.pagination > .disabled > span:hover {
		font-size: 11px;
	}
	.pagination > .active > a,
	.pagination > .active > a:focus,
	.pagination > .active > a:hover,
	.pagination > .active > span,
	.pagination > .active > span:focus,
	.pagination > .active > span:hover {
		font-size: 11px;
	}
	div.dataTables_wrapper div.dataTables_length label {
		font-size: 11px;
	}
	td {
		height: auto;
		padding: 10px !important;
	}
	div.dataTables_wrapper div.dataTables_filter label {
		font-weight: normal;
		white-space: nowrap;
		text-align: left;
		font-size: 11px;
		display: inline-block;
		vertical-align: middle;
	}
	.pagination > li > a,
	.pagination > li > span {
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
		width: 100%;
	}
	.table-w-message {
		width: 100%;
	}
	.maps-frame {
        border:2px solid #C1C1C1; 
        border-radius: 10px;
        width: 100%;
        height: 100px;
    }
</style>

<div class="main-content pre-posttest">
    <h3 class="card-title">
        <strong>REPORT BY DISTRICTS</strong>
    </h3>
		<form class="form-horizontal" action="#" method="POST">
        <div class="row" style="padding: 0px 10px; border-bottom: 2px solid #000; padding-bottom: 8px;margin: 0px 0px; margin-bottom: 10px; ">
						<div class="col-md-6 col-sm-12" style="display: flex; margin-bottom: 10px">
                <span class="label-span" style="width: 50%; display: inline-block; vertical-align: middle; margin-top: 12px; font-weight: 600">START DATE : </span> 
                <input type="date" name="sdate" value="<?= $filter['sdate'] ?>" style="margin-left: 8px;" class="form-control" required>
            </div>
            <div class="col-md-6 col-sm-12" style="display: flex; margin-bottom: 10px">
                <span class="label-span" style="width: 50%; display: inline-block; vertical-align: middle; margin-top: 12px; font-weight: 600">END DATE : </span> 
                <input type="date" name="edate" value="<?= $filter['edate'] ?>" style="margin-left: 8px;" class="form-control" required>
            </div>
            <div class="col-md-6 col-sm-12" style="display: flex; margin-bottom: 10px">
                <span class="label-span" style="width: 50%; display: inline-block; vertical-align: middle; margin-top: 5px; font-weight: 600">PROVINCE : </span> 
                <select id="province" class="form-control" name="province" style="width: 100%">
                    <option <?= $filter['province'] == '*' ? 'selected' : '' ?> value="*">* - ALL PROVINCE </option>
                    <?php foreach ($province as $field): ?>
                        <option <?= $filter['province'] == $field['ID_PROVINCE'] ? 'selected' : '' ?> value="<?= $field['ID_PROVINCE'] ?>"><?= $field['PROVINCE'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
			<div class="col-md-6 col-sm-12" style="display: flex; margin-bottom: 10px">
                <span class="label-span" style="width: 50%; display: inline-block; vertical-align: middle; margin-top: 5px; font-weight: 600">REGENCIES : </span> 
                <select id="regencies" class="form-control" name="regencies" style="width: 100%">
					<option <?= $filter['regencies'] == '*' ? 'selected' : '' ?> value="*">* - ALL REGENCIES </option>
                    <?php foreach ($regencies as $field): ?>
                        <option <?= $filter['regencies'] == $field['ID_REGENCIES'] ? 'selected' : '' ?> value="<?= $field['ID_REGENCIES'] ?>"><?= $field['REGENCIES'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
						
            <div class="col-md-12 col-sm-12" style="display: flex;">
                <button type="submit" class="btn btn-primary btn-block" style="height: 30px">FILTER</button>
            </div>
        </div>
    </form>
    <table class="table table-bordered table-hover" id="example1">
        <thead>
            <tr>
				<th rowspan="2">KECAMATAN</th>
                <th rowspan="2">AREA</th>
                <th rowspan="2">EST. AREA TANAM (HA)</th>
                <th rowspan="2">EST. AREA TANAM (%)</th>
                <th rowspan="2">ACTUAL TANAM (HA)</th>
                <th rowspan="2">TOTAL PRODUKSI (MT)</th>
                <th colspan="4">USIA TANAM</th>
                <th colspan="9">PANEN - ESTIMASI QTY - MT</th>
            </tr>
            <tr>

                <th>0-1 BULAN</th>
                <th>1-2 BULAN</th>
                <th>2-3 BULAN</th>
                <th>> 3 BULAN</th>
                <th colspan="1">JANUARI</th>
                <th colspan="1">FEBRUARI</th>
                <th colspan="1">MARET</th>
            </tr>
        </thead>
        <tbody>
			<?php foreach ($datatable as $i => $v): ?>
            <tr>
				<td style="white-space: nowrap;"><?= $v['DISTRICTS'] ?></td>
                <td style="white-space: nowrap;"><?= $v['PROVINCE'] ?> - <?= $v['REGENCIES'] ?></td>
                <td style="text-align: center"><?= number_format($v['PLANT_AREA']) ?></td>
                <td style="text-align: center"><?= $v['PLANT_AREA_ESTIMATE'] < 1 ? '0'.$v['PLANT_AREA_ESTIMATE'] : $v['PLANT_AREA_ESTIMATE'] ?>%</td>
                <td style="text-align: center"><?= number_format($v['TOTAL_LAHAN']) ?></td>
                <td style="text-align: center"><?= number_format($v['TOTAL_PRODUKSI']) ?></td>
                <td style="text-align: center"><?= $v['DAY30'] ?>%</td>
                <td style="text-align: center"><?= $v['DAY60'] ?>%</td>
                <td style="text-align: center"><?= $v['DAY90'] ?>%</td>
                <td style="text-align: center"><?= $v['DAY90PLUS'] ?>%</td>
                <td style="text-align: center">00 MT</td>
                <td style="text-align: center">00 MT</td>
                <td style="text-align: center">00 MT</td>
            </tr>
			<?php endforeach ?>
            <!-- Tambahkan baris lainnya sesuai dengan data -->
        </tbody>
    </table>
</div>

<script src="<?= asset('vendor/select2/js/select2.min.js') ?>"></script>
<script src="<?= asset('vendor/select2/js/en.js') ?>"></script>
<script src="<?= asset('vendor/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= asset('vendor/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>

<script>
    $(function () {
      $('#example1').DataTable(
        {"language": {"paginate": { "previous": "&lt","next": "&gt",}}}
      );
    })

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
</script>