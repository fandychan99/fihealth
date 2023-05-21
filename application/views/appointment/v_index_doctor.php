<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Appointment Request</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-cog"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">List Of Data</li>
            </ol>
        </nav>
    </div>
</div>
<!--breadcrumb-->

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <div class="col-md-3 ms-auto">
                    <!-- <a class="btn btn-primary form-control" href="<?= base_url(); ?>C_Appointment/form"><i class="bi bi-plus"></i> Create Appointment</a> -->
                </div>
            </div>
            <div class="card-body">
                <?php $msg = $this->input->get("msg"); 
                    if($msg != ""){  
                ?>
                <div class="alert border-0 bg-light-success alert-dismissible fade show">
                    <div class="text-success"><?=$msg; ?></div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php } ?>
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Patient</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($list_appointment->result_array() as $r) {
                                $url_accept = base_url()."C_Appointment/change_status?id=".encrypt_url($r["id"])."&status=".encrypt_url("2");
                                $url_dec = base_url()."C_Appointment/change_status?id=".encrypt_url($r["id"])."&status=".encrypt_url("4");
                                echo "<tr>
                                        <td> ".$r["NAME"]."</td>
                                        <td>".$r["date_book"]."</td>
                                        <td>".$r["days"]." / ".$r["time_start"]." until ".$r["time_end"]."</td>
                                        <td>".$r["status"]."</td>
                                        <td><a href='$url_accept' class='btn btn-primary'>Accept</a> <a href='$url_dec' class='btn btn-danger'>Decline</a></td>
                                      </tr>
                                ";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function hapus_data(){

    }
</script>