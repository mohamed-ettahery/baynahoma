<?php $this->extend("layouts/master");?>
<?php $this->section("title"); ?>
 My Profile
<?php $this->endsection(); ?>
<?php $this->section("content"); ?>
<!-- Start my Profile page -->
<div class="myProfile-page p-3">
    <div class="box mx-auto">
        <div class="cover-box">
            <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#6469D1" fill-opacity="1" d="M0,192L60,181.3C120,171,240,149,360,170.7C480,192,600,256,720,282.7C840,309,960,299,1080,293.3C1200,288,1320,288,1380,288L1440,288L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path>
            </svg> -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#6469D1" fill-opacity="1" d="M0,256L80,256C160,256,320,256,480,256C640,256,800,256,960,229.3C1120,203,1280,149,1360,122.7L1440,96L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path>
            </svg>
            <img src="<?=base_url('images/bubbles.png')?>" class="img-bubbles"/>
            <img src="<?=base_url('images/profiles/'.$user->image)?>" class="img-profile rounded-circle"/>
            <form id="form-update-profile-img" action="<?=site_url('Users/updateOnlyPhoto')?>" method="POST" enctype='multipart/form-data'>
              <input type="hidden" value="<?=$user->image?>" name="old_img_value"/>
              <input type="hidden" value="<?=base_url('images/profiles/'.$user->image)?>" id="old-img-value"/>
              <input type="file" accept="image/png, image/jpeg, image/jpg" id="image-input-file2" class="d-none" name="image" />
            </form>
            <div class="change-image d-none">تغيير <i class="fa-solid fa-arrows-rotate"></i></div>
            <script>
            //     const input2 = document.getElementById('image-input-file2');

            // input2.addEventListener('change', function (e) {
            //     // alert('yeppp');
            //     const reader = new FileReader()
            //     reader.onload = function () {
            //     var src = reader.result
            //     $('.img-profile').attr("src",src);
            //     }
            //     reader.readAsDataURL (input2.files [0]) ;
            // }, false);
            </script>
            <img src="<?=base_url('images/ON.png')?>" class="statusImg"/>
            <h3 class="name"><?=esc($user->firstName)." ".esc($user->lastName)?></h3>
        </div>
        <div class="info-box p-5 mt-3">
            <div class="row">
                <div class="col-md-6">
                    <ul class="list-unstyled">
                        <li><i class="text-primary me-2 fa-solid fa-hashtag"></i> العمر <?=date_diff(date_create($user->birthday), date_create(date("Y-m-d")))->format('%y')?> سنة</li>
                        <li><i class="text-primary me-2 fa-solid fa-venus-mars"></i>  <?php if($user->gender == 'm'){echo "ذكر ";} else{ echo "انثى"; };?></li>
                        <li><i class="text-primary me-2 fa-solid fa-flag"></i> <?=$user->country?> </li>
                        <?php if(!empty($user->city)):?><li><i class="text-primary me-2 fa-solid fa-location-dot"></i> <?=$user->city?> </li><?php endif; ?>
                        <li><i class="text-primary me-2 fa-solid fa-calendar-days"></i> تم إنشاء الحساب في التاريخ <?=date("Y-m-d",strtotime($user->created_at))?></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="list-unstyled">
                        <li><i class="text-primary me-2 fa-solid fa-cake-candles"></i> <?=esc($user->birthday)?></li>
                        <li><i class="text-primary me-2 fa-solid fa-phone"></i> <a class="text-dark" href="tel:089371294"><?=esc($user->phone) ?></a></li>
                        <li><i class="text-primary me-2 fa-solid fa-envelope"></i> <a class="text-dark" href="mailto:test@gmail.com"><?=esc($user->email)?></a></li>
                    </ul>
                    <div class="about-box">
                        <h5 class="title">معلومات أكثر عن <?=$user->firstName." ".$user->lastName  ?></h5>
                        <?php if(!empty($user->about)): ?>
                          <p class="about-paragraph"><?=esc($user->about)?></p>
                        <?php else:?>
                          <p class="empty-about"> لم يضيف اي معلومات اضافيه حتى الان</p>
                        <?php endif;?>
                    </div>
                </div>
                <div class="col-md-6">
                    <a class="btn edit-btn" href="<?=site_url('Users/editForm')?>"><i class="fa-solid fa-user-pen"></i> تعديل المعلومات</a>
                    <a class="btn btn-danger delete-btn" id="delete-account" href="<?=site_url('Users/deleteAccount')?>"><i class="fa-solid fa-trash"></i>  حذف حسابي</a>
                </div>
                <!-- <script>
                $("#delete-account").click(function(e){
                    "use strict";
                    e.preventDefault();
                    alert('yes');
                });
                </script> -->
            </div>
        </div>
    </div>
</div>
<!-- End my Profile page -->
<?php $this->endsection(); ?>