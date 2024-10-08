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
	.maps-frame {
        border:2px solid #C1C1C1; 
        border-radius: 10px;
        width: 100%;
        height: 100px;
    }

	dialog {
	padding: 1rem 3rem;
	background: white;
	width: 80%;
	padding-top: 2rem;
	border-radius: 20px;
	border: 0;
	box-shadow: 0 5px 30px 0 rgba(0, 0, 0, 0.1);
	-webkit-animation: fadeIn 1s ease both;
			animation: fadeIn 1s ease both;
	position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
	}
	dialog::-webkit-backdrop {
	-webkit-animation: fadeIn 1s ease both;
			animation: fadeIn 1s ease both;
	background: rgba(255, 255, 255, 0.4);
	z-index: 2;
	-webkit-backdrop-filter: blur(5px);
			backdrop-filter: blur(5px);
	}
	dialog::backdrop {
	-webkit-animation: fadeIn 1s ease both;
			animation: fadeIn 1s ease both;
	background: rgba(255, 255, 255, 0.4);
	z-index: 2;
	-webkit-backdrop-filter: blur(5px);
			backdrop-filter: blur(5px);
	}
	dialog .x {
	filter: grayscale(1);
	border: none;
	background: none;
	position: absolute;
	top: 15px;
	right: 20px;
	transition: ease filter, transform 0.3s;
	cursor: pointer;
	transform-origin: center;
	}
	dialog .x:hover {
	filter: grayscale(0);
	transform: scale(1.1);
	}
	dialog h2 {
	font-weight: 600;
	font-size: 2rem;
	padding-bottom: 1rem;
	}
	dialog p {
	font-size: 1rem;
	line-height: 1.3rem;
	padding: 0.5rem 0;
	}
	dialog p a:visited {
	color: rgb(var(--vs-primary));
	}
	.table-maps-date {
		width: 30%
	}
	.table-maps-image {
		width: 30%
	}
	.table-maps-frame {
		width: 30%
	}
	@media (max-width: 1024px) {
		dialog {
			padding: 1rem 1.5rem;
			width: 95%;
		}
		.table-maps {
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
		}
		.table-maps-date {
			width: 100%
		}
		.table-maps-image {
			width: 100%
		}
		.table-maps-frame {
			width: 100%
		}
	}
</style>

