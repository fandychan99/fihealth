<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Transaction</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-cog"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Create Appointment</li>
            </ol>
        </nav>
    </div>
</div>
<!--breadcrumb-->


<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="border p-4 rounded">
                <div class="row mb-3">
                    <div class="col-md-1">
                        <label for="input" class="col-form-label">Name </label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control txt" id="namadokter" name="dokter" />
                    </div>
                    <div class="col-md-1">
                        <label for="input" class="col-form-label">Specialist </label>
                    </div>
                    <div class="col-md-3">
                        <?php
                        $style_kategori = 'class="single-select form-control" id="specialist" ';
                        echo form_dropdown('role', $list_specialist, '', $style_kategori);
                        ?>
                    </div>
                    <div class="col-md-3">
                        <a class="btn btn-primary" onclick="get_doctor()"><i class="bi bi-search-heart-fill"></i>Find Doctor</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div id="isi_disini">

</div>

<script>
    function get_doctor() {
        $namadokter = $("#namadokter").val();
        $specialist = $("#specialist").val();

        $.ajax({
            url: '<?= base_url(); ?>C_Appointment/get_dokter?namadokter=' + $namadokter + '&specialist=' + $specialist,
            cache: false,
            success: function(response) {
                $("#isi_disini").html(response);
            }
        });
    }

    function get_apointment($id) {
        $tgl = $("#tgl").val();
        $.ajax({
            url: '<?= base_url(); ?>C_Appointment/get_appointment_ajax?tgl=' + $tgl + '&id=' + $id,
            cache: false,
            success: function(response) {
                $("#isi_modal").html(response);
            }
        });
    }

    function simpan_data() {
        if (!confirm("Are you sure to booking this time ?")) {
            // Code to delete the item goes here
            return;
        }

        $jadwal = $("input[name='sch']:checked").val();
        $dokter = $("#input_dokter").val();
        $tgl = $("input[name='tgl']:checked").val();
        console.log($jadwal);
        $.ajax({
            url: "<?= base_url(); ?>C_Appointment/save_appoinment",
            method: "POST",
            data: {
                jadwal: $jadwal,
                dokter: $dokter,
                tgl: $tgl
            },
            dataType: "text",
            success: function(data) {
                var hsl = JSON.parse(data);
                window.location.href = "<?=base_url(); ?>C_Appointment";
            }
        });
    }
</script>



<!-- Modal -->
<div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="isi_modal"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="simpan_data()">Save</button>
            </div>
        </div>
    </div>
</div>