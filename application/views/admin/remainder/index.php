<style type="text/css">
  .box {
    position: relative;
    background: #ffffff;
    width: 100%;
  }
  .box-header {
    color: #444;
    display: block;
    padding: 10px;
    position: relative;
    border-bottom: 1px solid #f4f4f4;
    margin-bottom: 10px;
  }
  .box-tools {
    position: absolute;
    right: 10px;
    top: 5px;
  }
  .dropzone-wrapper {
    border: 2px dashed #91b0b3;
    color: #92b0b3;
    position: relative;
    height: 200px;
    overflow:auto;
  }
  .dropzone-desc {
    position: absolute;
    margin: 0 auto;
    left: 0;
    right: 0;
    text-align: center;
    width: 40%;
    top: 50px;
    font-size: 16px;
  }
  .dropzone,
  .dropzone:focus {
    position: absolute;
    outline: none !important;
    width: 100%;
    height: 200px;
    cursor: pointer;
    opacity: 0;
    overflow:auto;
  }
  .dropzone-wrapper:hover,
  .dropzone-wrapper.dragover, .preview-zone:hover, .preview-zone.dragover {
    background: #ecf0f5;
  }
  .preview-zone {
    max-width: 10px;
    position: absolute;
    margin: 0 auto;
    left: 0;
    right:250px;
    top: 20px;
  }
  .preview-zone .box {
    box-shadow: none;
    border-radius: 0;
    margin-bottom: 0;
  }
</style>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <?php if ($is_create == 1): ?>
          <div class="float-right">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#uploadPortfolio">
              <i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;&nbsp;Portfolio
            </button>
            <button id="btn-delete" type="button" class="btn btn-default">
              Hapus
            </button>
          </div>
          <br>
        <?php endif ?>
        <div class="row mt-5">
          <?php if (!empty($portfolio)): ?>
            <?php foreach ($portfolio as $value): ?>
              <div class="col-lg-3">
                <div class="card card-artikel no-border">
                  <div class="article-radio">
                    <input class="deleteradio" type="radio" name="deleteradio" value="<?= $value->id ?>">
                  </div>
                  <img style="border-radius: 20px;" src="<?= base_url('upload/portfolio/'.$value->image) ?>">
                </div>
              </div>
            <?php endforeach ?>
          <?php endif ?>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="uploadPortfolio" tabindex="-1" role="dialog" aria-labelledby="uploadPortfolioLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Portfolio</h5>
      </div>
      <form action="<?php echo $own_link ?>/do_create" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-lg-2 col-sm-12 col-form-label">Image</label>
            <br>
            <div style="width:100%">
               <div class="dropzone-wrapper">
                  <div class="dropzone-desc">
                    <i class="glyphicon glyphicon-download-alt"></i>
                    <p>Drag or Drop file.</p>
                  </div>
                  <input type="file" name="image" class="dropzone" accept="image/png, image/jpg, image/jpeg">
                  <div class="preview-zone hidden">
                    <div class="box box-solid">
                      <div class="box-body">
                        <?php if (isset($model)): ?>
                          <img width="300" src="<?= base_url('upload/portfolio/'.$model->image) ?>" />
                          <p></p>
                        <?php endif ?>
                      </div>
                    </div>
                  </div>
               </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Upload</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $(".dropzone").change(function(){
      readFile(this);
    });
    $('.dropzone-wrapper').on('dragover', function(e) {
      e.preventDefault();
      e.stopPropagation();
      $(this).addClass('dragover');
    });
    $('.dropzone-wrapper').on('dragleave', function(e) {
      e.preventDefault();
      e.stopPropagation();
      $(this).removeClass('dragover');
    });
    // $('.file-upload').file_upload();
    $("#btn-delete").click(function() {
      var id =  $("input[name='deleteradio']:checked").val();
      console.log("ID", id);
      if (id) {
        deleteConfirm(id);
      }
    });
  });

  function readFile(input) {
    // var extension = input.files[0].name.substr( input.files[0].name.indexOf('.') + 1 );
    // console.log("EXTENSION", extension);
    // if (extension == "jpeg" || extension == "jpg" || extension == "png") {
    var sFileName = input.files[0].name;
    var inputValidation = false;
    var _validFileExtensions = ["jpeg", "jpg", "png", "JPEG", "JPG", "PNG"];
    if (sFileName.length > 0) {
        for (var j = 0; j < _validFileExtensions.length; j++) {
            var sCurExtension = _validFileExtensions[j];
            if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                inputValidation = true;
                break;
            }
        }
    }
    if (inputValidation == true) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          var htmlPreview = 
          '<img width="300" src="' + e.target.result + '" />'+
          '<p></p>';
          var wrapperZone = $(input).parent();
          var previewZone = $(input).parent().parent().find('.preview-zone');
          var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');

          wrapperZone.removeClass('dragover');
          previewZone.removeClass('hidden');
          boxZone.empty();
          boxZone.append(htmlPreview);
        };
        reader.readAsDataURL(input.files[0]);
      }
    } else {
      toastr.error('File bukan image')
    }
  }

  function deleteConfirm(id) {
    var url = "<?php echo $own_link ?>/delete/" + id;
    var swal = Swal.fire({
        title: 'Hapus Data',
        text: 'Apa anda yakin ingin menghapus data ini?',
        type: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#fff',
        cancelButtonText: `<span style='color:#000'>Tidak<span>`,
        confirmButtonColor: '#2C8CB6',
        confirmButtonText: 'Ya',
        reverseButtons: true
    }).then((result) => {
      if (result.value) {
        window.location.href = url;
      }
    });
  }
</script>