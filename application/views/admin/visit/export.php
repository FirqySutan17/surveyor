<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		@font-face {
            font-family: cjfont;
            src: url('<?= asset("font/cjfont.ttf") ?>');
        }

        .bordered {
        	
        }
	</style>
</head>
<body>
	<table style="border-collapse:collapse;">
	    <thead>
	        <tr>
	            <th style="border:1px solid black; text-align: center;">BUSINESS AREA</th>
	            <th style="border:1px solid black; text-align: center;">BUSINESS AREA DESC</th>
	            <th style="border:1px solid black; text-align: center;">DATE</th>
	            <th style="border:1px solid black; text-align: center;">GROUP CUSTOMER</th>
	            <th style="border:1px solid black; text-align: center;">GC NAME</th>
	            <th style="border:1px solid black; text-align: center;">CUSTOMER</th>
	            <th style="border:1px solid black; text-align: center;">CUSTOMER NAME</th>
	            <th style="border:1px solid black; text-align: center;">BEGINNING</th>
	            <th style="border:1px solid black; text-align: center;">DEBIT</th>
	            <th style="border:1px solid black; text-align: center;">CREDIT</th>
	            <th style="border:1px solid black; text-align: center;">ENDING</th>
	            <th style="border:1px solid black; text-align: center;">C/D NOTE</th>
	            <th style="border:1px solid black; text-align: center;">CREDIT AMT</th>
	            <th style="border:1px solid black; text-align: center;">NORMAL</th>
	            <th style="border:1px solid black; text-align: center;">OVERDUE</th>
	            <th style="border:1px solid black; text-align: center;">STOP</th>
	            <th style="border:1px solid black; text-align: center;">SALESMAN</th>
	            <th style="border:1px solid black; text-align: center;">SALESMAN HP</th>
	        </tr>
	    </thead>
	    <tbody>
	    <?php $tBeginning = 0; $tDebit = 0; $tCredit = 0; $tEnding = 0; $tCreditDebitNote = 0; $tCreditAmt = 0; $tNormal = 0; $tOverdue = 0; $tStop = 0; ?>
	    <?php if (!empty($datatable)): ?>
	        <?php foreach ($datatable as $v): ?>  

	        <?php $tBeginning += $v['BEGINNING']; $tDebit = $v['DEBIT']; $tCredit = $v['CREDIT']; $tEnding = $v['ENDING']; $tCreditDebitNote = $v['CREDIT_DEBIT_NOTE']; $tCreditAmt = $v['CREDIT_AMT']; $tNormal = $v['NORMAL']; $tOverdue = $v['OVERDUE']; $tStop = $v['STOP']; ?>
	        <tr>
	            <td style="border:1px solid black; text-align: center; vertical-align: middle"><?= $v['BUSINESS_AREA'] ?></td>
	            <td style="border:1px solid black; text-align: center; vertical-align: middle"><?= $v['BUSINESS_AREA_DESC'] ?></td>
	            <td style="border:1px solid black; text-align: center; vertical-align: middle"><?= date('Y-m-d', strtotime($v['MMDDYYY'])) ?></td>
	            <td style="border:1px solid black; text-align: center; vertical-align: middle"><?= $v['GROUP_CUSTOMER'] ?></td>
	            <td style="border:1px solid black; text-align: center; vertical-align: middle"><?= $v['GROUP_CUSTOMER_NM'] ?></td>
	            <td style="border:1px solid black; text-align: center; vertical-align: middle"><?= $v['CUSTOMER'] ?></td>
	            <td style="border:1px solid black; text-align: center; vertical-align: middle"><?= $v['CUSTOMER_NM'] ?></td>
	            <td style="border:1px solid black; text-align: center; vertical-align: middle"><?= formatRupiah($v['BEGINNING']) ?></td>
	            <td style="border:1px solid black; text-align: center; vertical-align: middle"><?= formatRupiah($v['DEBIT']) ?></td>
	            <td style="border:1px solid black; text-align: center; vertical-align: middle"><?= formatRupiah($v['CREDIT']) ?></td>
	            <td style="border:1px solid black; text-align: center; vertical-align: middle"><?= formatRupiah($v['ENDING']) ?></td>
	            <td style="border:1px solid black; text-align: center; vertical-align: middle"><?= formatRupiah($v['CREDIT_DEBIT_NOTE']) ?></td>
	            <td style="border:1px solid black; text-align: center; vertical-align: middle"><?= formatRupiah($v['CREDIT_AMT']) ?></td>
	            <td style="border:1px solid black; text-align: center; vertical-align: middle"><?= formatRupiah($v['NORMAL']) ?></td>
	            <td style="border:1px solid black; text-align: center; vertical-align: middle"><?= formatRupiah($v['OVERDUE']) ?></td>
	            <td style="border:1px solid black; text-align: center; vertical-align: middle"><?= formatRupiah($v['STOP']) ?></td>
	            <td style="border:1px solid black; text-align: center; vertical-align: middle"><?= $v['SALESMAN'] ?></td>
	            <td style="border:1px solid black; text-align: center; vertical-align: middle"><?= $v['MOBILE_NO'] ?></td>
	        </tr>
	        <?php endforeach ?>
	    <?php endif ?>
	    </tbody>
	    <tfoot>
	        <tr>
	            <td style="border:1px solid black; text-align: right; vertical-align: middle" colspan="7">GRAND TOTAL</td>
	            <td style="border:1px solid black; text-align: center; vertical-align: middle"><?= formatRupiah($tBeginning) ?></td>
	            <td style="border:1px solid black; text-align: center; vertical-align: middle"><?= formatRupiah($tDebit) ?></td>
	            <td style="border:1px solid black; text-align: center; vertical-align: middle"><?= formatRupiah($tCredit) ?></td>
	            <td style="border:1px solid black; text-align: center; vertical-align: middle"><?= formatRupiah($tEnding) ?></td>
	            <td style="border:1px solid black; text-align: center; vertical-align: middle"><?= formatRupiah($tCreditDebitNote) ?></td>
	            <td style="border:1px solid black; text-align: center; vertical-align: middle"><?= formatRupiah($tCreditAmt) ?></td>
	            <td style="border:1px solid black; text-align: center; vertical-align: middle"><?= formatRupiah($tNormal) ?></td>
	            <td style="border:1px solid black; text-align: center; vertical-align: middle"><?= formatRupiah($tOverdue) ?></td>
	            <td style="border:1px solid black; text-align: center; vertical-align: middle"><?= formatRupiah($tStop) ?></td>
	            <td style="border:1px solid black;" colspan="2"></td>
	        </tr>
	    </tfoot>
	</table>
</body>
</html>