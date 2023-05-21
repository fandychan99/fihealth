<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="row g-0 justify-content-center">
                <div class="col-md-11 ">
                    <hr>
                    <div class="card-body" id="isi_chat" style="height: 450px; overflow-y:scroll">


                    </div>
                    <div class="card-footer" style="background: none;">
                        <div class="row">
                            <div class="col-md-10">
                                <input type="text" name="chat-text" id="chat-text" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-outline-primary form-control" onclick="kirim()"><i class="bi bi-chat"></i> Send</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (!empty($data_user)) {
        if ($role == 2) {
    ?>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills mb-3" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="pill" href="#primary-pills-home" role="tab" aria-selected="true">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i>
                                        </div>
                                        <div class="tab-title">Profile</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-profile" role="tab" aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class='bx bx-book font-18 me-1'></i>
                                        </div>
                                        <div class="tab-title">Diagnosa</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="primary-pills-home" role="tabpanel">
                                <!-- Profile -->
                                <div class="card shadow-sm border-0 overflow-hidden">
                                    <div class="card-body">
                                        <div class="profile-avatar text-center">
                                            <!-- <img src="<?= base_url(); ?>assets/images/avatars/avatar.png" class="rounded-circle shadow" width="120" height="120" alt=""> -->
                                            <?php
                                            if ($data_user->image == NULL) {
                                            ?>
                                                <img src="<?= base_url(); ?>assets/images/avatars/avatar.png" class="rounded-circle shadow" width="120" height="120" alt="">
                                            <?php
                                            } else {
                                            ?>
                                                <img src="<?= base_url() ?>assets/images/user/<?= $data_user->image; ?>" class="rounded-circle shadow" width="120" height="120" alt="">
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="text-center mt-4">
                                            <h4 class="mb-1"><?= $data_user->NAME; ?>, <?= $data_user->sex; ?></h4>
                                            <p class="mb-0 text-secondary"></p>
                                            <div class="mt-4"></div>
                                            <h6 class="mb-1"><?= date("l, d M Y", strtotime($data_user->born)); ?></h6>
                                            <!-- <p class="mb-0 text-secondary">University of Information Technology</p> -->
                                        </div>
                                        <hr>

                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
                                            Height
                                            <span class="badge bg-primary rounded-pill"><?= number_format($data_user->height); ?> CM</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                            Weight
                                            <span class="badge bg-primary rounded-pill"><?= number_format($data_user->weight); ?> KG</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                            Blood Pressure
                                            <span class="badge bg-primary rounded-pill"><?= number_format($data_user->bloodpressure); ?> mmHg</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                            Heart Rate
                                            <span class="badge bg-primary rounded-pill"><?= number_format($data_user->heartrate); ?> bpm</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                            Cholesterol
                                            <span class="badge bg-primary rounded-pill"><?= number_format($data_user->cholesterol); ?> mg</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                            Blood Glucose
                                            <span class="badge bg-primary rounded-pill"><?= number_format($data_user->bloodglucose); ?> mg/dL</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Hasil DIagnosa -->
                            <div class="tab-pane fade" id="primary-pills-profile" role="tabpanel">
                                <div class="card shadow-sm border-0 overflow-hidden">
                                    <div class="card-body">
                                        <?= form_open(base_url("C_Chat/save_diagnose"), 'id="formuser"'); ?>
                                        <div class="row mb-3">
                                            <h4><?= $data_user->NAME; ?>, <?= $data_user->sex; ?></h4>
                                            <h6><?= date("l, d M Y"); ?></h6>
                                            <input type="text" hidden name="id_passein" value="<?=$data_user->user_id; ?>">
                                            <input type="text" hidden name="id_appointment" value="<?=decrypt_url($this->input->get("index"))?>">
                                        </div>

                                        <div class="row mb-3">
                                            <label for="inputConfirmPassword2" class="col-form-label">Diagnose*</label>
                                            <textarea name="diagnose" id="diagnose" rows="3" class="form-control" required></textarea>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="inputConfirmPassword2" class="col-form-label">Therapy*</label>
                                            <textarea name="theraphy" id="diagnose" rows="3" class="form-control" required></textarea>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="inputConfirmPassword2" class="col-form-label">Recipe*</label>
                                            <textarea name="recipe" id="recipe" rows="3" class="form-control" required></textarea>
                                        </div>
                                        <div class="row mb-3">
                                            <button type="submit" class="btn btn-outline-primary form-control">Finish Consultation</button>
                                        </div>
                                        <?= form_close(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        <?php
        } else {
            // var_dump($data_user);
        ?>
            <div class="col">
                <div class="card shadow-sm border-0 overflow-hidden">
                    <div class="card-body">
                        <div class="profile-avatar text-center">
                            <!-- <img src="<?= base_url(); ?>assets/images/avatars/avatar.png" class="rounded-circle shadow" width="120" height="120" alt=""> -->
                            <?php
                            if ($data_user->image == NULL) {
                            ?>
                                <img src="<?= base_url(); ?>assets/images/avatars/avatar.png" class="rounded-circle shadow" width="120" height="120" alt="">
                            <?php
                            } else {
                            ?>
                                <img src="<?= base_url() ?>assets/images/user/<?= $data_user->image; ?>" class="rounded-circle shadow" width="120" height="120" alt="">
                            <?php
                            }
                            ?>
                        </div>
                        <div class="text-center mt-4">
                            <h4 class="mb-1">Dr. <?= $data_user->NAME; ?> <?= $data_user->gelar; ?></h4>
                            <p class="mb-0 text-secondary"></p>
                            <div class="mt-4"></div>
                            <h6 class="mb-1"><?= $data_user->spesialist_name; ?></h6>
                            <!-- <p class="mb-0 text-secondary">University of Information Technology</p> -->
                        </div>
                        <hr>
                        <div class="text-start">
                            <h5 class="">About</h5>
                            <p class="mb-0"><?= $data_user->about; ?>
                            </p>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
                            Credential
                            <span class="badge bg-primary rounded-pill"><?= $data_user->gelar; ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            Education
                            <span class="badge bg-primary rounded-pill"><?= $data_user->last_study; ?></span>
                        </li>

                    </ul>
                </div>
            </div>
    <?php
        }
    }
    ?>

</div>

<script>
    function kirim() {
        $text = $("#chat-text").val();
        $id = "<?= $id; ?>";

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>C_Chat/kirim',
            data: {
                pesan: $text,
                id: $id
            },
            success: function() {
                $('#chat-text').val('');
                $('#isi_chat').attr({
                    scrollBottom: $('#body').attr('scrollHeight')
                });
            }
        });
    }

    function isi_chat() {
        $id = "<?= $id; ?>";
    }

    function scroll_bottom() {
        $element = document.getElementById("isi_chat");
        $element.scrollTop = $element.scrollHeight;
    }

    $(setInterval(function() {
        $('#isi_chat').load('<?php echo base_url(); ?>C_Chat/isi_chat?id=<?= $id; ?>'), scroll_bottom()
        // $('#isi_chat').attr({scrollBottom: $('#body').attr('scrollHeight')});

    }, 500));
</script>