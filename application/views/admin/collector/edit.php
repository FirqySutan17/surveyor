
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
<div class="main-content pre-posttest">
    <h3 class="card-title">
        <strong>Edit Collector</strong>
    </h3>
    <div class="row">
        <form action="<?= admin_url('collector/do_update') ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="slug" value="<?= $slug ?>">
            <div class="content-task">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group row">
                            <label for="customer" class="col-lg-12 col-sm-12 col-form-label">EMPLOYEE</label>
                            <div class="col-lg-12 col-sm-12">
                                <input type="text" class="form-control" value="<?= $model['EMPNO'].' - '.$model['EMPLOYEE_NAME'] ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group row">
                            <label for="customer" class="col-lg-12 col-sm-12 col-form-label">Total RUNNING Target</label>
                            <div class="col-lg-12 col-sm-12">
                                <input type="text" class="form-control" value="<?= formatRupiah($model['RUNNING_TARGET']) ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group row">
                            <label for="customer" class="col-lg-12 col-sm-12 col-form-label">Total STOP Target</label>
                            <div class="col-lg-12 col-sm-12">
                                <input type="text" class="form-control" value="<?= formatRupiah($model['STOP_TARGET']) ?>" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="example1">
                                <thead>
                                    <tr>
                                        <th width="60%" style="text-align: center;">CUSTOMER</th>
                                        <th style="text-align: center;">RUNNING TARGET</th>
                                        <th style="text-align: center;">STOP TARGET</th>
                                        <th style="text-align: center;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if (!empty($list)): ?>
                                    <?php foreach ($list as $i => $v): ?>
                                        <tr>
                                            <td style="text-align: left; white-space: nowrap;">
                                                <select id="customer-<?= $i ?>" name="CUSTOMER[]" class="form-control select2data" data-selected="<?= $v['CUSTOMER'] ?>" style="width:100%">
                                                    <?= $customer_list ?>
                                                </select>
                                            </td>
                                            <td style="text-align: left; white-space: nowrap;"><input type="text" class="form-control" name="RUNNING_TARGET[]" value="<?= $v['RUNNING_TARGET'] ?>" ></td>
                                            <td style="text-align: left; white-space: nowrap;"><input type="text" class="form-control" name="STOP_TARGET[]" value="<?= $v['STOP_TARGET'] ?>" ></td>
                                            <td style="text-align: right;"><a href="<?= admin_url('collector/edit/'.$slug) ?>" class="btn btn-danger btn-block">DELETE</a></td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="form-group row mt-5" style="margin-top: 20px !important">
                    <div class="col-sm-12 col-md-4">
                        <a href="<?= base_url('dashboard') ?>" class="btn btn-danger cust-btn-back" style="width: 100%; height: 50px; display: flex; align-items: center; justify-content: center;">Batal</a>
                    </div>
                    <div class="col-sm-12 col-md-8">
                        <button type="submit" class="btn btn-primary cust-btn-save" style="width: 100%; height: 50px">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(".select2data").select2({theme: 'bootstrap4'});

    $(document).ready(function() {
        $(".select2data").each(function(i, obj) {
            let selected = $(obj).data('selected');
            let selectid = $(obj).attr('id');
            $(`#${selectid} option[value="${selected}"]`).prop('selected', true).trigger('change');
        });
    });
</script>