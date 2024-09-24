<div class="main-content pre-posttest">
    <h3 class="card-title">
        <strong>Master Data - Gudang</strong>
    </h3>
    <table class="table table-bordered table-hover" id="example1">
        <thead>
            <tr>
                <th style="text-align: center;">No</th>
                <th style="text-align: center;">Kode</th>
                <th style="text-align: center;">Nama</th>
                <th style="text-align: center;">Nomor HP</th>
                <th style="text-align: center;">Klasifikasi</th>
                <th style="text-align: center;">Kapasitas</th>
                <th style="text-align: center;">Kategori</th>
                <th style="text-align: center;">Area</th>
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
    })
</script>