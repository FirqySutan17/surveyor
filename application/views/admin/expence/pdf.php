<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EVIDENCE REPORT</title>
    <link rel="icon" href="<?= base_url('assets/img/cj-logo.png') ?>" type="image/x-icon">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            /* width: 70%; */
            /* margin: auto; */
            border: 1px solid black;
            /* padding: 20px; */
        }
        .header, .footer {
            text-align: center;
        }
        .content {
            margin-top: 20px;
            font-size: 12px;
            padding: 20px
        }
        .content table {
            width: 100%;
            border-collapse: collapse;
        }
        .content th, .content td {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
        }
        .content th {
            background-color: #f2f2f2;
        }
        .footer {
            margin-top: 10px;
            margin-bottom: 20px;
            font-size: 12px;
        }
        .signature {
            margin-top: 50px;
            text-align: center;
        }
        .cat-column {
            border-bottom: 1px solid #000; 
            padding: 10px 0px;
        }
        .cat-column:last-child {
            border-bottom: 0px solid #fff;
        }
        .cat-column-2 {
            border-right: 1px solid #000; 
            padding: 10px 0px;
        }
        .cat-column-2:last-child {
            border-right: 0px solid #fff;
        }
        .cat-row {
            display: flex;
            /* width: 100%;
            grid-template-columns: repeat(8, 1fr);
            column-gap: 10px; */
        }
        /* .cat-column-2 {
            grid-column: span 2;
        } */
        p {
            font-size: 9px !important
        }
    </style>
