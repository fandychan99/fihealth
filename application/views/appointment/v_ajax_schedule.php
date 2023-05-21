<div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xxl-4">
    <?php
    foreach ($jadwal_dokter as $r) {
        if ($r["booked"] == NULL) {
    ?>
            <div class="col">
                <div class="card radius-10 overflow-hidden">
                    <label>

                        <input type="radio" name="sch" class="card-input-element2" value="<?= $r["id"]; ?>" />
                        <div class="panel panel-default card-input">
                            <div class="panel-heading"><?= $r["time_start"]; ?> - <?= $r["time_end"]; ?></div>
                        </div>
                    </label>
                </div>
            </div>
        <?php
        } else {
        ?>
            <div class="col" >
                <div class="card radius-10 overflow-hidden" style="background-color: red; color:white;">
                    <label>

                        <input type="radio" disabled name="sch" class="card-input-element2" value="<?= $r["id"]; ?>" style="cursor: not-allowed" />
                        <div class="panel panel-default card-input">
                            <div class="panel-heading"><?= $r["time_start"]; ?> - <?= $r["time_end"]; ?></div>
                        </div>
                    </label>
                </div>
            </div>

    <?php
        }
    }
    ?>
</div>