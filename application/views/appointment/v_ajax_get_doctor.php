<?php
foreach ($_lstdokter->result_array() as $row) {
?>
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

                        </div>
                        <div class="col-md-2">
                            <!-- <h6><a class="btn btn-primary">Create Appointment</a></h6> -->
                            <?php $user = $row["user_id"]; ?>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" onclick="get_apointment('<?= $user; ?>')" data-bs-target="#exampleLargeModal">Create Appointment</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}

?>