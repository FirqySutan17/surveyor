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
            <!-- <img style="width: 150px;position: absolute;  text-align: left" src="<?= base_url('assets/img/logo.png') ?>" alt=""> -->
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
                    <td style="width: 35%; border: none">Employee Name : <strong>Firqy Sutan</strong> </td>
                    <td style="width: 45%; border: none">Employee ID : <strong>01220023</strong> </td>
                    <td style="width: 20%; border: none">Telephone : <strong>EXT.</strong> </td>
                </tr>
            </table>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 35%;">Section Name : <strong>Purchasing</strong> </td>
                    <td style="width: 45%;">Company : <strong>PT. CJ Feed and Care Indonesia</strong> </td>
                    <td style="width: 20%;">Code : <strong>11 2024</strong> </td>
                </tr>
            </table>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 100%;"><strong>EVIDENCE LIST</strong> </td>
                </tr>
            </table>
            <table style="width: 100%;">
                <tr>
                    <td style="text-align: center"><strong>DATE</strong> </td>
                    <td style="text-align: center"><strong>MEAL</strong> </td>
                    <td style="text-align: center"><strong>GASOLINE</strong> </td>
                    <td style="text-align: center"><strong>TOLL</strong> </td>
                    <td style="text-align: center"><strong>PARKING</strong> </td>
                    <td style="text-align: center"><strong>OTHERS</strong> </td>
                </tr>
                <tr>
                    <td style="text-align: center">11 NOV 2024</td>
                    <td style="text-align: center">
                        <div class="cat-column">
                            <!-- <img style="width: 100px; object-fit: contain; margin-bottom: 10px" src="<?= base_url('assets/img/logo.png') ?>" alt=""><br> -->
                            <p style="margin: 0px">Rp 325.000</p>
                            <p style="margin: 0px">-6.22592,106.8269568</p>
                        </div>
                        <div class="cat-column">
                            <!-- <img style="width: 100px; object-fit: contain; margin-bottom: 10px" src="<?= base_url('assets/img/logo.png') ?>" alt=""><br> -->
                            <p style="margin: 0px">Rp 325.000</p>
                            <p style="margin: 0px">-6.22592,106.8269568</p>
                        </div>
                    </td>
                    <td style="text-align: center">
                        <div class="cat-column">
                            <!-- <img style="width: 100px; object-fit: contain; margin-bottom: 10px" src="<?= base_url('assets/img/logo.png') ?>" alt=""><br> -->
                            <p style="margin: 0px">Rp 325.000</p>
                            <p style="margin: 0px">-6.22592,106.8269568</p>
                        </div>
                    </td>
                    <td style="text-align: center">
                        <div class="cat-column">
                            <!-- <img style="width: 100px; object-fit: contain; margin-bottom: 10px" src="<?= base_url('assets/img/logo.png') ?>" alt=""><br> -->
                            <p style="margin: 0px">Rp 325.000</p>
                            <p style="margin: 0px">-6.22592,106.8269568</p>
                        </div>
                    </td>
                    <td style="text-align: center">
                        <div class="cat-column">
                            <!-- <img style="width: 100px; object-fit: contain; margin-bottom: 10px" src="<?= base_url('assets/img/logo.png') ?>" alt=""><br> -->
                            <p style="margin: 0px">Rp 325.000</p>
                            <p style="margin: 0px">-6.22592,106.8269568</p>
                        </div>
                    </td>
                    <td style="text-align: center">
                        <div class="cat-column">
                            <!-- <img style="width: 100px; object-fit: contain; margin-bottom: 10px" src="<?= base_url('assets/img/logo.png') ?>" alt=""><br> -->
                            <p style="margin: 0px">Rp 325.000</p>
                            <p style="margin: 0px">-6.22592,106.8269568</p>
                        </div>
                    </td>
                </tr>
            </table>
            <table style="width: 100%;">
                <tr>
                    <td style="text-align: center"><strong>DATE</strong> </td>
                    <td style="text-align: center"><strong>MEAL</strong> </td>
                    <td style="text-align: center"><strong>GASOLINE</strong> </td>
                    <td style="text-align: center"><strong>TOLL</strong> </td>
                    <td style="text-align: center"><strong>PARKING</strong> </td>
                    <td style="text-align: center"><strong>OTHERS</strong> </td>
                </tr>
                <tr>
                    <td style="text-align: center">12 NOV 2024</td>
                    <td style="text-align: center">
                        <div class="cat-column">
                            <!-- <img style="width: 100px; object-fit: contain; margin-bottom: 10px" src="<?= base_url('assets/img/logo.png') ?>" alt=""><br> -->
                            <p style="margin: 0px">Rp 325.000</p>
                            <p style="margin: 0px">-6.22592,106.8269568</p>
                        </div>
                        <div class="cat-column">
                            <!-- <img style="width: 100px; object-fit: contain; margin-bottom: 10px" src="<?= base_url('assets/img/logo.png') ?>" alt=""><br> -->
                            <p style="margin: 0px">Rp 325.000</p>
                            <p style="margin: 0px">-6.22592,106.8269568</p>
                        </div>
                    </td>
                    <td style="text-align: center">
                        <div class="cat-column">
                            <!-- <img style="width: 100px; object-fit: contain; margin-bottom: 10px" src="<?= base_url('assets/img/logo.png') ?>" alt=""><br> -->
                            <p style="margin: 0px">Rp 325.000</p>
                            <p style="margin: 0px">-6.22592,106.8269568</p>
                        </div>
                    </td>
                    <td style="text-align: center">
                        <div class="cat-column">
                            <!-- <img style="width: 100px; object-fit: contain; margin-bottom: 10px" src="<?= base_url('assets/img/logo.png') ?>" alt=""><br> -->
                            <p style="margin: 0px">Rp 325.000</p>
                            <p style="margin: 0px">-6.22592,106.8269568</p>
                        </div>
                    </td>
                    <td style="text-align: center">
                        <div class="cat-column">
                            <!-- <img style="width: 100px; object-fit: contain; margin-bottom: 10px" src="<?= base_url('assets/img/logo.png') ?>" alt=""><br> -->
                            <p style="margin: 0px">Rp 325.000</p>
                            <p style="margin: 0px">-6.22592,106.8269568</p>
                        </div>
                    </td>
                    <td style="text-align: center">
                        <div class="cat-column">
                            <!-- <img style="width: 100px; object-fit: contain; margin-bottom: 10px" src="<?= base_url('assets/img/logo.png') ?>" alt=""><br> -->
                            <p style="margin: 0px">Rp 325.000</p>
                            <p style="margin: 0px">-6.22592,106.8269568</p>
                        </div>
                    </td>
                </tr>
            </table>
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
