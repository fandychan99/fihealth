<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Read Article</div>
    <div class="ps-3">

    </div>
</div>
<!--breadcrumb-->
<div class="row">
    
    <div class="col-md-8">
        <div class="card shadow-sm border-0 overflow-hidden">
            <div class="card-body">
                <div class="text-right mt-4">
                    <h4 class="mb-1"><?=$article["title"]; ?></h4>
                    <h6 class="mb-1"><i>by. <?=$article["create_by"];?> / on <?=date("l, d M Y", strtotime($article["created_date"]));?></i></h6>
                    <hr>
                    <p class="mb-0 text-secondary"><?=$article["content"];?></p>
                    <div class="mt-4"></div>
                </div>
                <hr>

            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="row g-0 justify-content-center">
                <div class="col-md-11 ">
                    
                    
                    <div class="card-body">
                        <div class="card-title">
                        <h4 class="mb-1">Last 5 Article</h4>
                        </div>   
                        <hr>
                        <p class="mb-0 text-secondary"></p>
                        <?php
                            foreach ($last5 as $r) {
                                ?>
                                <h6 class="mb-1"><?=$r["title"]; ?><a href="<?=base_url()?>C_Article/read_article/<?=$r['id']?>">... Read article</a></h6>
                                <hr>
                            <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>