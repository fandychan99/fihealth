<div class="row">
    <div class="col-12 col-lg-8">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <?= form_open(base_url('C_Profile/update_profile_patient'), "id='formuser'") ?>
                <div class="card shadow-none border">
                    <div class="card-header">
                        <h6 class="mb-0">USER INFORMATION</h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">


                            <div class="col-6">
                                <label class="form-label">Born</label>
                                <input type="date" class="form-control" name="born" value="<?= $data_user->born ?>" required>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Sex</label>
                                <!-- <input type="text" class="form-control" value=""> -->
                                <select name="sex" id="sex" class="form-control" required>
                                    <option value="<?= $data_user->sex ?>"><?= $data_user->sex ?></option>
                                    <option value="Man">Man</option>
                                    <option value="Woman">Woman</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Weight</label>
                                <input type="text" class="form-control" value="<?= number_format($data_user->weight); ?>" name="weight">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Height</label>
                                <input type="text" class="form-control" value="<?= number_format($data_user->height); ?>" name="height">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Blood Pressure</label>
                                <input type="text" class="form-control" value="<?= number_format($data_user->bloodpressure); ?>" name="bloodpressure">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Heart Rate</label>
                                <input type="text" class="form-control" value="<?= number_format($data_user->heartrate); ?>" name="heartrate">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Cholesterol</label>
                                <input type="text" class="form-control" value="<?= number_format($data_user->cholesterol); ?>" name="cholesterol">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Bloodglucose</label>
                                <input type="text" class="form-control" value="<?= number_format($data_user->bloodglucose); ?>" name="bloodglucose">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="text-start">
                    <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-4">
        <div class="card shadow-sm border-0 overflow-hidden">
            <div class="card-body">
                <div class="profile-avatar text-center">
                    <img src="<?= base_url(); ?>assets/images/avatars/avatar.png" class="rounded-circle shadow" width="120" height="120" alt="">
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
</div><!--end row-->