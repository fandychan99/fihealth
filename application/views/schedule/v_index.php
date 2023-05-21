<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Schedule Doctor</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-cog"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">List Of Schedule</li>
            </ol>
        </nav>
    </div>
</div>
<!--breadcrumb-->
<div class="row">
    <div class="col-xl-4">
        <div class="card">
            <div class="border p-4 rounded">
                <?= form_open(base_url("C_Schedule/simpan"), 'id="formuser"'); ?>
                <div class="card-title d-flex align-items-center">
                    <h5 class="mb-0">Schedule Register</h5>
                </div>
                <hr />
                <div class="row mb-3">
                    <label for="inputConfirmPassword2" class="col-form-label">Day*</label>
                    <!-- <input type="text" class="form-control" id="day" name="day" placeholder="user id" required> -->
                    <select name="day" id="day" class="form-control">
                        <option value="Sunday">Sunday</option>
                        <option value="Monday"> Monday</option>
                        <option value="Tuesday"> Tuesday</option>
                        <option value="Wednesday"> Wednesday</option>
                        <option value="Thursday"> Thursday</option>
                        <option value="Friday"> Friday</option>
                        <option value="Saturday"> Saturday</option>
                    </select>
                </div>

                <div class="row mb-3">
                    <label for="inputConfirmPassword2" class="col-form-label">Time Start*</label>
                    <input type="text" class="form-control" id="time_start" name="time_start" placeholder="Enter time (24-hour format)" pattern="^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$" required>
                </div>

                <div class="row mb-3">
                    <label for="inputConfirmPassword2" class="col-form-label">Time End*</label>
                    <input type="text" class="form-control" id="time_end" name="time_end" placeholder="Enter time (24-hour format)" pattern="^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$" required>
                </div>
                <div class="row">
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary px-5">Register</button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-xl-8">
        <div class="card">
            <div class="card-header py-3 bg-transparent">
                <!-- <div class="ms-auto" style="text-align: right;">
                    <a href="<?= base_url() ?>c_user/forminput?state=<?= encrypt_url('add'); ?>" class="btn btn-primary"><em class="fa fa-plus"></em> Tambah User</a>
                </div> -->
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tbluser" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Day</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($sch as $item) {
                                echo "<tr>
                                        <td>$item->day</td>
                                        <td>$item->time_start - $item->time_end</td>
                                        <td></td>
                                    </tr>";
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>