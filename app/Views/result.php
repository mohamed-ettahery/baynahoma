<?php $this->extend("layouts/master");?>
<?php $this->section("title"); ?>
Search result
<?php $this->endsection(); ?>
<?php $this->section("content"); ?>
<!-- Start result page -->
<div class="result-page p-4">
    <div class="container">
        <h1 class="title"><i class="fa-solid fa-square-poll-horizontal"></i> نتائج البحث</h1>
        <img class="wavy-lines" src="<?=base_url("images/wavy-lines.png")?>"/>
        <div class="box-peoples mt-5">
            <a href="<?=site_url('Search')?>" class="btn backToSearchBox">عوده لصندوق البحث <i class="fa-solid fa-backward-fast"></i></a>
            <div class="content mb-4 mt-4">
                <div class="row">
                    <?php if(!empty($users)): ?>
                        <?php foreach($users as $user):?>
                            <div class="col-md-6 col-lg-3">
                                <a href="<?=site_url("Users/Profile/".$user->id)?>" class="btn">
                                    <div class="card text-center p-3" style="width: 17rem;">
                                        <img src="<?=base_url("images/profiles/".$user->image)?>" class="mx-auto card-img-top img-thumbnail rounded-circle" alt="...">
                                        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                        <path fill="#8A3FFC" d="M35.6,-44.1C50.1,-38.5,68.5,-33.4,78,-21.3C87.5,-9.3,87.9,9.7,81,24.8C74.1,39.9,59.7,51.1,44.9,59.1C30.2,67.1,15.1,71.8,1,70.4C-13,68.9,-26.1,61.4,-38.1,52.5C-50.1,43.7,-61,33.5,-66.9,20.5C-72.8,7.5,-73.5,-8.3,-66.6,-19.2C-59.7,-30.1,-45.1,-36,-32.7,-42.2C-20.3,-48.5,-10.1,-55.1,0.2,-55.4C10.6,-55.7,21.2,-49.7,35.6,-44.1Z" transform="translate(100 100)" />
                                        </svg>
                                        <div class="card-body">
                                            <h5 class="card-title text-center mb-3"><?=$user->firstName." ".$user->lastName?></h5>
                                            <div class="row mb-3">
                                                <div class="col-6 fs-5"><i class="fa-solid fa-<?php echo $user->gender == 'm' ? 'mars' :'venus' ?>" style="color: var(--<?php echo $user->gender == 'm' ? 'primary' :'second' ?>);"></i> <?php echo $user->gender == "m" ? "ذكر" :"أنثى" ?></div>
                                                <div dir="rtl" class="col-6 fs-5"><?php echo date("Y")-intval(strtok($user->birthday, "-"))?> سنه</div>
                                            </div>
                                            <div class="fs-5 text-center"> من <?=$user->country?></div>
                                            <p></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <p style="text-align: center;color: #aba2a2;font-size: smaller;"> لا توجد اي نتائج متطابقه  لبحثك</p>
                    <?php endif;?>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-5">
               <?= $pager->links() ?>
            </div>
        </div>
    </div>
</div>
<!-- End result page -->
<?php $this->endsection(); ?>