</head>
<body>
    
    <div class="container">
        <div class="header">
            <img style="width: 150px;position: absolute;  text-align: left" src="<?= base_url('assets/img/logo.png') ?>" alt="">
            <h2 style="margin:50px 0px 0px 0px;">EVIDENCE REPORT</h2>
            <h6 style="margin:0px;">
                DATE : <?php $currentDateTime = new DateTime('now');
                             $currentDate = $currentDateTime->format('d-m-Y');
                        echo $currentDate; ?>
            </h6>
        </div>

        <div class="content">
            <table style="width: 100%; border: none">
                <tr>
                    <td style="width: 35%; border: none">Employee Name : <strong><?= $expense['master']['NAME'] ?></strong> </td>
                    <td style="width: 35%; border: none">Employee ID : <strong><?= $expense['master']['EMPLOYEE_ID'] ?></strong> </td>
                    <td style="width: 30%; border: none">Email : <strong><?= $expense['master']['EMAIL'] ?></strong> </td>
                </tr>
            </table>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 35%;">Section Name : <strong>Purchasing</strong> </td>
                    <td style="width: 35%;">Site : <strong><?= $expense['master']['PLANT'] ?></strong> </td>
                    <td style="width: 30%;">Month : <strong><?= $expense['master']['MONTH'] ?></strong> </td>
                </tr>
            </table>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 100%;"><strong>EVIDENCE LIST</strong> </td>
                </tr>
            </table>
            <?php if(!empty($expense['detail'])): ?>
                <?php $grand_total = [
                    'MEAL'      => 0,
                    'GASOLINE'  => 0,
                    'TOLL'      => 0,
                    'PARKING'   => 0,
                    'OTHERS'    => 0
                ]; ?>
                <?php foreach($expense['detail'] as $detail): ?>
                    <table style="width: 100%;">
                        <?php $total_meal = 0; $total_gasoline = 0; $total_toll = 0; $total_parking = 0; $total_others = 0; ?>
                        <tr>
                            <td style="text-align: center"><strong>DATE</strong> </td>
                            <td style="text-align: center"><strong>MEAL</strong> </td>
                            <td style="text-align: center"><strong>GASOLINE</strong> </td>
                            <td style="text-align: center"><strong>TOLL</strong> </td>
                            <td style="text-align: center"><strong>PARKING</strong> </td>
                            <td style="text-align: center"><strong>OTHERS</strong> </td>
                        </tr>
                        <tr>
                            <td style="text-align: center"><?= convDate($detail['DATE']) ?></td>
                            <td style="text-align: center">
                                <?php if(!empty($detail['MEAL'])): ?>
                                    <?php foreach($detail['MEAL'] as $d): ?>
                                        <?php $total_meal += $d['AMOUNT']; ?>
                                        <div class="cat-column">
                                            <img style="width: 100px; object-fit: contain; margin-bottom: 10px" src="<?= base_url('upload/'.$d['IMAGE']) ?>" alt=""><br>
                                            <p style="margin: 0px">Rp <?= number_format($d['AMOUNT'])  ?></p>
                                            <p style="margin: 0px"><?= $d['COORDINATE'] ?></p>
                                        </div>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </td>
                            <td style="text-align: center">
                                <?php if(!empty($detail['GASOLINE'])): ?>
                                    <?php foreach($detail['GASOLINE'] as $d): ?>
                                        <?php $total_gasoline += $d['AMOUNT']; ?>
                                        <div class="cat-column">
                                            <img style="width: 100px; object-fit: contain; margin-bottom: 10px" src="<?= base_url('upload/'.$d['IMAGE']) ?>" alt=""><br>
                                            <p style="margin: 0px">Rp <?= number_format($d['AMOUNT'])  ?></p>
                                            <p style="margin: 0px"><?= $d['COORDINATE'] ?></p>
                                        </div>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </td>
                            <td style="text-align: center">
                                <?php if(!empty($detail['TOLL'])): ?>
                                    <?php foreach($detail['TOLL'] as $d): ?>
                                        <?php $total_toll += $d['AMOUNT']; ?>
                                        <div class="cat-column">
                                            <img style="width: 100px; object-fit: contain; margin-bottom: 10px" src="<?= base_url('upload/'.$d['IMAGE']) ?>" alt=""><br>
                                            <p style="margin: 0px">Rp <?= number_format($d['AMOUNT'])  ?></p>
                                            <p style="margin: 0px"><?= $d['COORDINATE'] ?></p>
                                        </div>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </td>
                            <td style="text-align: center">
                                <?php if(!empty($detail['PARKING'])): ?>
                                    <?php foreach($detail['PARKING'] as $d): ?>
                                        <?php $total_parking += $d['AMOUNT']; ?>
                                        <div class="cat-column">
                                            <img style="width: 100px; object-fit: contain; margin-bottom: 10px" src="<?= base_url('upload/'.$d['IMAGE']) ?>" alt=""><br>
                                            <p style="margin: 0px">Rp <?= number_format($d['AMOUNT'])  ?></p>
                                            <p style="margin: 0px"><?= $d['COORDINATE'] ?></p>
                                        </div>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </td>
                            <td style="text-align: center">
                                <?php if(!empty($detail['OTHERS'])): ?>
                                    <?php foreach($detail['OTHERS'] as $d): ?>
                                        <?php $total_others += $d['AMOUNT']; ?>
                                        <div class="cat-column">
                                            <img style="width: 100px; object-fit: contain; margin-bottom: 10px" src="<?= base_url('upload/'.$d['IMAGE']) ?>" alt=""><br>
                                            <p style="margin: 0px">Rp <?= number_format($d['AMOUNT'])  ?></p>
                                            <p style="margin: 0px"><?= $d['COORDINATE'] ?></p>
                                        </div>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center"></td>
                            <td style="text-align: center"><strong>Rp. <?= number_format($total_meal) ?></strong> </td>
                            <td style="text-align: center"><strong>Rp. <?= number_format($total_gasoline) ?></strong> </td>
                            <td style="text-align: center"><strong>Rp. <?= number_format($total_toll) ?></strong> </td>
                            <td style="text-align: center"><strong>Rp. <?= number_format($total_parking) ?></strong> </td>
                            <td style="text-align: center"><strong>Rp. <?= number_format($total_others) ?></strong> </td>
                        </tr>
                        <?php $grand_total['MEAL'] += $total_meal; $grand_total['GASOLINE'] += $total_gasoline; $grand_total['TOLL'] += $total_toll; $grand_total['PARKING'] += $total_parking; $grand_total['OTHERS'] += $total_others; ?>
                    </table>
                <?php endforeach ?>
                <table style="width: 100%;">
                    <tr>
                        <td style="text-align: center"></td>
                        <td style="text-align: center"><strong>Rp. <?= number_format($grand_total['MEAL']) ?></strong> </td>
                        <td style="text-align: center"><strong>Rp. <?= number_format($grand_total['GASOLINE']) ?></strong> </td>
                        <td style="text-align: center"><strong>Rp. <?= number_format($grand_total['TOLL']) ?></strong> </td>
                        <td style="text-align: center"><strong>Rp. <?= number_format($grand_total['PARKING']) ?></strong> </td>
                        <td style="text-align: center"><strong>Rp. <?= number_format($grand_total['OTHERS']) ?></strong> </td>
                    </tr>
                </table>
            <?php endif ?>
        </div>

        <div class="footer">
            <table style="width: 100%">
                <tr>
                    <td style="width: 50%"></td>
                    <td style="width: 50%;text-align: center">Disetujui, <br>HR Management</td>
                </tr>
                <tr>
                    <td style="height: 70px"></td>
                    <td style="height: 70px"></td>
                </tr>
                <tr>
                    <td style="text-align: center">(........................................)</td>
                    <td style="text-align: center">(........................................)</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="text-align: center"></td>
                </tr>
            </table>
            <!-- <p>Disetujui,</p>
            <p>Div. Kemitraan</p>
            <div class="signature">
                <p>(N/A)</p>
                <p>Cat. D.O ini hanya berlaku untuk 1 kali pengambilan</p>
                <p>(N/A)</p>
            </div> -->
        </div>
    </div>
</body>
</html>
