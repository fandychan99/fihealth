<?php
foreach ($isi_chat as $r) {
    if ($r["user_id"] == $this->session->userdata("userid")) {
?>
        <div class="chat-content-rightside">
            <div class="d-flex ms-auto">
                <div class="flex-grow-1 me-2">
                    <p class="mb-0 chat-time text-end">you, <?= date('d-m-Y H:i:s', strtotime($r["send_date"])); ?></p>
                    <p class="chat-right-msg"><?=$r["chat_text"]; ?></p>
                </div>
            </div>
        </div>

    <?php
    } else {
    ?>

        <div class="chat-content-leftside">
            <div class="d-flex">
                <div class="flex-grow-1 ms-2">
                    <p class="mb-0 chat-time"><?=$r["user_id"]; ?>, <?= date('d-m-Y H:i:s', strtotime($r["send_date"])); ?></p>
                    <p class="chat-left-msg"><?=$r["chat_text"]; ?></p>
                </div>
            </div>
        </div>
<?php
    }
}
?>