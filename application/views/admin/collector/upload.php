
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
        <strong>Collector Upload</strong>
    </h3>
    <div class="row">
        <form action="<?= admin_url('collector/do_upload') ?>" method="POST" enctype="multipart/form-data">
            <div class="content-task">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group row">
                            <label for="customer" class="col-lg-12 col-sm-12 col-form-label">Date Month</label>
                            <div class="col-lg-12 col-sm-12">
                                <input type="month" name="yymm" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12">
                        <div class="form-group row">
                            <label for="customer" class="col-lg-12 col-sm-12 col-form-label">File</label>
                            <div class="col-lg-12 col-sm-12">
                                <!-- <input type="file" name="berkas" class="form-control"  accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"> -->
                                <input type="file" name="berkas" class="form-control">
                            </div>
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
    $("#remainder_type").select2({theme: 'bootstrap4'});
</script>