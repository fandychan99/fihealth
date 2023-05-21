<?php
if (!empty($isi_consul)) {
?>
    <h4>By : <?=$isi_consul->nama_dokter ?></h4>
    <h6><?=date("l, d M Y", strtotime($isi_consul->date_consul)); ?></h6>
    <hr>
    <h6>Diagnose*</h6>
    <p><?=$isi_consul->diagnose ?></p>
    <hr>
    <h6>Therapy*</h6>
    <p><?=$isi_consul->therapy ?></p>
    <hr>
    <h6>Recipe*</h6>
    <p><?=$isi_consul->recipe ?></p>
    <hr>

<?php
}
?>