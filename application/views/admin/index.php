<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<link rel="stylesheet" href="<?= base_url('assets/leaflet/leaflet.legend.css') ?>" />
<style>
    .db-box h4 {
        font-weight: 700;
        font-style: italic;
        color: #fff
    }

  ul.calendar-dashboard {
    display: grid;
    grid-template-columns: repeat(16, 1fr);
    flex-wrap: wrap;
    list-style: none;
  }

  ul.calendar-dashboard li.calendar-item {
    display: flex;
    width: 100%;
    height: 100%;
    flex-flow: column;
    /* border-radius: 0.2rem; */
    font-weight: 300;
    font-size: 0.8rem;
    box-sizing: border-box;
    /* background: rgba(255, 255, 255, 0.25); */
    /* box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37); */
    backdrop-filter: blur(4px);
    -webkit-backdrop-filter: blur(4px);
    border-radius: 0px;
    border: 1px solid rgba(255, 255, 255, 0.6);
    grid-column: span 2;
  }

  ul.calendar-dashboard li.calendar-item time {
    font-size: 20px;
    margin: 0 0 1rem 0;
    font-weight: 500;
  }

  ul.calendar-dashboard li.calendar-item.today {
    background: #a12a2f;
    color: #fff !important;
  }

  ul.calendar-dashboard li.calendar-item.today a{
    color: #fff;
  }

  ul.calendar-dashboard .today time {
    font-weight: 800;
  }
  .date-flow{
    display: flex;
    flex-direction: column
  }
  .db-table {
    display: grid;
    grid-template-columns: repeat(8, 1fr);
    column-gap: 10px;
  }
  .db-table .db-box {
    grid-column: span 4;
    text-align: center;
    width: 100%;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
    background: rgba(255, 255, 255, 0.2);
    border: 1px solid rgba(255, 255, 255, 0.5);
    padding: 20px 10px;
    border-radius: 10px;
    margin-bottom: 10px
  }
  .date-item {
    text-align: center;
    font-size: 14px;
    background-color: rgba(255,255,255,0.1);
    color: #fff;
    padding: 5px;
    /* border-radius: 5px; */
    margin-bottom: 0.5px;
    height: 26px;
  }
  .sum-report {
    font-size: 11px;
    color: #000;
    text-align: right;
    width: 100%;
    font-family: "Poppins", sans-serif;
    font-weight: 700;
    padding: 5px;
    background-color: rgba(255,255,255,0.3);
    /* border: 1px solid rgba(255, 255, 255, 0.6); */
    /* margin: 0.5px 0px; */
    /* color: #f00; */
    color": #000;
  }
  .title-box {
    width: 20%
  }
  .date-item.active {
    background: red;
    color: #fff;
  }
  .sum-report.active {
    background: #ff7f7f;
    color: #fff;
  }
  .switch {
    position: relative;
    display: inline-block;
    width: 50px;
    height: 25px;
  }

    .switch input { 
    opacity: 0;
    width: 0;
    height: 0;
    }

    .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
    height: auto !important;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 20px;
        width: 20px;
        left: 5px;
        bottom: 3px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
    background-color: #2196F3;
    }

    input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
    border-radius: 34px;
    }

    .slider.round:before {
    border-radius: 50%;
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
        font-size: 20px;
        font-weight: 700;
        text-decoration: none;
        margin-top: 20px;
        margin-bottom: 20px;
        font-size: 18px !important;
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
        .db-table .db-box {
          grid-column: span 8
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
        padding: 10px !important;
        font-size: 10px !important;
        background: #edecec !important;
        border: 1.5px solid #fff !important;
    }
    th {
      font-size: 11px !important;
      color: #fff !important;
      border: 1.5px solid #fff !important;
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
    #map{
        border: 2px solid #fff;
    }
    .information-box {
        background: #fff;
        padding: 20px;
        margin: 20px 0px;
        border-radius: 10px;
        border: 2px solid red;
        height: auto;
    }

    .information-box hr {
        margin: 5px 0px;
        height: 2px;
        color: red;
    }
    .information-box ul li {
        padding-top: 10px;
        margin-left: 20px;
        border-bottom : 1px solid #000;
        padding-bottom: 10px
    }
    .information-box ul li:last-child {
        border-bottom: none;
    }
    .information-box svg {
        font-size: 22px !important; 
        margin-top: -7px
    }


    .leaflet-legend-title {
        font-size: 16px !important;
        margin-bottom: 5px;
    }

    .select2-container .select2-selection--single .select2-selection__rendered {
        font-size: 15px !important;
    }

    .select2-container .select2-selection, .select2-selection__rendered {
        height: 34px !important;
        line-height: 34px !important;
    }

    

    @media (max-width: 600px) {
        .information-box ul li {
            padding-bottom: 30px
        }
        .information-box svg {
            margin-top: 10px
        }
        .select2.select2-container.select2-container--bootstrap4 {
            width: 100%;
            margin-bottom: 10px;
        }
    }
</style>

<div class="main-content" style="background: linear-gradient(0deg, rgba(0,125,195,1) 10%, rgba(161,221,255,1) 98%);min-height: 91.5vh">
    
    <div class="filter-box" style="margin: 10px 0px; border-bottom: 2px solid #fff; padding: 0px 10px 10px 10px">
        <form action="#" method="GET">
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <h3 class="sub-title" style="margin-bottom: 0px !important; line-height: 2">SURVEY MAPS INFORMATION</h3>
                </div>
                <div class="col-md-2 col-sm-12">
                    <select id="map-filter" class="form-control" name="mapdata">
                        <option <?= $filter['mapdata'] == 'PHASE' ? 'selected' : '' ?> value="PHASE">PHASE</option>
                        <option <?= $filter['mapdata'] == 'PLANT_TYPE' ? 'selected' : '' ?> value="PLANT_TYPE">PLANT TYPE</option>
                    </select>
                </div>
                <div class="col-md-2 col-sm-12">
                    <button type="submit" class="btn btn-primary btn-block" style="height: 33px">FILTER</button>
                </div>
            </div>
        </form>
    </div>
    <div id="map" style="height: 450px; z-index: 1; border-radius: 10px;"></div>
    <!-- <div class="information-box">
        <h3 style="font-family: cjFont; margin-bottom: 0px;line-height: 40px; font-weight: 700; letter-spacing: 1px">
            INFORMATION
        </h3>
        <hr>
        <ul>
            <?php foreach ($survey as $i => $v): ?>
                <li>
                    <b>#<?= $v['SURVEY_NO'] ?></b> : SURVEY PADA LOKASI INI <b> <?= $v['interval_to_next_status'] ?> HARI</b> MENUJU PHASE <b><?= $v['next_status'] ?></b>
                    <a href="<?= admin_url('survey/detail/'.$v['SURVEY_NO']) ?>" target="_blank" class="btn btn-sm" title="Detail" style="float: right;"><i class="fas fa-eye text-primary" style="font-size: 22px"></i></a>
                </li>
            <?php endforeach ?>
        </ul>
    </div> -->
</div>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/leaflet/leaflet.legend.js') ?>"></script>
<script>
    $('#map-filter').select2({
        theme: 'bootstrap4',
        language: "en",
        placeholder: "- SELECT PROVINCE -",
    });
    // Inisialisasi peta
    var map = L.map("map").setView([-0.490749, 113.655673], 5); // Koordinat awal dan zoom
    let mapdata = `<?= $filter['mapdata'] ?>`;

    // Tambahkan layer peta
    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        maxZoom: 19,
        attribution: "© OpenStreetMap",
    }).addTo(map);

    var shadowURL   = `<?= base_url('assets/img/marker-shadow.png') ?>`;

    
    var plURL       = `<?= base_url('assets/img/marker-icon-pl.png') ?>`;
    var vaURL       = `<?= base_url('assets/img/marker-icon-va.png') ?>`;
    var vrURL       = `<?= base_url('assets/img/marker-icon-vr.png') ?>`;
    var gaURL       = `<?= base_url('assets/img/marker-icon-ga.png') ?>`;
    var grURL       = `<?= base_url('assets/img/marker-icon-gr.png') ?>`;
    var gpURL       = `<?= base_url('assets/img/marker-icon-gp2.png') ?>`;
    var jagungURL       = `<?= base_url('assets/img/marker-icon-jagung.png') ?>`;
    var padiURL       = `<?= base_url('assets/img/marker-icon-padi.png') ?>`;
    var casavaURL       = `<?= base_url('assets/img/marker-icon-casava.png') ?>`;
    var tanamanLainURL       = `<?= base_url('assets/img/marker-icon-lain.png') ?>`;
    var nophaseURL       = `<?= base_url('assets/img/marker-icon-gp.png') ?>`;

    if (mapdata == 'PLANT_TYPE') {

        
        L.control.Legend({
            position: "bottomleft",
            legends: [
                { label: "JAGUNG", type: "image", url: jagungURL, },
                { label: "PADI", type: "image", url: padiURL, },
                { label: "CASAVA", type: "image", url: casavaURL, },
                { label: "TANAMAN LAIN", type: "image", url: tanamanLainURL, },
            ],
            title: 'LEGEND',
            column: 2
        }).addTo(map);
    } else {
        L.control.Legend({
            position: "bottomleft",
            legends: [
                { label: "PERSIAPAN LAHAN", type: "image", url: plURL, },
                { label: "VEGETATIF AWAL", type: "image", url: vaURL, },
                { label: "VEGETATIF AKHIR", type: "image", url: vrURL, },
                { label: "GENETATIF AWAL", type: "image", url: gaURL, },
                { label: "GENETATIF AKHIR", type: "image", url: grURL, },
                { label: "GAGAL PANEN", type: "image", url: gpURL, },
                { label: "NO PHASE", type: "image", url: nophaseURL, }
            ],
            title: 'LEGEND',
            column: 4
        }).addTo(map);
    }

    var iconSize    = [25, 41];
    var iconAnchor  = [12, 41];
    var popupAnchor = [1, -34];
    var shadowSize  = [41, 41];
    var iconPL = new L.Icon({
        iconUrl: plURL,
        shadowUrl: shadowURL,
        iconSize: iconSize,
        iconAnchor: iconAnchor,
        popupAnchor: popupAnchor,
        shadowSize: shadowSize
    });

    var iconVA = new L.Icon({
        iconUrl: vaURL,
        shadowUrl: shadowURL,
        iconSize: iconSize,
        iconAnchor: iconAnchor,
        popupAnchor: popupAnchor,
        shadowSize: shadowSize
    });

    var iconVR = new L.Icon({
        iconUrl: vrURL,
        shadowUrl: shadowURL,
        iconSize: iconSize,
        iconAnchor: iconAnchor,
        popupAnchor: popupAnchor,
        shadowSize: shadowSize
    });

    var iconGA = new L.Icon({
        iconUrl: gaURL,
        shadowUrl: shadowURL,
        iconSize: iconSize,
        iconAnchor: iconAnchor,
        popupAnchor: popupAnchor,
        shadowSize: shadowSize
    });

    var iconGR = new L.Icon({
        iconUrl: grURL,
        shadowUrl: shadowURL,
        iconSize: iconSize,
        iconAnchor: iconAnchor,
        popupAnchor: popupAnchor,
        shadowSize: shadowSize
    });

    var iconGP = new L.Icon({
        iconUrl: gpURL,
        shadowUrl: shadowURL,
        iconSize: iconSize,
        iconAnchor: iconAnchor,
        popupAnchor: popupAnchor,
        shadowSize: shadowSize
    });

    var iconsGP = new L.Icon({
        iconUrl: nophaseURL,
        shadowUrl: shadowURL,
        iconSize: iconSize,
        iconAnchor: iconAnchor,
        popupAnchor: popupAnchor,
        shadowSize: shadowSize
    });

    var iconJagung = new L.Icon({
        iconUrl: jagungURL,
        shadowUrl: shadowURL,
        iconSize: iconSize,
        iconAnchor: iconAnchor,
        popupAnchor: popupAnchor,
        shadowSize: shadowSize
    });

    var iconPadi = new L.Icon({
        iconUrl: padiURL,
        shadowUrl: shadowURL,
        iconSize: iconSize,
        iconAnchor: iconAnchor,
        popupAnchor: popupAnchor,
        shadowSize: shadowSize
    });

    var iconCasava = new L.Icon({
        iconUrl: casavaURL,
        shadowUrl: shadowURL,
        iconSize: iconSize,
        iconAnchor: iconAnchor,
        popupAnchor: popupAnchor,
        shadowSize: shadowSize
    });

    var iconTanamanLain = new L.Icon({
        iconUrl: tanamanLainURL,
        shadowUrl: shadowURL,
        iconSize: iconSize,
        iconAnchor: iconAnchor,
        popupAnchor: popupAnchor,
        shadowSize: shadowSize
    });

    // Data marker
    var markers = [];
    var markers_data = JSON.parse('<?= json_encode($titik_post) ?>');
    markers_data.forEach(marker => {
        let coordinate = marker.COORDINATE.split(",");
        let title = marker.TANAMAN.toUpperCase();
        if (marker.CURRENT_PHASE && marker.CURRENT_PHASE !== "-") {
            title = title + ' - ' + marker.CURRENT_PHASE.replace('-', ' ').toUpperCase();
        } else {
            title = title + ' - NO PHASE';
        }
        let obj = {
            coords: [coordinate[0], coordinate[1]],
            info: `<div class="title-phase"><strong>${title} : </strong></div><br>${marker.ADDRESS.toUpperCase()}`,
            phase: marker.CURRENT_PHASE,
            plant_type: marker.TANAMAN
        };
        console.log(obj);
        markers.push(obj);
    });

    // Tambahkan marker ke peta
    markers.forEach(function (marker) {
        icon = '';
        if (mapdata == 'PLANT_TYPE') {
            if (marker.plant_type == 'JAGUNG') {
                icon = iconJagung;
            } else if (marker.plant_type == 'PADI') {
                icon = iconPadi;
            } else if (marker.plant_type == 'CASAVA') {
                icon = iconCasava;
            } else if (marker.plant_type == 'TANAMAN_LAIN') {
                icon = iconTanamanLain;
            }
        } else {
            if (marker.phase == 'persiapan-lahan') {
                icon = iconPL;
            } else if (marker.phase == 'vegetatif-awal') {
                icon = iconVA;
            } else if (marker.phase == 'vegetatif-akhir') {
                icon = iconVR;
            } else if (marker.phase == 'genetatif-awal') {
                icon = iconGA;
            } else if (marker.phase == 'genetatif-akhir') {
                icon = iconGR;
            } else if (marker.phase == 'gagal-panen') {
                icon = iconGP;
            } else if (marker.phase == '-') {
                icon = iconsGP;
            }
        }

        var markerInstance = L.marker(marker.coords).addTo(map);
        if (icon !== '') {
            var markerInstance = L.marker(marker.coords, {icon: icon}).addTo(map);
        }
        markerInstance.bindPopup(marker.info); // Mengikat info box dengan marker
    });
</script>