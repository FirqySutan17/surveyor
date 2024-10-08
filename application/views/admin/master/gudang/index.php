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
		font-size: 10px !important;
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
</style>

<div class="main-content pre-posttest">
    <h3 class="card-title">
        <strong>DATA - WAREHOUSE</strong>
    </h3>
	<form class="form-horizontal" action="#" method="POST">
        <div class="row" style="padding: 0px 10px; border-bottom: 2px solid #000; padding-bottom: 10px;margin: 0px 0px; margin-bottom: 10px; ">
			<div class="col-md-6 col-sm-12" style="display: flex;; align-items: center; margin-bottom: 10px">
                <span class="label-span" style="width: 35%; display: inline-block; vertical-align: middle; margin-top: 0px; font-weight: 600">WAREHOUSE : </span> 
                <select id="warehouse" class="form-control" name="warehouse" >
					<option value="*" selected>- ALL WAREHOUSE -</option>
                    <?php foreach ($warehouse as $field): ?>
                        <option <?= $filter['warehouse'] == $field['CODE'] ? 'selected' : '' ?> value="<?= $field['CODE'] ?>"><?= $field['NAMA'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
			<div class="col-md-6 col-sm-12" style="display: flex;; align-items: center">
                <span class="label-span" style="width: 35%; display: inline-block; vertical-align: middle; margin-top: 0px; font-weight: 600">AREA : </span> 
                <select id="area" class="form-control" name="area" >
					<option value="*" selected>- ALL AREA -</option>
                    <?php foreach ($area as $field): ?>
                        <option <?= $filter['area'] == $field['AREA'] ? 'selected' : '' ?> value="<?= $field['AREA'] ?>"><?= $field['AREA'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>  
			<div class="col-md-6 col-sm-12" style="display: flex;; align-items: center">
                <span class="label-span" style="width: 35%; display: inline-block; vertical-align: middle; margin-top: 0px; font-weight: 600">CLASSIFICATION : </span> 
                <select id="klasifikasi" class="form-control" name="klasifikasi" >
					<option value="*" selected>- ALL CLASSIFICATION -</option>
                    <?php foreach ($klasifikasi as $field): ?>
                        <option <?= $filter['klasifikasi'] == $field['CLASSIFICATION'] ? 'selected' : '' ?> value="<?= $field['CLASSIFICATION'] ?>"><?= $field['CLASSIFICATION'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
			     
            <div class="col-md-6 col-sm-12" style="display: flex; align-items: center; justify-content: center">
                <button type="submit" class="btn btn-primary btn-block" style="height: 30px">FILTER</button>
            </div>
            <!-- <div class="col-md-2 col-sm-12" style="display: flex; align-items: center">
                <button type="submit" formaction="<?= admin_url('visit/report-collector/excel') ?>" class="btn btn-info btn-block" style="height: 30px">EXCEL</button>
            </div> -->
        </div>
    </form>
    <table class="table table-bordered table-hover" id="example1">
        <thead>
            <tr>
                <th style="text-align: center;">NO</th>
                <th style="text-align: center;">CODE</th>
                <th style="text-align: center;">WAREHOUSE</th>
                <th style="text-align: center;">PHONE NUMBER</th>
                <th style="text-align: center;">CLASSIFICATION</th>
                <th style="text-align: center;">CAPACITY</th>
                <th style="text-align: center;">CATEGORY</th>
                <th style="text-align: center;">AREA</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datatable as $i => $v): ?>
                <tr>
                    <td style="text-align: center; vertical-align: middle"><?= $i + 1 ?></td>
                    <td style="text-align: center; vertical-align: middle"><?= $v['CODE'] ?></td>
                    <td style="text-align: center; vertical-align: middle"><?= $v['NAMA'] ?></td>
                    <td style="text-align: center; vertical-align: middle"><?= $v['PHONE_NUMBER'] ?></td>
                    <td style="text-align: center; vertical-align: middle"><?= $v['CLASSIFICATION'] ?></td>
                    <td style="text-align: center; vertical-align: middle"><?= $v['CAPACITY'] ?></td>
                    <td style="text-align: center; vertical-align: middle"><?= $v['KATEGORI'] ?></td>
                    <td style="text-align: center; vertical-align: middle"><?= $v['AREA'] ?></td>
					<!-- <td style="text-align: center; vertical-align: middle">
                        <a href="<?= admin_url('master/warehouse/detail/'.$v['CODE']) ?>" class="btn btn-sm"><i class="fas fa-eye text-success"></i></a>
                        <a href="<?= admin_url('master/warehouse/edit/'.$v['CODE']) ?>" class="btn btn-sm"><i class="fas fa-pen text-warning"></i></a>
                        <a href="<?= admin_url('master/warehouse/delete/'.$v['CODE']) ?>" class="btn btn-sm"><i class="fas fa-trash text-danger"></i></a>
                    </td> -->
                </tr>
            <?php endforeach ?>
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
    });

	$('#warehouse').select2({
        theme: 'bootstrap4',
        language: "en",
        placeholder: "- SELECT WAREHOUSE -",
    });

	$('#area').select2({
        theme: 'bootstrap4',
        language: "en",
        placeholder: "- SELECT AREA -",
    });
	$('#klasifikasi').select2({
        theme: 'bootstrap4',
        language: "en",
        placeholder: "- SELECT CLASSIFICATION -",
    });
</script>