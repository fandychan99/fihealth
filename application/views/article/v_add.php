<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Add Article </div>
    <div class="ps-3">

    </div>
</div>
<!--breadcrumb-->

<?= form_open(base_url("C_Article/simpan_article"), 'id="formuser"'); ?>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex align-items-center">
                    <h5 class="mb-0">Article Publish</h5>

                </div>
                <hr />
                <div class="row mb-3">
                    <label for="inputConfirmPassword2" class="col-form-label">Title*</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Article Title" required>
                    <input type="text" class="form-control" id="gambar" name="gambar" hidden>
                </div>
                <div class="row mb-3">
                    <label for="inputConfirmPassword2" class="col-form-label">Highlight*</label>
                    <textarea name="highlight" id="highlight" class="form-control" rows="3"></textarea>
                </div>
                <div class="row mb-3">
                    <label for="inputConfirmPassword2" class="col-form-label">Content*</label>
                    <textarea name="contents" id="summernote"></textarea>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary px-5"><em class="bi bi-save"></em> Simpan Article</button>
            </div>
        </div>
    </div>
</div>
<?= form_close(); ?>

<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: "300px",
            callbacks: {
                onImageUpload: function(image) {
                    uploadImage(image[0]);
                },
                onMediaDelete: function(target) {
                    deleteImage(target[0].src);
                }
            }
        });

        function uploadImage(image) {
                var data = new FormData();
                data.append("image", image);
                $.ajax({
                    url: "<?php echo site_url('C_Article/upload_image')?>",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: data,
                    type: "POST",
                    success: function(url) {
                        $('#summernote').summernote("insertImage", url);
                        $("#gambar").val(url);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }

            function deleteImage(src) {
                $.ajax({
                    data: {src : src},
                    type: "POST",
                    url: "<?php echo site_url('C_Article/delete_image')?>",
                    cache: false,
                    success: function(response) {
                        console.log(response);
                    }
                });
            }
    });
</script>