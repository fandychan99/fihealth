<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">My Consultation</div>
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
                            <th>Doctor</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Consultation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($lst_konsultasi->result_array() as $r) {
                                $id = encrypt_url($r["id"]);
                                echo "<tr>
                                        <td> Dr. ".$r["NAME"].", ".$r["gelar"]."</td>
                                        <td>".$r["date_book"]."</td>
                                        <td>".$r["days"]." / ".$r["time_start"]." until ".$r["time_end"]."</td>
                                        <td><a href='".base_url('C_Chat/chat?index='.$id)."' class='btn btn-warning'>Start Consul</a></td>
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