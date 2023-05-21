<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="border p-4 rounded">

                <div class="row mb-3">
                    <div class="col-md-2">
                        <div class="profile-avatar text-center">
                            <!-- <img src="<?= base_url(); ?>assets/images/avatars/avatar.png" class="rounded-circle shadow" width="120" height="120" alt=""> -->
                            <?php
                            if ($row["image"] == NULL) {
                            ?>
                                <img src="<?= base_url(); ?>assets/images/avatars/avatar.png" class="rounded-circle shadow" width="120" height="120" alt="">
                            <?php
                            } else {
                            ?>
                                <img src="<?= base_url() ?>assets/images/user/<?= $row["image"] ?>" class="rounded-circle shadow" width="120" height="120" alt="">
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h3> Dr. <?= $row["NAME"]; ?> , <?= $row["gelar"] ?></h3>
                        <h4> <?= $row["spesialist_name"] ?></h4>
                        <h6>STR.<?= $row["str"] ?></h6>
                        <hr>
                        <h5><?= $row["about"] ?></h5>
                        <input type="hidden" name="input_dokter" id="input_dokter" value="<?= $row["user_id"] ?>">
                    </div>

                </div>
                <hr>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xxl-4">
                    <?php
                    foreach ($jadwal_dokter as $r) {
                    ?>

                        <div class="col">
                            <div class="card radius-10 overflow-hidden">
                                <label>
                                    <input type="radio" name="tgl" class="card-input-element" value="<?= $r["tgl"] ?>" onclick="get_jadwal()" />
                                    <div class="panel panel-default card-input">
                                        <div class="panel-heading"><?= date("l, d M Y", strtotime($r["tgl"])) ?></div>
                                        <div class="panel-body">
                                            <?= $r["total"]; ?> Schedule
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>


                    <?php
                    }
                    ?>
                </div>

                <div id="isi_modal2">

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function get_jadwal() {
        $jadwal = $("input[name='tgl']:checked").val();
        $dokter = $("#input_dokter").val();

        $.ajax({
            url: '<?= base_url(); ?>C_Appointment/get_apointment_ajaxjadwal?jadwal=' + $jadwal + '&dokter=' + $dokter,
            cache: false,
            success: function(response) {
                $("#isi_modal2").html(response);
            }
        });
    }
</script>

<style>
    label {
        width: 100%;
        text-align: center;
    }

    .card-input-element {
        display: none;
    }

    .card-input {
        margin: 10px;
        padding: 00px;
    }

    .card-input:hover {
        cursor: pointer;
    }

    .card-input-element:checked+.card-input {
        box-shadow: 0 0 1px 1px #2ecc71;
        background-color: purple;
        color: white;

    }

    .card-input-element2 {
        display: none;
    }

    .card-input-element2:checked+.card-input {
        box-shadow: 0 0 1px 1px #2ecc71;
        background-color: green;
        color: white;

    }

    .disabled {
        box-shadow: 0 0 1px 1px #2ecc71;
        background-color: green;
        color: white;
    }
</style>