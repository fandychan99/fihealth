<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Article Page</div>
    <div class="ps-3">
        <?php
            if( $this->session->userdata('role') == 1){
                echo "<a class='btn btn-primary' href='".base_url()."C_Article/add_article'><i class='bi bi-plus'></i> New Article</a>";
            }
        ?>
    </div>
</div>
<!--breadcrumb-->

<?php
foreach ($list_article->result_array() as $row) {
?>
    <div class="row">
        <div class="col-xl-11">
            <div class="card">
                <div class="border p-4 rounded">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <img src="<?= $row["image"] ?>" style="width:100%; height:200px; padding:10px"   alt="">
                        </div>
                        <div class="col-md-8">
                            <h3><?= $row["title"]; ?></h3>
                            <h6><i class="bi bi-journal-bookmark-fill"></i> <?= $row["part_content"] ?><a href="<?=base_url()?>C_Article/read_article/<?=$row['id']?>">... Read article</a></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}

?>