<div class="main-content pre-posttest">
    <h3 class="card-title">
        <strong>DATA - ATTENDANCE</strong>
    </h3>
	<form class="form-horizontal" action="#" method="POST">
        <div class="row" style="padding: 0px 10px; border-bottom: 2px solid #000; padding-bottom: 10px;margin: 0px 0px; margin-bottom: 10px; ">
			<div class="col-md-4 col-sm-12" style="display: flex; margin: 10px 0px">
                <span class="label-span" style="width: 29%; display: inline-block; vertical-align: middle; margin-top: 8px; font-weight: 600">DATE : </span> 
                <input type="date" name="datemonth" value="<?= $filter['datemonth'] ?>" class="form-control" required>
            </div>
			<div class="col-md-6 col-sm-12" style="display: flex;; align-items: center">
                
            </div>            
            <div class="col-md-2 col-sm-12" style="display: flex; align-items: center">
                <button type="submit" class="btn btn-primary btn-block" style="height: 30px">FILTER</button>
            </div>
            <!-- <div class="col-md-2 col-sm-12" style="display: flex; align-items: center">
                <button type="submit" formaction="<?= admin_url('survey/report/excel') ?>" class="btn btn-info btn-block" style="height: 30px">EXCEL</button>
            </div> -->
        </div>
    </form>
	<div class="table-responsive">
		<table class="table table-bordered table-hover" id="example1">
			<thead>
				<tr>
					<th style="text-align: center;">NO</th>
					<th style="text-align: center;">DATE</th>
									<th style="text-align: center;">NAME</th>
					<th style="text-align: center;">CHECK IN</th>
					<th style="text-align: center;">CHECK OUT</th>
					<th style="text-align: center;">LOCATION</th>
				</tr>
			</thead>
			<tbody>
						<?php foreach ($datatable as $i => $v): ?>
							<?php
								$path_in = $v['PLANT'].'/'.$v['PLANT'].'_'.$v['EMPNO'].'_'.$v['ATTEND_DATE'].'_IN.jpg'; 
								$path_out = $v['PLANT'].'/'.$v['PLANT'].'_'.$v['EMPNO'].'_'.$v['ATTEND_DATE'].'_OUT.jpg'; 
							?>
							<tr>
									<td style="text-align: center; vertical-align: middle"><?= $i + 1 ?></td>
									<td style="text-align: center; vertical-align: middle"><?= date('Y-m-d', strtotime($v['ATTEND_DATE'])) ?></td>
									<td style="text-align: center; vertical-align: middle"><?= $v['FULL_NAME'] ?></td>
									<td style="text-align: center; vertical-align: middle"><?= date('H:i:s', strtotime($v['TIME_IN'])) ?></td>
									<td style="text-align: center; vertical-align: middle"><?= !empty($v['TIME_OUT']) ? date('H:i:s', strtotime($v['TIME_OUT'])) : '-' ?></td>
									<td style="text-align: center; vertical-align: middle">
										<button id="btn-detail-<?= $i ?>" data-name="<?= $v['FULL_NAME'] ?>"  data-tanggal="<?= date('d/m/Y', strtotime($v['ATTEND_DATE'])) ?>" data-timein="<?= date('H:i:s', strtotime($v['TIME_IN'])) ?>" data-coordinatein="<?= $v['REG_IN_OS'] ?>" data-timeout="<?= !empty($v['TIME_OUT']) ? date('H:i:s', strtotime($v['TIME_OUT'])) : '-' ?>" data-coordinateout="<?= $v['REG_OUT_OS'] ?>" data-imagein="<?= $path_in ?>" data-imageout="<?= $path_out ?>" class="primary" onclick="showDetail('<?= $i ?>')" style="background: none; border: none;"><i class="fas fa-location-crosshairs text-warning" style="font-size: 16px; margin-top: 5px"></i></button>
										<!-- <a href="<?= admin_url('survey/detail') ?>" target="_blank" class="btn btn-sm" title="Detail"><i class="fas fa-eye text-primary"></i></a> -->
									</td>
							</tr>
						<?php endforeach ?>
			</tbody>
		</table>
	</div>
    <dialog id="dialog">
			<h2>USER LOCATION</h2>
			<table class="table table-bordered" style="margin-bottom: 10px">
							<thead>
									<tr>
											<th style="text-align: center">EMPLOYEE</th>
									</tr>
					
							</thead>
							<tbody>
									<tr>
											<td id="detail-name" data-label="EMPLOYEE" style="text-align: center">
													-
											</td>
									</tr>
					
							</tbody>
					</table>
					<table class="table table-bordered" style="margin-bottom: 10px">
							<thead>
					<tr>
						<th colspan="3" style="text-align: center">CHECK IN</th>
					</tr>
							</thead>
							<tbody>
								<tr class="table-maps">
									<th class="table-maps-date" style="text-align: center;" id="detail-checkin">-</th>
									<th class="table-maps-image" style="text-align: center;" id="detail-imagein">-</th>
									<th class="table-maps-frame" style="text-align: center;">
										<iframe id="detail-frame-in" style="height: 300px; width: 100%; margin: 10px 0px" class="maps-frame" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d32658969.626560632!2d95.9556841630188!3d-2.268827313454851!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c4c07d7496404b7%3A0xe37b4de71badf485!2sIndonesia!5e0!3m2!1sid!2sid!4v1728009870092!5m2!1sid!2sid&zoom=15" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
									</th>
								</tr>
							</tbody>
					</table>
			<table class="table table-bordered" style="margin-bottom: 10px">
							<thead>
					<tr>
						<th colspan="3" style="text-align: center">CHECK OUT</th>
					</tr>
							</thead>
							<tbody>
							<tr class="table-maps">
								<th class="table-maps-date" style="text-align: center;" id="detail-checkout">-</th>
								<th class="table-maps-image" style="text-align: center;" id="detail-imageout">-</th>
								<th class="table-maps-frame" style="text-align: center;"><iframe id="detail-frame-out" style="height: 300px; width: 100%; margin: 10px 0px" class="maps-frame" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d32658969.626560632!2d95.9556841630188!3d-2.268827313454851!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c4c07d7496404b7%3A0xe37b4de71badf485!2sIndonesia!5e0!3m2!1sid!2sid!4v1728009870092!5m2!1sid!2sid&zoom=15" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></th>
							</tr>
							</tbody>
					</table>
			<button onclick="window.dialog.close();" aria-label="close" class="x">❌</button>
	</dialog>
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

		function showDetail(id) {
			let name = $("#btn-detail-" + id).data('name');
			let tanggal = $("#btn-detail-" + id).data('tanggal');
			let coordinatein = $("#btn-detail-" + id).data('coordinatein');
			let imagein = $("#btn-detail-" + id).data('imagein');
			let timein = $("#btn-detail-" + id).data('timein');

			let coordinateout = $("#btn-detail-" + id).data('coordinateout');
			let timeout = $("#btn-detail-" + id).data('timeout');
			let imageout = $("#btn-detail-" + id).data('imageout');

                                        
			let image_in = `<img style="height: 300px; width: 300px; margin-top: 10px; object-fit: contain" class="selfie-prv" src="<?= base_url('uploads/') ?>${imagein}" />`;
			let frame_in = `https://maps.google.com/maps?q=${coordinatein}&output=embed&zoom=15`;
			let frame_out = `https://maps.google.com/maps?q=${coordinateout}&output=embed&zoom=15`;

			$("#detail-name").text(name);
			$("#detail-checkin").text(timein + " " + tanggal);
			$("#detail-checkout").text(timeout + " " + tanggal);
			$("#detail-frame-in").attr('src', frame_in);
			$("#detail-imagein").html(image_in);
			if (timeout != '-') {
				                                        
				let image_in = `<img style="height: 300px; width: 300px; margin-top: 10px; object-fit: contain" class="selfie-prv" src="<?= base_url('uploads/') ?>${imageout}" />`;
				$("#detail-frame-out").attr('src', frame_out);
				$("#detail-imageout").html(image_in);
			}
			window.dialog.showModal();
		}

	$('#warehouse').select2({
        theme: 'bootstrap4',
        language: "en",
        placeholder: "- SELECT USER NAME -",
    });
</script>